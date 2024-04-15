<?php
    require_once   '/home/david/Documents/draaag/commons/env.php';
    require_once   '/home/david/Documents/draaag/commons/helper.php';
    require_once   '/home/david/Documents/draaag/commons/connect-db.php';
    require_once   '/home/david/Documents/draaag/commons/model.php';
    require_once PATH_MODEL."cart.php";
    $_SESSION['nonce'] = '1212121212';

//    error_log('Session: ' . print_r($_SESSION, true));
    $isLoggedIn = isset($_SESSION['user']['id']);
    function addToCartSession($id_var, $soluong, $tong_tien, $ship, $tien_phai_tra) {
        $sql = "SELECT sp.name, sp.img, sp.id, var.price, var.quantity FROM sanpham sp JOIN variant var ON sp.id = var.id_pro WHERE var.var_id = ?";
        $stmt = $GLOBALS['conn']->prepare($sql);
        $stmt->execute([$id_var]);
        $product = $stmt->fetch(PDO::FETCH_ASSOC);
        //        var_dump('product: ',$product);
        //        var_dump('session:', $_SESSION);


        $found = false;
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = array();
        }

        foreach ($_SESSION['cart'] as &$item) {
            if ($item['id_var'] == $id_var) {
                $item['soluong'] += $soluong;
                $item['name'] = $product['name'];
                $item['img'] = $product['img'];
                $item['price'] = $product['price'];
                $item['id'] = $product['id'];

                //                $item['tong_tien'] += $tong_tien;
                //                $item['ship'] += $ship;
                //                $item['tien_phai_tra'] += $tien_phai_tra;
                $found = true;
                break;
            }
        }
        if (!$found) {
            $_SESSION['cart'][] = [
              'id_var' => $id_var,
              'name' => $product['name'],
              'img' => $product['img'],
              'price' => $product['price'],
              'id' => $product['id'],
              'soluong' => $soluong,
              'tong_tien' => $tong_tien,
              'ship' => $ship,
              'tien_phai_tra' => $tien_phai_tra
            ];
        }
//                var_dump("SESSION['cart']", $_SESSION['cart']);
    }

    $carts = getCartItems($isLoggedIn);


    $voucherDiscount = 0;
    $voucherMessage = '';
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        try {
            if (isset($_POST['update_cart'])) {
                $soluong = $_POST['quantity'];
                $isLoggedIn = isset($_SESSION['user']['id']);
                foreach ($soluong as $id_product => $quantity) {
                    if (filter_var($quantity, FILTER_VALIDATE_INT) && $quantity > 0) {
                        if ($isLoggedIn) {
                            $sql = "UPDATE cart SET soluong = :quantity WHERE id_user = :user_id AND id_cart = :id_var";
                            $stmt = $GLOBALS['conn']->prepare($sql);
                            $stmt->bindParam(':quantity', $quantity, PDO::PARAM_INT);
                            $stmt->bindParam(':user_id', $_SESSION['user']['id'], PDO::PARAM_INT);
                            $stmt->bindParam(':id_var', $id_product, PDO::PARAM_INT);
                            $stmt->execute();
                        } else {
                            foreach ($_SESSION['cart'] as $index =>$item) {
                                if ($item['id_var'] == $id_product) {
                                    $_SESSION['cart'][$index]['soluong'] = $quantity;
                                    break;
                                }
                            }
                            $carts = isset($_SESSION['cart']) ? $_SESSION['cart'] : array();
                            foreach ($carts as $key => $cart) {
                                $carts[$key]['id_product'] = $cart['id_var'];
                            }
                        }
                    } else {
                        $error_message = "Số lượng không hợp lệ cho sản phẩm";
                    }
                }
            }
            elseif (isset($_POST['apply_voucher'])) {
                $voucherCode = $_POST['voucher_code'];
                $voucherDiscountVaild = checkVoucherValidity($voucherCode);
                if ($voucherDiscountVaild) {
                    $voucherDiscount = getdisValue($voucherCode);
                    $voucherMessage = '<p class="text-success">Mã voucher hợp lệ. Bạn được giảm giá: ' . ($voucherDiscount * 100) . '%</p>';
                } else {
                    $voucherMessage = '<p class="text-danger">Mã voucher không hợp lệ hoặc đã hết hạn.</p>';
                }

            }
             else {
//              echo 'test ajax request';
              var_dump($_POST['id_var']);
                $id_product = isset($_POST['id_var']) ? $_POST['id_var'] : null;
                $soluong = isset($_POST['soluong']) ? $_POST['soluong'] : null;
                $tong_tien = isset($_POST['tong_tien']) ? $_POST['tong_tien'] : null;
                $ship = isset($_POST['ship']) ? $_POST['ship'] : null;
                $tien_phai_tra = isset($_POST['tien_phai_tra']) ? $_POST['tien_phai_tra'] : null;

                if ($id_product === null || $soluong === null || $tong_tien === null || $ship === null || $tien_phai_tra === null) {
                    $error_message = "ERROR: Missing POST variables";
                } else {
                    if ($isLoggedIn) {
                        addToCartDatabase($_SESSION['user']['id'], $id_product, $soluong, $tong_tien, $ship, $tien_phai_tra);
                    } else {
                        addToCartSession($id_product, $soluong, $tong_tien, $ship, $tien_phai_tra);}

                }

            }


        } catch (Exception $e) {
            $error_message = $e->getMessage();
        }
    }
    $carts = getCartItems($isLoggedIn);

    $totalship = 0;
    $totalP = 0;
    $tong = 0;
?>





<div class="container margin_30">
  <div class="page_header">
    <div class="breadcrumbs">
      <ul>
        <li><a href="#">Home</a></li>
        <li><a href="#">Category</a></li>
        <li>Page active</li>
      </ul>
    </div>
    <h1>Cart page</h1>
  </div>

  <!-- /page_header -->
  <form action="<?= BASE_URL. '?act=cart' ?>" method="POST">
    <table class="table table-striped cart-list">
      <thead>
      <tr>
        <th>
          Sản Phẩm
        </th>
        <th>
          Giá
        </th>
        <th>
          Số Lượng
        </th>
        <th>
          Tiền Hàng
        </th>
        <th>

        </th>
      </tr>
      </thead>
      <tbody>
      <?php foreach ($carts as $cart) : ?>
          <?php if (isset($cart['id_product'])) : ?>
          <tr>
            <td>
              <div class="thumb_cart">
                <img src="<?= BASE_URL . 'uploads/' . $cart['img'] ?>" >

              </div>
              <span class="item_cart"><?= $cart['name'] ?></span>
            </td>
            <td>
              <strong><?= number_format($cart['price']) ?></strong>
            </td>
            <td class="numbers-row">
              <input type="number" name="quantity[<?= $cart['id_product'] ?>]" value="<?= $cart['soluong'] ?>" class="qty2" min="1" autocomplete="off">

            </td>
            <td>
              <strong>
                  <?= number_format($cart['soluong'] * $cart['price']) ?>
              </strong>
            </td>
            <td class="option">
              <?php if ($isLoggedIn): ?>
                <a href="<?= BASE_URL ?>?act=cart-delete&id=<?= $cart['id_product'] ?>" onclick="return confirm('Bạn có chắc chắn xóa không?')"><i class="ti-trash"></i></a>

              <?php else :?>
              <a href="<?= BASE_URL ?>?act=cart-session-delete&id_var=<?= $cart['id_product'] ?>" onclick="return confirm('Bạn có chắc chắn xóa không?')"><i class="ti-trash"></i></a>

            </td>
          <?php endif;?>
          </tr>
      <?php endif;?>
      <?php endforeach;?>
      </tbody>
    </table>

    <div class="row add_top_30 flex-sm-row-reverse cart_actions">
      <div class="col-sm-4 text-end">
        <button type="submit" class="btn_1 gray" name="update_cart">Update Cart</button>
      </div>
      <div class="col-sm-8">
        <div class="apply-coupon">
          <div class="form-group">
            <div class="row g-2">

            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- /cart_actions -->

</div>
</form>
<!-- /container -->

<div class="box_cart">
  <div class="container">
    <div class="row justify-content-end">
      <div class="col-xl-4 col-lg-4 col-md-6">
        <ul>
            <?php

                foreach ($carts as $ccc) {
                    $totalP += ($ccc['soluong'] * $ccc['price']);
                }
                $totalship = (0.000005 * $totalP);

            ?>
          <li>
            <span>Tổng Tiền Hàng</span> <?= number_format($totalP, 0) ?>đ

          </li>
          <li>
            <span>Shipping</span> <?= number_format($totalship) ?>đ
          </li>
          <li>
            <form action="<?= BASE_URL. '?act=cart' ?>" method="post">
              <input type="text" name="voucher_code" placeholder="Nhập mã voucher" required />
              <input type="submit" name="apply_voucher" value="Áp dụng" />
                <?= $voucherMessage ?>
            </form>
          </li>
          <li>
            <span>Tổng Thanh Toán</span> <?=number_format(($totalP + $totalship) - (($totalP + $totalship) * $voucherDiscount), ); ?>đ

          </li>
        </ul>
          <?php if ($isLoggedIn) : ?>
        <a href="<?= BASE_URL . '?act=checkout' ?>" class="btn_1 full-width cart">Xác Nhận Và Thanh Toán</a>
          <?php else: ?>
        <a href="<?= BASE_URL . '?act=login1' ?>" class="btn_1 full-width cart">Xác Nhận Và Thanh Toán</a>
        <?php endif;?>
      </div>
    </div>
  </div>
</div>
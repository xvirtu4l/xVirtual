<?php
    require_once  './commons/env.php';
    require_once  './commons/helper.php';
    require_once  './commons/connect-db.php';
    require_once  './commons/model.php';
    function addToCart($id_var, $soluong, $tong_tien, $ship, $tien_phai_tra)
    {
        try {
            $sql = "INSERT INTO cart (id_var, soluong, tong_tien, ship, tien_phai_tra) VALUES (:id_var, :soluong, :tong_tien, :ship, :tien_phai_tra)";
            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->bindParam(':id_var', $id_var, PDO::PARAM_INT);
            $stmt->bindParam(':soluong', $soluong, PDO::PARAM_INT);
            $stmt->bindParam(':tong_tien', $tong_tien);
            $stmt->bindParam(':ship', $ship);
            $stmt->bindParam(':tien_phai_tra', $tien_phai_tra);
            $stmt->execute();
            return $GLOBALS['conn']->lastInsertId();
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
    $voucherDiscount = 0;
    $voucherMessage = '';
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        try {
          if (isset($_POST['update_cart'])) {
              $soluong = $_POST['quantity'];
              foreach ($soluong as $id_cart => $quantity) {
                  if (filter_var($quantity, FILTER_VALIDATE_INT) && $quantity > 0) {
                      $sql = "UPDATE cart SET soluong = :quantity WHERE id_cart = :id_cart";
                      $stmt = $GLOBALS['conn']->prepare($sql);
                      $stmt->bindParam(':quantity', $quantity, PDO::PARAM_INT);
                      $stmt->bindParam(':id_cart', $id_cart, PDO::PARAM_INT);
                      $stmt->execute();

                  } else {
                      $error_message = "Số lượng không hợp lệ cho sản phẩm với ID: $id_cart";

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
              $id_var = isset($_POST['id_var']) ? $_POST['id_var'] : null;
              $soluong = isset($_POST['soluong']) ? $_POST['soluong'] : null;
              $tong_tien = isset($_POST['tong_tien']) ? $_POST['tong_tien'] : null;
              $ship = isset($_POST['ship']) ? $_POST['ship'] : null;
              $tien_phai_tra = isset($_POST['tien_phai_tra']) ? $_POST['tien_phai_tra'] : null;

              if ($id_var === null || $soluong === null || $tong_tien === null || $ship === null || $tien_phai_tra === null) {
                  $error_message = "ERROR: Missing POST variables";
              } else {
                  addToCart($id_var, $soluong, $tong_tien, $ship, $tien_phai_tra);}
          }

        } catch (Exception $e) {
            $error_message = $e->getMessage();
        }
    }
    $carts = show_all_products_in_card();
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
              <?php if (isset($cart['id_cart'])) : ?>
        <tr>
          <td>
            <div class="thumb_cart">
                <img src="<?= BASE_URL . 'uploads/' . $cart['img'] ?>" >

            </div>
            <span class="item_cart"><?= $cart['name'] ?></span>
          </td>
          <td>
            <strong><?= $cart['price'] ?></strong>
          </td>
          <td class="numbers-row">
            <input type="number" name="quantity[<?= $cart['id_cart'] ?>]" value="<?= $cart['soluong'] ?>" class="qty2" min="1" autocomplete="off">

          </td>
          <td>
            <strong>
              <?= $cart['soluong'] * $cart['price'] ?>
            </strong>
          </td>
          <td class="option">
            <a href="<?= BASE_URL ?>?act=cart-delete&id=<?= $cart['id_cart'] ?>" onclick="return confirm('Bạn có chắc chắn xóa không?')"><i class="ti-trash"></i></a>
          </td>
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
                        <!-- <div class="col-md-6"><input type="text" name="coupon-code" value="" placeholder="Promo code" class="form-control"></div>
                        <div class="col-md-4"><button type="button" class="btn_1 outline">Apply Coupon</button></div> -->
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
                        $totalship = 0;
                        $totalP = 0;
                        $tong = 0;
                        foreach ($carts as $ccc) {
                            $totalP += ($ccc['soluong'] * $ccc['price']);
                        }
                        $totalship = (0.000005 * $totalP);

                    ?>
                    <li>
                        <span>Tổng Tiền Hàng</span> <?= $totalP ?>đ
                    </li>
                    <li>
                        <span>Shipping</span> <?=$totalship ?>đ
                    </li>
                  <li>
                    <form action="<?= BASE_URL. '?act=cart' ?>" method="post">
                      <input type="text" name="voucher_code" placeholder="Nhập mã voucher" required />
                      <input type="submit" name="apply_voucher" value="Áp dụng" />
                        <?= $voucherMessage ?>
                    </form>
                  </li>
                    <li>
                        <span>Tổng Thanh Toán</span> <?=($totalP + $totalship) - (($totalP + $totalship) * $voucherDiscount); ?>đ
                    </li>
                </ul>
                <a href="<?= BASE_URL . '?act=checkout' ?>" class="btn_1 full-width cart">Xác Nhận Và Thanh Toán</a>
            </div>
        </div>
    </div>
</div>
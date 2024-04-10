<?php
    $errorMessage = '';
    $searrr = [];
    if (isset($_POST['search_query'])) {
        $search_query = $_POST['search_query'];
        $search_query = trim($search_query);
        $search_query = stripslashes($search_query);
        $search_query = htmlspecialchars($search_query);

        try {
            $sql = "SELECT * FROM sanpham WHERE name LIKE :search_query";
            $stmt = $GLOBALS['conn']->prepare($sql);
            $search_term = "%$search_query%";
            $stmt->bindParam(':search_query', $search_term, PDO::PARAM_STR);
            $stmt->execute();
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

//            var_dump($results);
            if ($results) {
                $searrr = $results;
            } else {
                $errorMessage = "Không tìm thấy kết quả nào cho từ khóa: $search_query";
            }
        } catch (PDOException $e) {
            $errorMessage = "Lỗi tìm kiếm: " . $e->getMessage();
        }
    }
?>
<!--x-->


<div class="col-lg-9">
  <div class="row small-gutters">
      <?php if (empty($searrr)): ?>
    <p style="margin-left: 15px;"><?=$errorMessage?></p>
      <?php else: ?>
      <?php foreach ($searrr as $key => $value) : ?>

          <?php
          $variant = getFirstVariantByProductId($value['id']);
          $soluong = 1;

          if ($variant) {
              $tong_tien = $variant['price'];
              $ship = 20000;
              $tien_phai_tra = $tong_tien + $ship;
          }

          ?>

        <div class="col-6 col-md-4">
          <div class="grid_item">
            <span class="ribbon off">-30%</span>
            <figure>
              <a href="<?= BASE_URL . '?act=detail&id=' . $value['id'] ?>">
                <img class="img-fluid lazy" src="img/products/product_placeholder_square_medium.jpg" data-src="<?= BASE_URL . 'uploads/' . $value['img'] ?>" alt="">
              </a>
              <!-- <div data-countdown="2019/05/15" class="countdown"></div> -->
            </figure>
            <a href="<?= BASE_URL . '?act=detail&id=' . $value['id'] ?>">
              <h3><?= $value['name'] ?></h3>
            </a>
            <div class="price_box">
              <span class="new_price"><?= number_format($value['price'], 0, '.', '.') ?>đ</span>
              <!-- <span class="old_price">$60.00</span> -->
            </div>
            <ul>
              <li>
                <a href="#0" class="tooltip-1 add-to-cart"
                   data-id_var="<?= $variant['var_id'] ?>"
                   data-soluong="<?= $soluong ?>"
                   data-tong_tien="<?= $tong_tien ?>"
                   data-ship="<?= $ship ?>"
                   data-tien_phai_tra="<?= $tien_phai_tra ?>"
                   data-bs-toggle="tooltip"
                   data-bs-placement="left"
                   title="Add to cart">
                  <i class="ti-shopping-cart"></i><span>Add to cart</span>
                </a>
              </li>
            </ul>
          </div>
          <!-- /grid_item -->
        </div>

      <?php endforeach ?>
      <?php endif ?>


  </div>
  <!-- /row -->
</div>
<?php //
//require_once PATH_VIEW . 'customer_comment.php';
//$iduser = $_SESSION['user']['id'];
//?>
<div class="container margin_30">
  <div class="countdown_inner">-20% This offer ends in <div data-countdown="2019/05/15" class="countdown"></div>
  </div>
  <div class="row">
    <div class="col-md-6">
      <div class="all">
        <div class="slider">
          <div class="owl-carousel owl-theme main">
            <div style="background-image: url(<?= BASE_URL . 'uploads/' . $product['img'] ?>);" class="item-box"></div>
            <div style="background-image: url(<?= BASE_URL . 'uploads/' . $product['img'] ?>);" class="item-box"></div>
            <div style="background-image: url(<?= BASE_URL . 'uploads/' . $product['img'] ?>);" class="item-box"></div>
            <div style="background-image: url(<?= BASE_URL . 'uploads/' . $product['img'] ?>);" class="item-box"></div>
            <div style="background-image: url(<?= BASE_URL . 'uploads/' . $product['img'] ?>);" class="item-box"></div>
            <div style="background-image: url(<?= BASE_URL . 'uploads/' . $product['img'] ?>)" class="item-box"></div>
          </div>
          <div class="left nonl"><i class="ti-angle-left"></i></div>
          <div class="right"><i class="ti-angle-right"></i></div>
        </div>
        <div class="slider-two">
          <div class="owl-carousel owl-theme thumbs">
            <div style="background-image: url(<?= BASE_URL . 'uploads/' . $product['img'] ?>);" class="item active">
            </div>
            <div style="background-image: url(<?= BASE_URL . 'uploads/' . $product['img'] ?>);" class="item"></div>
            <div style="background-image: url(<?= BASE_URL . 'uploads/' . $product['img'] ?>);" class="item"></div>
            <div style="background-image: url(<?= BASE_URL . 'uploads/' . $product['img'] ?>);" class="item"></div>
            <div style="background-image: url(<?= BASE_URL . 'uploads/' . $product['img'] ?>);" class="item"></div>
            <div style="background-image: url(<?= BASE_URL . 'uploads/' . $product['img'] ?>);" class="item"></div>
          </div>
          <div class="left-t nonl-t"></div>
          <div class="right-t"></div>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="breadcrumbs">
        <ul>
          <li><a href="#">Home</a></li>
          <li><a href="#">Category</a></li>
          <li>Page active</li>
        </ul>
      </div>


      <div class="prod_info">

        <h1>
          <?= $product['name'] ?>
        </h1>
        <span class="rating"><i class="icon-star voted"></i><i class="icon-star voted"></i><i
            class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star"></i><em>4
            reviews</em></span>
        <p><small>
            <?= $product['name'] ?>
          </small><br>
          <?= $product['mota'] ?>
        </p>
        <div class="prod_options">
          <div class="row">
            <label class="col-xl-5 col-lg-5 col-md-6 col-6 pt-0"><strong>Color</strong></label>
            <div class="col-xl-4 col-lg-5 col-md-6 col-6 colors">
              <ul>
                <?php foreach ($distinctcolor as $color): ?>
                  <li>
                    <a href="#0" class="color <?= $color['color'] ?>">
                    </a>
                  </li>
                <?php endforeach ?>
              </ul>
            </div>
          </div>

          <div class="row">
            <label class="col-xl-5 col-lg-5 col-md-6 col-6 pt-0"><strong>Storage</strong></label>
            <div class="col-xl-4 col-lg-5 col-md-6 col-6 colors">
              <ul>
                <?php foreach ($distinctstorage as $storage): ?>
                  <li><a href="#0" class="size">
                      <?= $storage['storage'] ?>
                    </a></li>
                <?php endforeach ?>
              </ul>
            </div>
          </div>

          <div class="row">
            <form action="<?= BASE_URL . "?act=cart" ?>" method="post">
              <label class="col-xl-5 col-lg-5 col-md-6 col-6"><strong>Quantity</strong></label>
              <div class="col-xl-4 col-lg-5 col-md-6 col-6">
                <div class="numbers-row">
                  <input type="text" value="1" id="quantity_1" class="qty2" name="soluong" min="0" max="100">
                </div>
              </div>


              <input type="hidden" name="id_var" value="<?= $variant_pro['var_id'] ?>" />
              <input type="hidden" name="tong_tien" value="<?= $product['price'] ?>" />
              <input type="hidden" name="ship" value="2000" />
              <input type="hidden" name="tien_phai_tra" value="<?= $product['price'] + 2000 ?>" />

              <input type="hidden" name="action" value="add">

              <div class="row">
                <div class="col-lg-5 col-md-6">
                  <div class="price_main"><span class="new_price">
                      <?= number_format($product['price'], 0, ',') ?> VND
                    </span><span class="percentage">-20%</span> <span class="old_price">$160.00</span></div>
                </div>

                <div class="col-lg-4 col-md-6">
                  <div class="btn_add_to_cart">
                    <?php if ($number_row > 0): ?>
                      <button type="submit" class="btn_1">Add to Cart</button>
                    <?php else: ?>
                      <button type="submit" class="btn_1 disabled" disabled>Add to Cart</button>
                    <?php endif; ?>
                  </div>
                </div>
              </div>
            </form>
          </div>
          <style>
            .disabled {
              pointer-events: none;
              color: #ccc !important;
              background-color: #f4f4f4 !important;
              border-color: #ccc !important;
            }
          </style>

        </div>
      </div>
      <!-- /prod_info -->
      <div class="product_actions">
        <ul>
          <li>
            <a href="#"><i class="ti-heart"></i><span>Add to Wishlist</span></a>
          </li>
          <li>
            <a href="#"><i class="ti-control-shuffle"></i><span>Add to Compare</span></a>
          </li>
        </ul>
      </div>
      <!-- /product_actions -->
    </div>
  </div>
  <!-- /row -->
</div>
<!-- /container -->

<div class="tabs_product">
  <div class="container">
    <ul class="nav nav-tabs" role="tablist">
      <li class="nav-item">
        <a id="tab-A" href="#pane-A" class="nav-link active" data-bs-toggle="tab" role="tab">Description</a>
      </li>
      <li class="nav-item">
        <a id="tab-B" href="#pane-B" class="nav-link" data-bs-toggle="tab" role="tab">Reviews</a>
      </li>
    </ul>
  </div>
</div>
<!-- /tabs_product -->
<div class="tab_content_wrapper">
  <div class="container">
    <div class="tab-content" role="tablist">
      <div id="pane-A" class="card tab-pane fade active show" role="tabpanel" aria-labelledby="tab-A">
        <div class="card-header" role="tab" id="heading-A">
          <h5 class="mb-0">
            <a class="collapsed" data-bs-toggle="collapse" href="#collapse-A" aria-expanded="false"
              aria-controls="collapse-A">
              Description
            </a>
          </h5>
        </div>
        <div id="collapse-A" class="collapse" role="tabpanel" aria-labelledby="heading-A">
          <div class="card-body">
            <div class="row justify-content-between">
              <div class="col-lg-6">
                <h3>Details</h3>
                <p> <?= $product['mota'] ?></p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- /TAB A -->
      <div id="pane-B" class="card tab-pane fade" role="tabpanel" aria-labelledby="tab-B">
        <div class="card-header" role="tab" id="heading-B">
          <h5 class="mb-0">
            <a class="collapsed" data-bs-toggle="collapse" href="#collapse-B" aria-expanded="false"
              aria-controls="collapse-B">
              Reviews
            </a>
          </h5>
        </div>
        <div id="collapse-B" class="collapse" role="tabpanel" aria-labelledby="heading-B">
          <div class="card-body">
            <div class="row justify-content-between">
              <div class="col-lg-6">
                <div class="review_content">
                  <?php foreach ($comment as $ct): ?>
                    <div class="clearfix add_bottom_10">
                      <span style="font-weight: 600;font-size: 24px; font-style: italic;"><?= $ct['bl_username'] ?></span>
                      <em>Published in <?= $ct['bl_ngaybinhluan'] ?></em>
                    </div>
                    <p><?= $ct['bl_noidung'] ?></p>
                  <?php endforeach; ?>
                </div>
                <!-- Add textarea for new comment -->
                <form method="post">
                  <input type="hidden" name="product_id" value="<?= $product['id'] ?>">
                  <textarea name="new_comment" rows="4" cols="50" required></textarea>
                  <button type="submit" class="btn btn-info">Submit</button>
                </form>
              </div>
            </div>
          </div>
          <!-- /card-body -->
        </div>
      </div>
      <!-- /tab B -->
    </div>
    <!-- /tab-content -->
  </div>
  <!-- /container -->
</div>
<!-- /tab_content_wrapper -->

<div class="container margin_60_35">
  <div class="main_title">
    <h2>Sản Phẩm Khác</h2>
  </div>
  <div class="owl-carousel owl-theme products_carousel">
    <?php foreach ($sp as $key => $value): ?>
      <div class="item">
        <div class="grid_item">
          <span class="ribbon new">New</span>
          <figure>
            <a href="<?= BASE_URL . '?act=detail&id=' . $value['id'] ?>">
              <img class="owl-lazy" src="img/products/product_placeholder_square_medium.jpg"
                data-src="<?= BASE_URL . 'uploads/' . $value['img'] ?>" alt="">
            </a>
          </figure>
          <div class="rating"><i class="icon-star voted"></i><i class="icon-star voted"></i><i
              class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star"></i></div>
          <a href="<?= BASE_URL . '?act=detail&id=' . $value['id'] ?>">
            <h3><?= $value['name'] ?></h3>
          </a>
          <div class="price_box">
            <span class="new_price"><?= number_format($value['price'], 0, '.', '.') ?>đ</span>
          </div>
          <ul>

            <li><a href="#0" class="tooltip-1" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to cart"><i
                  class="ti-shopping-cart"></i><span>Add to cart</span></a></li>
          </ul>
        </div>
        <!-- /grid_item -->
      </div>
      <!-- /item -->
    <?php endforeach ?>
  </div>
  <!-- /container -->

  <div class="feat">
    <div class="container">
      <ul>
        <li>
          <div class="box">
            <i class="ti-gift"></i>
            <div class="justify-content-center">
              <h3>Free Shipping</h3>
              <p>For all oders over $99</p>
            </div>
          </div>
        </li>
        <li>
          <div class="box">
            <i class="ti-wallet"></i>
            <div class="justify-content-center">
              <h3>Secure Payment</h3>
              <p>100% secure payment</p>
            </div>
          </div>
        </li>
        <li>
          <div class="box">
            <i class="ti-headphone-alt"></i>
            <div class="justify-content-center">
              <h3>24/7 Support</h3>
              <p>Online top support</p>
            </div>
          </div>
        </li>
      </ul>
    </div>
  </div>
  <!--/feat-->
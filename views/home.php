<!-- test -->

<?php

   require_once('components/slider-home.php')

?>

<ul id="banners_grid" class="clearfix">
    <li>
        <a href="<?= BASE_URL . '?act=shop' ?>" class="img_container">
            <img src="" data-src="<?= BASE_URL . 'uploads/' . 'iphone13.jpg' ?>" alt="" class="lazy">
            <div class="short_info opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.5)">
                <h3>New Product Apple</h3>
                <div><span class="btn_1">Shop Now</span></div>
            </div>
        </a>
    </li>
    <li>
        <a href="<?= BASE_URL . '?act=shop' ?>" class="img_container">
            <img src="" data-src="<?= BASE_URL . 'uploads/' . 'samsung.webp' ?>" alt="" class="lazy">
            <div class="short_info opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.5)">
                <h3>S23 Ultral</h3>
                <div><span class="btn_1">Shop Now</span></div>
            </div>
        </a>
    </li>
    <li>
        <a href="<?= BASE_URL . '?act=shop' ?>" class="img_container">
            <img src="img/banners_cat_placeholder.jpg" data-src="<?= BASE_URL . 'uploads/' . 'samsungz.webp' ?>" alt="" class="lazy">
            <div class="short_info opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.5)">
                <h3>SamSung Z FLip</h3>
                <div><span class="btn_1">Shop Now</span></div>
            </div>
        </a>
    </li>
</ul>
<!--/banners_grid -->

<div class="container margin_60_35">
    <div class="main_title">
        <h2>Top Selling</h2>
        <span>Products</span>
        <p>Cum doctus civibus efficiantur in imperdiet deterruisset</p>
    </div>
    <div class="row small-gutters">
        <?php foreach($dataProductTop8 as  $key => $value) : ?>
           
            <div class="col-6 col-md-4 col-xl-3">
            <div class="grid_item">
                <figure>
                    
                    <a href="<?= BASE_URL . '?act=detail&id=' . $value['id'] ?>">
                        <img class="img-fluid lazy" src="img/products/product_placeholder_square_medium.jpg" data-src="<?= BASE_URL . 'uploads/' . $value['img'] ?>" alt="">
                        <img class="img-fluid lazy" src="img/products/product_placeholder_square_medium.jpg" data-src="img/products/shoes/1_b.jpg" alt="">
                    </a>
                    <!-- <div data-countdown="2019/05/15" class="countdown"></div> -->
                </figure>
                <div class="rating"><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star"></i></div>
                <a href="<?= BASE_URL . '?act=detail&id=' . $value['id'] ?>">
                    <h3><?= $value['name'] ?></h3>
                </a>
                <div class="price_box">
                <span class="new_price"><?= number_format($value['price'], 0, ',') ?> VND</span>
                    
                </div>
                <ul>
                    <li><a href="#0" class="tooltip-1" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to favorites"><i class="ti-heart"></i><span>Add to favorites</span></a></li>
                    <li><a href="#0" class="tooltip-1" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to compare"><i class="ti-control-shuffle"></i><span>Add to compare</span></a></li>
                    <li><a href="#0" class="tooltip-1" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to cart"><i class="ti-shopping-cart"></i><span>Add to cart</span></a></li>
                </ul>
            </div>
            <!-- /grid_item -->
        </div>

        <?php endforeach ?>
       
   
    </div>
    <!-- /row -->
</div>
<!-- /container -->

<div class="featured lazy" data-bg="url(<?= BASE_URL . 'uploads/iphone13.jpg' ?>)">
    <div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(0, 0, 0, 0.5)">
        <div class="container margin_60">
            <div class="row justify-content-center justify-content-md-start">
                <div class="col-lg-6 wow" data-wow-offset="150">
                    <h3>Siêu<br>SALE</h3>
                    <p>Nhân ngày sinh nhật của shop</p>
                    <div class="feat_text_block">
                        <div class="price_box">
                           
                            <span class="new_price">90.000đ</span>
                            <span class="old_price">69.999đ</span>
                        </div>
                        <a class="btn_1" href="<?= BASE_URL . '?act=shop' ?>" role="button">Shop Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /featured -->

<div class="container margin_60_35">
    <div class="main_title">
        <h2>Featured</h2>
        <span>Products</span>
        <p>Cum doctus civibus efficiantur in imperdiet deterruisset</p>
    </div>
    <div class="owl-carousel owl-theme products_carousel">
    <?php foreach($dataProductTop8 as  $key => $value) : ?>

        <div class="item">
            <div class="grid_item">
                <span class="ribbon new">New</span>
                <figure>
                    <a href="<?= BASE_URL . '?act=detail&id=' . $value['id'] ?>">
                        <img class="owl-lazy" src="img/products/product_placeholder_square_medium.jpg" data-src="<?= BASE_URL . 'uploads/' . $value['img'] ?>" alt="">
                    </a>
                </figure>
                <div class="rating"><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star"></i></div>
                <a href="<?= BASE_URL . '?act=detail&id=' . $value['id'] ?>">
                    <h3><?= $value['name'] ?></h3>
                </a>
                <div class="price_box">
                    <span class="new_price"><?= number_format($value['price'], 0, ',') ?> VND</span>
                </div>
                <ul>
                    <li><a href="#0" class="tooltip-1" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to favorites"><i class="ti-heart"></i><span>Add to favorites</span></a></li>
                    <li><a href="#0" class="tooltip-1" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to compare"><i class="ti-control-shuffle"></i><span>Add to compare</span></a></li>
                    <li><a href="#0" class="tooltip-1" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to cart"><i class="ti-shopping-cart"></i><span>Add to cart</span></a></li>
                </ul>
            </div>
            <!-- /grid_item -->
        </div>
    <?php endforeach ?>

        
    </div>
    <!-- /products_carousel -->
</div>
<!-- /container -->

<div class="bg_gray">
    <div class="container margin_30">
        <div id="brands" class="owl-carousel owl-theme">
            <div class="item">
                <a href="#0"><img src="img/brands/placeholder_brands.png" data-src="img/brands/logo_1.png" alt="" class="owl-lazy"></a>
            </div><!-- /item -->
            <div class="item">
                <a href="#0"><img src="img/brands/placeholder_brands.png" data-src="img/brands/logo_2.png" alt="" class="owl-lazy"></a>
            </div><!-- /item -->
            <div class="item">
                <a href="#0"><img src="img/brands/placeholder_brands.png" data-src="img/brands/logo_3.png" alt="" class="owl-lazy"></a>
            </div><!-- /item -->
            <div class="item">
                <a href="#0"><img src="img/brands/placeholder_brands.png" data-src="img/brands/logo_4.png" alt="" class="owl-lazy"></a>
            </div><!-- /item -->
            <div class="item">
                <a href="#0"><img src="img/brands/placeholder_brands.png" data-src="img/brands/logo_5.png" alt="" class="owl-lazy"></a>
            </div><!-- /item -->
            <div class="item">
                <a href="#0"><img src="img/brands/placeholder_brands.png" data-src="img/brands/logo_6.png" alt="" class="owl-lazy"></a>
            </div><!-- /item -->
        </div><!-- /carousel -->
    </div><!-- /container -->
</div>
<!-- /bg_gray -->


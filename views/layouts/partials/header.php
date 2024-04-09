<?php
    try {
        $stmt = $GLOBALS['conn']->query("SELECT c.id_cart, c.soluong, sp.img, sp.name, c.tong_tien
FROM cart c
INNER JOIN variant v ON c.id_var = v.var_id
INNER JOIN sanpham sp ON v.id_pro = sp.id;");
        $productsss = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

?>
<header class="version_1">
    <div class="layer"></div><!-- Mobile menu overlay mask -->
    <div class="main_header">
        <div class="container">
            <div class="row small-gutters">
                <div class="col-xl-3 col-lg-3 d-lg-flex align-items-center">
                    <div id="logo">
                        <a href="<?= BASE_URL  ?>"><img src="<?= BASE_URL . 'uploads/' . 'moblilex.avif' ?>" alt="" width="100" height="45"></a>

                    </div>
                </div>
                <nav class="col-xl-6 col-lg-7">
                    <a class="open_close" href="javascript:void(0);">
                        <div class="hamburger hamburger--spin">
                            <div class="hamburger-box">
                                <div class="hamburger-inner"></div>
                            </div>
                        </div>
                    </a>
                    <!-- Mobile menu button -->
                    <div class="main-menu">

                        <ul>
                            <li>
                                <a href="<?= BASE_URL ?>">Home</a>
                            </li>
                            <li>
                                <a href="<?= BASE_URL . '?act=shop' ?>">Shop</a>
                            </li>

                            <li>
                              <a href="<?= BASE_URL . '?act=tracking' ?>">tracking</a>
                            </li>
                            
                           

                        </ul>
                    </div>
                    <!--/main-menu -->
                </nav>
                <div class="col-xl-3 col-lg-2 d-lg-flex align-items-center justify-content-end text-end">
                    <a class="phone_top" href="tel://9438843343"><strong><span>Cần Hỗ Trợ?</span>+84 999-999-99</strong></a>
                </div>
            </div>
            <!-- /row -->
        </div>
    </div>
    <!-- /main_header -->

    <div class="main_nav Sticky">
        <div class="container">
            <div class="row small-gutters">
                <div class="col-xl-3 col-lg-3 col-md-3">
                    <nav class="categories">
                        <ul class="clearfix">
                            <li><span>
                                    <a href="#">
                                        <span class="hamburger hamburger--spin">
                                            <span class="hamburger-box">
                                                <span class="hamburger-inner"></span>
                                            </span>
                                        </span>
                                        Danh Mục
                                    </a>
                                </span>
                                <div id="menu">
                                    <ul>
                                        <li><span><a href="#0">Điện Thoại</a></span>
                                            <ul>
                                                <li><a href="listing-grid-1-full.html">SamSung</a></li>
                                                <li><a href="listing-grid-2-full.html">Iphone</a></li>
                                            </ul>
                                        </li>
                                        <li><span><a href="#">Phụ Kiện</a></span>
                                            <ul>
                                                <li><a href="listing-grid-6-sidebar-left.html">Kính Cường Lực</a></li>
                                                <li><a href="listing-grid-7-sidebar-right.html">Óp Lưng</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </nav>
                </div>
                <div class="col-xl-6 col-lg-7 col-md-6 d-none d-md-block">
                    <div class="custom-search-input">
                        <input type="text" placeholder="Search">
                        <button type="submit"><i class="header-icon_search_custom"></i></button>
                    </div>
                </div>
                <?php
                    $productCount = count($productsss);
                    $totalPrice = 0;
                    foreach ($productsss as $pro) {
                        $totalPrice += $pro['tong_tien'];
                    }
                ?>
                <div class="col-xl-3 col-lg-2 col-md-3">
                    <ul class="top_tools">
                        <li>
                            <div class="dropdown dropdown-cart">
                                <a href="<?= BASE_URL . '?act=cart' ?>" class="cart_bt"><strong><?=$productCount ?></strong></a>
                                <div class="dropdown-menu">


                                  <ul>
                                      <?php foreach ($productsss as $pro): ?>
                                        <li>
                                          <a href="<?= BASE_URL . '?act=detail&id=' . $pro['id_cart'] ?>">
                                            <figure>
                                              <img src="img/products/product_placeholder_square_small.jpg" data-src="<?= BASE_URL . 'uploads/' . $pro['img'] ?>" alt="" width="50" height="50" class="lazy">
                                            </figure>
                                            <strong>
                                              <span>1x <?= htmlspecialchars($pro['name']) ?></span>
                                              <?= number_format($pro['tong_tien'], 2) ?>đ
                                            </strong>
                                          </a>
                                        </li>
                                      <?php endforeach; ?>
                                  </ul>


                                    <div class="total_drop">
                                        <div class="clearfix"><strong>Total</strong><span><?= $totalPrice ?> đ</span></div>
                                        <a href="<?= BASE_URL ?>?act=cart" class="btn_1 outline">View Cart</a><a href="checkout.html" class="btn_1">Checkout</a>
                                    </div>
                                </div>
                            </div>
                            <!-- /dropdown-cart-->
                        </li>
                      
                        <li>
                            <div class="dropdown dropdown-access">
                                <a href="<?= BASE_URL . '?act=login' ?>" class="access_link"><span>Account</span></a>
                                <div class="dropdown-menu">
                                    <a href="<?= BASE_URL . '?act=login' ?>" class="btn_1">Sign In or Sign Up</a>
                                    <ul>
                                        <li>
                                            <a href="track-order.html"><i class="ti-truck"></i>Track your Order</a>
                                        </li>
                                        <li>
                                            <a href="account.html"><i class="ti-package"></i>My Orders</a>
                                        </li>
                                        <li>
                                            <a href="account.html"><i class="ti-user"></i>My Profile</a>
                                        </li>
                                        <li>
                                            <a href="help.html"><i class="ti-help-alt"></i>Help and Faq</a>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                            <!-- /dropdown-access-->
                        </li>
                        <li>
                       
                        </li>
                        <li>
                            <a href="#menu" class="btn_cat_mob">
                                <div class="hamburger hamburger--spin" id="hamburger">
                                    <div class="hamburger-box">
                                        <div class="hamburger-inner"></div>
                                    </div>
                                </div>
                                Categories
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- /row -->
        </div>
        <div class="search_mob_wp">
            <input type="text" class="form-control" placeholder="Search over 10.000 products">
            <input type="submit" class="btn_1 full-width" value="Search">
        </div>
        <!-- /search_mobile -->
    </div>
    <!-- /main_nav -->
    
</header>
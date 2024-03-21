<?php
require_once "header.php";
?>
    <!-- ============================================================= Header End ============================================================= -->
    <div id="content" class="site-content">
        <div class="col-full">
            <div class="row">
                <nav class="woocommerce-breadcrumb">
                    <a href="home-v1.php">Home</a>
                    <span class="delimiter">
                                <i class="tm tm-breadcrumbs-arrow-right"></i>
                            </span>
                    Theo dõi đơn hàng
                </nav>
                <!-- .woocommerce-breadcrumb -->
                <div id="primary" class="content-area">
                    <main id="main" class="site-main">
                        <div class="type-page hentry">
                            <header class="entry-header">
                                <div class="page-header-caption">
                                    <h1 class="entry-title">Theo dõi đơn hàng</h1>
                                </div>
                            </header>
                            <!-- .entry-header -->
                            <div class="entry-content">
                                <div class="woocommerce">
                                    <form class="track_order" method="post" action="#">
                                        <p>Để theo dõi đơn hàng của bạn, vui lòng nhập Mã đơn hàng của bạn vào ô bên dưới và nhấn nút "Theo dõi". Mã này đã được cung cấp trong hóa đơn và trong email xác nhận mà bạn nên đã nhận được.</p>
                                        <p class="form-row form-row-first">
                                            <label for="orderid">Mã Đơn Hàng</label>
                                            <input type="text" placeholder="Found in your order confirmation email." id="orderid" name="orderid" class="input-text">
                                        </p>
                                        <p class="form-row form-row-last">
                                            <label for="order_email">Email thanh toán</label>
                                            <input type="text" placeholder="Email you used during checkout." id="order_email" name="order_email" class="input-text">
                                        </p>
                                        <div class="clear"></div>
                                        <p class="form-row">
                                            <input type="submit" class="button" name="track" value="Tra Cứu" />
                                        </p>
                                    </form>
                                    <!-- .track_order -->
                                </div>
                                <!-- .woocommerce -->
                            </div>
                            <!-- .entry-content -->
                        </div>
                        <!-- .hentry -->
                    </main>
                    <!-- #main -->
                </div>
                <!-- #primary -->
            </div>
            <!-- .row -->
        </div>
        <!-- .col-full -->
    </div>
    <!-- #content -->

    <?php
require_once "footer.php";
?>
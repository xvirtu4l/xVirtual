<?php
require_once "header.php";
?>
    <!-- .header-v1 -->
    <!-- ============================================================= Header End ============================================================= -->
    <div id="content" class="site-content">
        <div class="col-full">
            <div class="row">
                <nav class="woocommerce-breadcrumb">
                    <a href="home-v1.php">Home</a>
                    <span class="delimiter">
                                <i class="tm tm-breadcrumbs-arrow-right"></i>
                            </span>Error 404
                </nav>
                <div id="primary" class="content-area">
                    <main id="main" class="site-main">
                        <div class="error404">
                            <div class="info-404">
                                <h2 class="title">404!</h2>
                                <p class="lead error-text">Xin lỗi! Trang đó không thể được tìm thấy.</p>
                                <p class="lead">Không có gì được tìm thấy tại vị trí này. Hãy thử tìm kiếm, hoặc kiểm tra các liên kết dưới đây</p>
                                <div class="sub-form-row">
                                    <div class="widget woocommerce widget_product_search">
                                        <form class="search-form">
                                            <input type="text" placeholder="Tìm kiếm sản phẩm...">
                                            <button class="button" type="button">Tìm kiếm</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- .sub-form-row -->
                        </div>
                        <!-- .error404 -->
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
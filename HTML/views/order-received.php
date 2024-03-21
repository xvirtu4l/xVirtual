<?php
require_once "header.php";
?>
    <!-- ============================================================= Header End ============================================================= -->

    <div id="content" class="site-content" tabindex="-1">
        <div class="col-full">
            <div class="row">
                <nav class="woocommerce-breadcrumb">
                    <a href="home-v1.php">Home</a>
                    <span class="delimiter"><i class="tm tm-breadcrumbs-arrow-right"></i></span>
                    <a href="checkout.php">Checkout</a>
                    <span class="delimiter"><i class="tm tm-breadcrumbs-arrow-right"></i></span>Order received
                </nav>
                <!-- .woocommerce-breadcrumb -->

                <div id="primary" class="content-area">
                    <main id="main" class="site-main">
                        <div class="page hentry">

                            <div class="entry-content">
                                <div class="woocommerce">
                                    <div class="woocommerce-order">

                                        <p class="woocommerce-notice woocommerce-notice--success woocommerce-thankyou-order-received">Cảm ơn bạn. Đơn đặt hàng của bạn đã được nhận.</p>

                                        <ul class="woocommerce-order-overview woocommerce-thankyou-order-details order_details">

                                            <li class="woocommerce-order-overview__order order">
                                                Order number:<strong>3001</strong>
                                            </li>

                                            <li class="woocommerce-order-overview__date date">
                                                Date:<strong>20/11/2023</strong>
                                            </li>


                                            <li class="woocommerce-order-overview__total total">
                                                Total:<strong><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol"></span>25.000.000đ</span></strong>
                                            </li>

                                            <li class="woocommerce-order-overview__payment-method method">
                                              Phương thức thanh toán: <strong>Chuyển khoản ngân hàng</strong>
                                            </li>

                                        </ul>
                                        <!-- .woocommerce-order-overview -->


                                        <section class="woocommerce-order-details">
                                            <h2 class="woocommerce-order-details__title">Order details</h2>

                                            <table class="woocommerce-table woocommerce-table--order-details shop_table order_details">

                                                <thead>
                                                <tr>
                                                    <th class="woocommerce-table__product-name product-name">Product</th>
                                                    <th class="woocommerce-table__product-table product-total">Total</th>
                                                </tr>
                                                </thead>

                                                <tbody>
                                                <tr class="woocommerce-table__line-item order_item">

                                                    <td class="woocommerce-table__product-name product-name">
                                                        <a href="single-product-fullwidth.php">Snap White Instant Digital Camera in White</a>
                                                        <strong class="product-quantity">× 1</strong>
                                                    </td>

                                                    <td class="woocommerce-table__product-total product-total">
                                                        <span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol"></span>15.000.000đ</span>
                                                    </td>

                                                </tr>

                                                <tr class="woocommerce-table__line-item order_item">

                                                    <td class="woocommerce-table__product-name product-name">
                                                        <a href="single-product-fullwidth.php">XPS 13 Laptop 6GB W10 Infinity Edge Display</a>
                                                        <strong class="product-quantity">× 1</strong>
                                                    </td>

                                                    <td class="woocommerce-table__product-total product-total">
                                                        <span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol"></span>15.000.000đ</span>
                                                    </td>

                                                </tr>

                                                </tbody>

                                                <tfoot>
                                                <tr>
                                                    <th scope="row">Subtotal:</th>
                                                    <td><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol"></span>25.000.000đ
</span></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Shipping:</th>
                                                    <td><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol"></span>100.00</span>&nbsp;<small class="shipped_via">via Normal Delivery</small></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Phương thức thanh toán:</th>
                                                    <td>Chuyển khoản ngân hàng</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Total:</th>
                                                    <td><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol"></span>25.000.000đ
</span></td>
                                                </tr>
                                                </tfoot>
                                            </table>
                                            <!-- .woocommerce-table -->
                                        </section>
                                        <!-- .woocommerce-order-details -->


                                    </div>
                                    <!-- .woocommerce-order -->
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
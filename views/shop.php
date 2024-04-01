<div class="top_banner">
    <div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(0, 0, 0, 0.3)">
        <div class="container">
            <div class="breadcrumbs">
                <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Danh Mục</a></li>
                    <li>Tất Cả</li>
                </ul>
            </div>
            <h1>Tất Cả</h1>
        </div>
    </div>
    <img src="<?=  BASE_URL . "uploads/" . 'samsungz.webp' ?>" class="img-fluid" alt="">
</div>
<!-- /top_banner -->
<div id="stick_here"></div>
<div class="toolbox elemento_stick">
    <div class="container">
        <ul class="clearfix">
            <!-- <li>
                <div class="sort_select">
                    <select name="sort" id="sort">
                        <option value="popularity" selected="selected">Sort by popularity</option>
                        <option value="rating">Sort by average rating</option>
                        <option value="date">Sort by newness</option>
                        <option value="price">Sort by price: low to high</option>
                        <option value="price-desc">Sort by price: high to
                    </select>
                </div>
            </li> -->
            <!-- <li>
                <a href="#0"><i class="ti-view-grid"></i></a>
                <a href="listing-row-1-sidebar-left.html"><i class="ti-view-list"></i></a>
            </li>
            <li>
                <a href="#0" class="open_filters">
                    <i class="ti-filter"></i><span>Filters</span>
                </a>
            </li> -->
        </ul>
    </div>
</div>
<!-- /toolbox -->

<div class="container margin_30">

    <div class="row">
        <aside class="col-lg-3" id="sidebar_fixed">
            <div class="filter_col">
                <div class="inner_bt"><a href="#" class="open_filters"><i class="ti-close"></i></a></div>
                <div class="filter_type version_2">
                    <h4><a href="#filter_1" data-bs-toggle="collapse" class="opened">Điện Thoại</a></h4>
                    <div class="collapse show" id="filter_1">
                        <ul>
                            <li>
                                <label class="container_check">Iphone <small>10</small>
                                    <input type="checkbox">
                                    <span class="checkmark"></span>
                                </label>
                            </li>
                            <li>
                                <label class="container_check">SamSung <small>10</small>
                                    <input type="checkbox">
                                    <span class="checkmark"></span>
                                </label>
                            </li>
                           
                        </ul>
                    </div>
                    <!-- /filter_type -->
                </div>
                <!-- /filter_type -->
                <div class="filter_type version_2">
                    <h4><a href="#filter_2" data-bs-toggle="collapse" class="opened">Phụ Kiện</a></h4>
                    <div class="collapse show" id="filter_2">
                        <ul>
                            <li>
                                <label class="container_check">Kính Cường Lực <small>06</small>
                                    <input type="checkbox">
                                    <span class="checkmark"></span>
                                </label>
                            </li>
                            <li>
                                <label class="container_check">Giá Đỡ Điện Thoại <small>12</small>
                                    <input type="checkbox">
                                    <span class="checkmark"></span>
                                </label>
                            </li>
                            
                            </li>
                           </li>
                        </ul>
                    </div>
                </div>
                <!-- /filter_type -->
                <!-- <div class="filter_type version_2">
                    <h4><a href="#filter_3" data-bs-toggle="collapse" class="closed">Brands</a></h4>
                    <div class="collapse" id="filter_3">
                        <ul>
                            <li>
                                <label class="container_check">Adidas <small>11</small>
                                    <input type="checkbox">
                                    <span class="checkmark"></span>
                                </label>
                            </li>
                            <li>
                                <label class="container_check">Nike <small>08</small>
                                    <input type="checkbox">
                                    <span class="checkmark"></span>
                                </label>
                            </li>
                            <li>
                                <label class="container_check">Vans <small>05</small>
                                    <input type="checkbox">
                                    <span class="checkmark"></span>
                                </label>
                            </li>
                            <li>
                                <label class="container_check">Puma <small>18</small>
                                    <input type="checkbox">
                                    <span class="checkmark"></span>
                                </label>
                            </li>
                        </ul>
                    </div>
                </div> -->
                <!-- /filter_type -->
                <!-- <div class="filter_type version_2">
                    <h4><a href="#filter_4" data-bs-toggle="collapse" class="closed">Price</a></h4>
                    <div class="collapse" id="filter_4">
                        <ul>
                            <li>
                                <label class="container_check">$0 — $50<small>11</small>
                                    <input type="checkbox">
                                    <span class="checkmark"></span>
                                </label>
                            </li>
                            <li>
                                <label class="container_check">$50 — $100<small>08</small>
                                    <input type="checkbox">
                                    <span class="checkmark"></span>
                                </label>
                            </li>
                            <li>
                                <label class="container_check">$100 — $150<small>05</small>
                                    <input type="checkbox">
                                    <span class="checkmark"></span>
                                </label>
                            </li>
                            <li>
                                <label class="container_check">$150 — $200<small>18</small>
                                    <input type="checkbox">
                                    <span class="checkmark"></span>
                                </label>
                            </li>
                        </ul>
                    </div>
                </div> -->
                <!-- /filter_type -->
                <div class="buttons">
                    <a href="#0" class="btn_1">Filter</a> <a href="#0" class="btn_1 gray">Reset</a>
                </div>
            </div>
        </aside>
        <!-- /col -->
        <div class="col-lg-9">
            <div class="row small-gutters">
                <?php foreach ($dataProduct as $key => $value) : ?>
                     
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
                                <li><a href="#0" class="tooltip-1" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to cart"><i class="ti-shopping-cart"></i><span>Add to cart</span></a></li>
                            </ul>
                        </div>
                        <!-- /grid_item -->
                    </div>

                <?php endforeach ?>

            

            </div>
            <!-- /row -->
            <div class="pagination__wrapper">
                <ul class="pagination">
                    <li><a href="<?= BASE_URL  ?>?act=shop&page=<?= ($i > 1) ? ($i -1) : 1 ?>" class="prev" title="previous page">&#10094;</a></li>
                    
                    <?php  for($page = 1; $page <= $total_i; $page++) :  ?>
                
                    <li>
                        <a href="<?= BASE_URL . '?act=shop&page=' . $page ?>" class="<?= ($page==$i) ? "active" : '' ?>"><?= $page ?></a>
                    </li>

                     <?php endfor ?>

                    
                    <li><a href="<?= BASE_URL  ?>?act=shop&page=<?= ($i==$total_i) ? $i : ($i + 1) ?>" class="next" title="next page">&#10095;</a></li>
                </ul>
            </div>
        </div>
        <!-- /col -->
    </div>
    <!-- /row -->

</div>
<!-- /container -->
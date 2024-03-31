<?php

function shopIndex(){
    $title          = 'Shop';
    $view           = 'shop';
    
    $i = $GLOBALS['page'];
    $limit = 3; // số lượng sp muốn để trên 1 trang
    $initial_page = ($i - 1) * $limit;
    $dataProduct    = selectAllProduct($limit, $initial_page);
    $total_rows = getTotalPageProducts();
    $total_i = ceil($total_rows / $limit);
    
    require_once PATH_VIEW . 'layouts/master.php';
}

function detail_product() {
    $title      = 'detail_product';
    $view       = 'detail-product';
    $components = 'detail-product';
    $script     = 'detail';
    


    $id                    = $_GET['id'] ?? null;
    $product               = selectOneProduct($id);
    $variantall            = selectAllVariants($id);
    require_once PATH_VIEW . 'layouts/master.php';

}




?>
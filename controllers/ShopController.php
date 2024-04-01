<?php

function shopIndex(){
    $title = 'Shop';
    $view = 'shop';
    $dataProduct = selectAllProduct();
    
    $i             = $GLOBALS['page'];
    $limit         = 3;
    $initial_page  = ($i - 1) * $limit;
    $dataProduct   = selectAllProductPhantrang($limit, $initial_page);
    $total_rows    = getTotalPageProduct();
    $total_i       = ceil($total_rows / $limit);
    
    require_once PATH_VIEW . 'layouts/master.php';
}

function detail_product() {
    $title      = 'detail_product';
    $view       = 'detail-product';
    $components = 'detail-product';
    $script     = 'detail';
    

    
    $id          = $_GET['id'] ?? null;
    $product     = selectOneProduct($id);
    $sp          = top6Product();
    
    require_once PATH_VIEW . 'layouts/master.php';

}




?>
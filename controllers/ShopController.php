<?php

function shopIndex(){
    $title = 'Shop';
    $view = 'shop';
    $dataProduct = selectAllProduct();

    require_once PATH_VIEW . 'layouts/master.php';
}

function detail_product() {
    $title      = 'detail_product';
    $view       = 'detail-product';
    $components = 'detail-product';
    $script     = 'detail';
    


    $id         = $_GET['id'] ?? null;
    $product    = selectOneProduct($id);

    require_once PATH_VIEW . 'layouts/master.php';

}




?>
<?php 

function homeIndex() {
    
    $view   = 'home';
    $script = 'home';
    $dataProductTop8 = top8Product();
    $dataProduct = selectAllProduct();
//    $variant = getVariantById($var_id);
//    $firstVariant = getFirstVariantByProductId($product_id);
    require_once PATH_VIEW . 'layouts/master.php';
}
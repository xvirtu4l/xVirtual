<?php

function shopIndex(){
    $title          = 'Shop';
    $view           = 'shop';
    
    $i = $GLOBALS['page'];
    $limit = 3; // số lượng sp muốn để trên 1 trang
    $initial_page = ($i - 1) * $limit;
    $dataProduct    = selectAllProductPhantrang($limit, $initial_page);
    $total_rows = getTotalPageProduct();
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
    $sp                    = top6Product();
    $variantall            = selectAllVariants($id);
    $variant_pro = getFirstVariantByProductId($id);
    $distinctcolor         = selectDistinctColors($id);
    $distinctstorage       = selectDistinctStorage($id);
    $stock                 = OutofStock($id);
    $number_row            = countVariant($id);
    require_once PATH_VIEW . 'layouts/master.php';

}

    function trackingIndex()
    {
        $view = 'tracking';
        $title = 'tracking';
        $id = $_GET[''] ?? null;
        $order = selectAlldonhang($id);

        require_once PATH_VIEW . 'layouts/master.php';
    }

?>
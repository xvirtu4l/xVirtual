<?php

function shopIndex()
{
    $title          = 'Shop';
    $view           = 'shop';

    $i = $GLOBALS['page'];
    $limit = 6; // số lượng sp muốn để trên 1 trang
    $initial_page = ($i - 1) * $limit;
    $dataProduct    = selectAllProductPhantrang($limit, $initial_page);
    $total_rows = getTotalPageProduct();
    $act = $GLOBALS['act'];

    if (isset($_GET['category'])) {
        $category = $_GET['category'];
        switch ($category) {
            case 'dien-thoai':
                $id = 5;
                $dataProduct = selectAllProductPhantrangCategory($limit, $initial_page, $id);
                $total_rows = getTotalPageProductCategory($id);
                break;
            case 'laptop':
                $id = 6;
                $dataProduct = selectAllProductPhantrangCategory($limit, $initial_page, $id);
                $total_rows = getTotalPageProductCategory($id);
                break;
            case 'phu-kien':
                $id = 7;
                $dataProduct = selectAllProductPhantrangCategory($limit, $initial_page, $id);
                $total_rows = getTotalPageProductCategory($id);
                break;
        }
    }

    $total_i = ceil($total_rows / $limit);

    require_once PATH_VIEW . 'layouts/master.php';
}

function detail_product()
{
    $title      = 'detail_product';
    $view       = 'detail-product';
    $components = 'detail-product';
    $script     = 'detail';



    $id                    = $_GET['id'] ?? null;
    $product               = selectOneProduct($id);
    $sp                    = top8Product();
    $variantall            = selectAllVariants($id);
    $variant_pro = getFirstVariantByProductId($id);
    $distinctcolor         = selectDistinctColors($id);
    $distinctstorage       = selectDistinctStorage($id);
    $stock                 = OutofStock($id);
    $number_row            = countVariant($id);
    $comment               = selectAllCommentsByID($id);
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

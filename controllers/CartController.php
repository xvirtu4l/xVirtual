<?php
require_once PATH_MODEL . 'Cart.php';
function cartIndex()
{

    $view = 'cart';


    require_once PATH_VIEW . 'layouts/master.php';
}


function cartDelete()
{
    $id = $_GET['id'];

    deleteOneCart($id);
    header("location: " .BASE_URL . '?act=cart');
}

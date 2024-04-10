<?php
function checkout() {

    $id                    = $_GET['id'] ?? null;
    $idcart                = $_GET['id_cart'] ?? null;
    $idpay                 = $_GET['id_pt'] ?? null;
    $dataCheckout          = checkoutdetail($id);
    $dataCart              = selectcartsingle($idcart);
    $dataMethod            = callpt();
    require_once PATH_VIEW . 'layouts/master.php';

}
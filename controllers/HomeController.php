<?php 

function homeIndex() {
    
    $view   = 'home';
    $script = 'home';
    $dataProductTop8 = top6Product();
    $dataProduct = selectAllProduct();

    require_once PATH_VIEW . 'layouts/master.php';
}



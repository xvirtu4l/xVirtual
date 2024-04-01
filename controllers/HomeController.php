<?php 

function homeIndex() {
    
    $view   = 'home';
    $script = 'home';
    $dataProduct = selectAllProduct();

    require_once PATH_VIEW . 'layouts/master.php';
}



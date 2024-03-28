<?php 

function homeIndex() {
    
    $view   = 'home';
    $script = 'home';
    $dataProductTop8 = selectAllProduct();

    require_once PATH_VIEW . 'layouts/master.php';
}



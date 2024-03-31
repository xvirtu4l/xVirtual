<?php 

function homeIndex() {
    
    $view   = 'home';
    $script = 'home';
    $dataProductTop8 = selectAllProducts1();

    require_once PATH_VIEW . 'layouts/master.php';
}



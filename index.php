<?php 

// Require file trong commons
require_once './commons/env.php';
require_once './commons/helper.php';
require_once './commons/connect-db.php';
require_once './commons/model.php';


// Require file trong controllers và models
require_file(PATH_CONTROLLER);
require_file(PATH_MODEL);

// Điều hướng
$act = $_GET['act'] ?? '/';
$page = $_GET['page'] ?? 1;


match($act) {
    '/'      => homeIndex(),
    'shop'   => shopIndex(),
    'detail' => detail_product(),
    'login'  => loginIndex(),
    'logup'  => logupIndex(),
};

require_once './commons/disconnect-db.php';
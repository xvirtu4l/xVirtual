<?php

session_start();

// Require file trong commons
require_once './commons/env.php';
require_once './commons/helper.php';
require_once './commons/connect-db.php';
require_once './commons/model.php';


// Require file trong controllers và models
require_file(PATH_CONTROLLER);
require_file(PATH_MODEL);

// Điều hướng
$act  = $_GET['act'] ?? '/';
$page = $_GET['page'] ?? 1;
#a
match($act) {
    '/'         => homeIndex(),
    'account'   => accountIndex(),
    'shop'      => shopIndex(),
    'detail'    => detail_product(),
    'login'     => loginIndex(),
    'logup'     => logupIndex(),
    'logout'    => logoutIndex(),
    'cart'      => cartIndex(),
    'cart-delete' => cartDelete(),
    'cart-session-delete' => cartSessionDelete(),
    'checkout'  => checkoutIndex(),
    'perfect'   => pfIndex(),
    'tracking' => trackingIndex(),
    // 'icon_cart_delete' => iconCartDelete($_GET['id']),
    'search' => searchIndex()
};

require_once './commons/disconnect-db.php';
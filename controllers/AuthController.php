<?php
    function loginIndex() {

        $view = 'login';


        require_once PATH_VIEW . 'layouts/master.php';
    }

    function logupIndex() {

        $view = 'sign';


        require_once PATH_VIEW . 'layouts/master.php';
    }

    function    cartIndex() {

        $view = 'cart';
        $carts = show_all_products_in_card();


        require_once PATH_VIEW . 'layouts/master.php';
    }
    function cartDelete($id) {
        $result = deleteCartItem($id);
        if ($result) {
            header('Location: ' . BASE_URL . '?act=cart');
            exit();
        } else {
            echo "ERROR";
        }
    }
    function iconCartDelete()
    {
        $result = deleteCartItem($id);
        if ($result) {
            header('Location: ' . BASE_URL);
            exit();
        } else {
            echo "ERROR";
        }
    }

    function checkoutIndex() {

        $view = 'checkout';


        require_once PATH_VIEW . 'layouts/master.php';
    }


    function pfIndex() {

        $view = 'perfect';


        require_once PATH_VIEW . 'layouts/master.php';
    }


    function searchIndex()
    {
        $view = 'search';

        require_once PATH_VIEW . 'layouts/master.php';

    }
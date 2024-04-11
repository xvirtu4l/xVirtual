<?php

require_once PATH_MODEL . 'User.php';
function loginIndex()
{

    $view = 'login';

    if (isset($_POST['submit'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $user = authlogin($email);
        if (empty($email)) {
            $_SESSION['error']['email'] = 'Vui long nhap email';
        } else {
            unset($_SESSION['error']['email']);
        }

        if (empty($password)) {
            $_SESSION['error']['password'] = 'Vui long nhap password';
        } else {
            unset($_SESSION['error']['password']);
        }

        if (!empty($_SESSION['error'])) {
            header('Location: ' . BASE_URL . '?act=login');
        } else {
            if ($user && $password == $user['pass']) {

                setcookie("message", "Đăng nhập thành công", time() + 1);
                $_SESSION['user'] = [
                    'id' => $user['id'],
                    'user' => $user['user'],
                    'email' => $user['email'],
                ];
                if ($user['role'] == 1) {
                    header('Location: ' . BASE_URL_ADMIN);
                } else {
                    header('Location: ' . BASE_URL);
                }
            } else {
                setcookie("message", "Email hoac password khong dung. Vui long kiem tra lai", time() + 1);
                header('Location: ' . BASE_URL . '?act=login');
            }
        }
    }


    require_once PATH_VIEW . 'layouts/master.php';
}

function logupIndex()
{

    $view = 'sign';

    if (isset($_POST['submit'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $user = $_POST['user'];
        $address = $_POST['address'];
        $tel = $_POST['tel'];
        if (empty($email)) {
            $_SESSION['error']['email'] = 'Vui long nhap email';
        } else {
            unset($_SESSION['error']['email']);
        }

        if (empty($password)) {
            $_SESSION['error']['password'] = 'Vui long nhap password';
        } else {
            unset($_SESSION['error']['password']);
        }

        if (empty($user)) {
            $_SESSION['error']['user'] = 'Vui long nhap ten dang nhap';
        } else {
            unset($_SESSION['error']['user']);
        }

        if (empty($address)) {
            $_SESSION['error']['address'] = 'Vui long nhap dia chi';
        } else {
            unset($_SESSION['error']['address']);
        }

        if (empty($tel)) {
            $_SESSION['error']['tel'] = 'Vui long nhap so dien thoai';
        } else {
            unset($_SESSION['error']['tel']);
        }

        if (!empty($_SESSION['error'])){
            header('Location: ' . BASE_URL . '?act=logup');
        }else{
            insertUser($user,$password,$email,$address,$tel);
            setcookie("message", "Đăng ky thành công", time() + 1);
            header('Location: ' . BASE_URL . '?act=login');
            
        }
    }



    require_once PATH_VIEW . 'layouts/master.php';
}

function checkoutIndex()
{

    $view = 'checkout';


    require_once PATH_VIEW . 'layouts/master.php';
}


function pfIndex()
{

    $view = 'perfect';


    require_once PATH_VIEW . 'layouts/master.php';
}


function searchIndex()
{
    $view = 'search';

    require_once PATH_VIEW . 'layouts/master.php';
}


function logoutIndex()
{

    unset($_SESSION['user']);
    setcookie("message", "Đăng xuất thành công", time() + 1);
    header('Location: ' . BASE_URL . '?act=login');
}

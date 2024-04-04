<?php

function authenShowFormLogin() {
    if (!empty($_POST)) {
        authenLogin();
    }

    require_once PATH_VIEW_ADMIN . 'authen/login.php';
}

function authenLogin() {

    $user = getUserAdminByEmailAndPassword($_POST['email'], $_POST['password']);
    var_dump($user);
    if (empty($user)) {
        $_SESSION['error'] = 'Email hoặc password chưa đúng!';

        header('Location: ' . BASE_URL_ADMIN . '?act=login');
        exit();
    } else {
        $_SESSION['user'] = $user;
        echo '<script type="text/javascript">  
                alert("Bạn đang đăng nhập với tư cách quản trị viên");
                window.location.href="' . BASE_URL_ADMIN . '";
             </script>';
        exit();

    }


}

function authenLogout() {
    if (!empty($_SESSION['user'])) {
        session_destroy();
    }

    header('Location: ' . BASE_URL);
    exit();
}
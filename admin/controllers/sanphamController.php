<?php

function sanphamListAll()
{
    $title = 'Danh sách sản phẩm';
    $view = 'sanpham/index';
    $script = 'datatable';
    $script2 = 'sanpham/script';
    $style = 'datatable';

    $users = listAll('sanpham');

    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}

function sanphamShowOne($id)
{
    $user = showOne('sanpham', $id);

    if(empty($user)) {
        e404();
    }

    $title = $user['name'];
    $view = 'sanpham/show';

    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}

function sanphamCreate()
{
    $title = 'Thêm mới sản phẩm';
    $view = 'sanpham/create';

    if (!empty($_POST)) {

        $data = [
          "user" => $_POST['user'] ?? null,
          "email" => $_POST['email'] ?? null,
          "pass" => $_POST['pass'] ?? null,
          "role" => $_POST['role'] ?? null,
          "address" => $_POST['address'] ?? null,
          "tel" => $_POST['tel'] ?? null,
        ];

        validateUserCreate($data);

        insert('sanpham', $data);

        $_SESSION['success'] = 'Thao tác thành công!';

        header('Location: ' . BASE_URL_ADMIN . '?act=users');
        exit();
    }

    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}

function validatesanphamCreate($data) {
    // name - bắt buộc, độ dài tối đa 50 ký tự
    // email - bắt buộc, phải là email, không được trùng
    // password - bắt buộc, đồ dài nhỏ nhất là 8, lớn nhất là 20
    // type - bắt buộc, nó phải là 0 or 1

    $errors = [];

    if (empty($data['user'])) {
        $errors[] = 'Trường name là bắt buộc';
    }
    else if(strlen($data['user']) > 50) {
        $errors[] = 'Trường name độ dài tối đa 50 ký tự';
    }

    if (empty($data['email'])) {
        $errors[] = 'Trường email là bắt buộc';
    }
    else if(!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Trường email không đúng định dạng';
    }
    else if(! checkUniqueEmail('taikhoan', $data['email'])) {
        $errors[] = 'Email đã được sử dụng';
    }

    if (empty($data['pass'])) {
        $errors[] = 'password là bắt buộc';
    }
    else if(preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,20}$/', $data['pass'])) {
        $errors[] = 'Password phải bao gồm ít nhất một chữ cái viết hoa, một chữ cái thường, một số và một ký tự đặc biệt';
    }
    if (empty($data['address'])) {
        $errors[] = 'address là bắt buộc';
    }
    else if(strlen($data['address']) > 50) {
        $errors[] = 'address độ dài tối đa 50 ký tự';
    }
    if (empty($data['tel'])) {
        $errors[] = 'tel là bắt buộc';
    }
    else if(is_int($data['tel'])) {
        $errors[] = 'Phone độ dài tối đa 50 ký tự';
    }

    if ($data['role'] === null) {
        $errors[] = 'Trường type là bắt buộc';
    }
    else if(! in_array($data['role'], [0, 1])) {
        $errors[] = 'Trường type phải là 0 or 1';
    }

    if (!empty($errors)) {
        $_SESSION['errors'] = $errors;
        $_SESSION['data'] = $data;

        header('Location: ' . BASE_URL_ADMIN . '?act=user-create');
        exit();
    }
}

function sanphamUpdate($id)
{
    $user = showOne('sanpham', $id);

    if(empty($user)) {
        e404();
    }

    $title = 'Cập nhật: ' . $user['name'];
    $view = 'sanpham/update';

    if (!empty($_POST)) {
        $data = [
          "user" => $_POST['user'] ?? $user['user'],
          "email" => $_POST['email'] ?? $user['email'],
          "pass" => $_POST['pass'] ?? $user['pass'],
          "role" => $_POST['role'] ?? $user['role'],
        ];

        validateUserUpdate($id, $data);

        update('taikhoan', $id, $data);

        $_SESSION['success'] = 'Thao tác thành công!';

        header('Location: ' . BASE_URL_ADMIN . '?act=user-update&id=' . $id);
        exit();
    }

    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}

function validatesanphamUpdate($id, $data) {
    // name - bắt buộc, độ dài tối đa 50 ký tự
    // email - bắt buộc, phải là email, không được trùng
    // password - bắt buộc, đồ dài nhỏ nhất là 8, lớn nhất là 20
    // type - bắt buộc, nó phải là 0 or 1

    $errors = [];

    if (empty($data['user'])) {
        $errors[] = 'Trường name là bắt buộc';
    }
    else if(strlen($data['user']) > 50) {
        $errors[] = 'Trường name độ dài tối đa 50 ký tự';
    }

    if (empty($data['email'])) {
        $errors[] = 'Trường email là bắt buộc';
    }
    else if(!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Trường email không đúng định dạng';
    }
    else if(! checkUniqueEmailForUpdate('taikhoan', $id, $data['email'])) {
        $errors[] = 'Email đã được sử dụng';
    }

    if (empty($data['pass'])) {
        $errors[] = 'Trường password là bắt buộc';
    }
    else if(strlen($data['pass']) < 8 || strlen($data['pass']) > 20) {
        $errors[] = 'Trường password đồ dài nhỏ nhất là 8, lớn nhất là 20';
    }


    if ($data['role'] === null) {
        $errors[] = 'Trường type là bắt buộc';
    }
    else if(! in_array($data['role'], [0, 1])) {
        $errors[] = 'Trường type phải là 0 or 1';
    }

    if (!empty($errors)) {
        $_SESSION['errors'] = $errors;

        header('Location: ' . BASE_URL_ADMIN . '?act=user-update&id=' . $id);
        exit();
    }
}

function sanphamDelete($id)
{
    delete2('sanpham', $id);

    $_SESSION['success'] = 'Thao tác thành công!';

    header('Location: ' . BASE_URL_ADMIN . '?act=users');
    exit();
}

<?php

function userListAll()
{
    $title = 'Danh sách user';
    $view = 'users/index';
    $script = 'datatable';
    $script2 = 'users/script';
    $style = 'datatable';

    $users = listAll('taikhoan');

    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}

function userShowOne($id)
{
    $user = showOne('taikhoan', $id);

    if(empty($user)) {
        e404();
    }

    $title = $user['user'];
    $view = 'users/show';

    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}

function userCreate()
{
    $title = 'Thêm mới user';
    $view = 'users/create';

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

        insert('taikhoan', $data);

        $_SESSION['success'] = 'Thao tác thành công!';

        header('Location: ' . BASE_URL_ADMIN . '?act=users');
        exit();
    }

    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}

function validateUserCreate($data) {


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

function userUpdate($id)
{
    $user = showOne('taikhoan', $id);

    if(empty($user)) {
        e404();
    }

    $title = 'Cập nhật User: ' . $user['user'];
    $view = 'users/update';

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

function validateUserUpdate($id, $data) {
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

function userDelete($id)
{
    delete2('taikhoan', $id);

    $_SESSION['success'] = 'Thao tác thành công!';

    header('Location: ' . BASE_URL_ADMIN . '?act=users');
    exit();
}

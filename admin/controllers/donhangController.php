<?php

function donhangListAll()
{
    $title = 'Danh sách đơn hàng';
    $view = 'donhang/index';
    $script = 'datatable';
    $script2 = 'donhang/script';
    $style = 'datatable';

    $donhang = listAlldonhang('donhang');

    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}

function donhangShowOne($id)
{
    $donhang = showOnedonhang('donhang', $id);

    if(empty($donhang)) {
        e404();
    }

    $title = 'Chi tiết đơn hàng: ' . $donhang['name'];
    $view = 'donhang/show';

    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}

function donhangCreate()
{
    $title = 'Thêm mới đơn hàng';
    $view = 'donhang/create';

    if (!empty($_POST)) {

        $data = [
            "name" => $_POST['name'] ?? null,
        ];

        validateTagCreate($data);

        insert('donhang', $data);

        $_SESSION['success'] = 'Thao tác thành công!';

        header('Location: ' . BASE_URL_ADMIN . '?act=donhang');
        exit();
    }

    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}

function validateTagCreate($data) {
    // name - bắt buộc, độ dài tối đa 50 ký tự, Không được trùng

    $errors = [];

    if (empty($data['name'])) {
        $errors[] = 'Trường name là bắt buộc';
    }
    else if(strlen($data['name']) > 50) {
        $errors[] = 'Trường name độ dài tối đa 50 ký tự';
    }
    else if(! checkUniqueName('donhang', $data['name'])) {
        $errors[] = 'Name đã được sử dụng';
    }

    if (!empty($errors)) {
        $_SESSION['errors'] = $errors;
        $_SESSION['data'] = $data;

        header('Location: ' . BASE_URL_ADMIN . '?act=donhang-create');
        exit();
    }
}

function donhangUpdate($id)
{
    $variants = show_variant();
    $donhang = showOnedonhang('donhang', $id);

    if(empty($donhang)) {
        e404();
    }

    $title = 'Cập nhật đơn hàng: ' . $donhang['id_variant'];
    $view = 'donhang/update';

    if (!empty($_POST)) {
        $data = [
            "id_variant" => $_POST['id_variant'] ?? $donhang['id_variant'],
            "first_name" => $_POST['first_name'] ?? $donhang['first_name'],
            "last_name" => $_POST['last_name'] ?? $donhang['last_name'],
            "email" => $_POST['email'] ?? $donhang['email'],
            "phone" => $_POST['phone'] ?? $donhang['phone'],
            "address" => $_POST['address'] ?? $donhang['address'],
            "tien_hang" => $_POST['tien_hang'] ?? $donhang['tien_hang'],
            "phi_ship" => $_POST['phi_ship'] ?? $donhang['phi_ship'],
            "tong_tien" => $_POST['tong_tien'] ?? $donhang['tong_tien'],
            "phuong_thuc" => $_POST['phuong_thuc'] ?? $donhang['phuong_thuc'],
            "id_cart" => $_POST['id_cart'] ?? $donhang['id_cart'],
            "status" => $_POST['status'] ?? $donhang['status'],
        ];


//        validateDonhangUpdate($id, $data);

        updateDonhang('donhang', $id, $data);

        $_SESSION['success'] = 'Thao tác thành công!';

        header('Location: ' . BASE_URL_ADMIN . '?act=donhang-update&id=' . $id);
        exit();
    }

    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}

function validateDonhangUpdate($id, $data) {
    // name - bắt buộc, độ dài tối đa 50 ký tự, Không được trùng

    $errors = [];

    if (empty($data['name'])) {
        $errors[] = 'Trường name là bắt buộc';
    }
    else if(strlen($data['name']) > 50) {
        $errors[] = 'Trường name độ dài tối đa 50 ký tự';
    }
    else if(! checkUniqueNameForUpdate('donhang', $id, $data['name'])) {
        $errors[] = 'Name đã được sử dụng';
    }

    if (!empty($errors)) {
        $_SESSION['errors'] = $errors;

        header('Location: ' . BASE_URL_ADMIN . '?act=donhang-update&id=' . $id);
        exit();
    }
}

function donhangDelete($id)
{
    deleteDonhang('donhang', $id);

    $_SESSION['success'] = 'Thao tác thành công!';

    header('Location: ' . BASE_URL_ADMIN . '?act=donhang');
    exit();
}

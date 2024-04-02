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

        header('Location: ' . BASE_URL_ADMIN . '?act=tag-create');
        exit();
    }
}

function donhangUpdate($id)
{
    $donhang = showOnedonhang('donhang', $id);

    if(empty($donhang)) {
        e404();
    }

    $title = 'Cập nhật đơn hàng: ' . $donhang['name'];
    $view = 'donhang/update';

    if (!empty($_POST)) {
        $data = [
            "name" => $_POST['name'] ?? $tag['name'],
        ];

        validateTagUpdate($id, $data);

        update('donhang', $id, $data);

        $_SESSION['success'] = 'Thao tác thành công!';

        header('Location: ' . BASE_URL_ADMIN . '?act=tag-update&id=' . $id);
        exit();
    }

    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}

function validateTagUpdate($id, $data) {
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

        header('Location: ' . BASE_URL_ADMIN . '?act=tag-update&id=' . $id);
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

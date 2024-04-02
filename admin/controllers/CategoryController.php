<?php

function categoryListAll()
{
    $title = 'Danh sách category';
    $view = 'categories/index';
    $script = 'datatable';
    $script2 = 'categories/script';
    $style = 'datatable';

    $categories = listAll('danhmuc');

    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}

function categoryShowOne($id)
{
    $category = showOne('danhmuc', $id);

    if(empty($category)) {
        e404();
    }

    $title = 'Chi tiết danh mục: ' . $category['name'];
    $view = 'categories/show';

    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}

function categoryCreate()
{
    $title = 'Thêm mới danh mục';
    $view = 'categories/create';

    if (!empty($_POST)) {

        $data = [
            "name" => $_POST['name'] ?? null,
        ];

        validateCategoryCreate($data);

        insert('danhmuc', $data);

        $_SESSION['success'] = 'Thao tác thành công!';

        header('Location: ' . BASE_URL_ADMIN . '?act=categories');
        exit();
    }

    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}

function validateCategoryCreate($data) {
    // name - bắt buộc, độ dài tối đa 50 ký tự, Không được trùng

    $errors = [];

    if (empty($data['name'])) {
        $errors[] = 'Trường name là bắt buộc';
    }
    else if(strlen($data['name']) > 50) {
        $errors[] = 'Trường name độ dài tối đa 50 ký tự';
    }
    else if(! checkUniqueName('danhmuc', $data['name'])) {
        $errors[] = 'Name đã được sử dụng';
    }

    if (!empty($errors)) {
        $_SESSION['errors'] = $errors;
        $_SESSION['data'] = $data;

        header('Location: ' . BASE_URL_ADMIN . '?act=category-create');
        exit();
    }
}

function categoryUpdate($id)
{
    $category = showOne('danhmuc', $id);

    if(empty($category)) {
        e404();
    }

    $title = 'Cập nhật danh mục: ' . $category['name'];
    $view = 'categories/update';

    if (!empty($_POST)) {
        $data = [
            "name" => $_POST['name'] ?? $category['name'],
        ];

        validateCategoryUpdate($id, $data);

        update('danhmuc', $id, $data);

        $_SESSION['success'] = 'Thao tác thành công!';

        header('Location: ' . BASE_URL_ADMIN . '?act=category-update&id=' . $id);
        exit();
    }

    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}

function validateCategoryUpdate($id, $data) {
    // name - bắt buộc, độ dài tối đa 50 ký tự, Không được trùng

    $errors = [];

    if (empty($data['name'])) {
        $errors[] = 'Trường name là bắt buộc';
    }
    else if(strlen($data['name']) > 50) {
        $errors[] = 'Trường name độ dài tối đa 50 ký tự';
    }
    else if(! checkUniqueNameForUpdate('danhmuc', $id, $data['name'])) {
        $errors[] = 'Name đã được sử dụng';
    }

    if (!empty($errors)) {
        $_SESSION['errors'] = $errors;

        header('Location: ' . BASE_URL_ADMIN . '?act=category-update&id=' . $id);
        exit();
    }
}

function categoryDelete($id)
{
    delete2('danhmuc', $id);

    $_SESSION['success'] = 'Thao tác thành công!';

    header('Location: ' . BASE_URL_ADMIN . '?act=categories');
    exit();
}

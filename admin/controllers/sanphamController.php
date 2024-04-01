<?php

function sanpham_ListAll()
{
    $title = 'Danh sách sản phẩm';
    $view = 'sanpham/index';
    $script = 'datatable';
    $script2 = 'sanpham/script';
    $style = 'datatable';

    $authors = listAll('sanpham');

    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}

function sanpham_ShowOne($id)
{
    $author = showOne('sanpham', $id);

    if (empty($author)) {
        e404();
    }

    $title = 'Chi tiết author: ' . $author['name'];
    $view = 'sanpham/show';

    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}

function sanpham_Create()
{
    $title = 'Thêm mới sản phẩm';
    $view = 'sanpham/create';

    if (!empty($_POST)) {

        $data = [
            'name' => $_POST['name'] ?? null,
            'price' => $_POST['price'] ?? null,
            'mota' => $_POST['mota'] ?? null,
            'soluong' => $_POST['soluong'] ?? null,
            'img' => $_FILES['img'] ?? null,
            'luotxem' => '0',
            'iddm' => '5',

        ];

        validateAuthorCreate($data);


        insert('sanpham', $data);

        $_SESSION['success'] = 'Thao tác thành công!';

        header('Location: ' . BASE_URL_ADMIN . '?act=sanpham');
        exit();
    }

    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}

function validateAuthorCreate($data)
{
    // name - bắt buộc, độ dài tối đa 50 ký tự, Không được trùng
    // avatar - size <= 2M, chỉ chấp nhận PNG, JPG, JPEG

    $errors = [];

    if (empty($data['name']) || !(strlen($title) <= 255) || preg_match('/[\'^£$%&*()}{@#~?><>,|=+¬-]/', $title)) {
        $errors[] = 'Invailable name';
    }

    if (empty($data['price']) && $data['price'] <= 0) {
        $errors[] = 'Invailable price';
    }



    if (!empty($data['img']) && $data['img']['size'] > 0) {
        $typeImage = ['image/png', 'image/jpg', 'image/jpeg'];

        if ($data['img']['size'] > 2 * 1024 * 1024) {
            $errors[] = 'Trường avatar có dung lượng nhỏ hơn 2M';
        } else if (!in_array($data['img']['type'], $typeImage)) {
            $errors[] = 'Trường avatar chỉ chấp nhận định dạng file: png, jpg, jpeg';
        }
    }

    if (!empty($errors)) {
        $_SESSION['errors'] = $errors;
        $_SESSION['data'] = $data;

        header('Location: ' . BASE_URL_ADMIN . '?act=sanpham-create');
        exit();
    }
}

function sanpham_Update($id)
{
    $author = showOne('sanpham', $id);

    if (empty($author)) {
        e404();
    }

    $title = 'Cập nhật author: ' . $author['name'];
    $view = 'sanpham/update';

    if (!empty($_POST)) {
        $data = [
            "name" => $_POST['name'] ?? $author['name'],
            'avatar' => $_FILES['avatar'] ?? $author['avatar']
        ];

        validateAuthorUpdate($id, $data);

        $avatar = $data['avatar'];
        if (!empty($avatar) && is_array($avatar) &&  $avatar['size'] > 0) {
            $data['avatar'] = upload_file($avatar, 'uploads/sanpham/');
        }

        update('sanpham', $id, $data);

        if (
            !empty($avatar)                                 // Có upload file
            && !empty($author['avatar'])                    // có giá trị
            && !empty($data['avatar'])                      // upload file thành công
            && file_exists(PATH_UPLOAD . $author['avatar']) // Phải còn file tồn tại trên hệ thống
        ) {
            unlink(PATH_UPLOAD . $author['avatar']);
        }

        $_SESSION['success'] = 'Thao tác thành công!';

        header('Location: ' . BASE_URL_ADMIN . '?act=sanpham-update&id=' . $id);
        exit();
    }

    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}

function validateAuthorUpdate($id, $data)
{
    // name - bắt buộc, độ dài tối đa 50 ký tự, Không được trùng
    // avatar - size <= 2M, chỉ chấp nhận PNG, JPG, JPEG

    $errors = [];

    if (empty($data['name'])) {
        $errors[] = 'Trường name là bắt buộc';
    } else if (strlen($data['name']) > 50) {
        $errors[] = 'Trường name độ dài tối đa 50 ký tự';
    } else if (!checkUniqueNameForUpdate('sanpham', $id, $data['name'])) {
        $errors[] = 'Name đã được sử dụng';
    }

    if (
        !empty($data['avatar'])
        && is_array($data['avatar'])
        && $data['avatar']['size'] > 0
    ) {
        $typeImage = ['image/png', 'image/jpg', 'image/jpeg'];

        if ($data['avatar']['size'] > 2 * 1024 * 1024) {
            $errors[] = 'Trường avatar có dung lượng nhỏ hơn 2M';
        } else if (!in_array($data['avatar']['type'], $typeImage)) {
            $errors[] = 'Trường avatar chỉ chấp nhận định dạng file: png, jpg, jpeg';
        }
    }

    if (!empty($errors)) {
        $_SESSION['errors'] = $errors;

        header('Location: ' . BASE_URL_ADMIN . '?act=sanpham-update&id=' . $id);
        exit();
    }
}

function sanpham_Delete($id)
{
    $author = showOne('sanpham', $id);

    if (empty($author)) {
        e404();
    }

    delete2('sanpham', $id);

    if (
        !empty($author['avatar'])                       // có giá trị
        && file_exists(PATH_UPLOAD . $author['avatar']) // Phải còn file tồn tại trên hệ thống
    ) {
        unlink(PATH_UPLOAD . $author['avatar']);
    }

    $_SESSION['success'] = 'Thao tác thành công!';

    header('Location: ' . BASE_URL_ADMIN . '?act=sanpham');
    exit();
}

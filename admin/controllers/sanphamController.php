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

    if (empty($user)) {
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
    $danhmuc = get_id_name_dm();
    if (!empty($_POST)) {
        $data = [
          "name" => $_POST['name'] ?? null,
          "price" => $_POST['price'] ?? null,
          "mota" => $_POST['mota'] ?? null,
          "iddm" => $_POST['iddm'] ?? null,
          "luotxem" => 1,
            "img" => $_FILES['img'] ?? null,
        ];

        if(!empty($_FILES['img']['name'])) {
            $image_result = imageValidate($_FILES['img']);
            if(is_array($image_result)) {
                $_SESSION['errors'] = $image_result;
                header('Location: ' . BASE_URL_ADMIN . '?act=sanpham-create');
                exit();
            } else {
                $data['img'] = $image_result;
            }
        }


        validatesanphamCreate($data);
        insert('sanpham', $data);
        $_SESSION['success'] = 'Thao tác thành công!';
        header('Location: ' . BASE_URL_ADMIN . '?act=sanpham');
        exit();
    }
    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}
function validatesanphamCreate($data) {
    $errors = [];
    if (empty($data['name'])) {
        $errors[] = 'name là bắt buộc';
    }
    else if(strlen($data['name']) > 50) {
        $errors[] = 'name độ dài tối đa 50 ký tự';
    }
    if (empty($data['price'])) {
        $errors[] = 'price là bắt buộc';
    }
    if (empty($data['mota'])) {
        $errors[] ='mota là bắt buộc';
    }
    if ($data['iddm'] == 'Chọn danh mục') {
        $errors[] = 'iddm là bắt buộc';
    }

}
function imageValidate($image) {
    $errors = [];
    $image_name = $image['name'];
    $image_size = $image['size'];
    $image_temp = $image['tmp_name'];
    $image_type = $image['type'];

    if (empty($image_name)) {
        $errors[] = 'Please select an image.';
    } else {
        $info = new finfo(FILEINFO_MIME_TYPE);
        $file_type = $info->file($image_temp);
        error_log('Uploaded file MIME type: ' . $file_type);
        $allowed_image_types = ['image/jpeg', 'image/png', 'image/gif', 'image/pjpeg', 'image/jpg', 'image/jpeg', 'image/webp'];
        if (!in_array($image_type, $allowed_image_types)) {
            $errors[] = 'Your chosen file type is not allowed.';
        }
        $upload_max_filesize = 2 * 1024 * 1024; // 2MB
        if ($image_size > $upload_max_filesize) {
            $errors[] = 'Image must not be larger than 2MB.';
        }
        if (empty($errors)) {
            $extension = pathinfo($image_name, PATHINFO_EXTENSION);
            $new_name = uniqid() . '.' . $extension;
            $move_file = move_uploaded_file($image_temp, PATH_UPLOAD . $new_name);
            if ($move_file === false) {
                $errors[] = 'Image upload failed. Please try again.';
                $errors[] = print_r(error_get_last(), true);
            } else {
                return $new_name;
            }
        }
    }
    return $errors;
}
function sanphamUpdate($id)
{
    $danhmuc = get_id_name_dm();
    $user = showOne('sanpham', $id);

    if (empty($user)) {
        e404();
    }

    $title = 'Cập nhật: ' . $user['name'];
    $view = 'sanpham/update';

    if (!empty($_POST)) {
        $data = [
          "name" => $_POST['name'] ?? $user['name'],
          "price" => $_POST['price'] ?? $user['price'],
          "mota" => $_POST['mota'] ?? $user['mota'],
          "iddm" => $_POST['iddm'] ?? $user['iddm'],
          "img" => $_FILES['img'] ?? null
        ];

        validatesanphamUpdate($id, $data);
        if (!empty($_FILES['img']['name'])) {
            $image_result = imageValidate($_FILES['img']);
            if (is_array($image_result)) {
                $_SESSION['errors'] = $image_result;
                header('Location: ' . BASE_URL_ADMIN . '?act=sanpham-update&id=' . $id);
                exit();
            } else {
                $data['img'] = $image_result;
            }
        }


        if (empty($data['img'])) {
            $data['img'] = $user['img'];
        }
        $_SESSION['success'] = 'Thao tác thành công!';

        header('Location: ' . BASE_URL_ADMIN . '?act=sanpham-update&id=' . $id);
        exit();
    }

    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}

function validatesanphamUpdate($id, $data)
{
    $errors = [];

    if (!empty($_FILES['img']['name'])) {
        $image_result = imageValidate($_FILES['img']);
        if (is_array($image_result)) {
            $errors = array_merge($errors, $image_result);
        } else {
            $data['img'] = $image_result;
        }
    }


    if (empty($data['name'])) {
        $errors[] = 'Tên sản phầm là bắt buộc';
    } else {
        if (strlen($data['name']) > 50) {
            $errors[] = 'Tên sản phầm độ dài tối đa 50 ký tự';
        }
    }

    if (empty($data['price'])) {
        $errors[] = 'Giá cả là bắt buộc';
    }

    if (empty($data['mota'])) {
        $errors[] = 'Mô tả là bắt buộc';
    }

    if (empty($data['iddm'])) {
        $errors[] = 'Vui lòng chọn danh mục';
    }

    if (!empty($errors)) {
        $_SESSION['errors'] = $errors;
        header('Location: ' . BASE_URL_ADMIN . '?act=sanpham-update&id=' . $id);
        exit();
    }
}

function sanphamDelete($id)
{
    delete2('sanpham', $id);

    $_SESSION['success'] = 'Thao tác thành công!';

    header('Location: ' . BASE_URL_ADMIN . '?act=sanpham');
    exit();
}
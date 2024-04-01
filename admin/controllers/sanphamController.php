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
    $danhmuc = get_id_name_dm();
    if (!empty($_POST)) {
        $data = [
          "name" => $_POST['name'] ?? null,
          "price" => $_POST['price'] ?? null,

          "mota" => $_POST['mota'] ?? null,
          "iddm" => $_POST['iddm'] ?? null,
          "luotxem" => 1

        ];
//        $imgUploadStatus = validatesanphamCreate($_POST, $_FILES);
//        if ($imgUploadStatus === true) {
//            $fileName = $_FILES['img']['name'];
//            $targetDir = BASE_URL . "/uploads/";
//            $targetFilePath = $targetDir . basename($fileName);
//
//            if (move_uploaded_file($_FILES['img']['tmp_name'],
//              $targetFilePath)) {
//                $data['img'] = $fileName; // Tên file để lưu vào cơ sở dữ liệu
//            } else {
//                $errors[] = 'Có lỗi xảy ra khi upload file.';
//                $_SESSION['errors'] = $errors;
//                $_SESSION['data'] = $_POST;
//
//                header('Location: ' . BASE_URL_ADMIN . '?act=sanpham-create');
//                exit();
//            }
//
//            validatesanphamCreate($data);
//
//            insert('sanpham', $data);
//
//            $_SESSION['success'] = 'Thao tác thành công!';
//
//            header('Location: ' . BASE_URL_ADMIN . '?act=sanpham');
//            exit();
//        }

        require_once PATH_VIEW_ADMIN . 'layouts/master.php';
    }



    function validatesanphamCreate($data, $fileData)
    {
        $errors = [];

        if (empty($data['name'])) {
            $errors[] = 'name là bắt buộc';
        } else {
            if (strlen($data['name']) > 50) {
                $errors[] = 'name độ dài tối đa 50 ký tự';
            }
        }

        if (empty($data['price'])) {
            $errors[] = 'price là bắt buộc';
        }

        if (empty($data['mota'])) {
            $errors[] = 'mota là bắt buộc';
        }

        if (empty($data['iddm'])) {
            $errors[] = 'danh mục là bắt buộc';
        }
        if (isset($fileData['img']) && $fileData['img']['error'] == 0) {
            $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
            $fileInfo = pathinfo($_FILES['img']['name']);
            $fileExtension = strtolower($fileInfo['extension']);
            if (!in_array($fileExtension, $allowedExtensions)) {
                $errors[] = 'Chỉ chấp nhận hình ảnh với đuôi jpg, jpeg, png, gif';
            }
            if ($_FILES['img']['size'] > 5000000) {
                $errors[] = 'Kích thước file không được vượt quá 5MB';
            }
        } else {
            $errors[] = 'Hình ảnh là bắt buộc';
        }

        if (!empty($errors)) {
            $_SESSION['errors'] = $errors;
            $_SESSION['data'] = $data;

            header('Location: ' . BASE_URL_ADMIN . '?act=sanpham-create');
            exit();
        }
        return true;
    }

    function sanphamUpdate($id)
    {
        $user = showOne('sanpham', $id);

        if (empty($user)) {
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

    function validatesanphamUpdate($id, $data)
    {
        // name - bắt buộc, độ dài tối đa 50 ký tự
        // email - bắt buộc, phải là email, không được trùng
        // password - bắt buộc, đồ dài nhỏ nhất là 8, lớn nhất là 20
        // type - bắt buộc, nó phải là 0 or 1

        $errors = [];

        if (empty($data['user'])) {
            $errors[] = 'Trường name là bắt buộc';
        } else {
            if (strlen($data['user']) > 50) {
                $errors[] = 'Trường name độ dài tối đa 50 ký tự';
            }
        }

        if (empty($data['email'])) {
            $errors[] = 'Trường email là bắt buộc';
        } else {
            if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                $errors[] = 'Trường email không đúng định dạng';
            } else {
                if (!checkUniqueEmailForUpdate('taikhoan', $id,
                  $data['email'])) {
                    $errors[] = 'Email đã được sử dụng';
                }
            }
        }

        if (empty($data['pass'])) {
            $errors[] = 'Trường password là bắt buộc';
        } else {
            if (strlen($data['pass']) < 8 || strlen($data['pass']) > 20) {
                $errors[] = 'Trường password đồ dài nhỏ nhất là 8, lớn nhất là 20';
            }
        }

        if ($data['role'] === null) {
            $errors[] = 'Trường type là bắt buộc';
        } else {
            if (!in_array($data['role'], [0, 1])) {
                $errors[] = 'Trường type phải là 0 or 1';
            }
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

        header('Location: ' . BASE_URL_ADMIN . '?act=sanpham');
        exit();
    }
}
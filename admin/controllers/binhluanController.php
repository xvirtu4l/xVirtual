<?php

function binhluan_ListAll()
{
    $title      = 'Danh sách bình luận';
    $view       = 'binhluan/index';
    $script     = 'datatable';
    $script2    = 'binhluan/script';
    $style      = 'datatable';

    $cmts = listAllForBL();

    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}

function showOneFromComment($id)
{
    $comment = showOneFromComments($id);

    if (empty($comment)) {
        e404();
    }

    $title  = 'Chi tiết bình luận: ' . $comment['bl_noidung'];
    $view   = 'binhluan/show';

    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}


function BLDelete($id)
{
    delete2('binhluan', $id);

    $_SESSION['success'] = 'Thao tác thành công!';

    header('Location: ' . BASE_URL_ADMIN . '?act=binhluan');
    exit();
}
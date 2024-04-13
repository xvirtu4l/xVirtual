<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"><?= $title ?></h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
              Chi tiết
            </h6>
        </div>
        <div class="card-body">
            <table class="table">

              <tr>
                <td>ID bình luận</td>
                <td><?= $comment['bl_id'] ?></td>
              </tr>
              <tr>
                <td>ID người dùng</td>
                <td><?= $comment['bl_iduser']?></td>
              </tr>
              <tr>
                <td>Tên người dùng</td>
                <td><?= $comment['bl_username']?></td>
              </tr>
              <tr>
                <td>ID sản phẩm</td>
                <td><?= $comment['bl_idpro']?></td>
              </tr>
              <tr>
                <td>Tên sản phẩm</td>
                <td><?= $comment['bl_sanpham']?></td>
              </tr>

              <tr>
                <td>Nội dung bình luận</td>
                <td><?= $comment['bl_noidung'] ?></td>
              </tr>
              <tr>
                <td>Ngày đăng</td>
                <td><?= $comment['bl_ngaybinhluan'] ?></td>
              </tr>

              <tr>
            </table>

            <a href="<?= BASE_URL_ADMIN ?>?act=binhluan" class="btn btn-danger">Back to list</a>
        </div>
    </div>
</div>
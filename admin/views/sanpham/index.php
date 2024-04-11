<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">
        <?= $title ?>

        <a href="<?= BASE_URL_ADMIN ?>?act=sanpham-create" class="btn btn-primary">Create</a>
    </h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                DataTables
            </h6>
        </div>
        <div class="card-body">

            <?php if (isset($_SESSION['success'])) : ?>
                <div class="alert alert-success">
                    <?= $_SESSION['success'] ?>
                </div>
                <?php unset($_SESSION['success']); ?>
            <?php endif; ?>

            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Stt</th>
                            <th>Tên</th>
                            <th>Hình ảnh</th>
                            <th>Giá tiền</th>
                            <th>Mô tả</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php $stt = 1; foreach ($users as $user) : ?>
                            <tr>
                                <td><?= $stt ?></td>
                                <td><?= $user['name'] ?></td>
                                <td>
                                  <img src="<?= BASE_URL ."/uploads/". $user['img'] ?>" alt="" width="100px">
                                </td>
                                <td><?= $user['price'] ?></td>
                               <td><?= $user['mota'] ?></td>
                                <td>
                                    <a href="<?= BASE_URL_ADMIN ?>?act=sanpham-detail&id=<?= $user['id'] ?>" class="btn btn-info">Show</a>
                                    <a href="<?= BASE_URL_ADMIN ?>?act=sanpham-update&id=<?= $user['id'] ?>" class="btn btn-warning">Update</a>
                                    <a href="<?= BASE_URL_ADMIN ?>?act=sanpham-delete&id=<?= $user['id'] ?>"
                                        onclick="return confirm('Bạn có chắc chắn xóa không?')"
                                        class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                        <?php $stt++; endforeach; ?>

                    </tbody>
                </table>
                
            </div>
        </div>
    </div>
</div>
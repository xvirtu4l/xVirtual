<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">
        <?= $title ?>
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
                            <th>ID</th>
                            <th>Tên Sản Phẩm</th>
                            <th>Tên khách hàng</th>
                            <th>Nội dung bình luận</th>
                            <th>Ngày bình luận</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Tên Sản Phẩm</th>
                            <th>Tên khách hàng</th>
                            <th>Nội dung bình luận</th>
                            <th>Ngày bình luận</th>
                            <th>Thao tác</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php foreach ($cmts as $cm) : ?>
                            <tr>
                                <td><?= $cm['bl_id'] ?></td>
                                <td><?= $cm['bl_sanpham'] ?></td>
                                <td><?= $cm['bl_username'] ?></td>
                                <td><?= $cm['bl_noidung'] ?></td>
                                <td><?= $cm['bl_ngaybinhluan'] ?></td>
                                <td>
                                    <a href="<?= BASE_URL_ADMIN ?>?act=binhluan-detail&id=<?= $cm['bl_id'] ?>" class="btn btn-info">Show</a>
                        
                                    <a href="<?= BASE_URL_ADMIN ?>?act=binhluan-delete&id=<?= $cm['bl_id'] ?>" 
                                        onclick="return confirm('Bạn có chắc chắn xóa không?')"
                                        class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
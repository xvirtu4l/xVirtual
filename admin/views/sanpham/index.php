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
                          <th>ID</th>
                          <th>Tên</th>
                          <th>Giá</th>
                          <th>Ảnh</th>
                          <th>Mô tả</th>
                          <th>Lượt xem</th>
                          <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Tên</th>
                            <th>Giá</th>
                            <th>Ảnh</th>
                            <th>Mô tả</th>
                            <th>Lượt xem</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php foreach ($authors as $author) : ?>
                            <tr>
                                <td><?= $author['id'] ?></td>
                                <td><?= $author['name'] ?></td>
                                <td><?= $author['price'] ?>đ</td>
                                <td>
                                    <img src="<?= BASE_URL ."/uploads/". $author['img'] ?>" alt="" width="100px">
                                </td>
                              <td><?= $author['mota'] ?></td>
                              <td><?= $author['luotxem'] ?></td>
                                <td>
                                    <a href="<?= BASE_URL_ADMIN ?>?act=sanpham-detail&id=<?= $author['id'] ?>" class="btn btn-info">Show</a>
                                    <a href="<?= BASE_URL_ADMIN ?>?act=sanpham-update&id=<?= $author['id'] ?>" class="btn btn-warning">Update</a>
                                    <a href="<?= BASE_URL_ADMIN ?>?act=sanpham-delete&id=<?= $author['id'] ?>"
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
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"><?= $title ?></h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                Create
            </h6>
        </div>
        <div class="card-body">

            <?php if (isset($_SESSION['errors'])) : ?>
                <div class="alert alert-danger">
                    <ul>
                        <?php foreach ($_SESSION['errors'] as $error) : ?>
                            <li><?= $error ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <?php unset($_SESSION['errors']); ?>
            <?php endif; ?>

            <form action="" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3 mt-3">
                            <label for="name" class="form-label">Tên:</label>
                            <input type="text" class="form-control" id="name" value="<?= isset($_SESSION['data']) ? $_SESSION['data']['name'] : null ?>" placeholder="Nhập tên sản phẩm" name="name">
                        </div>
                      <div class="mb-3 mt-3">
                        <label for="price" class="form-label">Giá:</label>
                        <input type="text" class="form-control" id="price" value="<?= isset($_SESSION['data']) ? $_SESSION['data']['price'] : null ?>" placeholder="Nhập giá sản phẩm" name="price">
                      </div>
                      <div class="mb-3 mt-3">
                        <label for="mota" class="form-label">Mô tả:</label>
                        <input type="text" class="form-control" id="mota" value="<?= isset($_SESSION['data']) ? $_SESSION['data']['mota'] : null ?>" placeholder="Nhập mô tả" name="mota">
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="mb-3 mt-3">
                        <label for="soluong" class="form-label">Số lượng:</label>
                        <input type="text" class="form-control" id="soluong" value="<?= isset($_SESSION['data']) ? $_SESSION['data']['soluong'] : null ?>" placeholder="Nhập số lượng" name="soluong">
                      </div>
                        <div class="mb-3 mt-3">
                            <label for="img" class="form-label">Ảnh:</label>
                            <input type="file" class="form-control" id="img" name="img">
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="<?= BASE_URL_ADMIN ?>?act=authors" class="btn btn-danger">Back to list</a>
            </form>
        </div>
    </div>
</div>

<?php if (isset($_SESSION['data'])) {
    unset($_SESSION['data']);
} ?>
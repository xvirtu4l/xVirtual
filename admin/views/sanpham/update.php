<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"><?= $title ?></h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                Update
            </h6>
        </div>
        <div class="card-body">

            <?php if (isset($_SESSION['success'])) : ?>
                <div class="alert alert-success">
                    <?= $_SESSION['success'] ?>
                </div>
                <?php unset($_SESSION['success']); ?>
            <?php endif; ?>

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

            <form action="" method="POST">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3 mt-3">
                            <label for="name" class="form-label">Tên sản phẩm:</label>
                            <input type="text" class="form-control" id="name" value="<?= $user['name'] ?>" placeholder="Enter name" name="name">
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="price" class="form-label">Giá:</label>
                            <input type="price" class="form-control" id="price" value="<?= $user['price'] ?>" placeholder="Enter price" name="price">
                        </div>
                      <div class="mb-3 mt-3">
                        <label for="img" class="form-label">Hình ảnh:</label>
                        <input type="text" class="form-control" id="img" value="<?= $user['img'] ?>" placeholder="Enter img" name="img">
                      </div>
                      <div class="mb-3 mt-3">
                        <label for="mota" class="form-label">Mô tả:</label>
                        <input type="text" class="form-control" id="mota" value="<?= $user['mota'] ?>" placeholder="Enter...." name="mota">
                      </div>
                      <div class="mb-3 mt-3">
                        <label for="mota" class="form-label">Mô tả:</label>
                        <input type="text" class="form-control" id="mota" value="<?= $user['mota'] ?>" placeholder="Enter...." name="mota">
                      </div>
                    </div>
                    <div class="col-md-6">

                      <div class="mb-3 mt-3">
                        <label for="name" class="form-label">Tên sản phẩm:</label>
                        <input type="text" class="form-control" id="name" value="<?= $user['name'] ?>" placeholder="Enter name" name="name">
                      </div>

                      <div class="mb-3 mt-3">
                        <label for="price" class="form-label">Giá:</label>
                        <input type="price" class="form-control" id="price" value="<?= $user['price'] ?>" placeholder="Enter price" name="price">
                      </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="<?= BASE_URL_ADMIN ?>?act=users" class="btn btn-danger">Back to list</a>
            </form>
        </div>
    </div>
</div>
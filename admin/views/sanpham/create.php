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
                            <label for="name" class="form-label">Name:</label>
                            <input type="text" class="form-control" id="name" value="<?= isset($_SESSION['data']) ? $_SESSION['data']['name'] : null ?>" placeholder="Enter name" name="name">
                        </div>
                      <div class="mb-3 mt-3">
                        <label for="price" class="form-label">Price:</label>
                        <input type="text" class="form-control" id="price" value="<?= isset($_SESSION['data']) ? $_SESSION['data']['price'] : null ?>" placeholder="Enter price" name="price">
                      </div>
                      <div class="mb-3 mt-3">
                        <label for="img" class="form-label">Image:</label>
                        <input type="file" class="form-control" id="img" value="<?= isset($_SESSION['data']) ? $_SESSION['data']['img'] : null ?>" placeholder="Enter img" name="img">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="mb-3 mt-3">
                        <label for="mota" class="form-label">Mô tả:</label>
                        <input type="text" class="form-control" id="mota" value="<?= isset($_SESSION['data']) ? $_SESSION['data']['mota'] : null ?>" placeholder="Enter mota" name="mota">
                      </div>

                      <div class="mb-3 mt-3">
                        <label for="danhmuc" class="form-label">Danh Mục:</label>
                        <select name="iddm" id="iddm" class="form-control">
                          <option value="">Chọn danh mục</option>
                            <?php foreach ($danhmuc as $dm): ?>
                              <option value="<?= $dm['id'] ?>" <?= (isset($_SESSION['data']) && $_SESSION['data']['iddm'] == $dm['id']) ? 'selected' : '' ?>><?= htmlspecialchars($dm['name']) ?></option>
                            <?php endforeach; ?>
                        </select>
                      </div>



                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="<?= BASE_URL_ADMIN ?>?act=sanpham" class="btn btn-danger">Back to list</a>
            </form>
        </div>
    </div>
</div>

<?php if (isset($_SESSION['data'])) {
    unset($_SESSION['data']);
} ?>
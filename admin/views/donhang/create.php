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

            <form action="" method="POST">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3 mt-3">
                            <label for="first_name" class="form-label">Họ:</label>
                            <input type="text" class="form-control" id="first_name" value="<?= isset($_SESSION['data']) ? $_SESSION['data']['first_name'] : null ?>" placeholder="Enter..." name="first_name">
                        </div>
                      <div class="mb-3 mt-3">
                        <label for="last_name" class="form-label">Tên:</label>
                        <input type="text" class="form-control" id="last_name" value="<?= isset($_SESSION['data']) ? $_SESSION['data']['last_name'] : null ?>" placeholder="Enter..." name="last_name">
                      </div>
                      <div class="mb-3 mt-3">
                        <label for="email" class="form-label">Email:</label>
                        <input type="text" class="form-control" id="email" value="<?= isset($_SESSION['data']) ? $_SESSION['data']['email'] : null ?>" placeholder="Enter..." name="email">
                      </div>
                      <div class="mb-3 mt-3">
                        <label for="address" class="form-label">Địa chỉ:</label>
                        <input type="text" class="form-control" id="address" value="<?= isset($_SESSION['data']) ? $_SESSION['data']['address'] : null ?>" placeholder="Enter..." name="address">
                      </div>
                      <div class="mb-3 mt-3">
                        <label for="phone" class="form-label">Phone:</label>
                        <input type="text" class="form-control" id="phone" value="<?= isset($_SESSION['data']) ? $_SESSION['data']['phone'] : null ?>" placeholder="Enter..." name="phone">
                      </div>
                    </div>
                  <div class="col-md-6">
                    <div class="mb-3 mt-3">
                      <label for="id_variant" class="form-label">Variant:</label>
                      <input type="text" class="form-control" id="id_variant" value="<?= isset($_SESSION['data']) ? $_SESSION['data']['id_variant'] : null ?>" placeholder="Enter..." name="id_variant">
                    </div>


                    <div class="mb-3 mt-3">
                      <label for="tien_hang" class="form-label">Tiền hàng:</label>
                      <input type="text" class="form-control" id="tien_hang" value="<?= isset($_SESSION['data']) ? $_SESSION['data']['tien_hang'] : null ?>" placeholder="Enter..." name="tien_hang">
                    </div>
                    <div class="mb-3 mt-3">
                      <label for="phi_ship" class="form-label">Tiền ship:</label>
                      <input type="text" class="form-control" id="phi_ship" value="<?= isset($_SESSION['data']) ? $_SESSION['data']['phi_ship'] : null ?>" placeholder="Enter..." name="phi_ship">
                    </div>
                    <div class="mb-3 mt-3">
                      <label for="tong_tien" class="form-label">Tổng tiền:</label>
                      <input type="text" class="form-control" id="tong_tien" value="<?= isset($_SESSION['data']) ? $_SESSION['data']['tong_tien'] : null ?>" placeholder="Enter.." name="tong_tien">
                    </div>
                    <div class="mb-3 mt-3">
                      <label for="phuong_thuc" class="form-label">Phương thức thanh toán:</label>
                      <input type="text" class="form-control" id="phuong_thuc" value="<?= isset($_SESSION['data']) ? $_SESSION['data']['phuong_thuc'] : null ?>" placeholder="Enter..." name="phuong_thuc">
                    </div>

                  </div>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="<?= BASE_URL_ADMIN ?>?act=donhang" class="btn btn-danger">Back to list</a>
            </form>
        </div>
    </div>
</div>

<?php if (isset($_SESSION['data'])) {
    unset($_SESSION['data']);
} ?>
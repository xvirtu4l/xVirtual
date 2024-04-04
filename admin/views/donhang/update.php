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
                            <label for="id_variant" class="form-label">Variant:</label>
                            <input type="text" class="form-control" id="id_variant" value="<?= $donhang['id_variant'] ?>" placeholder="Enter.." name="id_variant">
                        </div>
                      <div class="mb-3 mt-3">
                        <label for="first_name" class="form-label">Họ:</label>
                        <input type="text" class="form-control" id="first_name" value="<?= $donhang['first_name'] ?>" placeholder="Enter..." name="first_name">
                      </div>
                      <div class="mb-3 mt-3">
                        <label for="last_name" class="form-label">Tên:</label>
                        <input type="text" class="form-control" id="last_name" value="<?= $donhang['last_name'] ?>" placeholder="Enter..." name="last_name">
                      </div>
                      <div class="mb-3 mt-3">
                        <label for="email" class="form-label">Email:</label>
                        <input type="text" class="form-control" id="email" value="<?= $donhang['email'] ?>" placeholder="Enter email" name="email">
                      </div>
                      <div class="mb-3 mt-3">
                        <label for="address" class="form-label">Địa chỉ:</label>
                        <input type="text" class="form-control" id="address" value="<?= $donhang['address'] ?>" placeholder="Enter..." name="address">
                      </div>
                    </div>

                  <div class="col-md-6">
                    <div class="mb-3 mt-3">
                      <label for="phone" class="form-label">Số điện thoại:</label>
                      <input type="text" class="form-control" id="phone" value="<?= $donhang['phone'] ?>" placeholder="Enter..." name="phone">
                    </div>
                    <div class="mb-3 mt-3">
                      <label for="tien_hang" class="form-label">Tiền hàng	:</label>
                      <input type="text" class="form-control" id="tien_hang" value="<?= $donhang['tien_hang'] ?>" placeholder="Enter..." name="tien_hang">
                    </div>
                    <div class="mb-3 mt-3">
                      <label for="phi_ship" class="form-label">Tiền ship:</label>
                      <input type="text" class="form-control" id="phi_ship" value="<?= $donhang['phi_ship'] ?>" placeholder="Enter.." name="phi_ship">
                    </div>
                    <div class="mb-3 mt-3">
                      <label for="tong_tien" class="form-label">Tổng tiền:</label>
                      <input type="text" class="form-control" id="tong_tien" value="<?= $donhang['tong_tien'] ?>" placeholder="Enter.." name="tong_tien">
                    </div>
                    <div class="mb-3 mt-3">
                      <label for="phuong_thuc" class="form-label">Phương thức thanh toán:</label>
                      <input type="text" class="form-control" id="phuong_thuc" value="<?= $donhang['phuong_thuc'] ?>" placeholder="Enter.." name="phuong_thuc">
                    </div>
                    <div class="mb-3 mt-3">
                      <label for="status" class="form-label">Trạng thái:</label>
                      <select class="form-control" id="status" name="status">
                        <option value="0" <?= $donhang['status'] == '0' ? 'selected' : '' ?>>Chờ xử lý</option>
                        <option value="1" <?= $donhang['status'] == '1' ? 'selected' : '' ?>>Đang xử lý</option>
                        <option value="2" <?= $donhang['status'] == '2' ? 'selected' : '' ?>>Đang giao hàng</option>
                        <option value="3" <?= $donhang['status'] == '3' ? 'selected' : '' ?>>Đã giao hàng</option>
                        <option value="4" <?= $donhang['status'] == '4' ? 'selected' : '' ?>>Hủy đơn hàng</option>
                        <option value="5" <?= $donhang['status'] == '5' ? 'selected' : '' ?>>Đã hủy đơn hàng</option>
                      </select>
                    </div>
                  </div>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="<?= BASE_URL_ADMIN ?>?act=donhang" class="btn btn-danger">Back to list</a>
            </form>
        </div>
    </div>
</div>
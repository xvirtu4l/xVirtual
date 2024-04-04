<div class="container-fluid">
  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">
      <?= $title ?>

    <a href="<?= BASE_URL_ADMIN ?>?act=donhang-create" class="btn btn-primary">Create</a>
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
        <table class="table table-bordered" id="dataTable" width="100%"
               cellspacing="0">
          <thead>
          <tr>
            <th>Stt</th>
            <th>Mã đơn hàng</th>
            <th>Tình trạng</th>
            <th>Tên khách hàng</th>
            <th>Email</th>
            <th>Địa chỉ</th>
            <th>Số điện thoai</th>
            <th>Tiền hàng</th>
            <th>Tiền ship</th>
            <th>Tổng tiền</th>
            <th>Phương thức thanh toán</th>

            <th>Action</th>
          </tr>
          </thead>

          <tbody>
          <?php $stt = 1; foreach ($donhang as $dh) : ?>
            <tr>
              <td><?= $stt ?></td>
              <td><?= $dh['id_checkout'] ?></td>
                <?php
                $status_text = '';
                switch ($dh['status']) {
                    case 0:
                        $status_text = 'Chờ xử lý';
                        break;
                    case 1:
                        $status_text = 'Đang xử lý';
                        break;
                    case 2:
                        $status_text = 'Đang giao hàng';
                        break;
                    case 3:
                        $status_text = 'Đã giao hàng';
                        break;
                    case 4:
                        $status_text = 'Hủy đơn hàng';
                        break;
                    case 5:
                        $status_text = 'Đã hủy đơn hàng';
                        break;
                }
                ?>
              <td><?= $status_text ?></td>
              <td><?= $dh['first_name'] ?> <?= $dh['last_name'] ?></td>
              <td><?= $dh['email'] ?></td>
              <td><?= $dh['address'] ?></td>
              <td><?= $dh['phone'] ?></td>
              <td><?= $dh['tien_hang'] ?></td>
              <td><?= $dh['phi_ship'] ?></td>
              <td><?= $dh['tong_tien'] ?></td>
              <td><?= $dh['phuong_thuc'] ?></td>
              <td>
                <a
                  href="<?= BASE_URL_ADMIN ?>?act=donhang-detail&id=<?= $dh['id_checkout'] ?>"
                  class="btn btn-info">Show</a>
                <a
                  href="<?= BASE_URL_ADMIN ?>?act=donhang-update&id=<?= $dh['id_checkout'] ?>"
                  class="btn btn-warning">Update</a>
                <a
                  href="<?= BASE_URL_ADMIN ?>?act=donhang-delete&id=<?= $dh['id_checkout'] ?>"
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
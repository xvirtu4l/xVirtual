<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"><?= $title ?></h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">

            </h6>
        </div>
        <div class="card-body">
            <table class="table">
              <tr>
                <td>Id đơn hàng</td>
                <td><?= $donhang['id_checkout'] ?></td>
              </tr>
              <tr>
                <td>Tên khách hàng</td>
                <td><?= $donhang['first_name'] ?> <?= $donhang['last_name'] ?></td>
              </tr>
              <tr>
                <td>Email</td>
                <td><?= $donhang['email'] ?></td>
              </tr>
              <tr>
                <td>Địa chỉ</td>
                <td><?= $donhang['address'] ?></td>
              </tr>
              <tr>
                <td>Số điện thoai</td>
                <td><?= $donhang['phone'] ?></td>
              </tr>
              <tr>
                <td>Tiền hàng</td>
                <td><?= $donhang['tien_hang'] ?></td>
              </tr>
              <tr>
                <td>Tiền ship</td>
                <td><?= $donhang['phi_ship'] ?></td>
              </tr>
              <tr>
                <td>Tổng tiền</td>
                <td><?= $donhang['tong_tien'] ?></td>
              </tr>
              <tr>
                <td>Phương thức thanh toán</td>
                <td><?= $donhang['phuong_thuc'] ?></td>
              </tr>
              <tr>
                <td>Trạng thái</td>

                  <?php
                  $status_text = '';
                  switch ($donhang['status']) {
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
              </tr>


            </table>

            <a href="<?= BASE_URL_ADMIN ?>?act=donhang" class="btn btn-danger">Back to list</a>
        </div>
    </div>
</div>
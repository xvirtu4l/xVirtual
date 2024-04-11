<?php
//    error_reporting(E_ALL);
//    ini_set('display_errors', 1);
    $order = null;
    $statusTexts = [
      0 => 'Chờ xử lý',
      1 => 'Đang xử lý',
      2 => 'Đã gửi đi',
      3 => 'Đang giao',
      4 => 'Đã giao',
      5 => 'Đã hủy',
      6 => 'Trả hàng'
    ];
    try {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $order_number = $_POST['order_number'];
            try {
                $stmt = $GLOBALS['conn']->prepare("SELECT sp.name, dh.id_checkout, dh.created_at, dh.updated_at, dh.status, dh.phuong_thuc, dh.tien_hang, dh.phi_ship, dh.phone, dh.address, dh.first_name, dh.last_name 
FROM donhang dh
JOIN variant v ON dh.id_variant = v.var_id
JOIN sanpham sp ON v.id_pro = sp.id
WHERE dh.id_checkout = :order_number");
                $stmt->bindParam(':order_number', $order_number);
                $stmt->execute();
                if ($stmt->rowCount() > 0) {
                    $order = $stmt->fetch(PDO::FETCH_ASSOC);
                    $statusText = isset($statusTexts[$order['status']]) ? $statusTexts[$order['status']] : 'Không xác định';
                } else {
                    $orderDetails = "<p>Không tìm thấy đơn hàng với số đơn hàng này.</p>";
                }
            } catch (Exception $e) {
                $orderDetails = "<p>Lỗi tìm kiếm: " . $e->getMessage() . "</p>";
            }
        }
    } catch (Exception $e) {
      die($e->getMessage());
    }


?>
<div class="section-banner">
  <img src="https://viettelpost.com.vn/wp-content/uploads/2021/02/1920px-Hong_Kong_Skyline_Panorama_-_Dec_200811.jpg" class="w-100">
</div>

<div class="container">
  <div class="wrap-content">
    <div class="align-self-auto">
      <form method="POST" action="<?=BASE_URL. '?act=tracking' ?>">
        <label for="order_number">Số đơn hàng:</label>
        <input type="text" id="order_number" name="order_number" required>
        <button type="submit">Tra cứu</button>
      </form>



        <?php if(isset($order)): ?>
          <table class="table table-striped">
            <thead>
            <tr>
              <th scope="col">Mã đơn hàng</th>
              <th scope="col">Ngày đặt hàng</th>
              <th scope="col">Trạng thái</th>
              <th scope="col">Sản phẩm</th>
              <th scope="col">Người nhận</th>
              <th scope="col">Địa chỉ</th>
              <th scope="col">Số điện thoại</th>
              <th scope="col">Thanh toán</th>
              <th scope="col">Phương thức thanh toán</th>


            </tr>
            </thead>
            <tbody>
            <tr>
              <td><?= ($order['id_checkout']) ?></td>
              <td><?= ($order['created_at']) ?></td>
              <td><?= $statusText ?></td>
              <td><?= ($order['name']) ?></td>
              <td><?= $order['first_name'] ." ". $order['last_name'] ?></td>
              <td><?= $order['address'] ?></td>
              <td><?= $order['phone'] ?></td>
              <td><?= $order['tien_hang'] + $order['phi_ship'] ?></td>
              <td><?= $order['phuong_thuc'] ?></td>
            </tr>
            </tbody>
          </table >
        <?php elseif(isset($orderDetails)): ?>
            <?= $orderDetails ?>
        <?php endif; ?>

    </div>
  </div>
</div>
<!--ll-->
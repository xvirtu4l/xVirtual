<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"><?= $title ?></h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
              Chi tiết
            </h6>
        </div>
        <div class="card-body">
            <table class="table">

              <tr>
                <td>Tên sản phẩm</td>
                <td><?= $user['name'] ?></td>
              </tr>
              <tr>
                <td>Hình ảnh</td>
                <td><img src="<?php echo BASE_URL. "/uploads/" . $user['img']  ?>" width="100s"></td>
              </tr>
              <tr>
                <td>Giá</td>
                <td><?= $user['price'] ?></td>
              </tr>

              <tr>
                <td>Mô tả</td>
                <td><?= $user['mota'] ?></td>
              </tr>
              <tr>
                <td>Loại sản phẩm</td>
                <td>
                    <?php
                    try {
                        $stmt = $GLOBALS['conn']->prepare("SELECT dm.name FROM danhmuc dm JOIN sanpham sp ON sp.iddm = dm.id WHERE sp.id = :product_id");
                        $stmt->bindParam(":product_id", $user['id']);
                        $stmt->execute();
                        $result = $stmt->fetch();
                    } catch (\PDOException $e) {
                      $e->getMessage();
                    }
                    echo $result['name'];
                    ?>
                </td>
              </tr>
              <tr>
                <td>Màu sắc</td>
                <td>
                    <?php
                    $query = "SELECT distinct color FROM variant WHERE id_pro = :id_pro";
                    $stmt = $GLOBALS['conn']->prepare($query);
                    $stmt->bindParam(':id_pro',$user['id']);
                    $stmt->execute();
                    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($result as $row) {
                        echo $row['color']. "<br>";
                    }
                    ?>
                </td>
              </tr>
              <tr>
                <td>Dung lượng</td>
                <td>
                    <?php
                    $query = "SELECT distinct storage FROM variant WHERE id_pro = :id_pro";
                    $stmt = $GLOBALS['conn']->prepare($query);
                    $stmt->bindParam(':id_pro',$user['id']);
                    $stmt->execute();
                    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($result as $row) {
                        echo $row['storage']. "<br>";
                    }
                    ?>
                </td>
              </tr>
            </table>

            <a href="<?= BASE_URL_ADMIN ?>?act=sanpham" class="btn btn-danger">Back to list</a>
        </div>
    </div>
</div>
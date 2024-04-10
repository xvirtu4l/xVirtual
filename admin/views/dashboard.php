<?php
    global $conn;
    $dateFrom = isset($_GET['dateFrom']) ? (new DateTime($_GET['dateFrom']))->format('Y-m-d') : '2022-01-01';
    $dateTo = isset($_GET['dateTo']) ? (new DateTime($_GET['dateTo']))->format('Y-m-d') : '2024-04-10';
    $total_sum = 0;
    $tong_tien = array();
    $test = array();
    $stmt = $conn->query("SELECT DATE(created_at) AS date, SUM(tong_tien) AS total_tien FROM donhang WHERE created_at BETWEEN '$dateFrom' AND '$dateTo' GROUP BY date ORDER BY date ASC;");
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $date = date("d-m-y", strtotime($row['date']));
        $tong_tien[$date] = isset($tong_tien[$date]) ? $tong_tien[$date] + $row['total_tien'] : $row['total_tien'];
        $total_tien = $row['total_tien'];
        $total_sum += $total_tien;

    }
    foreach ($tong_tien as $date => $total) {
        $test[] = array(
          'label' => $date,
          'y' => $total,
        );
    }
//    var_dump($total_sum);
    $formatted_tien = number_format($total_sum);



    $stmt = $conn->query("SELECT status, COUNT(*) AS total_orders FROM donhang GROUP BY status");
    $statistics = array();
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $status = $row['status'];
        switch ($status) {
            case '0':
                $label = 'Chờ xử lý';
                break;
            case '1':
                $label = 'Đang xử lý';
                break;
            case '2':
                $label = 'Đang giao hàng';
                break;
            case '3':
                $label = 'Đã giao hàng';
                break;
            case '4':
                $label = 'Hủy đơn hàng';
                break;
            case '5':
                $label = 'Đã hủy đơn hàng';
                break;
            default:
                $label = $status;
                break;
        }
        $statistics[] = array(
          'label' => $label,
          'y' => $row['total_orders'],
        );

    }

    $stmt = $conn->query("SELECT COUNT(*) AS total_orders FROM donhang");
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $total_all_orders = $row['total_orders'];


    $stmt = $conn->query("SELECT sp.name AS product_name, SUM(dh.tien_hang) AS total_revenue
    FROM donhang dh
    JOIN variant v ON dh.id_variant = v.var_id
    JOIN sanpham sp ON v.id_pro = sp.id
    WHERE dh.status = 3
    GROUP BY sp.id, sp.name
    ORDER BY total_revenue DESC
    LIMIT 10;
") ;
    $data = array();
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $data[] = array(
          'label' => $row['product_name'],
          'y' => $row['total_revenue'],
        );
    }
?>
?>

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    </div>

    <!-- Content Row -->
  <form method="GET" action="">
    <div class="form-row align-items-center">
      <div class="col">
        <input type="date" class="form-control mb-2" id="dateFrom" name="dateFrom" value="<?php echo isset($_GET['dateFrom']) ? htmlspecialchars($_GET['dateFrom']) : ''; ?>">
      </div>
      <div class="col">
        <input type="date" class="form-control mb-2" id="dateTo" name="dateTo" value="<?php echo isset($_GET['dateTo']) ? htmlspecialchars($_GET['dateTo']) : ''; ?>">
      </div>
      <div class="col-auto">
        <button type="submit" class="btn btn-primary mb-2">Tìm kiếm</button>
      </div>
    </div>
  </form>

    <div class="row">


        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                              Doanh thu</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $formatted_tien;?>đ</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                              Đơn hàng</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $total_all_orders ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">sản phẩm
                            </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">50%</div>
                                </div>
                                <div class="col">
                                    <div class="progress progress-sm mr-2">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Pending Requests</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

  <div class="row">
    <div class="card-body">
      <div class="chart-area">

        <div id="chartContainer1" style="height: 330px; width: 100%;"></div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="card-body">
      <div class="chart-area">
        <div id="chartContainer2" style="height: 330px; width: 100%;"></div>

      </div>
    </div>
  </div>
  <div class="row">
    <div class="card-body">
      <div class="chart-area">

        <div id="chartContainer3" style="height: 330px; width: 100%;"></div>
      </div>
    </div>
  </div>
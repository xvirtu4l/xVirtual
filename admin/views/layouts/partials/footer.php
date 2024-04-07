<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2021</span>
        </div>
    </div>
  <script>
    document.addEventListener("DOMContentLoaded", function () {
      var chart = new CanvasJS.Chart("chartContainer1", {
        animationEnabled: true,
        exportEnabled: true,
        theme: "light1",
        title: {
          text: "DOANH THU"
        },
        axisY: {
          title: "",
          includeZero: true,
          valueFormatString: "#,##0 đ"

        },
        toolTip: {
          contentFormatter: function (e) {
            var content = " ";
            content += e.entries[0].dataPoint.label;
            content += "<br/>";
            var formattedValue = e.entries[0].dataPoint.y.toLocaleString('vi-VN');
            content += formattedValue + " đ";
            return content;
          }
        },
        data: [{
          type: "line",
          indexLabelFontColor: "#5A5757",
          indexLabelPlacement: "outside",
          dataPoints: <?php echo json_encode($test, JSON_NUMERIC_CHECK); ?>
        }]
      });
      chart.render();
    });
  </script>
  <script>
    document.addEventListener("DOMContentLoaded", function () {
      var statistics = <?php echo json_encode($statistics, JSON_NUMERIC_CHECK); ?>;
      var chart2 = new CanvasJS.Chart("chartContainer2", {
        animationEnabled: true,
        title: {
          text: "Đơn hàng"
        },
        data: [{
          type: "pie",
          yValueFormatString: "#,##0.##",
          indexLabel: "{label} ({y})",
          dataPoints: statistics
        }]
      });
      chart2.render();
    });
  </script>
  <script>
    document.addEventListener("DOMContentLoaded", function () {
      var chart3 = new CanvasJS.Chart("chartContainer3", {
        animationEnabled: true,
        exportEnabled: true,
        theme: "light1",
        title: {
          text: "Top 10 sản phẩm bán chạy"
        },
        axisY: {
          title: "",
          includeZero: true
        },
        toolTip: {
          contentFormatter: function (e) {
            var content = " ";

            var formattedValue = e.entries[0].dataPoint.y.toLocaleString('vi-VN');
            content += formattedValue + " đ";
            return content;
          }
        },
        data: [{
          type: "bar",
          indexLabelFontColor: "#5A5757",
          indexLabelPlacement: "outside",
          dataPoints: <?php echo json_encode($data, JSON_NUMERIC_CHECK); ?>
        }]
      });
      chart3.render();
    });
  </script>

</footer>
<?
	if(isset($_GET['orderId']) && isset($_GET['idcart'])) {
		
		$orderId = $_GET['orderId'];
		$idcart = $_GET['idcart'];
		echo "Order ID: " . $orderId;
		echo "ID cart: " . $idcart;

	} else {
		echo "Order ID not found in the URL";
	}
	?>


		<div class="container">
            <div class="row justify-content-center">
				<div class="col-md-5">
					<div id="confirm">
						<div class="icon icon--order-success svg add_bottom_15">
							<svg xmlns="http://www.w3.org/2000/svg" width="72" height="72">
								<g fill="none" stroke="#8EC343" stroke-width="2">
									<circle cx="36" cy="36" r="35" style="stroke-dasharray:240px, 240px; stroke-dashoffset: 480px;"></circle>
									<path d="M17.417,37.778l9.93,9.909l25.444-25.393" style="stroke-dasharray:50px, 50px; stroke-dashoffset: 0px;"></path>
								</g>
							</svg>
						</div>
					<h2><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Đặt Hàng Thành Công!</font></font></h2>
					<p><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Chúc Quý Khách Một Ngày Vui Vẻ!</font></font></p>
					</div>
				</div>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
		

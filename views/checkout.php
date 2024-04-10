<?php
    require_once PATH_VIEW . '../commons/env.php';
    require_once PATH_VIEW . '../commons/helper.php';
    require_once PATH_VIEW . '../commons/connect-db.php';
    require_once PATH_VIEW . '../commons/model.php';

    function sshow_all_products_in_card() {
        try {
            $sql =  "SELECT c.id_cart, sp.name, sp.img, v.price, c.soluong, c.tong_tien, c.ship, c.tien_phai_tra, v.var_id
                    FROM cart c
                    JOIN variant v ON c.id_var = v.var_id
                    JOIN sanpham sp ON v.id_pro = sp.id";
            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll();
            return $result;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    function addToCart($id_var, $soluong, $tong_tien, $ship, $tien_phai_tra) {
        try {
            $sql = "INSERT INTO cart (id_var, soluong, tong_tien, ship, tien_phai_tra) VALUES (:id_var, :soluong, :tong_tien, :ship, :tien_phai_tra)";
            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->bindParam(':id_var', $id_var, PDO::PARAM_INT);
            $stmt->bindParam(':soluong', $soluong, PDO::PARAM_INT);
            $stmt->bindParam(':tong_tien', $tong_tien);
            $stmt->bindParam(':ship', $ship);
            $stmt->bindParam(':tien_phai_tra', $tien_phai_tra);
            $stmt->execute();
            return $GLOBALS['conn']->lastInsertId();
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        try {
            if (isset($_POST['update_cart'])) {
                $soluong = $_POST['quantity'];
                foreach ($soluong as $id_cart => $quantity) {
                    if (filter_var($quantity, FILTER_VALIDATE_INT) && $quantity > 0) {
                        $sql = "UPDATE cart SET soluong = :quantity WHERE id_cart = :id_cart";
                        $stmt = $GLOBALS['conn']->prepare($sql);
                        $stmt->bindParam(':quantity', $quantity, PDO::PARAM_INT);
                        $stmt->bindParam(':id_cart', $id_cart, PDO::PARAM_INT);
                        $stmt->execute();

                    } else {
                        $error_message = "Số lượng không hợp lệ cho sản phẩm với ID: $id_cart";

                    }
                }
            }
            else {
                $id_var = isset($_POST['id_var']) ? $_POST['id_var'] : null;
                $soluong = isset($_POST['soluong']) ? $_POST['soluong'] : null;
                $tong_tien = isset($_POST['tong_tien']) ? $_POST['tong_tien'] : null;
                $ship = isset($_POST['ship']) ? $_POST['ship'] : null;
                $tien_phai_tra = isset($_POST['tien_phai_tra']) ? $_POST['tien_phai_tra'] : null;

                if ($id_var === null || $soluong === null || $tong_tien === null || $ship === null || $tien_phai_tra === null) {
                    $error_message = "ERROR: Missing POST variables";
                } else {
                    addToCart($id_var, $soluong, $tong_tien, $ship, $tien_phai_tra);}
            }

        } catch (Exception $e) {
            $error_message = $e->getMessage();
        }
    }
    $carts = sshow_all_products_in_card();
    ?>
			<div class="container margin_30">
				<div class="page_header">
					<div class="breadcrumbs">
						<ul>
							<li><a href="#"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Trang chủ</font></font></a></li>
							<li><a href="#"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Loại</font></font></a></li>
							<li><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Trang đang hoạt động</font></font></li>
						</ul>
					</div>
					<h1><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Đăng nhập hoặc tạo một tài khoản</font></font></h1>

				</div>
				<!-- /page_header -->
				<div class="row">
					<div class="col-lg-4 col-md-6">
						<div class="step first">
							<h3><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">1. Thông tin người dùng và địa chỉ thanh toán</font></font></h3>
							<ul class="nav nav-tabs" id="tab_checkout" role="tablist">
								<li class="nav-item" role="presentation">
									<a class="nav-link active" id="home-tab" data-bs-toggle="tab" href="#tab_1" role="tab" aria-controls="tab_1" aria-selected="true"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Đăng ký</font></font></a>
								</li>
								<li class="nav-item" role="presentation">
									<a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#tab_2" role="tab" aria-controls="tab_2" aria-selected="false" tabindex="-1"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Đăng nhập</font></font></a>
								</li>
							</ul>
							<div class="tab-content checkout">
								<div class="tab-pane fade active show" id="tab_1" role="tabpanel" aria-labelledby="tab_1">
									<div class="form-group">
										<input type="email" class="form-control" placeholder="E-mail">
									</div>
									<div class="form-group">
										<input type="password" class="form-control" placeholder="Mật khẩu">
									</div>
									<hr>
									<div class="row no-gutters">
										<div class="col-6 form-group pr-1">
											<input type="text" class="form-control" placeholder="Tên">
										</div>
										<div class="col-6 form-group pl-1">
											<input type="text" class="form-control" placeholder="Họ">
										</div>
									</div>
									<!-- /row -->
									<div class="form-group">
										<input type="text" class="form-control" placeholder="Địa chỉ đầy đủ">
									</div>
									<div class="row no-gutters">
										<div class="col-6 form-group pr-1">
											<input type="text" class="form-control" placeholder="Thành phố">
										</div>
										<div class="col-6 form-group pl-1">
											<input type="text" class="form-control" placeholder="mã bưu điện">
										</div>
									</div>
									<!-- /row -->
									<div class="row no-gutters">
										<div class="col-md-12 form-group">
											<div class="custom-select-form">
												<select class="wide add_bottom_15" name="country" id="country" style="display: none;">
													<option value="" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Quốc gia</font></font></option>
													<option value="Europe"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Châu Âu</font></font></option>
													<option value="United states"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Hoa Kỳ</font></font></option>
													<option value="Asia"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Châu Á</font></font></option>
												</select><div class="nice-select wide add_bottom_15" tabindex="0"><span class="current"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Quốc gia</font></font></span><ul class="list"><li data-value="" class="option selected"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Quốc gia</font></font></li><li data-value="Europe" class="option"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Châu Âu</font></font></li><li data-value="United states" class="option"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Hoa Kỳ</font></font></li><li data-value="Asia" class="option"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Châu Á</font></font></li></ul></div>
											</div>
										</div>
									</div>
									<!-- /row -->
									<div class="form-group">
										<input type="text" class="form-control" placeholder="Điện thoại">
									</div>
									<hr>
									<div class="form-group">
										<label class="container_check" id="other_addr"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Địa chỉ thanh toán khác
											</font></font><input type="checkbox">
											<span class="checkmark"></span>
										</label>
									</div>
									<div id="other_addr_c" class="pt-2">
										<div class="row no-gutters">
											<div class="col-6 form-group pr-1">
												<input type="text" class="form-control" placeholder="Tên">
											</div>
											<div class="col-6 form-group pl-1">
												<input type="text" class="form-control" placeholder="Họ">
											</div>
										</div>
										<!-- /row -->
										<div class="form-group">
											<input type="text" class="form-control" placeholder="Địa chỉ đầy đủ">
										</div>
										<div class="row no-gutters">
											<div class="col-6 form-group pr-1">
												<input type="text" class="form-control" placeholder="Thành phố">
											</div>
											<div class="col-6 form-group pl-1">
												<input type="text" class="form-control" placeholder="mã bưu điện">
											</div>
										</div>
										<!-- /row -->
										<div class="row no-gutters">
											<div class="col-md-12 form-group">
												<div class="custom-select-form">
													<select class="wide add_bottom_15" name="country" id="country_2" style="display: none;">
														<option value="" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Quốc gia</font></font></option>
														<option value="Europe"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Châu Âu</font></font></option>
														<option value="United states"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Hoa Kỳ</font></font></option>
														<option value="Asia"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Châu Á</font></font></option>
													</select><div class="nice-select wide add_bottom_15" tabindex="0"><span class="current"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Quốc gia</font></font></span><ul class="list"><li data-value="" class="option selected"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Quốc gia</font></font></li><li data-value="Europe" class="option"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Châu Âu</font></font></li><li data-value="United states" class="option"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Hoa Kỳ</font></font></li><li data-value="Asia" class="option"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Châu Á</font></font></li></ul></div>
												</div>
											</div>
										</div>
										<!-- /row -->
										<div class="form-group">
											<input type="text" class="form-control" placeholder="Điện thoại">
										</div>
									</div>
									<!-- /other_addr_c -->
									<hr>
								</div>
								<!-- /tab_1 -->
								<div class="tab-pane fade" id="tab_2" role="tabpanel" aria-labelledby="tab_2" style="position: relative;">
									<a href="#0" class="social_bt facebook"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Đăng nhập với Facebook</font></font></a>
									<a href="#0" class="social_bt google"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Đăng nhập với Google</font></font></a>
									<div class="form-group">
										<input type="email" class="form-control" placeholder="E-mail">
									</div>
									<div class="form-group">
										<input type="password" class="form-control" placeholder="Mật khẩu" name="password_in" id="password_in">
									</div>
									<div class="clearfix add_bottom_15">
										<div class="checkboxes float-start">
											<label class="container_check"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">nhớ tôi
												</font></font><input type="checkbox">
												<span class="checkmark"></span>
											</label>
										</div>
										<div class="float-end"><a id="forgot" href="#0"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Mất mật khẩu?</font></font></a></div>
									</div>
									<div id="forgot_pw">
										<div class="form-group">
											<input type="email" class="form-control" name="email_forgot" id="email_forgot" placeholder="Nhập email của bạn">
										</div>
										<p><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Mật khẩu mới sẽ sớm được gửi.</font></font></p>
										<div class="text-center"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><input type="submit" value="Đặt lại mật khẩu" class="btn_1"></font></font></div>
									</div>
									<hr>
									<font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><input type="submit" class="btn_1 full-width" value="Đăng nhập"></font></font>
								</div>
								<!-- /tab_2 -->
							</div>
						</div>
						<!-- /step -->
					</div>
					<div class="col-lg-4 col-md-6">
						<div class="step middle payments">
							<h3><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">2. Thanh toán và vận chuyển</font></font></h3>
							<ul>
								<li>
									<label class="container_radio"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Thẻ tín dụng</font></font><a href="#0" class="info" data-bs-toggle="modal" data-bs-target="#payments_method"></a>
										<input type="radio" name="payment" checked="">
										<span class="checkmark"></span>
									</label>
								</li>
								<li>
									<label class="container_radio"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Paypal</font></font><a href="#0" class="info" data-bs-toggle="modal" data-bs-target="#payments_method"></a>
										<input type="radio" name="payment">
										<span class="checkmark"></span>
									</label>
								</li>
								<li>
									<label class="container_radio"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Thanh toán khi giao hàng</font></font><a href="#0" class="info" data-bs-toggle="modal" data-bs-target="#payments_method"></a>
										<input type="radio" name="payment">
										<span class="checkmark"></span>
									</label>
								</li>
								<li>
									<label class="container_radio"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Chuyển khoản ngân hàng</font></font><a href="#0" class="info" data-bs-toggle="modal" data-bs-target="#payments_method"></a>
										<input type="radio" name="payment">
										<span class="checkmark"></span>
									</label>
								</li>
							</ul>
							<div class="payment_info d-none d-sm-block">
								<figure><img src="img/cards_all.svg" alt=""></figure>
								<p><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Sensibus Reformidans Interpretaris sit ne, nec errem nostrum et, te nec meliore philosophia. Tại vix quidam periculis. Solet tritani ad pri, không có định nghĩa nào về biển cả.</font></font></p>
							</div>

							<h6 class="pb-2"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Phương pháp vận chuyển</font></font></h6>


							<ul>
								<li>
									<label class="container_radio"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">vận chuyển tiêu chuẩn</font></font><a href="#0" class="info" data-bs-toggle="modal" data-bs-target="#payments_method"></a>
										<input type="radio" name="shipping" checked="">
										<span class="checkmark"></span>
									</label>
								</li>
								<li>
									<label class="container_radio"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Chuyển phát nhanh</font></font><a href="#0" class="info" data-bs-toggle="modal" data-bs-target="#payments_method"></a>
										<input type="radio" name="shipping">
										<span class="checkmark"></span>
									</label>
								</li>

							</ul>

						</div>
						<!-- /step -->

					</div>
					<?php
                $totalship = 0;
                $totalP = 0;
                $tong = 0;
                foreach ($carts as $ccc) {
                    $totalP += ($ccc['soluong'] * $ccc['price']);
                }
                $totalship = (0.000005 * $totalP);
                $tong = $totalP + $totalship;
            ?>
					<div class="col-lg-4 col-md-6">
						<div class="step last">
							<h3><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">3. Tóm tắt đơn hàng</font></font></h3>
							<div class="box_general summary">
								<?php foreach($carts as $cart): ?>
								<ul>
									<li class="clearfix"><em><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?= $cart['soluong']?>x <?= $cart['name']?> </font></font></em> <span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?= number_format($cart['soluong'] * $cart['price'])?> đ</font></font></span></li>
								<?php endforeach?>
								<ul>
									<li class="clearfix"><em><strong><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Tổng giá</font></font></strong></em> <span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?= number_format($totalP) ?> đ</font></font></span></li>
									<li class="clearfix"><em><strong><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Phí vận chuyển hàng</font></font></strong></em> <span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?= number_format($totalship)?> đ</font></font></span></li>
								</ul>
								<div class="total clearfix"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">TỔNG CỘNG</font></font><span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?= number_format($tong) ?>đ</font></font></span></div>
								<div class="form-group">
									<label class="container_check"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Đăng ký nhận bản tin.
										</font></font><input type="checkbox" checked="">
										<span class="checkmark"></span>
									</label>
								</div>

								<a href="<?= BASE_URL . '?act=perfect' ?>" class="btn_1 full-width"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Xác Nhận Và Thanh Toán</font></font></a>
							</div>
							<!-- /box_general -->
						</div>
						<!-- /step -->
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->

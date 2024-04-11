<div class="container margin_30">
    <div class="page_header">
        <div class="breadcrumbs">
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">Category</a></li>
                <li>Page active</li>
            </ul>
        </div>
        <h1>Sign In or Create an Account</h1>
    </div>
    <!-- /page_header -->
    <div class="row justify-content-center">

        <form class="col-xl-6 col-lg-6 col-md-8" method="post" action="">
            <div class="box_account">
                <h3 class="new_client">Tai khoan moi</h3> <small class="float-right pt-2">* Required Fields</small>
                <div class="form_container">
                    <div class="form-group">
                        <input type="email" class="form-control <?= !empty($_SESSION['error']['email']) ? 'is-invalid' : '' ?>" name="email" id="email_2" placeholder="Email*">
                        <div class="invalid-feedback">
                            <?= !empty($_SESSION['error']['email']) ? $_SESSION['error']['email'] : '' ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control <?= !empty($_SESSION['error']['password']) ? 'is-invalid' : '' ?>" name="password" id="password_in_2" value="" placeholder="Password*">
                        <div class="invalid-feedback">
                            <?= !empty($_SESSION['error']['password']) ? $_SESSION['error']['password'] : '' ?>
                        </div>
                    </div>
                    <hr>

                    <div class="private box">
                        <div class="row no-gutters">
                            <div class="col-6 pr-1">
                                <div class="form-group">
                                    <input type="text" name="user" class="form-control  <?= !empty($_SESSION['error']['user']) ? 'is-invalid' : '' ?>" placeholder="Name*">
                                    <div class="invalid-feedback">
                                        <?= !empty($_SESSION['error']['user']) ? $_SESSION['error']['user'] : '' ?>
                                    </div>

                                </div>
                            </div>
                            <div class="col-6 pl-1">
                                <div class="form-group">
                                    <input type="text" name="address" class="form-control  <?= !empty($_SESSION['error']['address']) ? 'is-invalid' : '' ?>" placeholder="Address">
                                    <div class="invalid-feedback">
                                        <?= !empty($_SESSION['error']['address']) ? $_SESSION['error']['address'] : '' ?>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- /row -->

                        <!-- /row -->

                        <div class="row no-gutters">
                            <div class="col-6 pr-1">
                                <div class="form-group">
                                    <div class="custom-select-form">
                                        <select class="wide add_bottom_10" name="country" id="country" style="display: none;">
                                            <option value="" selected="">Country*</option>
                                            <option value="Europe">Europe</option>
                                            <option value="United states">United states</option>
                                            <option value="Asia">Asia</option>
                                        </select>
                                        <div class="nice-select wide add_bottom_10" tabindex="0"><span class="current">Country*</span>
                                            <ul class="list">
                                                <li data-value="" class="option selected">Country*</li>
                                                <li data-value="Europe" class="option">Europe</li>
                                                <li data-value="United states" class="option">United states</li>
                                                <li data-value="Asia" class="option">Asia</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 pl-1">
                                <div class="form-group">
                                    <input type="text" name="tel" class="form-control  <?= !empty($_SESSION['error']['tel']) ? 'is-invalid' : '' ?>" placeholder="Tel">
                                    <div class="invalid-feedback">
                                        <?= !empty($_SESSION['error']['tel']) ? $_SESSION['error']['tel'] : '' ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /row -->

                    </div>
                    <!-- /private -->
                    <div class="company box" style="display: none;">
                        <div class="row no-gutters">
                            <div class="col-12">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Company Name*">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Full Address">
                                </div>
                            </div>
                        </div>
                        <!-- /row -->
                        <div class="row no-gutters">
                            <div class="col-6 pr-1">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="City*">
                                </div>
                            </div>
                            <div class="col-6 pl-1">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Postal Code*">
                                </div>
                            </div>
                        </div>
                        <!-- /row -->
                        <div class="row no-gutters">
                            <div class="col-6 pr-1">
                                <div class="form-group">
                                    <div class="custom-select-form">
                                        <select class="wide add_bottom_10" name="country" id="country_2" style="display: none;">
                                            <option value="" selected="">Country*</option>
                                            <option value="Europe">Europe</option>
                                            <option value="United states">United states</option>
                                            <option value="Asia">Asia</option>
                                        </select>
                                        <div class="nice-select wide add_bottom_10" tabindex="0"><span class="current">Country*</span>
                                            <ul class="list">
                                                <li data-value="" class="option selected">Country*</li>
                                                <li data-value="Europe" class="option">Europe</li>
                                                <li data-value="United states" class="option">United states</li>
                                                <li data-value="Asia" class="option">Asia</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 pl-1">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Telephone *">
                                </div>
                            </div>
                        </div>
                        <!-- /row -->
                    </div>
                    <!-- /company -->
                    <hr>
                    <div class="form-group">
                        <label class="container_check">Accept <a href="#0">Terms and conditions</a>
                            <input type="checkbox">
                            <span class="checkmark"></span>
                        </label>
                    </div>
                    <div class="text-center"><input type="submit" name="submit" value="Register" class="btn_1 full-width"></div>
                </div>
                <!-- /form_container -->
            </div>
            <!-- /box_account -->
    </div>
</div>
<!-- /row -->
</div>
<!-- /container -->
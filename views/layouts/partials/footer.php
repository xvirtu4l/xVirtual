<footer class="revealed">
  <script>
    $(document).ready(function() {
      $('.add-to-cart').click(function(e) {
        e.preventDefault();

        var idVar = $(this).data('id_var');
        var soLuong = $(this).data('soluong');
        var tongTien = $(this).data('tong_tien');
        var ship = $(this).data('ship');
        var tienPhaiTra = $(this).data('tien_phai_tra');

        $.ajax({
          url: '<?=BASE_URL."views/" . 'cart.php'?>',
          //url: '<?php //=BASE_URL?>//?act=cart',
          type: 'POST',
          data: {
            id_var: idVar,
            soluong: soLuong,
            tong_tien: tongTien,
            ship: ship,
            tien_phai_tra: tienPhaiTra
            // id_var: 1,
            // soluong: 2,
            // tong_tien: 100,
            // ship: 10,
            // tien_phai_tra: 110
          },
          success: function(response) {
            alert('Sản phẩm đã được thêm vào giỏ hàng!');
          },
          error: function() {
            alert('Có lỗi xảy ra, không thể thêm sản phẩm vào giỏ hàng.');
          }
        });
      });
    });
  </script>

    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <h3 data-bs-target="#collapse_1">Quick Links</h3>
                <div class="collapse dont-collapse-sm links" id="collapse_1">
                    <ul>
                        <li><a href="<?=PATH_VIEW."tracking.php"?>">About us</a></li>
                        <li><a href="help.html">Faq</a></li>
                        <li><a href="help.html">Help</a></li>
                        <li><a href="account.html">My account</a></li>
                        <li><a href="blog.html">Blog</a></li>
                        <li><a href="contacts.html">Contacts</a></li>
                    </ul>
                </div>
            </div>
           
            <div class="col-lg-3 col-md-6">
                <h3 data-bs-target="#collapse_3">Contacts</h3>
                <div class="collapse dont-collapse-sm contacts" id="collapse_3">
                    <ul>
                        <li><i class="ti-home"></i>18 Trịnh Văn Bô<br>Nam Từ Liêm - Hà Nội</li>
                        <li><i class="ti-headphone-alt"></i>+84 999-999-99</li>
                        <li><i class="ti-email"></i><a href="#0">ahihigroup@gmail.com</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <h3 data-bs-target="#collapse_4">Keep in touch</h3>
                <div class="collapse dont-collapse-sm" id="collapse_4">
                    <div id="newsletter">
                        <div class="form-group">
                            <input type="email" name="email_newsletter" id="email_newsletter" class="form-control" placeholder="Your email">
                            <button type="submit" id="submit-newsletter"><i class="ti-angle-double-right"></i></button>
                        </div>
                    </div>
                    <div class="follow_us">
                        <h5>Follow Us</h5>
                        <ul>
                            <li><a href="#0"><img src="<?= BASE_URL . 'uploads/' . 'twitter_icon.svg' ?>" data-src="<?= BASE_URL . 'uploads/' . 'twitter_icon.svg' ?>" alt="" class="lazy"></a></li>
                            <li><a href="#0"><img src="<?= BASE_URL . 'uploads/' . 'facebook_icon.svg' ?>" data-src="<?= BASE_URL . 'uploads/' . 'facebook_icon.svg' ?>"></a></li>
                            <li><a href="#0"><img src="<?= BASE_URL . 'uploads/' . 'facebook_icon.svg' ?>" data-src="<?= BASE_URL . 'uploads/' . 'facebook_icon.svg' ?>"></a></li>
                            <li><a href="#0"><img src="<?= BASE_URL . 'uploads/' . 'youtube_icon.svg' ?>" data-src="<?= BASE_URL . 'uploads/' . 'youtube_icon.svg' ?>"></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- /row-->
        <hr>
        <div class="row add_bottom_25">
            <div class="col-lg-6">
                <ul class="footer-selector clearfix">
                    <li>
                        <div class="styled-select lang-selector">
                            <select>
                                <option value="English" selected>English</option>
                                <option value="French">French</option>
                                <option value="Spanish">Spanish</option>
                                <option value="Russian">Russian</option>
                            </select>
                        </div>
                    </li>
                    <li>
                        
                    </li>
                    <li><img src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" data-src="<?= BASE_URL . 'uploads/' . 'cards_all.svg' ?>" alt="" width="198" height="30" class="lazy"></li>
                </ul>
            </div>
            <div class="col-lg-6">
                <ul class="additional_links">
                    <li><a href="#0">Terms and conditions</a></li>
                    <li><a href="#0">Privacy</a></li>
                    <li><span>© 2022 Allaia</span></li>
                </ul>
            </div>
        </div>
    </div>
</footer>
<?php
    require_once PATH_VIEW . '../commons/env.php';
    require_once PATH_VIEW . '../commons/helper.php';
    require_once PATH_VIEW . '../commons/connect-db.php';
    require_once PATH_VIEW . '../commons/model.php';
    require_once PATH_VIEW . 'update_account.php';

    $id = $_SESSION['user']['id'];
    $acc = showOne('taikhoan', $id);
    
?>
<div class="top_banner">
    <div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(0, 0, 0, 0.3)">
        <div class="container">
            <div class="breadcrumbs">
                <ul>
                    <li><a href="<?= BASE_URL?>">Home</a></li>
                    <li><a href="<?= BASE_URL . 'account.php'?>">Tài khoản</a></li>
                </ul>
            </div>
            <h1>Tài khoản</h1>
        </div>
    </div>
    <img src="<?= BASE_URL . "uploads/" . 'samsungz.webp' ?>" class="img-fluid" alt="">
</div>
<!-- /top_banner -->
<div id="stick_here"></div>
<div class="toolbox elemento_stick">
    <div class="container">
        <ul class="clearfix">
         
        </ul>
    </div>
</div>
<!-- /toolbox -->

<div class="container margin_30">

    <div class="row">
       
        <!-- /col -->
        
        <div class="col-lg-9">
        <form method="post" onsubmit="return validateForm()">
            <div class="row small-gutters">
            Tên tài khoản:
            <input type="text" name="username" value="<?= $acc['user']?>" required>
            Email:
            <input type="email" name="email" value="<?= $acc['email']?>" required>
            Địa chỉ:
            <input type="text" name="address" value="<?= $acc['address']?>" required>
            Số điện thoại:
            <input type="tel" name="phone" value="0<?= $acc['tel']?>" required>
            <!-- Add a submit button -->
            
            </div>
            <br>
            <input type="submit" class="btn btn-info" value="Cập nhật" style="color: white;">
        </form>
        </div>
        <script>
// Function to check if a phone number is in Vietnamese format
function isVietnamesePhoneNumber(number) {
  return /(03|05|07|08|09|01[2|6|8|9])+([0-9]{8})\b/.test(number);
}

// Function to handle form submission
function handleSubmit(event) {
  event.preventDefault(); // Prevent the default form submission

  // Get the input values
  var username = document.querySelector('input[name="username"]').value;
  var email = document.querySelector('input[name="email"]').value;
  var address = document.querySelector('input[name="address"]').value;
  var phone = document.querySelector('input[name="phone"]').value;

  // Validate phone number
  if (!isVietnamesePhoneNumber(phone)) {
    alert('Số điện thoại không hợp lệ.');
    return;
  }

  // Submit the form if validation passes
  event.target.submit();
}

// Add event listener to the form
document.getElementById('accountForm').addEventListener('submit', handleSubmit);
</script>
            <!-- /row -->

        <!-- /col -->
    </div>
    <!-- /row -->

</div>
<!-- /container -->
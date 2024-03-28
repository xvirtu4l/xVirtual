<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title><?= $title ?? 'MobileX' ?> - Shop</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <!-- GOOGLE WEB FONT -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">

  <!-- BASE CSS -->
  <link href="<?= BASE_URL ?>assets/client/assets/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?= BASE_URL ?>assets/client/assets/css/style.css" rel="stylesheet">




  <!-- SPECIFIC CSS -->
  <link href="<?= BASE_URL ?>assets/client/assets/css/home_1.css" rel="stylesheet">
  <link href="<?= BASE_URL ?>assets/client/assets/css/listing.css" rel="stylesheet">
  <link href="<?= BASE_URL ?>assets/client/assets/css/product_page.css" rel="stylesheet">
  <link href="<?= BASE_URL ?>assets/client/assets/css/account.css" rel="stylesheet">

  <!-- YOUR CUSTOM CSS -->
  <link href="<?= BASE_URL ?>assets/client/assets/css/custom.css" rel="stylesheet">


</head>

<body class="woocommerce-active page-template-template-homepage-v1 can-uppercase">

  <!-- ======= Header ======= -->
  <div id="page">
    <?php require_once PATH_VIEW . 'layouts/partials/header.php'; ?>
    <!-- End Header -->

    <main>

      <?php require_once PATH_VIEW . $view . '.php'; ?>

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <?php require_once PATH_VIEW . 'layouts/partials/footer.php'; ?>
  </div>

  <div id="toTop"></div><!-- Back to top button -->

  <?php
  if (isset($components) && $components) {
    require_once PATH_VIEW . 'components/' . $components . '.php';
  }
  ?>

  <!-- COMMON SCRIPTS -->
  <script src="<?= BASE_URL ?>assets/client/assets/js/common_scripts.min.js"></script>
  <script src="<?= BASE_URL ?>assets/client/assets/js/main.js"></script>

  <!-- File js cụ thể -->
  <?php
  if (isset($script) && $script) {
    require_once PATH_VIEW . 'layouts/scripts/' . $script . '.php';
  }
  ?>


</body>

</html>
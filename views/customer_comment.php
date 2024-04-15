<?php
date_default_timezone_set('Asia/Ho_Chi_Minh');


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve the new comment and product ID from the form
    $newComment = $_POST["new_comment"];
    $productId = $_POST["product_id"]; // Assuming you have a hidden input field for the product ID in your form
    $userId = $_SESSION['user']['id']; // Get the user ID from the session

    // Prepare the data for insertion
    $data = [
        'idpro' => $productId,
        'iduser' => $userId, // Use the user ID obtained from the session
        'noidung' => $newComment,
        'ngaybinhluan' => date('y/m/d') // Adjusted the date format to match the database format
    ];

    // Insert the new comment into the database using the insert function
    insert('binhluan', $data);

    // Redirect back to the current page to prevent form resubmission
    echo "<script>window.location.href='" . BASE_URL . "?act=detail&id=$productId';</script>";
    exit;
}

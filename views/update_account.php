<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Receive the form data
    $id = $_SESSION['user']['id']; // Assuming you have the user's ID stored in the session
    $username = $_POST["username"];
    $email = $_POST["email"];
    $address = $_POST["address"];
    $tel = $_POST["phone"]; // Changed from "tel" to "phone" to match the input name in the form

    // Call the update function to update the database
    update('taikhoan', $id, [
        'user' => $username,
        'email' => $email,
        'address' => $address,
        'tel' => $tel
    ]);

    // Redirect back to the account page after the update
    echo "<script>window.location.href='" . BASE_URL . "?act=account';</script>";
    exit;
}
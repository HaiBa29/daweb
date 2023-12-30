<?php
session_start();

// Kiểm tra và xóa biến $discountCodeValue nếu tồn tại trong session
if (isset($_SESSION['discountPercentage'])) {
    unset($_SESSION['discountPercentage']); // Xóa giá trị từ session

    if (isset($_SESSION['discountCodeValue'])) {
        unset($_SESSION['discountCodeValue']); // Xóa giá trị từ session
    }
}


// Chuyển hướng người dùng đến trang trước đó (hoặc trang chính)
header('Location: ' . $_SERVER['HTTP_REFERER']);
?>

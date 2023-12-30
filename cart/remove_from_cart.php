<?php
session_start();
require 'connect.php';

// Lấy thông tin người dùng từ session
$userId = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;

// Kiểm tra xem người dùng đã đăng nhập chưa
if (!$userId) {
    echo "Lỗi: Người dùng chưa đăng nhập.";
    exit;
}

// Lấy cart_id từ yêu cầu POST
$cartId = isset($_POST['cart_id']) ? $_POST['cart_id'] : null;

if (!$cartId) {
    echo "Lỗi: Không có thông tin cart_id.";
    exit;
}

// Thực hiện xóa sản phẩm từ giỏ hàng
$sqlDelete = "DELETE FROM cart WHERE user_id = $userId AND cart_id = $cartId";
if (mysqli_query($conn, $sqlDelete)) {
    echo "Đã xóa sản phẩm khỏi giỏ hàng thành công!";
} else {
    echo "Lỗi khi xóa sản phẩm khỏi giỏ hàng: " . mysqli_error($conn);
}

// Đóng kết nối
mysqli_close($conn);
?>

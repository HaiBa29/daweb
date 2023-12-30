<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Update</title>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
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

// Lấy thông tin từ biểu mẫu POST
$cartId = isset($_POST['cart_id']) ? $_POST['cart_id'] : null;
$newQuantity = isset($_POST['new_quantity']) ? $_POST['new_quantity'] : null;

// Kiểm tra xem có đủ thông tin để cập nhật không
if (!$cartId || !$newQuantity) {
  echo "Lỗi: Không đủ thông tin để cập nhật số lượng.";
  exit;
}

// Thực hiện truy vấn cập nhật số lượng trong bảng cart
$sqlUpdateQuantity = "UPDATE cart SET quantity = $newQuantity WHERE user_id = $userId AND cart_id = $cartId";
if (mysqli_query($conn, $sqlUpdateQuantity)) {
  // Hiển thị cửa sổ thông báo thành công sử dụng thư viện Swal 2
  echo '
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        Swal.fire({
            icon: "success",
            title: "Thành công!",
            text: "Cập nhật số lượng thành công!",
            showConfirmButton: false,
            timer: 1500
        }).then(function() {
            // Redirect hoặc thực hiện các hành động khác sau khi hiển thị thông báo
            window.location.href = "giohang.php";
        });
    </script>';
} else {
  // Hiển thị cửa sổ thông báo lỗi
  echo '
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        Swal.fire({
            icon: "error",
            title: "Lỗi!",
            text: "Lỗi khi cập nhật số lượng: ' . mysqli_error($conn) . '"
        });
    </script>';
}

// Đóng kết nối
mysqli_close($conn);
?>
</body>

</html>

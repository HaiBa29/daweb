<?php
require 'connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cartId = isset($_POST['cart_id']) ? $_POST['cart_id'] : null;
    $newFrameSize = isset($_POST['new_frame_size']) ? $_POST['new_frame_size'] : null;

    // Kiểm tra xem cart_id và new_frame_size có giá trị không
    if ($cartId && $newFrameSize) {
        // Cập nhật dữ liệu trong bảng cart
        $updateSql = "UPDATE cart SET frame_size = '$newFrameSize' WHERE cart_id = $cartId";
        $updateResult = mysqli_query($conn, $updateSql);

        if ($updateResult) {
            // Thực hiện reload và chuyển hướng về trang giohang.php
            echo "<script>window.location.href = 'giohang.php';</script>";
            // Kết thúc script để không hiển thị bất kỳ phần nào sau khi reload
            exit();
        } else {
            echo "Có lỗi xảy ra khi cập nhật kích thước khung xe.";
        }
    } else {
        echo "Lỗi: Không có đủ thông tin để cập nhật kích thước khung xe.";
    }
} else {
    echo "Lỗi: Phương thức yêu cầu không hợp lệ.";
}

// Đóng kết nối
mysqli_close($conn);
?>

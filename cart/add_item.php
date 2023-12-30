<?php
// process_order.php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Giả sử bạn đã bắt đầu một phiên
    session_start();

    // Kiểm tra xem người dùng đã đăng nhập chưa
    if(isset($_SESSION['user_id'])) {
        // Người dùng đã đăng nhập, bạn có thể thực hiện truy vấn từ bảng cart
        $userId = $_SESSION['user_id'];

        // Kết nối đến cơ sở dữ liệu (điều này cần được điều chỉnh dựa trên cấu hình cụ thể của bạn)
        require 'connect.php';
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Kiểm tra kết nối
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Truy vấn thông tin từ bảng cart cho người dùng hiện tại
        $query = "SELECT * FROM cart WHERE user_id = $userId";
        $result = $conn->query($query);

        // Kiểm tra xem có dữ liệu hay không
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                // Lấy thông tin từ $row và thực hiện việc chèn dữ liệu vào bảng order_items
                $bikeId = $row['bike_id'];
                $quantity = $row['quantity'];
                $size = $row['frame_size'];
               // $totalPrice = $row['total_discount'];

                // Chèn dữ liệu vào bảng order_items
                $insertQuery = "INSERT INTO order_items (cart_id, user_id, bike_id, quantity, frame_size)
                                VALUES (NULL, $userId, $bikeId, $quantity, '$size')";

                if ($conn->query($insertQuery) === TRUE) {
                    // Xóa dữ liệu từ bảng cart sau khi chèn thành công vào order_items
                    $deleteQuery = "DELETE FROM cart WHERE user_id = $userId";
                    $conn->query($deleteQuery);
                } else {
                    echo "Lỗi chèn dữ liệu vào order_items: " . $conn->error;
                }
            }
        } else {
            echo "Không có sản phẩm trong giỏ hàng của bạn.";
        }

        // Đóng kết nối đến cơ sở dữ liệu
        $conn->close();
    } else {
        // Người dùng chưa đăng nhập
        echo "Vui lòng đăng nhập để xem giỏ hàng của bạn.";
    }
} else {
    // Chuyển hướng về trang trước nếu truy cập trực tiếp
    header("Location: " . $_SERVER["HTTP_REFERER"]);
    exit();
}
?>

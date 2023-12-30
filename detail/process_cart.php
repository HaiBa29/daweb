<?php
// Kết nối CSDL
$servername = "localhost";
$username = "root";
$password = "";
$database = "taikhoan";

$connection = new mysqli($servername, $username, $password, $database);

// Kiểm tra kết nối
if ($connection->connect_error) {
    die("Kết nối CSDL thất bại: " . $connection->connect_error);
}

// Xử lý yêu cầu POST để thêm sản phẩm vào giỏ hàng
if (isset($_POST["add_to_cart"])) {
    $username = $_POST["username"];
    $productName = $_POST["product_name"];
    $productPrice = $_POST["product_price"];

    // Thực hiện truy vấn SQL để thêm sản phẩm vào bảng user_carts dựa trên username
    $insertQuery = "INSERT INTO user_carts (username, product_name, product_price) VALUES ('$username', '$productName', $productPrice)";
    
    if ($connection->query($insertQuery) === TRUE) {
        echo "Sản phẩm đã được thêm vào giỏ hàng.";
    } else {
        echo "Lỗi khi thêm sản phẩm vào giỏ hàng: " . $connection->error;
    }
}

// Xử lý yêu cầu GET để lấy thông tin giỏ hàng
if (isset($_GET["username"])) {
    $username = $_GET["username"];

    // Thực hiện truy vấn SQL để lấy thông tin giỏ hàng dựa trên username từ bảng user_carts và users
    $selectQuery = "SELECT uc.product_name, uc.product_price 
                    FROM user_carts uc
                    JOIN users u ON uc.username = u.username
                    WHERE u.username = '$username'";
    $result = $connection->query($selectQuery);

    if ($result->num_rows > 0) {
        // Hiển thị thông tin giỏ hàng dưới dạng HTML
        echo '<table>';
        echo '<tr><th>Sản Phẩm</th><th>Giá</th></tr>';
        while ($row = $result->fetch_assoc()) {
            echo '<tr>';
            echo '<td>' . $row["product_name"] . '</td>';
            echo '<td>' . $row["product_price"] . '</td>';
            echo '</tr>';
        }
        echo '</table>';
    } else {
        echo "Giỏ hàng của bạn hiện đang trống.";
    }
}


// Đóng kết nối CSDL
$connection->close();
?>

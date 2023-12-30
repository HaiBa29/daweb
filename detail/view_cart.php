<?php
// Kết nối CSDL
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "taikhoan";

$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối CSDL thất bại: " . $conn->connect_error);
}

session_start();

if (!isset($_SESSION['username'])) {
    header('Location: ../login/login.php'); 
    exit();
}

$username = $_SESSION['username'];

$query = "SELECT product_name, product_price FROM user_carts WHERE username = '$username'";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    echo "<table>";
    echo "<tr><th>Sản Phẩm</th><th>Giá</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["product_name"] . "</td>";
        echo "<td>" . $row["product_price"] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "Giỏ hàng của bạn hiện đang trống.";
}

$conn->close();
?>

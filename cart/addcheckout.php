<?php
require 'connect.php';
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
session_start();
$user_id = $_SESSION['user_id'];
//$productName = isset($_SESSION['productName']) ? $_SESSION['productName'] : '';
$quantity = isset($_SESSION['quantity']) ? $_SESSION['quantity'] : '';
$finalTotal = isset($_SESSION['finalTotal']) ? $_SESSION['finalTotal'] : '';
$totalQuantity = $_SESSION['totalQuantity'];


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy dữ liệu từ form
    $customerName = mysqli_real_escape_string($conn, $_POST['billing-name']);
    $customerEmail = mysqli_real_escape_string($conn, $_POST['billing-email-address']);
    $customerPhone = mysqli_real_escape_string($conn, $_POST['billing-phone']);
    $customerAddress = mysqli_real_escape_string($conn, $_POST['billing-address']);
            // Lấy giá trị từ input ẩn
            $paymentMethod = $_POST['payment-method'];
// Kiểm tra giá trị của payment-method
$paymentMethod = isset($_POST['payment-method']) ? mysqli_real_escape_string($conn, $_POST['payment-method']) : '';



    // Thêm dữ liệu vào bảng order_details
    $sql = "INSERT INTO order_details (id, customer_name, customer_email, customer_phone, customer_address, quantity, total_amount, payment_method)
            VALUES ('$user_id','$customerName', '$customerEmail', '$customerPhone', '$customerAddress',  '$totalQuantity', '$finalTotal', '$paymentMethod')";

    if ($conn->query($sql) === TRUE) {
        header("Location: allbike.php");
    exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Đóng kết nối
$conn->close();
?>

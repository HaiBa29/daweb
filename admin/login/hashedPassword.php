<?php
$password = '1'; // Mật khẩu của tài khoản Admin

// Băm mật khẩu
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

// Sau đó, thêm tài khoản Admin vào bảng "users" với mật khẩu đã được băm
$username = 'admin';
$is_admin = 1;

$conn = new mysqli('localhost', 'root', '', 'taikhoan');
if ($conn->connect_error) {
    die("Connection Failed: " . $conn->connect_error);
} else {
    $stmt = $conn->prepare("INSERT INTO users (username, password, is_admin) VALUES (?, ?, ?)");
    $stmt->bind_param("ssi", $username, $hashedPassword, $is_admin);
    $stmt->execute();
    $stmt->close();
    $conn->close();
}
?>
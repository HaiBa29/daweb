<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login User</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>

<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Database connection
    $conn = new mysqli('localhost', 'root', '', 'taikhoan');
    if ($conn->connect_error) {
        die("Connection Failed: " . $conn->connect_error);
    } else {
        $stmt = $conn->prepare("SELECT id, password FROM users WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();

        if ($user && password_verify($password, $user['password'])) {
            // Đăng nhập thành công
            $_SESSION['username'] = $username;
            $_SESSION['user_id'] = $user['id'];
            // Kiểm tra xem có URL được lưu trữ không
            if (isset($_SESSION['redirect_url']) && !empty($_SESSION['redirect_url'])) {
                // Lấy URL từ biến session
                $redirect_url = $_SESSION['redirect_url'];

                // Chuyển hướng về trang đã lưu trữ
                header("Location: " . $redirect_url);
                exit();
            } else {
                // Nếu không có URL được lưu trữ, chuyển hướng về trang mặc định (ví dụ: index.php)
                header("Location: ../index.php");
                exit();
            }
        } else {
            // Đăng nhập không thành công
            echo "<script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Invalid username or password',
                        text: 'Please try again!',
                        showConfirmButton: true,
                        showCancelButton: false,
                        confirmButtonText: 'OK'
                    }).then(function() {
                        window.location.href = 'login.php';
                    });
                  </script>";
        }

        $stmt->close();
        $conn->close();
    }
}
?>

?>

</body>

</html>

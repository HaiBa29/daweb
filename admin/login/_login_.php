<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <?php
    session_start();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $conn = new mysqli('localhost', 'root', '', 'taikhoan');
        if ($conn->connect_error) {
            die("Connection Failed: " . $conn->connect_error);
        } else {
            $stmt = $conn->prepare("SELECT id, password, is_admin FROM users WHERE username = ?");
            $stmt->bind_param("s", $username);
            $stmt->execute();
            $result = $stmt->get_result();
            $user = $result->fetch_assoc();

            if ($user && password_verify($password, $user['password']) && $user['is_admin'] == 1) {
                $_SESSION['id'] = $user['id'];
                $_SESSION['is_admin'] = $user['is_admin'];
                header("Location: ../ad.php");
                exit();
            } else {
                echo "<script>
                Swal.fire({
                    icon: 'error',
                    title: 'Invalid Login',
                    text: 'Invalid username or password! Please try again.',
                }).then(function() {
                    window.location.href = 'login_ad.php';
                });
            </script>";
            }

            $stmt->close();
            $conn->close();
        }
    }

    ?>
</body>

</html>
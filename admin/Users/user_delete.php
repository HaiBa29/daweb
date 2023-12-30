<?php
$host = "localhost";
$username = "root";
$password = "";
$dbname = "taikhoan";
$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Kết nối CSDL thất bại: " . $conn->connect_error);
}

$response = array();

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Xóa dữ liệu từ bảng comments trước
    $sql_comments = "DELETE FROM comments WHERE user_id = $id";
    if ($conn->query($sql_comments) === TRUE) {
        // Tiếp theo, xóa người dùng từ bảng users
        $sql_users = "DELETE FROM users WHERE id = $id";

        if ($conn->query($sql_users) === TRUE) {
            $response['status'] = 'delete success';
            $response['message'] = 'The user has been successfully deleted';
        } else {
            $response['status'] = 'delete error';
            $response['message'] = 'Error when deleting user: ' . $conn->error;
        }
    } else {
        $response['status'] = 'delete error';
        $response['message'] = 'Error when deleting comments: ' . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Delete</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body>
    <script>
        <?php
        if (isset($response['status'])) {
            echo 'var response = ' . json_encode($response) . ';';
        }
        ?>

        if (response) {
            Swal.fire({
                title: 'Confirm Deletion',
                text: 'Are you sure you want to delete this user?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it',
                cancelButtonText: 'No, cancel',
                reverseButtons: true
            }).then(function(result) {
                if (result.isConfirmed) {
                    if (response.status === 'delete success') {
                        Swal.fire({
                            title: 'Deleted Successfully!',
                            text: response.message,
                            icon: 'success'
                        }).then(function() {
                            window.location.href = 'admin/ad.php';
                        });
                    } else {
                        Swal.fire({
                            title: 'Error!',
                            text: response.message,
                            icon: 'error'
                        });
                    }
                }
            });
        }
    </script>
</body>

</html>

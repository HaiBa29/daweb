<?php
// Đặt session_start() ở đầu trang
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>User Management</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <?php

    $host = "localhost";
    $username = "root";
    $password = "";
    $dbname = "taikhoan";
    $conn = new mysqli($host, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Kết nối CSDL thất bại: " . $conn->connect_error);
    }
    if (isset($_GET['delete_id'])) {
        $delete_id = $_GET['delete_id'];
        $delete_sql = "DELETE FROM users WHERE id = $delete_id";
        if ($conn->query($delete_sql) === TRUE) {
            echo "<script>
            Swal.fire({
                icon: 'success',
                title: 'The user\'s administrator rights have been revoked',
                showConfirmButton: false,
                timer: 1500
            }).then(function() {
                window.location.href = '../ad.php';
            });
        </script>";
            exit;
        }
    }

    if (isset($_GET['grant_admin'])) {
        $user_id = $_GET['grant_admin'];
        $grant_admin_sql = "UPDATE users SET is_admin = 1 WHERE id = $user_id";
        if ($conn->query($grant_admin_sql) === TRUE) {
            echo "<script>
            Swal.fire({
                icon: 'success',
                title: 'Administrator rights have been granted to the user successfully',
                showConfirmButton: false,
                timer: 1500
            }).then(function() {
                window.location.href = '../ad.php';
            });
        </script>";
            exit;
        }
    }

    if (isset($_GET['revoke_admin'])) {
        $user_id = $_GET['revoke_admin'];

        if (isset($_SESSION['is_admin']) && $_SESSION['is_admin'] == 1) {
            $revoke_admin_sql = "UPDATE users SET is_admin = 0 WHERE id = $user_id";
            $result = $conn->query($revoke_admin_sql);

            if ($result === TRUE) {
                echo "<script>
                Swal.fire({
                    icon: 'success',
                    title: 'Admin rights revoked successfully',
                    showConfirmButton: false,
                    timer: 1500
                }).then(function() {
                    window.location.href = '../ad.php';
                });
            </script>";
                exit;
            } else {
                echo "<script>
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'An error occurred while revoking admin rights.'
                });
            </script>";
            }
        } else {
            echo "<script>
            Swal.fire({
                icon: 'error',
                title: 'Access Denied',
                text: 'You do not have permission to revoke admin rights.'
            }).then(function() {
                window.location.href = '../ad.php';
            });
        </script>";
        }
    }

    $sql = "SELECT * FROM users";
    $result = $conn->query($sql);
    ?>
    <div class="container">
        <h1 class="mt-4">User Management</h1>
        <a class="btn btn-success mb-4" href="/admin/Users/add_user.php">Add User</a>

        <table class="table table-bordered">
            <thead>
                <tr style="text-align: center;">
                    <th>User ID</th>
                    <th>Username</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td style='text-align: center;'>" . $row['id'] . "</td>";
                        echo "<td style='text-align: center;'>" . $row['username'] . "</td>";
                        echo '<td style="text-align: center;">
                            <a class="btn btn-primary" href="Users/edit_user.php?id=' . $row['id'] . '">Edit</a>
                            <a class="btn btn-danger" href="Users/user_delete.php?id=' . $row['id'] . '">Delete</a>';

                        if ($row['is_admin'] == 0) {
                            echo ' <a class="btn btn-success" href="Users/users.php?grant_admin=' . $row['id'] . '">Grant Admin</a>';
                        } else {
                            echo ' <a class="btn btn-warning" href="Users/users.php?revoke_admin=' . $row['id'] . '">Revoke Admin</a>';
                        }

                        echo '</td>';
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='3'>No users found.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>
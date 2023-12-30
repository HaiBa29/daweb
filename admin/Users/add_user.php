<?php
$host = "localhost";
$username = "root";
$password = "";
$dbname = "taikhoan";
$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Kết nối CSDL thất bại: " . $conn->connect_error);
}

if (isset($_POST['add_user'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $add_sql = "INSERT INTO users (username, password) VALUES (?, ?)";
    $stmt = $conn->prepare($add_sql);

    if ($stmt) {
        $stmt->bind_param("ss", $username, $hashedPassword);
        if ($stmt->execute()) {
            header("Location: add_user.php?added=success");
        } else {
        
        }
        $stmt->close();
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Add User</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
</head>

<body>
    <div class="container mt-4">
        <h1>Add User</h1>
        <form method="post">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" class="form-control" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" name="password" required>
            </div>
            <button type="submit" class="btn btn-success " name="add_user">Add User</button>
            <a class="btn btn-primary" href="/admin/ad.php">Back to User Management</a>
        </form>
    </div>
    <script>
        <?php if (isset($_GET['added']) && $_GET['added'] === "success") : ?>
            Swal.fire({
                title: 'User Added Successfully',
                text: 'The user has been added to the database.',
                icon: 'success'
            });
        <?php endif; ?>
    </script>

</body>

</html>

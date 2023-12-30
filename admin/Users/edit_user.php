<?php
$host = "localhost";
$username = "root";
$password = "";
$dbname = "taikhoan";
$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Kết nối CSDL thất bại: " . $conn->connect_error);
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM users WHERE id = $id";
    $result = $conn->query($sql);
    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();
    }
}

if (isset($_POST['edit_user'])) {
    $newUsername = $_POST['username'];
    $newPassword = $_POST['password'];
    $edit_sql = "UPDATE users SET username = '$newUsername', password = '$newPassword' WHERE id = $id";
    if ($conn->query($edit_sql) === TRUE) {
        header("Location: /admin/ad.php");
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Edit User</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-4">
        <h1>Edit User</h1>
        <form method="post">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" class="form-control" name="username" value="<?php echo $user['username']; ?>" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" name="password" value="<?php echo $user['password']; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary" name="edit_user">Save Changes</button>
            <a class="btn btn-secondary" href="../ad.php">Back to User Management</a>
        </form>
    </div>
</body>

</html>
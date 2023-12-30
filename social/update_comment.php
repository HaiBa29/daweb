<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: _login.php");
    exit();
}

require_once("database.php");

$username = $_SESSION['username'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $commentID = $_POST['comment_id'];
    $commentContent = $_POST['comment_content'];

    // Thực hiện truy vấn để cập nhật comment trong cơ sở dữ liệu
    $updateCommentQuery = "UPDATE comments SET comment_content = '$commentContent' WHERE id = $commentID AND user_id = (SELECT id FROM users WHERE username = '$username')";

    if ($conn->query($updateCommentQuery) === TRUE) {
        // Cập nhật comment thành công, làm mới trang để hiển thị comment mới
        header("Location: social.php");
        exit();
    } else {
        echo "Lỗi khi cập nhật comment: " . $conn->error;
    }
}
?>

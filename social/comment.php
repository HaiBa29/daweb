<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: _login.php");
    exit();
}

require_once("database.php");

$username = $_SESSION['username'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $postID = $_POST['post_id'];
    $commentContent = $_POST['comment_content'];

    // Thực hiện truy vấn để lưu comment vào cơ sở dữ liệu
    $insertCommentQuery = "INSERT INTO comments (post_id, user_id, comment_content, created_at) VALUES ($postID, (SELECT id FROM users WHERE username = '$username'), '$commentContent', NOW())";
    if ($conn->query($insertCommentQuery) === TRUE) {
        // Cập nhật thành công, làm mới trang để hiển thị comment mới
        header("Location: social.php");
        exit();
    } else {
        echo "Lỗi khi đăng comment: " . $conn->error;
    }
}
?>

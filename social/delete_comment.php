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

    // Thực hiện truy vấn để xóa comment khỏi cơ sở dữ liệu
    $deleteCommentQuery = "DELETE FROM comments WHERE id = $commentID AND user_id = (SELECT id FROM users WHERE username = '$username')";
    
    if ($conn->query($deleteCommentQuery) === TRUE) {
        header("Location: social.php");
        exit();
    } else {
        echo "Lỗi khi xóa comment: " . $conn->error;
    }
}
?>

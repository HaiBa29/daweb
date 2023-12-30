<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: ../login/login.php");
    exit();
}

require_once("database.php");

$username = $_SESSION['username'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $postID = $_POST['post_id'];

    // Trước tiên, xóa các bình luận liên quan đến bài viết
    $deleteCommentsQuery = "DELETE FROM comments WHERE post_id = $postID";
    
    if ($conn->query($deleteCommentsQuery) === TRUE) {
        // Tiếp theo, xóa bài viết khỏi bảng posts
        $deletePostQuery = "DELETE FROM posts WHERE id = $postID AND user_id = (SELECT id FROM users WHERE username = '$username')";
        
        if ($conn->query($deletePostQuery) === TRUE) {
            // Xóa bài viết và bình luận thành công, làm mới trang để hiển thị thông tin mới
            header("Location: social.php");
            exit();
        } else {
            echo "Lỗi khi xóa bài viết: " . $conn->error;
        }
    } else {
        echo "Lỗi khi xóa bình luận: " . $conn->error;
    }
}
?>

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

    // Thực hiện kiểm tra quyền trước khi hiển thị form
    $getCommentQuery = "SELECT * FROM comments WHERE id = ? AND user_id = (SELECT id FROM users WHERE username = ?)";
    $stmt = $conn->prepare($getCommentQuery);
    $stmt->bind_param("is", $commentID, $username);
    $stmt->execute();
    $commentResult = $stmt->get_result();

    if ($commentResult->num_rows > 0) {
        $commentRow = $commentResult->fetch_assoc();
        $commentContent = $commentRow['comment_content'];
        
        // Hiển thị form để chỉnh sửa comment
        echo "<form action='update_comment.php' method='post'>";
        echo "<input type='hidden' name='comment_id' value='" . $commentID . "'>";
        echo "<textarea name='comment_content' placeholder='Chỉnh sửa comment' required>" . $commentContent . "</textarea><br>";
        echo "<button type='submit'>Lưu</button>";
        echo "</form>";
    } else {
        echo "Không tìm thấy comment hoặc bạn không có quyền sửa comment này.";
    }
    $stmt->close();
}
?>

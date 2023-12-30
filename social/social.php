<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: ../login/login.php");
    exit();
}

require_once("database.php");

$username = $_SESSION['username'];

$postQuery = "SELECT posts.*, users.username FROM posts JOIN users ON posts.user_id = users.id ORDER BY created_at DESC";
$postResult = $conn->query($postQuery);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $content = $_POST['content'];

    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $image = $_FILES['image'];
        $imagePath = "uploads/" . uniqid() . "_" . $image['name'];
        if (move_uploaded_file($image['tmp_name'], $imagePath)) {
        } else {
            echo "Lỗi khi di chuyển tệp ảnh.";
        }
    } else {
        $imagePath = "";
    }

    $insertQuery = "INSERT INTO posts (user_id, content, image_path, created_at) VALUES ((SELECT id FROM users WHERE username = '$username'), '$content', '$imagePath', NOW())";
    if ($conn->query($insertQuery) === TRUE) {
        header("Location: social.php");
        exit();
    } else {
        echo "Lỗi khi đăng bài: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Socials</title>
    <link rel="stylesheet" href="social.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Amatic+SC:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Inter:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
    <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="../assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link href="../assets/css/main.css" rel="stylesheet">
    <link rel="shortcut icon" type="image/png" href="../assets/img/logobikebuzz.png" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" />
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
<style>
    button i {
        font-size: 20px;
    }
</style>
</head>

<body>
    <header id="header" class="header fixed-top d-flex align-items-center">
        <div class="container d-flex align-items-center justify-content-between">

            <a href="../index.html" class="logo d-flex align-items-center me-auto me-lg-0">
                <img src="../assets/img/logobikebuzz.png" alt="bikebuzz">
            </a>

            <?php include("menu2.php"); ?>
            <a class="btn-book" href="../login/logout.php">Log out</a>
            <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
            <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

        </div>
    </header>

    <div class="post-form container">
        <?php
        if (isset($username)) {
            echo "<div class='user-container'>";
            echo "<h1 class='user'>Hello, <span class='username'>$username</span>!</h1>";
            echo "</div>";
        } else {
            echo "<div class='user-container'>";
            echo "<h1 class='user'>Please log in !!</h1>";
            echo "</div>";
        }
        ?>
        <h2 class="update-status">Update Your Status Now</h2>

        <form action="" method="post" enctype="multipart/form-data">
            <textarea class="form-control" name="content" placeholder="Write your post here" required></textarea>
            <br>
            <div class="d-flex">
                <button class="btn btn-primary" style='background-color: #2a2a2a; color: #fff; font-weight: 500; border-radius: 7px;' onclick="document.getElementById('fileInput').click()">Upload Image <i class='bx bx-upload bx-tada' style="color: #33CCFF;"></i></button>
                <input id="fileInput" type="file" name="image" accept="image/*" style="display: none;">
            </div>
            <br>
            <!-- Hiển thị tên tệp và ảnh trước -->
            <div id="filePreviews" style="display: none;"></div>
            <button type="submit" class="btn btn-primary" style="font-size: 18px; font-weight: 500; background-color: #33CCFF; border-radius: 50% 20% / 10% 40%;">Post</button>
        </form>

        <script>
            const fileInput = document.getElementById('fileInput');
            const filePreviews = document.getElementById('filePreviews');

            fileInput.addEventListener('change', (e) => {
                const file = e.target.files[0];
                if (file) {
                    const filePreview = document.createElement('div');
                    filePreview.style.display = 'flex';
                    filePreview.style.alignItems = 'center';

                    if (file.type.startsWith('image')) {
                        const img = document.createElement('img');
                        img.src = URL.createObjectURL(file);
                        img.style.maxWidth = '200px';
                        img.style.maxHeight = '200px';
                        img.style.borderRadius = '10px';
                        img.style.marginTop = '10px';

                        const fileName = document.createElement('span');
                        fileName.innerText = file.name;
                        fileName.style.color = '#33CCFF';
                        fileName.style.fontWeight = 'bold';
                        fileName.style.textTransform = 'uppercase';
                        fileName.style.marginLeft = '10px';

                        const deleteButton = document.createElement('button');
                        deleteButton.innerText = 'Xóa';
                        deleteButton.style.backgroundColor = 'red';
                        deleteButton.style.color = '#fff';
                        deleteButton.style.border = 'none';
                        deleteButton.style.borderRadius = '5px';
                        deleteButton.style.marginLeft = '10px';

                        deleteButton.addEventListener('click', () => {
                            filePreview.remove();
                            fileInput.value = null;
                        });

                        filePreview.appendChild(img);
                        filePreview.appendChild(fileName);
                        filePreview.appendChild(deleteButton);
                        filePreviews.appendChild(filePreview);
                    }
                }
                filePreviews.style.display = 'block';
            });
        </script>
    </div>

    <div class="posts container">
        <h2>All Posts</h2>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <script src="../js.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script>
        AOS.init()
    </script>
    <div id="preloader"></div>

    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/vendor/aos/aos.js"></script>
    <script src="../assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="../assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="../assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="../assets/vendor/php-email-form/validate.js"></script>
    <script src="../assets/js/main.js"></script>
</body>

</html>

<?php
if ($postResult->num_rows > 0) {
    while ($postRow = $postResult->fetch_assoc()) {
        echo "<div class='post container'>";
        echo "<p style='font-size: 16px; margin-top: 2%; margin-left: 1%; text-align: center;'>" . $postRow['content'] . "</p>";

        echo "<form action='delete_post.php' method='post'>";

        // Kiểm tra xem người đăng nhập có phải là chủ bài viết hay không
        if ($username === $postRow['username']) {
            echo "<input type='hidden' name='post_id' value='" . $postRow['id'] . "'>";
            echo "<button type='submit' class='btn btn-danger' style='border-radius: 10px; color: white;'>Delete Post</button>";
        } else {
            // Nếu không phải là chủ bài viết, ẩn nút "Delete Post"
            echo "<span style='color: #79AC78;'><i class='bx bx-book-content'></i> Let's discuss the price with the article owner <i class='bx bx-book-content'></i></span>";
        }

        echo "</form>";


        if (!empty($postRow['image_path'])) {
            echo "<div style='text-align: center;'>";
            echo "<img src='" . $postRow['image_path'] . "' alt='Post Image' style='margin-top: 1%; margin-bottom: 1%; border-radius: 20px; width: 40%; margin-left: auto; margin-right: auto;'><br>";
            echo "</div>";
        }

        echo "<p style='margin-bottom: 1%; color: red; font-size: 14px; text-align: center;'><strong>Posted By:</strong> @" . $postRow['username'] . "</p>";
        echo "<p style='font-size: 14px; color: #FF6600; text-align: center;'><strong>Posted on:</strong> " . $postRow['created_at'] . "</p>";

        echo "<form action='comment.php' method='post'>";
        echo "<input type='hidden' name='post_id' value='" . $postRow['id'] . "'>";
        echo "<div class='input-group mb-3'>";
        echo "<input type='text' class='form-control' name='comment_content' placeholder='Write a comment' required>";
        echo "<button type='submit' class='btn btn-success'><i class='bx bxs-message-rounded-minus bx-tada' ></i></button>";
        echo "</div>";
        echo "</form>";

        $postID = $postRow['id'];
        $commentQuery = "SELECT comments.*, users.username FROM comments JOIN users ON comments.user_id = users.id WHERE comments.post_id = $postID";
        $commentResult = $conn->query($commentQuery);

        echo "<div class='comments'>";
        while ($commentRow = $commentResult->fetch_assoc()) {
            echo "<div class='comment'>";
            echo "<div class='comment-content'>";
            echo "<p style='font-size: 15px; color: #10AB39; font-weight:600;'>- " . $commentRow['comment_content'] . "</p>";
            echo "<p style='color: #789407;'>Commented by: @" . $commentRow['username'] . "</p>";
            echo "</div>";

            echo "<div class='bt'>";
            // Kiểm tra xem người đăng nhập có phải là chủ bài viết hay không
            if ($username === $commentRow['username']) {
                echo "<form action='delete_comment.php' method='post'>";
                echo "<input type='hidden' name='comment_id' value='" . $commentRow['id'] . "'>";
                echo "<button type='submit' class='btn btn-danger'><i class='bx bx-trash bx-flashing' ></i></button>";
                echo "</form>";
                echo "<form action='edit_comment.php' method='post'>";
                echo "<input type='hidden' name='comment_id' value='" . $commentRow['id'] . "'>";
                echo "<button type='submit' class='btn btn-warning'><i class='bx bx-message-square-edit bx-flashing' ></i></button>";
                echo "</form>";
            }
            echo "</div>";

            echo "</div>";
        }

        echo "</div>";

        echo "</div>";
    }
} else {
    echo "<div class='container'>No posts yet.</div>";
}
?>
</div>
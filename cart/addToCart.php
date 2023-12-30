<?php
session_start();
require 'connect.php';

// Lấy thông tin người dùng từ session
$username = isset($_SESSION['username']) ? $_SESSION['username'] : null;

// Kiểm tra xem username có giá trị không
if ($username === null) {
    echo "Lỗi: Tên đăng nhập không khả dụng.";
    exit;
}

// Xác định thông tin sản phẩm và người dùng
$bikeId = isset($_POST['bike_id']) ? $_POST['bike_id'] : null;
$quantity = isset($_POST['quantity']) ? $_POST['quantity'] : 1;
$size = isset($_POST['size']) ? $_POST['size'] : '';

// Kiểm tra xem thông tin sản phẩm có đầy đủ không
if (!$bikeId || !$quantity || !$size) {
    echo "Lỗi: Thiếu thông tin sản phẩm.";
    exit;
}

// Lấy `user_id` từ bảng `users` dựa trên tên đăng nhập
$sqlUserId = "SELECT id FROM users WHERE username = '$username'";
$resultUserId = mysqli_query($conn, $sqlUserId);

if (!$resultUserId || mysqli_num_rows($resultUserId) == 0) {
    echo "Lỗi: Không tìm thấy thông tin người dùng.";
    exit;
}

$rowUserId = mysqli_fetch_assoc($resultUserId);
$userId = $rowUserId['id']; // Corrected variable name to 'id'

// Lấy thông tin sản phẩm từ bảng bikes
$sqlBike = "SELECT * FROM bikes WHERE bike_id = $bikeId";
$resultBike = mysqli_query($conn, $sqlBike);

if (!$resultBike || mysqli_num_rows($resultBike) == 0) {
    echo "Lỗi: Không tìm thấy thông tin sản phẩm.";
    exit;
}

$rowBike = mysqli_fetch_assoc($resultBike);

// Lấy thông tin sản phẩm từ bảng cart để kiểm tra xem sản phẩm đã tồn tại trong giỏ hàng chưa
$sqlCheckCart = "SELECT * FROM cart WHERE user_id = $userId AND bike_id = $bikeId AND frame_size = '$size'";
$resultCheckCart = mysqli_query($conn, $sqlCheckCart);

if (!$resultCheckCart || mysqli_num_rows($resultCheckCart) == 0) {
    // Sản phẩm chưa tồn tại trong giỏ hàng, thêm vào giỏ hàng
    $sqlInsert = "INSERT INTO cart (user_id, bike_id, bike_name, price, discounted_price, image_url, quantity, frame_size)
                  VALUES ($userId, $bikeId, '{$rowBike['bike_name']}', {$rowBike['price']}, {$rowBike['discounted_price']}, '{$rowBike['image_url']}', $quantity, '$size')";

    if (mysqli_query($conn, $sqlInsert)) {
        echo "Successfully added to cart!";
    } else {
        echo "Lỗi khi thêm vào giỏ hàng: " . mysqli_error($conn);
    }
} else {
    // Sản phẩm đã tồn tại trong giỏ hàng, cập nhật số lượng
 $rowCheckCart = mysqli_fetch_assoc($resultCheckCart);
    $newQuantity = $rowCheckCart['quantity'] + $quantity;
    
    $sqlUpdateCart = "UPDATE cart SET quantity = $newQuantity WHERE user_id = $userId AND bike_id = $bikeId AND frame_size = '$size'";
    
    if (mysqli_query($conn, $sqlUpdateCart)) {
        echo "Successfully added to cart!";
    } else {
        echo "Lỗi khi cập nhật giỏ hàng: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>

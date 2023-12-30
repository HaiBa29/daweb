<?php
session_start();

// Kiểm tra nếu người dùng chưa đăng nhập, chuyển hướng về trang đăng nhập
if (!isset($_SESSION['username'])) {
    $_SESSION['redirect_url'] = $_SERVER['REQUEST_URI'];

    header("Location: ../login/login.php");

    echo '<script>window.location.href = "../login/login.php";</script>';
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BikeBuzz</title>
    <link rel="stylesheet" href="cart.css">

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

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <div id="preloader"></div>

    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/vendor/aos/aos.js"></script>
    <script src="../assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="../assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="../assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="../assets/js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>
<style>
    body{
        background-color: #f4f7f7;
    }
</style>

<body>
    <header id="header" class="header fixed-top d-flex align-items-center">
        <div class="container d-flex align-items-center justify-content-between">

            <a href="index.html" class="logo d-flex align-items-center me-auto me-lg-0">
                <img src="../assets/img/logobikebuzz.png" alt="bikebuzz">
            </a>

            <?php include("../menu-pro.php"); ?>
            <a class="btn-book" href="../login/logout.php">Log out</a>
            <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
            <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

        </div>
    </header>
    <!-- -->

    <?php
    // nho sua menu bo gach ngang.
    require 'connect.php';
    ?>
    <?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    // Rest of your PHP code
    ?>

    <?php
    echo '<pre>';
    print_r($_GET);
    echo '</pre>';

    require 'connect.php';

    // Lấy bike_id từ URL
    $bikeId = isset($_GET['bike_id']) ? $_GET['bike_id'] : null;

    // Kiểm tra bike_id có giá trị hay không
    if ($bikeId) {
        // Truy vấn dữ liệu từ bảng bikes dựa trên bike_id
        $sql = "SELECT bike_name, quantity, frame, frame_size, fork, derailleur, brakes, image_url, price, discounted_price, sale, product_description, bike_id  FROM bikes WHERE bike_id = $bikeId";
        $result = mysqli_query($conn, $sql);

        // Kiểm tra và lấy thông tin sản phẩm từ cơ sở dữ liệu
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);

            $bike_name = $row['bike_name'];
            $frame = $row['frame'];
            $fork = $row['fork'];
            $frame_size = $row['frame_size'];
            $derailleur = $row['derailleur'];
            $brakes = $row['brakes'];
            $price = $row['price'];
            $discounted_price = $row['discounted_price'];
            $quantity = $row['quantity'];
            $image_url = $row['image_url'];
            $frame_sizes = explode(',', $row['frame_size']);
            $product_description = $row['product_description'];
            // ... thêm các trường thông tin khác tương tự
        } else {
            echo "Không tìm thấy sản phẩm!";
        }
    } else {
        echo "Không có thông tin bike_id!";
    }
    ?>

    <div class="container">
        <div class="row">
            <div class="col-md-18">


                <!-- Mẫu sản phẩm -->
                <div class="product-container">
                    <div class="row">
                        <div class="col-md-5 order-md-2" style="background-color:aliceblue; margin-top:-10px; margin-bottom:-10px;">
                            <div class="product-details">
                                <div class="exit-button-container">
                                    <button class="exit-button" onclick="goBack()">
                                        <!-- Bạn có thể thay đổi biểu tượng ở đây -->
                                        <span><i class='bx bx-x bx-tada' style='color:#7bff6b'></i></span>
                                    </button>
                                </div>
                                <h3><?php echo $bike_name; ?></h3>
                                <p> <?php echo $product_description; ?></p>
                                <div class="row flex-row">
                                    <div class="col-md-6">

                                        <ul>
                                            <li><b>Brakes: </b><?php echo $bike_name; ?> </li>
                                            <li><b>Frame: </b><?php echo $frame; ?></li>
                                            <li><b>Frame Size: </b><?php echo $frame_size; ?></li>
                                        </ul>
                                    </div>
                                    <div class="col-md-6">

                                        <ul>
                                            <li><b>Fork: </b><?php echo $fork; ?> </li>
                                            <li><b>Derailleur: </b><?php echo $derailleur; ?></li>
                                            <li><b>Quantity: </b><?php echo $quantity; ?></li>
                                        </ul>
                                    </div>
                                </div>
                                <p class="price-cart">
                                    <b>Giá:</b>
                                    <?php
                                    // Kiểm tra nếu có giảm giá
                                    if (floatval($row["sale"]) != 0.00) {

                                        echo '<span class="discounted-price">$' . number_format($row["discounted_price"], 2, '.', '') . '</span>';

                                        echo '<del class="price">$' . number_format($row["price"], 1, '.', ' ') . '</del>';
                                    } else {
                                        echo '<span class="discounted-price"> ' . number_format($row["price"], 1, '.', ' ') . '$</span>';
                                    }
                                    ?>
                                </p>


                                <form class="form-inline">
                                    <label for="quantity"><b>Quantity:</b></label>
                                    <input type="number" class="form-control mx-2" style="font-size: 15px; width: 60px;" id="quantity" value="1" min="1" max="<?php echo $quantity; ?>" oninput="validateQuantityInput(this)">
                                    <label for="size"><b>Size:</b></label>
                                    <select class="form-control mx-2" id="size" style="height: 30px; width: 56px; font-size: 15px; border: none;">
                                        <?php
                                        foreach ($frame_sizes as $size) {
                                            echo "<option>$size</option>";
                                        }
                                        ?>
                                    </select>


                                </form>
                                <div class="btn-group mx-2">
                                    <!-- Thêm vào phần mã HTML của bạn -->
                                    <div class="btn-group mx-2">
                                        <button class="btn btn-primary icon-btn" onclick="addToCart()">
                                            <i class='bx bxs-cart-add bx-flashing'> ADD TO CART</i>
                                        </button>
                                    </div>

                                </div>
                            </div>
                        </div>



                        <div class="col-md-7">

                            <img src="<?php echo $image_url; ?>" alt="Bike Image" class="product-image" id="mainImage">
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
    <script>
    function addToCart() {
       
    // Lấy thông tin sản phẩm
    var bikeId = <?php echo $bikeId; ?>;
    var quantity = <?php echo $quantity; ?>; // Lấy giá trị từ PHP
    var size = document.getElementById('size').value;


    // Kiểm tra nếu quantity là 0
    if (quantity === 0) {
        Swal.fire({
            icon: 'warning',
            title: 'Out of stock!',
            text: 'This product is no longer available!',
        });         
        return; // Ngừng thực hiện các bước tiếp theo
    }
     // Lấy thông tin sản phẩm
     var bikeId = <?php echo $bikeId; ?>;
        var quantity = document.getElementById('quantity').value;
        var size = document.getElementById('size').value;
        // Gửi yêu cầu đến server sử dụng Ajax
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (this.readyState == 4) {
                if (this.status == 200) {
                    // Xử lý phản hồi từ server (nếu cần)
                    Swal.fire({
                        icon: 'success',
                        title: 'Add to cart successfully!',
                        text: this.responseText,
                    });
                } else {
                    // Xử lý khi có lỗi
                    Swal.fire({
                        icon: 'error',
                        title: 'Lỗi',
                        text: 'Đã xảy ra lỗi khi thêm vào giỏ hàng.',
                    });
                }
            }
        };

        // Chuẩn bị dữ liệu để gửi
        var data = "bike_id=" + bikeId + "&quantity=" + quantity + "&size=" + size;

        // Gửi yêu cầu POST đến trang xử lý (đổi theo tên trang của bạn)
        xhr.open("POST", "addToCart.php", true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.send(data);
    }
</script>  
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <script src="bikechild.js"></script>

</body>

</html>
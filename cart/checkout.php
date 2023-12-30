<?php
session_start();

// Kiểm tra đăng nhập
if (!isset($_SESSION['user_id'])) {
  $_SESSION['redirect_url'] = $_SERVER['REQUEST_URI'];
  header("Location: ../login/login.php");
  exit();
}

error_reporting(E_ALL);
ini_set('display_errors', 1);

set_error_handler(function ($errno, $errstr, $errfile, $errline) {
  echo "Error: [$errno] $errstr<br>";
  echo "Error on line $errline in $errfile<br>";
});

require 'connect.php';

// Lấy thông tin người dùng từ session
$userId = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;

// Truy vấn thông tin giỏ hàng của người dùng
$sql = "SELECT c.*, b.frame_size FROM cart c JOIN bikes b ON c.bike_id = b.bike_id WHERE c.user_id = $userId";

$result = mysqli_query($conn, $sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BikeBuzz</title>
    <link rel="stylesheet" href="checkout.css">
    
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/5.3.45/css/materialdesignicons.css" integrity="sha256-NAxhqDvtY0l4xn+YVa6WjAcmd94NNfttjNsDmNatFVc=" crossorigin="anonymous" />
<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css'>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>
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






<div class="container">

<div class="row">
    <div class="col-xl-7">

        <div class="card">
            <div class="card-body">
                <ol class="activity-checkout mb-0 px-4 mt-3">
                    <li class="checkout-item">
                        <div class="avatar checkout-icon p-1">
                            <div class="avatar-title rounded-circle bg-primary">
                                <i class="bx bxs-receipt text-white font-size-20" style="margin-left: 10px;"></i>
                            </div>
                        </div>
                        <div class="feed-item-list">
                            <div>
                                <h5 class="font-size-16 mb-1">
                                    <?php
                // Kiểm tra xem người dùng đã đăng nhập chưa
                if (isset($_SESSION['username']) && !empty($_SESSION['username'])) {
                  $loggedInUsername = $_SESSION['username'];
                  echo "$loggedInUsername";
                } else {
                  echo "Xin chào Khách!";
                }
                ?>
                
                shopping cart
              </h5>
                                <p class="text-muted text-truncate mb-4">Complete the final steps to bring home your most loved bicycles</p>
                                <div class="mb-3">
                                    <form id="myForm" method="post" action="addcheckout.php">
                                        <div>
                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="billing-name">Name</label>
                                                        <input type="text" class="form-control" name="billing-name" id="billing-name" placeholder="Enter name">
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="billing-email-address">Email Address</label>
                                                        <input type="email" class="form-control" name="billing-email-address" id="billing-email-address" placeholder="Enter email">
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="billing-phone">Phone</label>
                                                        <input type="text" class="form-control" name="billing-phone" id="billing-phone" placeholder="Enter Phone no.">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label" for="billing-address">Address</label>
                                                <textarea class="form-control" name="billing-address" id="billing-address" rows="3" placeholder="Enter full address"></textarea>
                                            </div>
                                          
                    
                                            <div class="mb-3">
                                                <label class="form-label" for="note">Note</label>
                                                <textarea class="form-control" name="note" id="note" rows="1" placeholder="Please leave us a note."></textarea>
                                            </div>
                                          
                                            
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </li>
                    
                    <li class="checkout-item">
                        
                        <div class="feed-item-list">
                            
                            <div>
                                <h5 class="font-size-14 mb-3">Payment method :</h5>
                                <div class="row" >
                              
                                <div class="col-lg-4 col-sm-3">
    <div data-bs-toggle="collapse">
        <label class="card-radio-label" style="height: 50px;">
            <input type="radio" name="pay-method" id="pay-methodoption1" class="card-radio-input">
            <span class="card-radio py-3 text-center text-truncate">
                <i class="bx bx-credit-card d-block h2 mb-3"></i>
                Credit / Debit Card
            </span>
            <input type="hidden" name="payment-method1" id="payment-method1" value="">
        </label>
    </div>
</div>

<div class="col-lg-4 col-sm-3">
    <div>
        <label class="card-radio-label">
            <input type="radio" name="pay-method" id="pay-methodoption2" class="card-radio-input" checked="">
            <span class="card-radio py-3 text-center text-truncate">
                <i class="bx bx-money d-block h2 mb-3"></i>
                <span>Cash on Delivery</span>
            </span>
            <input type="hidden" name="payment-method2" id="payment-method2" value="">
        </label>
    </div>
</div>



                                </div>
                            </div>
                        </div>
                    </li>
                </ol>
            </div>
        </div>

        <div class="row my-4">
            <div class="col">
                <a href="giohang.php" class="btn btn-link text-muted">
                    <i class="mdi mdi-arrow-left me-1"></i> Continue Shopping </a>
            </div> <!-- end col -->
            <div class="col">
                <div class="text-end mt-2 mt-sm-0">
                <form id="orderForm" method="post" action="addcheckout.php">
    <button type="submit" class="btn btn-success"  onclick="submitForm()">
        <i class="mdi mdi-cart-outline me-1"></i> Proceed
    </button>
</form>
                    </div>
            </div> <!-- end col -->
        </div> <!-- end row-->
    </div>
    
    <div class="col-xl-5">
        <div class="card checkout-order-summary">
            <div class="card-body">
                <div class="p-3 bg-light mb-3">
                    <h5 class="font-size-16 mb-0">Order Summary <span class="float-end ms-2">Total quantity: <?php
                      $totalQuantity = $_SESSION['totalQuantity'];
                      echo $totalQuantity;
                    ?></span></h5>
                </div>
                <div class="table-responsive">
                    <table class="table table-centered mb-0 table-nowrap">
                        <thead>
                            <tr>
                                <th class="border-top-0" style="width: 110px;" scope="col">Product</th>
                                <th class="border-top-0" scope="col">Product Desc</th>
                                <th class="border-top-0" scope="col">Price</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php

// Kiểm tra xem người dùng đã đăng nhập hay chưa
if(isset($_SESSION['user_id'])) {
    // Người dùng đã đăng nhập, bạn có thể thực hiện truy vấn từ bảng cart
    $userId = $_SESSION['user_id'];

    // Kết nối đến cơ sở dữ liệu (điều này cần được điều chỉnh dựa trên cấu hình cụ thể của bạn)
   require 'connect.php';
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Kiểm tra kết nối
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Truy vấn thông tin từ bảng cart cho người dùng hiện tại
    $query = "SELECT * FROM cart WHERE user_id = $userId";
    $result = $conn->query($query);

    // Kiểm tra xem có dữ liệu hay không
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            // Lấy thông tin từ $row và sử dụng nó trong HTML của bạn
            $productName = $row['bike_name'];
            $quantity = $row['quantity'];
            $size = $row['frame_size'];
            $price = $row['total_discount'];
             $row =$row['image_url'];
            // Đưa thông tin vào HTML của bạn
            echo '<tr>
                    <th scope="row"><img src="' . $row . '" alt="product-img" title="product-img" class="avatar-lg rounded"></th>
                    <td>
                        <h8 class="font-size-16 text-truncate"><a href="#" class="text-dark">' . $productName . '</a></h8>
                        <p class="text-muted mb-0">
                        Quantity: ' . $quantity . '
                        </p>
                        <p class="text-muted mb-0 mt-1">Size: ' . $size . '</p>
                    </td>
                    <td>$' . $price . '</td>
                  </tr>';
        }
    } else {
        echo "Không có sản phẩm trong giỏ hàng của bạn.";
    }

    // Đóng kết nối đến cơ sở dữ liệu
    $conn->close();
} else {
    // Người dùng chưa đăng nhập, bạn có thể thực hiện các hành động khác tùy thuộc vào yêu cầu của bạn
    echo "Vui lòng đăng nhập để xem giỏ hàng của bạn.";
}
?>

                            <tr>
                                <td colspan="2">
                                    <h5 class="font-size-14 m-0">Sub Total :</h5>
                                </td>
                                <td>
                                    $ <?php 
                                   $totalPrice = $_SESSION['totalPrice'];
                                    echo $totalPrice ;
                                    ?>
                                    
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <h5 class="font-size-14 m-0">Discount :</h5>
                                </td>
                                <td >
                                    -$ <?php
                                  $discount = $_SESSION['discount'];
                                  echo $discount;
                                  ?>
                                </td>
                            </tr>

                            <tr>
                                <td colspan="2">
                                    <h5 class="font-size-14 m-0">Shipping Charge :</h5>
                                </td>
                                <td>
                                    +$ <?php
                                 $shippingCharge = $_SESSION['shippingCharge'];
                                 echo $shippingCharge;
                                 ?>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <h5 class="font-size-14 m-0">Tax :</h5>
                                </td>
                                <td>
                                   +$ <?php
                                    $vat = $_SESSION['vat'];
                                    echo $vat;
                                    ?>
                                </td>
                            </tr>                              
                                
                            <tr class="bg-light">
                                <td colspan="2">
                                    <h5 class="font-size-14 m-0">Total:</h5>
                                    
                                </td>
                                <td>
                                    +$ <?php
                                 $finalTotal = $_SESSION['finalTotal'];
                                 echo $finalTotal;
                                 ?>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end row -->

</div>


<script src="checkout.js"></script>
<script src='https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js'></script>
</body>
</html>
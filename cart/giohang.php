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
  <link rel="stylesheet" href="giohang.css">
  <link rel="stylesheet" href="vocher.css">
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
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

</head>

<body>

  <header id="header" class="header fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">
      <a href="../index.html" class="logo d-flex align-items-center me-auto me-lg-0">
        <img src="../assets/img/logobikebuzz.png" alt="bikebuzz">
      </a>
      <?php include("../menu-pro.php"); ?>
      <a class="btn-book" href="../login/logout.php">Log out</a>
      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>
    </div>
  </header>

  <!-- cart + summary -->
  <section class="bg-light my-5">
    <div class="container">
      <div class="row">
        <!-- cart -->
        <div class="col-lg-9">
          <div class="card border shadow-0">
            <div class="m-4">
              <h4 class="card-title mb-4" style="text-transform:capitalize;">
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
              </h4>


             
            <?php


// Kết nối đến cơ sở dữ liệu
require 'connect.php';

// Lấy thông tin người dùng từ session
$userId = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;

// Kiểm tra xem người dùng đã đăng nhập chưa
if (!$userId) {
    echo "Bạn chưa đăng nhập. Hãy đăng nhập để xem giỏ hàng.";
    exit;
}

// Truy vấn thông tin giỏ hàng của người dùng
$sql = "SELECT * FROM cart WHERE user_id = $userId";
$result = mysqli_query($conn, $sql);

if (!$result || mysqli_num_rows($result) == 0) {
    echo "Your shopping cart is empty!";
} else {
    // Hiển thị thông tin giỏ hàng
    while ($row = mysqli_fetch_assoc($result)) {
      // Truy vấn để lấy các lựa chọn frame_size từ bảng bikes
$sqlFrameSize = "SELECT frame_size FROM bikes WHERE bike_id = " . $row['bike_id'];
$resultFrameSize = mysqli_query($conn, $sqlFrameSize);

    
// Kiểm tra kết quả truy vấn
if ($resultFrameSize && mysqli_num_rows($resultFrameSize) > 0) {
  // Lấy giá trị frame_size từ cơ sở dữ liệu
  $dbFrameSize = mysqli_fetch_assoc($resultFrameSize)['frame_size'];

  // Chuyển chuỗi thành mảng các lựa chọn
  $frameSizes = explode(',', $dbFrameSize);

  // Hiển thị form select với các lựa chọn frame_size
            
         } else {
             echo "Không tìm thấy thông tin về kích thước khung xe.";
             exit;
         }
        ?>
                  <div class="row gy-3 mb-4">
                    <div class="col-lg-5">
                      <div class="me-lg-5" style="margin-right: -8px!important;">
                        <div class="d-flex">
                          <img src="<?php echo $row['image_url']; ?>" class="border rounded me-3" style="width: 150px; height: 90px;" />
                          <div class="">
                            <a href="#" class="nav-link" style="padding: 0rem; font-size: 13px;"><b><?php echo $row['bike_name']; ?></b></a>
                            <div class="d-flex align-items-center">
                              <label for="size" class="mb-0"><b style="font-size: 13px; font-weight: 550;">Size:</b></label>
                            
                                   
                             <!-- sua size--> 
                             <form method="post" action="update_frame_size.php">
                                  <input type="hidden" name="cart_id" value="<?php echo $row['cart_id']; ?>">
                                  <select name="new_frame_size" style="width: 70px; height:35px; font-size: 1opx;" class="form-select me-4" onchange="this.form.submit()">
                                      <?php
                                      foreach ($frameSizes as $size) {
                                          echo "<option value=\"$size\" " . ($size == $row['frame_size'] ? 'selected' : '') . ">$size</option>";
                                      }
                                      ?>
                                  </select>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-2 col-sm-6 col-6 d-flex flex-row flex-lg-column flex-xl-row text-nowrap">
                      <div class="">
                        <form method="post" action="update_quantity.php">
                          <select style="width: 70px;" class="form-select me-4" name="new_quantity" onchange="this.form.submit()">
                            <?php
                            $bikeId = $row['bike_id'];
                            $sqlQuantity = "SELECT quantity FROM bikes WHERE bike_id = $bikeId";
                            $resultQuantity = mysqli_query($conn, $sqlQuantity);

                            if ($resultQuantity && mysqli_num_rows($resultQuantity) > 0) {
                              $dbQuantity = mysqli_fetch_assoc($resultQuantity)['quantity'];
                              for ($i = 1; $i <= $dbQuantity; $i++) {
                                echo "<option value=\"$i\" " . ($i == $row['quantity'] ? 'selected' : '') . ">$i</option>";
                              }
                            } else {
                              echo "<option value=\"1\">1</option>";
                            }
                            ?>
                          </select>
                          <input type="hidden" name="cart_id" value="<?php echo $row['cart_id']; ?>">
                        </form>

                      </div>
                      <div class="">
                        <text class="h6">$<?php echo number_format($row['total_discount'], 2); ?></text> <br />
                        <small class="text-muted text-nowrap" style="text-decoration: line-through;"> $<?php echo number_format($row['price'], 2); ?> / Bike </small>
                      </div>
                    </div>
                    <div class="col-lg col-sm-6 d-flex justify-content-sm-center justify-content-md-start justify-content-lg-center justify-content-xl-end mb-2">
                      <div class="float-md-end">
                        <a href="#!" class="btn btn-light border px-2 icon-hover-primary"><i class='bx bx-heart'></i></a>
                        <a href="#" class="btn btn-light border text-danger icon-hover-danger" onclick="removeFromCart(<?php echo $row['cart_id']; ?>)"> Remove</a>
                      </div>
                    </div>
                  </div>
              <?php
                }
              }
              mysqli_close($conn);
              ?>
            </div>
            <div class="border-top pt-4 mx-4 mb-4">
              <p><i class="fas fa-truck text-muted fa-lg"></i> Enjoy our special offers!</p>

              <!-- ----------------- vocher ---------------- -->
              <?php
              require 'connect.php';

              // Truy vấn thông tin giảm giá từ cơ sở dữ liệu
              $sqlDiscountCodes = "SELECT * FROM discount_codes WHERE expiration_datetime >= NOW()";
              $resultDiscountCodes = mysqli_query($conn, $sqlDiscountCodes);

              // Kiểm tra và hiển thị mã giảm giá nếu có
              if ($resultDiscountCodes && mysqli_num_rows($resultDiscountCodes) > 0) {
                while ($discountCode = mysqli_fetch_assoc($resultDiscountCodes)) {
                  // Kiểm tra xem mã giảm giá còn hạn sử dụng hay không
                  $expirationDateTime = strtotime($discountCode['expiration_datetime']);
                  $currentDateTime = strtotime(date('Y-m-d H:i:s'));

                  if ($expirationDateTime >= $currentDateTime) {
                    // Lấy thông tin chi tiết của mã giảm giá
                    $discountPercentage = $discountCode['percentage'];
                
                    $discountPercentage1 = $discountCode['percentage']*100;
                    $expirationDateTimeFormatted = date("d F Y H:i:s", $expirationDateTime);
                    $discountCodeValue = $discountCode['code'];
              ?>
                    <div class="container">
                      <div class="vocher">
                        <div class="main">
                          <div class="co-img">
                            <img src="../assets/img/logobikebuzz.png" alt="" />
                          </div>
                          <div class="vertical"></div>
                          <div class="content">
                            <h2>BIKEBUZZ</h2>
                            <h1><?php echo "$discountPercentage1%"; ?> <span>Coupon</span></h1>
                            <p>Valid till <?php echo $expirationDateTimeFormatted; ?></p>
                          </div>
                        </div>
                        <div class="copy-button">
                          <input id="copyvalue" type="text" readonly value="<?php echo $discountCodeValue; ?>" />
                          <form id="couponForm" action="process_discount.php" method="post">
                          <input type="hidden" id="discountCodeValueInput" name="discountCodeValue" />
                          <button type="hidden" id="discountPercentageInput" name="discountPercentage" method="post"  onclick="applyVoucher()">Using</button>
                          </form>
                        </div>
                      </div>
                    </div>
              <?php
                  }
                }

                // Giải phóng bộ nhớ của kết quả truy vấn
                mysqli_free_result($resultDiscountCodes);
              } else {
                echo "No valid discount codes available.";
              }

              ?>


            </div>
          </div>
        </div>
     

      <!-- summary -->
      <div class="col-lg-3">
        <div class="card mb-3 border shadow-0">
          <div class="card-body">
            <form id="couponForm">
              <div class="form-group">
                <label class="form-label">Have coupon?</label>
                <div class="input-group">
                <?php
              //  $discountPercentageFromSession = isset($_SESSION['discountPercentage']) ? (float)$_SESSION['discountPercentage'] : 0;

              $discountCodeValueInput = isset($_SESSION['discountCodeValue']) ? $_SESSION['discountCodeValue'] : null;
              $placeholderValue = isset($discountCodeValueInput) ? $discountCodeValueInput : 'Coupon code';
                  ?>

<input id="couponCodeInput" type="text" class="form-control border" name="couponCode" placeholder="<?php echo htmlspecialchars($placeholderValue, ENT_QUOTES, 'UTF-8'); ?>" />

                  <button type="button" onclick="applyCouponCode()" class="btn btn-light border">Remove</button>
                </div>
              </div>
            </form>

          </div>
        </div>
        <div class="card shadow-0 border">
          <div class="card-body">
            <?php
            // Lấy giá trị discountPercentage từ session nếu có
            $discountPercentageFromSession = isset($_SESSION['discountPercentage']) ? $_SESSION['discountPercentage'] : 0;

            // Thực hiện truy vấn cơ sở dữ liệu để lấy số lượng và giá từ giỏ hàng
            $sqlCartItems = "SELECT quantity, discounted_price FROM cart WHERE user_id = $userId";
            $resultCartItems = mysqli_query($conn, $sqlCartItems);

            if ($resultCartItems && mysqli_num_rows($resultCartItems) > 0) {
              $totalPrice = 0; // Tổng giá trị của giỏ hàng
              $totalQuantity = 0; // Tổng số lượng sản phẩm

              while ($cartItem = mysqli_fetch_assoc($resultCartItems)) {
                $quantity = $cartItem['quantity'];
                $price = $cartItem['discounted_price'];

                $totalQuantity += $quantity;
                $totalPrice += $quantity * $price;
                $_SESSION['totalPrice'] = $totalPrice;
                $_SESSION['totalQuantity'] = $totalQuantity;
              }
              // Assuming $discountPercentageFromSession is a string
$discountPercentageFromSession = (float) $discountPercentageFromSession;

// Now you can perform the multiplication
$discount = $totalPrice * $discountPercentageFromSession;

              $discount = $totalPrice * $discountPercentageFromSession; // Sử dụng giá trị từ session
              // Tính giảm giá, VAT và tổng giá cuối cùng
              $vatRate = 0.05; // Tỷ lệ VAT (ví dụ: 10%)
              $vat = $totalPrice * $vatRate;
              $shippingCharge = 15; // Phí vận chuyển cố định
              $finalTotal = $totalPrice - $discount + $vat + $shippingCharge;
              $_SESSION['finalTotal'] = $finalTotal;
              $_SESSION['shippingCharge']= $shippingCharge;
              $_SESSION['discount'] = $discount;
              $_SESSION['vat'] = $vat;
            } else {
              // Xử lý khi không có thông tin giỏ hàng hoặc lỗi truy vấn
              $totalQuantity = 0;
              $totalPrice = 0;
              $finalTotal = 0;
              $discount =0;
              $vat=0;
              $shippingCharge=0;
            }
         
            ?>

            <!-- Hiển thị thông tin giỏ hàng -->
            <div class="d-flex justify-content-between">
              <p class="mb-2">Total quantity:</p>
              <p id="total-quantity" class="mb-2"><?php echo $totalQuantity; ?></p>
            </div>

            <div class="d-flex justify-content-between">
              <p class="mb-2">Total price:</p>
              <p id="total-price" class="mb-2">$<?php echo number_format($totalPrice, 2); ?></p>
            </div>

            <!-- Hiển thị Số Tiền Giảm Giá -->
            <div class="d-flex justify-content-between">
              <p class="mb-2">Discount:</p>
              <p id="discount" class="mb-2 text-success">-$<?php echo  $discount; ?></p>
            </div>

            <div class="d-flex justify-content-between">
              <p class="mb-2">VAT:</p>
              <p id="vat" class="mb-2">+$<?php echo number_format($vat, 2); ?></p>
            </div>

            <div class="d-flex justify-content-between">
              <p class="mb-2">Shipping Charge:</p>
              <p id="shipping-charge" class="mb-2">+$<?php echo number_format($shippingCharge, 2); ?></p>
            </div>

            <hr />

            <div class="d-flex justify-content-between">
              <p class="mb-2">Total price:</p>
              <p id="final-total" class="mb-2 fw-bold">$<?php echo number_format($finalTotal, 2); ?></p>
            </div>
            <div class="mt-3">
              <a href="checkout.php" class="btn btn-success w-100 shadow-0 mb-2"> Make Purchase </a>
              <a href="allbike.php" class="btn btn-light w-100 border mt-2"> Back to shop </a>
            </div>
          </div>
        </div>
      </div>
      <!-- summary -->
    </div>
    </div>
  </section>

  <script>
  
    function applyVoucher() {
        // Lấy giá trị discountPercentage từ PHP và gán vào biến JavaScript
        var discountPercentage = <?php echo json_encode($discountPercentage); ?>;
        // Lấy giá trị discountPercentage từ PHP và gán vào biến JavaScript
        var discountCodeValue = <?php echo json_encode($discountCodeValue); ?>;
    
    // Gán giá trị discountPercentage vào hidden input
    document.getElementById("discountPercentageInput").value = discountPercentage;
    document.getElementById("discountCodeValueInput").value = discountCodeValue;
    // Submit form
    document.getElementById("couponForm").submit();
  

    }
    function applyCouponCode() {
  // ... (phần logic áp dụng mã giảm giá)

  // Xóa giá trị discountPercentage từ session
  clearDiscountPercentage();
}
function clearDiscountPercentage() {
  console.log('Clearing discountPercentage from session');
  // Gửi yêu cầu cập nhật session bằng PHP (chẳng hạn qua URL hoặc form submit)
  window.location.href = 'clear_discount_session.php'; // Thay đổi đường dẫn nếu cần
}


  </script>

  <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
  <script src="giohang.js"></script>
  <!-- thu vien ma giam gia-->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
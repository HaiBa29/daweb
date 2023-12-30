
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
    <link rel="stylesheet" href="cart.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
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

    <?php
    // nho sua menu bo gach ngang.
require 'connect.php';
?>


<div class="container-fluid mt-3  " style="padding-left: 0; padding-right: 0; margin-left: 0px; margin-right: 0px;">
  
        <div class="container-fluid px-0">
      
          <div class="row mx-0" style="margin-top: 80px;">
      
            <div class="content  col-xl-5 text-black" >
              <h1 >MOUNTAINBIKES</h1>
              <p > 
              Mountain bikes for kids are not just a means of transportation; they are a gateway to exploration and adventure. With a lightweight frame and flexible design, 
              these bikes become reliable companions for suburban escapades. Whether conquering hills or navigating small trails, the mountain bike stimulates a sense of curiosity and muscle
               development. Beyond creating a healthy and athletic environment, it teaches children about patience, determination, and the confidence to overcome challenges. With a mountain bike for kids, 
               the journey up the hill becomes a memorable and meaningful adventure.   
            
            </p>
             
            </div>
            <div class=" img  col-xl-7 fluid " >
              <img src="https://d2lljesbicak00.cloudfront.net/merida-v2/crud-content-img//db-global/2024/tags-taggroups/24-merida-roadbikes-scultura.jpg?p3" alt="">
            </div>
         
          </div>
        </div>
      </div>


      <div class="swiper mySwiper" style="margin-top: 50px;">
      <div data-aos="fade-up" data-aos-duration="3000">
          <div class="hot">
              <h2><i class='bx bxs-hot bx-fade-down bx-rotate-180'></i>CHILDREN'S BICYCLES<i
                      class='bx bxs-hot bx-fade-down bx-rotate-180'></i></h2>
          </div>
      </div>
    

      
    
   

<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
// Rest of your code
?>
<?php
set_error_handler(function($errno, $errstr, $errfile, $errline) {
    echo "Error: [$errno] $errstr<br>";
    echo "Error on line $errline in $errfile<br>";
});
// Rest of your code
?>

  <div class="layout-bike">   
  <div class="container-fluid">
    <div class="row d-flex flex-wrap">
      <?php
     
      // Truy vấn dữ liệu từ bảng bikes
      $sql = "SELECT bike_name, frame, frame_size, fork, derailleur, brakes,image_url, price,discounted_price, sale, bike_id  FROM bikes";
    
    // Lọc theo loại xe "sportbike" mặc định
    $sql .= " WHERE vehicle_type = 'mountainbike'";
    
      $result = $conn->query($sql);

      // Kiểm tra và hiển thị dữ liệu
      if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
              echo '<div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-3  ">'; // Thêm class mb-4 để tạo khoảng cách giữa các card-bike
              echo '  <div class="card-bike">';
              echo '    <div class="img-bike">';
              echo '      <div class="content-bike">';
              echo '        <ul>';
              echo '          <li><b>Model:</b> ' . $row["bike_name"] . '</li>';
              echo '          <li><b>Frame:</b> ' . $row["frame"] . '</li>';
              echo '          <li><b>Frame Size:</b> ' . $row["frame_size"] . '</li>';
              echo '          <li><b>Fork:</b> ' . $row["fork"] . '</li>';
              echo '          <li><b>Derailleur:</b> ' . $row["derailleur"] . '</li>';
              echo '          <li><b>Brakes:</b> ' . $row["brakes"] . '</li>';
              echo '        </ul>';
              echo '      </div>';
              echo '      <div class="img-hover">';
              echo ' <img src="' . $row["image_url"] . '" alt="">'; // Thay đổi dòng này để sử dụng giá trị từ trường 'image_url'';
              echo '      </div>';
              echo '    </div>';
              echo '    <div class="header-bike">';
              echo '      <div class="color-bike">';
              echo '        <h4>Price:</h4>';
              echo '<div class="circle">';
              // nếu sale=0.00 sẽ ẩn giá gốc đi
              if (floatval($row["sale"]) != 0.00) {
                  echo '    <div class="price-wrapper">';
                  echo '        <span class="sale-icon-wrapper">';
                  echo '            <span class="sale-icon"> ' . intval($row["sale"]) . '%</span>';
                  echo '        </span>';
                  echo '        <span class="price">$' . number_format($row["price"], 2) . '</span>';
                  echo '    </div>';
              }
              echo '    <span class="discounted-price" >$' . number_format($row["discounted_price"], 2, '.', '') . '</span>';
              echo '</div>';
              echo '</div>';
              
  
              echo '      <div class="text-bike addToCartButton" data-bike-id="' . $row["bike_id"] . '">';
              echo '        <h3>' . $row["bike_name"] . '</h3>';
              echo '      </div>';
              echo '    </div>';
              echo '    <div class="button-bike">';
              echo '<div class="love addToCartButton" data-bike-id="' . $row["bike_id"] . '">';

              echo '        <i class="bx bxs-cart" style="color:#07d00b; font-size: 26px; margin-bottom: 20px;"></i>';
              echo '        <p class="watchlist-text">ADD TO CART</p>';
              echo '      </div>';
              echo '      <div class="chon">';
              echo '        <i class="bx bx-heart" style="color:#18dd50; font-size: 21px; margin-bottom: 3px;"></i>';
              echo '        <p class="select-text">LIKE</p>';

              echo '      </div>';
              echo '    </div>';
              echo '  </div>';
              echo '</div>';
          }
      } else {
          echo "Không có dữ liệu";
      }

      // Đóng kết nối
      $conn->close();
      ?>
    </div>
  </div>
</div>

    <script src="bike.js"></script>
   
 
  
<!-- Sử dụng Bootstrap JavaScript và Popper.js (nếu cần) -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>


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


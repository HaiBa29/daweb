
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
    <link rel="stylesheet" href="bike.js">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Thêm Bootstrap CSS từ CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

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

    <?php
require 'connect.php';
?>

<div class="container-fluid mt-3  " style="padding-left: 0; padding-right: 0; margin-left: 0px; margin-right: 0px;">
  
        <div class="container-fluid px-0">
      
          <div class="row mx-0" style="margin-top: 80px;">
      
            <div class="content  col-xl-5 text-black" >
              <h1 >BICYCLE RACING</h1>
              <p > 
              Bicycle racing, a thrilling pursuit where speed becomes both the means and the end. Cyclists, clad in sleek gear, navigate chal
              lenging terrains with an unwavering determination to outpace the wind. Each race is a symphony of precision, strength, and strategy as riders pedal 
              in synchrony, chasing victory with every turn of the wheel. The rush of wind, the rhythmic hum of tires on pavement, and the pulsating energy of the pel
              oton create an exhilarating experience for both participants and spectators alike. In the world of bicycle racing, it's not just about reaching the finish line—it
              's about embracing the journey, conquering the course, and pushing the boundaries of both speed and endurance.    
            </p>

              <form id="searchForm" class="form-inline d-flex justify-content-center md-form form-sm active-cyan active-cyan-2 mt-2" method="GET">
                  <div id="searchContainer" style="display: flex; align-items: center;">
                      <i id="searchIcon" class='bx bx-search' style='color:#4dd0e1; font-size: 20px; cursor: pointer;' tabindex="0"></i>
                      <input id="searchInput" name="search" class="form-control form-control-sm ml-3 w-75" type="text" placeholder="Tìm kiếm" aria-label="Tìm kiếm">
                  </div>
              </form>



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
              <h2><i class='bx bxs-hot bx-fade-down bx-rotate-180'></i>Speed Unleashed, Dreams Chased – Bicycle Racing Bliss!<i
                      class='bx bxs-hot bx-fade-down bx-rotate-180'></i></h2>
          </div>
      </div>
    
<!-- Thông báo không tìm thấy -->
<div id="error-message" class="alert alert-danger" style="display: none;">
    Không tìm thấy kết quả phù hợp.
</div>
      

   
<div class="layout-bike">   
  <div class="container-fluid">
    <div class="row d-flex flex-wrap">
      <?php
     
      $conn = new mysqli($servername, $username, $password, $dbname);

      // Kiểm tra kết nối
      if ($conn->connect_error) {
          die("Kết nối không thành công: " . $conn->connect_error);
      }

      // Truy vấn dữ liệu từ bảng bikes
      $sql = "SELECT bike_name, frame, frame_size, fork, derailleur, brakes,image_url, price,discounted_price, sale, bike_id  FROM bikes";
    
    // Lọc theo loại xe "sportbike" mặc định
    $sql .= " WHERE vehicle_type = 'Bicycle racing'";
    // Khởi tạo biến để theo dõi có kết quả tìm kiếm hay không

// Kiểm tra x em biểu mẫu tìm kiếm có được gửi không
if (isset($_GET['search'])) {
  $searchTerm = $_GET['search'];

  // Thêm điều kiện tìm kiếm vào câu truy vấn SQL
  $sql .= " AND bike_name LIKE '%$searchTerm%'";
}

      $result = $conn->query($sql);

      // Kiểm tra và hiển thị dữ liệu
      if ($result->num_rows > 0) {
      
          while ($row = $result->fetch_assoc()) {
              echo '<div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-3  searchable-bike ">'; // Thêm class mb-4 để tạo khoảng cách giữa các card-bike
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
              echo '    <span class="discounted-price" >$' . number_format($row["discounted_price"], 2, '.',' ') . '</span>';
              echo '</div>';
              echo '</div>';
              
  
              echo '      <div class="text-bike addToCartButton" data-bike-id="' . $row["bike_id"] . '">' ;
              echo '        <h3>' . $row["bike_name"] . '</h3>';
              echo '      </div>';
              echo '    </div>';
              echo '    <div class="button-bike">';
              echo '<div class="love addToCartButton" data-bike-id="' . $row["bike_id"] . '">';
              echo '        <i class="bx bxs-cart" style="color:#07d00b; font-size: 26px; margin-bottom: 20px;" ></i>';
              echo '        <p class="watchlist-text" >ADD TO CART</p>';
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
     // Hiển thị thông báo nếu không có kết quả tìm kiếm

      ?>





    </div>
  </div>
</div>









    <script src="bike.js"></script>
   

    <!-- Sử dụng Bootstrap JavaScript và Popper.js (nếu cần) -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <!-- Thêm Bootstrap JS và Popper.js từ CDN (Nếu bạn sử dụng các thành phần yêu cầu JS) -->
  
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
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
    <script src="../assets/js/main.js"></script>
</body>

</html>


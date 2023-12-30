<?php
session_start();

// Check if the user is logged in
$loggedIn = isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>BikeBuzz</title>
  <meta content name="description">
  <meta content name="keywords">

  <link href="assets/img/logobike.png" rel="icon">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Amatic+SC:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Inter:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>


  <link href="assets/css/main.css" rel="stylesheet">

</head>

<body>

  <header id="header" class="header fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

      <a href="index.php" class="logo d-flex align-items-center me-auto me-lg-0">
        <img src="assets/img/logobikebuzz.png" alt="bikebuzz">
      </a>

      <nav id="navbar" class="navbar">
        <?php require "menu.php"; ?>
      </nav>

      <?php
      // Nếu đã đăng nhập, hiển thị nút "Log out"
      if ($loggedIn) {
        echo '<a class="btn-book" href="login/logout.php">Log out</a>';
      } else {
        echo '<a class="btn-book" href="login/login.php">Log in</a>';
      }
      ?>
      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>
    </div>
  </header>

  <section id="hero" class="hero d-flex align-items-center section-bg">
    <div class="container">
      <div class="row justify-content-between gy-5">
        <div class="col-lg-5 order-2 order-lg-1 d-flex flex-column justify-content-center align-items-center align-items-lg-start text-center text-lg-start">
          <h2 data-aos="fade-up">LAMBORGHINI CERVELO P5X<br>Lamborghini x
            Cervelo</h2>
          <p data-aos="fade-up" data-aos-delay="100">Lamborghini has teamed up
            with Cervelo and launched the new and groundbreaking P5X model.
            Only 25 exclusive P5X models will be produced and available on the
            market. Minimalist, convenient and compact – this model is priced
            at 20,000 USD.</p>
          <div class="d-flex" data-aos="fade-up" data-aos-delay="200">
            <a href="detail/in-page1.php" class="btn-book">Read more</a>
            <a href="https://www.youtube.com/watch?v=XSJKhrZE2vA" class="glightbox btn-watch-video d-flex align-items-center"><i class="bi bi-play-circle"></i><span>Watch Video</span></a>
          </div>
        </div>
        <div class="col-lg-5 order-1 order-lg-2 text-center text-lg-start">
          <img src="assets/img/bikehot1.png" class="img-fluid" alt data-aos="zoom-out" data-aos-delay="300">
        </div>
      </div>
    </div>
  </section>

  <main id="main">

    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="section-header" id="About">
          <h2>About Us</h2>
          <p>Learn more about <span>BikeBuzz</span></p>
        </div>

        <div class="row gy-4">
          <div class="col-lg-7 position-relative about-img" style="background-image: url(assets/img/shop.png) ;" data-aos="fade-up" data-aos-delay="150">
            <div class="call-us position-absolute">
              <h4>Contact for consultation</h4>
              <p>+84 1234 567 89</p>
            </div>
          </div>
          <div class="col-lg-5 d-flex align-items-end" data-aos="fade-up" data-aos-delay="300">
            <div class="content ps-0 ps-lg-5">
              <p class="fst-italic">
                BikeBuzz is more than just a bike company, it's an adventure,
                a spirit of challenge and an opportunity for you to explore
                the world using the power of wheels.
              </p>
              <ul>
                <li><i class="bi bi-check2-all"></i> Outstanding quality.</li>
                <li><i class="bi bi-check2-all"></i> Environmental protection.</li>
                <li><i class="bi bi-check2-all"></i> Passionate Community.</li>
              </ul>
              <p>
                BikeBuzz not only introduces a means of transportation, but
                also a way for you to explore life in a new way. It's your
                chance to connect with the community, enjoy sports and
                relaxation, and create memorable memories with family and
                friends. This is an adventure you cannot miss.
              </p>

              <div class="position-relative mt-4">
                <img src="assets/img/videobike.jpg" class="img-fluid" alt>
                <a href="https://www.youtube.com/watch?v=5PDju5753tA" class="glightbox play-btn"></a>
              </div>
            </div>
          </div>
        </div>

      </div>
    </section>

    <section id="why-us" class="why-us section-bg">
      <div class="container" data-aos="fade-up">

        <div class="row gy-4">

          <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
            <div class="why-box">
              <h3>Why Choose BikeBuzz?</h3>
              <p>
                We offer not just bicycles, but a lifestyle that embodies
                freedom, sustainability, and the thrill of exploration. Join
                us on the path to a more fulfilling and active life with
                BikeBuzz.
              </p>
              <div class="text-center">
                <a href="#contact" class="more-btn">View Contact Information
                  <i class="bx bx-chevron-right"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-8 d-flex align-items-center">
            <div class="row gy-4">

              <div class="col-xl-4" data-aos="fade-up" data-aos-delay="200">
                <div class="icon-box d-flex flex-column justify-content-center align-items-center">
                  <i class="bi bi-clipboard-data"></i>
                  <h4>Quality and Craftsmanship</h4>
                  <p>Our bicycles are meticulously designed and manufactured
                    by industry experts, ensuring you receive a product that
                    meets the highest standards of excellence.</p>
                </div>
              </div>

              <div class="col-xl-4" data-aos="fade-up" data-aos-delay="300">
                <div class="icon-box d-flex flex-column justify-content-center align-items-center">
                  <i class="bi bi-gem"></i>
                  <h4>Customer-Centric Service</h4>
                  <p>Our team is always ready to assist you
                    in selecting the perfect bike, offering maintenance tips,
                    and providing repairs when needed.</p>
                </div>
              </div>

              <div class="col-xl-4" data-aos="fade-up" data-aos-delay="400">
                <div class="icon-box d-flex flex-column justify-content-center align-items-center">
                  <i class="bi bi-inboxes"></i>
                  <h4>Community</h4>
                  <p>We value the importance of participation, sharing, and
                    connecting with fellow cycling enthusiasts worldwide.
                    Joining BikeBuzz means becoming part of a community that
                    shares your love for cycling.</p>
                </div>
              </div>

            </div>
          </div>

        </div>

      </div>
    </section>

    <section class="feature">
      <div class="container" id="feature" data-aos="fade-up">

        <div class="section-header">
          <h2>Bicycle Models</h2>
          <p>Check Our <span>BikeBuzz Bike Models</span></p>
        </div>

        <ul class="nav nav-tabs d-flex justify-content-center" data-aos="fade-up" data-aos-delay="200">

          <li class="nav-item">
            <a class="nav-link active show" data-bs-toggle="tab" data-bs-target="#sport-bicycle">
              <h4>Sport bicycle</h4>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="tab" data-bs-target="#bicycle-racing">
              <h4>Bicycle racing</h4>
            </a>

          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="tab" data-bs-target="#children-bicycles">
              <h4>Children's Bicycles</h4>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="tab" data-bs-target="#folding-bicycles">
              <h4>Folding bicycles</h4>
            </a>
          </li>

        </ul>

        <div class="tab-content" data-aos="fade-up" data-aos-delay="300">

          <div class="tab-pane fade active show" id="sport-bicycle">

            <div class="tab-header text-center" id="menu">
              <p>List</p>
              <h3>Sport Bicycle</h3>
            </div>

            <div class="row gy-5">

              <div class="row gy-5">
                <?php
                require 'admin/products/connect.php';

                if ($conn->connect_error) {
                  die("Kết nối cơ sở dữ liệu thất bại: " . $conn->connect_error);
                }

                $sql = "SELECT * FROM bikes WHERE vehicle_type = 'Sport bicycle' AND price > 1000";
                $result = $conn->query($sql);
                ?>

                <?php
                if ($result->num_rows > 0) {
                  while ($row = $result->fetch_assoc()) {
                    echo '<div class="col-md-3 mb-3">';
                    echo '<div class="card">';
                    echo '<span class="sale">' . $row['sale'] . '%</span>';
                    echo '<img src="' . $row['image_url'] . '" class="card-img-top" alt="product">';
                    echo '<div class="card-body" style="background-color: #f8f9fa; padding: 10px;">';
                    echo '<h5 class="card-title" style="font-size: 19px; font-weight: bold; margin-bottom: 5px;">' . $row['bike_name'] . '</h5>';
                    echo '<p class="card-text" style="font-size: 14px; color: #333; margin-bottom: 3px;">Type: ' . $row['vehicle_type'] . '</p>';
                    echo '<p class="card-text" style="font-size: 14px; color: #888; margin-bottom: 3px;">Original price: <strike>$' . $row['price'] . '</strike></p>';
                    echo '<p class="card-text" style="font-size: 16px; color: #e44d26; font-weight: bold;">Promotion Price: $' . $row['discounted_price'] . '</p>';
                    echo '</div>';

                    echo '</div>';
                    echo '</div>';
                  }
                } else {
                  echo "There are no products in the database.";
                }

                $conn->close();
                ?>
              </div>


            </div>
          </div>

          <div class="tab-pane fade" id="bicycle-racing">

            <div class="tab-header text-center">
              <p>List</p>
              <h3>Bicycle racing</h3>
            </div>

            <div class="rowmenu-ite">
              <?php
              require 'admin/products/connect.php';
              if ($conn->connect_error) {
                die("Kết nối cơ sở dữ liệu thất bại: " . $conn->connect_error);
              }

              $sql = "SELECT * FROM bikes WHERE vehicle_type = 'Bicycle racing' AND price > 1000";
              $result = $conn->query($sql);
              ?>

              <?php
              if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                  echo '<div class="col-md-3 mb-3">';
                  echo '<div class="card">';
                  echo '<span class="sale">' . $row['sale'] . '%</span>';
                  echo '<img src="' . $row['sample_image_url'] . '" class="card-img-top" alt="product">';
                  echo '<div class="card-body" style="background-color: #f8f9fa; padding: 10px;">';
                  echo '<h5 class="card-title" style="font-size: 19px; font-weight: bold; margin-bottom: 5px;">' . $row['bike_name'] . '</h5>';
                  echo '<p class="card-text" style="font-size: 14px; color: #333; margin-bottom: 3px;">Type: ' . $row['vehicle_type'] . '</p>';
                  echo '<p class="card-text" style="font-size: 14px; color: #888; margin-bottom: 3px;">Original price: <strike>$' . $row['price'] . '</strike></p>';
                  echo '<p class="card-text" style="font-size: 16px; color: #e44d26; font-weight: bold;">Promotion Price: $' . $row['discounted_price'] . '</p>';
                  echo '</div>';

                  echo '</div>';
                  echo '</div>';
                }
              } else {
                echo "There are no products in the database.";
              }

              $conn->close();
              ?>

            </div>
          </div>

          <div class="tab-pane fade" id="children-bicycles">

            <div class="tab-header text-center">
              <p>List</p>
              <h3>Children's Bicycles</h3>
            </div>

            <div class="row gy-5">

              <?php
              require 'admin/products/connect.php';
              if ($conn->connect_error) {
                die("Kết nối cơ sở dữ liệu thất bại: " . $conn->connect_error);
              }

              $sql = "SELECT * FROM bikes WHERE vehicle_type = 'Children Bicycles' AND price > 1000";
              $result = $conn->query($sql);
              ?>

              <?php
              if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                  echo '<div class="col-md-3 mb-3">';
                  echo '<div class="card">';
                  echo '<span class="sale">' . $row['sale'] . '%</span>';
                  echo '<img src="' . $row['sample_image_url'] . '" class="card-img-top" alt="product">';
                  echo '<div class="card-body" style="background-color: #f8f9fa; padding: 10px;">';
                  echo '<h5 class="card-title" style="font-size: 19px; font-weight: bold; margin-bottom: 5px;">' . $row['bike_name'] . '</h5>';
                  echo '<p class="card-text" style="font-size: 14px; color: #333; margin-bottom: 3px;">Type: ' . $row['vehicle_type'] . '</p>';
                  echo '<p class="card-text" style="font-size: 14px; color: #888; margin-bottom: 3px;">Original price: <strike>$' . $row['price'] . '</strike></p>';
                  echo '<p class="card-text" style="font-size: 16px; color: #e44d26; font-weight: bold;">Promotion Price: $' . $row['discounted_price'] . '</p>';
                  echo '</div>';

                  echo '</div>';
                  echo '</div>';
                }
              } else {
                echo "There are no products in the database.";
              }

              $conn->close();
              ?>

            </div>
          </div>

          <div class="tab-pane fade" id="folding-bicycles">

            <div class="tab-header text-center">
              <p>List</p>
              <h3>Folding Bicycles</h3>
            </div>

            <?php
            require 'admin/products/connect.php';
            if ($conn->connect_error) {
              die("Kết nối cơ sở dữ liệu thất bại: " . $conn->connect_error);
            }

            $sql = "SELECT * FROM bikes WHERE vehicle_type = 'Folding bicycles' AND price > 1000";
            $result = $conn->query($sql);

            if ($result === false) {
              echo "Có lỗi xảy ra trong câu truy vấn: " . $conn->error;
            } else {
              if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                  echo '<div class="col-md-3 mb-3">';
                  echo '<div class="card">';
                  echo '<span class="sale">' . $row['sale'] . '%</span>';
                  echo '<img src="' . $row['sample_image_url'] . '" class="card-img-top" alt="product">';
                  echo '<div class="card-body" style="background-color: #f8f9fa; padding: 10px;">';
                  echo '<h5 class="card-title" style="font-size: 19px; font-weight: bold; margin-bottom: 5px;">' . $row['bike_name'] . '</h5>';
                  echo '<p class="card-text" style="font-size: 14px; color: #333; margin-bottom: 3px;">Type: ' . $row['vehicle_type'] . '</p>';
                  echo '<p class="card-text" style="font-size: 14px; color: #888; margin-bottom: 3px;">Original price: <strike>$' . $row['price'] . '</strike></p>';
                  echo '<p class="card-text" style="font-size: 16px; color: #e44d26; font-weight: bold;">Promotion Price: $' . $row['discounted_price'] . '</p>';
                  echo '</div>';

                  echo '</div>';
                  echo '</div>';
                }
              } else {
                echo "There are no products in the database.";
              }

              $conn->close();
            }
            ?>

          </div>

        </div>

      </div>
    </section>

    <section id="testimonials" class="testimonials section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2>Testimonials</h2>
          <p>What Are They <span>Saying About BikeBuzz</span></p>
        </div>

        <div class="slides-1 swiper" data-aos="fade-up" data-aos-delay="100">
          <div class="swiper-wrapper">

            <div class="swiper-slide">
              <div class="testimonial-item">
                <div class="row gy-4 justify-content-center">
                  <div class="col-lg-6">
                    <div class="testimonial-content">
                      <p>
                        <i class="bi bi-quote quote-icon-left"></i>
                        BikeBuzz is a brand I always trust. Their products
                        are not only about technical perfection but also
                        demonstrate love for the environment and passion for
                        cycling.
                        <i class="bi bi-quote quote-icon-right"></i>
                      </p>
                      <h3> Richard Branson</h3>
                      <h4>Founder of Virgin Group</h4>
                      <div class="stars">
                        <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-2 text-center">
                    <img src="https://uploads.concordia.net/2015/09/22145431/Richard-Branson.jpg" class="img-fluid testimonial-img" alt>
                  </div>
                </div>
              </div>
            </div>

            <div class="swiper-slide">
              <div class="testimonial-item">
                <div class="row gy-4 justify-content-center">
                  <div class="col-lg-6">
                    <div class="testimonial-content">
                      <p>
                        <i class="bi bi-quote quote-icon-left"></i>
                        BikeBuzz's bikes are part of the freedom and rhythm
                        of my life. They not only help me browse through
                        beautiful days but also create memorable moments
                        when I relax and enjoy music. Start your journey
                        with BikeBuzz and feel the beauty of life.
                        <i class="bi bi-quote quote-icon-right"></i>
                      </p>
                      <h3>Ella Fitzgerald</h3>
                      <h4>Legendary female jazz singer</h4>
                      <div class="stars">
                        <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-2 text-center">
                    <img src="https://media.istockphoto.com/id/1156455788/photo/beautiful-young-woman-singing-with-the-microphone.jpg?s=612x612&w=0&k=20&c=qUR5n9AVDTtChuQfQoVNw60qRkFnlKT3dwRHXxs-ZGQ=" class="img-fluid testimonial-img" alt>
                  </div>
                </div>
              </div>
            </div>

            <div class="swiper-slide">
              <div class="testimonial-item">
                <div class="row gy-4 justify-content-center">
                  <div class="col-lg-6">
                    <div class="testimonial-content">
                      <p>
                        <i class="bi bi-quote quote-icon-left"></i>
                        In the water or on land, I always seek a sense of
                        freedom and challenge. BikeBuzz has come up with
                        reliable and suitable bikes for every situation. Don't
                        miss the opportunity to explore the world by cycling
                        with BikeBuzz!
                        <i class="bi bi-quote quote-icon-right"></i>
                      </p>
                      <h3>Michael Phelps</h3>
                      <h4>swimmer</h4>
                      <div class="stars">
                        <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-2 text-center">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR8ehBQJwjF8shS5ccNXn-6AHD2GVmpw1P7jA&usqp=CAU" class="img-fluid testimonial-img" alt>
                  </div>
                </div>
              </div>
            </div>

            <div class="swiper-slide">
              <div class="testimonial-item">
                <div class="row gy-4 justify-content-center">
                  <div class="col-lg-6">
                    <div class="testimonial-content">
                      <p>
                        <i class="bi bi-quote quote-icon-left"></i>
                        I have been on a lifelong fitness journey, and
                        BikeBuzz has been a huge part of my life. Cycling is
                        not only a great way to exercise, but it also helps
                        you relax and connect with nature. Join BikeBuzz and
                        start your health journey!
                        <i class="bi bi-quote quote-icon-right"></i>
                      </p>
                      <h3>Jane Fonda</h3>
                      <h4>actor and fitness celebrity</h4>
                      <div class="stars">
                        <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-2 text-center">
                    <img src="https://w7.pngwing.com/pngs/690/941/png-transparent-dwayne-johnson-muscle-fitness-physical-fitness-magazine-men-s-fitness-dwayne-johnson-tshirt-arm-bodybuilder-thumbnail.png" class="img-fluid testimonial-img" alt>
                  </div>
                </div>
              </div>
            </div>

          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>
    </section>

    <section id="events" class="events">
      <div class="container-fluid" data-aos="fade-up">

        <div class="section-header">
          <h2>Moments</h2>
          <p>Share <span>Your Moments</span> when receiving the car</p>
        </div>

        <div class="slides-3 swiper" data-aos="fade-up" data-aos-delay="100">
          <div class="swiper-wrapper">

            <div class="swiper-slide event-item d-flex flex-column justify-content-end" style="background-image: url(assets/img/m1.jpg)">
              <h3>Emily</h3>
              <div class="price align-self-start">September 20, 2023</div>
              <p class="description">
                "I bought my bike at this store and I couldn't be happier with the care they put into this project. Beautiful bike, good quality, and excellent customer service. I Received the car on the promised date and had a great experience. Thank you store!"
              </p>
            </div>

            <div class="swiper-slide event-item d-flex flex-column justify-content-end" style="background-image: url(assets/img/m3.jpg)">
              <h3>Mike</h3>
              <div class="price align-self-start">August 10, 2023</div>
              <p class="description">
                "I bought a racing bike here and was very satisfied with the service. The staff advised me on the most suitable option and explained how to use the bike. The store also made sure that my bike was Perfectly tested and assembled before I received it. Very trustworthy and professional!"
              </p>
            </div>

            <div class="swiper-slide event-item d-flex flex-column justify-content-end" style="background-image: url(assets/img/m2.jpg)">
              <h3>David</h3>
              <div class="price align-self-start">May 9, 2023</div>
              <p class="description">
                "I bought an electric bike here and have used it for thousands of miles. There have been no problems and the bike has always worked well. I am really impressed with the quality of the product and the after-sales service."
                This is a great store to buy bicycles!"
              </p>
            </div>

          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>
    </section>

    <section id="book-a-table" class="book-a-table">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2>Make An Appointment</h2>
          <p>Make An Appointment <span>See The Car</span> To With Us</p>
        </div>

        <div class="row g-0">

          <div class="col-lg-4 reservation-img" style="background-image: url(assets/img/see.jpg);" data-aos="zoom-out" data-aos-delay="200"></div>

          <div class="col-lg-8 d-flex align-items-center reservation-form-bg">
            <form action="send_email.php" method="post" role="form" class="php-email-form" data-aos="fade-up" data-aos-delay="100">
              <div class="row gy-4">
                <div class="col-lg-4 col-md-6">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
                  <div class="validate"></div>
                </div>
                <div class="col-lg-4 col-md-6">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email">
                  <div class="validate"></div>
                </div>
                <div class="col-lg-4 col-md-6">
                  <input type="text" class="form-control" name="phone" id="phone" placeholder="Your Phone" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
                  <div class="validate"></div>
                </div>
                <div class="col-lg-4 col-md-6">
                  <input type="text" name="date" class="form-control" id="date" placeholder="Date" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
                  <div class="validate"></div>
                </div>
                <div class="col-lg-4 col-md-6">
                  <input type="text" class="form-control" name="time" id="time" placeholder="Time" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
                  <div class="validate"></div>
                </div>
                <div class="col-lg-4 col-md-6">
                  <input type="text" class="form-control" name="people" id="people" placeholder="Desired car model" data-rule="minlen:2" data-msg="Please enter at least 2 chars">
                  <div class="validate"></div>
                </div>
              </div>
              <div class="form-group mt-3">
                <textarea class="form-control" name="message" rows="5" placeholder="Message"></textarea>
                <div class="validate"></div>
              </div>
              <div class="mb-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">You Have Successfully Scheduled
                  Your Appointment. We Will Send Email
                  Or Call You To Confirm. Thank you !</div>
              </div>
              <div class="text-center"><button type="submit">Make an
                  appointment</button></div>
            </form>
          </div>

        </div>

      </div>
    </section>

    <section id="gallery" class="gallery section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2>Donors</h2>
          <p>Some Famous Brands Sponsor <span>BikeBuzz</span></p>
        </div>

        <div class="gallery-slider swiper">
          <div class="swiper-wrapper align-items-center">
            <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery" href="https://www.trekbikes.com/in/en_IN/"><img src="assets/img/gallery/b1.png" class="img-fluid" alt></a></div>
            <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery" href="https://www.cannondale.com/en"><img src="assets/img/gallery/b2.png" class="img-fluid" alt></a></div>
            <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery" href="https://www.konaworld.com/"><img src="assets/img/gallery/b3.png" class="img-fluid" alt></a></div>
            <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery" href="https://www.colnago.com/"><img src="assets/img/gallery/b4.png" class="img-fluid" alt></a></div>
            <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery" href="https://www.bianchi.com/"><img src="assets/img/gallery/b5.png" class="img-fluid" alt></a></div>
            <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery" href="https://www.raleighusa.com/"><img src="assets/img/gallery/b6.png" class="img-fluid" alt></a></div>
            <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery" href="https://www.cervelo.com/en-US "><img src="assets/img/gallery/b7.png" class="img-fluid" alt></a></div>
            <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery" href="https://www.orbea.com/"><img src="assets/img/gallery/b8.png" class="img-fluid" alt></a></div>
          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>
    </section>

    <section id="contact" class="contact">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2>Contact</h2>
          <p>Need Help? <span>Contact Us</span></p>
        </div>

        <div class="mb-3">
          <iframe style="border:0; width: 100%; height: 350px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3835.747040669685!2d108.24970407390967!3d15.974581141967171!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31421088e365cc75%3A0x6648fdda14970b2c!2zNDcwIMSQxrDhu51uZyBUcuG6p24gxJDhuqFpIE5naMSpYSwgSG_DoCBI4bqjaSwgTmfFqSBIw6BuaCBTxqFuLCDEkMOgIE7hurVuZyA1NTAwMDAsIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1695458594191!5m2!1svi!2s" frameborder="0" allowfullscreen></iframe>
        </div>

        <div class="row gy-4">

          <div class="col-md-6">
            <div class="info-item  d-flex align-items-center">
              <i class="icon bi bi-map flex-shrink-0"></i>
              <div>
                <h3>Our Address</h3>
                <p>470 Tran Dai Nghia Street, Hoa Hai, Ngu Hanh Son, Da Nang
                  550000, Vietnam</p>
              </div>
            </div>
          </div><!-- End Info Item -->

          <div class="col-md-6">
            <div class="info-item d-flex align-items-center">
              <i class="icon bi bi-envelope flex-shrink-0"></i>
              <div>
                <h3>Email Us</h3>
                <p>bikebuzz@contact.com</p>
              </div>
            </div>
          </div><!-- End Info Item -->

          <div class="col-md-6">
            <div class="info-item  d-flex align-items-center">
              <i class="icon bi bi-telephone flex-shrink-0"></i>
              <div>
                <h3>Call Us</h3>
                <p>+84 123 456 789</p>
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="info-item  d-flex align-items-center">
              <i class="icon bi bi-share flex-shrink-0"></i>
              <div>
                <h3>Opening Hours</h3>
                <div><strong>Mon-Sat:</strong> 7AM - 23PM;
                  <strong>Sunday:</strong> Closed
                </div>
              </div>
            </div>
          </div>

        </div>

        <form action="forms/contact.php" method="post" role="form" class="php-email-form p-3 p-md-4">
          <div class="row">
            <div class="col-xl-6 form-group">
              <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
            </div>
            <div class="col-xl-6 form-group">
              <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
            </div>
          </div>
          <div class="form-group">
            <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
          </div>
          <div class="form-group">
            <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
          </div>
          <div class="my-3">
            <div class="loading">Loading</div>
            <div class="error-message"></div>
            <div class="sent-message">Your message has been sent. Thank you!</div>
          </div>
          <div class="text-center"><button type="submit">Send Message</button></div>
        </form>

      </div>
    </section>

  </main>

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">

    <div class="container">
      <div class="row gy-3">
        <div class="col-lg-3 col-md-6 d-flex">
          <i class="bi bi-geo-alt icon"></i>
          <div>
            <h4>Address</h4>
            <p>
              470 Tran Dai Nghia Street<br>
              Hoa Hai, Ngu Hanh Son, Da Nang 550000 - Vietnam<br>
            </p>
          </div>

        </div>

        <div class="col-lg-3 col-md-6 footer-links d-flex">
          <i class="bi bi-telephone icon"></i>
          <div>
            <h4>Contact</h4>
            <p>
              <strong>Phone:</strong> +84 123 456 789<br>
              <strong>Email:</strong> bikebuzz@contact.com<br>
            </p>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 footer-links d-flex">
          <i class="bi bi-clock icon"></i>
          <div>
            <h4>Opening Hours</h4>
            <p>
              <strong>Mon-Sat: 7AM</strong> - 23PM<br>
              Sunday: Closed
            </p>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 footer-links">
          <h4>Follow Us</h4>
          <div class="social-links d-flex">
            <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
            <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
            <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
            <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
          </div>
        </div>

      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>BikeBuzz</span></strong>. All Rights
        Reserved
      </div>
    </div>


  </footer>

  <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>
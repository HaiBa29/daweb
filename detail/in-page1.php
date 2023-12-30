<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Bicycle details</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <link href="../assets/img/logobike.png" rel="icon">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Amatic+SC:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Inter:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <link href="../assets/css/main.css" rel="stylesheet">
  <link rel="stylesheet" href="../assets/css/page.css">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
</head>

<body>

  <header id="header" class="header fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

      <a href="../index.php" class="logo d-flex align-items-center me-auto me-lg-0">
        <img src="../assets/img/logobikebuzz.png" alt="bikebuzz">
      </a>

      <?php
      require_once('menu3.php');
      ?>

      <a class="btn-book" href="../login/logout.php">Log out</a>
      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

    </div>
  </header>
  <main id="main">

    <div class="information">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <ol>
            <li><a href="../index.php">Home</a></li>
            <li class="name">LAMBORGHINI CERVELO P5X
              Lamborghini x Cervelo</li>
          </ol>
        </div>

      </div>
    </div>

    <section class="sample-page">
      <div class="container1" data-aos="fade-up">
        <div class="container1">
          <div class="product-image">
            <img src="../assets/img/bikehot1.png" alt="lamborghini" class="product-pic">
            <div class="dots">
              <a href="https://rrsg.s3.amazonaws.com/wp-content/uploads/2018/05/16154225/P5X_Lamborghini_3.jpg" class="glightbox"><i>1</i></a>
              <a href="https://rrsg.s3.amazonaws.com/wp-content/uploads/2018/05/16154212/Feat-P5X_Lamborghini_2.jpg" class="glightbox"><i>2</i></a>
              <a href="https://autoexpress.vn/upload/autoexpress_news/2018/03/tin-tuc/15/lamborghini-cervelo-p5x-2.jpg" class="glightbox"><i>3</i></a>
              <a href="https://ttol.vietnamnetjsc.vn//2018/03/12/10/19/lamborghini-cervelo-p5x-xe-dap-dua-chi-co-25-chiec-toan-cau_1.jpg" class="glightbox"><i>4</i></a>
            </div>
          </div>

          <div class="product-details">
            <header>
              <h1 class="title">CERVELO
                P5X LAMBORGHINI</h1>
              <span class="colorCat">mint green</span>
              <div class="price">
                <span class="before">$17.600</span>
                <span class="product-price">$15.900</span>
              </div>
              <div class="rate">
                <a href="#!" class="active">★</a>
                <a href="#!" class="active">★</a>
                <a href="#!" class="active">★</a>
                <a href="#!" class="active">★</a>
                <a href="#!">★</a>
              </div>
            </header>
            <article>
              <h5>Details</h5>
              <p>Fork Cervélo All-Carbon, P5X Fork <br>
                Headset FSA IS2 1-1/8 x 1-1/2” <br>
                Seatpost Cervélo P5X Seatpost with Ritchey Head<br>
                Shifters Shimano Dura Ace SW-R9160 <br>
                Front Derailleur Shimano Dura Ace RD-9150 11 spd<br>
                Brake Levers Shimano Dura Ace ST-9180<br>
                Crankset Shimano Dura Ace 9100 52/36<br>
                Chain Shimano HG-900, 11spd<br>
                Wheels ENVE SES Disc: 54mm Front/ 78mm Rear<br>
                Travel Case P5X Travel Case co-developed with Biknd.</p>
            </article>
            <div class="controls">
              <div class="color">
                <h5>color</h5>
                <ul>
                  <li><a href="#!" class="colors color-bdot2 active"></a></li>
                </ul>
              </div>
            </div>
            <div class="footer1">
              <button type="button" class="add-to-cart" data-product-id="1" data-product-name="CERVELO P5X LAMBORGHINI" data-product-price="15900">
                <img src="http://co0kie.github.io/codepen/nike-product-page/cart.png" alt="cart">
                <span>add to cart</span>
              </button>
              <a href="#!"><img src="http://co0kie.github.io/codepen/nike-product-page/share.png" alt="share"></a>
            </div>
          </div>

        </div>
      </div>
    </section>

  </main>

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
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/aos/aos.js"></script>
  <script src="../assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="../assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="../assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="../assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="../assets/js/shop.js"></script>
  <script src="../assets/js/main.js"></script>

</body>

</html>
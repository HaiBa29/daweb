<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accessory Products</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/accessory.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="../assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Amatic+SC:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Inter:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <link href="../assets/css/main.css" rel="stylesheet">
    <style>
        .custom-heading {
            position: relative;
            display: inline-block;
            padding-left: 12rem;
        }

        .custom-heading h1 {
            border-left: 4px solid black;
            padding: 0 5px;
        }

        .card-title {
            max-width: 100%;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            font-size: 1.3rem;
            font-weight: bold;
            color: #333;
            margin-bottom: 10px;
            transition: color 0.3s ease;
        }

        .card-title:hover {
            color: #007bff;
        }

        .card-text {
            font-size: 1.2rem;
            color: #666;
        }

        .card-text del {
            color: #999;
            text-decoration: line-through;
        }

        .price {
            font-size: 1.4rem;
            font-weight: bold;
            color: #e44d26;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            color: #fff;
            transition: background-color 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        .card {
            position: relative;
            overflow: hidden;
        }

        .card:hover .overlay {
            opacity: 1;
        }

        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            opacity: 0;
            transition: opacity 0.3s ease;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .overlay-content {
            text-align: center;
            color: #fff;
        }

        .overlay-content a {
            display: inline-block;
            padding: 10px 20px;
            background-color: #e44d26;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
        }

        .add-to-cart {
            --color: #000;
            --background: #fff;
            --drop: #38E739;
            --background-s: 1;
            --text-o: 1;
            --text-x: 10px;
            --bottle-x: -40%;
            --bottle-y: -60px;
            --bottle-s: .4;
            --bottle-r: 0deg;
            --bottle-o: 0;
            --cart-x: -57px;
            --cart-y: -2px;
            --cart-r: 0deg;
            --cart-s: 0.8;
            --check-y: 0px;
            --check-s: 0;
            --check-offset: 8.5px;
            -webkit-tap-highlight-color: transparent;
          
            outline: none;
            background: none;
            border: none;
            padding: 12px 0;
            margin: 0;
            width: 142px;
            color: var(--color);
            cursor: pointer;
            position: relative;
            text-align: center;
            font: inherit;
        }

        .add-to-cart.clipped {
            -webkit-clip-path: polygon(0 -80px, 100% -80px, 100% 80px, 0 80px);
            clip-path: polygon(0 -80px, 100% -80px, 100% 80px, 0 80px);
        }

        .add-to-cart .background,
        .add-to-cart .cart,
        .add-to-cart .check {
            position: absolute;
            pointer-events: none;
        }

        .add-to-cart .background {
            left: 0;
            top: -4px;
            right: 0;
            bottom: 0;
            display: block;
            fill: var(--background);
            transform: scale(var(--background-s)) translateZ(0);
        }

        .add-to-cart span {
            position: relative;
            z-index: 1;
            line-height: 18px;
            display: block;
            font-size: 14px;
            font-weight: 500;
            opacity: var(--text-o);
            transform: translateX(var(--text-x)) translateZ(0);
        }

        .add-to-cart .drop {
            position: absolute;
            z-index: 1;
            left: 70px;
            top: 8px;
            width: 4px;
            height: 4px;
            border-radius: 50%;
            background: var(--drop);
        }

        .add-to-cart .cart {
            z-index: 2;
            bottom: 11px;
            left: calc(50% - 2px);
            transform-origin: 10px 17px;
            transform: translate(var(--cart-x), var(--cart-y)) scale(var(--cart-s)) rotate(var(--cart-r)) translateZ(0);
        }

        .add-to-cart .cart svg {
            display: block;
            width: 24px;
            height: 19px;
            stroke: var(--color);
            stroke-linecap: round;
            stroke-linejoin: round;
            fill: none;
            position: relative;
            z-index: 1;
            transform: translateZ(0);
        }


        .added-to-cart {
            background-color: #28a745;
            color: #fff;
        }

        .discount-percentage {
            position: absolute;
            top: 10px;
            left: 10px;
            background-color: #e44d26;
            color: #fff;
            padding: 5px;
            border-radius: 5px;
            font-size: 1rem;
        }
    </style>
</head>

<body>

    <header id="header" class="header fixed-top d-flex align-items-center">
        <div class="container d-flex align-items-center justify-content-between">

            <a href="index.php" class="logo d-flex align-items-center me-auto me-lg-0">
                <img src="../assets/img/logobikebuzz.png" alt="bikebuzz">
            </a>

            <nav id="navbar" class="navbar">

                <?php
                require "../menu.php";
                ?>

            </nav>

            <a class="btn-book" href="login/logout.php">Log out</a>
            <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
            <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

        </div>
    </header>

    <div class="information">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <ol>
                    <li><a href="../index.php">Home</a></li>
                    <li><a href="#">Bicycle</a></li>
                    <li class="name">Accessory</li>
                </ol>
            </div>

        </div>
    </div>

    <div class="custom-heading">
        <h1 class="text-center mt-5 font-weight-bold text-primary">Bicycle Accessories</h1>
    </div>

    <?php
    include 'connect.php';

    $sql = "SELECT * FROM accessory";
    $result = $conn->query($sql);
    ?>

    <div class="container mt-5">
        <div class="row">
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
            ?>
                    <div class="col-md-3 mb-4">
                        <div class="card">
                            <img src="<?php echo $row['url']; ?>" class="card-img-top" alt="product">
                            <div class="overlay">
                                <div class="overlay-content">
                                    <button class="add-to-cart">
                                        <div class="cart">
                                            <svg viewBox="0 0 24 19">
                                                <path d="M11.25 17C11.25 17.6904 10.6904 18.25 10 18.25C9.30964 18.25 8.75 17.6904 8.75 17C8.75 16.3096 9.30964 15.75 10 15.75C10.6904 15.75 11.25 16.3096 11.25 17Z" stroke-width="1.5 " />
                                                <path d="M19.25 17C19.25 17.6904 18.6904 18.25 18 18.25C17.3096 18.25 16.75 17.6904 16.75 17C16.75 16.3096 17.3096 15.75 18 15.75C18.6904 15.75 19.25 16.3096 19.25 17Z" stroke-width="1.5 " />
                                                <path d="M1 1H5L5.91304 4M5.91304 4L8.06853 11.0823C8.32483 11.9245 9.10161 12.5 9.98188 12.5H18.585C19.4329 12.5 20.1887 11.9653 20.471 11.1656L23 4H5.91304Z" stroke-width="2" />
                                            </svg>
                                        </div>
                                        <span>Add to cart</span>

                                        <svg class="background" viewBox="0 0 142 46">
                                            <path d="M0 19C0 10.7157 6.71573 4 15 4H41.4599C53.6032 4 62.4844 4 72.5547 4C82.6251 4 91.5063 4 103.65 4H137C139.761 4 142 6.23858 142 9V31C142 39.2843 135.284 46 127 46H5C2.23858 46 0 43.7614 0 41V19Z" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $row['product_title']; ?></h5>
                                <?php if (!empty($row['old_price'])) { ?>
                                    <p class="card-text"><del>$<?php echo $row['old_price']; ?></del></p>
                                <?php } ?>
                                <p class="card-text"><span class="price">$<?php echo $row['price']; ?></span></p>
                                <p class="card-text discount-percentage"><?php echo $row['discount']; ?>%  <?php echo $row['new']; ?></p>
                            </div>
                        </div>
                    </div>

            <?php
                }
            } else {
                echo "0 kết quả";
            }
            ?>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var addToCartButtons = document.querySelectorAll('.add-to-cart');

            addToCartButtons.forEach(function(button) {
                button.addEventListener('click', function() {
                    button.classList.add('added-to-cart');

                    button.innerHTML = '<div class="cart"><svg viewBox="0 0 24 19"><path d="M11.25 17C11.25 17.6904 10.6904 18.25 10 18.25C9.30964 18.25 8.75 17.6904 8.75 17C8.75 16.3096 9.30964 15.75 10 15.75C10.6904 15.75 11.25 16.3096 11.25 17Z" stroke-width="1.5 "/><path d="M19.25 17C19.25 17.6904 18.6904 18.25 18 18.25C17.3096 18.25 16.75 17.6904 16.75 17C16.75 16.3096 17.3096 15.75 18 15.75C18.6904 15.75 19.25 16.3096 19.25 17Z" stroke-width="1.5 "/><path d="M1 1H5L5.91304 4M5.91304 4L8.06853 11.0823C8.32483 11.9245 9.10161 12.5 9.98188 12.5H18.585C19.4329 12.5 20.1887 11.9653 20.471 11.1656L23 4H5.91304Z" stroke-width="2" /></svg></div><span>Added to cart</span>';

                    setTimeout(function() {
                        button.classList.remove('added-to-cart');
                        button.innerHTML = '<div class="cart"><svg viewBox="0 0 24 19"><path d="M11.25 17C11.25 17.6904 10.6904 18.25 10 18.25C9.30964 18.25 8.75 17.6904 8.75 17C8.75 16.3096 9.30964 15.75 10 15.75C10.6904 15.75 11.25 16.3096 11.25 17Z" stroke-width="1.5 "/><path d="M19.25 17C19.25 17.6904 18.6904 18.25 18 18.25C17.3096 18.25 16.75 17.6904 16.75 17C16.75 16.3096 17.3096 15.75 18 15.75C18.6904 15.75 19.25 16.3096 19.25 17Z" stroke-width="1.5 "/><path d="M1 1H5L5.91304 4M5.91304 4L8.06853 11.0823C8.32483 11.9245 9.10161 12.5 9.98188 12.5H18.585C19.4329 12.5 20.1887 11.9653 20.471 11.1656L23 4H5.91304Z" stroke-width="2" /></svg></div><span>Add to cart</span>';
                    }, 10000);
                });
            });
        });
    </script>

</body>

</html>
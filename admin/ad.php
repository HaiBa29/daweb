<?php
session_start();
if (!isset($_SESSION['is_admin']) || $_SESSION['is_admin'] !== 1) {
    header("Location: login/login_ad.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    <!-- Link to Boxicons CSS -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <style>
        .tab-content {
            width: 100%;
        }

        /* Các style hiện tại của bạn */
        .nav-list-item.active {
            background-color: #89CFF3;
            color: #000000;
        }

        .nav-list-item:hover {
            background-color: #B2C8BA;
            color: #000000;
            font-weight: 700;
        }
    </style>

    <link rel="stylesheet" href="dashboard.css">

</head>

<body>
    <div class="action-buttons">
        <button class="close-menu">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
                <line x1="18" y1="6" x2="6" y2="18" />
                <line x1="6" y1="6" x2="18" y2="18" />
            </svg>
        </button>
        <button class="menu-button">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu">
                <line x1="3" y1="12" x2="21" y2="12" />
                <line x1="3" y1="6" x2="21" y2="6" />
                <line x1="3" y1="18" x2="21" y2="18" />
            </svg>
        </button>
    </div>
    <div class="app-container">
        <div class="app-left">
            <div class="app-logo">
                <span>BikeBuzz</span>
            </div>
            <ul class="nav-list">
                <li class="nav-list-item active" id="homeTab">
                    <a class="nav-list-link" href="#home">
                        <i class='bx bxs-bar-chart-alt-2'></i>
                        Dashboard
                    </a>
                </li>
                <li class="nav-list-item" id="product">
                    <a class="nav-list-link" href="#productManagement">
                        <i class='bx bx-gift'></i>
                        Product Management
                    </a>
                </li>
                <li class="nav-list-item" id="AccessoryTab">
                    <a class="nav-list-link" href="#AccessoryManagement">
                        <i class='bx bx-shape-square'></i>
                        Accessory management
                    </a>
                </li>
                <li class="nav-list-item" id="odersTab">
                    <a class="nav-list-link" href="#orderManagement">
                        <i class='bx bxs-edit-alt'></i>
                        Order Management
                    </a>
                </li>
                <li class="nav-list-item" id="userTab">
                    <a class="nav-list-link" href="#userManagement">
                        <i class='bx bxs-user-voice'></i>
                        User management
                    </a>
                </li>
                <li class="nav-list-item" id="discountTab">
                    <a class="nav-list-link" href="#createDiscountCode">
                        <i class='bx bx-barcode-reader'></i>
                        Create Discount Codes
                    </a>
                </li>
            </ul>
        </div>
        <div class="app-main">
            <div class="main-header-line">
                <div class="tab-content" id="home">
                    <?php
                    require "dashboard.php";
                    ?>
                </div>
                <div class="tab-content" id="productManagement">
                    <?php
                    require "products/admin.php";
                    ?>
                </div>
                <div class="tab-content" id="AccessoryManagement">
                    <?php
                    require "accessory/AccessoryManagement.php";
                    ?>
                </div>
                <div class="tab-content" id="orderManagement">
                    <?php
                    require "order/order.php";
                    ?>
                </div>
                <div class="tab-content" id="userManagement">
                    <?php
                    require "Users/users.php";
                    ?>
                </div>
                <div class="tab-content" id="createDiscountCode">
                    <?php
                    require "codes/createDiscountCode.php";
                    ?>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            // Ẩn tất cả các tab-content ban đầu, trừ tab mặc định
            $(".tab-content").not("#home").hide();

            // Xử lý sự kiện khi nhấn vào biểu tượng hambuger
            $(".close-menu").click(function() {
                // Hiển thị hoặc ẩn tên thẻ a khi nhấn vào biểu tượng hambuger
                $(".nav-list-link .menu-text").toggle();

                // Thêm hoặc xóa lớp 'menu-open' cho phần 'app-left'
                $(".app-left").toggleClass("menu-open");
            });

            // Xử lý sự kiện khi người dùng bấm vào tab
            $(".nav-list-link").click(function() {
                // Lấy ID của tab được bấm
                var tabId = $(this).attr("href").substring(1);

                // Ẩn tất cả các tab-content
                $(".tab-content").hide();

                // Hiển thị tab-content tương ứng
                $("#" + tabId).show();

                // Đặt active class cho tab được chọn
                $(".nav-list-item").removeClass("active");
                $(this).parent().addClass("active");

                // Nếu đang ở kích thước nhỏ, đóng menu
                if ($(window).width() <= 768) {
                    $(".app-left").removeClass("menu-open");
                    $(".nav-list-link .menu-text").hide();
                }
            });

            // Xử lý sự kiện resize để kiểm tra kích thước và đóng menu khi cần
            $(window).resize(function() {
                if ($(window).width() > 768) {
                    $(".app-left").removeClass("menu-open");
                    $(".nav-list-link .menu-text").show();
                }
            });
        });
    </script>
</body>

</html>
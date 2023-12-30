<?php
session_start();

if (isset($_POST['discountPercentage'])&& isset($_POST['discountCodeValue'])) {
    //&& isset($_POST['discountCodeValue'])
    $discountPercentage = $_POST['discountPercentage'];
    $discountCodeValue = $_POST['discountCodeValue'];


    // Lưu giá trị vào session hoặc thực hiện các xử lý khác
    $_SESSION['discountPercentage'] = $discountPercentage;
   $_SESSION['discountCodeValue'] = $discountCodeValue;
     // Lưu giá trị vào session
     $_SESSION['discountPercentage'] = $discountPercentage;
     $_SESSION['discountCodeValue'] = $discountCodeValue;
    
    // Chuyển hướng hoặc thực hiện các hành động khác sau khi xử lý
    header('Location: giohang.php');
    exit();
} else {
    // Xử lý trường hợp không có giá trị discountPercentage
    header('Location: error_page.php');
    exit();
}
?>

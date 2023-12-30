<?php
include '../../accessory/connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $productTitle = mysqli_real_escape_string($conn, $_POST['product_title']);
    $oldPrice = isset($_POST['old_price']) ? $_POST['old_price'] : null;
    $price = $_POST['price'];
    $new = mysqli_real_escape_string($conn, $_POST['new']);
    $url = mysqli_real_escape_string($conn, $_POST['url']);

    $sql = "INSERT INTO accessory (product_title, old_price, price, new, url) VALUES ('$productTitle', '$oldPrice', '$price', '$new', '$url')";

    if ($conn->query($sql) === TRUE) {
        echo '<script>
                document.addEventListener("DOMContentLoaded", function() {
                    Swal.fire({
                        icon: "success",
                        title: "Success",
                        text: "The product has been added successfully."
                    }).then(function() {
                        window.location.href = "../ad.php";
                    });
                });
             </script>';
    } else {
        echo '<script>
                document.addEventListener("DOMContentLoaded", function() {
                    Swal.fire({
                        icon: "error",
                        title: "Error",
                        html: "Error: ' . $sql . '<br>' . $conn->error . '",
                    });
                });
             </script>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accessory Management</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>

    <div class="container mt-5">
        <h2 class="text-center">Add New Accessory</h2>
        <form method="POST" action="">
            <div class="form-group">
                <label for="product_title">Product Title:</label>
                <input type="text" class="form-control" id="product_title" name="product_title" required>
            </div>
            <div class="form-group">
                <label for="old_price">Old Price:</label>
                <input type="number" class="form-control" id="old_price" name="old_price">
            </div>
            <div class="form-group">
                <label for="price">Price:</label>
                <input type="number" class="form-control" id="price" name="price" required>
            </div>
            <div class="form-group">
                <label for="new">New:</label>
                <input type="text" class="form-control" id="new" name="new">
            </div>
            <div class="form-group">
                <label for="url">URL_product:</label>
                <input type="text" class="form-control" id="url" name="url" required>
            </div>
            <button type="submit" class="btn btn-primary">Add Product</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>
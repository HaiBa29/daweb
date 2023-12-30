<?php
require 'connect.php';

if ($conn->connect_error) {
    die("Kết nối CSDL thất bại: " . $conn->connect_error);
}

// Hàm để xử lý hiển thị thông báo
function showError($message) {
    echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>';
    echo "<script>
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: '$message'
            }).then(function() {
                window.location.href = '../ad.php';
            });
          </script>";
    exit;
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM bikes WHERE bike_id = ?";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            $product = $result->fetch_assoc();
        } else {
            showError("Product not found.");
        }

        $stmt->close();
    } else {
        showError("Error preparing the SQL statement.");
    }
} else {
    showError("There is no product ID.");
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Edit Product</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .container {
            max-width: 600px;
            margin: 0 auto;
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2 class="text-center">Edit Product</h2>

        <form method="post">
            <div class="form-group">
                <label for="bike_name">Name:</label>
                <input type="text" class="form-control" id="bike_name" name="bike_name" value="<?= $product['bike_name']; ?>">
            </div>

            <div class="form-group">
                <label for="frame">Frame:</label>
                <input type="text" class="form-control" id="frame" name="frame" value="<?= $product['frame']; ?>">
            </div>

            <div class="form-group">
                <label for="frame_size">Frame Size:</label>
                <input type="text" class="form-control" id="frame_size" name="frame_size" value="<?= $product['frame_size']; ?>">
            </div>

            <div class="form-group">
                <label for="fork">Fork:</label>
                <input type="text" class="form-control" id="fork" name="fork" value="<?= $product['fork']; ?>">
            </div>

            <div class="form-group">
                <label for="derailleur">Derailleur:</label>
                <input type="text" class="form-control" id="derailleur" name="derailleur" value="<?= $product['derailleur']; ?>">
            </div>

            <div class="form-group">
                <label for="brakes">Brakes:</label>
                <input type="text" class="form-control" id="brakes" name="brakes" value="<?= $product['brakes']; ?>">
            </div>

            <div class="form-group">
                <label for="price">Price:</label>
                <input type="text" class="form-control" id="price" name="price" value="<?= $product['price']; ?>">
            </div>

            <div class="form-group">
                <label for="image_url">Image URL:</label>
                <input type="text" class="form-control" id="image_url" name="image_url" value="<?= $product['image_url']; ?>">
            </div>

            <div class="form-group">
                <label for="vehicle_type">Vehicle Type:</label>
                <input type="text" class="form-control" id="vehicle_type" name="vehicle_type" value="<?= $product['vehicle_type']; ?>">
            </div>

            <div class="form-group">
                <label for="discounted_price">Discounted Price:</label>
                <input type="text" class="form-control" id="discounted_price" name="discounted_price" value="<?= $product['discounted_price']; ?>">
            </div>

            <div class="form-group">
                <label for="sample_image_url">Sample Image URL:</label>
                <input type="text" class="form-control" id="sample_image_url" name="sample_image_url" value="<?= $product['sample_image_url']; ?>">
            </div>

            <div class="form-group">
                <label for="quantity">Quantity:</label>
                <input type="text" class="form-control" id="quantity" name="quantity" value="<?= $product['quantity']; ?>">
            </div>

            <div class="form-group">
                <label for="product_description">Product Description:</label>
                <input type="text" class="form-control" id="product_description" name="product_description" value="<?= $product['product_description']; ?>">
            </div>

            <div class="form-group">
                <label for="sale">Sale:</label>
                <input type="text" class="form-control" id="sale" name="sale" value="<?= $product['sale']; ?>">
            </div>

            <button type="submit" class="btn btn-primary" name="update_product">Save changes</button>
            <a class="btn btn-secondary" href="../ad.php">Return</a>
        </form>
    </div>

    <?php
    if (isset($_POST['update_product'])) {
        $updateSql = "UPDATE bikes SET bike_name = ?, frame = ?, frame_size = ?, fork = ?, derailleur = ?, brakes = ?, price = ?, image_url = ?, vehicle_type = ?, discounted_price = ?, sample_image_url = ?, quantity = ?, product_description = ?, sale = ? WHERE bike_id = ?";

        $stmt = $conn->prepare($updateSql);

        if ($stmt) {
            $stmt->bind_param("ssssssdssdssssi", $bike_name, $frame, $frame_size, $fork, $derailleur, $brakes, $price, $image_url, $vehicle_type, $discounted_price, $sample_image_url, $quantity, $product_description, $sale, $id);

            // Gán giá trị cho các biến trước khi bind
            $bike_name = $_POST['bike_name'];
            $frame = $_POST['frame'];
            $frame_size = $_POST['frame_size'];
            $fork = $_POST['fork'];
            $derailleur = $_POST['derailleur'];
            $brakes = $_POST['brakes'];
            $price = floatval($_POST['price']);
            $image_url = $_POST['image_url'];
            $vehicle_type = $_POST['vehicle_type'];
            $discounted_price = floatval($_POST['discounted_price']);
            $sample_image_url = $_POST['sample_image_url'];
            $quantity = intval($_POST['quantity']);
            $product_description = $_POST['product_description'];
            $sale = $_POST['sale'];

            $stmt->execute();

            if ($stmt->affected_rows > 0) {
                // Xử lý khi cập nhật thành công
                echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>';
                echo '<script>
                        Swal.fire({
                            icon: "success",
                            title: "Success",
                            text: "Product update successful."
                        }).then(function() {
                            window.location.href = "../ad.php";
                        });
                      </script>';
            } else {
                // Xử lý khi cập nhật thất bại
                showError("Error when updating product.");
            }

            $stmt->close();
        }
    }
    ?>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
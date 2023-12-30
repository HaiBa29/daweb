<?php
require __DIR__ . '/../../accessory/connect.php';

if ($conn->connect_error) {
    die("Kết nối CSDL thất bại: " . $conn->connect_error);
}

if (isset($_GET['id_product'])) {
    $id = $_GET['id_product'];

    $sql = "SELECT * FROM accessory WHERE id_product = ?";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            $product = $result->fetch_assoc();

            // Lấy giá trị từ $product nếu tồn tại
            $product_title = isset($product['product_title']) ? $product['product_title'] : '';
            $old_price = isset($product['old_price']) ? $product['old_price'] : '';
            $price = isset($product['price']) ? $product['price'] : '';
            $discount = isset($product['discount']) ? $product['discount'] : '';
            $is_new = isset($product['new']) ? $product['new'] : ''; // Do 'new' là từ khóa trong SQL, nên chúng ta sử dụng tên khác như 'is_new'
            $url = isset($product['url']) ? $product['url'] : '';
        }

        $stmt->close();
    } else {
        echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>';
        echo '<script>
                Swal.fire({
                    icon: "error",
                    title: "Error",
                    text: "Error preparing the SQL statement."
                }).then(function() {
                    window.location.href = "../ad.php";
                });
            </script>';
        exit;
    }
} else {
    echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>';
    echo '<script>
            Swal.fire({
                icon: "error",
                title: "Error",
                text: "There is no product ID."
            }).then(function() {
                window.location.href = "../ad.php";
            });
        </script>';
    exit;
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Repair products</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .container {
            max-width: 400px;
            margin: 0 auto;
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2 class="text-center">Repair products</h2>

        <form method="POST" action="">
            <div class="form-group">
                <label for="product_title">Product Title:</label>
                <input type="text" class="form-control" id="product_title" name="product_title" required
                    value="<?php echo $product_title; ?>">
            </div>
            <div class="form-group">
                <label for="old_price">Old Price:</label>
                <input type="number" class="form-control" id="old_price" name="old_price"
                    value="<?php echo $old_price; ?>">
            </div>
            <div class="form-group">
                <label for="price">Price:</label>
                <input type="number" class="form-control" id="price" name="price" required
                    value="<?php echo $price; ?>">
            </div>
            <div class="form-group">
                <label for="discount">Discount:</label>
                <input type="text" class="form-control" id="discount" name="discount"
                    value="<?php echo $discount; ?>">
            </div>
            <div class="form-group">
                <label for="new">New:</label>
                <input type="text" class="form-control" id="new" name="new" value="<?php echo $is_new; ?>">
            </div>
            <div class="form-group">
                <label for="url">URL_product:</label>
                <input type="text" class="form-control" id="url" name="url" required
                    value="<?php echo $url; ?>">
            </div>
            <button type="submit" class="btn btn-primary" name="sua_san_pham">Cập nhật sản phẩm</button>
        </form>

        <?php
        if (isset($_POST['sua_san_pham'])) {
            $updateSql = "UPDATE accessory SET
                    product_title = ?,
                    old_price = ?,
                    price = ?,
                    discount = ?,
                    new = ?,
                    url = ?
                    WHERE id_product = ?";

            $stmt = $conn->prepare($updateSql);

            if ($stmt) {
                $stmt->bind_param("ssdsssi", $_POST['product_title'], $_POST['old_price'], $_POST['price'], $_POST['discount'], $_POST['new'], $_POST['url'], $id);

                $stmt->execute();

                if ($stmt->affected_rows > 0) {
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
                    echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>';
                    echo '<script>
                    Swal.fire({
                        icon: "error",
                        title: "Error",
                        text: "Error when updating product."
                    });
                </script>';
                }

                $stmt->close();
            }
        }
        ?>

        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </div>
</body>

</html>

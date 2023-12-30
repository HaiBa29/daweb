<!DOCTYPE html>
<html>

<head>
    <title>Add products</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        h1 {
            color: #333;
            text-align: center;
            margin-top: 20px;
        }

        .container {
            width: 400px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-top: 10px;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        input[type="submit"] {
            background-color: #333;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #555;
        }

        a {
            margin-left: 20px;
            background-color: antiquewhite;
            width: 130px;
            border-radius: 10% 60% 80% 50%;
            height: auto;
            text-decoration: none;
        }

        .return {
            color: #00A9FF;
        }

        .return:hover {
            color: red;
        }
    </style>
</head>

<body>
    <h1>Add new products</h1>
    <div class="container">
        <form method="post">
            <label for="bike_name">Name:</label>
            <input type="text" name="bike_name" id="bike_name" required>

            <label for="frame">frame:</label>
            <input type="text" name="frame" id="frame" required>

            <label for="frame_size">frame size:</label>
            <input type="text" name="frame_size" id="frame_size" required>

            <label for="fork">fork:</label>
            <input type="text" name="fork" id="fork" required>

            <label for="derailleur">derailleur:</label>
            <input type="text" name="derailleur" id="derailleur" required>

            <label for="brakes">brakes:</label>
            <input type="text" name="brakes" id="brakes" required>

            <label for="price">price:</label>
            <input type="text" name="price" id="price" required>
          
            <label for="image_url">image url:</label>
            <input type="text" name="image_url" id="image_url" required>

            <label for="vehicle_type">vehicle type:</label>
            <input type="text" name="vehicle_type" id="vehicle_type" required>

            <label for="discounted_price">Sale:</label>
            <input type="text" name="sale" id="sale" required>

            <label for="sample_image_url">sample image url:</label>
            <input type="text" name="sample_image_url" id="sample_image_url" required>

            <label for="quantity">quantity:</label>
            <input type="text" name="quantity" id="quantity" required>

            <label for="product_description">product description:</label>
            <input type="text" name="product_description" id="product_description" required>

            <input type="submit" name="them_san_pham" value="Add Product">
            <a href="../ad.php" class="return">Return to admin page</a>
        </form>
    </div>

    <?php
    require 'connect.php';

    if ($conn->connect_error) {
        die("Kết nối CSDL thất bại: " . $conn->connect_error);
    }

    if (isset($_POST['them_san_pham'])) {
        $bike_name = $_POST['bike_name'];
        $frame = $_POST['frame'];
        $frame_size = $_POST['frame_size'];
        $fork = $_POST['fork'];
        $derailleur = $_POST['derailleur'];
        $brakes = $_POST['brakes'];
        $price = $_POST['price'];
        $image_url = $_POST['image_url'];
        $vehicle_type = $_POST['vehicle_type'];
        $sale = $_POST['sale'];
        $sample_image_url = $_POST['sample_image_url'];
        $quantity = $_POST['quantity'];
        $product_description = $_POST['product_description'];
     

        $checkProduct = "SELECT bike_id FROM bikes WHERE bike_name = ?";

        // Sử dụng prepared statement
        $stmt = $conn->prepare($checkProduct);
        $stmt->bind_param('s', $bike_name);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>';
            echo '<script>
            Swal.fire({
                icon: "error",
                title: "Error",
                text: "The product already exists in the database."
            });
        </script>';
        } else {
            $sql = "INSERT INTO bikes (bike_name, frame, frame_size, fork, derailleur, brakes, price, image_url, vehicle_type, sale, sample_image_url, quantity, product_description) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

            $stmt = $conn->prepare($sql);
            $stmt->bind_param('ssssssdssssss', $bike_name, $frame, $frame_size, $fork, $derailleur, $brakes, $price, $image_url, $vehicle_type, $sale, $sample_image_url, $quantity, $product_description);

            if ($stmt->execute()) {
                echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>';
                echo '<script>
                Swal.fire({
                    icon: "success",
                    title: "Success",
                    text: "Added product successfully"
                });
            </script>';
            } else {
                echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>';
                echo '<script>
                Swal.fire({
                    icon: "error",
                    title: "Error",
                    text: "Error when adding product: ' . $conn->error . '"
                });
            </script>';
            }
        }
    }
    ?>
</body>

</html>
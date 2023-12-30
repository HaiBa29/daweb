<?php
require 'connect.php';
?>

<!DOCTYPE html>
<html>

<head>
    <title>Products</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        .no-products {
            color: #FF5733;
            font-size: 20px;
            font-weight: 600;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Products</h1>
        <a class="btn btn-primary" href="../ad.php">Return</a>

        <form method="post" class="my-3">
            <div class="form-group">
                <label for="filter_vehicle_type">Filter by Vehicle Type:</label>
                <select class="form-control" name="filter_vehicle_type" id="filter_vehicle_type">
                    <option value="all">All</option>
                    <option value="Sport bicycle">Sport bicycle</option>
                    <option value="Bicycle racing">Bicycle racing</option>
                    <option value="mountainbike">Mountainbike</option>
                    <option value="Folding bicycles">Folding bicycles</option>
                </select>
            </div>
            <button type="submit" class="btn btn-success">Apply Filter</button>
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $filter_vehicle_type = $_POST["filter_vehicle_type"];

            $sql = "SELECT * FROM bikes";

            if ($filter_vehicle_type !== "all") {
                $sql .= " WHERE vehicle_type = '$filter_vehicle_type'";
            }

            $result = $conn->query($sql);

            if ($result && $result->num_rows > 0) {
                echo '<table class="table">';
                echo '<thead>';
                echo '<tr>';
                echo '<th>bike id</th>';
                echo '<th>bike name</th>';
                echo '<th>frame</th>';
                echo '<th>frame size</th>';
                echo '<th>fork</th>';
                echo '<th>derailleur</th>';
                echo '<th>brakes</th>';
                echo '<th>price</th>';
                echo '<th>image_url</th>';
                echo '<th>admin_id</th>';
                echo '<th>vehicle_type</th>';
                echo '<th>discounted_price</th>';
                echo '<th>sample_image_url</th>';
                echo '<th>quantity</th>';
                echo '<th>product_description</th>';
                echo '<th>sale</th>';
                echo '<th>Actions</th>';
                echo '</tr>';
                echo '</thead>';
                echo '<tbody>';
                while ($row = $result->fetch_assoc()) {
                    echo '<tr>';
                    echo '<td>' . $row['bike_id'] . '</td>';
                    echo '<td>' . $row['bike_name'] . '</td>';
                    echo '<td>' . $row['frame'] . '</td>';
                    echo '<td>' . $row['frame_size'] . '</td>';
                    echo '<td>' . $row['fork'] . '</td>';
                    echo '<td>' . $row['derailleur'] . '</td>';
                    echo '<td>' . $row['brakes'] . '</td>';
                    echo '<td>' . $row['price'] . '</td>';
                    echo '<td><img src="' . $row['image_url'] . '" alt="image" style="max-width: 100px; height: auto;"></td>';
                    echo '<td>' . $row['admin_id'] . '</td>';
                    echo '<td>' . $row['vehicle_type'] . '</td>';
                    echo '<td>' . $row['discounted_price'] . '</td>';
                    echo '<td><img src="' . $row['sample_image_url'] . '" alt="sample_image" style="max-width: 100px; height: auto;"></td>';
                    echo '<td>' . $row['quantity'] . '</td>';
                    echo '<td>' . $row['product_description'] . '</td>';
                    echo '<td>' . $row['sale'] . '</td>';
                    echo '<td>';
                    echo '<a class="btn btn-primary mb-2" href="edit_product.php?id=' . $row['bike_id'] . '">Edit</a>';
                    echo '<a class="btn btn-danger" href="javascript:void(0);" onclick="deleteProduct(' . $row['bike_id'] . ')">Delete</a>';
                    echo '</td>';
                    echo '</tr>';
                }
                echo '</tbody>';
                echo '</table>';
            } else {
                echo '<p class="no-products">No products found for the selected filter.</p>';
            }
        }
        ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        function deleteProduct(bike_id) {
            Swal.fire({
                title: 'Are you sure you want to delete this product?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Delete',
                cancelButtonText: 'Cancel',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    var xhr = new XMLHttpRequest();
                    xhr.onreadystatechange = function() {
                        if (xhr.readyState === 4 && xhr.status === 200) {
                            var response = JSON.parse(xhr.responseText);
                            if (response.status === 'delete success') {
                                Swal.fire({
                                    title: 'Deleted successfully!',
                                    text: response.message,
                                    icon: 'success'
                                }).then(function() {
                                    location.reload();
                                });
                            } else {
                                Swal.fire({
                                    title: 'Error!',
                                    text: 'Error when deleting product: ' + response.message,
                                    icon: 'error'
                                });
                            }
                        }
                    };

                    xhr.open('GET', 'delete_product.php?id=' + bike_id, true);
                    xhr.send();
                }
            });
        }
    </script>
</body>

</html>

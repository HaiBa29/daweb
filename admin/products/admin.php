<?php
require 'connect.php';

if (isset($_POST['search'])) {
    $searchTerm = $_POST['search'];
    $sql = "SELECT * FROM bikes WHERE name LIKE '%$searchTerm%'";
} else {
    $sql = "SELECT * FROM bikes";
}

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>

<head>
    <title>Product management page</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <div class="container">
        <h1 class="mt-4">Product management page</h1>

        <form method="post" class="mb-4">
            <div class="input-group">
                <input type="text" class="form-control" name="search" placeholder="Enter product name...">
                <div class="input-group-append">
                    <button class="btn btn-primary" type="submit">Find</button>
                </div>
            </div>
        </form>

        <?php
        if (isset($_POST['search'])) {
            $searchTerm = $_POST['search'];


            $sql = "SELECT * FROM bikes WHERE bike_name LIKE '%$searchTerm%'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                echo '<h2>Search Results:</h2>';
                echo '<div class="row">';
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="col-md-3 mb-3">';
                    echo '<div class="card">';
                    echo '<img src="' . $row['sample_image_url'] . '" class="card-img-top" alt="product">';
                    echo '<div class="card-body">';
                    echo '<h5 class="card-title">' . $row['bike_name'] . '</h5>';
                    echo '<p class="card-text">Loại: ' . $row['vehicle_type'] . '</p>';
                    echo '<p class="card-text">Giá Gốc: $' . $row['price'] . '</p>';
                    echo '<p class="card-text">Giá KM: $' . $row['discounted_price'] . '</p>';
                    echo '</div>';
                    echo '<div class="card-footer">';
                    echo '<a class="btn btn-primary mr-2" href="/admin/products/edit_product.php?id=' . $row['bike_id'] . '">Edit</a>';
                    echo '<a class="btn btn-danger" href="javascript:void(0);" onclick="deleteProduct(' . $row['bike_id'] . ')">Delete</a>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                }
                echo '</div>';
            } else {
                echo '<p>No product found.</p>';
            }
        }
        ?>

        <a href="products/all_products.php" class="btn btn-primary">Filter Products By Type</a>
        <a class="btn btn-success" href="products/insert_product.php">Add products</a>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        function deleteProduct(id) {
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

                    xhr.open('GET', 'delete_product.php?bike_id=' + bike_id, true);
                    xhr.send();
                }
            });
        }
        
    </script>

</body>

</html>
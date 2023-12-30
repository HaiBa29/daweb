<?php
require __DIR__ . '/../../accessory/connect.php';
?>

<!DOCTYPE html>
<html>

<head>
    <title>All Accessory</title>
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
        <h1>All Accessory</h1>
        <a class="btn btn-primary" href="../ad.php">Return</a>

        <?php
        $sql = "SELECT * FROM accessory";

        $result = $conn->query($sql);

        if ($result && $result->num_rows > 0) {
            echo '<table class="table">';
            echo '<thead>';
            echo '<tr>';
            echo '<th>Accessory ID</th>';
            echo '<th>Product Title</th>';
            echo '<th>Old Price</th>';
            echo '<th>Price</th>';
            echo '<th>discount</th>';
            echo '<th>new</th>';
            echo '<th>created_at</th>';
            echo '<th>updated_at</th>';
            echo '<th>image</th>';
            echo '</tr>';
            echo '</thead>';
            echo '<tbody>';
            while ($row = $result->fetch_assoc()) {
                echo '<tr>';
                echo '<td>' . (isset($row['id_product']) ? $row['id_product'] : '') . '</td>';
                echo '<td>' . (isset($row['product_title']) ? $row['product_title'] : '') . '</td>';
                echo '<td>' . (isset($row['old_price']) ? $row['old_price'] : '') . '</td>';
                echo '<td>' . (isset($row['price']) ? $row['price'] : '') . '</td>';
                echo '<td>' . (isset($row['discount']) ? $row['discount'] : '') . '</td>';
                echo '<td>' . (isset($row['new']) ? $row['new'] : '') . '</td>';
                echo '<td>' . (isset($row['created_at']) ? $row['created_at'] : '') . '</td>';
                echo '<td>' . (isset($row['updated_at']) ? $row['updated_at'] : '') . '</td>';
                
                if (isset($row['url'])) {
                    echo '<td><img src="' . $row['url'] . '" alt="image" style="max-width: 100px; height: auto;"></td>';
                } else {
                    echo '<td></td>';
                }

                echo '<td>';
                echo '<a class="btn btn-primary mb-2" href="/admin/accessory/edit_accessory.php?id_product=' . (isset($row['id_product']) ? $row['id_product'] : '') . '">Edit</a>';
                echo '<a class="btn btn-danger" href="javascript:void(0);" onclick="deleteProduct(' . (isset($row['id_product']) ? $row['id_product'] : '') . ')">Delete</a>';
                echo '</td>';
                echo '</tr>';
            }
            echo '</tbody>';
            echo '</table>';
        } else {
            echo '<p class="no-products">No products found.</p>';
        }
        ?>
    </div>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        function deleteProduct(id_product) {
            Swal.fire({
                title: 'Do you want to delete this accessory?',
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
                                    text: 'Error while deleting accessories: ' + response.message,
                                    icon: 'error'
                                });
                            }
                        }
                    };

                    xhr.open('GET', 'delete_accessory.php?id_product=' + id_product, true);
                    xhr.send();
                }
            });
        }
    </script>
</body>

</html>

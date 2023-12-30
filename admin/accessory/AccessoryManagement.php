<?php
require __DIR__ . '/../../accessory/connect.php';

$accessorySearchTerm = isset($_POST['search']) ? $_POST['search'] : '';

if (!empty($accessorySearchTerm)) {
    $sql = "SELECT * FROM accessory WHERE product_title LIKE '%$accessorySearchTerm%'";
    $result = $conn->query($sql);
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Accessories management page</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <div class="container">
        <h1 class="mt-4">Accessories management page</h1>

        <form method="post" class="mb-4">
            <div class="input-group">
                <input type="text" class="form-control" name="search" placeholder="Enter the accessory name..." value="<?= htmlspecialchars($accessorySearchTerm) ?>">
                <div class="input-group-append">
                    <button class="btn btn-primary" type="submit" id="fa" >Find</button>
                </div>
            </div>
        </form>

        <?php if (!empty($accessorySearchTerm)) : ?>
            <?php if ($result->num_rows > 0) : ?>
                <h2>Search Results:</h2>
                <div class="row">
                    <?php while ($row = $result->fetch_assoc()) : ?>
                        <div class="col-md-3 mb-3">
                            <div class="card">
                                <img src="<?= htmlspecialchars($row['url']) ?>" class="card-img-top" alt="product">
                                <div class="card-body">
                                    <h5 class="card-title"><?= htmlspecialchars($row['product_title']) ?></h5>
                                    <p class="card-text">Original Price: $<?= htmlspecialchars($row['old_price']) ?></p>
                                    <p class="card-text">Promotional price: $<?= htmlspecialchars($row['price']) ?></p>
                                </div>
                                <div class="card-footer">
                                    <a class="btn btn-primary mr-2" href="/admin/accessory/edit_accessory.php?id_product=<?= htmlspecialchars($row['id_product']) ?>">Edit</a>
                                    <a class="btn btn-danger" href="javascript:void(0);" onclick="deleteProduct(<?= htmlspecialchars($row['id_product']) ?>)">Delete</a>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            <?php else : ?>
                <p>No product found.</p>
            <?php endif; ?>
        <?php endif; ?>

        <a href="accessory/all_accessory.php" class="btn btn-primary">View All Accessories</a>
        <a class="btn btn-success" href="accessory/insert_accessory.php">Add products</a>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
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
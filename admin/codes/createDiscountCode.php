<?php
$db_host = 'localhost';
$db_user = 'root';
$db_password = '';
$db_name = 'taikhoan';

$conn = new mysqli($db_host, $db_user, $db_password, $db_name);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

function generateDiscountCode()
{
    $length = 8;
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $code = '';

    for ($i = 0; $i < $length; $i++) {
        $code .= $characters[rand(0, strlen($characters) - 1)];
    }

    return $code;
}

function createDiscountCode($percentage, $expirationDatetime)
{
    global $conn;

    $code = generateDiscountCode();
    $currentDatetime = date('Y-m-d H:i:s');
    $status = ($expirationDatetime >= $currentDatetime) ? 'Active' : 'Expired';

    $sql = "INSERT INTO discount_codes (code, percentage, expiration_datetime, status) VALUES ('$code', $percentage, '$expirationDatetime', '$status')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>
            var generatedCode = '$code';
            Swal.fire({
                icon: 'success',
                title: 'Discount code created successfully!',
                text: 'Code: ' + generatedCode,
            }).then(function() {
                window.location.href = 'ad.php';
            });
        </script>";
    } else {
        echo "<script>
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Error creating discount code: " . $conn->error . "',
            });
        </script>";
    }
}

// Kiểm tra xem biểu mẫu đã được gửi hay chưa
if (isset($_POST['createDiscountCode'])) {
    // Lấy dữ liệu từ biểu mẫu và thực hiện xử lý
    $discountPercentage = $_POST["discountPercentage"];
    $expirationDate = $_POST["expirationDate"];
    $expirationTime = $_POST["expirationTime"];

    $expirationDatetime = $expirationDate . ' ' . $expirationTime;

    // Gọi hàm để tạo mã
    createDiscountCode($discountPercentage, $expirationDatetime);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Discount Codes</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</head>

<body>
    <div class="container">
        <h2>Create Discount Codes</h2>
        <form method="post" action="">
            <div class="form-group">
                <label for="discountPercentage">Discount Percentage:</label>
                <input type="number" class="form-control" id="discountPercentage" name="discountPercentage" min="1" max="100" required>
            </div>
            <div class="form-group">
                <label for="expirationDate">Expiration Date:</label>
                <input type="date" class="form-control" id="expirationDate" name="expirationDate" required>
            </div>
            <div class="form-group">
                <label for="expirationTime">Expiration Time:</label>
                <input type="time" class="form-control" id="expirationTime" name="expirationTime" required>
            </div>

            <button type="submit" class="btn btn-primary" name="createDiscountCode">Create Discount Code</button>
        </form>
        <h2>Discount Codes</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Code</th>
                    <th>Percentage</th>
                    <th>Expiration Date</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM discount_codes";
                $result = $conn->query($sql);

                if ($result && $result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['id'] . "</td>";
                        echo "<td>" . $row['code'] . "</td>";
                        echo "<td>" . $row['percentage'] . "</td>";
                        echo "<td>" . $row['expiration_datetime'] . "</td>";
                        echo "<td>" . $row['status'] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>No discount codes found.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>

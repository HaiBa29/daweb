<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Management</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <style>
        body {
            font-family: "Gill Sans", sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
        }

        .container {
            padding: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            font-size: 12px;
        }

        table,
        th,
        td {
            border: 1px solid #ddd;
        }

        th,
        td {
            padding: 15px;
            text-align: left;
        }

        th {
            background-color: #4F6F52;
            color: aliceblue;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .action-icons {
            display: flex;
            flex-direction: column;
        }

        .action-icons i {
            cursor: pointer;
            margin-bottom: 10px;
            font-size: 32px;
            padding: 5px;
            margin: auto;
            display: block;
        }

        .action-icons i.cancel {
            color: red;
        }

        .action-icons i.approve {
            color: green;
        }

        .action-text {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }

        .action-text i {
            margin-right: 5px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Order Management</h2>
        <table>
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>User ID</th>
                    <th>Customer Name</th>
                    <th>Bike Name</th>
                    <th>Quantity</th>
                    <th>Order Date</th>
                    <th>Address</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Payment Method</th>
                    <th>Total Amount</th>
                    <th>Approved</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "taikhoan";

                $conn = new mysqli($servername, $username, $password, $dbname);

                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    // Nhận cartId từ yêu cầu POST
                    $cartId = $_POST["cartId"];

                    // Kiểm tra xem đây là yêu cầu duyệt hay xóa
                    if (isset($_POST["action"])) {
                        if ($_POST["action"] == "approve") {
                            // Yêu cầu duyệt đơn hàng
                            $sql = "UPDATE order_details SET approved = 1 WHERE cart_id = $cartId";

                            if ($conn->query($sql) === TRUE) {
                                echo "Order approved successfully";
                            } else {
                                echo "Error approving order: " . $conn->error;
                            }
                        } elseif ($_POST["action"] == "cancel") {
                            // Yêu cầu hủy đơn hàng
                            $sql = "DELETE FROM order_details WHERE cart_id = $cartId";

                            if ($conn->query($sql) === TRUE) {
                                echo "Order cancelled successfully";
                            } else {
                                echo "Error cancelling order: " . $conn->error;
                            }
                        }
                    }
                }

                // Truy vấn cơ sở dữ liệu để lấy thông tin từ bảng order_details
                $sql = "SELECT * FROM order_details";
                $result = $conn->query($sql);

                // Kiểm tra và hiển thị dữ liệu
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>{$row['cart_id']}</td>";
                        echo "<td>{$row['id']}</td>";
                        echo "<td>{$row['customer_name']}</td>";
                        echo "<td></td>";
                        echo "<td>{$row['quantity']}</td>";
                        echo "<td>{$row['created_at']}</td>";
                        echo "<td>{$row['customer_address']}</td>";
                        echo "<td>{$row['customer_phone']}</td>";
                        echo "<td>{$row['customer_email']}</td>";
                        echo "<td>{$row['payment_method']}</td>";
                        echo "<td>{$row['total_amount']}</td>";
                        echo "<td>{$row['approved']}</td>";
                        echo '<td class="action-icons">';
                        echo '<i class="bx bxs-x-square bx-tada" onclick="cancelOrder(' . $row['cart_id'] . ')" style="color: #EE7214;"></i>';

                        // Kiểm tra xem đã được duyệt chưa
                        if ($row['approved'] == 0) {
                            echo '<i class="bx bx-check-square bx-tada" onclick="approveOrder(' . $row['cart_id'] . ')" style="color: #5FBDFF;"></i>';
                            echo '<form id="approveForm' . $row['cart_id'] . '" method="post" action=""><input type="hidden" name="cartId" value="' . $row['cart_id'] . '"><input type="hidden" name="action" value="approve"></form>';
                        }

                        echo '<form id="cancelForm' . $row['cart_id'] . '" method="post" action=""><input type="hidden" name="cartId" value="' . $row['cart_id'] . '"><input type="hidden" name="action" value="cancel"></form>';
                        echo '</td>';
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='13'>No orders found</td></tr>";
                }

                // Đóng kết nối
                $conn->close();
                ?>
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        function cancelOrder(cartId) {
            Swal.fire({
                title: 'Are you sure?',
                text: 'You won\'t be able to revert this!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, cancel it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Gửi yêu cầu POST để hủy đơn hàng
                    document.getElementById('cancelForm' + cartId).submit();
                }
            });
        }

        function approveOrder(cartId) {
            Swal.fire({
                title: 'Are you sure?',
                text: 'You want to approve this order?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#28a745',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, approve it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Gửi yêu cầu POST để duyệt đơn hàng
                    document.getElementById('approveForm' + cartId).submit();
                }
            });
        }
    </script>

</body>

</html>

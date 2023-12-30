<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <link rel="stylesheet" href="dashboard.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body>
    <div class="app-main">
        <div class="main-header-line">

            <h1>Admin Management</h1>

        </div>
        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "taikhoan";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Hàm truy vấn và lấy dữ liệu từ CSDL
        function fetchData($conn, $query)
        {
            $result = $conn->query($query);

            if ($result && $result->num_rows > 0) {
                return $result->fetch_all(MYSQLI_ASSOC);
            } else {
                return false;
            }
        }

        // Truy vấn dữ liệu cho Total Order
        $totalOrderQuery = "SELECT COUNT(DISTINCT cart_id) as total_order FROM order_details";
        $totalOrderData = fetchData($conn, $totalOrderQuery);

        // Lấy giá trị tổng số đơn hàng
        $totalOrderCount = $totalOrderData[0]['total_order'];

        // Câu truy vấn để đếm số lượng đơn hàng được approved
        $orderApprovedQuery = "SELECT COUNT(*) as order_approved FROM order_details WHERE approved = 1";
        $orderApprovedData = fetchData($conn, $orderApprovedQuery);

        // Lấy giá trị tổng số đơn hàng được approved
        $orderApprovedCount = $orderApprovedData[0]['order_approved'];

        // Câu truy vấn để tính tổng giá trị trong trường total_amount cho các đơn hàng được approved
        $totalProfitQuery = "SELECT SUM(total_amount) as total_profit FROM order_details WHERE approved = 1";
        $totalProfitData = fetchData($conn, $totalProfitQuery);

        // Lấy giá trị tổng total_amount
        $totalProfit = $totalProfitData[0]['total_profit'];

        // Đóng kết nối CSDL
        $conn->close();
        ?>

        <div class="chart-row three">
            <div class="chart-container-wrapper">
                <div class="chart-container">
                    <div class="chart-info-wrapper">
                        <h2>Total Order</h2>
                        <i class='bx bxs-cylinder'></i>
                        <span><?php echo $totalOrderCount; ?></span>
                    </div>
                    <div class="chart-svg">

                    </div>
                </div>
            </div>
            <div class="chart-container-wrapper">
                <div class="chart-container">
                    <div class="chart-info-wrapper">
                        <h2>Order Approved</h2>
                        <i class='bx bxs-edit-alt'></i>
                        <span><?php echo $orderApprovedCount; ?></span>
                    </div>
                    <div class="chart-svg">

                    </div>
                </div>
            </div>
            <div class="chart-container-wrapper">
                <div class="chart-container">
                    <div class="chart-info-wrapper">
                        <h2>Total Profit</h2>
                        <i class='bx bxs-wallet'></i>
                        <span><?php echo $totalProfit; ?></span>
                    </div>
                    <div class="chart-svg">

                    </div>
                </div>
            </div>
        </div>

        <?php
        // Kết nối đến CSDL
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "taikhoan";
        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }


        // Truy vấn dữ liệu tất cả các đơn hàng
        $allOrdersQuery = "SELECT * FROM order_details";
        $allOrdersData = fetchData($conn, $allOrdersQuery);
        ?>

        <div class="chart-row two">
            <div class="chart-container-wrapper big">
                <div class="chart-container">
                    <div class="chart-container-header">
                        <h2>All Orders</h2>
                        <span>Last 30 days</span>
                    </div>

                    <div class="order-list">
                        <table class="order-table">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th><i class='bx bxs-paint'></i>ID</th>
                                    <th><i class='bx bx-info-circle'></i>Name</th>
                                    <th><i class='bx bx-cart-alt'></i>Quantity</th>
                                    <th><i class='bx bx-timer'></i>Time Order</th>
                                    <th><i class='bx bx-calendar-check'></i>Status</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                // Hiển thị thông tin đơn hàng
                                foreach ($allOrdersData as $order) {
                                    $status = $order['approved'] ? 'Approved' : 'Not Approved';
                                    echo '<tr>';
                                    echo '<td class="' . ($status === 'Approved' ? 'viewed' : 'not-viewed') . ' table-cell"><i class="bx bx-cool bx-tada" ></i></td>';
                                    echo '<td class="' . ($status === 'Approved' ? 'viewed' : 'not-viewed') . ' table-cell">' . $order['id'] . '</td>';
                                    echo '<td class="' . ($status === 'Approved' ? 'viewed' : 'not-viewed') . ' table-cell">' . $order['customer_name'] . '</td>';

                                    echo '<td class="' . ($status === 'Approved' ? 'viewed' : 'not-viewed') . ' table-cell">' . $order['created_at'] . '</td>';
                                    echo '<td class="tt ' . ($status === 'Approved' ? 'viewed' : 'not-viewed') . ' table-cell">' . $status . '</td>';
                                    echo '</tr>';
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>


                <div class="chart-data-details">
                    <div class="chart-details-header"></div>
                </div>
            </div>
        </div>
    </div>


    <?php
    // Đóng kết nối CSDL
    $conn->close();
    ?>
    </div>
    </div>
</body>

</html>
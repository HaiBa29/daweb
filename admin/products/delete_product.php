<?php
require 'connect.php';


if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM bikes WHERE bike_id = $id";

    $response = array(); 

    if ($conn->query($sql) === TRUE) {
        $response['status'] = 'delete success';
        $response['message'] = 'The product has been successfully deleted';
    } else {
        $response['status'] = 'delete error';
        $response['message'] = 'Error when deleting product: ' . $conn->error;
    }

    echo json_encode($response);
}
?>

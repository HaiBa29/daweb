<?php
require __DIR__ . '/../../accessory/connect.php';

if (isset($_GET['id_product'])) {
    $id_product = $_GET['id_product']; 

    $sql = "DELETE FROM accessory WHERE id_product = $id_product";

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

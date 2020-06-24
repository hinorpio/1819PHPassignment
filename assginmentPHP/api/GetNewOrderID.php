<?php

session_start();
require_once('conn.php');

$sql = "SELECT Max(orderId) FROM `orders`";

$rs = mysqli_query($conn, $sql) or die(mysqli_error($conn));


if($row = $rs->fetch_array()) {
    $result = $row;
}

echo json_encode($result[0]+1);

?>
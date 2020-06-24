<?php
session_start();
require_once('conn.php');

$orderID = $_GET['orderID'];
$sql = "SELECT orderpart.orderID, orderpart.partNumber, orderpart.quantity, orderPart.price, part.partName, part.stockQuantity, part.stockPrice FROM `orderpart` INNER JOIN `part` ON orderpart.partNumber=part.partNumber WHERE orderpart.orderID ='$orderID'";
$rs = mysqli_query($conn, $sql) or die(mysqli_error($conn));

$i = 0;

while ($row = $rs->fetch_assoc()) {
    $result[$i] = $row;
    $result[$i]['updateQty'] = $result[$i]['stockQuantity'] - $result[$i]['quantity'];
    $result[$i]['cancelQty'] = $result[$i]['stockQuantity'] + $result[$i]['quantity'];
    $result[$i]['src'] = '../asset/image/part/' . $row['partNumber'] . ".jpg" ;
    $i++;
}

echo json_encode($result);
?>


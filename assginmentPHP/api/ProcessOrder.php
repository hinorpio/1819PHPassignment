<?php
session_start();
require_once('conn.php');

$orderID = $_GET["orderID"];

$sql1 = "SELECT orderPart.partNumber, orderPart.quantity, part.stockQuantity FROM `orderpart` INNER JOIN `part` ON orderpart.partNumber=part.partNumber WHERE orderpart.orderID='$orderID'";

$rs1 = mysqli_query($conn, $sql1) or die(mysqli_error($conn));

while ($row = $rs1->fetch_assoc()) {
    $qty = $row['quantity'];
    $stockQTY = $row['stockQuantity'];
    $newQTY = $stockQTY - $qty;
    $partNO = $row['partNumber'];
    $status = 1;
    if($newQTY == 0){
        $status = 2;
    }else{
        $status = 1;
    }
    $sql2 = "UPDATE `part` SET `stockQuantity` = '$newQTY', `stockStatus` = '$status' WHERE `partNumber`='$partNO'";
    $rs2 = mysqli_query($conn, $sql2) or die(mysqli_error($conn));
    if (mysqli_affected_rows($conn) > 0) {
        echo 0;
    }else{
        echo 1;
    }
}


   $sql  = "UPDATE `orders` SET status = 2 WHERE orderID = '$orderID'"; 

    if ($conn->query($sql) === TRUE) {

    }else{
        echo 1;//fail
    }


?>
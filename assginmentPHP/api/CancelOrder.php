<?php
session_start();
require_once('conn.php');

$orderID = $_GET["orderID"];

$sql1 = "SELECT orderPart.partNumber, orderPart.quantity, part.stockQuantity FROM `orderpart` INNER JOIN `part` ON orderpart.partNumber=part.partNumber WHERE orderpart.orderID='$orderID'";

$rs1 = mysqli_query($conn, $sql1) or die(mysqli_error($conn));

while ($row = $rs1->fetch_assoc()) {
    $qty = $row['quantity'];
    $stockQTY = $row['stockQuantity'];
    $newQTY = $qty + $stockQTY;
    $partNO = $row['partNumber'];
    $sql2 = "UPDATE `part` SET `stockQuantity` = '$newQTY' WHERE `partNumber`='$partNO'";
    $rs2 = mysqli_query($conn, $sql2) or die(mysqli_error($conn));
    if (mysqli_affected_rows($conn) > 0) {
        echo 0;
    }else{
        echo 1;
    }
}


   $sql  = "UPDATE `orders` SET status = 4 WHERE orderID = '$orderID'"; 

    if ($conn->query($sql) === TRUE) {
        
    }else{
        echo 1;//fail
    }

?>
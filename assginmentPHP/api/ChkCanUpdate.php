<?php
session_start();
require_once('conn.php');

$orderID = $_GET['orderID'];
$sql = "SELECT orderpart.partNumber, orderpart.quantity, part.stockQuantity FROM `orderpart` INNER JOIN `part` ON orderpart.partNumber=part.partNumber WHERE orderpart.orderID ='$orderID'";
$rs = mysqli_query($conn, $sql) or die(mysqli_error($conn));

$i = 0;

while ($row = $rs->fetch_assoc()) {
    $result[$i] = $row;
    $result[$i]['updateQty'] = $result[$i]['stockQuantity'] - $result[$i]['quantity'];
    $i++;
}

$j = 0;
$canUpdate = true;

while($j < count($result)){
    if($result[$j]['updateQty'] < 0){
        $canUpdate = false;
        break;
    }
    $j++;
}

if($canUpdate == true){
    echo 0;
}else{
    echo 1;
}

?>


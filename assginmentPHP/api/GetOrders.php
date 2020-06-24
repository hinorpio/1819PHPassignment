<?php
session_start();
require_once('conn.php');
$email = $_SESSION['email'];
$sql = "SELECT orders.orderID, orders.date, orders.deliveryAddress, orders.status, SUM(orderPart.price) FROM `orders` INNER JOIN `orderPart` ON orders.orderID=orderPart.orderID WHERE orders.dealerID ='$email' GROUP BY orders.orderID";
$rs = mysqli_query($conn, $sql) or die(mysqli_error($conn));

$i = 0;

while ($row = $rs->fetch_assoc()) {
    $Order[$i] = $row;
    $Order[$i]['price'] = $Order[$i]['SUM(orderPart.price)'];
    if($Order[$i]['status'] == 1){
        $Order[$i]['statement'] = "In Processing";
    }elseif($Order[$i]['status'] == 2){
        $Order[$i]['statement'] = "Delivery";
    }elseif($Order[$i]['status'] == 3){
        $Order[$i]['statement'] = "Completed";
    }else{
        $Order[$i]['statement'] = "Canceled";
    }
    $i++;
}



echo json_encode($Order);
?>


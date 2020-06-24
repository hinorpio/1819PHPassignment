<?php

require_once('conn.php');
session_start();

$newID = $_POST['newID'];
$dealerID = $_POST['dealerID'];
$date = date("Y-m-d");
$address = $_POST['address'];

$sql1 = "INSERT INTO `orders` (`orderID`, `dealerID`, `date`, `deliveryAddress`, `status`) VALUES ('$newID', '$dealerID', '$date', '$address', 1)";
// insert the parent table
$rs = mysqli_query($conn, $sql1) or die(mysqli_error($conn));

if (mysqli_affected_rows($conn) > 0) {
    echo 0; //success
}else{
    echo 1; //fail
}

echo "<br /><br />";

$i = 0;

while (isset($_SESSION['cart'][$i])) {

    $newQty = $_SESSION['cart'][$i]['stockQuantity'] - $_SESSION['cart'][$i]['qty'];
    $partNumber = $_SESSION['cart'][$i]['partNumber'];
    $qty = $_SESSION['cart'][$i]['qty'];
    $totalPrice = $_SESSION['cart'][$i]['totalPrice'];

    $sql2 = "INSERT INTO `orderpart` (`orderID`, `partNumber`, `quantity`, `price`) VALUES ('$newID', '$partNumber', '$qty', '$totalPrice')";
    //insert the child table
    $rs = mysqli_query($conn, $sql2) or die(mysqli_error($conn));

    if (mysqli_affected_rows($conn) > 0) {
        echo 0; //success   
        echo "<br />";
        if($newQty == 0){
            $stockStatus = 2;
        }else{
            $stockStatus = 1;
        }

    }else{
        echo 1; //fail
    }
    $i++;
}

unset($_SESSION['cart']);

?>
<?php
session_start();
require_once('conn.php');


$partNumber = $_POST["partNumber"];
$partName = $_POST["partName"];
$stockPrice = $_POST["stockPrice"];
$stockQuantity = $_POST["stockQuantity"];
$qty = $_POST["qty"];
$totalPrice = number_format($stockPrice*$qty, 2, '.', '');
$index;
$i=0;
while(isset($_SESSION['cart'][$i])){
    $i++;
}

$item['src'] = "../asset/image/part/$partNumber.jpg";
$item['partNumber'] = $partNumber;
$item['partName'] = $partName;
$item['stockPrice'] = $stockPrice;
$item['stockQuantity'] = $stockQuantity;
$item['totalPrice'] = $totalPrice;
$item['qty'] = $qty;

array_push($_SESSION['cart'],$item);

$_SESSION['cart'] = array_values($_SESSION['cart']);

print json_encode($item);


?>
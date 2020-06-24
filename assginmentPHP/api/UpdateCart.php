<?php

require_once('conn.php');
session_start();

$totalPrice= $_POST['totalPrice'];
$qty= $_POST['qty'];
$index = $_POST['index'];   
$newPrice;

    $_SESSION['cart'][$index]['qty'] = $qty;
    $_SESSION['cart'][$index]['totalPrice'] = $totalPrice;

    echo json_encode($_SESSION['cart'][$index]);


?>
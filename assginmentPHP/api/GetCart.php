<?php

session_start();
if(isset($_SESSION['cart'])){
    $i=0;
    $cart = [];
    while($i < sizeof($_SESSION['cart'])){
        $cart[$i]['partName'] = $_SESSION['cart'][$i]['partName']; 
        $cart[$i]['partNumber'] = $_SESSION['cart'][$i]['partNumber']; 
        $cart[$i]['qty'] = $_SESSION['cart'][$i]['qty'];
        $cart[$i]['stockPrice'] = $_SESSION['cart'][$i]['stockPrice'];  
        $cart[$i]['stockQuantity'] = $_SESSION['cart'][$i]['stockQuantity']; 
        $cart[$i]['totalPrice'] = $_SESSION['cart'][$i]['totalPrice']; 
    }

}else{
    echo 1;
}



echo json_encode($cart);
?>


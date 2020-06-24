<?php
session_start();

$index = $_POST["index"];

print json_encode($index);

unset($_SESSION['cart'][$index]);

$_SESSION['cart'] = array_values($_SESSION['cart']);

?>
<?php
session_start();
require_once('conn.php');

$orderID = $_GET["orderID"];

$sql  = "UPDATE `orders` SET status = 3 WHERE orderID = '$orderID'"; 

if ($conn->query($sql) === TRUE) {

}else{
    echo 1;//fail
}
?>
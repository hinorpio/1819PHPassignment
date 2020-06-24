<?php
session_start();
require_once('conn.php');
$email = $_SESSION['email'];
$sql = "SELECT * FROM `administrator` WHERE email='$email'";
$rs = mysqli_query($conn, $sql) or die(mysqli_error($conn));
if($row = $rs->fetch_assoc()){
    $Profile=$row;
}

echo json_encode($Profile);

?>
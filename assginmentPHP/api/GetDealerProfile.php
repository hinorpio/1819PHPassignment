<?php
session_start();
require_once('conn.php');
$email = $_SESSION['email'];
$sql = "SELECT * FROM dealer WHERE dealerID='$email'";
$rs = mysqli_query($conn, $sql) or die(mysqli_error($conn));
if($row = $rs->fetch_assoc()){
    $Profile=$row;
    $Profile['src'] = "../asset/image/user/Dealer/$email.jpg";
}

echo json_encode($Profile);

?>
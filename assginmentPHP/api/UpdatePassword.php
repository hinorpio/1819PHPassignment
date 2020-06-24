<?php
session_start();
extract($_POST);
$email = $_SESSION['email'];
require_once('conn.php');
$sql = "SELECT * FROM dealer WHERE dealerID = '$email'";
$rs = mysqli_query($conn, $sql);
if ($rc = mysqli_fetch_assoc($rs)) {
    if ($rc['password'] == $oldPassword) {
        $sql = "UPDATE dealer SET password = '$confirmPassword' WHERE dealerID = '$email'";
        mysqli_query($conn, $sql) or die(mysqli_error($conn));
        if (mysqli_affected_rows($conn) > 0) {
            echo '0';
        } else {
            echo '1';
        }
    } else {
        echo '2';
    }
}
?>
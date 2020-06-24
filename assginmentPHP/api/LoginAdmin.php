<?php
session_start();
require_once('conn.php');

$email = $_POST["email"];
$pwd = $_POST["pwd"];

			$sql = "SELECT * FROM administrator WHERE email='$email' and password='$pwd'";
			$rs = mysqli_query($conn,$sql);
			if ($rc = mysqli_fetch_assoc($rs)) {
				$_SESSION['email']=$rc['email'];
				echo 1;
			} else {
				echo 0;
			}
	
?>
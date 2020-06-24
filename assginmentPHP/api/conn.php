<?php

$hostname = "127.0.0.1";
$port = 3306;
$database = "projectDB";
$username = "root";
$password = "";


$conn = new mysqli("$hostname:$port", $username, $password, $database) or die($conn->error);

?>
<?php

session_start();
require_once('conn.php');
$i=0;
$j=0;


$sql = "SELECT `partNumber`, `partName`, `stockPrice` FROM `part` ORDER BY `partNumber` DESC LIMIT 6";

$rs = mysqli_query($conn, $sql) or die(mysqli_error($conn));

while ($row = $rs->fetch_array()) {
    $latest[$i] = $row;
    $latest[$i]['src'] = '../asset/image/part/' . $row['partNumber'] . ".jpg" ;
    $i++;
}


echo json_encode($latest);

?>
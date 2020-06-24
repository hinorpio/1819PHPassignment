<?php
session_start();
require_once('conn.php');
$sql = "SELECT * FROM part";
$i=0;
$rs = mysqli_query($conn, $sql) or die(mysqli_error($conn));

$_SESSION['cart'] = array();

while ($row = $rs->fetch_assoc()) {
    $PartList[$i] = $row;
    if($PartList[$i]['stockStatus'] == 2){
        $PartList[$i]['statement'] = 'Unavailable';
    }else{
        $PartList[$i]['statement'] = 'Available';
    }
    $PartList[$i]['qty'] = 0;
    $src = $PartList[$i]['partNumber'];
    $PartList[$i]['src'] = "../asset/image/part/$src.jpg";
    $i++;
}

echo json_encode($PartList);

?>
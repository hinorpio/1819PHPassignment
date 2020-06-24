<?php
session_start();
extract($_POST);

require_once('conn.php');
$newStockPrice = number_format((float)$stockPrice, 2, '.', '');
$sql = "UPDATE `part` SET `email` = '$email', `partName` = '$partName', `stockQuantity` = '$stockQuantity', `stockPrice` = '$stockPrice', `stockStatus` = '$stockStatus' WHERE `partNumber` = '$partNumber'";
$rs = mysqli_query($conn, $sql);
if(isset($_FILES['photo'])){
    if(!is_dir('../asset/image/part/')){
        mkdir('../asset/image/part/',0755,true);
    }
    $_FILES['photo']['name'] = $partNumber;
    $targetLocation = "../asset/image/part/" . $_FILES['photo']['name'];
    unlink($targetLocation.'.jpg');
    copy($_FILES['photo']['tmp_name'], $targetLocation.'.jpg');
}
mysqli_query($conn, $sql) or die(mysqli_error($conn));
if (mysqli_affected_rows($conn) > 0) {
    echo '0';
} else {
    echo '1';
}
?>
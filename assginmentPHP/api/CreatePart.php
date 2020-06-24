<?php
session_start();
extract($_POST);

require_once('conn.php');
$newStockPrice = number_format((float)$stockPrice, 2, '.', '');
$sql = "INSERT INTO `part` (`partNumber`, `email`, `partName`, `stockQuantity`, `stockPrice`, `stockStatus`) VALUES ('$partNumber', '$email', '$partName', '$stockQuantity', '$stockPrice', '$stockStatus')";
$rs = mysqli_query($conn, $sql);
if(isset($_FILES['photo'])){
    if(!is_dir('../asset/image/part/')){
        mkdir('../asset/image/part/',0755,true);
    }
    $_FILES['photo']['name'] = $partNumber;
    $targetLocation = "../asset/image/part/" . $_FILES['photo']['name'];
    copy($_FILES['photo']['tmp_name'], $targetLocation.'.jpg');
}else{
    if(!is_dir('../asset/image/part/')){
        mkdir('../asset/image/part/',0755,true);
    }
    $_FILES['photo']['name'] = $partNumber;
    $targetLocation = "../asset/image/part/" . $_FILES['photo']['name'];
    copy("../asset/image/part/0.jpg", $targetLocation.'.jpg');
}
if (mysqli_affected_rows($conn) > 0) {
    echo '0';
} else {
    echo '1';
}
?>
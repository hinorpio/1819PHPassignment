<?php

require_once('conn.php');
session_start();
extract($_POST);

$sql1 = "INSERT INTO `dealer` (`dealerID`, `password`, `name`, `phoneNumber`, `address`) VALUES ('$registerEmail', '$registerPwd', '$registerName', '$registerPhone', '$registerAddress')";
// insert the parent table
$rs = mysqli_query($conn, $sql1) or die(mysqli_error($conn));

if(isset($_FILES['photo'])){

    if(!is_dir('../asset/image/user/Dealer/')){
        mkdir('../asset/image/user/Dealer/',0755,true);
    }

    $_FILES['photo']['name'] = $registerEmail;
    $targetLocation = "../asset/image/user/Dealer/" . $_FILES['photo']['name'];
    copy($_FILES['photo']['tmp_name'], $targetLocation.'.jpg');

}else{

    if(!is_dir('../asset/image/user/Dealer/')){
        mkdir('../asset/image/user/Dealer/',0755,true);
    }

    $_FILES['photo']['name'] = $registerEmail;
    $targetLocation = "../asset/image/user/Dealer/" . $_FILES['photo']['name'];
    copy('../asset/image/user/Dealer/0.jpg', $targetLocation.'.jpg');

}

if (mysqli_affected_rows($conn) > 0) {
    echo 0; //success
}else{
    echo 1; //fail
}

  

?>
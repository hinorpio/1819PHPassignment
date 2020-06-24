<?php

require_once('conn.php');
session_start();
extract($_POST);
$sql = "UPDATE `dealer` SET `name`='$name',`phoneNumber`='$phone',`address`='$address' WHERE `dealerID`='$email'";
$rs = mysqli_query($conn, $sql) or die(mysqli_error($conn));


if (mysqli_affected_rows($conn) > 0) {
    
    if(isset($_FILES['photo'])){

        if(!is_dir('../asset/image/user/Dealer/')){
            mkdir('../asset/image/user/Dealer/',0755,true);
        }

        $_FILES['photo']['name'] = $email;
        $targetLocation = "../asset/image/user/Dealer/" . $_FILES['photo']['name'];
        copy($_FILES['photo']['tmp_name'], $targetLocation.'.jpg');
    }
    echo 0;
}else{
    echo 1;
}
?>
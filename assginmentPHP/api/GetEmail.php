<?php

session_start();
if(isset($_SESSION['email'])){
    echo $_SESSION['email'];
}else{
    echo 1;
}

?>
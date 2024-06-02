<?php

session_start();

$user;

if(isset($_SESSION["u"])){

    $_SESSION["u"] = null;
    session_destroy();

    

 
   

   

}else if(!isset($_SESSION["uk"])){
    $code = uniqid();
    $_SESSION["uk"] = $code;
    $user = $_SESSION["uk"];
}else if (isset($_SESSION["uk"])) {
    $user = $_SESSION["uk"];
}

echo ("success");

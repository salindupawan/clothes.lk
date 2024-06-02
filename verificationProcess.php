<?php

session_start();
require "connection.php";

$v = $_POST["v"];
    $e = $_POST["e"];

if(empty($e)){
    echo("Enter email and get Verification code");

}else if(empty($v)){
    echo ("Enter verification code");
}else{
    

    $admin = Database::search("SELECT * FROM `admin` WHERE `verification_code`='".$v."' AND `email`='".$e."'");
    $num = $admin->num_rows;

    if($num == 1){
        $data = $admin->fetch_assoc();
        $_SESSION["au"] =$data;
        echo ("success");
    }else{
        echo ("invalid verification code.");
    }
}



?>
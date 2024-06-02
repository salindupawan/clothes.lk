<?php

require "connection.php";

$email = $_POST["e"];
$np = $_POST["n"];
$rnp = $_POST["r"];
$vcode = $_POST["v"];

if(empty($email)){
    echo ("Missing Email address");
}else if(empty($np)){
    echo ("Enter a New Password");
}else if(strlen($np)<5 || strlen($np)>20){
    echo ("Invalid Password");
}else if(empty($rnp)){
    echo ("Re-type Password");
}else if($np != $rnp){
    echo ("Password does not matched");
}else if(empty($vcode)){
    echo ("Enter your Verification Code");
}else{

    $rs = Database::search("SELECT * FROM `user` WHERE `email`='".$email."' AND 
    `verification_code`='".$vcode."'");
    $n = $rs->num_rows;

    if($n == 1){

        Database::iud("UPDATE `user` SET `password`='".$np."' WHERE `email`='".$email."'");
        echo ("success");

    }else{
        echo ("Invalid Verification Code");
    }

}

?>
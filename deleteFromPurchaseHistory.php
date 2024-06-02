<?php

session_start();
require "connection.php";

if(isset($_SESSION["u"])){
    if(isset($_GET["id"])){

        $id = $_GET["id"];

        Database::iud("UPDATE `invoice` SET `status`='2' WHERE `id`='".$id."'");
        echo("success");

    }else{
        echo("something went wrong");
    }
}

?>
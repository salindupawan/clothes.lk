<?php

session_start();

require "connection.php";

if(isset($_SESSION["u"])){
    if(isset($_POST["id"]) && isset($_POST["v"])){

        $id =$_POST["id"];
        $value =$_POST["v"];

        Database::iud("UPDATE `cart` SET `cart_qty`='".$value."' WHERE `product_id`='".$id."' AND `user_email`='".$_SESSION["u"]["email"]."'");
       
        echo("success");

    }else{
        echo("something went wrong");
    }

}else if(isset($_SESSION["uk"])){
    if(isset($_POST["id"]) && isset($_POST["v"])){

        $id =$_POST["id"];
        $value =$_POST["v"];

        Database::iud("UPDATE `cart_non` SET `cart_qty`='".$value."' WHERE `product_id`='".$id."' AND `user_code`='".$_SESSION["uk"]."'");
       
        echo("success");

    }else{
        echo("something went wrong");
    }
}


?>
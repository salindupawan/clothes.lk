<?php

session_start();

require "connection.php";

if(isset($_SESSION["u"])){
    if(isset($_POST["id"]) && isset($_POST["size"])){

        $id =$_POST["id"];
        $value =$_POST["size"];

        Database::iud("UPDATE `cart` SET `size_id`='".$value."' WHERE `product_id`='".$id."' AND `user_email`='".$_SESSION["u"]["email"]."'");
        echo("done");

    }else{
        echo("something went wrong");
    }

}else if(isset($_SESSION["uk"])){
    if(isset($_POST["id"]) && isset($_POST["size"])){

        $id =$_POST["id"];
        $value =$_POST["size"];

        Database::iud("UPDATE `cart_non` SET `size_id`='".$value."' WHERE `product_id`='".$id."' AND `user_code`='".$_SESSION["uk"]."'");
        echo("done");

    }else{
        echo("something went wrong");
    }
}


?>


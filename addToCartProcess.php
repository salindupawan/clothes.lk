<?php

session_start();
require "connection.php";
$user;




if(isset($_SESSION["u"])){
    if(isset($_GET["id"])){

        $email = $_SESSION["u"]["email"];
        $pid = $_GET["id"];

        $cart_rs = Database::search("SELECT * FROM `cart` WHERE `product_id`='".$pid."' AND 
        `user_email`='".$email."'");
        $cart_num = $cart_rs->num_rows;

        if($cart_num == 1){
            $cart_data = $cart_rs->fetch_assoc();
            $list_id = $cart_data["id"];

            Database::iud("DELETE FROM `cart` WHERE `id`='".$list_id."'");
            echo ("removed");
        }else{
            Database::iud("INSERT INTO `cart`(`product_id`,`user_email`,`cart_qty`,`size_id`) VALUES ('".$pid."','".$email."','1','9')");
            echo ("added");
        }

    }else{
        echo ("Somethng went wrong. Please try again later.");
    }

}else if(isset($_SESSION["uk"])){
    if(isset($_GET["id"])){
$user=$_SESSION["uk"];
       
        $pid = $_GET["id"];

        $cart_rs = Database::search("SELECT * FROM `cart_non` WHERE `product_id`='".$pid."' AND 
        `user_code`='".$user."'");
        $cart_num = $cart_rs->num_rows;

        if($cart_num == 1){
            $cart_data = $cart_rs->fetch_assoc();
            $list_id = $cart_data["id"];

            Database::iud("DELETE FROM `cart_non` WHERE `id`='".$list_id."' ");
            echo ("removed");
        }else{
            Database::iud("INSERT INTO `cart_non`(`product_id`,`user_code`,`cart_qty`,`size_id`) VALUES ('".$pid."','".$user."','1','9')");
            echo ("added");
        }

    }else{
        echo ("Somethng went wrong. Please try again later.");
    }
}

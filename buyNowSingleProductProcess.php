<?php

session_start();
require "connection.php";

$size = $_POST["s"];
$qty = $_POST["q"];
$id = $_POST["id"];

if(isset($_POST["s"]) && isset($_POST["q"])  && isset($_POST["id"]) ){
    
    if(isset($_SESSION["u"])){

        $cart_rs = Database::search("SELECT * FROM `cart` WHERE `product_id`='".$id."' AND `user_email`='".$_SESSION["u"]["email"]."'");
        $cart_num = $cart_rs->num_rows;
    
        if($cart_num==1){
    
            Database::iud("UPDATE `cart` SET `cart_qty`='".$qty."' , `size_id`='".$size."' WHERE `product_id`='".$id."' AND `user_email`='".$_SESSION["u"]["email"]."' ");
    
        }else{
            Database::iud("INSERT INTO `cart`(`product_id`,`user_email`,`cart_qty`,`size_id`) VALUES ('".$id."','".$_SESSION["u"]["email"]."','".$qty."','".$size."')");
        }
    
        echo("success");
    
    
    }else if($_SESSION["uk"]){
    
        $cart_rs = Database::search("SELECT * FROM `cart_non` WHERE `product_id`='".$id."' AND `user_code`='".$_SESSION["uk"]."'");
        $cart_num = $cart_rs->num_rows;
    
        if($cart_num==1){
    
            Database::iud("UPDATE `cart_non` SET `cart_qty`='".$qty."' , `size_id`='".$size."' WHERE `product_id`='".$id."' AND `user_code`='".$_SESSION["uk"]."' ");
    
        }else{
            Database::iud("INSERT INTO `cart_non`(`product_id`,`user_code`,`cart_qty`,`size_id`) VALUES ('".$id."','".$_SESSION["uk"]."','".$qty."','".$size."')");
        }
    
        echo("success");
    
    }

}else{
    echo("something went wrong. please try again later");
}




?>
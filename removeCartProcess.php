<?php

session_start();

require "connection.php";

if(isset($_SESSION["u"])){

    if(isset($_GET["id"])){

        $cid = $_GET["id"];
    
        
    
        Database::iud("DELETE FROM `cart` WHERE `product_id`='".$cid."' AND `user_email`='".$_SESSION["u"]["email"]."'");
    
        echo ("Product has been removed");
    
    }else{
        echo ("something went wrong");
    }

}else if(isset($_SESSION["uk"])){

    if(isset($_GET["id"])){

        $cid = $_GET["id"];
    
        
    
        Database::iud("DELETE FROM `cart_non` WHERE `product_id`='".$cid."' AND `user_code`='".$_SESSION["uk"]."'");
    
        echo ("Product has been removed");
    
    }else{
        echo ("something went wrong");
    }

}





?>
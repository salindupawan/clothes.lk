<?php

session_start();

require "connection.php";

if(isset($_SESSION["u"])){

    
        
    
        Database::iud("DELETE FROM `cart` WHERE `user_email`='".$_SESSION["u"]["email"]."'");
    
        echo ("removed");
    
    

}else if(isset($_SESSION["uk"])){

    
    
        
    
        Database::iud("DELETE FROM `cart_non` WHERE `user_code`='".$_SESSION["uk"]."'");
    
        echo ("removed");
    
    

}





?>
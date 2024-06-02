<?php

session_start();
require "connection.php";

if(isset($_SESSION["u"])){
    

    $invoice_rs = Database::search("SELECT * FROM `invoice` WHERE `user_email`='" . $_SESSION["u"]["email"] . "' AND `status`='1'");
    $invoice_num = $invoice_rs->num_rows;

    for($x=0;$x<$invoice_num;$x++){
        $invoice_data =$invoice_rs->fetch_assoc();
        Database::iud("UPDATE `invoice` SET `status`='2' WHERE `id`='".$invoice_data["id"]."'");

    }

        echo("success");

    
}

?>
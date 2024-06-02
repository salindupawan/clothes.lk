<?php
session_start();
require "connection.php";

if(isset($_SESSION["u"])){
    $mail = $_POST["mail"];
    $oid = $_POST["oid"];
    $amount = $_POST["amount"];

    $d = new DateTime();
    $tz = new DateTimeZone("Asia/Colombo");
    $d->setTimezone($tz);
    $datetime = $d->format("Y-m-d H:i:s");

    $date = date("Y-m-d");
    
    Database::iud("INSERT INTO `invoice`(`order_id`,`date`,`status`,`total`,`d`) VALUES('".$oid."','".$datetime."','0','".$amount."','".$date."')");

    $cart_rs = Database::search("SELECT * FROM `cart` WHERE `user_email`='".$mail."'");
    $cart_num =$cart_rs->num_rows;

    for($x=0;$x<$cart_num;$x++){
        $cart_data = $cart_rs->fetch_assoc();
        $pid = $cart_data["product_id"];
        $qty = $cart_data["cart_qty"];
        $size = $cart_data["size_id"];
        $id = $cart_data["id"];

        Database::iud("INSERT INTO `invoice_products`(`qty`,`status`,`invoice_order_id`,`size_id`,`product_id`,`user_email`)
        VALUES('".$qty."','1','".$oid."','".$size."','".$pid."','".$mail."') ");

        Database::iud("DELETE FROM `cart` WHERE `id` ='".$id."'");

        $product_rs = Database::search("SELECT * FROM `product` WHERE `id`='".$pid."'");
        $product_data = $product_rs->fetch_assoc();

        $curr_qty = $product_data["qty"];
        $new_qty = $curr_qty - $qty;

        Database::iud("UPDATE `product` SET `qty`='".$new_qty."' WHERE `id`='".$pid."'");

    }

echo("1");

}



?>
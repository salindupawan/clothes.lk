<?php
session_start();
require "connection.php";

if (isset($_SESSION["u"])) {
    $email = $_SESSION["u"]["email"];

    $array;

    $order_id = uniqid();

    $cart_rs = Database::search("SELECT * FROM `cart` INNER JOIN `product` ON cart.product_id=product.id INNER JOIN `delivery_fee` ON product.delivery_fee_id=delivery_fee.id WHERE `user_email`='" . $email . "' ");
    $cart_num = $cart_rs->num_rows;
    $total = 0;
    $delivery = 0;
    for ($x = 0; $x < $cart_num; $x++) {
        $cart_data = $cart_rs->fetch_assoc();
        $total = $total + ($cart_data["price"] * $cart_data["cart_qty"]);

        if ($delivery < $cart_data["fee"]) {
            $delivery = $cart_data["fee"];
        }
    }
    $amount = $total + $delivery;

    $user_rs = Database::search("SELECT * FROM `user` INNER JOIN `user_has_address` ON user.email=user_has_address.user_email INNER JOIN `city` ON user_has_address.city_id=city.id WHERE `user_email`='" . $email . "'");
    $user_data = $user_rs->fetch_assoc();

    $merchant_secret = "NzI5MDYxMDg0MjgyNjUwMzg3MDExMTE5MzAzNjYyMDcxNjg0NTA5";
    $merchant_id = "1223325";

    

    $hash = strtoupper(
        md5(
            $merchant_id . 
            $order_id . 
            number_format($amount, 2, '.', '') . 
            "LKR" .  
            strtoupper(md5($merchant_secret)) 
        ) 
    );

    $array["id"] = $order_id;
    $array["amount"] = $amount;
    $array["fname"] = $user_data["fname"];
    $array["lname"] = $user_data["lname"];
    $array["mobile"] = $user_data["mobile"];
    $array["address"] = $user_data["line1"].", ".$user_data["line2"];
    $array["city"] = $user_data["name"];
    $array["umail"] = $email;
    $array["hash"] = $hash;

    echo json_encode($array);
}else{
    echo("1");
}

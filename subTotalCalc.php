<?php

session_start();
require "connection.php";

if (isset($_SESSION["u"])) {
    $cart_rs = Database::search("SELECT * FROM `cart` INNER JOIN `product` ON cart.product_id=product.id WHERE `user_email`= '" . $_SESSION["u"]["email"] . "' AND `qty`> 0");
    $cart_num = $cart_rs->num_rows;


    $total = 0;
    $shipping = 0;
    $subtotal = 0;

    for ($x = 0; $x < $cart_num; $x++) {

        $cart_data = $cart_rs->fetch_assoc();

        $total = $total + ($cart_data["price"] * $cart_data["cart_qty"]);
      

        $deliveryfee_rs = Database::search("SELECT * FROM `delivery_fee` WHERE `id`= '" . $cart_data["delivery_fee_id"] . "'");
        $deliveryfee_data = $deliveryfee_rs->fetch_assoc();

        $deliveryfee = $deliveryfee_data["fee"];
        

        if ($shipping < $deliveryfee) {
            $shipping = $deliveryfee;
        }
    }

    echo ($total);
    echo(",");
    echo($shipping);
} else if (isset($_SESSION["uk"])) {

    $cart_rs = Database::search("SELECT * FROM `cart_non` INNER JOIN `product` ON cart_non.product_id=product.id WHERE `user_code`= '" . $_SESSION["uk"] . "' AND `qty`> 0");
    $cart_num = $cart_rs->num_rows;


    $total = 0;
    $shipping = 0;
    $subtotal = 0;

    for ($x = 0; $x < $cart_num; $x++) {

        $cart_data = $cart_rs->fetch_assoc();

        $total = $total + ($cart_data["price"] * $cart_data["cart_qty"]);

        $deliveryfee_rs = Database::search("SELECT * FROM `delivery_fee` WHERE `id`= '" . $cart_data["delivery_fee_id"] . "'");
        $deliveryfee_data = $deliveryfee_rs->fetch_assoc();
        $deliveryfee = $deliveryfee_data["fee"];

        if ($shipping < $deliveryfee) {
            $shipping = $deliveryfee;
        }
    }

    echo ($total);
    echo(",");
    echo($shipping);
}

?>

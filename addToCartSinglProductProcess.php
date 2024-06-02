<?php

session_start();
require "connection.php";
$user;




if (isset($_SESSION["u"])) {
    if (isset($_POST["id"]) && isset($_POST["qty"]) && isset($_POST["size"])) {

        $email = $_SESSION["u"]["email"];
        $id = $_POST["id"];
        $qty = $_POST["qty"];
        $size = $_POST["size"];

        $cart_rs = Database::search("SELECT * FROM `cart` WHERE `product_id`='" . $id . "' AND 
        `user_email`='" . $email . "'");
        $cart_num = $cart_rs->num_rows;

        if ($cart_num == 1) {
            $cart_data = $cart_rs->fetch_assoc();
            $list_id = $cart_data["id"];

            Database::iud("DELETE FROM `cart` WHERE `id`='" . $list_id . "'");
            echo ("removed");
        } else {
            Database::iud("INSERT INTO `cart`(`product_id`,`user_email`,`cart_qty`,`size_id`) VALUES ('" . $id . "','" . $email . "','".$qty."','".$size."')");
            echo ("added");
        }
    } else {
        echo ("Somethng went wrong. Please try again later.");
    }
} else if (isset($_SESSION["uk"])) {
    if (isset($_POST["id"]) && isset($_POST["qty"]) && isset($_POST["size"])) {
        $user = $_SESSION["uk"];
        $id = $_POST["id"];
        $qty = $_POST["qty"];
        $size = $_POST["size"];



        $cart_rs = Database::search("SELECT * FROM `cart_non` WHERE `product_id`='" . $id . "' AND 
        `user_code`='" . $user . "'");
        $cart_num = $cart_rs->num_rows;

        if ($cart_num == 1) {
            $cart_data = $cart_rs->fetch_assoc();
            $list_id = $cart_data["id"];

            Database::iud("DELETE FROM `cart_non` WHERE `id`='" . $list_id . "' ");
            echo ("removed");
        } else {
            Database::iud("INSERT INTO `cart_non`(`product_id`,`user_code`,`cart_qty`,`size_id`) VALUES ('" . $id . "','" . $user . "','".$qty."','".$size."')");
            echo ("added");
        }
    } else {
        echo ("Somethng went wrong. Please try again later.");
    }
}

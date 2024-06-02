<?php

session_start();
require "connection.php";

if (isset($_SESSION["u"])) {
    

    $line1 = $_POST["l1"];
    $line2 = $_POST["l2"];
    $province = $_POST["p"];
    $district = $_POST["d"];
    $city = $_POST["c"];
    $pcode = $_POST["pc"];

    $address_rs = Database::search("SELECT * FROM `user_has_address` WHERE `user_email`='" . $_SESSION["u"]["email"] . "'");
    $address_num = $address_rs->num_rows;





    if (empty($line1)) {
        echo ("Enter Address line 1");
    } elseif (empty($line2)) {
        echo ("Enter Address line 2");
    } else if ($province == 0) {
        echo ("Please select Province");
    } else if ($district == 0) {
        echo ("Please select District");
    } elseif ($city == 0) {
        echo ("Please select City");
    } else {
        if ($address_num == 1) {

            Database::iud("UPDATE `user_has_address` SET `line1`='" . $line1 . "',
                        `line2`='" . $line2 . "',
                        `city_id`='" . $city . "',
                        `postal_code`='" . $pcode . "' WHERE `user_email`='" . $_SESSION["u"]["email"] . "'");
        } else {

            Database::iud("INSERT INTO `user_has_address` 
                        (`line1`,`line2`,`user_email`,`city_id`,`postal_code`) VALUES 
                        ('" . $line1 . "','" . $line2 . "','" . $_SESSION["u"]["email"] . "','" . $city . "','" . $pcode . "')");
        }

        echo ("success");
    }
} else if (isset($_SESSION["uk"])) {

    $fname = $_POST["f"];
    $lname = $_POST["l"];
    $email = $_POST["e"];
    $pw = $_POST["pw"];
    $cpw = $_POST["cpw"];
    $mobile = $_POST["m"];
    $gender = $_POST["g"];
    $line1 = $_POST["l1"];
    $line2 = $_POST["l2"];
    $province = $_POST["p"];
    $district = $_POST["d"];
    $city = $_POST["c"];
    $pcode = $_POST["pc"];

    if (empty($fname)) {
        echo ("Enter your First Name");
    } else if (strlen($fname) > 50) {
        echo ("First Name must have less than 50 characters");
    } else if (empty($lname)) {
        echo ("Enter your Last Name");
    } else if (strlen($lname) > 50) {
        echo ("Last Name must have less than 50 characters");
    } else if (empty($email)) {
        echo ("Enter your Email");
    } else if (strlen($email) >= 100) {
        echo ("Email must have less than 100 characters");
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo ("Invalid Email");
    } else if (empty($pw)) {
        echo ("Enter your Password");
    } else if (strlen($pw) < 5 || strlen($pw) > 20) {
        echo ("Password must be between 5 - 20 charcters");
    } else if (empty($cpw)) {
        echo ("Re type your Password");
    } else if (strlen($cpw) < 5 || strlen($cpw) > 20) {
        echo ("Confirm Password must be between 5 - 20 charcters");
    } else if ($pw != $cpw) {
        echo ("Password Does not match");
    } else if (empty($mobile)) {
        echo ("Enter your Mobile");
    } else if (strlen($mobile) != 10) {
        echo ("Mobile must have 10 characters");
    } else if (!preg_match("/07[0,1,2,4,5,6,7,8][0-9]/", $mobile)) {
        echo ("Invalid Mobile");
    } else if ($gender == 0) {
        echo ("Please select Gender");
    } else if (empty($line1)) {
        echo ("Enter Address line 1");
    } elseif (empty($line2)) {
        echo ("Enter Address line 2");
    } else if ($province == 0) {
        echo ("Please select Province");
    } else if ($district == 0) {
        echo ("Please select District");
    } elseif ($city == 0) {
        echo ("Please select City");
    } else {

        $rs = Database::search("SELECT * FROM `user` WHERE `email`='" . $email . "' OR `mobile`='" . $mobile . "'");
        $n = $rs->num_rows;

        if ($n > 0) {
            echo ("User with the same Email or Mobile already exists.");
        } else {
            $d = new DateTime();
            $tz = new DateTimeZone("Asia/Colombo");
            $d->setTimezone($tz);
            $date = $d->format("Y-m-d H:i:s");

            Database::iud("INSERT INTO `user` 
        (`fname`,`lname`,`email`,`mobile`,`password`,`gender_id`,`joined_date`,`status`) VALUES 
        ('" . $fname . "','" . $lname . "','" . $email . "','" . $mobile . "','" . $pw . "','" . $gender . "','" . $date . "','1')");

            Database::iud("INSERT INTO `user_has_address` 
(`line1`,`line2`,`user_email`,`city_id`,`postal_code`) VALUES 
('" . $line1 . "','" . $line2 . "','" . $email . "','" . $city . "','" . $pcode . "')");

            $user = $_SESSION["uk"];

            $cart_rs = Database::search("SELECT * FROM `cart_non` WHERE `user_code`='" . $user . "'");
            $cart_num = $cart_rs->num_rows;
            if ($cart_num > 0) {

                for ($x = 0; $x < $cart_num; $x++) {
                    $cart_data = $cart_rs->fetch_assoc();
                    $product_id = $cart_data["product_id"];
                    $cart_qty = $cart_data["cart_qty"];
                    $size_id = $cart_data["size_id"];

                    Database::iud("INSERT INTO `cart`(`product_id`,`user_email`,`cart_qty`,`size_id`) 
                    VALUES('" . $product_id . "','" . $email . "','" . $cart_qty . "','" . $size_id . "')");

                    Database::iud("DELETE FROM `cart_non` WHERE `id`='" . $cart_data["id"] . "' ");
                }
            }

            $wishlist_rs = Database::search("SELECT * FROM `wishlist_non` WHERE `user_code`='" . $user . "'");
            $wishlist_num = $wishlist_rs->num_rows;
            if ($wishlist_num > 0) {

                for ($y = 0; $y < $wishlist_num; $y++) {
                    $wishlist_data = $wishlist_rs->fetch_assoc();
                    $id = $wishlist_data["product_id"];


                    Database::iud("INSERT INTO `wishlist`(`product_id`,`user_email`) 
                    VALUES('" . $product_id . "','" . $email . "')");

                    Database::iud("DELETE FROM `wishlist_non` WHERE `id`='" . $wishlist_data["id"] . "' ");
                }
            }

            if (isset($_SESSION["uk"])) {
                $_SESSION["uk"] = null;
                
            }

            $rs = Database::search("SELECT * FROM `user` WHERE `email`='" . $email . "' ");
            $n = $rs->num_rows;

            if ($n == 1) {


                $d = $rs->fetch_assoc();
                $_SESSION["u"] = $d;

                setcookie("email", $email, time() + (60 * 60 * 24 * 365));
                setcookie("password", $pw, time() + (60 * 60 * 24 * 365));
            }

            echo("success");
        }
    }
}

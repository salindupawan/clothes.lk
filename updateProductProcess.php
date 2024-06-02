<?php

require "connection.php";

$pid = $_POST["id"];
$title = $_POST["t"];
$qty = $_POST["q"];
$dil = $_POST["dil"];
$des = $_POST["des"];
$xs = $_POST["xs"];
$s = $_POST["s"];
$m = $_POST["m"];
$l = $_POST["l"];
$xl = $_POST["xl"];
$xxl = $_POST["xxl"];




$length = sizeof($_FILES);
$allowed_img_extentions = array("image/jpg", "image/jpeg", "image/png", "image/svg+xml", "image/webp");

if ($length <= 3 AND $length>=1) {

Database::iud("DELETE FROM `product_images` WHERE `product_id`='" . $pid . "'");


    for ($x = 0; $x < $length; $x++) {
        if (isset($_FILES["i" . $x])) {

            $img_file = $_FILES["i" . $x];
            $file_extention = $img_file["type"];

            if (in_array($file_extention, $allowed_img_extentions)) {

                $new_file_extention;

                if ($file_extention == "image/jpg") {
                    $new_file_extention = ".jpg";
                } else if ($file_extention == "image/jpeg") {
                    $new_file_extention = ".jpeg";
                } else if ($file_extention == "image/png") {
                    $new_file_extention = ".png";
                } else if ($file_extention == "image/webp") {
                    $new_file_extention = ".webp";
                } else if ($file_extention == "image/svg+xml") {
                    $new_file_extention = ".svg";
                }

                $file_name = "resources/product_imges//" . $title . "_" . $x . "_" . uniqid() . $new_file_extention;
                move_uploaded_file($img_file["tmp_name"], $file_name);

                Database::iud("INSERT INTO `product_images`(`code`,`product_id`) VALUES ('" . $file_name . "','" . $pid . "')");
            } else {
                echo ("Invalid image type");
            }
        }
    }

    Database::iud("UPDATE `product_has_size` SET `status`='".$xs."' WHERE `product_id`='".$pid."' AND `size_id`='7'");
    Database::iud("UPDATE `product_has_size` SET `status`='".$s."' WHERE `product_id`='".$pid."' AND `size_id`='8'");
    Database::iud("UPDATE `product_has_size` SET `status`='".$m."' WHERE `product_id`='".$pid."' AND `size_id`='9'");
    Database::iud("UPDATE `product_has_size` SET `status`='".$l."' WHERE `product_id`='".$pid."' AND `size_id`='10'");
    Database::iud("UPDATE `product_has_size` SET `status`='".$xl."' WHERE `product_id`='".$pid."' AND `size_id`='11'");
    Database::iud("UPDATE `product_has_size` SET `status`='".$xxl."' WHERE `product_id`='".$pid."' AND `size_id`='12'");

    $delivery_rs = Database::search("SELECT * FROM `delivery_fee` WHERE `fee`='" . $dil . "'");
    $delivery_num = $delivery_rs->num_rows;

    if ($delivery_num == 1) {
        $delivery_data = $delivery_rs->fetch_assoc();

        $dil_id = $delivery_data["id"];
    } else {
        Database::iud("INSERT INTO `delivery_fee`(`fee`) VALUES('" . $dil . "')");

        $checkId = Database::search("SELECT * FROM `delivery_fee` WHERE `fee`='" . $dil . "'");
        $checkId_data = $checkId->fetch_assoc();
        $dil_id = $checkId_data["id"];
    }

    Database::iud("UPDATE `product` SET `title`='" . $title . "',`qty`='" . $qty . "',`delivery_fee_id`='" . $dil_id . "',
    `description`='" . $des . "' WHERE `id`='" . $pid . "'");

    echo ("success");
} else if($length == 0){

    Database::iud("UPDATE `product_has_size` SET `status`='".$xs."' WHERE `product_id`='".$pid."' AND `size_id`='7'");
    Database::iud("UPDATE `product_has_size` SET `status`='".$s."' WHERE `product_id`='".$pid."' AND `size_id`='8'");
    Database::iud("UPDATE `product_has_size` SET `status`='".$m."' WHERE `product_id`='".$pid."' AND `size_id`='9'");
    Database::iud("UPDATE `product_has_size` SET `status`='".$l."' WHERE `product_id`='".$pid."' AND `size_id`='10'");
    Database::iud("UPDATE `product_has_size` SET `status`='".$xl."' WHERE `product_id`='".$pid."' AND `size_id`='11'");
    Database::iud("UPDATE `product_has_size` SET `status`='".$xxl."' WHERE `product_id`='".$pid."' AND `size_id`='12'");
    
    $delivery_rs = Database::search("SELECT * FROM `delivery_fee` WHERE `fee`='" . $dil . "'");
    $delivery_num = $delivery_rs->num_rows;

    if ($delivery_num == 1) {
        $delivery_data = $delivery_rs->fetch_assoc();

        $dil_id = $delivery_data["id"];
    } else {
        Database::iud("INSERT INTO `delivery_fee`(`fee`) VALUES('" . $dil . "')");

        $checkId = Database::search("SELECT * FROM `delivery_fee` WHERE `fee`='" . $dil . "'");
        $checkId_data = $checkId->fetch_assoc();
        $dil_id = $checkId_data["id"];
    }

    Database::iud("UPDATE `product` SET `title`='" . $title . "',`qty`='" . $qty . "',`delivery_fee_id`='" . $dil_id . "',
`description`='" . $des . "' WHERE `id`='" . $pid . "'");

echo ("success");
}else{

    echo ("Select 3 images");

}

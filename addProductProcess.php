<?php

require "connection.php";

$pid = $_POST["pid"];
$price = $_POST["p"];
$colour = $_POST["co"];
$sub = $_POST["su"];
$brand = $_POST["b"];
$category = $_POST["ca"];
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

if($category == "0"){
    echo ("Please select a Category");
}else if($sub == "0"){
    echo ("Please select a Sub Category");
}else if($brand == "0"){
    echo ("Please select a Brand");
}else if($colour == "0"){
    echo ("Please select a Colour");
}else if(empty($title)){
    echo ("Please add the Title");
}else if(strlen($title) >= 100){
    echo ("Title should have less than 100 characters");
}else if(empty($pid)){
    echo ("Please add the Product id");
}else if(strlen($pid) >= 100){
    echo ("Product id should have less than 100 characters");
}else if(empty($qty)){
    echo ("Please add the Quantity");
}else if($qty == "0" | $qty == "e" | $qty < 0){
    echo ("Invalid value for field Quantity");
}else if(empty($price)){
    echo ("Please add the Price");
}else if(!is_numeric($price)){
    echo ("Invalid value for field Price Per Item");
}else if(empty($dil)){
    echo ("Please add the Delivery fee");
}else if(!is_numeric($dil)){
    echo ("Invalid value for field Delivery fee");
}else if(empty($des)){
    echo ("Please add the Description");
}else{


$length = sizeof($_FILES);
$allowed_img_extentions = array("image/jpg", "image/jpeg", "image/png", "image/svg+xml", "image/webp");

if ($length <= 3) {

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

    $d = new DateTime();
    $tz = new DateTimeZone("Asia/Colombo");
    $d->setTimezone($tz);
    $date = $d->format("Y-m-d H:i:s");

    Database::iud("INSERT INTO `product` (`price`,`qty`,`description`,`title`,`datetime_added`,`delivery_fee_id`,
    `colour_id`,`status_id`,`brand_id`,`sub_category_id`,`product_code`) 
    VALUES ('".$price."','".$qty."','".$des."','".$title."','".$date."','".$dil_id."','".$colour."','1',
    '".$brand."','".$sub."','".$pid."')");

    $product_id = Database::$connection->insert_id;

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

                Database::iud("INSERT INTO `product_images`(`code`,`product_id`) VALUES ('" . $file_name . "','" . $product_id . "')");
            } else {
                echo ("Invalid image type");
            }
        }
    }

        Database::iud("INSERT INTO `product_has_size`(`product_id`,`size_id`,`status`) VALUES('".$product_id."','7','".$xs."')");
        Database::iud("INSERT INTO `product_has_size`(`product_id`,`size_id`,`status`) VALUES('".$product_id."','8','".$s."')");
        Database::iud("INSERT INTO `product_has_size`(`product_id`,`size_id`,`status`) VALUES('".$product_id."','9','".$m."')");
        Database::iud("INSERT INTO `product_has_size`(`product_id`,`size_id`,`status`) VALUES('".$product_id."','10','".$l."')");
        Database::iud("INSERT INTO `product_has_size`(`product_id`,`size_id`,`status`) VALUES('".$product_id."','11','".$xl."')");
        Database::iud("INSERT INTO `product_has_size`(`product_id`,`size_id`,`status`) VALUES('".$product_id."','12','".$xxl."')");

  

    

   

    echo ("Product Added");
}else{

    echo ("Select 3 images");

}
}
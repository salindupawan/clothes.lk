<?php
session_start();

require "connection.php";

if(isset($_SESSION["au"])){

    $value = $_POST["i"];
    $id = $_POST["id"];

    $data_rs = Database::search("SELECT * FROM `sub_category` WHERE `name`='".$value."' AND `category_id`='".$id."'");

    $data_num=$data_rs->num_rows;

    if($data_num==0){

        Database::iud("INSERT INTO `sub_category`(`name`,`category_id`) VALUE('".$value."','".$id."')");
        echo("success");

    }else{
        echo("Already Added");
    }

}else{
    header("Location:home.php");
}
?>
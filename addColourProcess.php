<?php
session_start();
require "connection.php";

if(isset($_SESSION["au"])){

    $c = $_GET["c"];
    $colour_rs = Database::search("SELECT * FROM `colour` WHERE `name`='".$c."'");
    $colour_num = $colour_rs->num_rows;

    if($colour_num==0){
        Database::iud("INSERT INTO `colour`(`name`) VALUES('".$c."')");
        echo("success");
    }else{
        echo("Already added");
    }

}else{
    header("Location:home.php");
}



?>
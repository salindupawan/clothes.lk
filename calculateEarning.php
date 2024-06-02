<?php
require "connection.php";

$count_rs = Database::search("SELECT * FROM `invoice` WHERE `status`!='5'  GROUP BY d ORDER BY `d` deSC ");
$count_num = $count_rs->num_rows;
$array= array();

for ($y = 0; $y < $count_num; $y++) {
    $count_data = $count_rs->fetch_assoc();
    
    $selected_rs = Database::search("SELECT * FROM `invoice` WHERE `status`!='5' AND `d`='" . $count_data["d"] . "'");
    $selected_num = $selected_rs->num_rows;
    $total=0 ;
    for ($z = 0; $z < $selected_num; $z++) {
        $selected_data = $selected_rs->fetch_assoc();
        $tot = $selected_data["total"];
        $total = $total + $tot;
    }
    $array[$y]=$total;
    $date = $count_data["d"];
    $splitDate = explode("-",$date);
    $dateWithMonthe = $splitDate[1]."/".$splitDate[2];
    $array["d".$y]=$dateWithMonthe;

}

// echo($array["0"]);



echo json_encode($array);

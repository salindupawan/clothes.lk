<?php
require "connection.php";

$count_rs = Database::search("SELECT category.c_name, COUNT(*) AS count FROM `product`
INNER JOIN `sub_category` ON product.sub_category_id=sub_category.id 
INNER JOIN `category` ON sub_category.category_id=category.id GROUP BY category_id");

$count_num = $count_rs->num_rows;

$array;


for($x=0;$x<$count_num;$x++){

    $count_data = $count_rs->fetch_assoc();
    $array["s".$x] = $count_data["c_name"];
    $array[$x] = $count_data["count"];

}

echo json_encode($array);



?>
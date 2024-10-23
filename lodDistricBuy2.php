<?php

require "connection.php";

$json=$_GET["json"];
$josnToobj=json_decode($json);
$keyword=$josnToobj->dis;

// echo($keyword);


$distric = Database::search("SELECT * FROM `district` WHERE `distric_name` LIKE'%" . $keyword . "%'");
$distric_num = $distric->num_rows;

for ($c = 0; $c <  $distric_num; $c++) {

    $distric_data = $distric->fetch_assoc();
?>

    
    <div class="col-11 p-1 d-flex justify-content-center disdivbuy" style="border-radius: 2px; cursor: pointer;" onclick="selectdistricbuy2('<?php echo($distric_data['distric_name']) ?>');">
        <label for="" class="text-center fw-bold opacity-75" style=" cursor: pointer;"><?php echo ($distric_data["distric_name"]) ?></label>

    </div>

<?php
}



?>
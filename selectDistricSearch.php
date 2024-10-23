<?php

require "connection.php";

$json = $_GET["json"];

// echo($json);
$josnToobj = json_decode($json);
$districName = $josnToobj->ds;

// echo ($districName);


$distric = Database::search("SELECT * FROM `city`  WHERE `city_name` LIKE'%" . $districName . "%'");

$distric_num = $distric->num_rows;

if ($distric_num > 0) {
    for ($x = 0; $x < $distric_num; $x++) {

        $distric_data = $distric->fetch_assoc();


?>
        <div class="col-12 ps-2 mt-2 mb-2 border-bottom border-top border-1 d-flex justify-content-center" style=" cursor: pointer;" onclick="selectdistric('<?php echo ($distric_data['city_name']) ?>');">

            <label for="" style=" cursor: pointer;"><?php echo ($distric_data["city_name"]) ?></label>
        </div>

    <?php





    }
} else {
    ?>
    <div class="col-12 ps-2 mt-2 mb-2 d-flex justify-content-center" style=" cursor: pointer;">

        <label for="" class="text-danger opacity-75" style=" cursor: pointer;">Not Found ??</label>
    </div>
<?php
}






?>
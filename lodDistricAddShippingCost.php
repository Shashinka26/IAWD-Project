<?php

// echo ('djgh');

require "connection.php";

$json = $_GET["json"];

$jsontoobj = json_decode($json);
$id = $jsontoobj->distric;

// echo ($id);



$user_adress = Database::search("SELECT district.distric_name,district.province_id,province.province_name,province.id AS pid,district.id AS did FROM  `district`
 INNER JOIN `province` ON 
province.id=district.province_id WHERE `distric_name`='" . $id . "'");

$user_adress_num = $user_adress->num_rows;
$user_adress_data = $user_adress->fetch_assoc();

if ($user_adress_data["pid"] == 1) {

    $Dress_cost = Database::search("SELECT MAX(`Delevery_fee_Westen`) AS LargestPrice  FROM `dress`  ");
    $Dress_cost_data = $Dress_cost->fetch_assoc();
    $Dress_cost_num = $Dress_cost->num_rows;
?>
    <?php echo (number_format($Dress_cost_data["LargestPrice"])) ?>

<?php
} else {
    $Dress_cost2 = Database::search("SELECT MAX(`delivery_fee`) AS LargestPriceDely  FROM `dress`  ");
    $Dress_cost_data2 = $Dress_cost2->fetch_assoc();
    $Dress_cost_num2 = $Dress_cost2->num_rows;
?>

    <?php echo (number_format($Dress_cost_data2["LargestPriceDely"])) ?>
<?php
}

<?php

require "connection.php";

$jsonText = $_POST["json"];

// echo($jsonText);

$jsonToobj = json_decode($jsonText);
$condtion = $jsonToobj->con;
$DerssCode = $jsonToobj->Did;
$DressSize_id = $jsonToobj->sizeid;

$Derss = Database::search("SELECT * FROM `dress` WHERE `Dress_code`='" . $DerssCode . "'");
$Derss_data = $Derss->fetch_assoc();

// echo($Derss_data["id"]);
$Derss_size = Database::search("SELECT * FROM `dress_sizes` WHERE `id`='" . $DressSize_id . "'");
$Derss_size_data = $Derss_size->fetch_assoc();

$dresssize = Database::search("SELECT * FROM `dress_has_dress_sizes` WHERE `Dress_id`='" . $Derss_data["id"] . "' AND `dress_sizes_id`='" . $DressSize_id . "' ");
$d_num = $dresssize->num_rows;
$dresssize_data = $dresssize->fetch_assoc();
// echo($condtion);
// echo($DerssId);
// echo($DressSize_id);

if ($condtion == 1) {

   
    // echo  $dresssize_data["id"];

    if ($d_num > 0) {
        echo ($Derss_size_data["sizes_name"] . "_Size Add !!");

    } else {
        Database::includ("INSERT INTO `dress_has_dress_sizes`(`Dress_id`,`dress_sizes_id`) VALUES ('" . $Derss_data["id"] . "','" . $DressSize_id . "') ");
        echo ($Derss_size_data["sizes_name"] . "_Size Add !!");
    }
} else if ($condtion == 2) {
    Database::includ("DELETE FROM `order_items` WHERE `dress_has_dress_sizes_id`='" . $dresssize_data["id"] . "'");

    Database::includ("DELETE FROM `dress_has_dress_sizes` WHERE `Dress_id`='" . $Derss_data["id"] . "' AND `dress_sizes_id`='" . $DressSize_id . "' ");

  
    echo ($Derss_size_data["sizes_name"] . "_ Size Delete  !!");
}

// echo("ok");

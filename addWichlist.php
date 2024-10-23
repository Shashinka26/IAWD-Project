<?php

require "connection.php";

// echo("dgh");

$json = $_GET["json"];

// echo($json);


$JsonToobj = json_decode($json);
$id = $JsonToobj->id;

// echo($id);

$splitDate = explode("_", $id);
$id = $splitDate[0];
$email = $splitDate[1];
$dress_code = $splitDate[2];


$d = new DateTime();
$tz = new DateTimeZone("Asia/Colombo");
$d->setTimezone($tz);
$date = $d->format("Y-m_d H:i:s");


$phpObj = new stdClass();

$wichlist = Database::search("SELECT * FROM `wichlist` WHERE `Dress_id`='" . $id . "' AND `user_email`='" . $email . "'");
$wichlist_num = $wichlist->num_rows;

if ($wichlist_num > 0) {
    $phpObj->text1 = "All redy added";
} else {
    Database::includ("INSERT INTO `wichlist`(`Dress_id`,`user_email`,`dress_code`,`date_time`) VALUE ('" . $id . "','" . $email . "','" . $dress_code . "','" . $date . "') ");
    $phpObj->text = "Add Wichlist";
}




// echo("sucess");

$phpObj->design = '<i class="bi bi-heart fs-4 wich" style=" cursor: pointer; color: rgba(253, 131, 131, 0.774);" onclick="window.location=wichlist.php;"></i>';


$phptojson = json_encode($phpObj);

echo ($phptojson);

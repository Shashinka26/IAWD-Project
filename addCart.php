<?php


require "connection.php";

// echo('kjkj');

$json = $_GET["json"];

// echo($json);


$jsionToObj = json_decode($json);
$id = $jsionToObj->id;

$ids = explode("_", $id);
$id = $ids[0];
$email = $ids[1];
$dressCode = $ids[2];

// echo ($id);
// echo($email);
// echo($dressCode);


$d = new DateTime();
$tz = new DateTimeZone("Asia/Colombo");
$d->setTimezone($tz);
$date = $d->format("Y-m_d H:i:s");


$phpObj = new stdClass();

$Cart = Database::search("SELECT * FROM `cart` WHERE `Dress_id`='" . $id . "' AND `user_email`='" . $email . "'");
$cart_num = $Cart->num_rows;

if ($cart_num > 0) {
    $phpObj->text1="All redy added";

} else {
    Database::includ("INSERT INTO `cart`(`Dress_id`,`user_email`,`dress_code`,`date_time`) VALUE ('" . $id . "','" . $email . "','" . $dressCode . "','" . $date . "') ");
    $phpObj->text="Add Cart";
    

}



$phpTojson=json_encode($phpObj);
echo($phpTojson);



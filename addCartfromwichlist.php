<?php


require "connection.php";

// echo('kjkj');

$json = $_GET["json"];

// echo($json);


$jsionToObj = json_decode($json);
$id = $jsionToObj->id;
$size = $jsionToObj->sSize;

// echo ($size);

$ids = explode("_", $id);
$id = $ids[0];
$email = $ids[1];
$dressCode = $ids[2];
// $size = $ids[3];


// echo($email);
// echo($dressCode);


$d = new DateTime();
$tz = new DateTimeZone("Asia/Colombo");
$d->setTimezone($tz);
$date = $d->format("Y-m_d H:i:s");


$phpObj = new stdClass();

// $Cart = Database::search("SELECT * FROM `cart` WHERE `Dress_id`='" . $id . "' AND `user_email`='" . $email . "'");
// $cart_num = $Cart->num_rows;

// if ($cart_num > 0) {
//     $phpObj->text1="All redy added";

// } else {

$cart_size = Database::search("SELECT * FROM `cart_has_dress_sizes` INNER JOIN `cart`ON
    cart.cid=cart_has_dress_sizes.cart_cid WHERE `dress_sizes_id`='" . $size . "'AND `Dress_id`='" . $id . "' AND `user_email`='" . $email . "' ");

$cart_size_num = $cart_size->num_rows;

$qty;
// echo ($cart_size_num);
if ($cart_size_num > 0) {
    // $phpObj->text2 = ;
    // $phpObj->text2 = "This Dress All redy Add Form Cart ";
    $cart_size_data = $cart_size->fetch_assoc();
    // echo ($cart_size_data["qty"]);
    $qty = $cart_size_data["qty"] + 1;
   


    Database::includ("UPDATE `cart_has_dress_sizes` SET `qty`='" . $qty . "' WHERE `cart_cid`='". $cart_size_data["cart_cid"]."'");
    $phpObj->text = "Add Cart";

    // echo ("This Dress All redy Add Form Cart");
} else {
    Database::includ("INSERT INTO `cart`(`Dress_id`,`user_email`,`dress_code`,`date_time`) VALUE ('" . $id . "','" . $email . "','" . $dressCode . "','" . $date . "') ");
    $cart_id = Database::$connection->insert_id;

    // echo($product_id);
    Database::includ("INSERT INTO `cart_has_dress_sizes`(`cart_cid`,`dress_sizes_id`,`qty`) VALUE ('" . $cart_id . "','" . $size . "','1')");

    $phpObj->text = "Add Cart";


    // }




}


$phpTojson = json_encode($phpObj);
echo ($phpTojson);

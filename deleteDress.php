<?php

require "connection.php";

$DressId = $_GET["json"];
// echo($DressId);




$jsonTophp = json_decode($DressId);
$id = $jsonTophp->id;

// echo($id);

$dress_id = Database::search("SELECT * FROM `dress` WHERE `Dress_code`='" . $id . "' ");
$dress_id_rs = $dress_id->num_rows;
$dress_id_data = $dress_id->fetch_assoc();


// echo();

$dressID = $dress_id_data["id"];

$cart_id = Database::search("SELECT * FROM `cart` WHERE `Dress_id`='" . $dressID . "' ");
$cart_num_rs = $cart_id->num_rows;


for ($i = 0; $i < $cart_num_rs; $i++) {
    # code...
    $cart_data = $cart_id->fetch_assoc();
    Database::includ("DELETE FROM `cart_has_dress_sizes` WHERE `cart_cid`='" . $cart_data["cid"] . "'");
    Database::includ("DELETE FROM `cart` WHERE `cid`='" . $cart_data["cid"] . "'");

    // echo ($cart_data["cid"]);
}

Database::includ("DELETE FROM `drees_image` WHERE `Dress_id`='" . $dressID . "'");
Database::includ("DELETE FROM `dress_has_dress_sizes` WHERE `Dress_id`='" . $dressID . "'");
Database::includ("DELETE FROM `wichlist` WHERE `Dress_id`='" . $dressID . "'");

Database::includ("DELETE FROM `dress` WHERE `id`='" . $dressID . "'");

echo ("ok");

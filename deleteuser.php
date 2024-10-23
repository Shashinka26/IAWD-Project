<?php

// echo("jgbhj");

require "connection.php";

$json=$_POST["json"];

// echo($json);

$jsonToObj=json_decode($json);
$email=$jsonToObj->email;

// echo($email);

$user=Database::search("SELECT * FROM `user` WHERE `email`='".$email."'");
$user_data=$user->fetch_assoc();

$cart_id = Database::search("SELECT * FROM `cart` WHERE `user_email`='" . $email . "' ");
$cart_num_rs = $cart_id->num_rows;


for ($i = 0; $i < $cart_num_rs; $i++) {
    # code...
    $cart_data = $cart_id->fetch_assoc();
    Database::includ("DELETE FROM `cart_has_dress_sizes` WHERE `cart_cid`='" . $cart_data["cid"] . "'");
    Database::includ("DELETE FROM `cart` WHERE `cid`='" . $cart_data["cid"] . "'");

    // echo ($cart_data["cid"]);
}

Database::includ("DELETE FROM `user_image` WHERE `user_email`='".$email."'");
Database::includ("DELETE FROM `user_has_city` WHERE `user_email`='".$email."'");
Database::includ("DELETE FROM `wichlist` WHERE `user_email`='".$email."'");
Database::includ("DELETE FROM `buydress_has_city1` WHERE `user_email`='".$email."'");
Database::includ("DELETE FROM `user` WHERE `email`='".$email."'");

echo("ok");

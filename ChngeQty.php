<?php

require "connection.php";



$json = $_GET["json"];

// echo($json);

$jsonToObj = json_decode($json);
$qty = $jsonToObj->qty;
$cid = $jsonToObj->id;
$email = $jsonToObj->email;






$cart = Database::search("SELECT * FROM `cart`  WHERE  `user_email`='" . $email . "' AND `cid`='" . $cid . "'  ");

$cart_num = $cart->num_rows;

// echo ($cart_num);

if ($cart_num == 1) {

    $cartHasSize = Database::search("SELECT * FROM `cart_has_dress_sizes` WHERE `cart_cid`='" . $cid . "' ");

    $cartHas_num = $cartHasSize->num_rows;

    $cartHas_data = $cartHasSize->fetch_assoc();

    // echo($cartHas_data["csid"]);
    // echo($csid);



    if ($cart_num == 1) {

        Database::includ("UPDATE `cart_has_dress_sizes` SET `qty`='" . $qty . "' WHERE `csid`='" . $cartHas_data["csid"] . "'");
    }
}

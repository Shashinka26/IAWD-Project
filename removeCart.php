<?php 


require "connection.php";


// echo("'gdhg");

$json=$_GET["json"];

$jsonToobj=json_decode($json);
$cartId=$jsonToobj->id;

// echo($cartId);


Database::includ("DELETE FROM `cart_has_dress_sizes` WHERE `cart_cid`='".$cartId."'");
Database::includ("DELETE FROM `cart` WHERE `cid`='".$cartId."'");

      ;

echo("ok");

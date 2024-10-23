<?php

require "connection.php";

// echo("kbj");

$json = $_GET["json"];

$jsonToObj = json_decode($json);
$id = $jsonToObj->id;

// echo ($id);

$splitDate = explode("_", $id);
$id = $splitDate[0];
$dressCode= $splitDate[1];


// echo($id);
// echo($dressCode);

Database::includ("DELETE FROM `wichlist` WHERE `wid`='".$id."' AND `dress_code`='".$dressCode."'");

echo("Remove wichlist")

?>
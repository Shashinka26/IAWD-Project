<?php

require "connection.php";

$json=$_POST["json"];

// echo($json);

$jsonToObj=json_decode($json);
$email=$jsonToObj->id;

$user=Database::search("SELECT * FROM `user` WHERE `email`='".$email."'");
$user_data=$user->fetch_assoc();



Database::includ("UPDATE `user` SET `status`='1' WHERE `email`='".$email."'");

echo($user_data["fname"] ." ". $user_data["lname"]."  Unblock");


?>
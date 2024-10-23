<?php

require "connection.php";
session_start();
$email = $_SESSION["u"]["email"];


// echo("jbjb");


$json = $_POST["json"];

$jsonToobj = json_decode($json);
$dstric = $jsonToobj->dsric;
$pcode = $jsonToobj->pcode;


// echo($dstric);


if (empty($dstric)) {
    echo ("please Enter City !!!");
} else {


    $dstrc_rs = Database::search("SELECT * FROM `city`  WHERE `city_name`='" . $dstric . "'");

    $dstric_num = $dstrc_rs->num_rows;
    $dstric_data = $dstrc_rs->fetch_assoc();
    // echo($dstric_num );

    if ($dstric_num>0 ) {
        $conformcity = Database::search("SELECT * FROM `buydress_has_city1` WHERE `user_email`='" . $email . "'");
        $conformcity_num = $conformcity->num_rows;

        // echo($conformcity_num);
        if ($conformcity_num > 0) {
            Database::includ("UPDATE `buydress_has_city1` SET `city_id`='" . $dstric_data["id"] . "' WHERE `user_email`='" . $email . "'");
            if (!empty($pcode)) {
                Database::includ("UPDATE `buydress_has_city1` SET `Postcode`='" . $pcode . "' WHERE `user_email`='" . $email . "'");
            }
            echo ("Ok");
        } else {
            // echo ("fuck");
            Database::includ("INSERT INTO `buydress_has_city1`(`user_email`,`city_id`) VALUE ('" . $email . "','" . $dstric_data["id"] . "')");
            if (!empty($pcode)) {
                Database::includ("UPDATE `buydress_has_city1` SET `Postcode`='" . $pcode . "' WHERE `user_email`='" . $email . "'");
            }
            echo ("Ok");
        }
    }


    // echo ($dstric_data["id"]);





    // echo ($dstric);
}

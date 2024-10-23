<?php

require "connection.php";

// echo("fkjkn");

$json=$_GET["json"];

// echo($json);

$phpJson=json_decode($json);

$phpMateril=$phpJson->addmater;

// echo($phpMateril);

$materilaCheck_rs=Database::search("SELECT * FROM `materiale` WHERE `material_name`='".$phpMateril."'");
$materilaCheck_num=$materilaCheck_rs->num_rows;

if($materilaCheck_num>0){
    echo("This Materila Allredy Added !!");

}else{

    Database::includ("INSERT INTO `materiale`(`material_name`) VALUES ('".$phpMateril."')");

    $AddmaterialChecked_rs=Database::search("SELECT * FROM `materiale` WHERE `material_name`='".$phpMateril."' ");
    $AddmaterialChecked_data=$AddmaterialChecked_rs->fetch_assoc();

    // echo($AddmaterialChecked_data["material_name"]);

    $phpObj=new stdClass();
    $phpObj->mn=$AddmaterialChecked_data["material_name"];

    $json2=json_encode($phpObj);

    echo($json2);




}



?>
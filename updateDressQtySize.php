<?php


require "connection.php";

$jsonText = $_POST["json"];

// echo($jsonText);

$jsonToobj = json_decode($jsonText);
$id = $jsonToobj->id;
$therrXl = $jsonToobj->therxl;
$twoXl = $jsonToobj->twoxl;
$Xl = $jsonToobj->xl;
$l = $jsonToobj->l;
$M = $jsonToobj->M;
$s = $jsonToobj->s;

if(empty($therrXl)){
    echo("please Inseart 3xl Qty");
}else if(empty($twoXl)){
    echo("please Inseart 2xl Qty");
}else if(empty($Xl)){
    echo("please Inseart xl Qty");
}else if(empty($l)){
    echo("please Inseart l Qty");
}else if(empty($M)){
    echo("please Inseart M Qty");
}else if(empty($s)){
    echo("please Inseart S Qty");
}else{

Database::includ("UPDATE `dress_has_dress_sizes` SET `Dressqty`='".$therrXl."' WHERE `Dress_id`='" . $id . "' AND `dress_sizes_id`='1' ");
Database::includ("UPDATE `dress_has_dress_sizes` SET `Dressqty`='".$twoXl."' WHERE `Dress_id`='" . $id . "' AND `dress_sizes_id`='2' ");
Database::includ("UPDATE `dress_has_dress_sizes` SET `Dressqty`='".$Xl."' WHERE `Dress_id`='" . $id . "' AND `dress_sizes_id`='3' ");
Database::includ("UPDATE `dress_has_dress_sizes` SET `Dressqty`='".$l."' WHERE `Dress_id`='" . $id . "' AND `dress_sizes_id`='4' ");
Database::includ("UPDATE `dress_has_dress_sizes` SET `Dressqty`='".$M."' WHERE `Dress_id`='" . $id . "' AND `dress_sizes_id`='5' ");
Database::includ("UPDATE `dress_has_dress_sizes` SET `Dressqty`='".$s."' WHERE `Dress_id`='" . $id . "' AND `dress_sizes_id`='6' ");

echo("Update Qty sucess");
}




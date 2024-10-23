<?php

require "connection.php";

// echo("okk");

$josn=$_GET["json"];

// echo($josn);

$jsonTophp=json_decode($josn);
    
$product_id=$jsonTophp->id;

// echo($product_id);

                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                           

$product=Database::search("SELECT * FROM `dress` WHERE `id`='".$product_id."'");
$product_data=$product->fetch_assoc();

// echo($product_data["Stutus"]);

$phpObj= new stdClass();


if($product_data["Stutus"]==1){

    Database::includ("UPDATE `dress` SET `Stutus`='0' WHERE `id`='".$product_id."'");

    // echo("ok1");

    $phpObj->deactive="Deactive";


}else if($product_data["Stutus"]==0){
    Database::includ("UPDATE `dress` SET `Stutus`='1' WHERE  `id`='".$product_id."'");

    // echo("ok2");

    $phpObj->active="Active";


}

$phpObj->productId=$product_id;


$phpTojson=json_encode($phpObj);

echo($phpTojson);

?>





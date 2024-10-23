<?php

// echo("okk");
session_start();

require "connection.php";

$admin = $_SESSION["ad"];


$json = $_POST["json"];

$jsonToobj = json_decode($json);


$fn = $jsonToobj->fn;
$ln = $jsonToobj->ln;
$mobi = $jsonToobj->mobi;
$city = $jsonToobj->city;
$dis = $jsonToobj->dis;
$adress = $jsonToobj->adre;
$province = $jsonToobj->pro;
$gendr = $jsonToobj->gender;


// echo($fn);
// echo($ln);
// echo($mobi);
// echo($city);
// echo($dis);
// echo($adress);
// echo($province);
// echo($gendr);




if (isset($_FILES["image"])) {
    // echo("ok");
    $image = $_FILES["image"];

    $allowes_image_extentions = array("image/jpg", "image/jpeg", "image/png", "image/svg", "image/svg+xml");
    $file_ex = $image["type"];
    // echo($file_ex);

    if (!in_array($file_ex, $allowes_image_extentions)) {
        echo ("Please select a valid image");
    } else {

        $new_file_extention;

        if ($file_ex == "image/jpg") {
            $new_file_extention = ".jpg";
        } else if ($file_ex == "image/jpeg") {
            $new_file_extention = ".jpeg";
        } else if ($file_ex == "image/png") {
            $new_file_extention = ".png";
        } else if ($file_ex == "image/svg") {
            $new_file_extention = ".svg";
        } else if ($file_ex == "image/svg+xml") {
            $new_file_extention = ".svg";
        }
        // echo($new_file_extention);

        $file_name = "images/admin/" . $admin["fname"] . "_" . uniqid() . $new_file_extention;
        // echo($file_name);

        move_uploaded_file($image["tmp_name"], $file_name);
        // echo("ok");

        $userimg_rs = Database::search("SELECT * FROM `admin_imge` WHERE `admin_email`='" . $admin["email"] . "'");
        $userimg_num = $userimg_rs->num_rows;

        // echo($userimg_num);

        if ($userimg_num == 1) {
            Database::includ("UPDATE  `admin_imge` SET `image_path`='" . $file_name . "' WHERE `admin_email`='" .  $admin["email"] . "'");
        } else {
            Database::includ("INSERT INTO `admin_imge`(`Image_path`,`admin_email`) VALUES
            ('" . $file_name . "','" . $admin["email"] . "')");
            // echo ("ok");
        }
    }
}


// $gendre_rs=Database::search("SELECT * FROM `admin` WHERE `gender_id`='".$gendr."'  AND  `email`='" .$admin["email"]. "'"   );
// $gendre_num=$gendre_rs->num_rows;

// echo($gendre_num);

// if($gendre_num==0){
//     Database::includ("UPDATE `admin` SET `gender_id`='" . $gendr . "'");

//     // echo ("ok");
// }else{
//     Database::includ("UPDATE `admin` SET `gender_id`='" . $gendr . "'");

// }



Database::includ("UPDATE `admin` SET `fname`='" . $fn . "',`lname`='" . $ln . "',`mobile`='" . $mobi . "',`adress`='" . $adress . "' WHERE `email`='" .$admin["email"]. "'");



// echo($json);

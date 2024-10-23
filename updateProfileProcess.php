<?php

// echo("hhh");
session_start();

require "connection.php";

if (isset($_SESSION["u"])) {

    $fname = $_POST["f"];
    $lname = $_POST["l"];
    $mobile = $_POST["m"];
    $line1 = $_POST["ln1"];
    $line2 = $_POST["ln2"];
    $province = $_POST["p"];
    $distric = $_POST["d"];
    $city = $_POST["c"];
    $postcode = $_POST["pc"];
    $height = $_POST["he"];

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

            $file_name = "images/users/" . $_SESSION["u"]["fname"] . "_" . uniqid() . $new_file_extention;
            // echo($file_name);

            move_uploaded_file($image["tmp_name"], $file_name);
            // echo("ok");

            $userimg_rs = Database::search("SELECT * FROM `user_image` WHERE `user_email`='" . $_SESSION["u"]["email"] . "'");
            $userimg_num = $userimg_rs->num_rows;

            // echo($userimg_num);

            if ($userimg_num == 1) {
                Database::includ("UPDATE  `user_image` SET `Image_path`='" . $file_name . "' WHERE `user_email`='" . $_SESSION["u"]["email"] . "'");
            } else {
                Database::includ("INSERT INTO `user_image`(`Image_path`,`user_email`) VALUES
                ('" . $file_name . "','" . $_SESSION["u"]["email"] . "')");
                // echo ("ok");
            }
        }
    }

    Database::includ("UPDATE `user` SET `fname`='" . $fname . "',`lname`='" . $lname . "',`mobile`='" . $mobile . "',`height`='" . $height . "' WHERE `email`='" . $_SESSION["u"]["email"] . "'");


    $useraddress_rs=Database::search("SELECT * FROM `user_has_city` WHERE `user_email`='".$_SESSION["u"]["email"]."'");
    $useraddress_num=$useraddress_rs->num_rows;

    if($useraddress_num==1){
        Database::includ("UPDATE `user_has_city` SET `city_id`='".$city."',`line1`='".$line1."',`line2`='".$line2."' ,`post_code`='".$postcode."' WHERE `user_email`='".$_SESSION["u"]["email"]."'");
    }else{
        Database::includ("INSERT INTO `user_has_city`(`user_email`,`city_id`,`line1`,`line2`,`post_code`) VALUES ('".$_SESSION["u"]["email"]."','".$city."','".$line1 ."','".$line2."','".$postcode."')");
        
    }

    $useraddress_rs2=Database::search("SELECT * FROM `buydress_has_city1` WHERE `user_email`='".$_SESSION["u"]["email"]."'");
    $useraddress_num2=$useraddress_rs2->num_rows;
    if($useraddress_num2==1){
        Database::includ("UPDATE `buydress_has_city1` SET `city_id`='".$city."',`adressLine`='".$line1."''".$line2."' ,`Postcode`='".$postcode."',`mobile_num`='".$mobile."' WHERE `user_email`='".$_SESSION["u"]["email"]."'");
    }else{
        Database::includ("INSERT INTO `buydress_has_city1`(`user_email`,`city_id`,`adressLine`,`Postcode`,`mobile_num`) VALUES ('".$_SESSION["u"]["email"]."','".$city."','".$line1 ."''".$line2."','".$postcode."','".$mobile."')");
        
    }

    echo("Update success");


} else {
    echo ("Plase Sign In First!!!");
}

<?php

use function PHPSTORM_META\elementType;

require "connection.php";

// echo("kdhjj");
if (isset($_POST["json"])) {
    $json = $_POST["json"];

    // echo ($json);

    $jsonToobj = json_decode($json);
    $qty = $jsonToobj->qty;
    $dresscost1 = $jsonToobj->dc1;
    $dresscost2 = $jsonToobj->dc2;
    $id = $jsonToobj->id;


    // echo($qty);
    // echo($id);
    // echo($dresscost2);

    $dress = Database::search("SELECT * FROM `dress` WHERE `id`='" . $id . "'");
    $dress_num = $dress->num_rows;
    $dress_data = $dress->fetch_assoc();

    if ($dress_data["qty"] == $qty && $dress_data["delivery_fee"] == $dresscost1 && $dress_data["Delevery_fee_Westen"] == $dresscost2) {
        echo ("Don't have anything you want to uplode ?");
    } else {

        $updateproduct_rs = Database::includ("UPDATE `dress` SET `qty`='" . $qty . "', `delivery_fee`='" . $dresscost1 . "', `Delevery_fee_Westen`='" . $dresscost2 . "' WHERE `id`='" . $id . "'");
        echo ("Dress Uplode Success");

    }

    $letgth = sizeof($_FILES);
    $allowed_imge_extentions = array("image/jpg", "image/jpeg", "image/png", "image/svg+xml");
    // echo($letgth);
    if ($letgth > 0) {
        Database::includ("DELETE FROM `drees_image` WHERE `Dress_id`='" . $id . "' ");
    }


    for ($x = 0; $x < $letgth; $x++) {
        if (isset($_FILES["image" . $x])) {

            $img_file = $_FILES["image" . $x];
            $file_extention = $img_file["type"];

            // echo ($file_extention);
            if (in_array($file_extention, $allowed_imge_extentions)) {

                // echo("ok");

                $new_img_extention;

                if ($file_extention == "image/jpg") {
                    $new_img_extention = ".jpg";
                } else if ($file_extention == "image/jpeg") {
                    $new_img_extention = ".jpeg";
                } else if ($file_extention == "image/png") {
                    $new_img_extention = ".png";
                } else if ($file_extention == "image/svg+xml") {
                    $new_img_extention = '.svg';
                }

                // echo($new_img_extention);
                $fil_name = "images/dress/" . $dress_data["Dress_code"] . "_" . $x . "_" . uniqid() . $new_img_extention;
                // echo($fil_name);
                // echo($img_file["tmp_name"]);
                move_uploaded_file($img_file["tmp_name"], $fil_name);



                // echo("ok");

                // echo($fil_name);

                // Database::includ("INSERT INTO `drees_image`(`image_path`,`Dress_id`) VAlUES ('".$fil_name."','".$id."')");
                Database::includ("INSERT INTO `drees_image`(`image_path`,`Dress_id`) VAlUES ('" . $fil_name . "','" . $id . "')");
                echo ("Dress Uplode Success");
                // Database::includ("UPDATE `drees_image` SET `image_path`='" . $fil_name . "' AND  `Dress_id`='" . $id . "'");
            } else {
                echo ("file type not allower");
            }
        }else{
            echo ("Don't have anything you want to uplode ? ");

        }
    }

    // echo ("Don't have anything you want to uplode ? ");
} 



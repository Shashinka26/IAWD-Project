<?php

require "connection.php";

session_start();


// echo($jsonText);

if (isset($_SESSION["ad"])) {
    $admin = $_SESSION["ad"];



    if (isset($_POST["json"])) {



        $json = $_POST["json"];
        // $image = $_POST["image"];

        $convertObject = json_decode($json);
        $drescode = $convertObject->Dcode;
        $dressCost = $convertObject->Dcost;
        $dressQty = $convertObject->qty;
        $dressDilivry = $convertObject->Dlivery;
        $dressDilivry2 = $convertObject->Dlivery2;
        $dressmterial = $convertObject->materiyalNAme;
        $Modelsize1 = $convertObject->Modelize;

        
        $length = sizeof($_FILES);




        // echo ($drescode);
        // echo ($dressCost);
        // echo ($dressQty);
        // echo ($dressDilivry);
        // echo ($dressmterial);
        // echo($Modelsize1 );


        $dressmterial_rs = Database::search("SELECT * FROM `materiale` WHERE `material_name`='" . $dressmterial . "'");
        $dressmterial_num = $dressmterial_rs->num_rows;
        $dressmterial_data = $dressmterial_rs->fetch_assoc();

     


        // echo( $dressmterial_data["id"]);

        $select_dressCode = Database::search("SELECT *  FROM `dress` WHERE `Dress_code`='" . $drescode . "'");
        $select_dressCode_data = $select_dressCode->num_rows;

        // echo($select_dressCode_data);





        // echo($length);


        if (empty($drescode)) {
            echo ("Please Enter a DressCode !!");
        } else  if ($select_dressCode_data > 0) {
            echo ("This Dress Olredy Add !! ");
        } else if (strlen($drescode) >= 100) {
            echo ("DressCode should have lower than 50 characters!");
        } else if (empty($dressCost)) {
            echo ("Please enter the Price!");
        } else if (!is_numeric($dressCost)) {
            echo ("Invalid input for Cost!");
        } else if (empty($dressQty)) {
            echo ("Please Enter the Quantity!");
        } else if ($dressQty == "0" | $dressQty == "e" | $dressQty < 0) {
            echo ("Invalid input for Quantity!");
        } else if (empty($dressDilivry)) {
            echo ("Please enter the delivery fee !");
        } else if (!is_numeric($dressDilivry)) {
            echo ("Invalid input for delivery cost !");
        } else if (empty($dressDilivry2)) {
            echo ("Please enter the delivery fee for Western !");
        } else if (!is_numeric($dressDilivry2)) {
            echo ("Invalid input for delivery fee for Western !");
        } else if (empty($dressmterial)) {
            echo ("Please Select the dress material !");
        } else if (!$dressmterial_num == 1) {
            echo ("Invalide dress material !");
        } else if ($length == 0) {
            echo ("please Inseart Imgess ! ");
        } else {


            // echo ("ok");

            $status = 1;

            $d = new DateTime();
            $tz = new DateTimeZone("Asia/Colombo");
            $d->setTimezone($tz);
            $date = $d->format("Y-m_d H:i:s");

            Database::includ("INSERT INTO `dress`(`Dress_code`,`price`,`qty`,`delivery_fee`,`add_date_time`,`materiale_id`,`admin_email`,`Stutus`,`Delevery_fee_Westen`,`Model_size_id`) VALUES
         ('" . $drescode . "','" . $dressCost . "','" . $dressQty . "','" . $dressDilivry . "','" . $date . "','" . $dressmterial_data["id"] . "','" . $admin["email"] . "','" . $status . "','" . $dressDilivry2 . "','" . $Modelsize1 . "') ");

            $product_id = Database::$connection->insert_id;



            if (!$length <= 3 && $length > 0) {
                $allowed_imge_extentions = array("image/jpg", "image/jpeg", "image/png", "image/svg+xml");


                for ($x = 0; $x < $length; $x++) {
                    if (isset($_FILES["image" . $x])) {

                        $img_file = $_FILES["image" . $x];
                        $file_extention = $img_file["type"];

                        // echo ($file_extention);
                        if (in_array($file_extention, $allowed_imge_extentions)) {

                            // echo("ok");


                            // echo ($dressmterial_data["id"]);


                          


                        


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

                            $fil_name = "images/dress/" . $drescode . "_" . $x . "_" . uniqid() . $new_img_extention;
                            move_uploaded_file($img_file["tmp_name"], $fil_name);
                            // echo("ok");

                            Database::includ("INSERT INTO `drees_image`(`image_path`,`Dress_id`) VAlUES ('" . $fil_name . "','" . $product_id . "')");

                            echo ("Add Compleate");
                        } else
                            echo ("inavalid Image type");
                    }
                }
            } else {
                echo ("Invalid Image count");
            }
        }
    }





    // echo($length);







    if (isset($_GET["json"])) {
        // echo ("j");
        $jsonText = $_GET["json"];
        $phpJson = json_decode($jsonText);
        $DressSize = $phpJson->id;
        $allSize = $phpJson->as;
        $DressCode = $phpJson->dressId;



        // echo ($DressId);
        // echo ($DressSize);


        $dressId_rs = Database::search("SELECT * FROM `dress` WHERE `Dress_code`='" . $DressCode . "'");
        $dressId_num = $dressId_rs->num_rows;

        $dressId_data = $dressId_rs->fetch_assoc();
        // echo($dressId_data["id"]);

        // echo ($dressId_num);



        $dressSize_rs = Database::search("SELECT * FROM `dress_sizes` WHERE `id`='" . $DressSize . "' ");
        $dressSize_num = $dressSize_rs->num_rows;
        $dressSize_data = $dressSize_rs->fetch_assoc();

        // if ($dressSize_num == 1) {
        //     echo ("fuxl");
        // }
        // echo($dressSize_num);

        $checkdressSize_rs = Database::search("SELECT * FROM `dress_has_dress_sizes` WHERE `Dress_id`='" . $dressId_data["id"] . "'");
        $checkdressSize_num = $checkdressSize_rs->num_rows;


        // echo ($checkdressSize_num);


        $repetSize_rs = Database::search("SELECT * FROM `dress_has_dress_sizes` WHERE `Dress_id`='" . $dressId_data["id"] . "'  AND `dress_sizes_id`='" . $DressSize . "' ");
        $repetSize_num = $repetSize_rs->num_rows;




        if ($dressId_num > 0) {


            $php0bj = new stdClass();


            if ($repetSize_num > 0) {

                // echo("The size alredy added this Dress !!");
                $php0bj->SizeAlredy ="Sizealredy";

            } else if ($dressSize_num == 1) {

                if ($checkdressSize_num < 6) {


                    Database::includ("INSERT INTO `dress_has_dress_sizes`(`Dress_id`,`dress_sizes_id`,`Dressqty`) VALUES ('" . $dressId_data["id"] . "','" . $DressSize . "','".$dressId_data["qty"]."')");
                    // echo ($dressSize_data["sizes_name"]);

                    // $dreSizeName = $dressSize_data["sizes_name"];
                    // echo($dressSize_data["sizes_name"]);
                    $php0bj->drssSize = ($dressSize_data["sizes_name"] )."_Size add";
                } else {
                    $php0bj->alredyadd ="alredyAdd";

                    // echo ("alredy add Dress Size !! ");
                }
            } else if (isset($allSize)) {

                if ($checkdressSize_num == 0) {


                    Database::includ("INSERT INTO `dress_has_dress_sizes`(`Dress_id`,`dress_sizes_id`,`Dressqty`) VALUES ('" . $dressId_data["id"] . "','1','".$dressId_data["qty"]."')");
                    Database::includ("INSERT INTO `dress_has_dress_sizes`(`Dress_id`,`dress_sizes_id`,`Dressqty`) VALUES ('" . $dressId_data["id"] . "','2','".$dressId_data["qty"]."')");
                    Database::includ("INSERT INTO `dress_has_dress_sizes`(`Dress_id`,`dress_sizes_id`,`Dressqty`) VALUES ('" . $dressId_data["id"] . "','3','".$dressId_data["qty"]."')");
                    Database::includ("INSERT INTO `dress_has_dress_sizes`(`Dress_id`,`dress_sizes_id`,`Dressqty`) VALUES ('" . $dressId_data["id"] . "','4','".$dressId_data["qty"]."')");
                    Database::includ("INSERT INTO `dress_has_dress_sizes`(`Dress_id`,`dress_sizes_id`,`Dressqty`) VALUES ('" . $dressId_data["id"] . "','5','".$dressId_data["qty"]."')");
                    Database::includ("INSERT INTO `dress_has_dress_sizes`(`Dress_id`,`dress_sizes_id`,`Dressqty`) VALUES ('" . $dressId_data["id"] . "','6','".$dressId_data["qty"]."')");


                  
                    $php0bj->drssAllSize = "AllSizes";
                } else {

                    $php0bj->alredyadd2 ="alredyAdd2";
                    // echo ("alredy add Dress Size !! ");
                }
            } else {
                echo ("Invalide Dress Code !!");
                $php0bj->Invaidedress ="InvaideDress";

            }

            $convertjosn = json_encode($php0bj);


            echo ($convertjosn);
        }
    }
}

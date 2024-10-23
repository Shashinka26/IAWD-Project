<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    session_start();
    if (isset($_SESSION["ad"])) {

        $admin = $_SESSION["ad"];



        require "connection.php";

        $admingender = Database::search("SELECT * FROM `admin` INNER JOIN `gender` ON gender.id=admin.gender_id WHERE `email`='" . $admin["email"] . "' ");
        $admingener_data = $admingender->fetch_assoc();


        $useradress_rs = Database::search("SELECT * FROM `admin` INNER JOIN `city` ON  admin.city_id=city.id INNER JOIN `district` ON 
        city.district_id=district.id INNER JOIN `province` ON district.province_id=province.id WHERE `email`='" . $admin["email"] . "'");
        $useradress_data = $useradress_rs->fetch_assoc();

        $admin_rs = Database::search("SELECT * FROM `admin` WHERE `email`='" . $admin["email"] . "' ");
        $admin_data = $admin_rs->fetch_assoc();

        // echo($admin_data["fname"]);




    ?>

        <div class="container-fluid overflow-hidden">
            <div class="row">



                <div class="col-12 p-lg-2 ps-2 pe-2 pb-2 pt-2">
                    <div class="row">
                        <div class=" col-12 d-flex justify-content-center ">
                            <label for="" class="fs-3 fw-bold opacity-75 "> <i class="bi bi-arrow-clockwise fs-3 fw-bold"></i>&nbsp;UpDate Profile</label>
                        </div>


                    </div>

                    <div class="col-12 d-flex justify-content-center align-items-center mt-4">
                        <div class="col-12  d-flex justify-content-center align-items-center border border-2 p-2" style="border-radius: 5px;">



                            <div class="col-12 ">
                                <div class="row">





                                    <div class="col-12 col-lg-6 ">
                                        <div class="row justify-content-center">

                                            <div class="col-10 d-flex p-3 justify-content-start align-items-center">
                                                <label for="" class="fs-6 opacity-75">First Name</label>
                                            </div>
                                            <div class="col-10 d-flex justify-content-center align-items-center">




                                                <input type="text" class="form-control opacity-75 fw-bold" placeholder="Add youer First Name !!" id="fn" value="<?php echo ( $admin_data["fname"]) ?>">


                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-6 ">
                                        <div class="row justify-content-center">

                                            <div class="col-10 p-3 d-flex justify-content-start align-items-center">
                                                <label for="" class="fs-6 opacity-75">Last name</label>
                                            </div>
                                            <div class="col-10 d-flex justify-content-center align-items-center">


                                                <input type="text" class="form-control opacity-75 fw-bold" placeholder="Add youer Last Name !!" id="ln" value="<?php echo ( $admin_data["lname"]) ?>">


                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-12  mt-2">
                                        <div class="row justify-content-center">

                                            <div class="col-lg-11 col-10 p-3 d-flex justify-content-start align-items-center">
                                                <label for="" class="fs-6 opacity-75">Email </label>
                                            </div>
                                            <div class="col-lg-11 col-10  d-flex justify-content-center align-items-center">
                                                <input type="email" class="form-control opacity-75 fw-bold" disabled value="<?php echo ( $admin_data["email"]) ?>" >
                                            </div>
                                        </div>
                                    </div>






                                    <div class="col-12 col-lg-6 ">
                                        <div class="row justify-content-center">

                                            <div class="col-10 p-3 d-flex justify-content-start align-items-center">
                                                <label for="" class="fs-6 opacity-75">Mobile </label>

                                            </div>
                                            <div class="col-10 d-flex justify-content-center align-items-center">

                                                <input type="text" class="form-control opacity-75 fw-bold" placeholder="Add youer mobile number 0 !!" id="mobile" value="<?php echo ( $admin_data["mobile"]) ?>">


                                            </div>
                                        </div>
                                    </div>




                                    <div class="col-12 col-lg-6 ">
                                        <div class="row justify-content-center">

                                            <div class="col-10 p-3 d-flex justify-content-start align-items-center">
                                                <label for="" class="fs-6 opacity-75">Adress</label>
                                            </div>
                                            <div class="col-10 d-flex justify-content-center align-items-center">


                                                <input type="text" class="form-control opacity-75 fw-bold" placeholder="Add youer Adress   !!" id="adress" value="<?php echo ( $admin_data["adress"]) ?>">


                                            </div>
                                        </div>
                                    </div>

                                    <?php





                                    $province_rs = Database::search("SELECT * FROM `province` ");
                                    $distric_rs = Database::search("SELECT * FROM `district` ");
                                    $city_rs =   Database::search("SELECT * FROM `city` ");
                                    $gender_rs =   Database::search("SELECT * FROM `gender` ");

                                    $gender_num = $gender_rs->num_rows;
                                    // echo ($gender_num);






                                    ?>



                                    <div class="col-12 col-lg-6 mt-2">
                                        <div class="row justify-content-center">

                                            <div class="col-10 d-flex p-3 justify-content-start align-items-center">
                                                <label for="" class="fs-6 opacity-75">City</label>
                                            </div>
                                            <div class="col-10 d-flex justify-content-center align-items-center">
                                                <select name="" class="form-select opacity-75 fw-bold" id="city">
                                                    <option value="0">Select City</option>

                                                    <?php
                                                    $city_num = $city_rs->num_rows;
                                                    for ($x = 0; $x < $city_num; $x++) {

                                                        $city_data = $city_rs->fetch_assoc();
                                                    ?>
                                                        <option value="<?php echo ($city_data["id"]); ?>" <?php if (!empty($adminadress_data["city_id"])) {
                                                                                                                if ($city_data["id"] == $adminadress_data["city_id"]) {
                                                                                                            ?>selected<?php

                                                                                                                    }
                                                                                                                } ?>><?php echo ($city_data["city_name"]); ?></option>

                                                    <?php
                                                    }


                                                    ?>

                                                </select>

                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-6 mt-2">
                                        <div class="row justify-content-center">

                                            <div class="col-10 p-3 d-flex justify-content-start align-items-center">
                                                <label for="" class="fs-6 opacity-75">Distric</label>
                                            </div>
                                            <div class="col-10 d-flex justify-content-center align-items-center">
                                                <select name="" class="form-select opacity-75 fw-bold" id="distric" onchange="load_city();">
                                                    <option value="0">Select Distric</option>

                                                    <?php
                                                    $distric_num = $distric_rs->num_rows;

                                                    for ($x = 0; $x < $distric_num; $x++) {

                                                        $distric_data = $distric_rs->fetch_assoc();
                                                    ?>
                                                        <option value="<?php echo ($distric_data["id"]); ?>" <?php if (!empty($adminadress_data["distirc_id"])) {

                                                                                                                    if ($distric_data["id"] == $adminadress_data["distirc_id"]) {
                                                                                                                ?>selected<?php
                                                                                                                        }
                                                                                                                    } ?>><?php echo ($distric_data["distric_name"]); ?></option>

                                                    <?php
                                                    }


                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 col-lg-6 mt-2 mb-2">
                                        <div class="row justify-content-center">

                                            <div class="col-10 p-3 d-flex justify-content-start align-items-center">
                                                <label for="" class="fs-6 opacity-75">Province</label>
                                            </div>
                                            <div class="col-10 d-flex justify-content-center align-items-center">
                                                <select name="" class="form-select opacity-75 fw-bold" onchange="load_distic();" id="provinc">
                                                    <option value="0">Select Province</option>
                                                    <?php

                                                    $province_num = $province_rs->num_rows;

                                                    for ($x = 0; $x < $province_num; $x++) {

                                                        $province_data = $province_rs->fetch_assoc();
                                                    ?>
                                                        <option value="<?php echo ($province_data["id"]); ?>" <?php if (!empty($adminadress_data["province_id"])) {

                                                                                                                    if ($province_data["id"] == $adminadress_data["province_id"]) {
                                                                                                                ?>selected<?php
                                                                                                                        }
                                                                                                                    } ?>><?php echo ($province_data["province_name"]); ?></option>

                                                    <?php
                                                    }


                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 col-lg-6 mt-2">
                                        <div class="row justify-content-center">

                                            <div class="col-10 p-3 d-flex justify-content-start align-items-center">
                                                <label for="" class="fs-6 opacity-75">Gender</label>
                                            </div>
                                            <div class="col-10 d-flex justify-content-center align-items-center">
                                                <select name="" class="form-select opacity-75 fw-bold " id="gender">
                                                    <option value="0">Select Gender</option>

                                                    <?php

                                                    // echo($gender_num);

                                                    for ($x = 0; $x < $gender_num; $x++) {

                                                        $gender_data = $gender_rs->fetch_assoc();
                                                    ?>
                                                        <option value="<?php echo ($gender_data["id"]); ?>" <?php if (!empty($adminadress_data["distirc_id"])) {

                                                                                                                if ($distric_data["id"] == $adminadress_data["distirc_id"]) {
                                                                                                            ?>selected<?php
                                                                                                                    }
                                                                                                                } ?>><?php echo ($gender_data["gender_name"]); ?></option>

                                                    <?php
                                                    }


                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 mt-5 mb-4">
                                        <div class="row">
                                            <div class="col-12 col-lg-6">
                                                <div class="row justify-content-center">
                                                    <div class="col-lg-6 col-12 d-flex justify-content-lg-end justify-content-center align-items-center ">
                                                        <div class="border border-2 d-flex justify-content-center align-items-center" style="height: 11rem; width: 11rem;">

                                                            <?php
                                                            $adminImge_rs = Database::search("SELECT * FROM `admin_imge` WHERE `admin_email`='" . $admin["email"] . "'");
                                                            $adminImge_num = $adminImge_rs->num_rows;

                                                            // echo ($adminImge_num);

                                                            if ($adminImge_num == 1) {

                                                                $adminImge_data = $adminImge_rs->fetch_assoc();

                                                            ?>

                                                                <img src="<?php echo ($adminImge_data["image_path"]); ?>" style="height: 10rem; width: 10rem;" alt="" id="imgeView">


                                                            <?php

                                                            } else {
                                                            ?>

                                                                <img src="./images/icon/add_adminprofile.png" style="height: 10rem; width: 10rem; " alt="" id="imgeView">



                                                            <?php
                                                            }


                                                            ?>

                                                        </div>
                                                    </div>
                                                    <div class="col-lg-5  col-12 d-grid d-flex justify-content-lg-start justify-content-center mt-2 align-items-center">
                                                        <input type="file" class="d-none" id="ProfiImg" accept="image/*" />
                                                        <label for="ProfiImg" class="btn btn-success opacity-50 " onclick="ChangeImg();">Update Admin Image</label>


                                                        <!-- <button for="ProfiImg" class="btn btn-success opacity-50" >Uplode Imge</button> -->
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-lg-12  mt-5 mt-lg-0  d-flex justify-content-end align-items-center">
                                                <div class="col-4 border border-1 d-grid">

                                                    <button class="btnprofi p-2 text-white " onclick="Updateadminprofile();">Uplod Admin Profile</button>

                                                </div>
                                            </div>
                                        </div>
                                    </div>




                                </div>
                            </div>
                        </div>

                    </div>
                <?php
            }

                ?>
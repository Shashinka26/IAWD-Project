<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> NEVI'S | My Profile</title>
    <link rel="icon" href="./images/heder.icon.png">

    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="./bootstrap.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
</head>

<body onload="onload();">

    <div class="container-fluid">
        <div class="row ">

            <?php

            include "header2.php";
            require "spiner.php";


            ?>
          <div class="col-12  d-lg-block" style="height: 5rem; background-color:rgb(255, 255, 255); ">
            </div>
            <div class="col-12 d-sm-block d-md-block d-lg-none" style="height: 5rem; background-color:rgb(255, 255, 255); ">
            </div>
            <?php
            // require "connection.php";

            if (isset($_SESSION["u"])) {

                $email = $_SESSION["u"]["email"];
                // echo($email);


                $user_rs = Database::search("SELECT * FROM `user` INNER JOIN `gender` ON gender_id=user.gender_id  WHERE `email`='" . $email . "'");
                $user_data = $user_rs->fetch_assoc();
                // echo ($user_data["password"]);

                $useradress_rs = Database::search("SELECT * FROM `user_has_city` INNER JOIN `city` ON  user_has_city.city_id=city.id INNER JOIN `district` ON 
                city.district_id=district.id INNER JOIN `province` ON district.province_id=province.id WHERE `user_email`='" . $email . "'");
                $useradress_data = $useradress_rs->fetch_assoc();
                // echo($useradress_data["line2"]);

                $userimage_rs = Database::search("SELECT * FROM `user_image` WHERE `user_email`='" . $email . "'");
                $userimage_data = $userimage_rs->fetch_assoc();


            ?>









                <div class="Col-12 p-0 container-fluid coo  " style="overflow-x: hidden;">
                    <div class="row">


                        <div class="offset-lg-1  col-lg-10 p-3 d-none d-lg-block p-5">

                            <img src="./images/icon/user.svg" class="opacity-75 mb-4" alt="" >
                            <label for="" class="fs-3   fw-bold opacity-75 ">My Profile</label>

                        </div>
                        <div class="  d-flex justify-content-center align-items-center d-lg-none p-5">

                            <img src="./images/icon/user.svg" alt="" class="opacity-75 mb-4">
                          
                            <label for="" class="fs-3   fw-bold opacity-75 ">My Profile</label>

                        </div>



                        <!-- first  -->

                        <div class="col-12 d-flex justify-content-center align-items-center  border-1   mb-5 " id="Profile">
                            <div class="col-11  col-lg-11 profidiv">
                                <div class="row">




                                    <div class="col-4 d-flex justify-content-center align-items-center p-2 pt-2 border-end border-bottom selab">
                                        <label for="" class="form-label sebut active">profile</label>
                                    </div>




                                    <div class="col-4 d-flex justify-content-center align-items-center p-2 pt-2 border-start border-bottom selab">
                                        <label for="" class="form-label sebut " onclick="profilChnge(); ">Edit Profile</label>

                                    </div>

                                    <div class="col-4 d-flex justify-content-center align-items-center p-2 pt-2 border-start border-bottom selab">
                                        <label for="" class="form-label sebut" onclick="profilChnge2();">Change Password</label>

                                    </div>




                                    <div class="col-lg-3 col-12 mt-5 mt-lg-0 d-flex justify-content-center align-items-center p-3  ">


                                        <!-- <div class="col-12 "> -->
                                        <div class="row">
                                            <div class="col-12 d-flex justify-content-center align-items-center  " style="height: 150px; ">
                                                <?php
                                                if (!empty($userimage_data["Image_path"])) {
                                                ?>
                                                    <img src="<?php echo ($userimage_data["Image_path"]); ?>" width="150px" height="150px" class="rounded-circle profiImg" alt="" style=" border-style: solid; border-color:  rgb(107, 107, 107); border-width: 3px;">
                                                <?php
                                                } else {
                                                ?>
                                                    <img src="images/icon/index.png" width="150px" height="150px" class="rounded-circle profiImg" alt="" style=" position: absolute; border-style: solid; border-color:  rgb(107, 107, 107); border-width: 3px;">
                                                <?php
                                                }
                                                ?>
                                            </div>

                                            <div class="col-12 d-flex justify-content-center align-items-center  p-2">
                                                <label for="" class="form-label fs-5"><?php echo ($user_data["fname"] . " " . $user_data["lname"]) ?></label>
                                            </div>

                                            <div class="col-12 d-flex justify-content-center align-items-center  ">
                                                <label for="" class="form-label"><?php echo ($user_data["email"]) ?></label>
                                            </div>



                                        </div>


                                        <!-- </div> -->

                                    </div>
                                    <div class="col-lg-9 col-12 d-flex justify-content-center align-items-center  p-3 mt-3">

                                        <div class="col-12 col-md-11 col-lg-11 pfrom d-flex justify-content-center align-items-center">

                                            <div class="col-12 border border-1 p-4">
                                                <div class="row">



                                                    <div class="col-6 pb-1 mt-3">
                                                        <label for="" class="form-label">First Name</label>
                                                        <input type="text" class="form-control frofinpu   opacity-75 fw-bold bg-white in" value="<?php echo ($user_data["fname"]); ?>" disabled>
                                                    </div>
                                                    <div class="col-6 pb-1 mt-3">
                                                        <label for="" class="form-label">Last Name</label>
                                                        <input type="text" class="form-control   opacity-75 fw-bold bg-white in" value="<?php echo ($user_data["lname"]); ?>" disabled>
                                                    </div>

                                                    <div class="col-12 pb-1 mt-4">
                                                        <label for="" class="form-label">Email</label>
                                                        <input type="text" class="form-control  opacity-75 fw-bold bg-white in" value="<?php echo ($user_data["email"]); ?>" disabled>
                                                    </div>

                                                    <div class="col-12 pb-1 mt-4">
                                                        <label for="" class="form-label">Mobile</label>
                                                        <?php
                                                        if (!empty($user_data["mobile"])) {
                                                        ?>
                                                            <input type="text" class="form-control  opacity-75 fw-bold bg-white in" value="<?php echo ($user_data["mobile"]); ?>" disabled>

                                                        <?php

                                                        } else {
                                                        ?>

                                                            <input type="text" class="form-control  opacity-75 fw-bold bg-white in" disabled>

                                                        <?php
                                                        }

                                                        ?>
                                                    </div>
                                                    <div class="col-12 pb-1 mt-4">
                                                        <label for="" class="form-label">Password</label>
                                                        <div class="input-group mb-3" ;>
                                                            <input type="password" class="form-control  opacity-75 fw-bold bg-white in" id="repwinp1" value="<?php echo ($user_data["password"]); ?>" disabled>
                                                            <button class="w-25 d-flex justify-content-end opacity-75" style="outline: none; background-color: white; border: none; border-bottom-style:solid ; border-bottom-color:rgba(0, 0, 0, 0.479) ; border-bottom-width:1px ;" onclick="profilPasswordShow();" type="button"><i id="eye3" class="bi bi-eye-fill"></i></button>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 pb-1 mt-4">
                                                        <label for="" class="form-label">Registered Date</label>
                                                        <?php
                                                        $userjonin_date = $user_data["joined_date"];
                                                        $userjonindate_data = explode(" ", $userjonin_date);
                                                        $udate = $userjonindate_data[0];
                                                        // echo($udate);
                                                        ?>
                                                        <input type="text" class="form-control  opacity-75 fw-bold bg-white in" value="<?php echo ($udate); ?>" disabled>
                                                    </div>
                                                    <div class="col-12 pb-1 mt-4">
                                                        <label for="" class="form-label ">Address line 01</label>
                                                        <?php

                                                        if (!empty($useradress_data["line1"])) {
                                                        ?>
                                                            <input type="text" class="form-control  opacity-75 fw-bold bg-white in" value="<?php echo ($useradress_data["line1"]) ?>" disabled>


                                                        <?php

                                                        } else {
                                                        ?>
                                                            <input type="text" class="form-control  opacity-75 fw-bold bg-white in" disabled>

                                                        <?php
                                                        }

                                                        ?>
                                                    </div>
                                                    <div class="col-12 pb-1 mt-4">
                                                        <label for="" class="form-label ">Address line 02</label>
                                                        <?php

                                                        if (!empty($useradress_data["line2"])) {
                                                        ?>
                                                            <input type="text" class="form-control  opacity-75 fw-bold bg-white in" value="<?php echo ($useradress_data["line2"]) ?>" disabled>
                                                        <?php

                                                        } else {
                                                        ?>
                                                            <input type="text" class="form-control  opacity-75 fw-bold bg-white in" disabled>

                                                        <?php
                                                        }

                                                        ?>
                                                    </div>
                                                    <div class="col-6 pb-1 mt-4">
                                                        <label for="" class="form-label">Province</label>
                                                        <?php

                                                        if (!empty($useradress_data["province_name"])) {
                                                        ?>
                                                            <input type="text" class="form-control  opacity-75 fw-bold bg-white in" value="<?php echo ($useradress_data["province_name"]) ?>" disabled>

                                                        <?php

                                                        } else {
                                                        ?>
                                                            <input type="text" class="form-control  opacity-75 fw-bold bg-white in" disabled>

                                                        <?php
                                                        }

                                                        ?>

                                                    </div>
                                                    <div class="col-6 pb-1 mt-4">
                                                        <label for="" class="form-label">Distric</label>
                                                        <?php

                                                        if (!empty($useradress_data["distric_name"])) {
                                                        ?>
                                                            <input type="text" class="form-control  opacity-75 fw-bold bg-white in" value="<?php echo ($useradress_data["distric_name"]) ?>" disabled>


                                                        <?php

                                                        } else {
                                                        ?>
                                                            <input type="text" class="form-control  opacity-75 fw-bold bg-white in" disabled>

                                                        <?php
                                                        }

                                                        ?>
                                                    </div>
                                                    <div class="col-6 pb-1 mt-4">
                                                        <label for="" class="form-label">City</label>
                                                        <?php

                                                        if (!empty($useradress_data["city_name"])) {
                                                        ?>
                                                            <input type="text" class="form-control  opacity-75 fw-bold bg-white in" value="<?php echo ($useradress_data["city_name"]) ?>" disabled>


                                                        <?php

                                                        } else {
                                                        ?>
                                                            <input type="text" class="form-control  opacity-75 fw-bold bg-white in" disabled>

                                                        <?php
                                                        }

                                                        ?>
                                                    </div>
                                                    <div class="col-6 pb-1 mt-4">
                                                        <label for="" class="form-label">Postel Code</label>
                                                        <?php

                                                        if (!empty($useradress_data["post_code"])) {
                                                        ?>
                                                            <input type="text" class="form-control  opacity-75 fw-bold bg-white in" value="<?php echo ($useradress_data["post_code"]) ?>" disabled>


                                                        <?php

                                                        } else {
                                                        ?>
                                                            <input type="text" class="form-control opacity-75 fw-bold bg-white in" disabled>

                                                        <?php
                                                        }

                                                        ?>
                                                    </div>
                                                    <div class="col-6 pb-1 mt-4">
                                                        <label for="" class="form-label">Gendre</label>
                                                        <input type="text" class="form-control  opacity-75 fw-bold bg-white in" value="<?php echo ($user_data["gender_name"]); ?>" disabled>
                                                    </div>
                                                    <div class="col-6 pb-1 mt-4">
                                                        <label for="" class="form-label">Height</label>
                                                        <input type="text" class="form-control opacity-75 fw-bold bg-white in" value="<?php echo ($user_data["height"] . " " . "cm"); ?>" disabled>
                                                    </div>



                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>




                        <!-- seconde  -->


                        <div class="col-12 d-flex justify-content-center align-items-center  border-1 d-none  mb-5" id="editprofil">
                            <div class="col-11  col-lg-11 profidiv">
                                <div class="row">

                                    <div class="col-4 d-flex justify-content-center align-items-center p-2 pt-2 border-end border-bottom">
                                        <label for="" class="form-label sebut active" onclick="profilChnge();">profile</label>
                                    </div>




                                    <div class="col-4 d-flex justify-content-center align-items-center p-2 pt-2 border-start border-bottom">
                                        <label for="" class="form-label sebut">Edit Profile</label>

                                    </div>
                                    <div class="col-4 d-flex justify-content-center align-items-center p-2 pt-2 border-start border-bottom">
                                        <label for="" class="form-label sebut" onclick="profilChnge3();">Change Password</label>

                                    </div>




                                    <div class="col-lg-3 col-12 mt-5 mt-lg-0 d-flex justify-content-center align-items-center p-3  ">


                                        <!-- <div class="col-12 "> -->
                                        <div class="row">
                                            <div class="col-12 d-flex justify-content-center align-items-center  " style="height: 150px; ">
                                                <?php
                                                if (!empty($userimage_data["Image_path"])) {
                                                ?>
                                                    <img src="<?php echo ($userimage_data["Image_path"]); ?>" id="imgeView" width="150px" height="150px" class="rounded-circle profiImg" alt="" style=" border-style: solid; border-color:  rgb(107, 107, 107); border-width: 3px;">
                                                <?php
                                                } else {
                                                ?>
                                                    <img src="images/icon/index.png" width="150px" height="150px" id="imgeView" class="rounded-circle profiImg" alt="" style=" position: absolute; border-style: solid; border-color:  rgb(107, 107, 107); border-width: 3px;">
                                                <?php
                                                }
                                                ?>


                                            </div>

                                            <div class="col-12 d-flex justify-content-center align-items-center  p-2">
                                                <label for="" class="form-label fs-5"><?php echo ($user_data["fname"] . " " . $user_data["lname"]) ?></label>
                                            </div>

                                            <div class="col-12 d-flex justify-content-center align-items-center  ">
                                                <label for="" class="form-label fs-6"><?php echo ($user_data["email"]) ?></label>
                                            </div>

                                            <div class="col-12 d-flex justify-content-center align-items-center">

                                                <input type="file" class="d-none" id="ProfiImg" accept="image/*" />
                                                <!-- <button class="btn btn-danger " for> Update progile Image</button> -->
                                                <label for="ProfiImg" class="btn btn-danger opacity-75" onclick="ChangeImg();">Update progile Image</label>

                                            </div>

                                        </div>


                                        <!-- </div> -->

                                    </div>
                                    <div class="col-lg-9 col-12 d-flex justify-content-center align-items-center  p-3 mt-3">

                                        <div class="col-12 col-md-11 col-lg-11 pfrom d-flex justify-content-center align-items-center">

                                            <div class="col-12 border-1 border p-3">
                                                <div class="row">



                                                    <div class="col-6 pb-1">
                                                        <label for="" class="form-label">First Name</label>
                                                        <div class="input-group mb-3" ;>
                                                            <input type="text" class="form-control" value="<?php echo ($user_data["fname"]); ?>" id="fname">
                                                            <!-- <button class="btn btn-outline-secondary"><i class="bi bi-pen"></i></button> -->
                                                        </div>
                                                    </div>
                                                    <div class="col-6 pb-1">
                                                        <label for="" class="form-label">Last Name</label>
                                                        <div class="input-group mb-3" ;>
                                                            <input type="text" class="form-control" value="<?php echo ($user_data["lname"]); ?>" id="lname">
                                                            <!-- <button class="btn btn-outline-secondary" disabled><i class="bi bi-pen"></i></button> -->
                                                        </div>
                                                    </div>

                                                    <div class="col-12 pb-1">
                                                        <label for="" class="form-label">Email</label>
                                                        <div class="input-group mb-3" ;>
                                                            <input type="text" class="form-control text-black-50" disabled value="<?php echo ($user_data["email"]); ?>">

                                                        </div>
                                                    </div>

                                                    <div class="col-12 pb-1">
                                                        <label for="" class="form-label">Mobile</label>
                                                        <div class="input-group mb-3" ;>
                                                            <?php

                                                            if (!empty($user_data["mobile"])) {
                                                            ?>
                                                                <input type="text" class="form-control" value="<?php echo ($user_data["mobile"]); ?>" id="mobi">
                                                                <!-- <button class="btn btn-outline-secondary"><i class="bi bi-pen"></i></button> -->
                                                            <?php
                                                            } else {
                                                            ?>
                                                                <input type="text" class="form-control" id="mobi">
                                                                <button class="btn btn-outline-secondary" disabled><i class="bi bi-pen"></i></button>
                                                            <?php
                                                            }

                                                            ?>


                                                        </div>
                                                    </div>
                                                    <div class="col-12 pb-1">
                                                        <label for="" class="form-label">Password</label>
                                                        <div class="input-group mb-3">
                                                            <input type="password" class="form-control text-black-50" id="npwinp1" disabled value="<?php echo ($user_data["password"]); ?>">
                                                            <button class="btn btn-outline-secondary" onclick="profilPasswordShow1();" type="button"><i id="eye4" class="bi bi-eye-fill"></i></button>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 pb-1">
                                                        <label for="" class="form-label">Registered Date</label>
                                                        <input type="text" class="form-control text-black-50" disabled value="<?php echo ($udate); ?>">
                                                    </div>
                                                    <div class="col-12 pb-1">

                                                        <label for="" class="form-label">Address line 01</label>
                                                        <div class="input-group mb-3" ;>
                                                            <?php
                                                            if (!empty($useradress_data["line1"])) {
                                                            ?>
                                                                <input type="text" class="form-control" value="<?php echo ($useradress_data["line1"]) ?>" id="lin1">
                                                                <!-- <button class="btn btn-outline-secondary"><i class="bi bi-pen"></i></button> -->
                                                            <?php
                                                            } else {
                                                            ?>
                                                                <input type="text" class="form-control" id="lin1">
                                                                <button class="btn btn-outline-secondary" disabled><i class="bi bi-pen"></i></button>
                                                            <?php
                                                            }

                                                            ?>

                                                        </div>
                                                    </div>
                                                    <div class="col-12 pb-1">
                                                        <label for="" class="form-label">Address line 02</label>
                                                        <div class="input-group mb-3" ;>
                                                            <?php
                                                            if (!empty($useradress_data["line1"])) {
                                                            ?>
                                                                <input type="text" class="form-control " value="<?php echo ($useradress_data["line2"]) ?>" id="lin2">
                                                                <!-- <button class="btn btn-outline-secondary"><i class="bi bi-pen"></i></button> -->
                                                            <?php
                                                            } else {
                                                            ?>
                                                                <input type="text" class="form-control" id="lin2">
                                                                <button class="btn btn-outline-secondary" disabled><i class="bi bi-pen"></i></button>
                                                            <?php
                                                            }

                                                            ?>
                                                        </div>
                                                    </div>

                                                    <?php

                                                    $province_rs = Database::search("SELECT * FROM `province` ");
                                                    $distric_rs = Database::search("SELECT * FROM `district` ");
                                                    $city_rs =   Database::search("SELECT * FROM `city` ");


                                                    ?>

                                                    <div class="col-6 pb-1">
                                                        <label for="" class="form-label">Province</label>
                                                        <select name=""  class="form-select" onchange="load_distic();" id="provinc">
                                                            <option value="0">Select Province</option>
                                                            <?php
                                                            $province_num = $province_rs->num_rows;

                                                            for ($x = 0; $x < $province_num; $x++) {
                                                                $province_data = $province_rs->fetch_assoc();
                                                            ?>
                                                                <option value="<?php echo ($province_data["id"]) ?>" <?php if (!empty($useradress_data["province_id"])) {
                                                                                                                            if ($useradress_data["province_id"] == $province_data["id"]) {
                                                                                                                        ?>selected<?php
                                                                                                                                }
                                                                                                                            } ?> ><?php echo ($province_data["province_name"]) ?></option>
                                                            <?php
                                                            }

                                                            ?>


                                                        </select>
                                                    </div>

                                                    <div class="col-6 pb-1">
                                                        <label for="" class="form-label">Distric</label>
                                                        <select name=""  class="form-select" id="distric" onchange="load_city();">
                                                            <option value="0">Select Distric</option>

                                                            <?php

                                                            $distric_num = $distric_rs->num_rows;
                                                            for ($y = 0; $y < $distric_num; $y++) {
                                                                $distric_data = $distric_rs->fetch_assoc();
                                                            ?>

                                                                <option value="<?php echo ($distric_data["id"]) ?>" <?php if (!empty($useradress_data["district_id"])) {
                                                                                                                        if ($distric_data["id"] == $useradress_data["district_id"]) {
                                                                                                                    ?>selected<?php

                                                                                                                            }
                                                                                                                        } ?> > <?php echo ($distric_data["distric_name"]); ?></option>


                                                            <?php
                                                            }

                                                            ?>


                                                        </select>
                                                    </div>

                                                    <div class="col-6 pb-1">
                                                        <label for="" class="form-label">City</label>
                                                        <select name=""  class="form-select"  id="city">
                                                            <option value="0">Select City</option>

                                                            <?php
                                                            $city_num = $city_rs->num_rows;
                                                            for ($w = 0; $w < $city_num; $w++) {
                                                                $city_data = $city_rs->fetch_assoc();
                                                            ?>
                                                                <option value="<?php echo ($city_data["id"]); ?>" <?php if (!empty($useradress_data["city_id"])) {
                                                                                                                        if ($city_data["id"] == $useradress_data["city_id"]) {
                                                                                                                    ?>selected<?php
                                                                                                                            }
                                                                                                                        } ?>><?php echo ($city_data["city_name"]); ?></option>
                                                            <?php

                                                            }

                                                            ?>

                                                        </select>
                                                    </div>

                                                    <div class="col-6 pb-1">
                                                        <label for="" class="form-label">Postel Code</label>
                                                        <div class="input-group mb-3" ;>
                                                            <?php
                                                            if (!empty($useradress_data["post_code"])) {
                                                            ?>
                                                                <input type="text" class="form-control" value="<?php echo ($useradress_data["post_code"]) ?>" id="pcod">
                                                                <!-- <button class="btn btn-outline-secondary"><i class="bi bi-pen"></i></button> -->
                                                            <?php
                                                            } else {
                                                            ?>
                                                                <input type="text" class="form-control" id="pcod">
                                                                <button class="btn btn-outline-secondary" disabled><i class="bi bi-pen"></i></button>
                                                            <?php
                                                            }
                                                            ?>

                                                        </div>
                                                    </div>

                                                    <div class="col-6 pb-3">
                                                        <label for="" class="form-label">Gendre</label>
                                                        <input type="text" class="form-control " disabled value="<?php echo ($user_data["gender_name"]) ?>">
                                                    </div>
                                                    <div class="col-6 pb-3">
                                                        <label for="" class="form-label">Height</label>
                                                        <div class="input-group mb-3" ;>
                                                            <?php
                                                            if (!empty($user_data["height"])) {
                                                            ?>
                                                                <input type="text" class="form-control " value="<?php echo ($user_data["height"]) ?>" id="heig">
                                                                <button class="btn btn-outline-secondary" disabled>.cm</i></button>
                                                            <?php
                                                            } else {
                                                            ?>
                                                                <input type="text" class="form-control " id="heig">
                                                                <button class="btn btn-outline-secondary" disabled>.cm</i></button>
                                                            <?php


                                                            }
                                                            ?>

                                                        </div>
                                                    </div>


                                                    <div class="col-12  d-grid pb-1">

                                                        <button class=" btn1   " onclick="updateprofile();">Update Profile</button>
                                                    </div>



                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>



                        <!-- trend  -->



                        <div class="col-12 d-flex justify-content-center align-items-center border-1 d-none  mb-5" id="chngepassword">
                            <div class="col-11  col-lg-11 profidiv">
                                <div class="row">

                                    <div class="col-4 d-flex justify-content-center align-items-center p-2 pt-2 border-end border-bottom">
                                        <label for="" class="form-label sebut active" onclick="profilChnge2();">profile</label>
                                    </div>




                                    <div class="col-4 d-flex justify-content-center align-items-center p-2 pt-2 border-start border-bottom">
                                        <label for="" class="form-label sebut" onclick="profilChnge3();">Edit Profile</label>

                                    </div>

                                    <div class="col-4 d-flex justify-content-center align-items-center p-2 pt-2 border-start border-bottom">
                                        <label for="" class="form-label sebut">Change Password</label>

                                    </div>




                                    <div class="col-lg-3 col-12 mt-5 mt-lg-0 d-flex justify-content-center align-items-center p-3  ">


                                        <!-- <div class="col-12 "> -->
                                        <div class="row">
                                            <div class="col-12 d-flex justify-content-center align-items-center  " style="height: 150px; ">
                                                <?php
                                                if (!empty($userimage_data["Image_path"])) {
                                                ?>
                                                    <img src="<?php echo ($userimage_data["Image_path"]); ?>" width="150px" height="150px" class="rounded-circle profiImg" alt="" style=" border-style: solid; border-color:  rgb(107, 107, 107); border-width: 3px;">
                                                <?php
                                                } else {
                                                ?>
                                                    <img src="images/icon/index.png" width="150px" height="150px" class="rounded-circle profiImg" alt="" style=" position: absolute; border-style: solid; border-color:  rgb(107, 107, 107); border-width: 3px;">
                                                <?php
                                                }
                                                ?>

                                            </div>

                                            <div class="col-12 d-flex justify-content-center align-items-center  p-2">
                                                <label for="" class="form-label fs-5"><?php echo ($user_data["fname"] . " " . $user_data["lname"]); ?></label>
                                            </div>

                                            <div class="col-12 d-flex justify-content-center align-items-center  ">
                                                <label for="" class="form-label"><?php echo ($user_data["email"]); ?></label>
                                            </div>



                                        </div>


                                        <!-- </div> -->

                                    </div>
                                    <div class="col-lg-9 col-12 d-flex justify-content-center align-items-center  p-3 mt-3">

                                        <div class="col-12 col-md-11 col-lg-11 pfrom d-flex justify-content-center align-items-center pt-3">

                                            <div class="col-12  p-3">
                                                <div class="row">





                                                    <div class="col-6 pb-1">
                                                        <label for="" class="form-label">Your Email</label>
                                                        <input type="email" class="form-control fw-bold opacity-75 " placeholder="Please Inseart Youre Email !!!" id="em">
                                                    </div>


                                                    <div class="col-6 pb-1">
                                                        <label for="" class="form-label">Your Password</label>
                                                        <!-- <input type="password" class="form-control " id="pw"> -->
                                                        <div class="input-group mb-3">
                                                            <input type="password" class="form-control fw-bold opacity-75" placeholder="Please Inseart Youre Password !!!" id="pwinp">
                                                            <button class="btn btn-outline-secondary" onclick="profilPasswordShow2();" type="button"><i id="eye5" class="bi bi-eye-fill"></i></button>
                                                        </div>
                                                    </div>

                                                    <div class="col-12 d-flex justify-content-center align-items-center p-3">

                                                        <div class=" col-4  d-grid pb-1">

                                                            <button class=" btn1 " onclick="ChangePasswordPro();">Conform</button>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-9 col-md-12 col-lg-12 d-flex justify-content-center align-items-center pt-4  " id="chngepasswordP">
                                                        <p class="fw-bold">Plaese inseart your correct Email And Password !!!</p>
                                                    </div>

                                                    <div class="col-12 mt-5 d-none" id="changepassworddiv">
                                                        <div class="row">

                                                            <div class="col-12 mb-4">
                                                                <label for="" class="form-label fs-5 fw-bold">Change Password</label>
                                                            </div>

                                                            <div class="col-6 pb-2">
                                                                <label for="" class="form-label">New Password</label>
                                                                <div class="input-group mb-3">
                                                                    <input type="password" class="form-control" id="Cngnpwinp">
                                                                    <button class="btn btn-outline-secondary" onclick="CngnewPasswordShow();" type="button"><i id="eye6" class="bi bi-eye-fill"></i></button>
                                                                </div>
                                                            </div>


                                                            <div class="col-6 pb-2">
                                                                <label for="" class="form-label">Re-type Password</label>
                                                                <div class="input-group mb-3" ;>
                                                                    <input type="password" class="form-control" id="Cngrepwinp">
                                                                    <button class="btn btn-outline-secondary" onclick="CngrenamepasswordShow();" type="button"><i id="eye7" class="bi bi-eye-fill"></i></button>
                                                                </div>
                                                            </div>


                                                            <!-- <div class="col-12 pb-2">
                                                                <label for="" class="form-label">Verification Code</label>
                                                                <input type="text" class="form-control " id="Cngvcode">
                                                            </div> -->

                                                            <div class="col-12 d-flex justify-content-center align-items-center p-3">

                                                                <div class=" col-4  d-grid pb-1">

                                                                    <button class="btn btn-danger opacity-75 " onclick="CngpasswordProcess();">Change</button>
                                                                </div>
                                                            </div>


                                                        </div>
                                                    </div>



                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>


                <?php
            } else {


                echo (" <div class='col-12 d-flex justify-content-center align-items-center mt-5'>
                       <h3 class='sebutt'>  Sign In Or Sign Up First</h3> 
                        </div> ");


                ?>

                    <!-- <a href="index.php" class="text-decoration-none signout2"> register/sign in</a> -->
                    <div class="col-12 d-flex justify-content-center align-items-center mt-5 mb-5">
                        <button class="btn btn-danger"> <a href="./signInpage.php" class="text-decoration-none regbut">Register Or Sign In </a></button>
                    </div>



                </div>








        </div>

    </div> 



<?php


            }
            include "footer.php"
?>



<script src="./bootstrap.bundle.js"></script>
<script src="./script.jss"></script>
<script src="./bootstrap.jss"> </script>

</body>

</html>
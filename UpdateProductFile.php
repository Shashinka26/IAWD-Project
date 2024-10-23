<?php

require "connection.php";
// echo("knjjn");

if (isset($_GET["json"])) {

    $id = $_GET["json"];
    // echo($jsonText);

    // $jsonToobj = json_decode($jsonText);
    // $id = $jsonToobj->id;


    // echo ($id);



    $dress_id = Database::search("SELECT * FROM `dress` WHERE `id`='" . $id . "'");
    $dress_Data = $dress_id->fetch_assoc();

    $material_id = Database::search("SELECT * FROM `materiale` WHERE `id`='" . $dress_Data["materiale_id"] . "'");
    $material_data = $material_id->fetch_assoc();



    // echo($dress_Data["Dress_code"])


?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Nevi's Admin | addProduct </title>
        <link rel="icon" href="./images/heder.icon.png">

        <link rel="stylesheet" href="./style.css">
        <link rel="stylesheet" href="./bootstrap.css">
        <link rel="stylesheet" href="./erroMsg.css">

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
        <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>
        <link rel="stylesheet" href="./erroMsg.css">

    </head>

    <body>

        <?php
        // require "connection.php";
        session_start();
        if (isset($_SESSION["ad"])) {

            $admin = $_SESSION["ad"];


            // echo( $admin["gender_id"]);



        ?>

            <div class="container-fluid overflow-hidden">
                <div class="row">

                    <div class="col-12 vh-100 bac">
                        <div class="row">
                            <div class="col-lg-2 col-12   border-3 border-end  " style="border-color: rgb(236, 235, 235);">

                                <div class="col-12 p-lg-2  ">
                                    <div class="row">
                                        <!-- <img src="./images/logo.jpeg" class="rounded-circle " style="width: 6rem; "> -->
                                        <div class="col-12 d-flex justify-content-center align-items-center mb-2 d-none d-lg-block">
                                            <div class="col-12 d-flex justify-content-center">
                                                <img src="./images/logo.jpeg" class="rounded-circle " style="height: 6rem; border-style: solid; border-color:  rgb(107, 107, 107); border-width: 3px;">

                                            </div>
                                        </div>


                                        <div class="col-2 p-1 d-none d-lg-block">
                                            <hr>
                                        </div>
                                        <div class="col-8  d-flex justify-content-center align-items-center mt-2 admindiv1 mb-lg-5 mb-4 d-none d-lg-block " style="background-color: rgba(246, 250, 255, 0.849); border-radius: 8px;">
                                            <?php
                                            $d = new DateTime();
                                            $tz = new DateTimeZone("Asia/Colombo");
                                            $d->setTimezone($tz);
                                            $date = $d->format("Y-m-d ");

                                            ?>
                                            <div class="col-12 d-flex justify-content-center align-items-center">
                                                <label for="" class="fw-bold opacity-75 "><?php echo ($date) ?></label>

                                            </div>
                                        </div>
                                        <div class="col-2 p-1 d-none d-lg-block">
                                            <hr>
                                        </div>

                                        <nav class="navbar navbar-expand-lg p-0 ps-2">

                                            <div class="col-12 col-lg-12">
                                                <div class="row">
                                                    <div class="col-12 admindiv2 p-2 ps-3 pe-5 pe-md-0 ps-lg-0 p-lg-0">
                                                        <div class="row">

                                                            <div class="col-10 d-lg-none">
                                                                <img src="./images/logo.jpeg" class="rounded-circle " style="height: 3rem; border-style: solid; border-color:  rgb(107, 107, 107); border-width: 3px;">
                                                                &nbsp;&nbsp;
                                                                <a class="navbar-brand text-black fw-bold" href="#"> Nevi's Admin Panle </a>
                                                            </div>
                                                            <!-- <div class="col-4 d-lg-none"></div> -->
                                                            <div class="col-2 d-lg-none">
                                                                <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                                                                    <div class="col-12 d-flex justify-content-center align-items-center ">

                                                                        <i class="bi bi-card-list fs-1 fw-bold text-black-50 "></i>
                                                                    </div>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>



                                                    <div class="offcanvas w-75 offcanvas-start" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                                                        <div class="offcanvas-header">
                                                            <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Panle Menu</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                                                        </div>
                                                        <div class="offcanvas-body">
                                                            <div class="row pe-1">


                                                                <div class="col-12  p-3  admenu" onclick="window.location='adminPanle.php'">
                                                                    <div class="row">
                                                                        <div class="col-1"></div>
                                                                        <div class="col-2 d-flex justify-content-center align-items-center iconciv" style="border-radius: 6px; ">
                                                                            <i class="bi bi-house-door fs-4 text-white"></i>
                                                                        </div>
                                                                        <div class="col-8 d-flex p-0 ms-3  align-items-center ">
                                                                            <label for="" class="text-black-50 fw-bold active " aria-current="page" style=" cursor: pointer;"> Dashbord</label>

                                                                        </div>
                                                                    </div>

                                                                </div>
                                                                <div class="col-12  p-3 admenu" onclick="window.location='addProduct.php'">
                                                                    <div class="row">
                                                                        <div class="col-1"></div>
                                                                        <div class="col-2 d-flex justify-content-center align-items-center iconciv " style=" border-radius: 6px; ">
                                                                            <i class="bi bi-plus-square fs-4 text-white"></i>
                                                                        </div>
                                                                        <div class="col-8 d-flex p-0 ms-3  align-items-center ">
                                                                            <label for="" class="text-black-50 fw-bold" style=" cursor: pointer;">Add New Product</label>

                                                                        </div>
                                                                    </div>

                                                                </div>
                                                                <div class="col-12  p-3  admenu2" onclick="window.location='updateProduct.php'">
                                                                    <div class="row">
                                                                        <div class="col-1"></div>
                                                                        <div class="col-2 d-flex justify-content-center align-items-center iconciv" style=" border-radius: 6px; ">
                                                                            <i class="bi bi-arrow-repeat fs-4 text-white"></i>
                                                                        </div>
                                                                        <div class="col-8 d-flex p-0 ms-3  align-items-center ">
                                                                            <label for="" class="text-black-50 fw-bold" style=" cursor: pointer;"> Update Product</label>

                                                                        </div>
                                                                    </div>

                                                                </div>



                                                                

                                                                <div class="col-12  p-3  admenu" onclick="window.location='manageuser.php'">
                                                                    <div class="row">
                                                                        <div class="col-1"></div>
                                                                        <div class="col-2 d-flex justify-content-center align-items-center iconciv" style=" border-radius: 6px; ">
                                                                            <i class="bi bi-person-circle fs-4 text-white"></i>
                                                                        </div>
                                                                        <div class="col-8 d-flex p-0 ms-3  align-items-center ">
                                                                            <label for="" class="text-black-50 fw-bold" style=" cursor: pointer;"> Manage Users</label>

                                                                        </div>
                                                                    </div>

                                                                </div>



                                                        

                                                                <div class="col-12  p-3  admenu">
                                                                    <div class="row">
                                                                        <div class="col-1"></div>
                                                                        <div class="col-2 d-flex justify-content-center align-items-center iconciv" style=" border-radius: 6px; ">
                                                                            <i class="bi bi-door-open fs-4 text-white"></i>

                                                                        </div>
                                                                        <div class="col-8 d-flex p-0 ms-3  align-items-center " onclick="adminLogout();">
                                                                            <label for="" class="text-black-50 fw-bold" style=" cursor: pointer;"> Log Out</label>

                                                                        </div>
                                                                    </div>

                                                                </div>



                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </nav>




                                    </div>
                                </div>


                            </div>

                            <div class="col-12 col-lg-10  border-start border-1 p-0">
                                <div class="col-12  admindiv2  p-3 p-lg-0 pb-4 pb-lg-0">
                                    <div class="row">
                                        <div class="col-3 p-2 ps-3 d-none d-lg-block">

                                            <div class="col-12 ms-4 ">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <label for="" class="fs-4 fw-bold text-black opacity-75" style="font-family:quick;">NEVI'S ADMIN PANEL</label>

                                                    </div>
                                                    <div class="col-12">
                                                        <label for="" class="ms-3 p-1 fw-bold text-black-50 ">Welcom back &nbsp;
                                                            <?php

                                                            $admin_rs = Database::search("SELECT * FROM `admin` WHERE `email`='" . $admin["email"] . "'");
                                                            $admin_data = $admin_rs->fetch_assoc();

                                                            // echo( $admin_data["gender_id"]);

                                                            // $admingen1_rs = Database::search("SELECT * FROM `admin` INNER JOIN `gender` ON
                                                            //     admin.gender_id=gender.id WHERE `gender_id`='" . $admin["gender_id"] . "'  ");
                                                            // $admingen1_num = $admingen1_rs->num_rows;
                                                            // // echo ($admingen1_num);
                                                            // $admingen1_data = $admingen1_rs->fetch_assoc();

                                                            // // echo( $admingen1_data["gender_name"]);

                                                            $admin_gen = Database::search("SELECT * FROM `admin` WHERE `gender_id`='" . $admin_data["gender_id"] . "' ");
                                                            $admin_gen_num = $admin_gen->num_rows;
                                                            // echo ($admin_gen_num);
                                                            $admingen_data = $admin_gen->fetch_assoc();
                                                            // $admingen_data["gender_id"];
                                                            if ($admingen_data["gender_id"] == 1) {
                                                            ?>

                                                                Mr. <span class="text-black"><?php echo ($admin_data["fname"]) ?>&nbsp;<?php echo ($admin_data["lname"]) ?></span> </label>
                                                    <?php
                                                            }


                                                            if ($admingen_data["gender_id"] == 2) {
                                                    ?>

                                                        Mrs. <span class="text-black"><?php echo ($admin_data["fname"]) ?>&nbsp;<?php echo ($admin_data["lname"]) ?></span> </label>
                                                    <?php
                                                            }
                                                    ?>

                                                    </div>

                                                </div>

                                            </div>

                                        </div>
                                        <div class="col-7 col-md-6 col-lg-5  d-flex justify-content-center align-items-center">
                                            <div class="col-10">
                                                <button style="position: absolute; background-color: transparent;" class="border-0 mt-1">
                                                    <img src="./images/icon/search (3).png" style="width: 2rem; height: 2rem;" class="opacity-50" alt=""></button>
                                                <input type="text" class="form-control ps-5 border-0" style="border-radius: 15px;">
                                            </div>
                                        </div>

                                        <div class="col-5 col-md-3 p-lg-3 col-lg-2    d-flex justify-content-center align-items-center  ">

                                            <div class="col-lg-10 col-12 p-1 d-flex justify-content-center ">
                                                <div class="col-12 iconciv p-1 ps-2 pe-2 " style="border-radius: 20px;">
                                                    <div class="row ">

                                                        <div class="col-4 d-flex justify-content-center ">
                                                            <i class="bi bi-bell fs-5 text-white iconheader"></i>
                                                        </div>
                                                        <div class="col-4 d-flex justify-content-center ">
                                                            <i class="bi bi-chat-right-text  fs-5 text-white iconheader"></i>
                                                        </div>
                                                        <div class="col-4 d-flex justify-content-center " onclick="adminLogout();">
                                                            <div class="  rounded-circle d-flex justify-content-center align-items-center iconheader bg-white" style="height: rem; width: 2rem; ">
                                                                <i class="bi bi-power fs-5 text-black-50 "></i>

                                                            </div>
                                                        </div>

                                                    </div>


                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-4 col-md-3  col-lg-2 p-0  d-none d-md-block pt-lg-4 ">
                                            <div class="col-12 d-flex justify-content-center align-items-center">
                                                <div class=" rounded-circle d-flex justify-content-center align-items-center iconciv border border-1 " style="height: 2rem;width: 2rem; overflow: hidden;">
                                                    <?php

                                                    $adminImge = Database::search("SELECT * FROM `admin_imge` WHERE `admin_email`='" . $admin["email"] . "'");
                                                    $adminImge_data = $adminImge->fetch_assoc();

                                                    if (!empty($adminImge_data["image_path"])) {
                                                    ?>

                                                        <img src="<?php echo ($adminImge_data["image_path"]) ?>" style="height: 2rem;width: 2rem;" alt="">

                                                    <?php
                                                    } else {
                                                    ?>
                                                        <i class="bi bi-person-circle fs-3 text-white"></i>
                                                    <?php
                                                    }



                                                    ?>


                                                </div>
                                                &nbsp;
                                                &nbsp;
                                                <div class="dropdown">

                                                    <?php

                                                    if (!empty($admin_data["fname"] && $admin_data["fname"])) {
                                                    ?>
                                                        <label for="" class="fw-bold text-black-50"><?php echo ($admin_data["fname"]) ?>&nbsp;<?php echo ($admin_data["lname"]) ?> </label>

                                                    <?php
                                                    } else {
                                                    ?>
                                                        <label for="" class="fw-bold text-black-50">Admin name </label>

                                                    <?php
                                                    }

                                                    ?>

                                                    <button class=" dropdown-toggle border-0 p-0 " style="background-color: transparent;" type="button" data-bs-toggle="dropdown" aria-expanded="false">

                                                    </button>
                                                    <ul class="dropdown-menu border-0 p-2 ">
                                                        <li><a class="dropdown-item" href="./adminprofile.php">Profile</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="col-12  p-lg-3  pb-5">
                                    <div class="row adminscorll2 ">


                                        <div class="col-4  d-none d-lg-block"></div>
                                        <div class="col-4 d-none d-lg-block">
                                            <i class="bi bi-arrow-clockwise fs-2 fw-bold pe-2"></i>
                                            <label for="" class="fs-3   fw-bold opacity-75 ">Update Dress</label>
                                        </div>
                                        <div class="col-lg-4 d-none d-lg-block ">
                                            <div class="col-12  ">
                                                <div class="row justify-content-center mt-3">
                                                    <div class="col-6 d-flex justify-content-end">
                                                        <label for="" class="fw-bold fs-6">Dress Code :</label>

                                                    </div>
                                                    <div class="col-6 justify-content-start p-0">
                                                        <label for="" class="fw-bold text-danger opacity-75"><?php echo ($dress_Data["Dress_code"]) ?></label>

                                                    </div>


                                                </div>


                                            </div>

                                        </div>




                                        <div class="col-12 " id="updateDressDiv">
                                            <div class="row">


                                                <div class="col-12 pt-lg-5 mt-lg-4 pt-2">
                                                    <div class="row">
                                                        <div class="col-lg-6 col-12 d-flex justify-content-center">
                                                            <div class="col-10">
                                                                <label for="" class="form-label fw-bold fs-5 ms-2">Derss Code</label>
                                                                <input type="text" class="form-control opacity-75 fw-bold bg-white text-black-50" value="<?php echo ($dress_Data["Dress_code"]) ?>" disabled id="DerssCode">
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-6 col-12 d-flex justify-content-center mt-lg-0 mt-5">
                                                            <div class="col-10">
                                                                <label for="" class="form-label fw-bold fs-5 ms-2">Cost Per Derss</label>
                                                                <input type="text" class="form-control opacity-75 fw-bold bg-white text-black-50" placeholder="" value=" RS.&nbsp;<?php echo ($dress_Data["price"]) ?> " disabled>
                                                            </div>

                                                        </div>

                                                        <div class="col-lg-6 col-12 mt-5 ">
                                                            <div class="row justify-content-center">
                                                                <div class="col-10">
                                                                    <label class="form-label fw-bold fs-5">Add Product Quantity <span class="opacity-50 text-success"> (Change*)</span></label>
                                                                </div>
                                                                <div class="col-10">
                                                                    <input type="number" class="form-control opacity-75 fw-bold" value="<?php echo ($dress_Data["qty"]) ?>" min="0" id="qty" id="qty2" />
                                                                </div>
                                                            </div>
                                                        </div>


                                                        <div class="col-lg-6 col-12 d-flex justify-content-center mt-5">
                                                            <div class="col-10">
                                                                <label for="" class="form-label fw-bold fs-5 ms-2">Cost Per Delivery <span class="opacity-50 text-success"> (Change*)</span></label>
                                                                <input type="text" class="form-control opacity-75 fw-bold" placeholder="RS." value="<?php echo ($dress_Data["delivery_fee"]) ?>" id="deliverycost3">
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-6 col-12 d-flex justify-content-center mt-5">
                                                            <div class="col-10">
                                                                <label for="" class="form-label fw-bold fs-5 ms-2"> Westen Province Delivery Fee <span class="opacity-50 text-success"> (Change*)</span></label>
                                                                <input type="text" class="form-control opacity-75 fw-bold" placeholder="RS." value="<?php echo ($dress_Data["Delevery_fee_Westen"]) ?>" id="deliverycost4">
                                                            </div>
                                                        </div>





                                                        <div class="col-lg-6 col-12 d-flex justify-content-center mt-5">
                                                            <div class="col-10">
                                                                <div class="row">
                                                                    <div class="col-12  ps-4">
                                                                        <label for="" class="form-label fw-bold fs-5">Material</label>

                                                                    </div>


                                                                </div>
                                                                <input type="text" class="form-control opacity-75 fw-bold  bg-white text-black-50" value="<?php echo ($material_data["material_name"]) ?>" disabled>


                                                            </div>


                                                        </div>


                                                        <div class=" col-12 d-flex justify-content-center mt-5">
                                                            <div class="col-11">
                                                                <div class="row">
                                                                    <div class="col-12  ps-4 mb-3">
                                                                        <label for="" class="form-label fw-bold fs-5">Dress Sizes <span class="opacity-50 text-success"> (Change*)</span></label>

                                                                    </div>


                                                                </div>
                                                                <div class="col-12">
                                                                    <div class="row ">
                                                                        <?php

                                                                        $arry = array();

                                                                        $UpdateDress_Size = Database::search("SELECT * FROM `dress` INNER JOIN `dress_has_dress_sizes` ON
                                                         dress.id=dress_has_dress_sizes.Dress_id INNER JOIN `dress_sizes` ON 
                                                         dress_has_dress_sizes.dress_sizes_id=dress_sizes.id WHERE `Dress_code`='" . $dress_Data["Dress_code"] . "'");

                                                                        $UpdateDress_Size_num = $UpdateDress_Size->num_rows;
                                                                        // $UpdateDress_Size_data =$UpdateDress_Size_num->fetch_assoc();


                                                                        for ($t = 0; $t < $UpdateDress_Size_num; $t++) {
                                                                            $Dress_Size_Data = $UpdateDress_Size->fetch_assoc();
                                                                            $arry[$t] = $Dress_Size_Data["dress_sizes_id"];
                                                                            // echo ($arry[$t]);
                                                                        }


                                                                        $derss_size = Database::search("SELECT * FROM `dress_sizes` ");
                                                                        $derss_size_num = $derss_size->num_rows;
                                                                        // echo ($UpdateDress_Size_num);


                                                                        for ($e = 0; $e < $derss_size_num; $e++) {
                                                                            $Dress_Size_Data = $derss_size->fetch_assoc();

                                                                            // echo ($UpdateDress_Size_Data["dress_sizes_id"]);

                                                                            $leth = count($arry);
                                                                            // echo($leth);


                                                                        ?>
                                                                            <div class="col-lg-2 col-4">
                                                                                <div class="col-10 p-2  updatesize">
                                                                                    <div class="row">
                                                                                        <div class="col-6">
                                                                                            <div class="form-check form-switch fs-5 opacity-75">

                                                                                                <input class="form-check-input" type="checkbox" role="switch" id="sw" value="" <?php for ($y = 0; $y < $leth; $y++) {

                                                                                                                                                                                    if ($Dress_Size_Data["id"] == $arry[$y]) {
                                                                                                                                                                                ?>checked <?php

                                                                                                                                                                                        }
                                                                                                                                                                                    }

                                                                                                                                                                                            ?> onclick="updateDressSize('<?php echo ($Dress_Size_Data['id']) ?>');" />
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-6">
                                                                                            <label for="" class="fw-bold"><?php echo ($Dress_Size_Data["sizes_name"]) ?> </label>
                                                                                        </div>

                                                                                    </div>
                                                                                </div>
                                                                            </div>


                                                                        <?php
                                                                            // echo ("ok");
                                                                        }

                                                                        ?>







                                                                    </div>
                                                                </div>


                                                            </div>


                                                        </div>

                                                        <div class=" col-12 d-flex justify-content-center mt-5">
                                                            <div class="col-11">
                                                                <div class="row">
                                                                    <div class="col-12  ps-4 mb-3">
                                                                        <label for="" class="form-label fw-bold fs-5">Dress Sizes Qty<span class="opacity-50 text-success"> (Change*)</span></label>

                                                                    </div>

                                                                    <div class="col-12" id="qydiv">
                                                                        <div class="row">

                                                                            <div class="col-4 col-lg-2">
                                                                                <div class="row">
                                                                                    <?php

                                                                                    $thresize = Database::search("SELECT * FROM `dress_has_dress_sizes` WHERE `Dress_id`='" . $id . "' AND `dress_sizes_id`='1' ");
                                                                                    $thresize_num = $thresize->num_rows;
                                                                                    $thresize_data = $thresize->fetch_assoc();

                                                                                    // echo ($thresize_num);
                                                                                    ?>
                                                                                    <div class="col-6">
                                                                                        <?php if ($thresize_num == 0) {
                                                                                        ?>

                                                                                            <input type="text" class="form-control text-center fw-bold opacity-75 bg-white" id="3xl" value="0 qty" disabled />

                                                                                        <?php
                                                                                        } else {
                                                                                        ?>
                                                                                            <input type="text" class="form-control text-center fw-bold " id="3xl" value="<?php echo ($thresize_data["Dressqty"]) ?>">
                                                                                        <?php
                                                                                        }

                                                                                        ?>
                                                                                    </div>
                                                                                    <div class="col-6">
                                                                                        <label for="" class="fw-bold">3XL </label>


                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-4 col-lg-2">
                                                                                <div class="row">
                                                                                    <?php

                                                                                    $thresize = Database::search("SELECT * FROM `dress_has_dress_sizes` WHERE `Dress_id`='" . $id . "' AND `dress_sizes_id`='2' ");
                                                                                    $thresize_num = $thresize->num_rows;
                                                                                    $thresize_data = $thresize->fetch_assoc();


                                                                                    // echo ($thresize_num);
                                                                                    ?>
                                                                                    <div class="col-6">
                                                                                        <?php if ($thresize_num == 0) {
                                                                                        ?>

                                                                                            <input type="text" class="form-control text-center fw-bold opacity-75 bg-white" id="2xl" value="0 qty" disabled />

                                                                                        <?php
                                                                                        } else {
                                                                                        ?>
                                                                                            <input type="text" class="form-control text-center fw-bold bg-white" id="2xl" value="<?php echo ($thresize_data["Dressqty"]) ?>">
                                                                                        <?php
                                                                                        }

                                                                                        ?>
                                                                                    </div>
                                                                                    <div class="col-6">
                                                                                        <label for="" class="fw-bold">2XL </label>


                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-4 col-lg-2">
                                                                                <div class="row">
                                                                                    <?php

                                                                                    $thresize = Database::search("SELECT * FROM `dress_has_dress_sizes` WHERE `Dress_id`='" . $id . "' AND `dress_sizes_id`='3' ");
                                                                                    $thresize_num = $thresize->num_rows;
                                                                                    $thresize_data = $thresize->fetch_assoc();

                                                                                    // echo ($thresize_num);
                                                                                    ?>
                                                                                    <div class="col-6">
                                                                                        <?php if ($thresize_num == 0) {
                                                                                        ?>

                                                                                            <input type="text" class="form-control text-center fw-bold opacity-75 bg-white " id="xl" value="0 qty" disabled />

                                                                                        <?php
                                                                                        } else {
                                                                                        ?>
                                                                                            <input type="text" class="form-control text-center fw-bold bg-white " id="xl" value="<?php echo ($thresize_data["Dressqty"]) ?>">
                                                                                        <?php
                                                                                        }

                                                                                        ?>
                                                                                    </div>
                                                                                    <div class="col-6">
                                                                                        <label for="" class="fw-bold">XL </label>


                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-4 col-lg-2 mt-lg-0 mt-2">
                                                                                <div class="row">
                                                                                    <?php

                                                                                    $thresize = Database::search("SELECT * FROM `dress_has_dress_sizes` WHERE `Dress_id`='" . $id . "' AND `dress_sizes_id`='4' ");
                                                                                    $thresize_num = $thresize->num_rows;
                                                                                    $thresize_data = $thresize->fetch_assoc();

                                                                                    // echo ($thresize_num);
                                                                                    ?>
                                                                                    <div class="col-6">
                                                                                        <?php if ($thresize_num == 0) {
                                                                                        ?>

                                                                                            <input type="text" class="form-control text-center fw-bold opacity-75 bg-white" id="l" value="0 qty" disabled />

                                                                                        <?php
                                                                                        } else {
                                                                                        ?>
                                                                                            <input type="text" class="form-control text-center fw-bold bg-white" id="l" value="<?php echo ($thresize_data["Dressqty"]) ?>">
                                                                                        <?php
                                                                                        }

                                                                                        ?>
                                                                                    </div>
                                                                                    <div class="col-6">
                                                                                        <label for="" class="fw-bold">L </label>


                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-4 col-lg-2 mt-lg-0 mt-2">
                                                                                <div class="row">
                                                                                    <?php

                                                                                    $thresize = Database::search("SELECT * FROM `dress_has_dress_sizes` WHERE `Dress_id`='" . $id . "' AND `dress_sizes_id`='5' ");
                                                                                    $thresize_num = $thresize->num_rows;
                                                                                    $thresize_data = $thresize->fetch_assoc();

                                                                                    // echo ($thresize_num);
                                                                                    ?>
                                                                                    <div class="col-6">
                                                                                        <?php if ($thresize_num == 0) {
                                                                                        ?>

                                                                                            <input type="text" class="form-control text-center fw-bold opacity-75 bg-white" id="m" value="0 qty" disabled />

                                                                                        <?php
                                                                                        } else {
                                                                                        ?>
                                                                                            <input type="text" class="form-control text-center fw-bold bg-white" id="m" value="<?php echo ($thresize_data["Dressqty"]) ?>">
                                                                                        <?php
                                                                                        }

                                                                                        ?>
                                                                                    </div>
                                                                                    <div class="col-6">
                                                                                        <label for="" class="fw-bold">M </label>


                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-4 col-lg-2 mt-lg-0 mt-2">
                                                                                <div class="row">
                                                                                    <?php

                                                                                    $thresize = Database::search("SELECT * FROM `dress_has_dress_sizes` WHERE `Dress_id`='" . $id . "' AND `dress_sizes_id`='6' ");
                                                                                    $thresize_num = $thresize->num_rows;
                                                                                    $thresize_data = $thresize->fetch_assoc();

                                                                                    // echo ($thresize_num);
                                                                                    ?>
                                                                                    <div class="col-6">
                                                                                        <?php if ($thresize_num == 0) {
                                                                                        ?>

                                                                                            <input type="text" class="form-control text-center fw-bold opacity-75 bg-white" id="s" value="0 qty" disabled />

                                                                                        <?php
                                                                                        } else {
                                                                                        ?>
                                                                                            <input type="text" class="form-control text-center fw-bold bg-white" id="s" value="<?php echo ($thresize_data["Dressqty"]) ?>">
                                                                                        <?php
                                                                                        }

                                                                                        ?>
                                                                                    </div>
                                                                                    <div class="col-6">
                                                                                        <label for="" class="fw-bold">S </label>


                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                        </div>

                                                                    </div>

                                                                </div>
                                                            </div>


                                                        </div>
                                                        <div class="col-12 d-flex justify-content-end mt-4">
                                                            <div class="col-6 col-lg-2 d-grid d-flex justify-content-center">
                                                                <div class="col-8 d-grid">
                                                                    <button class="btn btn-danger opacity-75" onclick="updateProductQtySize(<?php echo ($id) ?>);">Update Qty </button>

                                                                </div>
                                                            </div>
                                                        </div>


                                                    </div>





                                                    <div class="col-12 pt-5 mb-5">


                                                        <div class="row justify-content-center">



                                                            <div class="col-lg-10 col-12 d-flex justify-content-center text-center align-items-center d-none d-lg-block p-3 mb-4 fw-bold ">
                                                                <label for="" class="fs-5">Dress Images <span class="opacity-50 text-success"> (Change*)</span></label>
                                                            </div>
                                                            <div class="col-lg-2 col-12 d-flex justify-content-center align-items-end p-3">
                                                                <input type="file" class="d-none" id="porfileimge" multiple>
                                                                <label for="porfileimge" class="btn btn-secondary opacity-75" onclick="addImge();">Update Images</label>
                                                            </div>
                                                            <?php
                                                            $img = array();
                                                            $img[0] = "images/add dress imge.png";
                                                            $img[1] = "images/add dress imge.png";
                                                            $img[2] = "images/add dress imge.png";


                                                            $uplodimage_rs = Database::search("SELECT * FROM `drees_image` WHERE `Dress_id`='" . $dress_Data["id"] . "'");
                                                            $uplodimage_num = $uplodimage_rs->num_rows;

                                                            for ($x = 0; $x < $uplodimage_num; $x++) {
                                                                $uplodimage_data = $uplodimage_rs->fetch_assoc();
                                                                $img[$x] = $uplodimage_data["image_path"];
                                                            }

                                                            ?>

                                                            <div class="col-11 col-lg-4">
                                                                <div class="col-12 d-flex justify-content-center align-items-center">

                                                                    <div class="col-12">
                                                                        <div class=" border border-3 d-flex justify-content-center align-items-center" style="height: 32rem;">
                                                                            <img src="<?php echo ($img[0]); ?>" style="height: 30rem; width: 20rem;" alt="" id="i0">
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                            <div class="col-11 col-lg-4">
                                                                <div class="col-12 d-flex justify-content-center align-items-center">

                                                                    <div class="col-12">
                                                                        <div class=" border border-3 d-flex justify-content-center align-items-center" style="height: 32rem;">
                                                                            <img src="<?php echo ($img[1]); ?>" style="height: 30rem; width: 20rem;" alt="" id="i1">
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                            <div class="col-11 col-lg-4">
                                                                <div class="col-12 d-flex justify-content-center align-items-center">

                                                                    <div class="col-12">
                                                                        <div class=" border border-3 d-flex justify-content-center align-items-center" style="height: 32rem;">
                                                                            <img src="<?php echo ($img[2]); ?>" style="height: 30rem; width: 20rem;" alt="" id="i2">
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>


                                                            <div class="col-12 pt-6 d-flex justify-content-lg-start justify-content-center align-items-center mt-lg-5 mt-4">
                                                                <div class="col-lg-3 col-6 d-grid">

                                                                    <button class="btnprofi opacity-75 p-2  fw-bold" onclick="UpdateProduct('<?php echo ($id) ?>');"> Update Dress </button>
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
                </div>
                <div class="modal fade" id="adminsignout2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                    <div class="modal-dialog modal-dialog-centered d-flex justify-content-center align-items-center">
                        <div class="modal-content w-75 " style="border-radius: 15px; ">
                            <div class="col-12 ">
                                <div class="col-12 p-2 ">
                                    <div class="row">
                                        <div class="col-10">

                                        </div>
                                        <div class="col-2 d-flex justify-content-center align-items-center">
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                                        </div>

                                    </div>
                                </div>
                                <div class="col-12 p-2 ">
                                    <div class="row">
                                        <div class="col-1 d-none d-lg-block"></div>
                                        <div class="col-2 d-flex justify-content-center align-items-cend pb-4 pe-0 ">
                                            <i class="bi bi-person-x fs-1 text-danger opacity-50"></i>

                                        </div>
                                        <div class="col-10 col-lg-9 d-flex justify-content-start align-items-center p-0">
                                            <label for="" class="fs-6">Are You sure want you to Sign out?</label>

                                        </div>

                                    </div>
                                    <div class="col-12 p-2">
                                        <div class="row">
                                            <div class="col-6  d-flex justify-content-center align-items-center">
                                                <div class="col-8 d-grid">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>

                                                </div>

                                            </div>
                                            <div class="col-6  d-flex justify-content-center align-items-center">
                                                <div class="col-8 d-grid">
                                                    <button type="button" class="btn btn-danger" onclick="signoutAdmin();">Yes</button>

                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="msg animatee slide-in-down col-2 text-center"></div>

                <!-- model 2 -->



                <div class="modal fade" id="DressSizeSelect" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog d-flex justify-content-center align-items-center">
                        <div class="modal-content w-75 " style="border-radius: 15px; ">
                            <div class=" col-12 d-flex justify-content-center mt-5">
                                <div class="col-10">
                                    <div class="row">
                                        <div class="col-10  ps-4 pb-4">
                                            <label for="" class="form-label fw-bold fs-5">Select Derss Sizes !!</label>

                                        </div>
                                        <div class="col-2 pb-4 d-flex justify-content-center align-items-center cuser" onclick="addDressSize();">
                                            <i class="bi bi-caret-down-fill"></i>
                                        </div>



                                    </div>

                                    <input type="text" class="form-control opacity-75 fw-bold bg-white d-none" id="Dresssizediv" disabled>

                                    <div class="col-12 mt-3 ps-3 pe-3 border border-1 d-none mb-4" id="addDressShowId" style=" border-radius: 5px;">
                                        <div class="row justify-content-center">



                                            <?php

                                            $dressSize_rs = Database::search("SELECT * FROM `dress_sizes`");
                                            $dressSize_num = $dressSize_rs->num_rows;

                                                // echo($dressSize_num);

                                            ;

                                            for ($y = 0; $y < $dressSize_num; $y++) {

                                                $dressSize_data = $dressSize_rs->fetch_assoc();



                                                $dresId = $dressSize_data["id"];




                                                // echo($dresId);





                                            ?>
                                                <div class="col-6 mt-3 d-flex justify-content-center align-items-center ">
                                                    <div class="col-11 d-grid" style="border-radius: 10px;">
                                                        <!-- <div class="form-check"> -->

                                                        <button class="btndrsSize p-2 fw-bold " onclick="selctDressSize('<?php echo ($dresId) ?>');"><?php echo ($dressSize_data["sizes_name"]) ?></button>
                                                        &nbsp;
                                                        <!-- <label class="form-check-label fw-bold opacity-75 "></label> -->
                                                        <!-- </div> -->
                                                    </div>

                                                </div>


                                            <?php
                                            }




                                            ?>

                                            <div class="col-12 mt-3 d-flex justify-content-center align-items-center ">
                                                <div class="col-11 d-grid" style="border-radius: 10px;">
                                                    <!-- <div class="form-check"> -->

                                                    <button class="btndrsSize p-2 fw-bold " value="allsize" id="allsize" onclick="selctDressSize('<?php echo ('al') ?>');">All Sizes</button>

                                                    &nbsp;
                                                    <!-- <label class="form-check-label fw-bold opacity-75 "></label> -->
                                                    <!-- </div> -->
                                                </div>

                                            </div>


                                        </div>

                                        <div class="col-12 p-2">
                                            <div class="row">
                                                <div class="col-6  d-flex justify-content-center align-items-center">
                                                    <div class="col-8 d-grid">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>

                                                    </div>

                                                </div>
                                                <div class="col-6  d-flex justify-content-center align-items-center">
                                                    <div class="col-8 d-grid">
                                                        <button type="button" class="btn btn-danger" onclick="addsizeDone()">Ok</button>

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

            </div>
            </div>






        <?php

        } else {

            echo (" <div class='col-12 d-flex justify-content-center align-items-center mt-5'>
    <h3 class='sebutt'>Plase GO to LogIn Admin.... </h3> 
     </div> ");


        ?>

            <!-- <a href="index.php" class="text-decoration-none signout2"> register/sign in</a> -->
            <div class="col-12 d-flex justify-content-center align-items-center mt-5">
                <button class="btn btn-danger"> <a href="./adminsignIn.php" class="text-decoration-none regbut">Admin LogIn</a></button>
            </div>





        <?php
        }


        ?>

        <script src="./bootstrap.bundle.js"></script>
        <script src="./script.js"></script>
        <script src="./bootstrap.jss"> </script>
    </body>

    </html>







<?php
} else {
    echo ("no dress !!");
}

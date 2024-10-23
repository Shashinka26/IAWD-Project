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
    <!-- <link rel="stylesheet" href="./erroMsg.css"> -->

</head>

<body>

    <?php
    require "connection.php";
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
                                                            <div class="col-12  p-3 admenu2" onclick="window.location='addProduct.php'">
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
                                                            <div class="col-12  p-3  admenu" onclick="window.location='updateProduct.php'">
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

                            <div class="col-12  p-3 admindiv2 pb-5">
                                <!-- <div class="row adminscorll d-lg-block d-none"> -->
                                <div class="row adminscorll2 ">


                                    <div class="col-12 " id="AddDressDiv">
                                        <div class="row">

                                            <div class="col-12 d-flex justify-content-center align-items-center pt-5">
                                                <i class="bi bi-plus-lg fs-2 fw-bold pe-2 "></i>
                                                <label for="" class="fs-3   fw-bold opacity-75 ">Add New Dress</label>
                                            </div>


                                            <div class="col-12 pt-5 mt-4">
                                                <div class="row">
                                                    <div class="col-lg-6 col-12 d-flex justify-content-center">
                                                        <div class="col-10">
                                                            <label for="" class="form-label fw-bold fs-5 ms-2">Derss Code</label>
                                                            <input type="text" class="form-control opacity-75 fw-bold" id="Dcode" value="NVS ">
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-6 col-12 d-flex justify-content-center mt-lg-0 mt-5">
                                                        <div class="col-10">
                                                            <label for="" class="form-label fw-bold fs-5 ms-2">Cost Per Derss</label>
                                                            <input type="text" class="form-control opacity-75 fw-bold " placeholder="RS." id="Dcost">
                                                        </div>

                                                    </div>

                                                    <div class="col-lg-6 col-12 mt-5 ">
                                                        <div class="row justify-content-center">
                                                            <div class="col-10">
                                                                <label class="form-label fw-bold fs-5">Add Product Quantity</label>
                                                            </div>
                                                            <div class="col-10">
                                                                <input type="number" class="form-control opacity-75 fw-bold" value="0" min="0" id="qty" id="qty2" />
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="col-lg-6 col-12 d-flex justify-content-center mt-5">
                                                        <div class="col-10">
                                                            <label for="" class="form-label fw-bold fs-5 ms-2">Cost Per Delivery </label>
                                                            <input type="text" class="form-control opacity-75 fw-bold" placeholder="RS." id="deliverycost">
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-6 col-12 d-flex justify-content-center mt-5">
                                                        <div class="col-10">
                                                            <label for="" class="form-label fw-bold fs-5 ms-2"> Westen Province Delivery Fee </label>
                                                            <input type="text" class="form-control opacity-75 fw-bold" placeholder="RS." id="deliverycost2">
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-6 col-12 d-flex justify-content-center mt-5">
                                                        <div class="col-10">
                                                            <label for="" class="form-label fw-bold fs-5 ms-2"> Model Size </label>
                                                            <!-- <input type="text" class="form-control opacity-75 fw-bold" placeholder="RS." id="deliverycost2"> -->



                                                            <select name="" class="form-select fw-bold opacity-75" id="modelsize">
                                                                <?php
                                                                $dress_model_s = Database::search("SELECT * FROM `model_size`");
                                                                $dress_model_s_num = $dress_model_s->num_rows;
                                                                for ($y = 0; $y < $dress_model_s_num; $y++) {
                                                                    $dress_model_s_data = $dress_model_s->fetch_assoc();
                                                                ?>
                                                                    <option value="<?php echo($dress_model_s_data["Moid"]) ?>" class="fw-bold"><?php echo($dress_model_s_data["Msize_name"]) ?></option>

                                                                <?php
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>





                                                    <div class="col-lg-12 col-12 d-flex justify-content-center mt-5">
                                                        <div class="col-12 d-flex justify-content-center" id="addmatrialdiv">
                                                            <div class="col-10 col-lg-11">
                                                                <div class="row">
                                                                    <div class="col-10  ps-4">
                                                                        <label for="" class="form-label fw-bold fs-5">Material</label>

                                                                    </div>
                                                                    <div class="col-2 d-flex justify-content-center align-items-center cuser" onclick="addDressmaterial();">
                                                                        <i class="bi bi-caret-down-fill"></i>
                                                                    </div>

                                                                </div>
                                                                <input type="text" class="form-control opacity-75 fw-bold" id="materiayname">

                                                                <div class="col-12 p-2 border border-1 border-top-0 d-none" id="addDressMaterialId" style="border-radius: 0px 0px 10px 10px;">
                                                                    <div class="col-12">
                                                                        <div class="row p-3">

                                                                            <div class="col-10">
                                                                                <input type="text" class="form-control opacity-75 fw-bold" placeholder="Add New Material" id="addNewmaterialiId">
                                                                            </div>
                                                                            <div class="col-2 d-grid">
                                                                                <button class="btn btn-success opacity-50 " onclick="addNewmaterial();">Add</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12 mt-3  addDressscorll p-2">


                                                                        <?php

                                                                        $material_rs = Database::search("SELECT * FROM `materiale`");
                                                                        $material_num = $material_rs->num_rows;

                                                                        for ($x = 0; $x < $material_num; $x++) {

                                                                            $material_data = $material_rs->fetch_assoc();
                                                                        ?>

                                                                            <div class="col-12 p-2 materialdiv" onclick="addmaterial('<?php echo ($material_data['material_name']) ?>');">
                                                                                <div class="row">

                                                                                    <div class="col-12 d-flex justify-content-center">
                                                                                        <label for="" class="fw-bold opacity-75"><?php echo ($material_data["material_name"]) ?></label>
                                                                                    </div>

                                                                                </div>
                                                                            </div>
                                                                        <?php

                                                                        }



                                                                        ?>



                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>


                                                    </div>



                                                </div>

                                            </div>


                                        </div>



                                        <div class="col-12 pt-5 mb-5">


                                            <div class="row justify-content-center">



                                                <div class="col-lg-10 col-12 d-flex justify-content-center align-items-center p-3 mb-4 fw-bold ">
                                                    <label for="" class="fs-5">Dress Images</label>
                                                </div>
                                                <div class="col-lg-2 col-12 d-flex justify-content-center align-items-end p-3">
                                                    <input type="file" class="d-none" id="porfileimge" multiple>
                                                    <label for="porfileimge" class="btn btn-secondary opacity-75" onclick="addImge();">Add Images</label>
                                                </div>
                                                <div class="col-11 col-lg-4">
                                                    <div class="col-12 d-flex justify-content-center align-items-center">

                                                        <div class="col-12">
                                                            <div class=" border border-3 d-flex justify-content-center align-items-center" style="height: 32rem;">
                                                                <img src="./images/add dress imge.png" style="height: 30rem; width: 20rem;" alt="" id="i0">
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="col-11 col-lg-4">
                                                    <div class="col-12 d-flex justify-content-center align-items-center">

                                                        <div class="col-12">
                                                            <div class=" border border-3 d-flex justify-content-center align-items-center" style="height: 32rem;">
                                                                <img src="./images/add dress imge.png" style="height: 30rem; width: 20rem;" alt="" id="i1">
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="col-11 col-lg-4">
                                                    <div class="col-12 d-flex justify-content-center align-items-center">

                                                        <div class="col-12">
                                                            <div class=" border border-3 d-flex justify-content-center align-items-center" style="height: 32rem;">
                                                                <img src="./images/add dress imge.png" style="height: 30rem; width: 20rem;" alt="" id="i2">
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>


                                                <div class="col-12 pt-4 d-flex justify-content-start align-items-center mt-4">
                                                    <div class="col-3 d-grid">

                                                        <button class="btnprofi opacity-75 p-2  fw-bold" onclick="addDress();"> Add Dress </button>
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
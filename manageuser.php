<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nevi's Admin | ManageUsers </title>
    <link rel="icon" href="./images/heder.icon.png">

    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="./bootstrap.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>
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
                       

                                                            <div class="col-12  p-3  admenu2" onclick="window.location='manageuser.php'">
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
                                <!-- <div class="row adminscorll2 "> -->
                                <div class="row bg-white">

                                    <div class="col-12 " id="ManageUserMainView">
                                        <div class="row">

                                            <div class="col-12  pt-lg-5 pt-3 mb-3">
                                                <div class="row justify-content-center">

                                                    <div class="col-4 d-none d-lg-block"></div>
                                                    <div class="col-4 d-none d-lg-block">

                                                        <i class="bi bi-gear fs-2 fw-bold pe-2"></i>
                                                        <label for="" class="fs-3   fw-bold opacity-75 ">Manage Users</label>
                                                    </div>
                                                    <div class="col-lg-4 col-12 d-flex justify-content-center">
                                                        <div class="col-10">
                                                            <button style="position: absolute; background-color: transparent;" class="border-0 mt-1">
                                                                <img src="./images/icon/search (3).png" style="width: 2rem; height: 2rem;" class="opacity-50" alt=""  onclick="ManageuserSearch(0);"></button>
                                                            <input type="text" class="form-control ps-5 border-1 fw-bold text-black-50" style="border-radius: 15px;" placeholder="Search for user email " id="manageUserSerchInput" onkeyup="ManageuserSearch(0);">
                                                        </div>

                                                    </div>


                                                </div>

                                            </div>


                                            <?php

                                            if (isset($_GET["page"])) {
                                                $pageno = $_GET["page"];
                                            } else {
                                                $pageno = 1;
                                            }

                                            $user_rs = Database::search("SELECT * FROM `user` ");
                                            $user_num = $user_rs->num_rows;

                                            // echo($product_num);
                                            $results_per_page = 9;
                                            $number_of_pages = ceil($user_num / $results_per_page);

                                            $page_result = ($pageno - 1) * $results_per_page;
                                            $usedata_rs = Database::search("SELECT * FROM `user`   ORDER BY `joined_date` DESC  LIMIT " . $results_per_page . " OFFSET " . $page_result . "");

                                            $usedata_num = $usedata_rs->num_rows;


                                            ?>
                                            <div class="col-12  updeateProductscorll" >
                                                <div class="row justify-content-center p-0" id="ManageuserViewarea">




                                                    <?php

                                                    for ($i = 0; $i <  $usedata_num; $i++) {

                                                        $usedata_data =  $usedata_rs->fetch_assoc();

                                                    ?>

                                                        <div class="updateuser p-0 me-lg-4 me-2 mt-3 mb-3 ms-lg-0  ms-2 border border-1 col-11 ps-4 pt-2 pb-2" >
                                                            <div class="row">

                                                                <div class="col-12">
                                                                    <div class="row">
                                                                        <div class="col-lg-10 col-6" >
                                                                            <?php

                                                                            if ($usedata_data["status"] == 1) {
                                                                            ?>
                                                                                <div class="row">
                                                                                    <div class="col-lg-3 col-12 d-flex justify-content-center">

                                                                                        <div class="col-lg-8 col-8  d-flex justify-content-center">


                                                                                            <?php

                                                                                            $userImage_rs = Database::search("SELECT * FROM `user_image` WHERE  `user_email`='" . $usedata_data["email"] . "'");
                                                                                            $userImage_num = $userImage_rs->num_rows;
                                                                                            $userImage_data = $userImage_rs->fetch_assoc();



                                                                                            ?>


                                                                                            <?php
                                                                                            if ($userImage_num == 0) {
                                                                                            ?>
                                                                                                <img src="./images/icon/uesr main.png" style="height: 18rem; width: 6rem; height: 6rem;" alt="" class="p-1 opacity-50">

                                                                                            <?php
                                                                                            } else if ($usedata_data["status"] == 1) {
                                                                                            ?>

                                                                                                <img src="<?php echo ($userImage_data["Image_path"]) ?>" style="height: 18rem; width: 6rem; height: 6rem;" alt="" class="p-1">

                                                                                            <?php
                                                                                            } else if ($usedata_data["status"] == 2) {

                                                                                            ?>



                                                                                                <img src="<?php echo ($userImage_data["Image_path"]) ?>" class="opacity-50" style="height: 6rem; width: 6rem; " alt="">


                                                                                            <?php
                                                                                            }
                                                                                            ?>
                                                                                        </div>


                                                                                    </div>
                                                                                    <div class="col-8 d-none d-lg-block ">
                                                                                        <div class="col-12 ">
                                                                                            <label for="" class="mt-3 fs-5 fw-bold"><?php echo ($usedata_data["fname"]) ?>&nbsp;<?php echo ($usedata_data["lname"]) ?></label>

                                                                                        </div>

                                                                                        <div class="col-12 mt-2">
                                                                                            <label for="" class=" fs-6 fw-bold opacity-75">(<?php echo ($usedata_data["email"]) ?>)</label>

                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                            <?php
                                                                            } else if ($usedata_data["status"] == 2) {
                                                                            ?>
                                                                                <div class="row opacity-75">
                                                                                    <div class="col-lg-3 col-12 d-flex justify-content-center">

                                                                                        <div class="col-lg-8 col-8  d-flex justify-content-center">


                                                                                            <?php

                                                                                            $userImage_rs = Database::search("SELECT * FROM `user_image` WHERE  `user_email`='" . $usedata_data["email"] . "'");
                                                                                            $userImage_num = $userImage_rs->num_rows;
                                                                                            $userImage_data = $userImage_rs->fetch_assoc();



                                                                                            ?>


                                                                                            <?php
                                                                                            if ($userImage_num == 0) {
                                                                                            ?>
                                                                                                <img src="./images/icon/uesr main.png" style="height: 18rem; width: 6rem; height: 6rem;" alt="" class="p-1 opacity-50">

                                                                                            <?php
                                                                                            } else if ($usedata_data["status"] == 1) {
                                                                                            ?>

                                                                                                <img src="<?php echo ($userImage_data["Image_path"]) ?>" style="height: 18rem; width: 6rem; height: 6rem;" alt="" class="p-1">

                                                                                            <?php
                                                                                            } else if ($usedata_data["status"] == 2) {

                                                                                            ?>



                                                                                                <img src="<?php echo ($userImage_data["Image_path"]) ?>" class="opacity-50" style="height: 6rem; width: 6rem; " alt="">


                                                                                            <?php
                                                                                            }
                                                                                            ?>
                                                                                        </div>


                                                                                    </div>
                                                                                    <div class="col-8 d-none d-lg-block ">
                                                                                        <div class="col-12 ">
                                                                                            <label for="" class="mt-3 fs-5 fw-bold"><?php echo ($usedata_data["fname"]) ?>&nbsp;<?php echo ($usedata_data["lname"]) ?></label>

                                                                                        </div>

                                                                                        <div class="col-12 mt-2">
                                                                                            <label for="" class=" fs-6 fw-bold opacity-75">(<?php echo ($usedata_data["email"]) ?>)</label>

                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                            <?php
                                                                            }

                                                                            ?>
                                                                        </div>

                                                                        <div class="col-lg-2  col-6 p-2">
                                                                            <div class="row">
                                                                                <div class="col-8">
                                                                                    <div class="row " >
                                                                                        <?php

                                                                                        if ($usedata_data["status"] == 1) {
                                                                                        ?>
                                                                                            <button class=" btnprofi p-2  opacity-75 " id="block" style="border-radius: 5px;" onclick="blockuser('<?php echo ($usedata_data['email']) ?>');">Block</button>

                                                                                        <?php
                                                                                        } else if ($usedata_data["status"] == 2) {
                                                                                        ?>

                                                                                            <button class=" btn btn-danger  opacity-75" id="unblock" onclick="Unblockuser('<?php echo ($usedata_data['email']) ?>');">Unblock</button>


                                                                                        <?php
                                                                                        }
                                                                                        ?>

                                                                                        <button class=" btn btn-secondary mt-2 opacity-75" onclick="manageuserPrfile('<?php echo($usedata_data['email']) ?>');">Profile</button>
                                                                                    </div>

                                                                                </div>

                                                                                <div class="col-4 d-flex justify-content-center align-items-center">

                                                                                    <div class="col-12 recycale  d-flex justify-content-center" onclick="removeUser('<?php echo($usedata_data['email']) ?>')" );>
                                                                                        <i class="bi bi-trash3 fs-5 fw-bold " id="<?php echo ($usedata_data['email']) ?>"></i>

                                                                                    </div>

                                                                                </div>
                                                                            </div>

                                                                        </div>

                                                                        <div class="col-12 d-lg-none mt-2">
                                                                            <div class="row justify-content-center">
                                                                                <div class="col-12 d-flex justify-content-center">
                                                                                    <label for="" class="mt-3 fs-5 fw-bold"><?php echo ($usedata_data["fname"]) ?>&nbsp;<?php echo ($usedata_data["lname"]) ?></label>

                                                                                </div>

                                                                                <div class="col-12 d-flex justify-content-center mt-2">
                                                                                    <label for="" class=" fs-6 fw-bold opacity-75">(<?php echo ($usedata_data["email"]) ?>)</label>

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



                                                    <div class="col-12 d-flex justify-content-center ">
                                                        <div class="col-12">
                                                            <nav aria-label="Page navigation example">
                                                                <ul class="pagination pagination-lg justify-content-center">
                                                                    <li class="rounded-circle d-flex align-items-center ">
                                                                        <a class=" border-0   " href="<?php if ($pageno <= 1) {
                                                                                                            echo ("#");
                                                                                                        } else {
                                                                                                            echo ("?page=" . ($pageno - 1));
                                                                                                        } ?>" aria-label="Previous">
                                                                            <span aria-hidden="true"><i class="bi bi-chevron-compact-left  fs-4 text-black"></i></span>
                                                                        </a>
                                                                    </li>

                                                                    <?php

                                                                    for ($x = 1; $x <= $number_of_pages; $x++) {
                                                                        if ($x == $pageno) {

                                                                    ?>
                                                                            <li class="page-item d-flex align-items-center ps-3 pe-3  me-1 ms-1 bg-white" active-color="black" style="border-radius: 30px;">
                                                                                <a class=" border-0 rounded-circle text-black fw-bold opacity-25 fs-5 text-decoration-none" href="<?php echo ("?page=" . ($x)); ?>"><?php echo ($x); ?></a>
                                                                            </li>




                                                                        <?php
                                                                        } else {
                                                                        ?>

                                                                            <li class="page-item d-flex align-items-center ps-3 pe-3 ms-1 me-1">
                                                                                <a class=" border-0 rounded-circle text-black opacity-75 fw-bold fs-5 text-decoration-none" href="<?php echo ("?page=" . ($x)); ?>"><?php echo ($x); ?></a>
                                                                            </li>
                                                                    <?php
                                                                        }
                                                                    }

                                                                    ?>


                                                                    <li class="rounded-circle d-flex align-items-center ">

                                                                        <a class=" border-0  " href="<?php if ($pageno >= $number_of_pages) {
                                                                                                            echo ("#");
                                                                                                        } else {
                                                                                                            echo ("?page=" . ($pageno + 1));
                                                                                                        } ?>" aria-label="Next">
                                                                            <span aria-hidden="true"><i class="bi bi-chevron-compact-right fs-4 text-black"></i></span>
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </nav>
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

            <!-- model 3 -->
            <div class="modal fade" id="UserRemove" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered d-flex justify-content-center align-items-center">
                    <div class="modal-content w-75 " style="border-radius: 15px; ">
                        <div class="col-12 ">
                            <div class="col-12 p-2 ">
                                <div class="row">
                                    <div class="col-10">
                                        <label for="" class="ps-3 fw-bold fs-lg-5 fs-6" id="userRemovelable"></label>
                                    </div>
                                    <div class="col-2 d-flex justify-content-center align-items-center">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                                    </div>

                                </div>
                            </div>
                            <div class="col-12 mb-4">
                                <div class="row">
                                    <div class="col-2 d-lg-none"></div>
                                    <div class="col-lg-8 col-6  p-lg-2 p-0 d-flex align-items-center justify-content-center ">
                                        <div class="row ">
                                            <!-- <div class="col-1 d-none d-lg-block"></div> -->

                                            <div class="col-12  d-flex justify-content-center align-items-center p-0">
                                                <label for="" class="fs-6 fw-bold opacity-50">Are You sure Delete this User ?</label>

                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-4 p-2">
                                        <div class="row">
                                            <div class="col-12  d-flex justify-content-center align-items-center mb-2">
                                                <div class="col-8 d-grid">
                                                    <button type="button" class="btn btn-danger p-0" onclick="deleteuser();">Yes</button>

                                                </div>

                                            </div>
                                            <div class="col-12  d-flex justify-content-center align-items-center">
                                                <div class="col-8 d-grid">
                                                    <button type="button" class="btn btn-secondary p-0" data-bs-dismiss="modal">No</button>

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



            <!-- model 2 -->



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

    <!-- <script>
        $("#block").click(function(){
            $("#manguserblock").load(" #manguserblock");
        });
    </script> -->

    <script src="./bootstrap.bundle.js"></script>
    <script src="./script.js"></script>
    <script src="./bootstrap.jss"> </script>
</body>

</html>
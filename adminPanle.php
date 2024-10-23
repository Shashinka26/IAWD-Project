<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nevi's Admin Panel</title>
    <link rel="icon" href="./images/heder.icon.png">

    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="./bootstrap.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
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


                                                            <div class="col-12  p-3  admenu2" onclick="window.location='adminPanle.php'">
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




                                                            <div class="col-12  p-3  admenu" onclick="window.location=''">
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
                                <div class="row adminscorll2 bg-white d-flex flex-column align-items-center">
                                    <div class="d-flex flex-lg-row flex-column col-12 mt-5">
                                        <div class="col-lg-4 col-12 p-4 d-flex flex-row ">
                                            <div class="bg-light col-lg-10 col-12 rounded-3 d-flex flex-row p-3">
                                                <div class="col-5">
                                                    <div class="rounded-circle col-9 bg-white p-3 bg-danger d-flex justify-content-center align-items-center">
                                                        <i class="bi bi-people-fill fs-1 text-black opacity-75"></i>
                                                    </div>
                                                </div>
                                                <div class="col-7">
                                                    <div class="d-flex justify-content-center align-items-center">
                                                        <span class="fw-bold">Total Users</span>
                                                    </div>
                                                    <div class="d-flex justify-content-center align-items-center mt-2">
                                                        <?php
                                                        $all_users = Database::search("SELECT * FROM `user`  ");
                                                        $all_users_num = $all_users->num_rows;
                                                        ?>
                                                        <span class="fw-bold fs-2"><?php echo $all_users_num ?></span>
                                                    </div>
                                                </div>


                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-12 p-4 d-flex flex-row ">
                                            <div class="bg-light col-lg-10 col-12 rounded-3 d-flex flex-row p-3">
                                                <div class="col-5">
                                                    <div class="rounded-circle col-9 bg-white p-3 bg-danger d-flex justify-content-center align-items-center">
                                                        <!-- <i class="bi bi-people-fill"></i> -->
                                                        <i class="bi bi-person-x-fill text-black opacity-75 fs-1"></i>
                                                    </div>
                                                </div>
                                                <div class="col-7">
                                                    <div class="d-flex justify-content-center align-items-center">
                                                        <span class="fw-bold">Deactive Users</span>
                                                    </div>
                                                    <div class="d-flex justify-content-center align-items-center mt-2">
                                                        <?php
                                                        $deactive_users = Database::search("SELECT * FROM `user` WHERE `status`='2'  ");
                                                        $deactive_users_num = $deactive_users->num_rows;
                                                        ?>
                                                        <span class="fw-bold fs-2"><?php echo $deactive_users_num ?></span>
                                                    </div>
                                                </div>


                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-12 p-4 d-flex flex-row ">
                                            <div class="bg-light col-lg-10 col-12 rounded-3 d-flex flex-row p-3">
                                                <div class="col-5">
                                                    <div class="rounded-circle col-9 bg-white p-3 bg-danger d-flex justify-content-center align-items-center">
                                                        <i class="bi bi-boxes text-black opacity-75 fs-1"></i>

                                                    </div>
                                                </div>
                                                <div class="col-7">
                                                    <div class="d-flex justify-content-center align-items-center">
                                                        <span class="fw-bold">Total Product</span>
                                                    </div>
                                                    <div class="d-flex justify-content-center align-items-center mt-2">
                                                        <?php
                                                        $dress_all = Database::search("SELECT * FROM `dress` ");
                                                        $dress_all_num = $dress_all->num_rows;
                                                        ?>
                                                        <span class="fw-bold fs-2"><?php echo $dress_all_num ?></span>
                                                    </div>
                                                </div>


                                            </div>
                                        </div>
                                    </div>

                                    <div class="d-flex flex-lg-row flex-sm-column col-sm_12 ">
                                        <div class="col-lg-4 col-12 p-4 d-flex flex-row ">
                                            <div class="bg-light col-lg-10 col-12 rounded-3 d-flex flex-row p-3">
                                                <div class="col-5">
                                                    <div class="rounded-circle col-9 bg-white p-3 bg-danger d-flex justify-content-center align-items-center">
                                                        <i class="bi bi-credit-card-fill text-black opacity-75 fs-1"></i>
                                                    </div>
                                                </div>
                                                <div class="col-7">
                                                    <div class="d-flex justify-content-center align-items-center">
                                                        <span class="fw-bold">Online Orders</span>
                                                    </div>
                                                    <div class="d-flex justify-content-center align-items-center mt-2">
                                                        <?php
                                                        $online_order_all = Database::search("SELECT * FROM `orders` WHERE `order_type`='register_cart_online' OR `order_type`='register_online' OR `order_type`='register_cart_online' ");
                                                        $online_order_all_num = $online_order_all->num_rows;
                                                        ?>
                                                        <span class="fw-bold fs-2"><?php echo $online_order_all_num ?></span>
                                                    </div>
                                                </div>


                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-12 p-4 d-flex flex-row ">
                                            <div class="bg-light col-lg-10 col-12 rounded-3 d-flex flex-row p-3">
                                                <div class="col-5">
                                                    <div class="rounded-circle col-9 bg-white p-3 bg-danger d-flex justify-content-center align-items-center">
                                                        <i class="bi bi-truck text-black opacity-75 fs-1"></i>
                                                    </div>
                                                </div>
                                                <div class="col-7">
                                                    <div class="d-flex justify-content-center align-items-center">
                                                        <span class="fw-bold">Cash On Delivery</span>
                                                    </div>
                                                    <div class="d-flex justify-content-center align-items-center mt-2">
                                                        <?php
                                                        $online_order_all_none = Database::search("SELECT * 
                                                        FROM orders 
                                                        WHERE 
                                                           !(order_type='register_cart_online' OR order_type='register_online' OR order_type='register_cart_online') 
                                                            
                                                    ");

                                                        $online_order_all_none_num = $online_order_all_none->num_rows;
                                                        ?>
                                                        <span class="fw-bold fs-2"><?php echo $online_order_all_none_num ?></span>
                                                    </div>
                                                </div>


                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-12  p-4 d-flex flex-row ">
                                            <div class="bg-light col-lg-10 col-12 rounded-3 d-flex flex-row p-3">
                                                <div class="col-5">
                                                    <div class="rounded-circle col-9 bg-white p-3 bg-danger d-flex justify-content-center align-items-center">
                                                        <i class="bi bi-box2-fill fs-1 text-black opacity-75"></i>
                                                    </div>
                                                </div>
                                                <div class="col-7">
                                                    <div class="d-flex justify-content-center align-items-center">
                                                        <span class="fw-bold">Total Orders</span>
                                                    </div>
                                                    <div class="d-flex justify-content-center align-items-center mt-2">
                                                        <?php
                                                        $order_all = Database::search("SELECT * FROM `orders` ");
                                                        $order_all_num = $order_all->num_rows;
                                                        ?>
                                                        <span class="fw-bold fs-2"><?php echo $order_all_num ?></span>
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
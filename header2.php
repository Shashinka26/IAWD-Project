<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="./bootstrap.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>


</head>

<body class="">

    <div class=" container-fluid p-0 overflow-hidden">


        <header>
            <div class="row    header1 fixed-top  " style="background-color: rgb(255, 255, 255);">

                <div class="col-3 col-lg-4 ps-4 pt-1 pb-1 p-0 d-flex justify-content-start align-items-center">

                    <img src="./images/logo.jpeg" class="rounded-circle " onclick="window.location='home.php'" style="width: 55px; border-style: solid; border-color:  rgb(107, 107, 107); border-width: 3px; cursor: pointer;">





                    <?php
                    require "connection.php";
                    session_start();

                    if (isset($_SESSION["u"])) {
                        $data = $_SESSION["u"];

                        // echo($data["fname"]);

                    ?>
                        <div class="col-9 d-none d-lg-block ms-2">
                            <span class="text_lg_start mx-2 welcom vh-100 mb-3 "><b class="fs-5 ">Wellcom to Nevi's </b> &ndash;
                                <i class=" usericon "><?php echo ($data["fname"]); ?></i>

                            </span>
                        </div>



                    <?php

                    } else {

                    ?>

                        <div class="col-9 d-none d-lg-block ms-2">
                            <span class="text_lg_start mx-2  vh-100  fs-2 opacity-75 "><b class="fs-3 "> Nevi's </b>


                            </span>
                        </div>
                    <?php
                    }

                    ?>












                </div>


                <div class="col-6 d-lg-none d-flex justify-content-center align-items-center">
                    <div class="col-12 d-flex justify-content-center align-items-center">
                        <label for="" class="form-label fs-1 usericon">Nevi's Fashion</label>
                    </div>
                </div>

                <div class=" col-3 col-lg-4 ps-lg-3 p-0  d-flex justify-content-lg-center  justify-content-end ">

                    <nav class="navbar bg-body-tertiary  navbar-expand-lg ">
                        <div class="container-fluid p-0">
                            <!-- <span class="d-lg-none"> HOME</span> -->

                            <!-- <a class="navbar-brand" href="#">Offcanvas navbar</a> -->
                            <button class="navbar-toggler me-3" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                                <!-- <span class="navbar-toggler-icon"></span> -->
                                <!-- <i class="bi bi-list-ul fs-2"></i> -->
                                <i class="bi bi-justify fs-1"></i>

                            </button>
                            <div class="offcanvas offcanvas-start w-75" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                                <div class="offcanvas-header">
                                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Menu</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                                </div>
                                <div class="offcanvas-body">
                                    <ul class="navbar-nav">
                                        <li class="nav-item pt-2 pt-lg-3 pb-lg-3 pe-lg-3 ms-3 ms-lg-0 p-lg-0 p-2">
                                            <div class="row">
                                                <div class="col-lg-12 col-10">
                                                    <a class="text-decoration-none active a" aria-current="page" href="home.php">Home</a>

                                                </div>
                                                <div class="col-2 d-lg-none ">
                                                    <i class="bi bi-house-door   fs-3  ps-1 pe-1 opacity-75"></i>

                                                </div>
                                            </div>

                                        </li>
                                        <li class="nav-item  pt-2 p-lg-3 ms-3 ms-lg-0 p-2">
                                            <div class="row">
                                                <div class="col-lg-12 col-10">
                                                    <a class="text-decoration-none   a" href="allProduct.php">All Dress</a>

                                                </div>
                                                <div class="col-2 d-lg-none ">
                                                    <i class="bi bi-house-door   fs-3  ps-1 pe-1 opacity-75"></i>

                                                </div>
                                            </div>
                                        </li>

                                        <li class="nav-item pt-2  p-lg-3 ms-3 ms-lg-0 p-2">
                                            <div class="row">
                                                <div class="col-lg-12 col-10">
                                                    <a class="text-decoration-none active a" href="userProfile.php">My Profile</a>

                                                </div>
                                                <div class="col-2 d-lg-none ">
                                                    <i class="bi bi-person-bounding-box   fs-3  ps-1 pe-1 opacity-75"></i>

                                                </div>
                                            </div>
                                        </li>

                                        <li class="nav-item pt-2  p-lg-3 ms-3 ms-lg-0 p-2">
                                            <div class="row">
                                                <div class="col-lg-12 col-10">
                                                    <a class="text-decoration-none  a" href="./adminsignIn.php">Track My Oders</a>


                                                </div>
                                                <div class="col-2 d-lg-none ">
                                                    <i class="bi bi-house-door   fs-3  ps-1 pe-1 opacity-75"></i>

                                                </div>
                                            </div>
                                        </li>

                                        <li class="nav-item pt-5  p-lg-3 ms-3 ms-lg-0 p-2">
                                            <div class="row">
                                                <div class="col-lg-12 col-10 d-lg-none">

                                                    <?php
                                                    // session_start();


                                                    if (isset($_SESSION["u"])) {
                                                        $data = $_SESSION["u"];
                                                    ?>


                                                        <span class="text-lg-start signout  " onclick="userlogout();">sIgn Out
                                                            <i class="bi bi-box-arrow-right "></i>

                                                        <?php

                                                    } else {

                                                        ?>

                                                            <a href="signInpage.php" class="text-decoration-none signout2"> Register
                                                                <i class="bi bi-person-add"></i>
                                                            </a>


                                                        <?php
                                                    }

                                                        ?>


                                                        </span>

                                                </div>
                                            </div>
                                        </li>

                                    </ul>

                                </div>
                            </div>
                        </div>
                    </nav>
                </div>

                <div class="col-3 col-md-1 mt-2 ms-md-5 ms-0 ms-lg-0  mt-lg-0 col-lg-1  mb-2 d-flex justify-content-end align-items-center  ">





                    <!-- <img src="./images/icon/CART2.svg" alt="" class="cart opacity-50"> -->
                    <div class="" id="cartdiv" onclick="window.location='cart.php'">
                        <div class="container">

                            <div class=" p-0 " data-toggle="tooltip" data-bs-placement="bottom" title="cart">
                                <div class="row">


                                    <?php

                                    if (isset($_SESSION["u"])) {
                                        $cart = Database::search("SELECT * FROM `cart` WHERE `user_email`='" . $_SESSION["u"]["email"] . "'");
                                        $cart_num = $cart->num_rows;

                                        if ($cart_num < 1) {
                                    ?>
                                            <div class=" p-0 pe-2 pe-lg-3">
                                                <i class="bi bi-handbag cart fs-3 opacity-50 "></i>

                                            </div>



                                        <?php
                                        } else {
                                        ?>
                                            <div class=" p-0 pe-3 pe-lg-3">
                                                <i class="bi bi-handbag cart fs-3 opacity-50 "></i>

                                            </div>

                                            <div class="bg-black rounded-circle d-flex justify-content-center align-items-center ms-3 " style="height: 18px; width: 15px; position: absolute;">

                                                <label for="" class="text-white" style="font-size: 8px; "><?php echo ($cart_num); ?></label>
                                            </div>

                                        <?php

                                        }
                                    } else {
                                        ?>

                                        <div class=" p-0 pe-2 pe-lg-3">
                                            <i class="bi bi-handbag cart fs-3 opacity-50 "></i>

                                        </div>

                                    <?php
                                    }


                                    ?>


                                </div>
                            </div>

                        </div>
                    </div>

                    <!-- <img src="./images/icon/wichlist (2).png"> -->


                    <!-- <div class="popover" role="tooltip"><div class="arrow"></div><h3 class="popover-header"></h3><div class="popover-body"></div></div>' -->


                    <div class="popover-body p-0 pe-3 pe-lg-2" data-toggle="tooltip" data-bs-placement="bottom" title="Wichlist">
                        <i class="bi bi-heart fs-3 cart opacity-50" alt="" onclick="window.location='wichlist.php'"></i>
                    </div>
                </div>

                <div class="col-9  col-md-10 mt-2 mt-lg-0 col-lg-2  ps-lg-4 ps-md-3 ps-1 mb-2 pt-lg-3">
                    <div class="row align-items-center">

                        <div class="col-2 p-0 d-flex  " id="togel1">
                            <!-- <img src="images/icon/search (3).png"  -->
                            <i class="bi bi-search fs-4 opacity-50 cart border-1" alt="" class=" " onclick="serchtogel();"></i>&nbsp;&nbsp;&nbsp;
                        </div>
                        <div class=" d-none col-11 p-0 d-grid" id="togel2">


                            <input type="text" class="border-end-0 ps-5 ps-lg-5 border-0 p-2 " placeholder="Search ??" style="border-radius: 5px 10px 10px 5px; outline: none ; background-color:rgba(241, 241, 241, 0.877); width: 100%;">
                            <i class="bi bi-x-lg fs-3 fw-bold cart opacity-50 pt-lg-0  " style=" position: absolute; " alt="" onclick="serchtogel();"></i>

                        </div>
                        <!-- <div class="col-2">
                            dddd
                        </div> -->

                    </div>



                </div>
                <div class="d-lg-block d-none col-lg-1 mt-4 mt-lg-0 pt-lg-4  mb-2 p-0  ">
                    <div class="row justify-content-center">
                        <?php
                        // session_start();


                        if (isset($_SESSION["u"])) {
                            $data = $_SESSION["u"];
                        ?>


                            <span class="text-lg-start signout  " onclick="userlogout();">sIgn Out
                                <i class="bi bi-box-arrow-right "></i>

                            <?php

                        } else {

                            ?>

                                <a href="signInpage.php" class="text-decoration-none signout2"> Register/Sign In
                                    <i class="bi bi-person-add"></i>
                                </a>


                            <?php
                        }

                            ?>


                            </span>
                    </div>

                </div>

            </div>


            <!-- model  -->

            <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
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
                                                <button type="button" class="btn btn-danger" onclick="signout();">Yes</button>

                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </header>
    </div>



    <script src="./script.js"></script>
    <script src="bootstrap.bundle.js"></script>
    <script>
        $(document).ready(function() {
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>

</body>

</html>
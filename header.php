<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="./bootstrap.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">


</head>

<body>


    <div class="col-12 ">
        <header>
            <div class="row  p-3 p-lg-0 header1 fixed-top " style="background-color: rgb(255, 255, 255);">

                <div class="col-12 col-lg-1 d-flex justify-content-center align-items-center">

                    <img src="./images/logo.jpeg" class="rounded-circle " style="width: 55px; border-style: solid; border-color:  rgb(107, 107, 107); border-width: 3px;">
                </div>
                <div class=" col-12 col-lg-3 align-self-start  mt-4 mb-3  text-center  text-lg-start">


                    <?php

                    session_start();

                    if (isset($_SESSION["u"])) {
                        $data = $_SESSION["u"];

                        // echo($data["fname"]);

                    ?>

                        <div class="col-12 d-none d-md-block">
                            <span class="text_lg_start mx-2 welcom vh-100 mb-3 "><b class="fs-5 ">Wellcom to Nevi's </b> &ndash;
                                <i class=" usericon "><?php echo ($data["fname"]); ?></i>

                            </span>
                        </div>

                    <?php

                    }




                    ?>


                </div>

                <!-- <hr class="d-lg-none"> -->
                <div class=" col-7 col-lg-5 ps-lg-3 p-0   ">

                    <!-- <div class="col-1 mx-3 text-center ">
<a href="#" class="text-decoration-none fw-bold a">HOME</a>
</div>

<div class="col-2 text-center">
<a href="#" class="text-decoration-none fw-bold a">All Products</a>
</div>

<div class="col-2 text-center">
<a href="#" class="text-decoration-none fw-bold a">Track My Oder</a>
</div>
<div class="col-3  text-center">
<a href="#" class="text-decoration-none fw-bold a">Purchase History</a>
</div>

<div class="col-2 text-center">
<a href="#" class="text-decoration-none fw-bold a">Coustomer Care</a>
</div>

<div class="col-2 text-center">
<a href="userProfile.php" class="text-decoration-none fw-bold a">My Profile</a>
</div> -->



                    <nav class="navbar navbar-expand-lg  pt-3 na">
                        <div class="container-fluid p-0">
                            <a class="navbar-brand text-decoration-none a  d-lg-none mt-1 ms-5" href="#">Menu</a>
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                                <img src="./images/icon/list.svg" style="width: 20px; background-size: cover;" class="me-3">
                            </button>
                            <div class="collapse navbar-collapse " id="navbarNavDropdown">
                                <ul class="navbar-nav">
                                    <li class="nav-item pt-1 pt-lg-3 pb-lg-3 pe-lg-3 ">
                                        <a class="text-decoration-none active a" aria-current="page" href="home.php">Home</a>
                                    </li>
                                    <li class="nav-item  pt-1 p-lg-3">
                                        <a class="text-decoration-none   a" href="index.php">All Product</a>
                                    </li>

                                    <li class="nav-item pt-1  p-lg-3 ">
                                        <a class="text-decoration-none active a" href="userProfile.php">My Profile</a>
                                    </li>

                                    <li class="nav-item pt-1  p-lg-3">
                                        <a class="text-decoration-none  a" href="#">Track My Oders</a>
                                    </li>

                                    <li class="nav-item dropdown pt-1  pt-lg-3 pb-lg-3 ps-lg-3">
                                        <a class="text-decoration-none activea ab dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            link
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#">Action</a></li>
                                            <li><a class="dropdown-item" href="#">Another action</a></li>
                                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </nav>

                </div>



                <div class="col-5 mt-lg-2 col-lg-2  d-flex justify-content-center align-items-center  ">
                    <img src="images/icon/search (3).png" alt="" class="cart">&nbsp;&nbsp;&nbsp;

                    <img src="./images/icon/CART2.svg" alt="" class="cart">&nbsp;&nbsp;&nbsp;
                    <img src="./images/icon/wichlist (2).png" alt="" class="cart">


                </div>


                <div class="col-12 col-lg-1  d-flex justify-content-center justify-content-lg-start align-items-center ">

                    <?php
                    // session_start();


                    if (isset($_SESSION["u"])) {
                        $data = $_SESSION["u"];
                    ?>


                        <span class="text-lg-start signout  " onclick="signout();">sIgn Out
                            <i class="bi bi-box-arrow-right "></i>

                        <?php

                    } else {

                        ?>

                            <a href="index.php" class="text-decoration-none signout2"> register/sign in
                                <i class="bi bi-person-add"></i>
                            </a>


                        <?php
                    }

                        ?>


                        </span>
                </div>

            </div>

        </header>

    </div>

    <!-- <hr> -->

    <!-- <script src="./bootstrap.js"></script> -->
    <script src="./script.js"></script>
    <!-- <script src="./bootstrap.bundle.js"></script> -->
</body>

</html>
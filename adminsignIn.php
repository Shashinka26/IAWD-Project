<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./bootstrap.css">
    <link rel="stylesheet" href="./style.css">
    <link rel="icon" href="./images/logo3.jpg">
</head>

<body>
    <?php
    session_start();
    if (isset($_SESSION["ad"])) {

        // $email = $_SESSION["u"]["email"];

        echo (" <div class='col-12 d-flex justify-content-center align-items-center mt-5'>
               <h3 class='sebutt'>  Your are sign In this Aplication !</h3> 
                </div> ");


    ?>

        <!-- <a href="index.php" class="text-decoration-none signout2"> register/sign in</a> -->
        <div class="col-12 d-flex justify-content-center align-items-center mt-5">
            <button class="btn btn-danger"> <a href="./adminPanle.php" class="text-decoration-none regbut">Go To Admin panel </a></button>
        </div>



        </div>

    <?php
    } else {
    ?>
        <div class="container-fluid">
            <div class="row ">

                <div class="col-12  admindiv  vh-100 p-3 " style="background-color: linear; overflow: hidden;">
                    <div class="row">
                        <div class="col-12  ">
                            <div class="row">
                                <div class="col-12 mt-5 d-none d-lg-block">
                                    <img src="./images/Untitled_design_1_-removebg-preview(1).png " style="width: 30rem; height: 10rem;" alt="">
                                </div>

                                <div class="col-12 mt-3  ">
                                    <div class="row">
                                        <div class="col-12  col-lg-6 d-flex justify-content-center justify-content-lg-end mt-5 mb-5">
                                            <span class=" text-white fw-bold" style="font-family:indie; font-size: 45px;">Admin Log In</span>

                                        </div>

                                        <div class="col-12  col-lg-6 d-flex justify-content-center  ">
                                            <div class="col-10 bg-white d-flex justify-content-center align-items-center p-4  border border-1 " style="border-radius:  10px; ">

                                                <div class="row">


                                                    <div class="col-12">
                                                        <p class="text-center title12 "> Wellcome to
                                                            <span class="text-center title2 ">Nevi's Fashion Admins..</span>
                                                        </p>
                                                    </div>

                                                    <hr>

                                                    <div class="col-12 d-flex justify-content-center mt-3">
                                                        <div class="col-12 col-lg-10 d-grid ">
                                                            <span class="fw-bold p-2">User Name :-</span>
                                                            <input type="text" class="fs-6 in ps-3  pt-3 fw-bold opacity-75" placeholder="Enter Email !!!" id="admin">
                                                        </div>
                                                    </div>

                                                    <!-- <div class="col-12 mt-3 d-flex justify-content-center">
                                                        <div class="col-lg-6 col-12 p-3 d-grid " id="adminemaildiv">
                                                            <button class="btn btn-secondary" onclick="adminvericationcode();">Send verification Code</button>
                                                        </div>
                                                    </div> -->

                                                    <div class="col-12  mt-2" id="adminveridiv">
                                                        <div class="row">

                                                            <div class="col-12 col-lg-10  d-grid ms-lg-5 ps-lg-4">
                                                                <span class="fw-bold p-2">Password</span>

                                                                <input type="password" class="fs-6 in ps-3  pt-3 fw-bold opacity-75" id="adminverifi">
                                                            </div>
                                                            <div class="col-12 mt-3 d-flex justify-content-end">
                                                                <div class="col-6 p-3 d-grid">
                                                                    <button class="btn btn-danger opacity-75" onclick="adminlogin();">Log In</button>
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

                    <!-- <div class="col-6">
                        <div class="col-12 d-flex justify-content-center align-content-center ">

                        <div class="col-11 bg-secondary mt-5 p-5">
                            jhfbs


                        </div>
                            
                        </div>
                    </div> -->
                </div>



            </div>


        </div>
        </div>
    <?php
    }
    ?>
    <script src="./bootstrap.bundle.js"></script>
    <script src="./script.js"></script>
    <script src="./bootstrap.js"> </script>
</body>

</html>
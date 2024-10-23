<?php
require "connection.php";

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./bootstrap.css">
    <link rel="stylesheet" href="./style.css">
    <link rel="icon" href="./images/logo3.jpg">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>

    <title>NEVI'S</title>
</head>

<body class="main_body">



    <?php
    require "spiner.php";

    // session_start();



    if (isset($_SESSION["u"])) {

        $email = $_SESSION["u"]["email"];

        echo (" <div class='col-12 d-flex justify-content-center align-items-center mt-5'>
                       <h3 class='sebutt'>  Your are sign In this Aplication !</h3> 
                        </div> ");


    ?>

        <!-- <a href="index.php" class="text-decoration-none signout2"> register/sign in</a> -->
        <div class="col-12 d-flex justify-content-center align-items-center mt-5">
            <button class="btn btn-danger"> <a href="./home.php" class="text-decoration-none regbut">Go To Home Page </a></button>
        </div>



        </div>

    <?php
    } else {
    ?>



        <div class="container-fluid vh-100 vw-100 d-flex p-0  justify-content-center">


            <!-- image silder  -->

            <div class="col-5 d-none d-lg-block overflow-hidden ">

                <div class="col-12 animation2">
                    <div class="col-12 animation3"></div>
                </div>

            </div>



            <div class=" col-12 col-lg-7 d-flex justify-content-center">

                <div class="col-12 maindiv21 d-flex-column h-100 ">

                    <!-- header -->
                    <div class="col-12 d-flex-column align-items-center p-3 header">
                        <!-- logo  -->
                        <div class="offset-4 col-3  logo ">
                            <!-- <img src="./images/Untitled_design_1_-removebg-preview(1).png " style="width: 40rem; height: 20rem;" alt=""> -->

                            <!-- <img src="./images/Untitled_design_1_-removebg-preview(1).png " style="width: 40rem; height: 20rem;" alt=""> -->

                        </div>
                        <!-- logo  -->
                        <div class=" col-11 d-flex  justify-content-center  logotext p-2">
                            <div class="col-12">

                                <p class="text-center title1">Design for your beauty</p>
                            </div>
                        </div>
                    </div>
                    <!-- header -->

                    <!-- content  -->

                    <div class="col-12  d-flex justify-content-center align-items-center" id="relodsignInpage">

                        <div class="col-10 d-flex-column div4 pb-4">

                            <div class="col-11 d-none d-lg-block d-md-block p-1">
                                <p class="text-center title12 "> Wellcome to
                                    <span class="text-center title2 ">Nevi's Fashion..</span>
                                </p>
                            </div>


                            <div class=" row col-12 d-lg-none d-md-none ">
                                <div class="col-12 col-lg-6 d-flex justify-content-center align-items-center"">
                            <span class=" text-center title12 fs-6">Wellcom to
                                </div>
                                <div class="col-12 col-lg-6   d-flex justify-content-center align-items-center">
                                    <span class="text-center title2 fs-2">Nevi's Fashion..</span>
                                </div>
                                </span>
                            </div>
                            <!-- brke  -->

                            <hr>
                            <!-- brke  -->

                            <!-- sign up process  -->

                            <div class=" row col-12 g-2  p-3 p-lg-4  p-md-4  d-none" id="signUpBox">



                                <div clo-12>
                                    <p class="title3">Create New Account</p>
                                    <label for="" class="text-danger h6 " id="wor6"></label>
                                </div>

                                <div class="col-12"> </div>

                                <div class="col-6 p-1">
                                    <label class="form-label">First Name</label> &nbsp;

                                    <input ypet="text" class="form-control" id="fn" />
                                    <label for="" class="text-danger h6 " id="wor1"></label>
                                </div>

                                <div class="col-6  p-1">
                                    <label class="form-label">Last Name</label>
                                    <input type="text" class="form-control" id="ln" />
                                    <label for="" class="text-danger h6" id="wor2"></label>
                                </div>


                                <div class="col-12 p-1 ">
                                    <label class="form-label">Email</label>
                                    <input type="email" class="form-control" id="em" />
                                    <label for="" class="text-danger h6" id="wor3"></label>
                                </div>

                                <div class="col-12 p-1 ">
                                    <label class="form-label">Password</label>
                                    <input type="password" class="form-control" id="pw" />
                                    <label for="" class="text-danger h6" id="wor4"></label>
                                </div>
                                <div class="col-6 p-1">
                                    <label class="form-label">Mobile</label>
                                    <input type="text" class="form-control" id="mobi" />
                                    <label for="" class=" text-danger h6" id="wor5"></label>
                                </div>
                                <div class="col-6 p-1">
                                    <label class="form-label">Gendre</label>
                                    <select class="form-select" id="gen">

                                        <?php

                                        $rs = Database::search("SELECT * FROM `gender`");
                                        $n = $rs->num_rows;

                                        for ($x = 0; $x < $n; $x++) {
                                            $d = $rs->fetch_assoc();


                                        ?>

                                            <option value="<?php echo ($d["id"]) ?>"><?php echo ($d["gender_name"]) ?></option>

                                        <?php
                                        }
                                        ?>

                                    </select>

                                </div>

                                <div class="col-12 pt-3">
                                    <div class="row">
                                        <div class="col-12 col-lg-6 d-grid mt-3">
                                            <button class="btn4" onclick="signUp();">Sign Up</button>
                                        </div>

                                        <div class="col-12 col-lg-6 d-grid pt-2 ">
                                            <button class="btn btn-secondary btn2 " onclick="changeViwe();">All redy Haw account?</button></button>

                                        </div>
                                    </div>
                                </div>



                                <div class="col-12"></div>
                                <div class="col-12"></div>
                            </div>

                            <!-- sign up process  -->



                            <!-- sign In process  -->


                            <div class=" row col-12 p-lg-4 p-3 g-2" id="signInBox">

                                <div class=" clo-12 p-2">
                                    <p class="title4">Sign In</p>
                                    <label for="" class="text-danger h6 " id="wor9"></label>
                                    <label for="" class="text-danger h6 " id="wor10"></label>

                                </div>

                                <!-- cookis  -->

                                <?php
                                $email = "";
                                $password = "";

                                if (isset($_COOKIE["email"])) {
                                    $email = $_COOKIE["email"];
                                }

                                if (isset($_COOKIE["password"])) {
                                    $password = $_COOKIE["password"];
                                }

                                ?>
                                <!-- cookis  -->


                                <div class="col-12 p-2">
                                    <label class="form-label">Email</label>
                                    <input type="email" class="form-control" id="em2" value="<?php echo ($email); ?>" />
                                    <label for="" class=" text-danger h6" id="wor7"></label>
                                </div>
                                <div class="col-12 p-2">
                                    <label class="form-label">Password</label>
                                    <input type="password" class="form-control" id="pw2" value="<?php echo ($password); ?>" />
                                    <label for="" class=" text-danger h6" id="wor8"></label>
                                </div>
                                <div class=" col-6 p-2 ">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="reme">
                                        <label class="form-check-label">Remember Me</label>
                                    </div>
                                </div>
                                <div class="col-6 text-end p-2">
                                    <!-- <a href="#" class="link-primary" onclick="forgotpassword();">Forgot Password?</a> -->
                                </div>

                                <div class="col-12 p-1"> </div>



                                <div class="col-12"></div>
                                <div class="col-12 p-2 col-lg-6 d-grid">
                                    <button class="btn4" onclick="signIn();">Sign In</button>
                                </div>
                                <div class="col-12 p-2 col-lg-6 d-grid ">
                                    <button class="btn btn-secondary btn2" onclick="changeViwe();">New user? Join Now</button>
                                </div>

                            </div>
                            <!-- sign In process  -->





                        </div>



                        <!-- content  -->



                        <!-- model  -->


                        <div class="modal" tabindex="-1" id="forgotpasswordModel">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Forgot Password</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- <p>Modal body text goes here.</p>
                             -->

                                        <div class="row g-3">
                                            <div class="col-6">

                                                <label for="" class="form-label">New Password</label>
                                                <div class="input-group mb-3">
                                                    <input type="password" class="form-control" id="npwinp">
                                                    <button class="btn btn-outline-secondary" onclick="newPasswordShow();" type="button"><i id="eye1" class="bi bi-eye-fill"></i></button>
                                                </div>
                                            </div>


                                            <div class="col-6">
                                                <label for="" class="form-label">Re-type Password</label>
                                                <div class="input-group mb-3" ;>
                                                    <input type="password" class="form-control" id="repwinp">
                                                    <button class="btn btn-outline-secondary" onclick="renamepasswordShow();" type="button"><i id="eye2" class="bi bi-eye-fill"></i></button>
                                                </div>

                                            </div>

                                            <div class="col-12">
                                                <label for="" class="form-label">Verification Code</label>
                                                <input type="text" class="form-control" id="vcode">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary" onclick="forgotpasswordProcess();">Save changes</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- model  -->


                        <!-- footer -->
                        <div class="offset-5 col-7 fixed-bottom d-none d-lg-block ">
                            <p class="text-center">&copy;2022 Nevi's || All Right Reserved</p>
                        </div>
                        <!-- footer -->



                    </div>


                </div>
            <?php
        }

            ?>

            <script src="./script.js"></script>
            <script src="./bootstrap.js"></script>
</body>


</html>
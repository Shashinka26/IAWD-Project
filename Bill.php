<?php
if (isset($_POST)) {
    if (isset($_POST["id"])) {
        $id = $_POST["id"];
        $size = $_POST["size"];
        $qty = $_POST["qty"];
    }
    if (isset($_POST["user"])) {
        $user = $_POST["user"];
        $subtotal_cart = $_POST["subtotal"];
        $items_cart = $_POST["items"];
        $delivery_cart = $_POST["delivery"];
        $total_cart = $_POST["total"];
        $city_name_cart = $_POST["cityname"];
        $post_code_cart = $_POST["post_code"];
    }


?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Nevis | BuyDress</title>
        <link rel="icon" href="./images/heder.icon.png">
        <link rel="stylesheet" href="./bootstrap.css">
        <link rel="stylesheet" href="./style.css">
        <link rel="stylesheet" href="./select3.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.min.js"></script>


    </head>

    <body>
        <?php

        include "header2.php";
        if (isset($_SESSION["u"]["email"])) {
            $email = $_SESSION["u"]["email"];
        }


        ?>

        <div class="col-12  d-lg-block" style="height: 5rem; background-color:rgb(255, 255, 255); ">
        </div>
        <div class="col-12 d-sm-block d-md-block d-lg-none" style="height: 3rem; background-color:rgb(255, 255, 255); ">
        </div>

        <div class="container-fluid">
            <div class="row">
                <div class="col-12 d-flex justify-content-center mt-3">
                    <label for="" class="fw-bold fs-3">CHECKOUT</label>
                </div>
                <div class="col-12" id="billdiv1">

                    <div class="row">



                        <div class="col-12 d-flex justify-content-center mt-5">
                            <div class="col-12 col-lg-6">
                                <div class="row">

                                    <div class="col-2 col-lg-1 d-flex justify-content-end p-0">

                                        <div class="input-container p-0" onclick="billdivtogel2()">
                                            <input id="walk" type="radio" name="size" checked>
                                            <div class="radio-tile p-1  border border-1 rounded-circle">
                                                <label for="walk" class="fw-bold opacity-50"></label>
                                            </div>
                                        </div>




                                    </div>

                                    <div class="col-8 col-lg-10 p-0">
                                        <hr>
                                    </div>

                                    <div class="col-2 col-lg-1 d-flex justify-content-start  p-0 ps-2">
                                        <div class="input-container p-0" onclick="billdivtogel();">
                                            <input id="walk" type="radio" name="size">
                                            <div class="radio-tile p-1  border border-1 rounded-circle">
                                                <label for="walk" class="fw-bold opacity-50"></label>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-6 col-lg-4 ps-1 d-flex justify-content-start p-0">

                                        <label for="">Cash On Delivery</label>

                                        <?php

                                        // echo ($id);
                                        // echo ($size);
                                        // echo ($qty);


                                        ?>


                                    </div>

                                    <div class="col-4 p-0 d-none d-lg-block">

                                    </div>

                                    <div class="col-6 col-lg-4 ps-1 d-flex justify-content-end  ">
                                        <label for="">Credit Card / Debit Card</label>


                                    </div>
                                </div>

                            </div>
                        </div>


                        <div class="col-12 ">
                            <div class="row">
                                <div class="col-12 mt-5 mt-lg-4">
                                    <div class="row">
                                        <div class="col-12">
                                            <label for="" class="fw-bold fs-4 ps-lg-3">Billing Details</label>
                                        </div>
                                    </div>
                                </div>


                                <?php
                                if (isset($_SESSION["u"])) {
                                    $email = $_SESSION["u"]["email"];
                                    $user = Database::search("SELECT * FROM `user` WHERE `email`='" . $email . "'");
                                    $user_data = $user->fetch_assoc();
                                    $user_adres = Database::search("SELECT * FROM `user_has_city` INNER JOIN `city` ON
                                        city.id=user_has_city.city_id INNER JOIN `district` ON
                                        district.id=city.district_id WHERE `user_email`='" . $email . "'");
                                    $user_adres_data = $user_adres->fetch_assoc();
                                ?>

                                    <input type="text" class="d-none" id="user_verify" value="<?= $email ?>">
                                    <!-- <input type="text" class="d-none" id="cart_verify" value="<?= $_POST["user"] ?>"> -->


                                    <div class="col-12 col-lg-7 ps-3 mb-5">


                                        <div class="12  mt-4">
                                            <div class="row">
                                                <div class="col-6">
                                                    <label for="" class="fs-6 p-2">First Name</label>
                                                    <input type="text" id="f_name" class="form-control fw-bold opacity-75" value="<?php echo ($user_data["fname"]) ?>">
                                                    <label for="" id="name_error_u" class="text-danger "></label>

                                                </div>
                                                <div class="col-6">
                                                    <label for="" class="fs-6 p-2">Last Name</label>
                                                    <input type="text" class="form-control fw-bold opacity-75" value="<?php echo ($user_data["lname"]) ?>">
                                                </div>
                                            </div>

                                        </div>
                                        <div class="12  mt-4">
                                            <div class="row">
                                                <div class="col-6">
                                                    <label for="" class="fs-6 p-2">Phone Number</label>
                                                    <input type="text" id="mobile_user" class="form-control fw-bold opacity-75" value="<?php echo ($user_data["mobile"]) ?>">
                                                    <label for="" id="mobile_error_u" class="text-danger "></label>

                                                </div>
                                                <div class="col-6">
                                                    <label for="" class="fs-6 p-2">Email</label>
                                                    <input type="text" class="form-control fw-bold opacity-75" value="<?php echo ($user_data["email"]) ?>">
                                                </div>
                                            </div>

                                        </div>
                                        <div class="12  mt-4">
                                            <div class="row">
                                                <div class="col-12">
                                                    <label for="" class="fs-6 p-2">Adress</label>
                                                    <?php
                                                    if (!empty($user_adres_data["line1"])) {
                                                    ?>
                                                        <input type="text" id="address_u" class="form-control fw-bold opacity-75" value="<?php echo ($user_adres_data["line1"]) ?> <?php echo ($user_adres_data["line2"]) ?>">
                                                        <label for="" id="Street_error_u" class="text-danger "></label>

                                                    <?php
                                                    } else {
                                                    ?>
                                                        <input type="text" id="address_u" class="form-control fw-bold opacity-75">
                                                        <label for="" id="Street_error_u" class="text-danger "></label>

                                                    <?php
                                                    }

                                                    ?>
                                                </div>

                                            </div>

                                        </div>
                                        <div class="12  mt-4">
                                            <div class="row">
                                                <div class="col-6">
                                                    <label for="" class="fs-6 p-2">City</label>
                                                    <?php

                                                    if (!empty($user_adres_data["city_name"])) {
                                                    ?>
                                                        <input type="text" id="city_u" class="form-control fw-bold opacity-75" value="<?php echo ($user_adres_data["city_name"]) ?>">

                                                    <?php
                                                    } else {
                                                    ?>
                                                        <input type="text" id="city_u" class="form-control fw-bold opacity-75">

                                                    <?php
                                                    }

                                                    ?>
                                                </div>
                                                <div class="col-6">
                                                    <label for="" class="fs-6 p-2">PostCode / Zip</label>
                                                    <?php

                                                    if (!empty($user_adres_data["post_code"])) {
                                                    ?>
                                                        <input type="text" id="post_u" class="form-control fw-bold opacity-75" value="<?php echo ($user_adres_data["post_code"]) ?>">
                                                        <label for="" id="post_error_u" class="text-danger "></label>


                                                    <?php
                                                    } else {
                                                    ?>
                                                        <input type="text" id="post_u" class="form-control fw-bold opacity-75">
                                                        <label for="" id="post_error_u" class="text-danger "></label>


                                                    <?php
                                                    }

                                                    ?>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="12  mt-4">
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <label for="" class="fs-6 p-2">Distric</label>
                                                        </div>
                                                        <div class="col-6 d-flex justify-content-end pt-2">
                                                            <i class="bi bi-chevron-left" id="districlodeicon" style="display: none; cursor: pointer;" onclick="distirclodedismis()"></i>

                                                        </div>

                                                        <div class="col-12">

                                                            <?php

                                                            if (!empty($user_adres_data["distric_name"])) {
                                                            ?>
                                                                <input type="text" class="form-control fw-bold opacity-75" value="<?php echo ($user_adres_data["distric_name"]) ?>" id="distric_u" onkeyup="selectdistricformbuy()">
                                                                <label for="" id="district_error_u" class="text-danger "></label>

                                                            <?php
                                                            } else {
                                                            ?>
                                                                <input type="text" class="form-control fw-bold opacity-75" id="distric_u" onkeyup="selectdistricformbuy()">
                                                                <label for="" id="district_error_u" class="text-danger "></label>

                                                            <?php
                                                            }

                                                            ?>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="col-6">
                                                    <div class="col-lg-12 col-12  border border-1 dsictriclodebuy p-1 ps-4" id="districlode" style="border-radius: 5px; display: none;">
                                                        <!-- <div class="col-12 p-1 " style="border-radius: 2px;">
                                                            <label for="" class="text-center ps-5">dddd</label>

                                                        </div> -->
                                                        <!-- <div class="col-12 p-1" style="border-radius: 2px;">
                                                            <label for="" class="text-center ps-5">dddd</label>

                                                        </div>
                                                        <div class="col-12 p-1" style="border-radius: 2px;">
                                                            <label for="" class="text-center ps-5">dddd</label>

                                                        </div>
                                                        <div class="col-12 p-1" style="border-radius: 2px;">
                                                            <label for="" class="text-center ps-5">dddd</label>

                                                        </div>
                                                        <div class="col-12  p-1" style="border-radius: 2px;">
                                                            <label for="" class="text-center ps-5">dddd</label>

                                                        </div> -->
                                                    </div>



                                                </div>
                                            </div>

                                        </div>


                                    </div>

                                    <div class="col-12 col-lg-5 ">
                                        <div class="row">
                                            <div class="col-12 ">
                                                <div class="row justify-content-center">
                                                    <div class="col-12 d-flex justify-content-center ">
                                                        <div class="col-8">

                                                            <div class="row justify-content-center">

                                                                
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="col-11 mt-3 pt-3 border " id="diferentadress" style="border-radius: 6px; background-color: #F0F0F0; display: none;">
                                                        <div class="row justify-content-center">
                                                            <div class="col-11">
                                                                <div class="row justify-content-center">

                                                                    <?php
                                                                    if (!(isset($_POST["user"]))) {

                                                                    ?>
                                                                        <div class="col-10">
                                                                            <label for="">District</label><span class="fs-3 mt-4 text-danger">*</span>
                                                                            <input type="text" class="form-control fw-bold opacity-75" id="distric2" onkeyup="shipngTodifrentAdresskey()">
                                                                            <label for="" id="district_error_d" class="text-danger "></label>

                                                                        </div>
                                                                        <div class="col-11 mt-3 mb-3">

                                                                            <div class="row justify-content-center">

                                                                                <div class="col-11">
                                                                                    <label for="">PostCode/Zip</label><span class="fs-3 mt-4 text-danger">*</span>

                                                                                    <input type="text" class="form-control fw-bold opacity-75" id="post_u_d">
                                                                                    <label for="" id="post_error_d" class="text-danger "></label>

                                                                                </div>


                                                                            </div>
                                                                        </div>
                                                                    <?php
                                                                    } else {
                                                                    ?>
                                                                        <div class="col-10">
                                                                            <label for="">City</label><span class="fs-3 mt-4 text-danger">*</span>
                                                                            <input type="text" class="form-control fw-bold opacity-75" id="city_cart" value="<?= $city_name_cart ?>">

                                                                        </div>

                                                                        <div class="col-11 mt-3 mb-3">

                                                                            <div class="row justify-content-center">

                                                                                <div class="col-11">
                                                                                    <label for="">PostCode/Zip</label><span class="fs-3 mt-4 text-danger">*</span>

                                                                                    <input type="text" class="form-control fw-bold opacity-75" id="post_cart" value="<?= $post_code_cart ?>">

                                                                                </div>


                                                                            </div>
                                                                        </div>
                                                                    <?php
                                                                    }
                                                                    ?>

                                                                    <?php
                                                                    if (!(isset($_POST["user"]))) {

                                                                    ?>
                                                                        <div class="col-10">
                                                                            <div class="col-12 mt-4 border border-1 p-2 dsictriclodebuy  " id="districlode2" style="border-radius: 3px;">

                                                                                <?php
                                                                                $distric = Database::search("SELECT * FROM `district` ");
                                                                                $distric_num = $distric->num_rows;

                                                                                for ($c = 0; $c <  $distric_num; $c++) {

                                                                                    $distric_data = $distric->fetch_assoc();
                                                                                ?>


                                                                                    <div class="col-11 p-1 d-flex justify-content-center disdivbuy" style="border-radius: 2px; cursor: pointer;" onclick="selectdistricbuy2('<?php echo ($distric_data['distric_name']) ?>');">
                                                                                        <label for="" class="text-center fw-bold opacity-75" style=" cursor: pointer;"><?php echo ($distric_data["distric_name"]) ?></label>

                                                                                    </div>

                                                                                <?php
                                                                                }



                                                                                ?>
                                                                            </div>
                                                                        </div>
                                                                    <?php
                                                                    }
                                                                    ?>
                                                                </div>


                                                            </div>



                                                            <div class="col-11 mt-4">

                                                                <div class="row justify-content-center">

                                                                    <div class="col-10">
                                                                        <label for="">Street address </label><span class="fs-3 mt-4 text-danger">*</span>

                                                                        <input type="text" class="form-control fw-bold opacity-75 mb-2" id="adress_d">
                                                                        <label for="" id="Street_error_d_c" class="text-danger "></label>

                                                                    </div>


                                                                </div>
                                                            </div>


                                                            <div class="col-12 col-lg-10 mt-5 mb-5  d-flex justify-content-end">
                                                                <input type="checkbox" id="conform_another_address" class="mt-lg-2">&nbsp;&nbsp;
                                                                <label for="" class="mt-4 mt-lg-0">Are you sure your order will be shipped to another address?</label>

                                                            </div>





                                                            <!-- <div class="col-4 col-lg-12 mb-3 d-flex justify-content-end mt-5 d-grid" id="crditeDiv">
                                                            <button class="btn btn-success">place Order</button>

                                                        </div> -->




                                                        </div>
                                                    </div>
                                                    <!-- <div class="col-12 mt-4 ">
                                                <div class="row justify-content-center">

                                                    <div class="col-10 d-grid">
                                                        <label for="" class="ps-2">Distric</label>

                                                        <input type="text " class="form-control">
                                                    </div>
                                                </div>
                                            </div> -->
                                                </div>
                                            </div>
                                            <div class="col-12 pt-5">
                                                <div class="row ">
                                                    <div class="col-12 ">
                                                        <div class="row">
                                                            <div class="col-2"></div>

                                                            <div class="col-6 ">

                                                            </div>
                                                            <div class="col-2">

                                                            </div>
                                                            <div class="col-2">
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                } else {
                                ?>



                                    <div class="col-12 col-lg-7 ">
                                        <div class="row">
                                            <div class="col-12 ">
                                                <div class="row justify-content-center">
                                                    <div class="col-12 d-flex justify-content-center ">


                                                    </div>
                                                    <div class="col-12 mt-3 pt-3  ">
                                                        <div class="row justify-content-center">
                                                            <div class="col-11">
                                                                <div class="row justify-content-center">



                                                                    <?php
                                                                    if (!(isset($_POST["user"]))) {

                                                                    ?>
                                                                        <div class="col-10">
                                                                            <label for="">District</label><span class="fs-3 mt-4 text-danger">*</span>
                                                                            <input type="text" class="form-control fw-bold opacity-75" id="distric2" onkeyup="shipngTodifrentAdresskey()">

                                                                        </div>
                                                                        <div class="col-11 mt-3 mb-3">

                                                                            <div class="row justify-content-center">

                                                                                <div class="col-11">
                                                                                    <label for="">PostCode/Zip</label><span class="fs-3 mt-4 text-danger">*</span>

                                                                                    <input type="text" class="form-control fw-bold opacity-75" id="PostCode">

                                                                                    <label for="" id="post_error" class="text-danger "></label>

                                                                                </div>




                                                                            </div>
                                                                        </div>
                                                                    <?php
                                                                    }
                                                                    ?>

                                                                    <?php
                                                                    if (!(isset($_POST["user"]))) {
                                                                    ?>
                                                                        <div class="col-10">
                                                                            <div class="col-12 mt-4 border border-1 p-2 dsictriclodebuy  " id="districlode2" style="border-radius: 3px;">

                                                                                <?php
                                                                                $distric = Database::search("SELECT * FROM `district` ");
                                                                                $distric_num = $distric->num_rows;

                                                                                for ($c = 0; $c <  $distric_num; $c++) {

                                                                                    $distric_data = $distric->fetch_assoc();
                                                                                ?>


                                                                                    <div class="col-11 p-1 d-flex justify-content-center disdivbuy" style="border-radius: 2px; cursor: pointer;" onclick="selectdistricbuy2('<?php echo ($distric_data['distric_name']) ?>');">
                                                                                        <label for="" class="text-center fw-bold opacity-75" style=" cursor: pointer;"><?php echo ($distric_data["distric_name"]) ?></label>

                                                                                    </div>

                                                                                <?php
                                                                                }



                                                                                ?>
                                                                            </div>
                                                                        </div>
                                                                    <?php
                                                                    }
                                                                    ?>

                                                                </div>


                                                            </div>


                                                            <div class="col-11 mt-4">

                                                                <div class="row justify-content-center">

                                                                    <div class="col-10">
                                                                        <label for="">Street address </label><span class="fs-3 mt-4 text-danger">*</span>

                                                                        <input type="text" class="form-control fw-bold opacity-75 mb-2" id="street_address">
                                                                        <label for="" id="Street_error" class="text-danger "></label>

                                                                    </div>


                                                                </div>
                                                            </div>


                                                            <div class="col-11 mt-2">

                                                                <div class="row justify-content-center">

                                                                    <div class="col-10">
                                                                        <label for="">Mobile Number </label><span class="fs-3 mt-4 text-danger">*</span>

                                                                        <input type="number" class="form-control fw-bold opacity-75 mb-2" id="mobile">
                                                                        <label for="" id="mobile_error" class="text-danger "></label>

                                                                    </div>


                                                                </div>
                                                            </div>

                                                            <div class="col-11 mt-2">

                                                                <div class="row justify-content-center">

                                                                    <div class="col-10">
                                                                        <label for="">Name </label><span class="fs-3 mt-4 text-danger">*</span>

                                                                        <input type="text" class="form-control fw-bold opacity-75 mb-2" id="name">
                                                                        <label for="" id="name_error" class="text-danger "></label>

                                                                    </div>


                                                                </div>
                                                            </div>







                                                        </div>
                                                    </div>
                                                    <!-- <div class="col-12 mt-4 ">
                                                <div class="row justify-content-center">

                                                    <div class="col-10 d-grid">
                                                        <label for="" class="ps-2">Distric</label>

                                                        <input type="text " class="form-control">
                                                    </div>
                                                </div>
                                            </div> -->
                                                </div>
                                            </div>
                                            <div class="col-12 pt-5">
                                                <div class="row ">
                                                    <div class="col-12 ">
                                                        <div class="row">
                                                            <div class="col-2"></div>

                                                            <div class="col-6 ">

                                                            </div>
                                                            <div class="col-2">

                                                            </div>
                                                            <div class="col-2">
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
                        <div class="col-12 mt-5 mb-5">
                            <div class="col-12 mt-3">
                                <div class="col-12 d-flex justify-content-center">
                                    <div class="row p-1 ps-2">
                                        <div class="col-12 mb-4">
                                            <label for="" class="fw-bold fs-4 ps-lg-3">Your Order</label>

                                        </div>
                                        <?php

                                        if (isset($_POST["id"])) {

                                        ?>
                                            <div class="col-12 border border-1 ">
                                                <div class="row">

                                                    <div class="col-lg-2 col-12 d-flex justify-content-center ">
                                                        <div class="mt-3 mb-3" style="height: 20rem; width: 24rem;">
                                                            <div class="row justify-content-center">
                                                                <?php

                                                                $dress = Database::search("SELECT * FROM `dress` WHERE `id`='" . $id . "'");
                                                                $dress_data = $dress->fetch_assoc();

                                                                $dresssize = Database::search("SELECT * FROM `dress_sizes` WHERE `id`='" . $size . "'");
                                                                $dresssize_data = $dresssize->fetch_assoc();

                                                                $DressImage_rs = Database::search("SELECT * FROM `drees_image` WHERE  `Dress_id`='" . $id . "'");
                                                                $DressImage_data = $DressImage_rs->fetch_assoc();
                                                                ?>



                                                                <img src="<?php echo ($DressImage_data["image_path"]) ?>" style="height: 20rem; width: 15rem" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-6 col-lg-5 d-flex justify-content-center border-end border-1">
                                                        <div class="col-12">
                                                            <div class="row">
                                                                <div class="col-12 d-flex  ">
                                                                    <label for="" class="fw-bold fs-6 pt-3 mb-3 text-center">&nbsp;<?php echo ($dress_data["Dress_code"]) ?> &nbsp;-&nbsp;&nbsp;&nbsp;<?php echo ($dresssize_data["sizes_name"]) ?><i class="bi bi-x"></i><?php echo ($qty) ?> </label>
                                                                    <input type="text" class="d-none" value="<?= $dress_data["id"] ?>" id="dress_id">
                                                                    <input type="text" class="d-none" value="<?= $qty ?>" id="qty">
                                                                    <input type="text" class="d-none" value="<?= $dresssize_data["id"] ?>" id="dress_size_id">


                                                                </div>
                                                                <div class="col-12 border-start border-bottom border-top border-end-0 border-1 pt-1 pb-1">
                                                                    <label for="" class=" fs-6 fw-bold pt-2 pb-2 opacity-75 ">Dress price </label>
                                                                </div>
                                                                <div class="col-12 border-start border-bottom  border-end-0 border-1 pt-1 pb-1">
                                                                    <div class="row">
                                                                        <div class="col-6 border-end border-1">
                                                                            <label for="" class=" fs-6 fw-bold pt-2 pb-2 opacity-75">Size</label>

                                                                        </div>
                                                                        <div class="col-6">
                                                                            <label for="" class=" fs-6 fw-bold pt-2 pb-2 opacity-75">qty</label>

                                                                        </div>

                                                                    </div>

                                                                </div>
                                                                <div class="col-12 border-start border-bottom  border-end-0 border-1 pt-1 pb-1">
                                                                    <label for="" class="fs-6 fw-bold pt-2 pb-2 opacity-75">Subtotal</label>

                                                                </div>
                                                                <div class="col-12 border-start border-bottom  border-end-0 border-1 pt-1  pb-1">
                                                                    <label for="" class=" fs-6 fw-bold pt-2 pb-2 pt-lg-2 pb-lg-2 opacity-75">Shipping</label>
                                                                </div>
                                                                <div class="col-12 border-start border-bottom  border-end-0 border-1 pt-1 pb-1">
                                                                    <label for="" class=" fs-6 fw-bold pt-2 pb-2 opacity-75">Total</label>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="col-6 col-lg-5 d-flex justify-content-center">
                                                        <div class="col-12">
                                                            <div class="row">
                                                                <div class="col-12 d-flex justify-content-center">
                                                                    <label for="" class="fw-bold fs-6 pt-3 mb-3 text-center">Total</label>
                                                                </div>
                                                                <div class="col-12 border-bottom border-top border-end-0 border-1 pt-1 pb-1">
                                                                    <label for="" class=" fs-6 fw-bold pt-2 pb-2 ">Rs.&nbsp;<?php echo (number_format($dress_data["price"])) ?>.00</label>
                                                                </div>
                                                                <div class="col-12  border-bottom  border-end-0 border-1 pt-1 pb-1">
                                                                    <div class="row">
                                                                        <div class="col-6 border-end border-1">
                                                                            <label for="" class=" fs-6 fw-bold pt-2 pb-2"> <?php echo ($dresssize_data["sizes_name"]) ?></label>

                                                                        </div>
                                                                        <div class="col-6">
                                                                            <label for="" class=" fs-6 fw-bold pt-2 pb-2"><?php echo ($qty) ?></label>

                                                                        </div>

                                                                    </div>

                                                                </div>
                                                                <div class="col-12  border-bottom  border-end-0 border-1 pt-1 pb-1">
                                                                    <?php

                                                                    $subtotal = $dress_data["price"] * $qty;
                                                                    ?>
                                                                    <label for="" class="fs-6 fw-bold pt-2 pb-2">Rs.<span id="dressPrice"><?php echo ($subtotal) ?></span>.00</label>
                                                                </div>
                                                                <div class="col-12 border-bottom  border-end-0 border-1 pt-1 pb-1">
                                                                    <?php
                                                                    if (isset($_SESSION["u"])) {

                                                                        $user_adress = Database::search("SELECT * FROM `buydress_has_city1` INNER JOIN `city` ON
                                                                        city.id=buydress_has_city1.city_id INNER JOIN `district` ON 
                                                                        district.id=city.district_id INNER JOIN `province` ON 
                                                                        province.id=district.province_id WHERE `user_email`='" . $user_data["email"] . "'");


                                                                        $user_adress_num = $user_adress->num_rows;
                                                                        $user_adress_data = $user_adress->fetch_assoc();
                                                                        // echo ($user_adress_num);
                                                                        if ($user_adress_num > 0) {



                                                                            if ($user_adress_data["id"] == 1) {
                                                                                $Dress_cost = Database::search("SELECT MAX(`Delevery_fee_Westen`) AS LargestPrice  FROM `dress`  ");
                                                                                $Dress_cost_data = $Dress_cost->fetch_assoc();
                                                                                $Dress_cost_num = $Dress_cost->num_rows;
                                                                    ?>
                                                                                <label for="" id="shipingfee" class=" fs-6 fw-bold pt-2 pb-2">RS. <span id="shipingprice"><?php echo (number_format($Dress_cost_data["LargestPrice"])) ?></span>.00</label>
                                                                                <input type="text" class="d-none" id="shipingprice_input" value="<?php echo (number_format($Dress_cost_data["LargestPrice"])) ?>">

                                                                            <?php
                                                                            } else {
                                                                                $Dress_cost2 = Database::search("SELECT MAX(`delivery_fee`) AS LargestPriceDely  FROM `dress` ");
                                                                                $Dress_cost_data2 = $Dress_cost2->fetch_assoc();
                                                                                $Dress_cost_num2 = $Dress_cost2->num_rows;
                                                                            ?>

                                                                                <label for="" id="shipingfee" class=" fs-6 fw-bold pt-2 pb-2">RS. <span id="shipingprice"><?php echo (number_format($Dress_cost_data2["LargestPriceDely"])) ?></span>.00</label>
                                                                                <input type="text" class="d-none" id="shipingprice_input" value="<?php echo (number_format($Dress_cost_data2["LargestPriceDely"])) ?>">

                                                                            <?php
                                                                            }
                                                                        } else {
                                                                            ?>
                                                                            <label for="" id="shipingfee" class="fs-6 fw-bold pt-2 pb-2"> <span id="shipingprice" onclick="window.location='userProfile.php'"> first Select Distric.</span></label>
                                                                            <input type="text" class="d-none" id="shipingprice_input">

                                                                        <?php
                                                                        }
                                                                    } else {
                                                                        ?>
                                                                        <label for="" id="shipingfee" class="fs-6 fw-bold pt-2 pb-2"> <span id="shipingprice"> first Select Distric. </span></label>
                                                                        <input type="text" class="d-none" id="shipingprice_input">

                                                                    <?php
                                                                    }
                                                                    ?>







                                                                </div>






                                                                <div class="col-12  border-bottom  border-end-0 border-1 pt-1 pb-1">


                                                                    <?php

                                                                    if (isset($_SESSION["u"])) {

                                                                        if ($user_adress_num > 0) {

                                                                            if ($user_adress_data["id"] == 1) {
                                                                                $totleall1 = $Dress_cost_data["LargestPrice"] + $subtotal;
                                                                    ?>
                                                                                <label for="" class="fs-6 fw-bold pt-2 pb-2">Rs. <span id="allPricedress"><?php echo ($totleall1) ?></span>.00</label>
                                                                                <input type="text" class="d-none" id="allPricedress_input" value="<?php echo ($totleall1) ?>">

                                                                            <?php


                                                                            } else {
                                                                                $totleall2 = $Dress_cost_data2["LargestPriceDely"] + $subtotal;
                                                                            ?>
                                                                                <label for="" class="fs-6 fw-bold pt-2 pb-2">Rs. <span id="allPricedress"><?php echo ($totleall2) ?></span>.00</label>
                                                                                <input type="text" class="d-none" id="allPricedress_input" value="<?php echo ($totleall2) ?>">

                                                                            <?php
                                                                            }



                                                                            ?>



                                                                        <?php
                                                                        } else {
                                                                        ?>
                                                                            <label for="" class="fs-6 fw-bold  pt-2 pb-2">Rs. <span id="allPricedress"><?php echo ($subtotal) ?></span>.00</label>
                                                                            <input type="text" class="d-none" id="allPricedress_input" value="<?php echo ($subtotal) ?>">

                                                                        <?php
                                                                        }
                                                                    } else {
                                                                        ?>

                                                                        <label for="" class=" fs-6 fw-bold pt-2 pb-2">Rs <span id="allPricedress"> <?php echo ($subtotal) ?></span> .00</label>
                                                                        <input type="text" class="d-none" id="allPricedress_input">

                                                                    <?php
                                                                    }
                                                                    ?>


                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>



                                                </div>
                                            </div>
                                        <?php

                                        } else if (isset($_POST["user"])) {
                                        ?>
                                            <input type="text" class="d-none" id="cart_user" value="<?php echo $_POST["user"]?>">
                                            <?php
                                            if (isset($_SESSION["u"])) {
                                                if ($_SESSION["u"]["email"] == $_POST["user"]) {


                                                    $email = $_SESSION["u"]["email"];
                                            ?>
                                                    <div class="col-12 border border-1 ">
                                                        <div class="row">
                                                            <?php
                                                            // echo ($_POST["user"]);

                                                            $cart_rs = Database::search("SELECT * FROM `cart` WHERE `user_email`='" . $_POST["user"] . "'");
                                                            $cart_num = $cart_rs->num_rows;



                                                            for ($z = 0; $z < $cart_num; $z++) {
                                                                # code...

                                                                $cart_data = $cart_rs->fetch_assoc();

                                                                $dress = Database::search("SELECT * FROM `dress`  WHERE `id`='" . $cart_data['Dress_id'] . "'");
                                                                $dress_data = $dress->fetch_assoc();


                                                                $dresssize = Database::search("SELECT * FROM `cart_has_dress_sizes` INNER JOIN `dress_sizes` ON
                                                        dress_sizes.id=cart_has_dress_sizes.dress_sizes_id WHERE `cart_cid`='" . $cart_data['cid'] . "'");
                                                                $dresssize_data = $dresssize->fetch_assoc();


                                                                $DressImage_rs = Database::search("SELECT * FROM `drees_image` WHERE  `Dress_id`='" . $cart_data['Dress_id'] . "'");
                                                                $DressImage_data = $DressImage_rs->fetch_assoc();

                                                            ?>
                                                                <div class="col-lg-2 col-12 d-flex justify-content-center ">
                                                                    <div class="mt-3 mb-3">
                                                                        <div class="row justify-content-center">



                                                                            <img src="<?php echo ($DressImage_data["image_path"]) ?>" style="height: 10rem; width: 8rem" alt="">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-6 col-lg-5 d-flex justify-content-center border-end border-1">
                                                                    <div class="col-12">
                                                                        <div class="row">
                                                                            <div class="col-12 d-flex  ">
                                                                                <label for="" class="fw-bold fs-6 pt-3 mb-3 text-center">&nbsp;<?php echo ($dress_data["Dress_code"]) ?> &nbsp;-&nbsp;&nbsp;&nbsp;<?php echo ($dresssize_data["sizes_name"]) ?><i class="bi bi-x"></i><?php echo ($dresssize_data["qty"]) ?> </label>
                                                                            </div>
                                                                            <div class="col-12 border-start border-bottom border-top border-end-0 border-1 pt-1 pb-1">
                                                                                <label for="" class=" fs-6 fw-bold pt-2 pb-2 opacity-75 ">Dress price </label>
                                                                            </div>
                                                                            <div class="col-12 border-start border-bottom  border-end-0 border-1 pt-1 pb-1">
                                                                                <div class="row">
                                                                                    <div class="col-6 border-end border-1">
                                                                                        <label for="" class=" fs-6 fw-bold pt-2 pb-2 opacity-75">Size</label>

                                                                                    </div>
                                                                                    <div class="col-6">
                                                                                        <label for="" class=" fs-6 fw-bold pt-2 pb-2 opacity-75">qty</label>

                                                                                    </div>

                                                                                </div>

                                                                            </div>

                                                                        </div>
                                                                    </div>

                                                                </div>
                                                                <div class="col-6 col-lg-5 d-flex justify-content-center">
                                                                    <div class="col-12">
                                                                        <div class="row">
                                                                            <div class="col-12 d-flex justify-content-center">
                                                                                <label for="" class="fw-bold fs-6 pt-3 mb-3 text-center">Total</label>
                                                                            </div>
                                                                            <div class="col-12 border-bottom border-top border-end-0 border-1 pt-1 pb-1">
                                                                                <label for="" class=" fs-6 fw-bold pt-2 pb-2 ">Rs.&nbsp;<?php echo (number_format($dress_data["price"])) ?>.00</label>
                                                                            </div>
                                                                            <div class="col-12  border-bottom  border-end-0 border-1 pt-1 pb-1">
                                                                                <div class="row">
                                                                                    <div class="col-6 border-end border-1">
                                                                                        <label for="" class=" fs-6 fw-bold pt-2 pb-2"> <?php echo ($dresssize_data["sizes_name"]) ?></label>

                                                                                    </div>
                                                                                    <div class="col-6">
                                                                                        <label for="" class=" fs-6 fw-bold pt-2 pb-2"><?php echo ($dresssize_data["qty"]) ?></label>

                                                                                    </div>

                                                                                </div>

                                                                            </div>







                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            <?php
                                                            }

                                                            ?>
                                                        </div>


                                                    </div>
                                                    <div class="col-12 d-flex flex-row border">
                                                        <div class="col-3 d-flex flex-column gap-2 mt-2">
                                                            <div class="text-center">
                                                                <span class="fw-bold">Items</span>
                                                            </div>
                                                            <div class="text-center">
                                                                <span class="">(<?= $items_cart ?>)</span>

                                                            </div>

                                                        </div>
                                                        <div class="col-3 d-flex flex-column gap-2 mt-2">
                                                            <div class="text-center">
                                                                <span class="fw-bold">Subtotal</span>
                                                            </div>
                                                            <div class="text-center">
                                                                <span class="">Rs.<?= $subtotal_cart  ?>.00</span>
                                                                <input type="text" class="d-none" id="subtotal_cart" value="<?= $subtotal_cart  ?>">

                                                            </div>
                                                        </div>


                                                        <div class="col-3 d-flex flex-column gap-2 mt-2">
                                                            <div class="text-center">
                                                                <span class="fw-bold">Delivery Cost</span>
                                                            </div>
                                                            <div class="text-center">
                                                                <span class="">Rs.<?= $delivery_cart  ?>.00</span>
                                                                <input type="text" class="d-none" id="delivery_cart" value="<?= $delivery_cart  ?>">

                                                            </div>
                                                        </div>
                                                        <div class="col-3 d-flex flex-column gap-2 mt-2">
                                                            <div class="text-center">
                                                                <span class="fw-bold">Total</span>
                                                            </div>
                                                            <div class="text-center">
                                                                <span class="">Rs.<?= $total_cart  ?>.00</span>
                                                                <input type="text" class="d-none" id="total_cart" value="<?= $total_cart  ?>">


                                                            </div>
                                                        </div>
                                                    </div>
                                        <?php
                                                }
                                            }
                                        }
                                        ?>









                                        <!-- <div class=" overflow-hidden" style="width: 25%; height: 60vh">
                                                <img src="./images/dress/NVS 912_2_63de2e4835fb0.jpeg" alt="" style="width: 100%; height: 100vh">
                                            </div> -->
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr>


                        <div class="col-12 mt-1 mb-4">
                            <div class="col-12">
                                <div class="row justify-content-end">

                                    <div class="col-12 mt-3 mb-4">

                                        <label for="">Your personal data will be used to process your order, support your experience throughout this website, and for other purposes described in our <a href="">privacy policy.</a> </label>

                                    </div>

                                    <!-- <div class="col-12 col-lg-10 mt-5  d-flex justify-content-end">
                                        <input type="checkbox" class="mt-lg-2">&nbsp;&nbsp;
                                        <label for="" class="mt-4 mt-lg-0"> I have read and agree to the website <a href="">terms and conditions <span class="fs-3 mt-4 text-danger">*</span></a></label>

                                    </div> -->
                                    <div id="crditeDiv" class="col-12 d-flex justify-content-end ">
                                        <div class="col-4 col-lg-2 mt-5 d-grid">
                                            <button class="btn btn-danger" onclick="place_order_cashOn_delivery()">place Order</button>

                                        </div>
                                    </div>




                                </div>
                            </div>
                        </div>



                        </div>
                    </div>

                </div>
            </div>
            <!-- <div class="col-12 d-none " id="billdiv2">

                <div class="row">


                    
                    <div class="col-12 d-flex justify-content-center mt-5">
                        <div class="col-6">
                            <div class="row">

                                <div class="col-1 d-flex justify-content-end p-0">

                                    <div class="input-container p-0" onclick="billdivtogel();">
                                        <input id="walk" type="radio" name="size " >
                                        <div class="radio-tile p-1  border border-1 rounded-circle">
                                            <label for="walk" class="fw-bold opacity-50"></label>
                                        </div>
                                    </div>




                                </div>

                                <div class="col-10 p-0">
                                    <hr>
                                </div>

                                <div class="col-1 d-flex justify-content-start  ">
                                    <div class="input-container ">
                                        <input id="walk" type="radio" name="size" checked>
                                        <div class="radio-tile p-1  border border-1 rounded-circle">
                                            <label for="walk" class="fw-bold opacity-50"></label>
                                        </div>
                                    </div>

                                </div>

                                <div class="col-4 d-flex justify-content-start p-0">

                                    <label for="">Cash On Delivery</label>




                                </div>

                                <div class="col-4 p-0">

                                </div>

                                <div class="col-4 d-flex justify-content-end  ">
                                    <label for="">Credit Card / Debit Card</label>


                                </div>
                            </div>

                        </div>
                    </div>


                    <div class="col-12">
                        <div class="row">
                            fffffffffffffff
                        </div>
                    </div>
                </div>

            </div> -->


            <div class="modal fade" id="invoice_model" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered ">
                    <div class="modal-content  " style="border-radius: 15px; width: 200%;">
                        <div class="col-12 ">
                            <div class="col-12 p-2 ">
                                <div class="row">
                                    <div class="col-10">
                                        <div class="col-3 d-grid">
                                            <button type="button" class="btn  download_but">
                                                <div class="col-12 d-flex flex-row gap-2">
                                                    <div class="">
                                                        Download
                                                    </div>
                                                    <div class="">
                                                        <i class="bi bi-filetype-pdf"></i>
                                                    </div>

                                                </div>

                                            </button>

                                        </div>
                                    </div>
                                    <div class="col-2 d-flex justify-content-center align-items-center">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="window.location='home.php'"></button>

                                    </div>

                                </div>
                            </div>
                            <div class="col-12 p-3 " id="download_div">



                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <!-- model 2 -->




            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    document.querySelector('.download_but').addEventListener('click', function() {
                        var element = document.getElementById('download_div');
                        html2pdf(element, {
                            margin: 0.5,
                            filename: 'invoice.pdf',
                            image: {
                                type: 'jpeg',
                                quality: 0.98
                            },
                            html2canvas: {
                                scale: 2
                            },
                            jsPDF: {
                                unit: 'in',
                                format: 'letter',
                                orientation: 'portrait'
                            }
                        });
                    });
                });
            </script>




            <script>
                const toastTrigger = document.getElementById('liveToastBtn')
                const toastLiveExample = document.getElementById('liveToast')

                if (toastTrigger) {
                    const toastBootstrap = bootstrap.Toast.getOrCreateInstance(toastLiveExample)
                    toastTrigger.addEventListener('click', () => {
                        toastBootstrap.show()
                    })
                }
            </script>
            <script src="./bootstrap.bundle.js"></script>
            <script src="./script.js"></script>
            <script src="./bootstrap.jss"> </script>
            <script type="text/javascript" src="https://www.payhere.lk/lib/payhere.js"></script>

    </body>

    </html>
<?php

}

?>
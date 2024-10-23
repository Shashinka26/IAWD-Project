<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product</title>
    <link rel="icon" href="./images/heder.icon.png">
    <link rel="stylesheet" href="./bootstrap.css">
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="./productzoom.css">

    <link rel="stylesheet" href="./select2.css">
    <!-- <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script> -->

</head>

<body>
    <?php

    $dressId = $_GET["id"];

    // echo ($dressId);



    ?>


    <div class="container-fluid p-0 overflow-hidden">
        <div class="row">
            <?php
            require "header2.php";
            require "spiner.php";






            ?>
            <div class="col-12  d-lg-block" style="height: 5rem; background-color:rgb(255, 255, 255); ">
            </div>
            <div class="col-12 d-sm-block d-md-block d-lg-none" style="height: 3rem; background-color:rgb(255, 255, 255); ">
            </div>

            <div class="col-12  ">
                <div class="col-12">
                    <div class="row">
                        <?php


                        $dressSizeqty = Database::search("SELECT * FROM `dress_has_dress_sizes` WHERE `Dress_id`='" . $dressId . "'");
                        $dressSizeqty_num = $dressSizeqty->num_rows;

                        if ($dressSizeqty_num > 0) {

                            if (isset($dressId)) {

                                $dress_rs = Database::search("SELECT dress.id,dress.price,dress.Dress_code,dress.qty,dress.materiale_id, dress.admin_email,dress.Delevery_fee_Westen,dress.delivery_fee,
                                dress.Stutus,materiale.material_name,model_size.Moid,model_size.Msize_name,dress_has_dress_sizes.Dress_id,dress_has_dress_sizes.dress_sizes_id,
                                dress_has_dress_sizes.Dressqty,dress_sizes.sizes_name,materiale.id AS mid ,dress_has_dress_sizes.id AS Dhid ,dress_sizes.id AS Dsid FROM `dress` INNER JOIN `materiale` ON 
                                 materiale.id=dress.materiale_id INNER JOIN `model_size` ON
                                 model_size.Moid=dress.Model_size_id INNER JOIN `dress_has_dress_sizes` ON
                                 dress_has_dress_sizes.Dress_id=dress.id INNER JOIN `dress_sizes` ON
                                 dress_sizes.id=dress_has_dress_sizes.dress_sizes_id WHERE dress.id='" . $dressId . "' ");

                                $dress_data = $dress_rs->fetch_assoc();
                                if ($dress_data["Stutus"] == 1) {


                        ?>



                                    <div class="col-12 col-lg-7">
                                        <div class="row ">
                                            <div class="col-lg-8 col-12  bigImg" style="transform: scale(0.85);">
                                                <div id="carouselExampleInterval" class="carousel slide bigImge" data-bs-ride="carousel">



                                                    <div class="carousel-inner">



                                                        ?
                                                        <?php

                                                        $arry = array();

                                                        $dress_img = Database::search("SELECT * FROM  `drees_image` 
                                             WHERE `Dress_id`='" . $dressId . "' ");

                                                        $dress_imgnum = $dress_img->num_rows;


                                                        for ($x = 0; $x < $dress_imgnum; $x++) {

                                                            $dress_imgdata = $dress_img->fetch_assoc();
                                                            $arry[$x] = $dress_imgdata["image_path"];
                                                        ?>

                                                        <?php
                                                        }


                                                        ?>
                                                        <div class="carousel-item active overflow-hidden" data-bs-interval="6000">
                                                            <i class="bi bi-arrows-fullscreen fs-2 fw-bold  mt-2 " style="position: absolute; cursor: pointer; z-index: 9999999; margin-left: 90%;" onclick="zoomDress1();"></i>

                                                            <img src="<?php echo ($arry[0]) ?>" class="d-block w-100 overflow-hidden " alt="...">
                                                        </div>

                                                        <div class="carousel-item" data-bs-interval="6000">
                                                            <i class="bi bi-arrows-fullscreen fs-2  mt-2 " style="position: absolute; z-index: 9999999; cursor: pointer; margin-left: 90%;" onclick="zoomDress1();"></i>

                                                            <img src="<?php echo ($arry[1]) ?>" class="d-block w-100" alt="...">
                                                        </div>
                                                        <?php
                                                        if (isset($arry[2])) {
                                                        ?>
                                                            <div class="carousel-item" data-bs-interval="6000">
                                                                <i class="bi bi-arrows-fullscreen fs-2  mt-2 " style="position: absolute; z-index: 9999999; cursor: pointer;margin-left: 90%;" onclick="zoomDress1();"></i>

                                                                <img src="<?php echo ($arry[2]) ?>" class="d-block w-100" alt="...">
                                                            </div>

                                                        <?php
                                                        }

                                                        ?>



                                                    </div>









                                                    <button class="carousel-control-prev bigImgeprevis" style=" position: absolute;" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
                                                        <span class="carousel-control-prev-icon bigImgenextlable1" aria-hidden="true"></span>
                                                        <span class="visually-hidden">Previous</span>
                                                    </button>
                                                    <button class="carousel-control-next bigImgenext" style="  position: absolute;" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
                                                        <span class="carousel-control-next-icon bigImgenextlable" aria-hidden="true"></span>
                                                        <span class="visually-hidden">Next</span>
                                                    </button>



                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-12 d-none d-lg-block" style="transform: scale(0.57); margin-left: -5rem; margin-top: -10rem;">

                                                <div class="col-12 ">
                                                    <div class="row align-items-lg-center " style="position: absolute;  ">
                                                        <div class="col-lg-12 col-4" style="transform: scale(0.9); overflow: hidden;">
                                                            <img src="<?php echo ($arry[0]) ?>" class="d-block w-100 productimgeview1" alt="..." style="transform: scale(0.9);" data-bs-target="#carouselExampleInterval" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"">

                                         </div>
                                                <div class=" col-lg-12 col-4" style=" transform: scale(0.9); overflow: hidden;">
                                                            <img src="<?php echo ($arry[1]) ?>" class="d-block w-100 productimgeview1" alt="..." style="transform: scale(0.9);" data-bs-target="#carouselExampleInterval" data-bs-slide-to="1" aria-label="Slide 2">

                                                        </div>
                                                        <?php

                                                        if (isset($arry[2])) {
                                                        ?>
                                                            <div class="col-lg-12 col-4" style="transform: scale(0.9); overflow: hidden;">
                                                                <img src="<?php echo ($arry[2]) ?>" class="d-block w-100 productimgeview1" alt="..." style="transform: scale(0.9);" data-bs-target="#carouselExampleInterval" data-bs-slide-to="2" aria-label="Slide 3">


                                                            </div>
                                                        <?php
                                                        }

                                                        ?>
                                                    </div>
                                                </div>


                                            </div>



                                            <div class="col-12 d-lg-none ps-2 pe-2">
                                                <div class="row justify-content-center">
                                                    <div class="col-4">
                                                        <img src="<?php echo ($arry[0]) ?>" class="d-block w-100 productimgeview1" alt="..." style="transform: scale(0.9);" data-bs-target="#carouselExampleInterval" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"">

                                        </div>
                                        <div class=" col-4">
                                                        <img src="<?php echo ($arry[1]) ?>" class="d-block w-100 productimgeview1" alt="..." style="transform: scale(0.9);" data-bs-target="#carouselExampleInterval" data-bs-slide-to="1" aria-label="Slide 2">

                                                    </div>
                                                    <?php

                                                    if (isset($arry[2])) {
                                                    ?>
                                                        <div class="col-4">

                                                            <img src="<?php echo ($arry[2]) ?>" class="d-block w-100 productimgeview1" alt="..." style="transform: scale(0.9);" data-bs-target="#carouselExampleInterval" data-bs-slide-to="2" aria-label="Slide 3">

                                                        </div>
                                                    <?php
                                                    }

                                                    ?>
                                                </div>
                                            </div>

                                        </div>




                                    </div>

                                    <hr class="d-lg-none mt-4">

                                    <div class="col-lg-5 col-12 mt-lg-5 mt-2">
                                        <div class="col-12 " id="sizediv2">
                                            <div class="row pt-lg-4">
                                                <div class="col-12 ">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <label for="" class="fs-2 fw-bold  ms-4"><?php echo ($dress_data["Dress_code"]) ?></label>

                                                        </div>
                                                        <div class="col-6 d-flex justify-content-end align-items-end">
                                                            <?php
                                                            if (isset($_SESSION["u"]["email"])) {
                                                                $Useremail = $_SESSION["u"]["email"];
                                                                $wichlist = Database::search("SELECT * FROM  `wichlist` WHERE `Dress_id`='" . $dressId . "'AND `user_email`='" . $Useremail . "'");
                                                                $wichlist_num = $wichlist->num_rows;
                                                                $wichlist_data = $wichlist->fetch_assoc();

                                                                if ($wichlist_num == 1) {
                                                            ?>

                                                                    <div class="col-2"> <i class="bi bi-heart fs-1 wich" style=" cursor: pointer; color: rgba(252, 105, 105, 0.774);" onclick="window.location='wichlist.php';"></i></div>


                                                                <?php
                                                                } else {
                                                                ?>
                                                                    <div class="col-2" id="wichlistaddDiv"> <i class="bi bi-heart fs-1 wich" style=" cursor: pointer;" onclick="addWichlist('<?php echo ($dressId) ?>_<?php echo ($Useremail) ?>_<?php echo ($dress_data['Dress_code']) ?>');"></i></div>
                                                                <?php
                                                                }
                                                            } else {
                                                                ?>
                                                                <div class="col-2"> <i class="bi bi-heart fs-1 wich" style=" cursor: pointer;" onclick="window.location='signInpage.php';"></i></div>
                                                            <?php
                                                            }
                                                            ?>
                                                        </div>
                                                    </div>
                                                </div>

                                                <hr class="mt-5 fw-bold text-black-50  d-none d-lg-block">
                                                <div class="col-12 mt-4  mt-lg-2 ms-4 ms-lg-0">
                                                    <div class="row">
                                                        <div class="col-6 mt-2">
                                                            <label for="" class="fs-3" style="color: #FA948D;">RS:&nbsp;<?php echo (number_format($dress_data["price"])) ?>.00</label>

                                                        </div>
                                                        <div class="col-5 col-lg-6 ms-4 ms-lg-0 ">
                                                            <div class="row justify-content-end pe-5 pe-md-2 pe-lg-4">
                                                                <div class="col-3 col-lg-2 col-md-2">
                                                                    <img src="https://img.icons8.com/color/48/null/facebook-new.png" style="transform: scale(0.7);" />

                                                                </div>
                                                                <div class="col-3 col-lg-2 col-md-2">
                                                                    <img src="https://img.icons8.com/color/48/null/tiktok--v1.png" style="transform: scale(0.7);" />

                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>

                                                </div>
                                                <div class="col-12 mt-4 ms-4 ms-lg-0">
                                                    <label for="" class="fs-6 fw-bold">Material</label> &nbsp;- <label for="" class="fs-6 fw-bold opacity-50"><?php echo ($dress_data["material_name"]) ?></label>


                                                </div>

                                                <div class="col-12 mt-4 ms-4 ms-lg-0">
                                                    <div class="row">

                                                        <div class="col-lg-4 col-6">
                                                            <label for="" class="fs-5 fw-bold">Model Size</label> &nbsp;- <label for="" class="fs-6 fw-bold"><?php echo ($dress_data["Msize_name"]) ?></label>

                                                        </div>
                                                        <div class="col-lg-8 col-6">
                                                            <label for="" class="fs-5 fw-bold">Size Chart</label>- <label for=""><img src="./images/icon/size chart.png" style="height: 4rem; position: absolute; margin-top: -2.2rem;" alt="" data-bs-toggle="modal" data-bs-target="#exampleModal"></label>

                                                        </div>
                                                    </div>



                                                </div>
                                                <div class="col-12 mt-5 pt-2 ms-4 ms-lg-0">
                                                    <div class="row">
                                                        <div class="col-12   mb-1 mb-lg-0">
                                                            <label for="" class="fs-5 fw-bold">Size</label>

                                                        </div>
                                                        <div class="col-12 pt-lg-3">
                                                            <div class="row">

                                                                <div class="col-11 col-lg-12  ">
                                                                    <div class="row ps-lg-5">

                                                                        <?php
                                                                        $ther_xl = Database::search("SELECT * FROM `dress_has_dress_sizes` WHERE `Dress_id`='" . $dressId . "' AND `dress_sizes_id`='1'");
                                                                        $ther_xl_num = $ther_xl->num_rows;
                                                                        $ther_xl_Data = $ther_xl->fetch_assoc();

                                                                        ?>


                                                                        <div class="col-lg-1 col-2  ms-lg-2 me-lg-2 mt-4 mt-lg-0">
                                                                            <?php
                                                                            if ($ther_xl_num == 0) {
                                                                            ?>
                                                                                <div class="radio-tile-group">


                                                                                    <div class="input-container ff">
                                                                                        <input id="walk" type="radio" name="size" disabled>
                                                                                        <div class="radio-tile p-3 ps-4 pe-4 border border-1">
                                                                                            <label for="walk" class="fw-bold opacity-50">3XL</label>
                                                                                        </div>
                                                                                    </div>




                                                                                </div>

                                                                            <?php
                                                                            } else {
                                                                            ?>
                                                                                <div class="radio-tile-group" onclick="silectsizesingleproduct('<?php echo ($ther_xl_Data['dress_sizes_id']) ?>')">


                                                                                    <div class="input-container ff" onclick="ThreeXlqty('<?php echo ($ther_xl_Data['Dressqty']) ?>');">
                                                                                        <input id="walk2" type="radio" name="size">
                                                                                        <div class="radio-tile p-3 ps-4 pe-4 border border-1">
                                                                                            <label for="walk" class="fw-bold">3XL</label>
                                                                                        </div>
                                                                                    </div>




                                                                                </div>

                                                                            <?php
                                                                            }
                                                                            ?>


                                                                        </div>

                                                                        <?php
                                                                        $two_xl = Database::search("SELECT * FROM `dress_has_dress_sizes` WHERE `Dress_id`='" . $dressId . "' AND `dress_sizes_id`='2'");
                                                                        $two_xl_num = $two_xl->num_rows;
                                                                        $two_xl_Data = $two_xl->fetch_assoc();

                                                                        ?>


                                                                        <div class="col-lg-1 col-2  ms-lg-2 me-lg-2  mt-4 mt-lg-0">
                                                                            <?php
                                                                            if ($two_xl_num == 0) {
                                                                            ?>
                                                                                <div class="radio-tile-group">


                                                                                    <div class="input-container ff">
                                                                                        <input id="walk" type="radio" name="size" disabled>
                                                                                        <div class="radio-tile p-3 ps-4 pe-4 border border-1">
                                                                                            <label for="walk" class="fw-bold opacity-50">2XL</label>
                                                                                        </div>
                                                                                    </div>




                                                                                </div>

                                                                            <?php
                                                                            } else {
                                                                            ?>
                                                                                <div class="radio-tile-group" onclick="silectsizesingleproduct('<?php echo ($two_xl_Data['dress_sizes_id']) ?>')">


                                                                                    <div class="input-container ff" onclick="TwoXlqty('<?php echo ($two_xl_Data['Dressqty']) ?>');">
                                                                                        <input id="walk2" type="radio" name="size">
                                                                                        <div class="radio-tile p-3 ps-4 pe-4 border border-1">
                                                                                            <label for="walk" class="fw-bold">2XL</label>
                                                                                        </div>
                                                                                    </div>




                                                                                </div>

                                                                            <?php
                                                                            }
                                                                            ?>


                                                                        </div>
                                                                        <?php
                                                                        $xl = Database::search("SELECT * FROM `dress_has_dress_sizes` WHERE `Dress_id`='" . $dressId . "' AND `dress_sizes_id`='3'");
                                                                        $xl_num = $xl->num_rows;
                                                                        $xl_Data = $xl->fetch_assoc();

                                                                        ?>


                                                                        <div class="col-lg-1 col-2  ms-lg-2 me-lg-2 mt-4 mt-lg-0">
                                                                            <?php
                                                                            if ($xl_num == 0) {
                                                                            ?>
                                                                                <div class="radio-tile-group">


                                                                                    <div class="input-container ff">
                                                                                        <input id="walk" type="radio" name="size" disabled>
                                                                                        <div class="radio-tile p-3 ps-4 pe-4 border border-1">
                                                                                            <label for="walk" class="fw-bold opacity-50">XL</label>
                                                                                        </div>
                                                                                    </div>




                                                                                </div>

                                                                            <?php
                                                                            } else {
                                                                            ?>
                                                                                <div class="radio-tile-group" onclick="silectsizesingleproduct('<?php echo ($xl_Data['dress_sizes_id']) ?>')">


                                                                                    <div class="input-container ff">
                                                                                        <input id="walk2" type="radio" name="size" onclick="Xlqty('<?php echo ($xl_Data['Dressqty']) ?>');">
                                                                                        <div class="radio-tile p-3 ps-4 pe-4 border border-1">
                                                                                            <label for="walk" class="fw-bold">XL</label>
                                                                                        </div>
                                                                                    </div>




                                                                                </div>

                                                                            <?php
                                                                            }
                                                                            ?>


                                                                        </div>
                                                                        <?php
                                                                        $l = Database::search("SELECT * FROM `dress_has_dress_sizes` WHERE `Dress_id`='" . $dressId . "' AND `dress_sizes_id`='4'");
                                                                        $l_num = $l->num_rows;
                                                                        $l_data = $l->fetch_assoc();


                                                                        ?>


                                                                        <div class="col-lg-1 col-2  ms-lg-2 me-lg-2 mt-4 mt-lg-0">
                                                                            <?php
                                                                            if ($l_num == 0) {
                                                                            ?>
                                                                                <div class="radio-tile-group">


                                                                                    <div class="input-container ff">
                                                                                        <input id="walk" type="radio" name="size" disabled>
                                                                                        <div class="radio-tile p-3 ps-4 pe-4 border border-1">
                                                                                            <label for="walk" class="fw-bold opacity-50">L</label>
                                                                                        </div>
                                                                                    </div>




                                                                                </div>

                                                                            <?php
                                                                            } else {
                                                                            ?>
                                                                                <div class="radio-tile-group" onclick="silectsizesingleproduct('<?php echo ($l_data['dress_sizes_id']) ?>')">


                                                                                    <div class="input-container ff" onclick="lqty('<?php echo ($l_data['Dressqty']) ?>');">
                                                                                        <input id="walk2" type="radio" name="size">
                                                                                        <div class="radio-tile p-3 ps-4 pe-4 border border-1">
                                                                                            <label for="walk" class="fw-bold">L</label>
                                                                                        </div>
                                                                                    </div>




                                                                                </div>

                                                                            <?php
                                                                            }
                                                                            ?>


                                                                        </div>
                                                                        <?php
                                                                        $M = Database::search("SELECT * FROM `dress_has_dress_sizes` WHERE `Dress_id`='" . $dressId . "' AND `dress_sizes_id`='5'");
                                                                        $M_num = $M->num_rows;
                                                                        $M_data = $M->fetch_assoc();

                                                                        ?>


                                                                        <div class="col-lg-1 col-2  ms-lg-2 me-lg-2 mt-4 mt-lg-0">
                                                                            <?php
                                                                            if ($M_num == 0) {
                                                                            ?>
                                                                                <div class="radio-tile-group">


                                                                                    <div class="input-container ff">
                                                                                        <input id="walk" type="radio" name="size" disabled>
                                                                                        <div class="radio-tile p-3 ps-4 pe-4 border border-1">
                                                                                            <label for="walk" class="fw-bold opacity-50">M</label>
                                                                                        </div>
                                                                                    </div>




                                                                                </div>

                                                                            <?php
                                                                            } else {
                                                                            ?>
                                                                                <div class="radio-tile-group" onclick="silectsizesingleproduct('<?php echo ($M_data['dress_sizes_id']) ?>')">


                                                                                    <div class="input-container ff" onclick="Mqty('<?php echo ($M_data['Dressqty']) ?>');">
                                                                                        <input id="walk2" type="radio" name="size">
                                                                                        <div class="radio-tile p-3 ps-4 pe-4 border border-1">
                                                                                            <label for="walk" class="fw-bold">M</label>
                                                                                        </div>
                                                                                    </div>




                                                                                </div>

                                                                            <?php
                                                                            }
                                                                            ?>


                                                                        </div>
                                                                        <?php
                                                                        $S = Database::search("SELECT * FROM `dress_has_dress_sizes` WHERE `Dress_id`='" . $dressId . "' AND `dress_sizes_id`='6'");
                                                                        $S_num = $S->num_rows;
                                                                        $S_data = $S->fetch_assoc();

                                                                        ?>


                                                                        <div class="col-lg-1 col-2  ms-lg-2 me-lg-2 mt-4 mt-lg-0">
                                                                            <?php
                                                                            if ($S_num == 0) {
                                                                            ?>
                                                                                <div class="radio-tile-group">


                                                                                    <div class="input-container ff">
                                                                                        <input id="walk" type="radio" name="size" disabled>
                                                                                        <div class="radio-tile p-3 ps-4 pe-4 border border-1">
                                                                                            <label for="walk" class="fw-bold opacity-50">S</label>
                                                                                        </div>
                                                                                    </div>




                                                                                </div>

                                                                            <?php
                                                                            } else {
                                                                            ?>
                                                                                <div class="radio-tile-group" onclick="silectsizesingleproduct('<?php echo ($S_data['dress_sizes_id']) ?>')">


                                                                                    <div class="input-container ff" onclick="Sqty('<?php echo ($S_data['Dressqty']) ?>');">
                                                                                        <input id="walk2" type="radio" name="size">
                                                                                        <div class="radio-tile p-3 ps-4 pe-4 border border-1">
                                                                                            <label for="walk" class="fw-bold">S</label>
                                                                                        </div>
                                                                                    </div>




                                                                                </div>

                                                                            <?php
                                                                            }
                                                                            ?>


                                                                        </div>
                                                                        <div class="col-12 ">
                                                                            <div class="row justify-content-end">
                                                                                <div class="col-3 ms-4 mt-4 mt-lg-0" id="claritem" style="opacity: 0;">
                                                                                    <div class="row" onclick="creardivitem()">
                                                                                        <a class="fs-6 " style=" cursor: pointer;"><i class="bi bi-arrow-clockwise fs-6"></i> Clear</a>
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

                                                <div class="col-12 mt-5 ms-4 ms-lg-0 ">
                                                    <div class="col-12 mt-lg-5 " style="opacity: 0;" id="item1">
                                                        <label for="" class=" fw-bold " id="Item"></label><label for="" class="fs-6 fw-bold">&nbsp; Items Avalbale</label>

                                                    </div>
                                                </div>

                                                <div class="col-12" id="qtydiv">

                                                    <div class="col-12 ms-5 ms-lg-0">
                                                        <div class="col-3 mt-2">
                                                            <div class="row">

                                                                <!-- <input type="number">  -->


                                                                <div class="col-4 d-flex justify-content-end align-items-center">
                                                                    <button class="p-2 pt-3 pb-3 h-50 d-flex justify-content-center align-items-center btn1" id="decrement" onclick='qty_inc2();' style="border-radius: 2px;">
                                                                        <i class="bi bi-plus fs-4"></i>

                                                                    </button>

                                                                </div>
                                                                <div class="col-4 p-0 d-flex justify-content-start align-items-center">
                                                                    <input type="text" class="border fs-5 fw-bold text-center w-100" style="outline: none;" pattern="[0-9]" value="1" id="qty_input" onkeyup='CheckValue2();' />

                                                                </div>
                                                                <div class="col-4 d-flex justify-content-start align-items-center">
                                                                    <button class="p-2 pt-3 pb-3 h-50 d-flex justify-content-center align-items-center btn1" id="increment" onclick="qty_dec2();" style="border-radius: 2px;">
                                                                        <i class="bi bi-dash fs-4"></i>

                                                                    </button>

                                                                </div>

                                                                <!-- <button class="" onclick="udsgyh()">sdaas</button> -->



                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="col-12 mt-lg-5 mb-4">

                                                    <div class="row mt-4 p-1 d-flex justify-content-md-center justify-content-lg-start">


                                                        <div class="col-lg-4 col-md-5 col-6">
                                                            <div class="col-12 d-grid  pt-4">

                                                                <?php

                                                                if (isset($_SESSION["u"])) {
                                                                    $email = $_SESSION["u"]["email"];
                                                                    // echo()
                                                                ?>
                                                                    <button class="btn1 bg-danger opacity-75   " onclick="AddCartfromsingalproduct('<?php echo ($dressId) ?>_<?php echo ($email) ?>_<?php echo ($dress_data['Dress_code']) ?>');">Add <i class="bi bi-handbag-fill fs-5"></i></button>
                                                                <?php
                                                                } else {
                                                                ?>
                                                                    <button class="btn1 bg-danger opacity-75   " onclick="window.location='signInpage.php'">Add <i class="bi bi-handbag-fill fs-5"></i></button>

                                                                <?php


                                                                }

                                                                ?>




                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-md-5 col-6">
                                                            <div class="col-12 d-grid  pt-4">

                                                                <form action="Bill.php" method="post" class="d-none">
                                                                    <input type="text " name="id" value="<?php echo ($dress_data['id']) ?>">
                                                                    <input type="text " name="qty" id="buyqty">
                                                                    <input type="text " name="size" id="size">


                                                                    <!-- <input type="text " name="cod" value="qty_input.value"> -->

                                                                    <button type="submit" id='formsubmit'></button>
                                                                </form>

                                                                <?php

                                                                // if(walk2.)

                                                                ?>

                                                                <label class="btn1  text-center p-2" id="binsingl1" onclick="buyproductNotqty();">Buy Now</label>


                                                                <label for="formsubmit" class="btn1 singlbuthide  text-center p-2" id="binsingl2">Buy Now</label>





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


            <div class="modal fade" id="exampleModal" style="background-color:  rgba(0, 0, 0, 0.356);;"  data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">

                <div class="row">
                    <div class="col-1">

                    </div>


                    <div class="col-12 col-lg-10">


                        <div class="modal-dialog  ">
                            <div class="modal-content   border-0" style="background-color: transparent;">

                                <div class=" col-12 d-flex justify-content-center p-0">
                                    <div class="col-12">



                                        <div class="col-12 mt-3   " id="addDressShowId">
                                            <div class="row ">



                                               <img src="./images/homepageImg/nevis size chart.jpg" alt="">






                                            </div>


                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-1 d-flex justify-content-end pe-lg-5 pt-3" style=" cursor: pointer; ">
                        <i class="bi bi-x-lg fs-2 text-white" data-bs-dismiss="modal"></i>

                    </div>
                </div>



            </div>



            <!-- zoom 1 -->


            <div class="modal" style="background-color:  rgba(0, 0, 0, 0.356);;" id="zoomDress" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">

                <div class="row">
                    <div class="col-1">

                    </div>


                    <div class="col-12 col-lg-10">


                        <div class="modal-dialog  ">
                            <div class="modal-content   border-0" style="background-color: transparent;">

                                <div class=" col-12 d-flex justify-content-center p-0">
                                    <div class="col-12">



                                        <div class="col-12 mt-3   " id="addDressShowId">
                                            <div class="row ">



                                                <div class="col-12">

                                                    <div id="carouselExample" class="carousel slide">
                                                        <div class="carousel-inner">
                                                            <div class="carousel-item active ">

                                                                <img src="<?php echo ($arry[0]) ?>" style="transform: scalex(1.05);" class="d-block w-100 overflow-hidden big_img" alt="...">

                                                            </div>

                                                            <div class="carousel-item">

                                                                <img src="<?php echo ($arry[1]) ?>" style="transform: scalex(1.05);" class="d-block w-100 overflow-hidden big_img" alt="...">

                                                            </div>
                                                            <?php
                                                            if (isset($arry[2])) {
                                                            ?>
                                                                <div class="carousel-item">

                                                                    <img src="<?php echo ($arry[2]) ?>" style="transform: scalex(1.05);" class="d-block w-100 overflow-hidden big_img" alt="...">

                                                                </div>

                                                            <?php
                                                            }

                                                            ?>
                                                        </div>


                                                        <button class="carousel-control-prev " style="margin-left: -20rem; position: absolute;" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                                                            <span class="carousel-control-prev-icon text-white" aria-hidden="true"></span>
                                                            <span class="visually-hidden">Previous</span>
                                                        </button>
                                                        <button class="carousel-control-next " style="margin-right: -20rem; position: absolute;" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                            <span class="visually-hidden">Next</span>
                                                        </button>

                                                        <div class="col-12 d-lg-none">
                                                            <button class="carousel-control-prev " style="margin-top: 50rem; position: absolute;" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                                                                <span class="carousel-control-prev-icon text-white" aria-hidden="true"></span>
                                                                <span class="visually-hidden">Previous</span>
                                                            </button>
                                                            <button class="carousel-control-next " style="margin-top: 50rem; position: absolute;" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                                <span class="visually-hidden">Next</span>
                                                            </button>
                                                        </div>





                                                    </div>


                                                    <!-- <img src="<?php echo ($arry[0]) ?>" style="transform: scale(1.1);" class="d-block w-100 overflow-hidden big_img" alt="..."> -->

                                                </div>













                                            </div>


                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-1 d-flex justify-content-end pe-lg-5 pt-3" style=" cursor: pointer; ">
                        <i class="bi bi-x-lg fs-2 text-white" data-bs-dismiss="modal"></i>

                    </div>
                </div>



            </div>

            <!-- zoom 1 -->

            <?php


                                    include "footer.php";

            ?>
        </div>
        <div class="col-1 col-lg-1 d-flex justify-content-end fixed-bottom pe-4 pb-3 " style="margin-left: 93%;">
            <div class="">
                <div class="col-12  p-1   text-center wthasappmaindiv">
                    <div class="row">

                        <div class="col-12 whatsappConatct">
                            <label for=" p-0" class="fw-bold" style="color:#075e54;">Contact Us</label>

                        </div>
                        <div class="col-12 d-flex justify-content-center whatappaIcon">
                            <a class="" href="https://wa.me/+94785458659"><i class="bi bi-whatsapp fs-1  ms-1 me-1" style="color: #25d366;"></i></i></a>


                        </div>
                    </div>






                </div>
            </div>
        </div>

<?php

                                } else {
                                    echo ("Something went wrong");
                                }
                            } else {
                                echo ("Something went wrong");
                            }
                        } else {
                            echo ("Something went wrong");
                        }
?>



<script src="zoomsl.js" type="text/javascript"></script>
<script src="./bootstrap.bundle.js"></script>
<script src="./script.js"></script>
<script src="./bootstrap.jss"> </script>
<script type="text/javascript">
    $(document).ready(function() {
        $(".big_img").imagezoomsl({
            zoomrange: [2, 2]
        });
    });
</script>
<!-- <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js"></script> -->
<!-- <script type="text/javascript" src="zoom.js"></script>
    <script type="text/javascript">
        var l = $('#target').zoom(2);

        $('input[type="range"]').on('change', function() {

            l.setZoom(this.value);

        });
    </script>
    <script type="text/javascript">
        var _gaq = _gaq || [];
        _gaq.push(['_setAccount', 'UA-36251023-1']);
        _gaq.push(['_setDomainName', 'jqueryscript.net']);
        _gaq.push(['_trackPageview']);

        (function() {
            var ga = document.createElement('script');
            ga.type = 'text/javascript';
            ga.async = true;
            ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
            var s = document.getElementsByTagName('script')[0];
            s.parentNode.insertBefore(ga, s);
        })();
    </script> -->

</body>

</html>
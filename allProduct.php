<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nevis | AllProduct</title>
    <link rel="icon" href="./images/heder.icon.png">
    <link rel="stylesheet" href="./bootstrap.css">
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="./select2.css">
    <link rel="stylesheet" href="./css/priceRange.css">
    <!-- <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script> -->






</head>

<body>


    <div class="container-fluid overflow-hidden p-0">
        <div class="row ">

            <?php

            include "header2.php";
            require "spiner.php";


            ?>
            <div class="col-12  d-lg-block" style="height: 5rem; background-color:rgb(255, 255, 255); ">
            </div>
            <div class="col-12 d-sm-block d-md-block d-lg-none" style="height: 3rem; background-color:rgb(255, 255, 255); ">
            </div>


            <div class="col-12">
                <div class="row" id="productpage">

                    <!-- <div class="col-1">
                        <div class="col-12 d-flex justify-content-center mt-2">
                            <i class="bi bi-chevron-double-left fs-3"></i>
                        </div>
                    </div> -->

                    <div class="col-12 mb-4 " style="position: relative;">
                        <div class="row">
                            <div class="col-12  p-2 pt-2 pt-lg-4 " id="allproductdiv1">

                                <div class="row">

                                    <div class="col-12 col-lg-5 d-flex justify-content-center align-content-center pb-3 pb-lg-0">
                                        <div class="col-6 d-flex justify-content-center">
                                            <label for="" class="fw-bold  fs-4">Shop By</label>
                                        </div>
                                    </div>
                                    <div class="col-8 col-lg-5">
                                        <div class="col-12 col-lg-12  ps-2 ps-lg-0">
                                            <button style="position: absolute; background-color: transparent;" class="border-0 mt-1">
                                                <img src="./images/icon/search (3).png" style="width: 2rem; height: 2rem;" class="opacity-50" alt="" onclick="searchDressFormAllPeoduct();"></button>
                                            <input type="text" class="form-control ps-5 border-1 fw-bold text-black-50" style="border-radius: 5px;" placeholder="Search Item ?" value="NVS " id="allProductSearchInput">
                                        </div>

                                    </div>
                                    <div class="col-4 col-lg-2 d-flex justify-content-center align-items-center ">
                                        <i class="bi bi-chevron-down fs-3" style=" cursor: pointer;" onclick="allProductTogel();"></i>
                                    </div>

                                </div>

                            </div>

                            <div class="col-12  p-2 pt-2 pt-lg-4 d-none" id="allproductdiv2">

                                <div class="row">

                                    <div class="col-12 col-lg-5 d-flex justify-content-center align-content-center pb-3 pb-lg-0">
                                        <div class="col-6 d-flex justify-content-center">
                                            <label for="" class="fw-bold  fs-4">Shop By</label>
                                        </div>
                                    </div>
                                    <div class="col-8 col-lg-5">
                                        <div class="col-12 col-lg-12  ps-2 ps-lg-0">
                                            <button style="position: absolute; background-color: transparent;" class="border-0 mt-1">
                                                <img src="./images/icon/search (3).png" style="width: 2rem; height: 2rem;" class="opacity-50" alt="" onclick="searchDressFormAllPeoduct2();"></button>
                                            <input type="text" class="form-control ps-5 border-1 fw-bold text-black-50" style="border-radius: 5px;" placeholder="Search Item ?" value="NVS " id="allProductSearchInput2">
                                        </div>

                                    </div>
                                    <div class="col-4 col-lg-2 d-flex justify-content-center align-items-center ">
                                        <div class="col-11">
                                            <select name="" id="dressShort" class="form-select" onchange="DressShort();">
                                                <option value="s0">Short </option>
                                                <option value="s1">Short By popularity</option>
                                                <option value="s2">Short By latest</option>
                                                <option value="s3">Short By Price Low To height</option>
                                                <option value="s4">Short By Price height To Low</option>

                                            </select>
                                        </div>

                                    </div>


                                    <div class="col-12 col-lg-6  pt-3 d-flex justify-content-center align-items-center  ">
                                        <div class="col-12" id="alldree">
                                            <div class="row">
                                                <div class="col-12 ">
                                                    <div class="row ps-lg-4">

                                                        <div class="col-12 col-lg-1 ms-2 me-2 mb-2 mb-lg-0">
                                                            <label for="" class="fs-5 fw-bold opacity-75">Size</label>

                                                        </div>
                                                        <div class="col-12 col-lg-10 ms-4 ms-lg-0">
                                                            <div class="row ">
                                                                <?php

                                                                // $arry=array();

                                                                $dressSize = Database::search("SELECT * FROM `dress_sizes`");
                                                                $dressSize_num = $dressSize->num_rows;

                                                                for ($y = 0; $y < $dressSize_num; $y++) {
                                                                    # code...
                                                                    $dressSize_data = $dressSize->fetch_assoc();
                                                                    // $arry[$y]=$dressSize_data["id"];

                                                                    // echo($dressSize_data["id"]);


                                                                ?>

                                                                    <div class="col-lg-1 col-1 mt-3 mt-lg-0 ms-2 me-2" onclick="Sizeqtyallproduct('<?php echo ($dressSize_data['id']) ?>')">
                                                                        <div class="radio-tile-group">

                                                                            <div class="input-container ">
                                                                                <input type="radio" name="ff" id="sizeId">
                                                                                <div class="radio-tile p-3 ps-4 pe-4 border border-2">
                                                                                    <label for="walk" class="fw-bold"><?php echo ($dressSize_data["sizes_name"]) ?></label>
                                                                                </div>
                                                                            </div>




                                                                        </div>

                                                                    </div>


                                                                <?php

                                                                }


                                                                ?>





                                                                <div class="col-lg-3 col-3 mt-3 mt-lg-0 ms-2 ms-lg-5  me-2 " id="claritem2" style="opacity: 0;">
                                                                    <div class="row " onclick="creardivitemallProduct()">
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

                                    <div class="col-9 col-lg-5 pt-4 ps-3">
                                        <div class="col-12" id="pricerangediv">
                                            <div class="row">
                                                <div class="col-lg-2 col-12 col-12 pt-2 ps-3">
                                                    <label for="" class="fs-5 fw-bold opacity-75">Price</label>
                                                </div>

                                                <div class="col-10 col-md-9 col-lg-8">
                                                    <div class="row ps-5 pe-5">

                                                        <div class="col-12 pb-2">
                                                            <div class="row p-0">
                                                                <div class="price-input p-0 col-12 ">
                                                                    <div class="row">
                                                                        <div class="col-6 col-lg-4  col-md-4">
                                                                            <div class="field col-6">
                                                                                <span class="p-0">Rs.</span>
                                                                                <input type="number " class="input-min form-control fs-6 text-start border-0 bg-white p-0" id="minprice" value="2000" disabled>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-4 d-lg-block  d-md-block d-none d-flex justify-content-center ps-4">
                                                                            <label for="" class="fw-bold fs-6 ms-4">Range</label>
                                                                        </div>

                                                                        <!-- <div class="separator">-</div> -->
                                                                        <div class="col-6 col-lg-4 col-md-4">
                                                                            <div class="field p-0 d-flex justify-content-end">
                                                                                <span>Rs.</span>
                                                                                <input type="number" class="input-max fs-6 text-start  border-0 bg-white p-0" id="maxprice" value="3000" disabled>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>


                                                        </div>

                                                        <div class="slider">
                                                            <div class="progress"></div>
                                                        </div>
                                                        <div class="range-input">
                                                            <input type="range" class="range-min" min="0" max="5000" value="2000" step="50">
                                                            <input type="range" class="range-max" min="0" max="5000" value="3000" step="50">
                                                        </div>
                                                    </div>

                                                </div>



                                                <div class="col-lg-1 col-2 d-flex justify-content-center p-0">
                                                    <div class="col-12 d-grid pt-2 pt-lg-0">
                                                        <button class="btn1" onclick="filterPrice();">Filter</button>

                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                    <div class="col-3 col-lg-1 pt-5 d-flex justify-content-center align-items-end ">
                                        <i class="bi bi-chevron-up fs-3" style=" cursor: pointer;" onclick="allProductTogel();"></i>
                                    </div>

                                </div>

                            </div>


                        </div>
                    </div>

                    <div class="col-12 " id="alldreddupdateDiv2">
                        <div class="col-12" id="alldreddupdateDiv">
                            <div class="col-12 p-2 ">
                                <div class="col-12 d-flex justify-content-center align-items-center mt-2">

                                    <div class="col-lg-11 col-md-12 col-12  ">


                                        <div class="row justify-content-center">

                                            <?php

                                            if (isset($_GET["page"])) {
                                                $pageno = $_GET["page"];
                                            } else {
                                                $pageno = 1;
                                            }

                                            $selected_rs = Database::search("SELECT * FROM `dress` ");
                                            $selected_num = $selected_rs->num_rows;

                                            $results_per_page = 20;
                                            $number_of_pages = ceil($selected_num / $results_per_page);

                                            $page_result = ($pageno - 1) * $results_per_page;

                                            $product_rs = Database::search("SELECT * FROM `dress`  WHERE `Stutus`='1' ORDER BY `add_date_time` DESC LIMIT " . $results_per_page . " OFFSET " . $page_result . " ");
                                            $product_num = $product_rs->num_rows;


                                            ?>


                                            <?php

                                            for ($i = 0; $i < $product_num; $i++) {

                                                $product_data = $product_rs->fetch_assoc();

                                                $dresize_rs = Database::search("SELECT * FROM `dress_has_dress_sizes` INNER JOIN `dress_sizes` ON
                                    dress_sizes.id=dress_has_dress_sizes.dress_sizes_id WHERE `Dress_id`='" . $product_data["id"] . "'");


                                                $dresize_num = $dresize_rs->num_rows;

                                                //    echo();
                                                $arry2 = array();

                                                $arry = array();


                                                if ($dresize_num > 0) {
                                            ?>
                                                    <div class="col-6  col-lg-3 mb-4  d-flex justify-content-center p-0">
                                                        <div class=" ms-md-3 me-md-3  mt-5    overflow-hidden  p-0 product d-none d-md-block d-lg-block" style="transform: scale(0.95);" onmouseenter="Chngecartimge();">

                                                            <?php




                                                            $DressImage_rs = Database::search("SELECT * FROM `drees_image` WHERE  `Dress_id`='" . $product_data["id"] . "'");

                                                            for ($t = 0; $t < $DressImage_rs->num_rows; $t++) {
                                                                $DressImage_data = $DressImage_rs->fetch_assoc();
                                                                $arry2[$t] =  $DressImage_data["image_path"];
                                                            }
                                                            // echo($arry2[1]);





                                                            $material_rs = Database::search("SELECT * FROM `materiale` WHERE `id`='" . $product_data["materiale_id"] . "' ");
                                                            $material_data = $material_rs->fetch_assoc();


                                                            ?>
                                                            <div class=" col-12    p-1 pe1" style="position: absolute; margin-top: 28rem; z-index: 99999; transform: scale(1);">
                                                                <div class="row ps-2 pe-2 justify-content-center ">
                                                                    <?php

                                                                    for ($o = 0; $o < $dresize_num; $o++) {
                                                                        $dresize_data = $dresize_rs->fetch_assoc();
                                                                        $arry[$o] =  $dresize_data["id"];
                                                                        // echo($arry[$o]);

                                                                    }
                                                                    // echo($arry[3]);

                                                                    $derss_size = Database::search("SELECT * FROM `dress_sizes` ");
                                                                    $derss_size_num = $derss_size->num_rows;

                                                                    for ($c = 0; $c < $derss_size_num; $c++) {
                                                                        $derss_size_data = $derss_size->fetch_assoc();
                                                                        $leth = count($arry);

                                                                        // echo($leth);
                                                                        for ($u = 0; $u < $leth; $u++) {
                                                                            if ($derss_size_data["id"] == $arry[$u]) {

                                                                    ?>
                                                                                <div class="col-1 p-1 pe-4 ps-4 d-flex justify-content-center">
                                                                                    <label for="" class="text-black fw-bold opacity-75"><?php echo ($derss_size_data["sizes_name"]) ?></label>

                                                                                </div>

                                                                    <?php
                                                                            }
                                                                        }
                                                                    }

                                                                    ?>





                                                                </div>
                                                            </div>
                                                            <div class="" style="width: 20rem; height: 30rem;  overflow: hidden;" id="img1">
                                                                <img src="<?php echo ($arry2[0]) ?>" style="width: 20rem; height: 30rem;  " class="position-absolute  dressImge1" alt="">
                                                                <img src="<?php echo ($arry2[1]) ?>" style="width: 20rem; height: 30rem;  " class="position-absolute dressImge2" alt="">

                                                            </div>

                                                            <!-- <div class="" id="img2">
<img src="images/icon/cash on delivery.png" class=""  style="width: 20rem; height: 30rem;" alt="">

</div> -->


                                                            <div class=" card-body mb-5" style="z-index: 999999;" id="dressload">
                                                                <div class="col-12">
                                                                    <div class="row">
                                                                        <div class="col-10"><label for="" class="fs-4"><?php echo ($product_data["Dress_code"]) ?></label></div>
                                                                        <?php
                                                                        if (isset($_SESSION["u"]["email"])) {
                                                                            $Useremail = $_SESSION["u"]["email"];
                                                                            $wichlist = Database::search("SELECT * FROM  `wichlist` WHERE `Dress_id`='" . $product_data["id"] . "'AND `user_email`='" . $Useremail . "'");
                                                                            $wichlist_num = $wichlist->num_rows;
                                                                            $wichlist_data = $wichlist->fetch_assoc();

                                                                            if ($wichlist_num == 1) {
                                                                        ?>

                                                                                <div class="col-2"> <i class="bi bi-heart fs-4 wich" style=" cursor: pointer; color: rgba(252, 105, 105, 0.774);" onclick="window.location='wichlist.php';"></i></div>


                                                                            <?php
                                                                            } else {
                                                                            ?>
                                                                                <div class="col-2" id="wichlistaddDiv"> <i class="bi bi-heart fs-4 wich" style=" cursor: pointer;" onclick="addWichlist('<?php echo ($product_data['id']) ?>_<?php echo ($Useremail) ?>_<?php echo ($product_data['Dress_code']) ?>');"></i></div>
                                                                            <?php
                                                                            }
                                                                        } else {
                                                                            ?>
                                                                            <div class="col-2"> <i class="bi bi-heart fs-4 wich" style=" cursor: pointer;" onclick="window.location='signInpage.php';"></i></div>
                                                                        <?php
                                                                        }
                                                                        ?>

                                                                    </div>
                                                                </div>

                                                                <?php



                                                                ?>
                                                                <div class="col-12 mt-2"> <label for="">Material-&nbsp; <?php echo ($material_data["material_name"]) ?></label></div>
                                                                <div class="col-12">

                                                                    <div class="row">
                                                                        <div class="col-8 p-2 mt-2">
                                                                            <label for="" class="fs-4" style="color: #FA948D;">RS:&nbsp;<?php echo (number_format($product_data["price"])) ?>.00</label>

                                                                        </div>
                                                                        <div class="col-4  d-flex justify-content-center  mt-3 ps-5 p-0">
                                                                            <div class="col-12 d-flex justify-content-center  cart1">
                                                                                <?php
                                                                                if (isset($_SESSION["u"]["email"])) {
                                                                                    $Useremail = $_SESSION["u"]["email"];
                                                                                ?>

                                                                                    <label for="" class="fs-4"> </label>&nbsp; <i class="bi bi-handbag fs-3" onclick="addcart('<?php echo ($product_data['id']) ?>_<?php echo ($Useremail) ?>_<?php echo ($product_data['Dress_code']) ?>');"></i>

                                                                                <?php
                                                                                } else {
                                                                                ?>

                                                                                    <label for="" class="fs-4"> </label>&nbsp; <i class="bi bi-handbag fs-3" onclick="window.location='signInpage.php';"></i>

                                                                                <?php
                                                                                }
                                                                                ?>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                </div>

                                                                <div class="col-12  p-2"></div>

                                                                <div class="col-12 d-flex justify-content-center pe2 pt-4" style="z-index: 999999;">
                                                                    <button class="btn1      " style="position: absolute; width: 10rem; " onclick="window.location='<?php echo ('singaleDressView.php?id=' . $product_data['id']) ?>'">Buy Dress</button>


                                                                </div>
                                                            </div>



                                                        </div>

                                                        <div class=" ms-md-2 me-md-2 ms-0 mb-0  mt-3    overflow-hidden  p-0 product d-md-none  d-lg-none" style="width: 12.2rem; height: 29rem;">

                                                            <?php

                                                            $DressImage_rs = Database::search("SELECT * FROM `drees_image` WHERE  `Dress_id`='" . $product_data["id"] . "'");

                                                            for ($t = 0; $t < $DressImage_rs->num_rows; $t++) {
                                                                $DressImage_data = $DressImage_rs->fetch_assoc();
                                                                $arry2[$t] =  $DressImage_data["image_path"];
                                                            }


                                                            $material_rs = Database::search("SELECT * FROM `materiale` WHERE `id`='" . $product_data["materiale_id"] . "' ");
                                                            $material_data = $material_rs->fetch_assoc();

                                                            ?>
                                                            <div class=" col-11  pe1 p-1" style="position: absolute; margin-top: 16rem;width: 12.2rem; z-index: 99999; ">
                                                                <div class="row ps-2 pe-2  justify-content-center">

                                                                    <?php



                                                                    for ($o = 0; $o < $dresize_num; $o++) {
                                                                        $dresize_data = $dresize_rs->fetch_assoc();
                                                                        // $arry[$o] =  $dresize_data["id"];
                                                                        // echo($arry[$o]);
                                                                    }
                                                                    $derss_size = Database::search("SELECT * FROM `dress_sizes` ");
                                                                    $derss_size_num = $derss_size->num_rows;

                                                                    for ($c = 0; $c < $derss_size_num; $c++) {
                                                                        $derss_size_data = $derss_size->fetch_assoc();
                                                                        $leth = count($arry);

                                                                        // echo($leth);
                                                                        for ($u = 0; $u < $leth; $u++) {
                                                                            if ($derss_size_data["id"] == $arry[$u]) {

                                                                    ?>
                                                                                <div class="col-1 p-1 pe-3 ps-3 d-flex justify-content-center ">
                                                                                    <label for="" class="text-black fw-bold opacity-75" style="font-size: 0.8rem;"><?php echo ($derss_size_data["sizes_name"]) ?></label>

                                                                                </div>

                                                                    <?php
                                                                            }
                                                                        }
                                                                    }

                                                                    ?>



                                                                </div>
                                                            </div>
                                                            <div class="" style="width: 13rem; height: 19rem;" id="img1">

                                                                <img src=" <?php echo ($arry2[0]) ?>" style="width: 12.2rem; height: 19rem;" class="position-absolute  dressImge1" alt="">
                                                                <img src="<?php echo ($arry2[1]) ?>" style="width: 12.2rem; height: 19rem;" class="position-absolute  dressImge2" alt="">
                                                            </div>
                                                            <div class=" card-body mt-sm-0 mt-0 pt-2 ">
                                                                <div class="col-12">
                                                                    <div class="row">

                                                                        <div class="col-9"><label for="" class="fs-6 "><?php echo ($product_data["Dress_code"]) ?> </label></div>
                                                                        <?php

                                                                        if (isset($_SESSION["u"]["email"])) {
                                                                            $Useremail = $_SESSION["u"]["email"];
                                                                            $wichlist = Database::search("SELECT * FROM  `wichlist` WHERE `Dress_id`='" . $product_data["id"] . "'AND `user_email`='" . $Useremail . "'");
                                                                            $wichlist_num = $wichlist->num_rows;
                                                                            $wichlist_data = $wichlist->fetch_assoc();
                                                                            if ($wichlist_num == 1) {
                                                                        ?>

                                                                                <div class="col-2"> <i class="bi bi-heart fs-4 wich" style=" cursor: pointer; color: rgba(252, 105, 105, 0.774);" onclick="window.location='wichlist.php';"></i></div>

                                                                            <?php
                                                                            } else {
                                                                            ?>
                                                                                <div class="col-2" id="wichlistaddDiv"> <i class="bi bi-heart fs-4 wich" style=" cursor: pointer;" onclick="addWichlist('<?php echo ($product_data['id']) ?>_<?php echo ($Useremail) ?>_<?php echo ($product_data['Dress_code']) ?>');"></i></div>
                                                                            <?php
                                                                            }
                                                                        } else {
                                                                            ?>
                                                                            <div class="col-2"> <i class="bi bi-heart fs-4 wich" style=" cursor: pointer;" onclick="window.location='signInpage.php';"></i></div>
                                                                        <?php
                                                                        }
                                                                        ?>
                                                                    </div>
                                                                </div>

                                                                <?php



                                                                ?>
                                                                <!-- <div class="col-12 mt-2"> <label class="fs-6" for="">Material-&nbsp; <?php echo ($material_data["material_name"]) ?></label></div> -->

                                                                <div class="col-12">
                                                                    <div class="row">
                                                                        <div class="col-8 mt-2">
                                                                            <label for="" class="fs-6" style="color: #FA948D;">RS:&nbsp;<?php echo (number_format($product_data["price"])) ?>.00</label>

                                                                        </div>

                                                                        <div class="col-4  d-flex justify-content-center align-items-center mt-1 ">
                                                                            <!-- <div class="col-12 d-flex justify-content-center align-items-center cart1">
                                                                                <?php
                                                                                if (isset($_SESSION["u"]["email"])) {
                                                                                    $Useremail = $_SESSION["u"]["email"];
                                                                                ?>

                                                                                    <label for="" class="fs-4"> </label>&nbsp; <i class="bi bi-handbag  fs-3" onclick="addcart('<?php echo ($product_data['id']) ?>_<?php echo ($Useremail) ?>_<?php echo ($product_data['Dress_code']) ?>');"></i>

                                                                                <?php
                                                                                } else {
                                                                                ?>

                                                                                    <label for="" class="fs-4"> </label>&nbsp; <i class="bi bi-handbag fs-3" onclick="window.location='signInpage.php';"></i>

                                                                                <?php
                                                                                }
                                                                                ?>
                                                                            </div> -->
                                                                            <!-- <i class="bi bi-handbag cart fs-3 opacity-50 "></i> -->

                                                                        </div>
                                                                    </div>
                                                                </div>



                                                            </div>

                                                            <div class="col-12 d-flex justify-content-center pe2 pt-3 p-1">
                                                                <button class="btn1      " style="position: absolute; width: 6rem;" onclick="window.location='<?php echo ('singaleDressView.php?id=' . $product_data['id']) ?>'">Buy Dress</button>

                                                            </div>

                                                        </div>
                                                    </div>
                                                <?php
                                                } else {
                                                ?>

                                                    <div class="col-6  col-lg-3 mb-4  d-flex justify-content-center opacity-75 p-0">
                                                        <div class=" ms-md-3 me-md-3  mt-5    overflow-hidden  p-0 product d-none d-md-block d-lg-block" style="transform: scale(0.95);" onmouseenter="Chngecartimge();">

                                                            <?php




                                                            $DressImage_rs = Database::search("SELECT * FROM `drees_image` WHERE  `Dress_id`='" . $product_data["id"] . "'");
                                                            $DressImage_data = $DressImage_rs->fetch_assoc();


                                                            $material_rs = Database::search("SELECT * FROM `materiale` WHERE `id`='" . $product_data["materiale_id"] . "' ");
                                                            $material_data = $material_rs->fetch_assoc();


                                                            ?>
                                                            <div class="mt-5 pt-5" style="position: absolute; width: 20rem; height: 30rem;">
                                                                <div class="col-12 mt-5 pt-5">
                                                                    <div class="row">
                                                                        <div class="col-3">
                                                                            <hr class="bg-black p-0 fs-2" style="height: 2px;">
                                                                        </div>
                                                                        <div class="col-6 d-flex justify-content-center">
                                                                            <div class="col-11 bg-black d-flex justify-content-center align-items-center">
                                                                                <label for="" class="text-white">Out Of Stock</label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-3">
                                                                            <hr class="bg-black p-0 fs-2" style="height: 2px;">
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="" id="img1">
                                                                <img src="<?php echo ($DressImage_data["image_path"]) ?>" style="width: 20rem; height: 30rem;  " alt="">

                                                            </div>
                                                            <!-- <div class="" id="img2">
<img src="images/icon/cash on delivery.png" class=""  style="width: 20rem; height: 30rem;" alt="">

</div> -->


                                                            <div class=" card-body " style="z-index: 999999;" id="dressload">
                                                                <div class="col-12">
                                                                    <div class="row">
                                                                        <div class="col-10"><label for="" class="fs-4"><?php echo ($product_data["Dress_code"]) ?></label></div>


                                                                    </div>
                                                                </div>

                                                                <?php



                                                                ?>
                                                                <div class="col-12 mt-2"> <label for="">Material-&nbsp; <?php echo ($material_data["material_name"]) ?></label></div>
                                                                <div class="col-12 p-2 mt-2">
                                                                    <label for="" class="fs-4" style="color: #FA948D;">RS:&nbsp;<?php echo ($product_data["price"]) ?>.00</label>

                                                                </div>


                                                            </div>

                                                        </div>

                                                        <div class=" ms-md-2 me-md-2 ms-0 mb-0  mt-3   overflow-hidden  p-0 product  d-md-none d-lg-none opacity-75" style="width: 12.2rem; height: 29rem;">

                                                            <?php

                                                            $DressImage_rs = Database::search("SELECT * FROM `drees_image` WHERE  `Dress_id`='" . $product_data["id"] . "'");
                                                            $DressImage_data = $DressImage_rs->fetch_assoc();


                                                            $material_rs = Database::search("SELECT * FROM `materiale` WHERE `id`='" . $product_data["materiale_id"] . "' ");
                                                            $material_data = $material_rs->fetch_assoc();

                                                            ?>
                                                            <div class="mt-3 pt-1" style="position: absolute; width: 12.2rem; height: 18rem;">
                                                                <div class="col-12 mt-5 pt-5">
                                                                    <div class="row">
                                                                        <div class="col-2">
                                                                            <hr class="bg-black p-0 fs-2" style="height: 2px;">
                                                                        </div>
                                                                        <div class="col-8 d-flex justify-content-center">
                                                                            <div class="col-11 bg-black d-flex justify-content-center align-items-center">
                                                                                <label for="" class="text-white fs-6">Out Of Stock</label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-2">
                                                                            <hr class="bg-black p-0 fs-2" style="height: 2px;">
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <img src="<?php echo ($DressImage_data["image_path"]) ?>" style="width: 12.2rem; height: 19rem;" alt="">

                                                            <div class=" card-body">
                                                                <div class="col-12">
                                                                    <div class="row">

                                                                        <div class="col-9"><label for="" class="fs-6"><?php echo ($product_data["Dress_code"]) ?> </label></div>

                                                                    </div>
                                                                </div>

                                                                <?php



                                                                ?>
                                                                <!-- <div class="col-12 mt-2"> <label for="">Material-&nbsp; <?php echo ($material_data["material_name"]) ?></label></div> -->
                                                                <div class="col-12 mt-2">
                                                                    <label for="" class="fs-6" style="color: #FA948D;">RS:&nbsp;<?php echo ($product_data["price"]) ?>.00</label>

                                                                </div>


                                                            </div>

                                                        </div>
                                                    </div>

                                                <?php
                                                }





                                                ?>



                                            <?php


                                            }

                                            ?>


                                            <div class="col-12 d-flex justify-content-center ">
                                                <div class="col-12">
                                                    <nav aria-label="Page navigation example">
                                                        <ul class="pagination pagination-lg justify-content-center">
                                                            <li class="rounded-circle d-flex align-items-center pe-2">
                                                                <a class=" border-0   " href="<?php if ($pageno <= 1) {
                                                                                                    echo ("#");
                                                                                                } else {
                                                                                                    echo ("?page=" . ($pageno - 1));
                                                                                                } ?>" aria-label="Previous">
                                                                    <span aria-hidden="true"><i class="bi bi-chevron-double-left  fs-4 text-black"></i></span>
                                                                </a>
                                                            </li>

                                                            <?php

                                                            for ($x = 1; $x <= $number_of_pages; $x++) {
                                                                if ($x == $pageno) {

                                                            ?>
                                                                    <li class="page-item d-flex align-items-center ps-2 pe-2   bg-white" active-color="black" style="border-radius: 30px;">
                                                                        <a class=" border-0 rounded-circle text-black fw-bold opacity-25 fs-5 text-decoration-none" href="<?php echo ("?page=" . ($x)); ?>"><?php echo ($x); ?></a>
                                                                    </li>




                                                                <?php
                                                                } else {
                                                                ?>

                                                                    <li class="page-item d-flex align-items-center ps-2 pe-2">
                                                                        <a class=" border-0 rounded-circle text-black opacity-75 fw-bold fs-5 text-decoration-none" href="<?php echo ("?page=" . ($x)); ?>"><?php echo ($x); ?></a>
                                                                    </li>
                                                            <?php
                                                                }
                                                            }

                                                            ?>


                                                            <li class="rounded-circle d-flex align-items-center ps-2">

                                                                <a class=" border-0  " href="<?php if ($pageno >= $number_of_pages) {
                                                                                                    echo ("#");
                                                                                                } else {
                                                                                                    echo ("?page=" . ($pageno + 1));
                                                                                                } ?>" aria-label="Next">
                                                                    <span aria-hidden="true"><i class="bi bi-chevron-double-right fs-4 text-black"></i></span>
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




            <?php



            // include "footer.php"
            ?>

        </div>
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


    <!-- price range Script -->

    <script>
        const rangeInput = document.querySelectorAll(".range-input input"),
            priceInput = document.querySelectorAll(".price-input input"),
            range = document.querySelector(".slider .progress");
        let priceGap = 1000;

        priceInput.forEach((input) => {
            input.addEventListener("input", (e) => {
                let minPrice = parseInt(priceInput[0].value),
                    maxPrice = parseInt(priceInput[1].value);

                if (maxPrice - minPrice >= priceGap && maxPrice <= rangeInput[1].max) {
                    if (e.target.className === "input-min") {
                        rangeInput[0].value = minPrice;
                        range.style.left = (minPrice / rangeInput[0].max) * 100 + "%";
                    } else {
                        rangeInput[1].value = maxPrice;
                        range.style.right = 100 - (maxPrice / rangeInput[1].max) * 100 + "%";
                    }
                }
            });
        });

        rangeInput.forEach((input) => {
            input.addEventListener("input", (e) => {
                let minVal = parseInt(rangeInput[0].value),
                    maxVal = parseInt(rangeInput[1].value);

                if (maxVal - minVal < priceGap) {
                    if (e.target.className === "range-min") {
                        rangeInput[0].value = maxVal - priceGap;
                    } else {
                        rangeInput[1].value = minVal + priceGap;
                    }
                } else {
                    priceInput[0].value = minVal;
                    priceInput[1].value = maxVal;
                    range.style.left = (minVal / rangeInput[0].max) * 100 + "%";
                    range.style.right = 100 - (maxVal / rangeInput[1].max) * 100 + "%";
                }
            });
        });
    </script>
    <!-- price range Script -->



    <script src="./bootstrap.bundle.js"></script>
    <script src="./bootstrap.jss"></script>
    <script src="./script.js"></script>

</body>

</html>
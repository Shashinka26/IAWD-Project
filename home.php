<?php

// echo("welcom");

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NEVI'S | Home </title>
    <link rel="stylesheet" href="./bootstrap.css">
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="./corusel.css">
    <link rel="icon" href="./images/heder.icon.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./css/preloder.css">
</head>


<body>




    <div class="container-fluid p-0  overflow-hidden ">
        <div class="row coo">

            <?php
            // session_start();

            // require "connection.php";
            // require "spiner.php";

            include "header2.php";
            require "spiner.php";


            // include "spinner.php";





            ?>

            <div class="col-12  d-lg-block " style="height: 5rem;  ">
            </div>
            <div class="col-12 d-sm-block d-md-block d-lg-none" style="height: 2rem; background-color:rgb(255, 255, 255); ">
            </div>









            <div id="carouselExampleFade " class="carousel slide carousel-fade d-none d-lg-block d-xl-block  h-25" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="" data-bs-target="#carouselExampleFade" data-bs-slide-to="0" class="active rounded-circle me-3" aria-current="true" aria-label="Slide 1" style="height: 0.5rem ; width: 0.5rem;"></button>
                    <button type="button" data-bs-target="#carouselExampleFade" data-bs-slide-to="1" aria-label="Slide 2" class="rounded-circle me-3" style="height: 0.5rem ; width: 0.5rem;"></button>
                    <button type="button" data-bs-target="#carouselExampleFade" data-bs-slide-to="2" aria-label="Slide 3" class="rounded-circle me-3" style="height: 0.5rem ; width: 0.5rem;"></button>
                </div>
                <div class="carousel-inner" style="height: 40rem;">

                    <div class="carousel-item active" data-bs-interval="4000">
                        <button style="position: absolute; margin-left: 70%; margin-top: 30%;" class="btn1 bg-danger text-white p-2 pe-3 ps-3 sliderbut">SHOP NOW <i class="bi bi-chevron-double-right"></i></button>
                        <img src="./images/homepageImg/qq.jpg" style="height: 55rem;" class="d-block w-100  " alt="...">

                    </div>
                    <div class="carousel-item" data-bs-interval="4000">
                        <button style="position: absolute; transform: translateX(40%); margin-top: 30%;" class="btn1 bg-dark text-white p-2 pe-3 ps-3 sliderbut2">SHOP NOW <i class="bi bi-chevron-double-right"></i></button>

                        <img src="./images/homepageImg/qq3.jpg" style="height: 55rem;" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item " data-bs-interval="4000">
                        <?php

                        $arry3 = array();


                        $product1_rs = Database::search("SELECT dress.*, COUNT(wichlist.Dress_id) AS total_count
                        FROM `dress`
                        INNER JOIN `wichlist` ON wichlist.Dress_id = dress.id
                        WHERE `Stutus` = '1'
                        GROUP BY dress.id
                        HAVING total_count > 0
                        ORDER BY total_count DESC
                        LIMIT 8 OFFSET 0
                    ");
                    
                        $product1_data = $product1_rs->fetch_assoc();

                        $DressImage_rs = Database::search("SELECT * FROM `drees_image` WHERE  `Dress_id`='" . $product1_data["id"] . "'");

                        for ($p = 0; $p < $DressImage_rs->num_rows; $p++) {
                            $DressImage_data = $DressImage_rs->fetch_assoc();
                            $arry3[$p] =  $DressImage_data["image_path"];
                        }
                        ?>
                        <div class="col-12 " style="transform: scale(0.4);">
                            <img src="<" alt=" " style=" margin-top: 5%; transform: translateX(-110%); position: absolute;" class="sliderImge">

                        </div>
                        <label for="" style="position: absolute; transform: translateX(150%);  font-family: indie;" class="text-white fs-1 mt-5  silderlable1"> Most famous Dress <?php echo ($product1_data["Dress_code"]) ?> </label>
                        <label for="" style="position: absolute; transform: translateX(920%);  margin-top: 8%; font-family: honey;" class="text-white fs-1 silderlable2 "> For Nevi's</label>
                        <label for="" style="position: absolute; transform: translateX(280%);  margin-top: 20%; font-family: indie;" class="text-white fs-4  silderlable3"> NOw You Can Buy Harry Up !!!</label>
                        <img src="./images/logoe.png" alt=" " style=" height: 10rem; margin-left: 90%; position: absolute;" class="sliderImge2">


                        <button style="position: absolute; margin-left: 70%; margin-top: 30%;" class="btn1 bg-danger text-white p-2 pe-3 ps-3 sliderbut">SHOP NOW <i class="bi bi-chevron-double-right"></i></button>

                        <img src="./images/homepageImg/drakimge.jpg" style="height: 55rem;" class="d-block w-100" alt="...">
                    </div>

                </div>

            </div>
            <!-- <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="..." class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="..." class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="..." class="d-block w-100" alt="...">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div> -->

            <div id="carouselExampleInterval" class="carousel slide d-lg-none d-xxl-none" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="" data-bs-target="#carouselExampleInterval" data-bs-slide-to="0" class="active rounded-circle me-3" aria-current="true" aria-label="Slide 1" style="height: 0.5rem ; width: 0.5rem;"></button>
                    <button type="button" data-bs-target="#carouselExampleInterval" data-bs-slide-to="1" aria-label="Slide 2" class="rounded-circle me-3" style="height: 0.5rem ; width: 0.5rem;"></button>
                    <button type="button" data-bs-target="#carouselExampleInterval" data-bs-slide-to="2" aria-label="Slide 3" class="rounded-circle me-3" style="height: 0.5rem ; width: 0.5rem;"></button>
                </div>
                <div class="carousel-inner" style="height: 15rem;">
                    <div class="carousel-item active" data-bs-interval="2000">

                        <img src="./images/homepageImg/qq.jpg" class="d-block w-100  " alt="...">

                    </div>
                    <div class="carousel-item" data-bs-interval="2000">
                        <img src="./images/homepageImg/qq2.jpg" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item" data-bs-interval="2000">
                        <img src="./images/homepageImg/qq3.jpg" class="d-block w-100" alt="...">
                    </div>
                </div>

            </div>
            <!-- <div id="carouselExampleInterval" class="carousel slide d-none d-xxl-block" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="" data-bs-target="#carouselExampleInterval" data-bs-slide-to="0" class="active rounded-circle me-3" aria-current="true" aria-label="Slide 1" style="height: 0.5rem ; width: 0.5rem;"></button>
                    <button type="button" data-bs-target="#carouselExampleInterval" data-bs-slide-to="1" aria-label="Slide 2" class="rounded-circle me-3" style="height: 0.5rem ; width: 0.5rem;"></button>
                    <button type="button" data-bs-target="#carouselExampleInterval" data-bs-slide-to="2" aria-label="Slide 3" class="rounded-circle me-3" style="height: 0.5rem ; width: 0.5rem;"></button>
                </div>
                <div class="carousel-inner" style="height: 65rem;">
                    <div class="carousel-item active" data-bs-interval="2000">
                        <img src="./images/www.NewTech.com.png" class="d-block w-100  " alt="...">

                    </div>
                    <div class="carousel-item" data-bs-interval="2000">
                        <img src="./images/lap1.jpg" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item" data-bs-interval="2000">
                        <img src="images/cam2.jpg" class="d-block w-100" alt="...">
                    </div>
                </div>

            </div> -->

            <!-- cursoul -->


            <!-- 
            <div class="col-12 h-100">
                <hr>

            </div> -->

            <div class="col-12 mb-2 d-flex justify-content-center align-items-center  d-none d-lg-block  homenewarvil2">
                <div class="col-12 ps-5 pe-5 sorleY">
                    <div class="row ">
                        <div class="col-12 col-md-6 col-lg-3 p-3">
                            <div class="row">
                                <div class="col-3 p-0">
                                    <img src="./images/icon/delivery (2).png" class="opacity-75" style="height: 3rem;" alt="">

                                </div>

                                <div class="col-9 d-flex align-items-center">
                                    <label for="" class="fs-6 fw-bold opacity-75">ISLANDWIDE FAST DELIVERY</label>

                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-md-6 col-lg-3 p-3">
                            <div class="row">
                                <div class="col-2 p-0">
                                    <img src="./images/icon/24 hours.png" class="opacity-75" style="height: 3rem;" alt="">

                                </div>

                                <div class="col-10 p-0 d-flex align-items-center">
                                    <label for="" class="fs-6 fw-bold opacity-75"> ANY TIME ACCEPTING ORDERS (24/7)</label>

                                </div>
                            </div>
                        </div>


                        <div class="col-12 col-md-6 col-lg-3 p-3">
                            <div class="row">
                                <div class="col-2 p-0">
                                    <img src="./images/icon/cash on delivery.png" class="opacity-75" style="height: 3rem;" alt="">

                                </div>

                                <div class="col-10 p-0 d-flex align-items-center">
                                    <label for="" class="fs-6 fw-bold opacity-75">ISLANDWIDE CASH ON DELIVERY</label>

                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-md-6 col-lg-3 p-3">
                            <div class="row">
                                <div class="col-2 p-0">
                                    <img src="./images/icon/up dress.png" class="opacity-75" style="height: 3rem;" alt="">

                                </div>

                                <div class="col-10 p-0 d-flex align-items-center">
                                    <label for="" class="fs-6 fw-bold opacity-75">NEW STYLES LAUNCHES IN EVERY WEEK</label>

                                </div>
                            </div>
                        </div>






                    </div>
                </div>
            </div>

            <!-- nre product  -->

            <div class="col-12 mt-5 mb-2 homenewarvil" id="dressload2">

                <div class="col-12  ">
                    <div class="row">
                        <div class="col-3 col-md-4  d-md-block">
                            <hr style="height: 2.7px;  " class="homenewarvilHr ">
                        </div>
                        <div class="col-6 col-md-4 d-flex justify-content-center align-items-center p-0 ">
                            <label for="" class="fwrite fs-2 d-lg-none pt-1  " style="color: rgba(42, 163, 174, 0.553); font-family: baloo;">~ NEW ARRIVALS ~</label>
                            <label for="" class="fwrite fs-1 d-none d-lg-block   " style="color: rgba(42, 163, 174, 0.553); font-family: baloo;">~ NEW ARRIVALS ~</label>

                        </div>
                        <div class="col-3 col-md-4  d-md-block">
                            <hr style="height: 2.7px;  " class="homenewarvilHr">

                        </div>

                    </div>

                </div>

                <div class="col-12 d-flex justify-content-center align-items-center">
                    <label for="" class="fs-6 text-black">Latest dress to choose from</label>
                </div>

                <div class="col-12 d-flex justify-content-center align-items-center mt-5">

                    <div class="col-lg-11 col-md-12 col-12  ">


                        <div class="row justify-content-center">

                            <?php

                            $product_rs = Database::search("SELECT * FROM `dress`  WHERE `Stutus`='1' ORDER BY `add_date_time` DESC LIMIT 20 OFFSET 0");
                            $product_num = $product_rs->num_rows;

                            // echo($product_num);

                            ?>

                            <div class="owl-carousel client-testimonial-carousel">

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
                                        <div class="single-testimonial-carousel mb-4  d-flex justify-content-center">
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

                                                                    <div class="col-2"> <i class="bi bi-heart-fill fs-4 wich" style=" cursor: pointer; color: rgba(252, 105, 105, 0.774);" onclick="window.location='wichlist.php';"></i></div>


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
                                                            <!-- <div class="col-4  d-flex justify-content-center  mt-3 ps-5 p-0">
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
                                                            </div> -->
                                                        </div>

                                                    </div>

                                                    <div class="col-12  p-2"></div>

                                                    <div class="col-12 d-flex justify-content-center pe2 pt-4" style="z-index: 999999;">
                                                        <button class="btn1      " style="position: absolute; width: 10rem; " onclick="window.location='<?php echo ('singaleDressView.php?id=' . $product_data['id']) ?>'">Buy Dress</button>


                                                    </div>
                                                </div>



                                            </div>

                                            <div class=" ms-md-2 me-md-2 ms-0 mb-0  mt-3   overflow-hidden  p-0 product d-md-none  d-lg-none" style="width: 13rem; height: 29rem;">

                                                <?php

                                                $DressImage_rs = Database::search("SELECT * FROM `drees_image` WHERE  `Dress_id`='" . $product_data["id"] . "'");

                                                for ($t = 0; $t < $DressImage_rs->num_rows; $t++) {
                                                    $DressImage_data = $DressImage_rs->fetch_assoc();
                                                    $arry2[$t] =  $DressImage_data["image_path"];
                                                }


                                                $material_rs = Database::search("SELECT * FROM `materiale` WHERE `id`='" . $product_data["materiale_id"] . "' ");
                                                $material_data = $material_rs->fetch_assoc();

                                                ?>
                                                <div class=" col-12  pe1 p-1" style="position: absolute; margin-top: 16rem;width: 13rem; z-index: 99999; ">
                                                    <div class="row ps-2 pe-2 justify-content-center">

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
                                                <div class="" style="width: 12rem; height: 17rem;" id="img1">

                                                    <img src=" <?php echo ($arry2[0]) ?>" style="width: 13rem; height: 19rem;" class="position-absolute  dressImge1" alt="">
                                                    <img src="<?php echo ($arry2[1]) ?>" style="width: 13rem; height: 19rem;" class="position-absolute  dressImge2" alt="">
                                                </div>
                                                <div class=" card-body mt-4">
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

                                                                    <div class="col-2"> <i class="bi bi-heart-fill fs-4 wich" style=" cursor: pointer; color: rgba(252, 105, 105, 0.774);" onclick="window.location='wichlist.php';"></i></div>


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
                                                            <!-- 
                                                            <div class="col-4  d-flex justify-content-center align-items-center mt-1 ">
                                                                <div class="col-12 d-flex justify-content-center align-items-center cart1">
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
                                                                </div>

                                                            </div> -->
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

                                        <div class="single-testimonial-carousel mb-4  d-flex justify-content-center opacity-75">
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
                                                        <label for="" class="fs-4" style="color: #FA948D;">RS:&nbsp;<?php echo (number_format($product_data["price"])) ?>.00</label>

                                                    </div>


                                                </div>

                                            </div>

                                            <div class=" ms-md-2 me-md-2 ms-0 mb-0  mt-3    overflow-hidden  p-0 product  d-md-none d-lg-none opacity-75" style="width: 13rem; height: 29rem;"">

                                                <?php

                                                $DressImage_rs = Database::search("SELECT * FROM `drees_image` WHERE  `Dress_id`='" . $product_data["id"] . "'");
                                                $DressImage_data = $DressImage_rs->fetch_assoc();


                                                $material_rs = Database::search("SELECT * FROM `materiale` WHERE `id`='" . $product_data["materiale_id"] . "' ");
                                                $material_data = $material_rs->fetch_assoc();

                                                ?>
                                                <div class=" mt-3 pt-1" style="position: absolute; width: 13rem; height: 19rem;">
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

                                            <img src="<?php echo ($DressImage_data["image_path"]) ?>" style="width: 13rem; height: 19rem;" alt="">

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
                        </div>
                    </div>


                </div>
            </div>



        </div>

        <!-- nre product  -->

        <!-- zoom img  -->

        <div class="col-12 h-50 mb-5 d-none d-lg-block">
            <div class="row ">
                <div class="col-4 bg-dark homeimges2 " style=" overflow: hidden;">
                    <div class="row">
                        <!-- <div class="col-3 bg-dark"></div> -->

                        <div class="col-12 p-0 homeimges">
                            <img src="./images/homepageImg/home19.png" style="transform: scale(1.);" class="w-100  h-100" alt="">
                        </div>

                    </div>
                    <div class="col-1 d-grid p-1 homeimgebut" style="position: absolute; margin-left: 20rem; ">
                        <button class="btn btn-secondary">Shop Now <i class="bi bi-chevron-double-right"></i></button>
                    </div>


                </div>

                <div class="col-4  homeimges2 bg-dark" style=" overflow: hidden;">
                    <div class="row">

                        <div class="col-12 homeimges p-0  " style="overflow: hidden;">
                            <img src="./images/homepageImg/home18.png" class="w-100 h-100 " style="transform: scale(1);" alt="">
                        </div>
                        <!-- <div class="col-2 bg-black">ddd</div> -->
                    </div>
                    <div class="col-1 d-grid p-1 homeimgebut" style="position: absolute; margin-left: 10rem; ">
                        <button class="btn btn-secondary">Shop Now <i class="bi bi-chevron-double-right"></i></button>
                    </div>

                </div>
                <div class="col-4  homeimges2 bg-dark" style=" overflow: hidden;">
                    <div class="row">

                        <div class="col-12 homeimges p-0 ">
                            <img src="./images/homepageImg/home20.png" class="h-100 w-100 " style="transform: scale(1); " alt="">
                        </div>
                    </div>
                    <div class="col-1 d-grid p-1 homeimgebut" style="position: absolute; margin-left: 10rem; ">
                        <button class="btn btn-secondary">Shop Now <i class="bi bi-chevron-double-right"></i></button>
                    </div>
                </div>


            </div>
        </div>
        <div class="col-12 h-50 mb-5 d-lg-none">
            <div class="row">
                <div class="col-12 bg-black homeimges2" style=" overflow: hidden;">
                    <div class="col-12 homeimges">
                        <div class="row">

                            <div class="col-12 p-0">
                                <img src="./images/homepageImg/home19.png" class="h-100 w-100" alt="">

                            </div>


                        </div>
                        <div class="col-4 d-grid p-1  homeimgebut2" style="position: absolute; margin-left: 15rem;">
                            <button class="btn btn-secondary">Shop Now <i class="bi bi-chevron-double-right"></i></button>
                        </div>
                    </div>
                </div>
                <div class="col-6 bg-black  homeimges2" style=" overflow: hidden;">
                    <div class="col-12 homeimges">
                        <div class="row">

                            <div class="col-12 p-0">
                                <img src="./images/homepageImg/home14.jpg" class="h-100 w-100" alt="">

                            </div>


                        </div>

                    </div>
                    <div class="col-4 d-grid p-1 homeimgebut3" style="position: absolute; margin-left: 1rem; ">
                        <button class="btn btn-secondary fs-6">Shop Now <i class="bi bi-chevron-double-right"></i></button>
                    </div>
                </div>
                <div class="col-6 bg-black homeimges2" style=" overflow: hidden;">
                    <div class="col-12 homeimges">
                        <div class="row">

                            <div class="col-12 p-0">
                                <img src="./images/homepageImg/home13.jpg" class="h-100 w-100" style="transform: scaleY(1.04);" alt="">

                            </div>

                        </div>
                    </div>
                    <div class="col-4 d-grid p-1 homeimgebut3" style="position: absolute; margin-left: 1rem; ">
                        <button class="btn btn-secondary fs-6">Shop Now <i class="bi bi-chevron-double-right"></i></button>
                    </div>
                </div>

            </div>
        </div>


        <!-- zoom img  -->


        <!-- most populear  -->

        <div class="col-12 mt-5  homenewarvil">
            <div class="col-12  mt-5 ">
                <div class="row">
                    <div class="col-3 col-md-4  d-md-block">
                        <hr style="height: 2.7px;  " class="homenewarvilHr ">
                    </div>
                    <div class="col-6 col-md-4 d-flex justify-content-center align-items-center p-0 ">
                        <label for="" class="fwrite fs-2 d-lg-none pt-1  text-black opacity-75" style=" font-family: baloo;">~ Most Popular ~</label>
                        <label for="" class="fwrite fs-1 d-none d-lg-block  text-black opacity-75  " style="font-family: baloo;">~ Most Popular ~</label>

                    </div>
                    <div class="col-3 col-md-4  d-md-block">
                        <hr style="height: 2.7px;  " class="homenewarvilHr">

                    </div>

                </div>

            </div>

            <div class="col-12 d-flex justify-content-center align-items-center">
                <label for="" class="fs-6 text-black">Popular dress to choose from</label>
            </div>


            <div class="col-12 d-flex justify-content-center" id="alldreddupdateDiv">


                <div class="col-11 col-md-12 mt-5 " >
                    <div class="row p-0 justify-content-center">
                        <?php


                        // $product_rs = Database::search("SELECT * FROM `dress`  INNER JOIN `wichlist` ON  wichlist.Dress_id=dress.id WHERE `Stutus`='1'  GROUP BY `Dress_id` HAVING COUNT(`Dress_id`)>0 ORDER BY COUNT(`Dress_id`) DESC LIMIT 8 OFFSET 0 ");

                        $product_rs = Database::search("SELECT dress.*, COUNT(wichlist.Dress_id) AS total_count
    FROM `dress`
    INNER JOIN `wichlist` ON wichlist.Dress_id = dress.id
    WHERE `Stutus` = '1'
    GROUP BY dress.id
    HAVING total_count > 0
    ORDER BY total_count DESC
    LIMIT 8 OFFSET 0
");

                        
                        
                        $product_num = $product_rs->num_rows;

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
                                    <div class=" ms-md-3 me-md-3  mt-2    overflow-hidden  p-0 product d-none d-md-block d-lg-block" style="transform: scale(1);" onmouseenter="Chngecartimge();">

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

                                                            <div class="col-2"> <i class="bi bi-heart-fill fs-4 wich" style=" cursor: pointer; color: rgba(252, 105, 105, 0.774);" onclick="window.location='wichlist.php';"></i></div>


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
                                                    <!-- <div class="col-4  d-flex justify-content-center  mt-3 ps-5 p-0">
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
                                                    </div> -->
                                                </div>

                                            </div>

                                            <div class="col-12  p-2"></div>

                                            <div class="col-12 d-flex justify-content-center pe2 pt-4" style="z-index: 999999;">
                                                <button class="btn1      " style="position: absolute; width: 10rem; " onclick="window.location='<?php echo ('singaleDressView.php?id=' . $product_data['id']) ?>'">Buy Dress</button>


                                            </div>
                                        </div>



                                    </div>

                                    <div class=" ms-md-0 me-md-0 ms-0 me-0 mb-0  mt-3    overflow-hidden  p-0 product d-md-none  d-lg-none" style="width: 12.2rem; height: 29rem;">

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
                                        <div class="" style="width: 12rem; height: 19rem;" id="img1">

                                            <img src=" <?php echo ($arry2[0]) ?>" style="width: 12.2rem; height: 19rem;" class="position-absolute  dressImge1" alt="">
                                            <img src="<?php echo ($arry2[1]) ?>" style="width: 12.2rem; height: 19rem;" class="position-absolute  dressImge2" alt="">
                                        </div>
                                        <div class=" card-body mt-sm-0 mt-0 pt-2 ">
                                            <div class="col-12 ">
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

                                                            <div class="col-2"> <i class="bi bi-heart-fill fs-4 wich" style=" cursor: pointer; color: rgba(252, 105, 105, 0.774);" onclick="window.location='wichlist.php';"></i></div>

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
                                    <div class=" ms-md-3 me-md-3  mt-2   overflow-hidden  p-0 product d-none d-md-block d-lg-block" style="transform: scale(1);" onmouseenter="Chngecartimge();">

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

                                    <div class=" ms-md-2 me-md-2 ms-0 mb-0  mt-3   overflow-hidden  p-0 product  d-md-none d-lg-none opacity-75" style="width: 12.5rem; height: 29rem;">

                                        <?php

                                        $DressImage_rs = Database::search("SELECT * FROM `drees_image` WHERE  `Dress_id`='" . $product_data["id"] . "'");
                                        $DressImage_data = $DressImage_rs->fetch_assoc();


                                        $material_rs = Database::search("SELECT * FROM `materiale` WHERE `id`='" . $product_data["materiale_id"] . "' ");
                                        $material_data = $material_rs->fetch_assoc();

                                        ?>
                                        <div class="mt-3 pt-1" style="position: absolute; width: 12.5rem; height: 18rem;">
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

                                        <img src="<?php echo ($DressImage_data["image_path"]) ?>" style="width: 12.5rem; height: 19rem;" alt="">

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
                    </div>
                </div>
            </div>

        </div>




        <!-- most populear  -->






        <!-- special  -->

        <div class="col-12 mt-5">

            <div class="col-12  mb-5">
                <div class="row">
                    <div class="col-md-3 col-lg-4 d-none d-md-block">
                        <hr style="height: 2px;">
                    </div>
                    <div class="col-12 col-md-6 col-lg-4 d-flex justify-content-center align-items-center">
                        <label for="" class="fs-3 fw-bold text-black opacity-75">~ THIS MONTH AT NEVIS ~</label>
                    </div>
                    <div class="col-md-3 col-lg-4 d-none d-md-block">
                        <hr style="height: 2px;">

                    </div>

                </div>

            </div>

            <div class="col-12 d-flex justify-content-center align-items-center mt-5 mb-5">
                <div class="col-10 mt-5">
                    <div class="row">

                        <div class="col-12 col-lg-6">
                            <img src="./images/dress/mmmm.jpeg" class="img-fluid" alt="">
                        </div>

                        <div class="col-12 col-lg-6  mt-5">
                            <div class="col-12 d-flex  align-items-center mt-5">
                                <div class="row">
                                    <div class="col-12 d-flex justify-content-center align-items-center mt-lg-5">
                                        <label for="" class="fs-3 " style="font-family:indie ;">December Month Collection</label>
                                    </div>

                                    <div class="col-12 p-lg-5 pt-5 pb-5">
                                        <span class="text-black-50">
                                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore vitae eos provident consequatur dicta natus
                                            rem at aperiam illo iure incidunt nam itaque reprehenderit dignissimos odio, beatae eum quo totam?
                                            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Expedita sunt illum temporibus reiciendis f
                                            ugit perspiciatis animi iste ipsam voluptatibus! Molestias expedita nemo labore cum incidunt magni recusandae, deleniti quod animi. </span>
                                    </div>

                                    <div class="col-12 ps-lg-5">
                                        <label for="" style=" cursor: pointer;" class="">SHOP NOW &nbsp;<i class="bi bi-caret-right fs-4 opacity-75  mt-5"></i></label>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>

            </div>


        </div>



        <!-- special  -->

        <!-- happy Coustomer  -->

        <div class="col-12 mt-5 mb-5">

            <div class="col-12  mb-5">
                <div class="row">
                    <div class="col-4 d-none d-md-block">
                        <hr style="height: 2px;">
                    </div>
                    <div class="col-12 col-md-4 d-flex justify-content-center align-items-center">
                        <label for="" class="fs-3 fw-bold text-black opacity-75">~ Happy Coustomer ~</label>
                    </div>
                    <div class="col-4 d-none d-md-block">
                        <hr style="height: 2px;">

                    </div>

                </div>

            </div>

            <div class="col-12 d-flex justify-content-center align-items-center mt-5 mb-lg-5">
                <div class="col-10 mt-5">
                    <div class="row">

                        <div class="col-12 col-lg-6 d-lg-none">
                            <img src="./images/dress/mmmm.jpeg" class="img-fluid" alt="">
                        </div>


                        <div class="col-12 col-lg-6  ">
                            <div class="col-12 d-flex  align-items-center mt-5">
                                <div class="row">
                                    <div class="col-12 d-flex justify-content-center align-items-center mt-lg-5">
                                        <label for="" class="fs-3 " style="font-family:indie ;">Our Happy Customers</label>
                                    </div>

                                    <div class="col-12 p-lg-5 pt-5 pb-5">
                                        <span class="text-black-50">
                                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore vitae eos provident consequatur dicta natus
                                            rem at aperiam illo iure incidunt nam itaque reprehenderit dignissimos odio, beatae eum quo totam?
                                            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Expedita sunt illum temporibus reiciendis f
                                            ugit perspiciatis animi iste ipsam voluptatibus! Molestias expedita nemo labore cum incidunt magni recusandae, deleniti quod animi. </span>
                                    </div>

                                    <div class="col-12 ps-lg-5">
                                        <label for="" style=" cursor: pointer;" class="fs-6">See All &nbsp;<i class="bi bi-caret-right fs-4 opacity-75  mt-5"></i></label>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="col-12 col-lg-6 d-none d-lg-block">
                            <img src="./images/dress/mmmm.jpeg" class="img-fluid" alt="">
                        </div>
                    </div>

                </div>

            </div>
        </div>



        <div class="d-lg-none">
            <?php
            include "footer1.php";

            ?>
        </div>


        <?php


        include "footer.php";

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



    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous"></script>
    <script src="./bootstrap.bundle.js"></script>
    <script src="./bootstrap.jss"></script>
    <script src="./script.js"></script>
    <script>
        $('.owl-carousel').owlCarousel({
            loop: true,
            margin: 8,
            // nav: true,
            responsive: {
                0: {
                    items: 2
                },

                600: {
                    items: 2
                },
                1000: {
                    items: 4
                },
                1800: {
                    items: 5
                }
            }
        })
    </script>
</body>

</html>
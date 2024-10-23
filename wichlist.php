<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nevis | Wichlist</title>
    <link rel="icon" href="./images/heder.icon.png">
    <link rel="stylesheet" href="./bootstrap.css">
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" />
    <link rel="stylesheet" href="./corusel.css">
    <link rel="stylesheet" href="./select.css">
    <link rel="stylesheet" href="./erroMsg.css">





</head>

<body>


    <div class="container-fluid">
        <div class="row ">

            <?php

            include "header2.php";
            require "spiner.php";

            ?>
            <div class="col-12  d-lg-block" style="height: 5rem; background-color:rgb(255, 255, 255); ">
            </div>
            <div class="col-12 d-sm-block d-md-block d-lg-none" style="height: 3rem; background-color:rgb(255, 255, 255); ">
            </div>
            <?php
            // require "connection.php";

            if (isset($_SESSION["u"])) {

                $email = $_SESSION["u"]["email"];
            ?>
                <!-- <button onmouseenter="jbdhu();">dddd</button> -->

                <div class="col-12  pt-lg-5 pt-3 mb-3">
                    <div class="row justify-content-center">

                        <div class="col-lg-4 col-12 mb-lg-0 mb-4">
                            <div class="col-lg-10 col-12 d-flex justify-content-center align-items-center">
                                <label for="" class="fs-3   fw-bold opacity-75 ">My Wichlist</label>&nbsp;
                                <i class="bi bi-heart-fill opacity-75 fs-4 fw-bold pe-2"></i>
                            </div>


                        </div>
                        <div class="col-4 d-none d-lg-block">

                        </div>
                        <div class="col-lg-4 col-12 d-flex justify-content-center">
                            <!-- <div class="col-10">
                                <button style="position: absolute; background-color: transparent;" class="border-0 mt-1">
                                    <img src="./images/icon/search (3).png" style="width: 2rem; height: 2rem;" class="opacity-50" alt="" onclick=""></button>
                                <input type="text" class="form-control ps-5 border-1 fw-bold text-black-50" style="border-radius: 15px;" placeholder="Search Item ?" value="NVS " id="wichlistSerchInput" onkeyup="serachwichlist();">
                            </div> -->

                        </div>


                    </div>

                </div>

                <?php



                $wichlist = Database::search("SELECT * FROM `wichlist` INNER JOIN `dress` ON
                     dress.id=wichlist.Dress_id   WHERE `user_email`='" . $email . "'  ORDER BY `date_time` DESC ");




                $wichlist_num = $wichlist->num_rows;


                //    echo($wichlist_num);


                if ($wichlist_num == 0) {

                ?>

                    <div class="col-12 mt-5">
                        <div class="col-12 d-flex justify-content-center mt-lg-5">
                            <div class="row">
                                <div class="col-12 d-flex justify-content-center ">
                                    <img src="./images/icon/wishlist.png" class="d-lg-block d-none" alt="" style="height: 10rem;">
                                    <img src="./images/icon/wishlist.png" class="d-lg-none" alt="" style="height: 6rem;">

                                </div>
                                <div class="col-12 d-flex justify-content-center mt-4 mb-3 opacity-75">
                                    <label for="" class="fs-4 d-lg-block d-none">You have no Dress in your Watchlist yet..</label>
                                    <label for="" class="fs-6 d-lg-none">You have no Dress in your Watchlist yet..</label>

                                </div>

                                <div class="col-12 d-flex justify-content-center mt-5 mb-5 opacity-75">
                                    <div class="col-5 d-grid mb-5 ">
                                        <button class="btn1 p-2" onclick="window.location='home.php'">Strat Shoping</button>

                                    </div>

                                </div>

                            </div>




                        </div>
                    </div>

                <?php
                } else {
                ?>


                    <div class="col-12 p-2 mb-5" id="wichlistviweArea">
                        <!-- <input type="text" onchange="" id="my-input">

                        <button onclick="udsgyh();"> dfhfgh</button> -->
                        <div class="col-12 ">
                            <div class=" owl-carousel  ">


                                <?php


                                for ($x = 0; $x <  $wichlist_num; $x++) {

                                    $wichlist_data = $wichlist->fetch_assoc();
                                    // $dress_data = $derss->fetch_assoc();

                                    $derssSize = Database::search("SELECT * FROM `dress_has_dress_sizes` INNER JOIN `dress_sizes` ON
                                        dress_sizes.id=dress_has_dress_sizes.dress_sizes_id WHERE `Dress_id`='" .  $wichlist_data["id"] . "'");
                                    $derssSize_num = $derssSize->num_rows;

                                    // echo($wichlist_data["Stutus"]);

                                    if ($wichlist_data["Stutus"] == 1) {


                                        if ($derssSize_num > 0) {

                                ?>
                                            <div class=" mb-4  d-flex justify-content-center item">
                                                <div class=" ms-md-3 me-md-3  mt-5    overflow-hidden product  p-0 wichlistproduct " style="width: 20rem; height: 46rem;" onmouseenter="dresSizemsg();">

                                                    <?php

                                                    $arry2 = array();


                                                    // $derssImage = Database::search("SELECT * FROM `drees_image` WHERE `Dress_id`='" .  $wichlist_data["id"] . "'");
                                                    // $derssImage_data = $derssImage->fetch_assoc();

                                                    $DressImage_rs = Database::search("SELECT * FROM `drees_image` WHERE  `Dress_id`='" . $wichlist_data["id"] . "'");

                                                    for ($t = 0; $t < $DressImage_rs->num_rows; $t++) {
                                                        $DressImage_data = $DressImage_rs->fetch_assoc();
                                                        $arry2[$t] =  $DressImage_data["image_path"];
                                                    }



                                                    // echo ($derssImage_num);

                                                    ?>
                                                    <!-- <img src="<?php echo ($derssImage_data["image_path"]) ?>" style="width: 20rem; height: 30rem;" alt=""> -->
                                                    <div class="" id="img1" style="width: 20rem; height: 30rem;">
                                                        <i class="bi bi-x-circle-fill fs-4 mt-1   wichlistremove " style="position: absolute; margin-left:18rem; z-index: 999999;" onclick="removeWichlist('<?php echo ($wichlist_data['wid']) ?>_<?php echo ($wichlist_data['Dress_code']) ?>');"></i>

                                                        <img src="<?php echo ($arry2[0]) ?>" style="width: 20rem; height: 30rem;  " class="position-absolute  dressImge1" alt="">
                                                        <img src="<?php echo ($arry2[1]) ?>" style="width: 20rem; height: 30rem;  " class="position-absolute dressImge2" alt="">

                                                    </div>

                                                    <div class=" card-body ">
                                                        <div class="col-12">
                                                            <div class="row">
                                                                <div class="col-10"><label for="" class="fs-4"><?php echo ($wichlist_data["Dress_code"]) ?></label></div>

                                                            </div>
                                                        </div>



                                                        <?php

                                                        //  Database::search("SELECT * FROM `dress`  WHERE `id`='".$wichlist_data["Dress_code"]."' ");



                                                        ?>



                                                        <div class="col-12 mt-2 pt-2 pb-4">
                                                            <div class="row">





                                                                <?php
                                                                // echo ($derssSize_num);

                                                                $arry = array();

                                                                // $derssSize_data = $derssSize->fetch_assoc();

                                                                for ($y = 0; $y < $derssSize_num; $y++) {

                                                                    $derssSize_data = $derssSize->fetch_assoc();
                                                                    $arry[$y] = $derssSize_data["id"];

                                                                    // echo($arry[$y]);
                                                                }

                                                                $derss_size = Database::search("SELECT * FROM `dress_sizes` ");
                                                                $derss_size_num = $derss_size->num_rows;


                                                                for ($c = 0; $c < $derss_size_num; $c++) {

                                                                    $derss_size_data = $derss_size->fetch_assoc();
                                                                    // $arry[$y]=$derssSize_data["id"];

                                                                    // echo($arry[$y]);


                                                                    $leth = count($arry);


                                                                    // echo($leth);

                                                                    for ($i = 0; $i < $leth; $i++) {
                                                                        if ($derss_size_data["id"] == $arry[$i]) {
                                                                ?>

                                                                            <div class="col-2" onclick="selectSize('<?php echo ($derss_size_data['id']) ?>');">
                                                                                <div class="radio-tile-group">

                                                                                    <div class="input-container">
                                                                                        <input id="walk" type="radio" name="radio">
                                                                                        <div class="radio-tile p-3">
                                                                                            <label for="walk" class="fw-bold"><?php echo ($derss_size_data["sizes_name"]) ?></label>
                                                                                        </div>
                                                                                    </div>



                                                                                </div>
                                                                            </div>

                                                                    <?php

                                                                        }
                                                                    } ?>
                                                                    <!-- <div class="col-2 p-1" onclick="fu();" id="fuck"></div> -->




                                                                <?php
                                                                }
                                                                ?>








                                                            </div>
                                                        </div>
                                                        <div class="col-12  mt-2">
                                                            <label for="" class="fs-5" style="color: #FA948D;">RS:<?php echo ($wichlist_data["price"]) ?>.00</label>

                                                        </div>
                                                        <div class="col-12 mt-3 p-4 d-flex justify-content-center ">
                                                            <div class="col-9 d-flex justify-content-center">
                                                                <!-- <button class="btn3"> -->
                                                                <label for="" class="fs-5 fw-bold " style="cursor: pointer;" onclick="addcartFromWichlist('<?php echo ($wichlist_data['id']) ?>_<?php echo ($email) ?>_<?php echo ($wichlist_data['Dress_code']) ?>');"> Move To <i class="bi bi-handbag-fill fs-4"></i></label>

                                                                <!-- </button> -->
                                                            </div>
                                                        </div>

                                                    </div>

                                                </div>


                                            </div>

                                        <?php
                                        } else {
                                        ?>
                                            <div class=" mb-4  d-flex justify-content-center item opacity-75">
                                                <div class=" ms-md-3 me-md-3  mt-5    overflow-hidden  p-0 wichlistproduct " style="width: 20rem; height: 46rem;" onmouseenter="dresSizemsg();">

                                                    <?php



                                                    $derssImage = Database::search("SELECT * FROM `drees_image` WHERE `Dress_id`='" .  $wichlist_data["id"] . "'");
                                                    $derssImage_data = $derssImage->fetch_assoc();





                                                    // echo ($derssImage_num);

                                                    ?>
                                                    <i class="bi bi-x-circle-fill fs-4 mt-1   wichlistremove " style="position: absolute; margin-left:18rem;" onclick="removeWichlist('<?php echo ($wichlist_data['wid']) ?>_<?php echo ($wichlist_data['Dress_code']) ?>');"></i>

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

                                                    <img src="<?php echo ($derssImage_data["image_path"]) ?>" style="width: 20rem; height: 30rem;" alt="">

                                                    <div class=" card-body ">
                                                        <div class="col-12">
                                                            <div class="row">
                                                                <div class="col-10"><label for="" class="fs-4"><?php echo ($wichlist_data["Dress_code"]) ?></label></div>

                                                            </div>
                                                        </div>

                                                        <?php

                                                        //  Database::search("SELECT * FROM `dress`  WHERE `id`='".$wichlist_data["Dress_code"]."' ");



                                                        ?>



                                                        <div class="col-12 mt-2 pt-2 pb-4">
                                                            <div class="row">













                                                            </div>
                                                        </div>
                                                        <div class="col-12  mt-2">
                                                            <label for="" class="fs-5" style="color: #FA948D;">RS:<?php echo ($wichlist_data["price"]) ?>.00</label>

                                                        </div>
                                                        <div class="col-12 mt-3 p-4 d-flex justify-content-center ">
                                                            <div class="col-9 d-flex justify-content-center">
                                                                <!-- <button class="btn3"> -->
                                                                <label for="" class="fs-5 fw-bold " style="cursor: pointer;"> Move To <i class="bi bi-handbag-fill fs-4"></i></label>

                                                                <!-- </button> -->
                                                            </div>
                                                        </div>

                                                    </div>

                                                </div>


                                            </div>


                                        <?php
                                        }
                                    } else {


                                        ?>

                                        <div class=" mb-4  d-flex justify-content-center item opacity-75">
                                            <div class=" ms-md-3 me-md-3  mt-5    overflow-hidden  p-0 wichlistproduct " style="width: 20rem; height: 46rem;" onmouseenter="dresSizemsg();">

                                                <?php



                                                $derssImage = Database::search("SELECT * FROM `drees_image` WHERE `Dress_id`='" .  $wichlist_data["id"] . "'");
                                                $derssImage_data = $derssImage->fetch_assoc();





                                                // echo ($derssImage_num);

                                                ?>
                                                <i class="bi bi-x-circle-fill fs-4 mt-1   wichlistremove " style="position: absolute; margin-left:18rem;" onclick="removeWichlist('<?php echo ($wichlist_data['wid']) ?>_<?php echo ($wichlist_data['Dress_code']) ?>');"></i>

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
                                                <img src="<?php echo ($derssImage_data["image_path"]) ?>" style="width: 20rem; height: 30rem;" alt="">

                                                <div class=" card-body ">
                                                    <div class="col-12">
                                                        <div class="row">
                                                            <div class="col-10"><label for="" class="fs-4"><?php echo ($wichlist_data["Dress_code"]) ?></label></div>

                                                        </div>
                                                    </div>

                                                    <?php

                                                    //  Database::search("SELECT * FROM `dress`  WHERE `id`='".$wichlist_data["Dress_code"]."' ");



                                                    ?>



                                                    <div class="col-12 mt-2 pt-2 pb-4">
                                                        <div class="row">













                                                        </div>
                                                    </div>
                                                    <div class="col-12  mt-2">
                                                        <label for="" class="fs-5" style="color: #FA948D;">RS:<?php echo ($wichlist_data["price"]) ?>.00</label>

                                                    </div>
                                                    <div class="col-12 mt-3 p-4 d-flex justify-content-center ">
                                                        <div class="col-9 d-flex justify-content-center">
                                                            <!-- <button class="btn3"> -->
                                                            <label for="" class="fs-5 fw-bold " style="cursor: pointer;"> Move To <i class="bi bi-handbag-fill fs-4"></i></label>

                                                            <!-- </button> -->
                                                        </div>
                                                    </div>

                                                </div>

                                            </div>


                                        </div>



                            <?php
                                    }
                                }
                            }


                            ?>


                            <?php


                            // }

                            ?>




                            </div>

                        </div>

                    </div>
                <?php
            } else {


                ?>

                    <div class="col-12 d-flex justify-content-center align-items-center" style="height: 43vh;">
                        <div class="row">
                            <div class='col-12 d-flex justify-content-center align-items-center mt-5'>
                                <h3 class='sebutt'> Sign In Or Sign Up First</h3>
                            </div>



                            <!-- <a href="index.php" class="text-decoration-none signout2"> register/sign in</a> -->
                            <div class="col-12 d-flex justify-content-center align-items-center mt-5 mb-5">
                                <button class="btn btn-danger"> <a href="./signInpage.php" class="text-decoration-none regbut">Register Or Sign In </a></button>
                            </div>
                        </div>
                    </div>





        </div>








    </div>

    </div>



<?php


            }
            include "footer.php"
?>






</div>
</div>










<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
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
                items: 1
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
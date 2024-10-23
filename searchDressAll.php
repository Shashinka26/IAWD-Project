<?php

// echo("jkdhhj");

require "connection.php";

session_start();

if (isset($_SESSION["u"])) {

    $email = $_SESSION["u"]["email"];
}



$json = $_GET["json"];

// echo($json);

$phpTojosn = json_decode($json);
$keyword = $phpTojosn->keyword;

// echo ($keyword);


$Dress_rs = Database::search("SELECT * FROM `dress` WHERE `Dress_code`   LIKE'%" . $keyword . "%' ORDER BY `add_date_time` DESC");

$Dress_num = $Dress_rs->num_rows;
// echo ($Dress_num);

if ($Dress_num > 0) {


?>
    <div class="col-12 p-2 ">
        <div class="col-12 d-flex justify-content-center align-items-center mt-2">

            <div class="col-lg-11 col-md-12 col-12  ">


                <div class="row justify-content-center">
                    <?php


                    if ($Dress_num > 0) {

                        for ($x = 0; $x < $Dress_num; $x++) {

                            $product_data = $Dress_rs->fetch_assoc();
                            // echo ();

                    ?>

                            <?php



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
                                        <div class=" card-body mt-sm-0 mt-0 pt-2">
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
                    }
                    ?>

                </div>
            </div>
        </div>
    </div>

<?php

}else{
    ?>

    <div class="col-12 p-2 ">
        <div class="col-12 d-flex justify-content-center align-items-center mt-2">

            <div class="col-lg-11 col-md-12 col-12  ">


                <div class="row justify-content-end">
                    <div class="col-4 col-lg-1 d-flex justify-content-center">
                        <img src="./images/icon/notfound.png"  class="opacity-75" style="transform: scale(0.2) ;" alt="">
                        
                    </div>
                    <div class="col-6 d-flex align-items-center">
                        <label for="" class="fw-bold text-danger fs-2">Not Found !!</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
   <?php
}
?>
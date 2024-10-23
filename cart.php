<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nevis | Cart</title>
    <link rel="icon" href="./images/heder.icon.png">
    <link rel="stylesheet" href="./bootstrap.css">
    <link rel="stylesheet" href="./style.css">
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>





</head>

<body>


    <div class="container-fluid overflow-hidden p-0" id="cartdeleterelodediv">
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

                <div class="col-12  pt-lg-5 pt-3 mb-3   bg-white">
                    <div class="row justify-content-center">

                        <div class="col-lg-4 col-12 mb-lg-0 mb-4">
                            <div class="col-lg-10 col-12 d-flex justify-content-center align-items-center">
                                <label for="" class="fs-3   fw-bold opacity-75 ">My Cart</label>&nbsp;

                                <i class="bi bi-handbag-fill opacity-75 fs-4 fw-bold pe-2"></i>

                                <!-- <input type="file" name="" id=""> -->
                            </div>


                        </div>
                        <div class="col-4 d-none d-lg-block">

                        </div>
                        <div class="col-lg-4 col-12 d-flex justify-content-center">
                            <div class="col-10">
                                <button style="position: absolute; background-color: transparent;" class="border-0 mt-1">
                                    <img src="./images/icon/search (3).png" style="width: 2rem; height: 2rem;" class="opacity-50" alt="" onclick="searchCart();"></button>
                                <input type="text" class="form-control ps-5 border-1 fw-bold text-black-50" style="border-radius: 15px;" placeholder="Search Item ?" value="NVS " id="CartSerchInput" onkeyup="searchCart();">
                            </div>

                        </div>


                    </div>

                </div>



                <!-- <div class="col-12 mt-5">
                    <div class="col-12 d-flex justify-content-center mt-lg-5">
                        <div class="row">
                            <div class="col-12 d-flex justify-content-center ">
                                <img src="./images/icon/wishlist.png" class="d-lg-block d-none" alt="" style="height: 10rem;">
                                <img src="./images/icon/wishlist.png" class="d-lg-none" alt="" style="height: 6rem;">

                            </div>
                            <div class="col-12 d-flex justify-content-center mt-4 mb-5 opacity-75">
                                <label for="" class="fs-4 d-lg-block d-none">You have no Dress in your Cart yet..</label>
                                <label for="" class="fs-6 d-lg-none">You have no Dress in your Cart yet..</label>

                            </div>

                            <div class="col-12 d-flex justify-content-center mt-4 mb-5 opacity-75">
                                <div class="col-5 d-grid mb-lg-5 ">
                                    <button class="btn1 p-2" onclick="window.location='home.php'">Strat Shoping</button>

                                </div>

                            </div>

                        </div>




                    </div>
                </div> -->

                <?php

                $totalAll = 0;
                // $totalAll2 = 0;
                // $subtotal = 0;
                // $shipping = 0;
                // $clearTotale1 = 0;
                $clearTotale2 = 0;
                // $clearTotale3;





                $cart = Database::search("SELECT cart.cid,cart.date_time,cart.dress_code,cart.date_time,cart.user_email,cart.Dress_id,dress.id,dress.price,
                dress.Dress_code,dress.qty,dress.materiale_id, dress.admin_email,dress.Delevery_fee_Westen,dress.delivery_fee,dress.Stutus,cart_has_dress_sizes.cart_cid,
                cart_has_dress_sizes.dress_sizes_id,cart_has_dress_sizes.csid,dress_sizes.sizes_name,materiale.material_name,
                dress_sizes.id AS dsi,cart_has_dress_sizes.qty AS dsqty,materiale.id AS mid FROM `cart` INNER JOIN `dress` ON
                dress.id=cart.Dress_id INNER JOIN `cart_has_dress_sizes` ON 
                cart_has_dress_sizes.cart_cid=cart.cid INNER JOIN `dress_sizes` ON
                dress_sizes.id=cart_has_dress_sizes.dress_sizes_id INNER JOIN `materiale` ON 
                materiale.id=dress.materiale_id  WHERE  cart.user_email='" . $email . "'   ORDER BY cart.date_time DESC");





                $cart_num = $cart->num_rows;


                if ($cart_num == 0) {


                ?>

                    <div class="col-12 mt-5">
                        <div class="col-12 d-flex justify-content-center mt-lg-5">
                            <div class="row">
                                <div class="col-12 d-flex justify-content-center ">
                                    <img src="./images/icon/wishlist.png" class="d-lg-block d-none" alt="" style="height: 10rem;">
                                    <img src="./images/icon/wishlist.png" class="d-lg-none" alt="" style="height: 6rem;">

                                </div>
                                <div class="col-12 d-flex justify-content-center mt-4 mb-3 opacity-75">
                                    <label for="" class="fs-4 d-lg-block d-none">You have no Dress in your Cart yet..</label>
                                    <label for="" class="fs-6 d-lg-none">You have no Dress in your Cart yet..</label>

                                </div>

                                <div class="col-12 d-flex justify-content-center mt-5 mb-5 opacity-75">
                                    <div class="col-5 d-grid mb-5 ">
                                        <button class="btn1 p-2" onclick="window.location='wichlist.php'">Strat Shoping</button>

                                    </div>

                                </div>

                            </div>




                        </div>
                    </div>
                    <?php
                    include "footer.php"
                    ?>


                <?php
                } else {



                ?>

                    <div class="col-12    ">

                        <div class="row p-3" id="cartviwearea">

                            <?php
                            // echo ($cart_num);



                            for ($x = 0; $x < $cart_num; $x++) {
                                $car_data = $cart->fetch_assoc();



                                // echo ($leth);


                                //    $cart= Database::search("SELECT * FROM `cart` INNER JOIN `dress` ON 
                                //    dress.id=cart.Dress_id AS INNER JOIN ``  WHERE `user_email`='".$email."'");
                                // echo($car_data["dsi"]);

                                if ($car_data["user_email"] == $email) {

                                    $cartdetails = Database::search("SELECT * FROM `dress_has_dress_sizes` WHERE `dress_sizes_id`='" . $car_data["dsi"] . "' AND `Dress_id`='" . $car_data["Dress_id"] . "'");

                                    $cartdetails_num = $cartdetails->num_rows;

                                    $satatus = Database::search("SELECT * FROM `dress` INNER JOIN `cart` ON
                              cart.Dress_id=dress.id INNER JOIN `cart_has_dress_sizes` ON
                              cart_has_dress_sizes.cart_cid =cart.cid WHERE `Stutus`='0' AND `user_email`='" . $email . "'");
                                    $satatus_num = $satatus->num_rows;


                                    // echo ($satatus_num);
                                }


                            ?>



                                <div class="col-lg-6 col-12 mt-3 mb-3  d-lg-block d-none  " style="background-color: transparent;">
                                    <div class="row  ">



                                        <div class="overflow-hidden" style="width: 20rem; height: 30rem ;  ">
                                            <?php

                                            // Database::search("SELECT * FROM `dress` INNER JOIN `cart` WHERE ``")

                                            $dress_image = Database::search("SELECT * FROM `drees_image` WHERE `Dress_id`='" . $car_data["id"] . "'");
                                            $dress_image_data = $dress_image->fetch_assoc();
                                            // echo($car_data["cid"]);




                                            if ($car_data["Stutus"] == 1) {

                                                if ($cartdetails_num > 0) {




                                            ?>

                                                    <img src="<?php echo ($dress_image_data["image_path"]) ?>" class="" style="width: 20rem; height: 30rem;" alt="">

                                                <?php
                                                } else {
                                                    Database::includ("DELETE FROM  `cart_has_dress_sizes` WHERE `cart_cid`='" . $car_data["cid"] . "' ");
                                                    Database::includ("DELETE FROM  `cart` WHERE `cid`='" . $car_data["cid"] . "' ");
                                                }
                                            } else   if ($car_data["Stutus"] == 0) {

                                                // echo ($cart_num);


                                                // for ($y = 0; $y < $satatus_num; $y++) {
                                                //     # code...

                                                //     $satatus_data = $satatus->fetch_assoc();
                                                //     $qty1 = $satatus_data["qty"];

                                                //     // $clearTotale2 = $car_data["price"] * $qty1;

                                                //     // echo ($qty1);

                                                //     // echo ($satatus_data["price"]);
                                                //     // $clearTotale2 = (($satatus_data["price"] * $qty1)+$clearTotale2);


                                                // }






                                                // echo ($clearTotale2);



                                                ?>
                                                <img src="<?php echo ($dress_image_data["image_path"]) ?>" class="opacity-75" style="width: 20rem; height: 30rem;" alt="">

                                            <?php

                                            }

                                            // echo ($clearTotale);
                                            // echo ($clearTotale1);




                                            ?>

                                        </div>
                                        <div class="col border-end border-bottom border-top overflow-hidden border-2">
                                            <div class="row">
                                                <div class="col-12  pt-3 ">
                                                    <div class="row">
                                                        <div class="col-11 d-flex justify-content-center">
                                                            <label for="" class="fs-4 fw-bold opacity-75"><?php echo ($car_data["Dress_code"]) ?></label>

                                                        </div>
                                                        <div class="col-1 recycale" onclick="removeCart('<?php echo ($car_data['cid']) ?>');">
                                                            <i class="bi bi-trash3 fs-5 fw-bold "></i>

                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="col-8 mt-4  ">

                                                    <div class="col-12 mt-2 pt-3 ">
                                                        <label for="" class="fs-6 fw-bold opacity-75">Material - </label>&nbsp;<label for="" class="fw-bold "><?php echo ($car_data["material_name"]) ?></label>
                                                    </div>


                                                    <div class="col-12  pt-3 ">
                                                        <?php

                                                        $dressSizeqq = Database::search("SELECT * FROM `dress_has_dress_sizes` WHERE `Dress_id`='" . $car_data["id"] . "'AND `dress_sizes_id`='" . $car_data["dsi"] . "' ");
                                                        $dressSizeqq_data = $dressSizeqq->fetch_assoc();
                                                        $dressSizeqq_num = $dressSizeqq->num_rows;

                                                        if ($dressSizeqq_num == 0) {
                                                        ?>
                                                            <label for="" class="fs-6 fw-bold opacity-75">Avalbale Qty - </label>&nbsp;<label for="" class="fw-bold ">0</label>

                                                        <?php
                                                        } else if ($car_data["Stutus"] == 0) {
                                                        ?>
                                                            <label for="" class="fs-6 fw-bold opacity-75">Avalbale Qty - </label>&nbsp;<label for="" class="fw-bold ">0</label>

                                                        <?php
                                                        } else {



                                                        ?>
                                                            <label for="" class="fs-6 fw-bold opacity-75">Avalbale Qty - </label>&nbsp;<label for="" class="fw-bold "><?php echo ($dressSizeqq_data["Dressqty"]) ?></label>

                                                        <?php
                                                        }
                                                        ?>
                                                    </div>
                                                    <div class="col-12  pt-3 ">
                                                        <label for="" class="fs-6 fw-bold opacity-75">Satatus - </label>&nbsp;<label for=""><?php if ($car_data["Stutus"] == 1) {
                                                                                                                                                if ($cartdetails_num > 0) {

                                                                                                                                            ?>
                                                                    <label for="" class="text-success opacity-75 fw-bold">
                                                                        In Stock </label>
                                                                <?php
                                                                                                                                                } else {
                                                                ?>
                                                                    <label for="" class="text-danger fw-bold opacity-75">Out of Stock</label>

                                                                <?php
                                                                                                                                                }
                                                                                                                                            } else if ($car_data["Stutus"] == 0) {
                                                                ?>
                                                                <label for="" class="text-danger fw-bold opacity-75">Out of Stock</label>
                                                            <?php
                                                                                                                                            } ?></label>
                                                    </div>
                                                    <div class="col-12  pt-3 ">
                                                        <label for="" class="fs-6 fw-bold opacity-75">Cost - </label>

                                                        <label for="" class="fw-bold ">Rs.<?php echo ($car_data["price"]) ?>.00</label>
                                                    </div>
                                                    <div class="col-12  pt-3 ">
                                                        <div class="row">
                                                            <?php

                                                            // Database::search("SELECT * FROM ``")

                                                            ?>
                                                            <div class="col-2">
                                                                <label for="" class="fs-6 fw-bold  opacity-75">Sizes- </label>

                                                            </div>
                                                            <div class="col-10 d-flex ju">
                                                                <div class="col-1 pt-1 pb-1 pe-4 ps-4 border border-1 d-flex justify-content-center">
                                                                    <!-- <select name="" class="form-control" id="">
                                                                    <option value="0">3XL</option>
                                                                    <option value="0">2XL</option>
                                                                    <option value="0">XL</option>

                                                                </select> -->

                                                                    <label for="" class="fw-bold " id="sj"><?php echo ($car_data["sizes_name"]) ?></label>

                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="col-4 mt-4  d-flex justify-content-center align-items-center">
                                                    <div class="row">

                                                        <div class="col-12">
                                                            <label for="" class="fw-bold opacity-75">Qty</label>
                                                            <div class="col-10 mt-2">
                                                                <div class="row">

                                                                    <!-- <input type="number">  -->


                                                                    <div class="col-4 d-flex justify-content-end align-items-center">
                                                                        <button class="p-2 h-50 d-flex justify-content-center align-items-center btn1" id="decrement<?php echo $car_data["cid"] ?>" onclick='qty_inc(<?php echo ($dressSizeqq_data["Dressqty"]) ?>,<?php echo $car_data["cid"] ?>);' style="border-radius: 2px;">
                                                                            <i class="bi bi-plus"></i>

                                                                        </button>

                                                                    </div>
                                                                    <div class="col-4 p-0">
                                                                        <input type="text" class="border fs-5 fw-bold text-center w-100" style="outline: none;" pattern="[0-9]" value="<?php echo ($car_data["dsqty"]) ?>" id="qty_input<?php echo $car_data["cid"] ?>" onkeyup='CheckValue(<?php echo ($car_data["cid"]) ?>);' />
                                                                        <input type="text" value="<?php echo $car_data["user_email"] ?>" class="d-none" id="usr_email<?php echo $car_data["cid"] ?>">
                                                                    </div>
                                                                    <div class="col-4 d-flex justify-content-start align-items-center">
                                                                        <button class="p-2 h-50 d-flex justify-content-center align-items-center btn1" id="increment<?php echo $car_data["cid"] ?>" onclick='qty_dec(<?php echo $car_data["cid"] ?>);' style="border-radius: 2px;">
                                                                            <i class="bi bi-dash"></i>

                                                                        </button>

                                                                    </div>

                                                                    <!-- <button class="" onclick="udsgyh()">sdaas</button> -->



                                                                </div>
                                                            </div>

                                                        </div>


                                                    </div>


                                                </div>

                                                <div class="col-12 p-2 ">
                                                    <div class="col-12 d-flex justify-content-end" style=" cursor: pointer;">
                                                        <label for="" class="fw-bold " onclick="cart();">Buy Dress</label>
                                                        <i class="bi bi-arrow-right-short fw-bold fs-5"></i>
                                                    </div>
                                                </div>

                                                <hr>

                                                <div class="col-12">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <label for="" class="fw-bold opacity-75">Items</label>:&nbsp;<label for="" class="fw-bold opacity-75"><?php echo ($car_data["dsqty"]) ?></label>
                                                            <div class="col-12 mt-5">
                                                                <?php

                                                                $date = strtotime($car_data["date_time"]);
                                                                $data_data = date('Y:m:d', $date)


                                                                ?>
                                                                <label for="" class="fs-6 fw-bold opacity-50"><?php echo ($data_data) ?></label>
                                                            </div>
                                                        </div>
                                                        <div class="col-6 d-flex justify-content-end ">
                                                            <div class="row">

                                                                <?php



                                                                $totle;

                                                                $qty = $car_data["dsqty"];

                                                                $totle = $car_data["price"] * $qty;







                                                                ?>
                                                                <label for="" class="fw-bold opacity-75">Total</label>
                                                                <div class="col-12 mt-2 d-flex justify-content-end ">
                                                                    <label for="" class="fs-5 fw-bold opacity-50">Rs&nbsp;<?php echo ($totle) ?>.00</label>
                                                                </div>
                                                            </div>

                                                        </div>


                                                    </div>
                                                </div>



                                            </div>

                                        </div>


                                    </div>
                                </div>


                                <div class="col-12 d-lg-none mb-4 mt-4">
                                    <div class="col-12 d-flex justify-content-center">
                                        <div class="row justify-content-center">

                                            <div class="col-11 border-end border-start border-top border-2 pt-1 d-flex justify-content-end">
                                                <div class="col-2 recycale d-flex justify-content-end" onclick="">
                                                    <i class="bi bi-trash3 fs-5 fw-bold " onclick="removeCart('<?php echo ($car_data['cid']) ?>');"></i>

                                                </div>
                                            </div>

                                            <div class="col-11 d-flex justify-content-center border-end border-start  border-2 ">
                                                <?php
                                                if ($car_data["Stutus"] == 1) {

                                                    if ($cartdetails_num > 0) {


                                                ?>

                                                        <img src="<?php echo ($dress_image_data["image_path"]) ?>" class="" style="width: 20rem; height: 30rem;" alt="">

                                                    <?php
                                                    } else {
                                                        Database::includ("DELETE FROM  `cart_has_dress_sizes` WHERE `cart_cid`='" . $car_data["cid"] . "' ");
                                                        Database::includ("DELETE FROM  `cart` WHERE `cid`='" . $car_data["cid"] . "' ");
                                                    }
                                                } else   if ($car_data["Stutus"] == 0) {





                                                    ?>
                                                    <img src="<?php echo ($dress_image_data["image_path"]) ?>" class="opacity-75" style="width: 13rem; height: 18rem;" alt="">

                                                <?php
                                                }

                                                ?>
                                                <!-- <img src="./images/dress/drees2.jpeg" class=" " " alt=""> -->

                                            </div>

                                            <div class="col-11 border-end border-bottom border-start overflow-hidden border-2">
                                                <div class="row">
                                                    <div class="col-12  pt-3 ">
                                                        <div class="row">
                                                            <div class="col-10 ">
                                                                <label for="" class="fs-4 fw-bold opacity-75"><?php echo ($car_data["Dress_code"]) ?></label>

                                                            </div>

                                                        </div>

                                                    </div>
                                                    <div class="col-8 mt-1 mb-2 ">

                                                        <div class="col-12 mt-2 pt-3 ">
                                                            <label for="" class="fs-6 fw-bold opacity-75">Material - </label>&nbsp;<label for="" class="fw-bold "><?php echo ($car_data["material_name"]) ?></label>
                                                        </div>

                                                        <div class="col-12  pt-3 ">
                                                            <?php

                                                            $dressSizeqq = Database::search("SELECT * FROM `dress_has_dress_sizes` WHERE `Dress_id`='" . $car_data["id"] . "'AND `dress_sizes_id`='" . $car_data["dsi"] . "' ");
                                                            $dressSizeqq_data = $dressSizeqq->fetch_assoc();
                                                            $dressSizeqq_num = $dressSizeqq->num_rows;

                                                            if ($dressSizeqq_num == 0) {
                                                            ?>
                                                                <label for="" class="fs-6 fw-bold opacity-75">Avalbale Qty - </label>&nbsp;<label for="" class="fw-bold ">0</label>

                                                            <?php
                                                            } else if ($car_data["Stutus"] == 0) {
                                                            ?>
                                                                <label for="" class="fs-6 fw-bold opacity-75">Avalbale Qty - </label>&nbsp;<label for="" class="fw-bold ">0</label>

                                                            <?php
                                                            } else {



                                                            ?>
                                                                <label for="" class="fs-6 fw-bold opacity-75">Avalbale Qty - </label>&nbsp;<label for="" class="fw-bold "><?php echo ($dressSizeqq_data["Dressqty"]) ?></label>

                                                            <?php
                                                            }
                                                            ?>
                                                        </div>

                                                        <div class="col-12  pt-3 ">
                                                            <label for="" class="fs-6 fw-bold opacity-75">Satatus - </label>&nbsp;<label for=""><?php if ($car_data["Stutus"] == 1) {
                                                                                                                                                    if ($cartdetails_num > 0) {

                                                                                                                                                ?>
                                                                        <label for="" class="text-success opacity-75 fw-bold">
                                                                            In Stock </label>
                                                                    <?php
                                                                                                                                                    } else {
                                                                    ?>
                                                                        <label for="" class="text-danger fw-bold opacity-75">Out of Stock</label>

                                                                    <?php
                                                                                                                                                    }
                                                                                                                                                } else if ($car_data["Stutus"] == 0) {
                                                                    ?>
                                                                    <label for="" class="text-danger fw-bold opacity-75">Out of Stock</label>
                                                                <?php
                                                                                                                                                } ?></label>
                                                        </div>

                                                        <div class="col-12  pt-3 ">
                                                            <label for="" class="fs-6 fw-bold opacity-75">Cost - </label>

                                                            <label for="" class="fw-bold ">Rs.<?php echo ($car_data["price"]) ?>.00</label>

                                                        </div>
                                                        <div class="col-12  pt-3 ">
                                                            <div class="row">
                                                                <div class="col-3">
                                                                    <label for="" class="fs-6 fw-bold opacity-75">Sizes- </label>

                                                                </div>
                                                                <div class="col-9 d-flex ju">
                                                                    <div class="col-1 pt-1 pb-1 pe-4 ps-4 border border-1 d-flex justify-content-center">
                                                                        <!-- <select name="" class="form-control" id="">
                                                                    <option value="0">3XL</option>
                                                                    <option value="0">2XL</option>
                                                                    <option value="0">XL</option>

                                                                </select> -->

                                                                        <label for="" class="fw-bold "><?php echo ($car_data["sizes_name"]) ?></label>

                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="col-4 mt-4 mb-5 d-flex justify-content-center align-items-center">
                                                        <div class="col-12  ">
                                                            <label for="" class="fw-bold opacity-75">Qty</label>
                                                            <div class="col-12 d-flex justify-content-center align-items-center">
                                                                <button class="p-1 h-50 d-flex justify-content-center align-items-center btn1" id="decrement" onclick='qty_inc(<?php echo ($car_data["qty"]) ?>);' style="border-radius: 2px;">
                                                                    <i class="bi bi-plus"></i>

                                                                </button>

                                                            </div>
                                                            <div class="col-8 p-0 mt-2 ps-4">
                                                                <input type="text" class="input-group border fs-5 fw-bold text-center w-100 active" style="outline: none;" pattern="[0-9]" value="<?php echo ($car_data["dsqty"]) ?>" id="qty_input" onkeyup='CheckValue(<?php echo ($car_data["qty"]) ?>);' />

                                                            </div>
                                                            <div class="col-12 d-flex justify-content-center align-items-center mt-2">
                                                                <button class="p-1 h-50 d-flex justify-content-center align-items-center btn1" id="increment" onclick="qty_dec();" style="border-radius: 2px;">
                                                                    <i class="bi bi-dash"></i>

                                                                </button>

                                                            </div>

                                                        </div>

                                                    </div>

                                                    <hr>

                                                    <div class="col-12">
                                                        <div class="row">
                                                            <div class="col-6">
                                                                <label for="" class="fw-bold opacity-75">Items</label>:&nbsp;<label for="" class="fw-bold opacity-75"><?php echo ($car_data["dsqty"]) ?></label>

                                                                <div class="col-12 mt-2">
                                                                    <label for="" class="fs-6 fw-bold opacity-50"><?php echo ($data_data) ?></label>
                                                                </div>
                                                            </div>

                                                            <div class="col-6 d-flex justify-content-end ">
                                                                <div class="row">
                                                                    <label for="" class="fw-bold opacity-75">Total</label>
                                                                    <div class="col-12 mt-2 d-flex justify-content-end ">
                                                                        <label for="" class="fs-5 fw-bold opacity-50">Rs&nbsp;<?php echo ($totle) ?>.00</label>

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



                                $totalAll = ($totalAll) + ($car_data["price"]
                                    * $car_data["dsqty"]);


                                ?>
                            <?php

                            }





                            ?>


                        </div>

                    </div>
        </div>
        <?php
                    $satatus2_data_data = 0;
                    $satatus2_qty = 0;
                    $satatus2 = Database::search("SELECT * FROM `dress` INNER JOIN `cart` ON
                cart.Dress_id=dress.id INNER JOIN `cart_has_dress_sizes` ON
                cart_has_dress_sizes.cart_cid =cart.cid WHERE `Stutus`='1' AND `user_email`='" . $email . "'");
                    $satatus2_num = $satatus2->num_rows;
                    //   echo();

                    for ($r = 0; $r < $satatus2_num; $r++) {
                        # code...
                        $satatus2_data = $satatus2->fetch_assoc();


                        $satatus2_data_data = ($satatus2_data["price"] * $satatus2_data["qty"]) + $satatus2_data_data;
                        $satatus2_qty = $satatus2_data["qty"] + $satatus2_qty;
                    }
        ?>

        <div class="col-12 fixed-bottom bg-white pt-2 ps-2 pe-2 " id="carttogal1">
            <div class="row">
                <div class="col-10 col-lg-6 d-flex ps-4">
                    <label for="" class="fw-bold fs-5 opacity-75">Cart Totals List <span></span>&nbsp;(Click <i class="bi bi-chevron-double-up fs-5"></i>)
                    </label>
                </div>
                <div class="col-2 col-lg-6  d-flex justify-content-end pe-4">
                    <i class="bi bi-chevron-double-up fs-3" onclick="carttogel();" style="cursor: pointer;"></i>

                </div>

            </div>
        </div>

        <div class="col-12 fixed-bottom d-none position-fixed bg-white" id="carttogal2">
            <div class="col-12 ">
                <div class="row" id="cartdeliverydiv">
                    <div class="col-12">
                        <div class="col-12 d-flex justify-content-end pe-4">
                            <label for="">
                                <i class="bi bi-chevron-double-down fs-3" onclick="carttogel();" style="cursor: pointer;"></i>
                            </label>
                        </div>
                    </div>
                    <div class="col-12 col-lg-2 mt-2 border-end border-2">
                        <div class="row">
                            <div class="col-lg-12 col-6 d-flex justify-content-center align-items-center">
                                <label for="" class="fs-4 fw-bold opacity-75 d-none d-lg-block">Dress</label>
                                <label for="" class="fs-6 fw-bold opacity-75 d-lg-none">Dress</label>

                            </div>
                            <div class="col-lg-12 col-6 mt-2 d-flex justify-content-center align-items-center">
                                <?php

                                $items = $cart_num - $satatus_num
                                ?>

                                <label for="" class="fs-6 fw-bold opacity-50"><?php echo ($items) ?>(Item:<?php echo ($satatus2_qty) ?>)</label>
                            </div>
                        </div>

                    </div>
                    <?php
                    // echo ($totle)
                    ?>
                    <div class="col-12 col-lg-3 mt-2 border-end border-2">
                        <div class="row">

                            <div class="col-lg-12 col-6 d-flex justify-content-center align-items-center">
                                <label for="" class="fs-4 fw-bold opacity-75 d-none d-lg-block">Subtotal</label>
                                <label for="" class="fs-6 fw-bold opacity-75  d-lg-none">Subtotal</label>
                            </div>
                            <div class="col-lg-12 col-6 mt-2 d-flex justify-content-center align-items-center">
                                <?php

                                // if($car_data[""])
                                // $clearTotale3 = $clearTotale1 + $clearTotale2;
                                // echo ($clearTotale3);
                                // echo ($clearTotale2);

                                // $totalAll2 = $totalAll - $clearTotale2;
                                // echo($totalAll2);



                                $user_adress = Database::search("SELECT * FROM `buydress_has_city1` INNER JOIN `city` ON
                                city.id=buydress_has_city1.city_id INNER JOIN `district` ON 
                                district.id=city.district_id INNER JOIN `province` ON 
                                province.id=district.province_id WHERE `user_email`='" . $email . "'");
                                $user_adress_num = $user_adress->num_rows;
                                $user_adress_data = $user_adress->fetch_assoc()



                                ?>
                                <label for="" class="fs-6 fw-bold opacity-50">Rs.&nbsp; <?php echo ($satatus2_data_data) ?>.00</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-3 mt-2 border-end border-2">
                        <div class="row">

                            <div class="col-lg-12 col-6 d-flex justify-content-center align-items-center">
                                <label for="" class="fs-4 fw-bold opacity-75 d-none d-lg-block">Delevery Cost </label>

                                <div class="col-12 d-lg-none">
                                    <div class="row justify-content-center">
                                        <div class="col-12 d-flex justify-content-center">
                                            <label for="" class="fs-6 fw-bold opacity-75  d-lg-none">Delevery Cost</label>

                                        </div>
                                        <div class="col-12 d-flex justify-content-center d-lg-none">
                                            <?php
                                            if ($user_adress_num > 0) {
                                            ?>
                                                (&nbsp;<?php echo ($user_adress_data["city_name"]) ?> &nbsp;)

                                            <?php
                                            }
                                            ?>

                                        </div>

                                    </div>
                                </div>

                            </div>
                            <div class="col-lg-12 col-6 mt-1 d-flex justify-content-center align-items-center">


                                <?php


                                //    echo($user_adress_num);
                                if ($user_adress_num > 0) {



                                    if ($user_adress_data["id"] == 1) {
                                        $Dress_cost = Database::search("SELECT MAX(`Delevery_fee_Westen`) AS LargestPrice  FROM `dress` INNER JOIN `cart` ON 
                                        cart.Dress_id=dress.id WHERE `user_email`='" . $email . "' ");
                                        $Dress_cost_data = $Dress_cost->fetch_assoc();
                                        $Dress_cost_num = $Dress_cost->num_rows;


                                        // echo ($Dress_cost_num);


                                        // echo ($user_adress_data["city_name"]);
                                ?>
                                        <div class="col-12">
                                            <div class="row justify-content-center">
                                                <div class="col-12 d-flex justify-content-center ">
                                                    <label for="" class="fw-bold  opacity-50">RS.<?php echo ($Dress_cost_data["LargestPrice"]) ?>.00</label>&nbsp;&nbsp;

                                                </div>
                                                <div class="col-12">

                                                    <div class="row">
                                                        <div class="col-12 col-lg-6 d-flex justify-content-center d-lg-block d-none">
                                                            <label for="" class="fw-bold opacity-75">(&nbsp;<?php echo ($user_adress_data["city_name"]) ?> &nbsp;) </label>

                                                        </div>
                                                        <div class="col-12 col-lg-6 d-flex justify-content-center">
                                                            <label for="" class=" text-primary   opacity-75" style=" cursor: pointer;" onclick="addDiliveryadress()">Change Adress <i class="bi bi-truck fs-5 mt-2"></i></label>

                                                        </div>


                                                    </div>
                                                </div>


                                            </div>

                                        </div>

                                    <?php


                                    } else {
                                        $Dress_cost2 = Database::search("SELECT MAX(`delivery_fee`) AS LargestPriceDely  FROM `dress` INNER JOIN `cart` ON 
                                        cart.Dress_id=dress.id WHERE `user_email`='" . $email . "' ");
                                        $Dress_cost_data2 = $Dress_cost2->fetch_assoc();
                                        $Dress_cost_num2 = $Dress_cost2->num_rows;

                                    ?>

                                        <div class="col-12">
                                            <div class="row justify-content-center">
                                                <div class="col-12 d-flex justify-content-center ">
                                                    <label for="" class="fw-bold  opacity-50">RS.<?php echo ($Dress_cost_data2["LargestPriceDely"]) ?>.00</label>&nbsp;&nbsp;

                                                </div>
                                                <div class="col-12">
                                                    <div class="row">
                                                        <div class="col-12 col-lg-6 d-flex justify-content-center d-lg-block d-none ">
                                                            <label for="" class="fw-bold opacity-75">(&nbsp;<?php echo ($user_adress_data["city_name"]) ?> &nbsp;) </label>

                                                        </div>
                                                        <div class="col-12 col-lg-6 d-flex justify-content-center">
                                                            <label for="" class=" text-primary  opacity-75" style=" cursor: pointer;" onclick="addDiliveryadress()">Change Adress <i class="bi bi-truck fs-5 mt-2"></i></label>

                                                        </div>


                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                    <?php

                                    }
                                } else {
                                    ?>
                                    <div class="col-12 mt-1 d-flex justify-content-center " onclick="addDiliveryadress()">
                                        <label for="" class="fw-bold diliverycart  opacity-75">Add Adress <i class="bi bi-truck fs-5 mt-2"></i></label>

                                    </div>
                                <?php
                                }


                                ?>
                                <!-- <label for="" class="fs-6 fw-bold opacity-50">Rs.&nbsp;4000.00</label> -->
                            </div>
                        </div>

                    </div>
                    <div class="col-12 col-lg-2 col-2 mt-2 ">
                        <div class="row">

                            <div class="col-lg-12 col-6 d-flex justify-content-center align-items-center">
                                <label for="" class="fs-4 fw-bold opacity-75 d-none d-lg-block">Total</label>
                                <label for="" class="fs-6 fw-bold opacity-75  d-lg-none">Total</label>
                            </div>
                            <div class="col-lg-12 col-6 mt-2 d-flex justify-content-end pe-5 pe-lg-3 align-items-center">
                                <?php



                                if ($user_adress_num > 0) {

                                    if ($user_adress_data["id"] == 1) {
                                        $totleall1 = $Dress_cost_data["LargestPrice"] + $satatus2_data_data;
                                ?>
                                        <label for="" class="fs-5 fw-bold opacity-50">Rs.&nbsp;<?php echo ($totleall1) ?>.00</label>

                                    <?php


                                    } else {
                                        $totleall2 = $Dress_cost_data2["LargestPriceDely"] + $satatus2_data_data;
                                    ?>
                                        <label for="" class="fs-5 fw-bold opacity-50">Rs.&nbsp;<?php echo ($totleall2) ?>.00</label>

                                    <?php
                                    }



                                    ?>



                                <?php
                                } else {
                                ?>
                                    <label for="" class="fs-5 fw-bold opacity-50">Rs.&nbsp;<?php echo ($satatus2_data_data) ?>.00</label>

                                <?php
                                }

                                ?>

                            </div>
                            <div class="col-lg-12 col-12 pe-5 pe-lg-3  mt-1 d-flex justify-content-end align-items-center ">
                                <div class="col-4 col-lg-6 border-top border-bottom border-3 pt-1">
                                </div>

                            </div>
                        </div>
                    </div>
                    <?php


                    $buydress_has_city_rs = Database::search("SELECT * FROM `buydress_has_city1` WHERE `user_email`='" . $email . "'");
                    $buydress_has_city_num = $buydress_has_city_rs->num_rows;

                    ?>
                    <div class="col-12 col-lg-2 mb-4 mb-lg-2 mt-4 mt-lg-2 border-end border-2 d-flex justify-content-center align-items-center">
                        <div class="col-12 d-flex justify-content-center align-items-center">
                            <label for="formsubmit" class="btn1 p-2 pe-3c ps-3">Check Out &nbsp;&nbsp;<i class="bi bi-chevron-double-right"></i>

                            </label>
                            <form action="Bill.php" method="post" class="d-none">
                                <input type="text " name="user" value="<?= $email ?>">
                                <input type="text " name="subtotal" value="<?= $satatus2_data_data ?>">
                                <input type="text " name="items" value="<?= $satatus2_qty ?>">
                                <?php
                                if ($user_adress_num > 0) {

                                    if ($user_adress_data["id"] == 1) {
                                ?>
                                        <input type="text " name="delivery" value=" <?php echo ($Dress_cost_data["LargestPrice"]) ?>">
                                        <input type="text " name="cityname" value="  <?php echo ($user_adress_data["city_name"]) ?>">
                                        <?php

                                        if ($buydress_has_city_num > 0) {
                                            $buydress_has_city_data = $buydress_has_city_rs->fetch_assoc();

                                        ?>
                                            <input type="text " name="post_code" value="<?php echo ($buydress_has_city_data["Postcode"]) ?>">
                                        <?php
                                        } else {
                                        ?>
                                            <input type="text " name="post_code" value="">

                                        <?php
                                        }
                                        ?>


                                    <?php
                                    } else {
                                    ?>

                                        <input type="text " name="delivery" value="<?php echo ($Dress_cost_data2["LargestPriceDely"]) ?>">
                                        <input type="text " name="cityname" value="  <?php echo ($user_adress_data["city_name"]) ?>">
                                        <?php

                                        if ($buydress_has_city_num > 0) {
                                            $buydress_has_city_data = $buydress_has_city_rs->fetch_assoc();

                                        ?>
                                            <input type="text " name="post_code" value="<?php echo ($buydress_has_city_data["Postcode"]) ?>">
                                        <?php
                                        } else {
                                        ?>
                                            <input type="text " name="post_code" value="">

                                        <?php
                                        }
                                        ?>
                                    <?php
                                    }
                                } else {
                                    ?>
                                    <input type="text " name="delivery" value="0">
                                    <input type="text " name="cityname" value="">
                                    <input type="text " name=" post_code_cart" value="">


                                <?php
                                }
                                ?>


                                <?php



                                if ($user_adress_num > 0) {

                                    if ($user_adress_data["id"] == 1) {
                                        $totleall1 = $Dress_cost_data["LargestPrice"] + $satatus2_data_data;
                                ?>
                                        <input type="text " name="total" value="<?php echo ($totleall1) ?>">


                                    <?php


                                    } else {
                                        $totleall2 = $Dress_cost_data2["LargestPriceDely"] + $satatus2_data_data;
                                    ?>
                                        <input type="text " name="total" value="<?php echo ($totleall2) ?>">


                                    <?php
                                    }



                                    ?>



                                <?php
                                } else {
                                ?>
                                    <input type="text " name="total" value="<?php echo ($satatus2_data_data) ?>">

                                <?php
                                }

                                ?>

                                <button type="submit" id='formsubmit'></button>
                            </form>

                        </div>

                    </div>
                </div>


            </div>
        </div>


        <!-- model 2 -->



        <div class="modal fade" id="deleveryadress" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog d-flex justify-content-center align-items-center">
                <div class="modal-content w-75 " style="border-radius: 2px; ">
                    <div class=" col-12 d-flex justify-content-center mt-5">
                        <div class="col-10">
                            <div class="row">
                                <div class="col-10  ps-4 pb-4">
                                    <label for="" class="form-label fw-bold fs-5">Add Adress</label>

                                </div>




                            </div>


                            <div class="col-12 ">
                                <label for="" class="p-1"> City</label>
                                <input type="text" class="form-control opacity-75 fw-bold bg-white " id="districinput" onkeyup="addDistric();">

                            </div>

                            <div class="col-12 mt-2 adddeliverydiv p-4" id="addDictict">
                                <?php

                                $distric = Database::search("SELECT * FROM `city`");
                                $distric_num = $distric->num_rows;

                                for ($c = 0; $c <  $distric_num; $c++) {

                                    $distric_data = $distric->fetch_assoc();
                                ?>

                                    <div class="col-12 ps-2 mt-2 mb-2 border-bottom border-top border-1 d-flex justify-content-center" style=" cursor: pointer;" onclick="selectdistric('<?php echo ($distric_data['city_name']) ?>');">

                                        <label for="" style=" cursor: pointer;"><?php echo ($distric_data["city_name"]) ?></label>
                                    </div>

                                <?php
                                }

                                ?>






                            </div>

                            <div class="col-12 mt-3 mb-3">
                                <label for="" class="p-1"> Postel Code</label>

                                <input type="text" class="form-control opacity-75 fw-bold bg-white " id="pcode">


                            </div>



                            <div class="row justify-content-center">




                                <div class="col-6 mt-3 d-flex justify-content-center align-items-center ">
                                    <div class="col-11 d-grid" style="border-radius: 10px;">
                                        <!-- <div class="form-check"> -->


                                    </div>

                                </div>


                                <?php



                                ?>




                            </div>

                            <div class="col-12 p-2 mb-3">
                                <div class="row">
                                    <div class="col-6  d-flex justify-content-center align-items-center">
                                        <div class="col-8 d-grid">
                                            <button type="button" class="btn1 p-2 btn-danger" data-bs-dismiss="modal">Cancel</button>

                                        </div>

                                    </div>
                                    <div class="col-6  d-flex justify-content-center align-items-center">
                                        <div class="col-8 d-grid">
                                            <button type="button" class="btn1 p-2" onclick="addAdress();">Add</button>

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
                }

    ?>
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
    <?php

                include "footer.php"



    ?>









    </div>

    </div>



<?php


            }
?>

<script src="./bootstrap.bundle.js"></script>
<script src="./bootstrap.jss"></script>
<script src="./script.js"></script>
<script src="./selectqty.js"></script>
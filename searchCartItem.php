<?php
require "connection.php";
session_start();

$email = $_SESSION["u"]["email"];

$josn = $_GET["json"];

// echo($josn);

$jsonToobj = json_decode($josn);
$inpukeyword = $jsonToobj->keyword;

$cart = Database::search("SELECT cart.cid,cart.date_time,cart.dress_code,cart.date_time,cart.user_email,cart.Dress_id,dress.id,dress.price,
dress.Dress_code,dress.qty,dress.materiale_id, dress.admin_email,dress.Delevery_fee_Westen,dress.delivery_fee,dress.Stutus,cart_has_dress_sizes.cart_cid,
cart_has_dress_sizes.dress_sizes_id,cart_has_dress_sizes.csid,dress_sizes.sizes_name,materiale.material_name,
dress_sizes.id AS dsi,cart_has_dress_sizes.qty AS dsqty,materiale.id AS mid FROM `cart` INNER JOIN `dress` ON
dress.id=cart.Dress_id INNER JOIN `cart_has_dress_sizes` ON 
cart_has_dress_sizes.cart_cid=cart.cid INNER JOIN `dress_sizes` ON
dress_sizes.id=cart_has_dress_sizes.dress_sizes_id INNER JOIN `materiale` ON 
materiale.id=dress.materiale_id  WHERE cart.dress_code LIKE'%" . $inpukeyword . "%'  AND cart.user_email='" . $email . "'   ORDER BY cart.date_time DESC");


$cart_num = $cart->num_rows;

// echo ($cart_num);

if ($cart_num > 0) {

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
                                <label for="" class="fs-6 fw-bold opacity-75">Avalbale Qty - </label>&nbsp;<label for="" class="fw-bold "><?php echo ($car_data["qty"]) ?></label>
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
                                                <button class="p-2 h-50 d-flex justify-content-center align-items-center btn1" id="decrement" onclick='qty_inc(<?php echo ($car_data["qty"]) ?>);' style="border-radius: 2px;">
                                                    <i class="bi bi-plus"></i>

                                                </button>

                                            </div>
                                            <div class="col-4 p-0">
                                                <input type="text" class="border fs-5 fw-bold text-center w-100" style="outline: none;" pattern="[0-9]" value="<?php echo ($car_data["dsqty"]) ?>" id="qty_input" onkeyup='CheckValue(<?php echo ($car_data["qty"]) ?>);' />

                                            </div>
                                            <div class="col-4 d-flex justify-content-start align-items-center">
                                                <button class="p-2 h-50 d-flex justify-content-center align-items-center btn1" id="increment" onclick="qty_dec();" style="border-radius: 2px;">
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
                                    <label for="" class="fs-6 fw-bold opacity-75">Avalbale Qty - </label>&nbsp;<label for="" class="fw-bold "><?php echo ($car_data["qty"]) ?> items</label>
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
    }
} else {
    ?>

    <div class="col-12 mt-5 ">

        <div class="col-12 ">
            <div class="row justify-content-center align-items-center " style="height: 50vh;">



                <div class="col-4 d-none">
                </div>
                <div class="col-lg-4 col-12 d-flex justify-content-center">
                    <div class="col-12 d-flex justify-content-center">
                        <div class="row">
                            <div class="col-12 d-flex justify-content-center">
                                <img src="images/icon/notfound.png " class="opacity-50 " alt="" style="height: 6rem; width:6rem ">

                            </div>
                            <div class="col-12 d-flex justify-content-center">
                                <p class="mt-4 fs-2 opacity-75 fw-bold text-danger">Item Not Found !</p>

                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-4  d-none">

                </div>
            </div>

        </div>

    </div>
<?php
}

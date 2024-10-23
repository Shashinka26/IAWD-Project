<?php

require "connection.php";
session_start();

// echo("jghhg");


if (isset($_POST["not_user_single_product_buy"])) {
    $json = $_POST["not_user_single_product_buy"];
    $encode_json = json_decode($json);

    $district = $encode_json->distric;
    $PostCode = $encode_json->PostCode;

    $street_address = $encode_json->street_address;
    $qty = $encode_json->qty;
    $subtotal_cost = $encode_json->subtotal_cost;
    $delivery_cost = $encode_json->deliverycost;
    $total_cost = $encode_json->total_cost;
    $status = $encode_json->status;
    $dress_id = $encode_json->dress_id;
    $dress_size_id = $encode_json->dress_size_id;
    $mobile = $encode_json->mobile;
    $name = $encode_json->name;





    $php_obj = new stdClass();

    // echo ($street_address);


    if (empty($PostCode)) {
        $php_obj->post_error = "Please Enter Post Code !!";
    } else
    if (empty($street_address)) {
        $php_obj->Street_error = "Please Enter Street Address!!";
    } else if (empty($name)) {
        $php_obj->name_error = "Please Enter Name!!";
    } else
    if (empty($mobile)) {
        $php_obj->mobile_error = "Please Enter Mobile !!";
    } else if (!preg_match("/07[0,2,4,5,6,7,8][0-9]/", $mobile)) {

        $php_obj->mobile_error = "invalid Mobile Number  !!";
    } else {
        // echo ("ok");




        $order_dress = Database::search("SELECT * FROM `dress_has_dress_sizes`  WHERE `Dress_id`='" . $dress_id . "' AND `dress_sizes_id`='" . $dress_size_id . "'");

        $order_dress_num = $order_dress->num_rows;
        $order_dress_data = $order_dress->fetch_assoc();

        $order_dress_items = Database::search("SELECT * FROM `dress`  WHERE `id`='" .  $order_dress_data["Dress_id"] . "' ");
        $order_dress_items_data = $order_dress_items->fetch_assoc();

        $order_dress_size = Database::search("SELECT * FROM `dress_sizes`  WHERE `id`='" .  $order_dress_data["dress_sizes_id"] . "' ");
        $order_dress_size_data = $order_dress_size->fetch_assoc();

        $dress_code = $order_dress_items_data["Dress_code"];
        $dress_price = $order_dress_items_data["price"];
        $sizes_name = $order_dress_size_data["sizes_name"];


        // echo ( $order_dress_data["id"]);

        $length = 6;
        $characters = '0123456789';
        $charactersLength = strlen($characters);
        $uniqueCode = '';
        for ($i = 0; $i < $length; $i++) {
            $uniqueCode .= $characters[random_int(0, $charactersLength - 1)];
        }

        $order_id = "Order_" . $uniqueCode;
        $dateTime = new DateTime('now', new DateTimeZone('Asia/Colombo'));
        $formattedDate = $dateTime->format('Y-m-d H:i:s');

        Database::includ("INSERT INTO `orders`(`order_id`,`subtotal`,`total`,`shipping`,`adress_order`,`city_order`,`post_code_order`,`user_email_order`,`order_type`,`mobile`,`name_buyer`,`order_status`,`date`) VALUES ('" .  $order_id . "','" .  $subtotal_cost . "','" . $total_cost . "','" . $delivery_cost . "','" . $street_address . "','" . $district . "','" . $PostCode . "','none','" . $status . "','" . $mobile . "','" . $name . "','1','" . $formattedDate . "')");
        // $lastInsertId = Database::lastInsertId();
        Database::includ("INSERT INTO `order_items`(`orders_order_id`,`dress_has_dress_sizes_id`,`order_qty`) VALUES ('" .  $order_id . "','" . $order_dress_data["id"] . "','" . $qty . "')");

        $available_qty = $order_dress_data["Dressqty"];
        $update_qty = $available_qty - $qty;
        Database::includ("UPDATE `dress_has_dress_sizes` SET `Dressqty`='" . $update_qty . "' WHERE `id`='" . $order_dress_data["id"] . "' ");

        $merchant_secret = "NDc4OTkwMzQzMjA3NTM3NzMyNjE2MDY0MjM0MzQzODQzMzIzMzU1";
        $currency = "LKR";
        $hash = strtoupper(
            md5(
                $merchant_id = "1221234" .
                    $order_id .
                    number_format($total_cost, 2, '.', '') .
                    $currency .
                    strtoupper(md5($merchant_secret))
            )
        );


        $html_content = <<<HTML
<div class="col-12 d-flex flex-column">
    <div class="col-12 text-center bg-light d-flex flex-column justify-content-center align-items-center">
        <span class="fw-bold text-black mt-2" style="font-size: 25px;">Nevi's Fashion</span>
        <div class="mt-3 rounded-3 mb-4" style="width: 80px; height: 80px; background-image: url(./images/logo.jpeg); background-position: center; background-size: cover;"></div>
    </div>
    <div class="text-center mt-3">
        <span class="fs-2">INVOICE</span>
    </div>
    <div class="d-flex flex-row mt-4">
        <div class="col-6">
            <span>ORDER NO:</span>&nbsp;<span>{$order_id}</span>
        </div>
        <div class="col-6 text-end">
            <span>DATE:</span>&nbsp;<span>2024:06:27</span>
        </div>
    </div>
    <div class="d-flex flex-row mt-4">
        <div class="col-6">
            <span>BILL TO:</span>&nbsp;<span>{$name}</span>
        </div>
    </div>
    <div class="mt-4">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col" colspan="2">Dress Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Qty</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td colspan="2">{$dress_code} - {$sizes_name}</td>
                    <td>{$dress_price}</td>
                    <td>{$qty}</td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="mt-4 d-flex flex-column">
        <div class="d-flex flex-row">
            <div class="col-6 text-end">
                <span class="fs-5">Items :</span>
            </div>
            <div class="col-6 text-end me-5">
            <span class="fs-5">01</span>

            </div>
        </div>
        <div class="d-flex flex-row">
            <div class="col-6 text-end">
                <span class="fs-5">Sub Total :</span>
            </div>
            <div class="col-6 text-end me-5">
                <span class="fs-5">RS. {$subtotal_cost} .00</span>
            </div>
        </div>
        <div class="d-flex flex-row">
            <div class="col-6 text-end">
                <span class="fs-5">Shipping :</span>
            </div>
            <div class="col-6 text-end me-5">
                <span class="fs-5">RS. {$delivery_cost} .00</span>
            </div>
        </div>
        <div class="d-flex flex-row">
            <div class="col-6 text-end">
                <span class="fs-5">Total :</span>
            </div>
            <div class="col-6 text-end me-5">
                <span class="fs-5">RS. {$total_cost} .00</span>
            </div>
        </div>
    </div>
    <div class="mt-5 text-center">
        <span class="fs-5 fw-bold text-success">WE APPRECIATE YOUR SUPPORT</span>
    </div>
</div>
HTML;


        $php_obj->success = "Your order has been successfully added !";


        $php_obj->id = $order_id;
        $php_obj->item = '1';
        $php_obj->amount = $total_cost;
        $php_obj->fname = $name;
        $php_obj->lname = $name;
        $php_obj->mobile = $mobile;
        $php_obj->address = $street_address;
        $php_obj->city = $district;
        $php_obj->email = "@gmail.com";
        $php_obj->hash = $hash;
        $php_obj->inner = $html_content;
    }

    $phpTojson = json_encode($php_obj);
    echo ($phpTojson);

    // echo ($dress_id);
    // echo ($$dress_size_id);


} else if (isset($_POST["user_single_product_buy"])) {
    $json = $_POST["user_single_product_buy"];

    if (isset($_SESSION["u"])) {
        $email = $_SESSION["u"]["email"];


        $encode_json = json_decode($json);

        $district = $encode_json->distric;
        $PostCode = $encode_json->PostCode;

        $street_address = $encode_json->street_address;
        $qty = $encode_json->qty;
        $subtotal_cost = $encode_json->subtotal_cost;
        $delivery_cost = $encode_json->deliverycost;
        $total_cost = $encode_json->total_cost;
        $status = $encode_json->status;
        $dress_id = $encode_json->dress_id;
        $dress_size_id = $encode_json->dress_size_id;
        $mobile = $encode_json->mobile;
        $name = $encode_json->name;





        $php_obj = new stdClass();

        // echo ($street_address);

        if (empty($name)) {
            $php_obj->name_error_u = "Please Enter  First Name!!";
        } else
    if (empty($mobile)) {
            $php_obj->mobile_error_u = "Please Enter Mobile !!";
        } else if (!preg_match("/07[0,2,4,5,6,7,8][0-9]/", $mobile)) {

            $php_obj->mobile_error_u = "invalid Mobile Number  !!";
        } else  if (empty($street_address)) {
            $php_obj->Street_error_u = "Please Enter Street Address!!";
        } else if (empty($PostCode)) {
            $php_obj->post_error_u = "Please Enter Post Code !!";
        } else
    if (empty($district)) {
            $php_obj->district_error_u = "Please Select District !!";
        } else {
            // echo ("ok");




            $order_dress = Database::search("SELECT * FROM `dress_has_dress_sizes`  WHERE `Dress_id`='" . $dress_id . "' AND `dress_sizes_id`='" . $dress_size_id . "'");

            $order_dress_num = $order_dress->num_rows;
            $order_dress_data = $order_dress->fetch_assoc();

            $order_dress_items = Database::search("SELECT * FROM `dress`  WHERE `id`='" .  $order_dress_data["Dress_id"] . "' ");
            $order_dress_items_data = $order_dress_items->fetch_assoc();

            $order_dress_size = Database::search("SELECT * FROM `dress_sizes`  WHERE `id`='" .  $order_dress_data["dress_sizes_id"] . "' ");
            $order_dress_size_data = $order_dress_size->fetch_assoc();

            $dress_code = $order_dress_items_data["Dress_code"];
            $dress_price = $order_dress_items_data["price"];
            $sizes_name = $order_dress_size_data["sizes_name"];


            // echo ( $order_dress_data["id"]);

            $length = 6;
            $characters = '0123456789';
            $charactersLength = strlen($characters);
            $uniqueCode = '';
            for ($i = 0; $i < $length; $i++) {
                $uniqueCode .= $characters[random_int(0, $charactersLength - 1)];
            }

            $order_id = "Order_" . $uniqueCode;

            $dateTime = new DateTime('now', new DateTimeZone('Asia/Colombo'));
            $formattedDate = $dateTime->format('Y-m-d H:i:s');

            Database::includ("INSERT INTO `orders`(`order_id`,`subtotal`,`total`,`shipping`,`adress_order`,`city_order`,`post_code_order`,`user_email_order`,`order_type`,`mobile`,`name_buyer`,`order_status`,`date`) VALUES ('" .  $order_id . "','" .  $subtotal_cost . "','" . $total_cost . "','" . $delivery_cost . "','" . $street_address . "','" . $district . "','" . $PostCode . "','" . $email . "','" . $status . "','" . $mobile . "','" . $name . "','1','" . $formattedDate . "')");
            // $lastInsertId = Database::lastInsertId();
            Database::includ("INSERT INTO `order_items`(`orders_order_id`,`dress_has_dress_sizes_id`,`order_qty`) VALUES ('" .  $order_id . "','" . $order_dress_data["id"] . "','" . $qty . "')");

            $available_qty = $order_dress_data["Dressqty"];
            $update_qty = $available_qty - $qty;
            Database::includ("UPDATE `dress_has_dress_sizes` SET `Dressqty`='" . $update_qty . "' WHERE `id`='" . $order_dress_data["id"] . "' ");

            $merchant_secret = "NDc4OTkwMzQzMjA3NTM3NzMyNjE2MDY0MjM0MzQzODQzMzIzMzU1";
            $currency = "LKR";
            $hash = strtoupper(
                md5(
                    $merchant_id = "1221234" .
                        $order_id .
                        number_format($total_cost, 2, '.', '') .
                        $currency .
                        strtoupper(md5($merchant_secret))
                )
            );

            $html_content = <<<HTML
<div class="col-12 d-flex flex-column">
    <div class="col-12 text-center bg-light d-flex flex-column justify-content-center align-items-center">
        <span class="fw-bold text-black mt-2" style="font-size: 25px;">Nevi's Fashion</span>
        <div class="mt-3 rounded-3 mb-4" style="width: 80px; height: 80px; background-image: url(./images/logo.jpeg); background-position: center; background-size: cover;"></div>
    </div>
    <div class="text-center mt-3">
        <span class="fs-2">INVOICE</span>
    </div>
    <div class="d-flex flex-row mt-4">
        <div class="col-6">
            <span>ORDER NO:</span>&nbsp;<span>{$order_id}</span>
        </div>
        <div class="col-6 text-end">
            <span>DATE:</span>&nbsp;<span>2024:06:27</span>
        </div>
    </div>
    <div class="d-flex flex-row mt-4">
        <div class="col-6">
            <span>BILL TO:</span>&nbsp;<span>{$name}</span>
        </div>
    </div>
    <div class="mt-4">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col" colspan="2">Dress Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Qty</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td colspan="2">{$dress_code} - {$sizes_name}</td>
                    <td>{$dress_price}</td>
                    <td>{$qty}</td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="mt-4 d-flex flex-column">
        <div class="d-flex flex-row">
            <div class="col-6 text-end">
                <span class="fs-5">Items :</span>
            </div>
            <div class="col-6 text-end me-5">
            <span class="fs-5">01</span>

            </div>
        </div>
        <div class="d-flex flex-row">
            <div class="col-6 text-end">
                <span class="fs-5">Sub Total :</span>
            </div>
            <div class="col-6 text-end me-5">
                <span class="fs-5">RS. {$subtotal_cost} .00</span>
            </div>
        </div>
        <div class="d-flex flex-row">
            <div class="col-6 text-end">
                <span class="fs-5">Shipping :</span>
            </div>
            <div class="col-6 text-end me-5">
                <span class="fs-5">RS. {$delivery_cost} .00</span>
            </div>
        </div>
        <div class="d-flex flex-row">
            <div class="col-6 text-end">
                <span class="fs-5">Total :</span>
            </div>
            <div class="col-6 text-end me-5">
                <span class="fs-5">RS. {$total_cost} .00</span>
            </div>
        </div>
    </div>
    <div class="mt-5 text-center">
        <span class="fs-5 fw-bold text-success">WE APPRECIATE YOUR SUPPORT</span>
    </div>
</div>
HTML;


            $php_obj->successe = "Your order has been successfully added !";


            $php_obj->id = $order_id;
            $php_obj->item = '1';
            $php_obj->amount = $total_cost;
            $php_obj->fname = $name;
            $php_obj->lname = $name;
            $php_obj->mobile = $mobile;
            $php_obj->address = $street_address;
            $php_obj->city = $district;
            $php_obj->email = $email;
            $php_obj->hash = $hash;
            $php_obj->inner = $html_content;
        }

        $phpTojson = json_encode($php_obj);
        echo ($phpTojson);

        // echo ($dress_id);
        // echo ($$dress_size_id);
    }
} else if (isset($_POST["user_single_product_buy_cart"])) {


    $json = $_POST["user_single_product_buy_cart"];

    if (isset($_SESSION["u"])) {
        $email = $_SESSION["u"]["email"];


        $encode_json = json_decode($json);

        $district = $encode_json->distric;
        $PostCode = $encode_json->PostCode;

        $street_address = $encode_json->street_address;
        $subtotal_cost = $encode_json->subtotal_cost;
        $delivery_cost = $encode_json->deliverycost;
        $total_cost = $encode_json->total_cost;
        $status = $encode_json->status;
        $email_cart = $encode_json->email;
        $mobile = $encode_json->mobile;
        $name = $encode_json->name;





        $php_obj = new stdClass();

        // echo ($street_address);

        if (empty($name)) {
            $php_obj->name_error_u = "Please Enter  First Name!!";
        } else
    if (empty($mobile)) {
            $php_obj->mobile_error_u = "Please Enter Mobile !!";
        } else if (!preg_match("/07[0,2,4,5,6,7,8][0-9]/", $mobile)) {

            $php_obj->mobile_error_u = "invalid Mobile Number  !!";
        } else  if (empty($street_address)) {
            $php_obj->Street_error_u = "Please Enter Street Address!!";
        } else if (empty($PostCode)) {
            $php_obj->post_error_u = "Please Enter Post Code !!";
        } else
    if (empty($district)) {
            $php_obj->district_error_u = "Please Select District !!";
        } else {
            // echo ("ok");




            $cart_rs = Database::search("SELECT * FROM `cart` INNER JOIN `cart_has_dress_sizes` ON
            cart_has_dress_sizes.cart_cid=cart.cid WHERE `user_email`='" . $email_cart . "'");
            $cart_num = $cart_rs->num_rows;



            $length = 6;
            $characters = '0123456789';
            $charactersLength = strlen($characters);
            $uniqueCode = '';
            for ($i = 0; $i < $length; $i++) {
                $uniqueCode .= $characters[random_int(0, $charactersLength - 1)];
            }

            $order_id = "Order_" . $uniqueCode;

            $dateTime = new DateTime('now', new DateTimeZone('Asia/Colombo'));
            $formattedDate = $dateTime->format('Y-m-d H:i:s');

            Database::includ("INSERT INTO `orders`(`order_id`,`subtotal`,`total`,`shipping`,`adress_order`,`city_order`,`post_code_order`,`user_email_order`,`order_type`,`mobile`,`name_buyer`,`order_status`,`date`) VALUES ('" .  $order_id . "','" .  $subtotal_cost . "','" . $total_cost . "','" . $delivery_cost . "','" . $street_address . "','" . $district . "','" . $PostCode . "','" . $email . "','" . $status . "','" . $mobile . "','" . $name . "','1','" . $formattedDate . "')");

            for ($z = 0; $z < $cart_num; $z++) {
                $cart_data = $cart_rs->fetch_assoc();

                $order_dress_rs = Database::search("SELECT * FROM `dress_has_dress_sizes` WHERE `dress_sizes_id`='" . $cart_data["dress_sizes_id"] . "' AND `Dress_id`='" . $cart_data["Dress_id"] . "'");
                $order_dress_data = $order_dress_rs->fetch_assoc();
                Database::includ("INSERT INTO `order_items`(`orders_order_id`,`dress_has_dress_sizes_id`,`order_qty`) VALUES ('" .  $order_id . "','" . $order_dress_data["id"] . "','" . $cart_data["qty"] . "')");

                $available_qty = $order_dress_data["Dressqty"];
                $update_qty = $available_qty - $cart_data["qty"];
                Database::includ("UPDATE `dress_has_dress_sizes` SET `Dressqty`='" . $update_qty . "' WHERE `id`='" . $order_dress_data["id"] . "' ");

                Database::includ("DELETE FROM `cart_has_dress_sizes`WHERE `cart_cid`='" . $cart_data["cid"] . "' ");
                Database::includ("DELETE FROM `cart`WHERE `cid`='" . $cart_data["cid"] . "' ");
            }

            // $lastInsertId = Database::lastInsertId();
            $merchant_secret = "NDc4OTkwMzQzMjA3NTM3NzMyNjE2MDY0MjM0MzQzODQzMzIzMzU1";
            $currency = "LKR";
            $hash = strtoupper(
                md5(
                    $merchant_id = "1221234" .
                        $order_id .
                        number_format($total_cost, 2, '.', '') .
                        $currency .
                        strtoupper(md5($merchant_secret))
                )
            );



            $html_content = <<<HTML
            <div class="col-12 d-flex flex-column">
                <div class="col-12 text-center bg-light d-flex flex-column justify-content-center align-items-center">
                    <span class="fw-bold text-black mt-2" style="font-size: 25px;">Nevi's Fashion</span>
                    <div class="mt-3 rounded-3 mb-4" style="width: 80px; height: 80px; background-image: url(./images/logo.jpeg); background-position: center; background-size: cover;"></div>
                </div>
                <div class="text-center mt-3">
                    <span class="fs-2">INVOICE</span>
                </div>
                <div class="d-flex flex-row mt-4">
                    <div class="col-6">
                        <span>ORDER NO:</span>&nbsp;<span>{$order_id}</span>
                    </div>
                    <div class="col-6 text-end">
                        <span>DATE:</span>&nbsp;<span>2024:06:27</span>
                    </div>
                </div>
                <div class="d-flex flex-row mt-4">
                    <div class="col-6">
                        <span>BILL TO:</span>&nbsp;<span>{$name}</span>
                    </div>
                </div>
                <div class="mt-4">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col" colspan="2">Dress Name</th>
                                <th scope="col">Price</th>
                                <th scope="col">Qty</th>
                            </tr>
                        </thead>
                        <tbody>
HTML;
            $order_rs = Database::search("SELECT * FROM `order_items` INNER JOIN `orders` ON
order_items.orders_order_id=orders.order_id WHERE `orders_order_id`='" . $order_id . "'");
            $order_num = $order_rs->num_rows;
            for ($z = 0; $z < $order_num; $z++) {
                $order_data = $order_rs->fetch_assoc();
                $dress_rs = Database::search("SELECT * FROM `dress_has_dress_sizes` dhds
    INNER JOIN `dress` d ON d.id = dhds.Dress_id
    INNER JOIN `dress_sizes` ds ON ds.id = dhds.dress_sizes_id
    WHERE dhds.id = '" . $order_data["dress_has_dress_sizes_id"] . "'");
                $dress_data = $dress_rs->fetch_assoc();

                $qty_order = $order_data["order_qty"];
                $dress_code_order = $dress_data["Dress_code"];
                $sizes_name = $dress_data["sizes_name"];  // This was corrected
                $dress_price = $dress_data["price"];  // This was corrected

                $html_content .= <<<HTML
                            <tr>
                                <td colspan="2">{$dress_code_order} - {$sizes_name}</td>
                                <td>{$dress_price}</td>
                                <td>{$qty_order}</td>
                            </tr>
HTML;
            }

            $html_content .= <<<HTML
                        </tbody>
                    </table>
                </div>
                <div class="mt-4 d-flex flex-column">
                    <div class="d-flex flex-row">
                        <div class="col-6 text-end">
                            <span class="fs-5">Items :</span>
                        </div>
                        <div class="col-6 text-end me-5">
                            <span class="fs-5">{$order_num}</span>
                        </div>
                    </div>
                    <div class="d-flex flex-row">
                        <div class="col-6 text-end">
                            <span class="fs-5">Sub Total :</span>
                        </div>
                        <div class="col-6 text-end me-5">
                            <span class="fs-5">RS. {$subtotal_cost} .00</span>
                        </div>
                    </div>
                    <div class="d-flex flex-row">
                        <div class="col-6 text-end">
                            <span class="fs-5">Shipping :</span>
                        </div>
                        <div class="col-6 text-end me-5">
                            <span class="fs-5">RS. {$delivery_cost} .00</span>
                        </div>
                    </div>
                    <div class="d-flex flex-row">
                        <div class="col-6 text-end">
                            <span class="fs-5">Total :</span>
                        </div>
                        <div class="col-6 text-end me-5">
                            <span class="fs-5">RS. {$total_cost} .00</span>
                        </div>
                    </div>
                </div>
                <div class="mt-5 text-center">
                    <span class="fs-5 fw-bold text-success">WE APPRECIATE YOUR SUPPORT</span>
                </div>
            </div>
HTML;




            $php_obj->successe = "Your order has been successfully added !";

            $php_obj->id = $order_id;
            $php_obj->item = '1';
            $php_obj->amount = $total_cost;
            $php_obj->fname = $name;
            $php_obj->lname = $name;
            $php_obj->mobile = $mobile;
            $php_obj->address = $street_address;
            $php_obj->city = $district;
            $php_obj->email = $email_cart
            ;
            $php_obj->hash = $hash;
            $php_obj->inner = $html_content;
        }

        $phpTojson = json_encode($php_obj);
        echo ($phpTojson);

        // echo ($dress_id);
        // echo ($$dress_size_id);
    }
}

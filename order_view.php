<?php

require "connection.php";
session_start();

// echo("jghhg");


if (isset($_POST["order_view"])) {

    $encode_json = json_decode($_POST["order_view"]);

    $order_id = $encode_json->order_id;

    $php_obj = new stdClass();


    $order_rs_1 = Database::search("SELECT * FROM  `orders` WHERE `order_id`='" . $order_id . "'");
    $order_data_1 = $order_rs_1->fetch_assoc();

        $user_1 = $order_data_1["name_buyer"];  // This was corrected
        
        $date_1 = $order_data_1["date"];  // This was corrected
    

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
                <span>DATE:</span>&nbsp;<span>{$date_1}</span>
            </div>
        </div>
        <div class="d-flex flex-row mt-4">
            <div class="col-6">
            <span>Bill To:</span>&nbsp;<span>{$user_1}</span>
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
        $total_cost = $order_data["total"];  // This was corrected
        $delivery_cost = $order_data["shipping"];  // This was corrected
        $subtotal_cost = $order_data["subtotal"];  // This was corrected


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
    $php_obj->inner = $html_content;


    $phpTojson = json_encode($php_obj);
    echo ($phpTojson);
}

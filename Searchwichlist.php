<?php

require "connection.php";

$json = $_GET["json"];

$jsonToobj = json_decode($json);
$serachkeyword = $jsonToobj->keyword;

$searchWichlist = Database::search("SELECT * FROM `wichlist` INNER JOIN `dress` ON
dress.Dress_code=wichlist.dress_code  WHERE `dress_code` LIKE'%" . $serachkeyword . "%' ORDER BY `date_time` DESC");
$searchWichlist_num = $searchWichlist->num_rows;

// echo($searchWichlist_num);


if ($searchWichlist_num > 0) {


    for ($x = 0; $x <  $searchWichlist_num; $x++) {

        $serchWichlist_data = $searchWichlist->fetch_assoc();
            // $dress_data = $derss->fetch_assoc();

        ;
?>

     

       

            <div class=" mb-4  d-flex justify-content-center item">
                <div class=" ms-md-3 me-md-3  mt-5    overflow-hidden  p-0 wichlistproduct " style="width: 20rem; height: 46rem;" onmouseenter="dresSizemsg();">

                    <?php



                    $derssImage = Database::search("SELECT * FROM `drees_image` WHERE `Dress_id`='" .  $serchWichlist_data["id"] . "'");
                    $derssImage_data = $derssImage->fetch_assoc();


                    $derssSize = Database::search("SELECT * FROM `dress_has_dress_sizes` INNER JOIN `dress_sizes` ON
                dress_sizes.id=dress_has_dress_sizes.dress_sizes_id WHERE `Dress_id`='" .  $serchWichlist_data["id"] . "'");
                    $derssSize_data = $derssSize->fetch_assoc();


                    // echo ($derssImage_num);

                    ?>
                    <i class="bi bi-x-circle-fill fs-4 mt-1   wichlistremove " style="position: absolute; margin-left:18rem;" onclick="removeWichlist('<?php echo ($serchWichlist_data['wid']) ?>_<?php echo ($serchWichlist_data['Dress_code']) ?>');"></i>
                    <img src="<?php echo ($derssImage_data["image_path"]) ?>" style="width: 20rem; height: 30rem;" alt="">

                    <div class=" card-body ">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-10"><label for="" class="fs-4"><?php echo ($serchWichlist_data["Dress_code"]) ?></label></div>

                            </div>
                        </div>

                        <?php

                        //  Database::search("SELECT * FROM `dress`  WHERE `id`='".$wichlist_data["Dress_code"]."' ");

                        $derssSize = Database::search("SELECT * FROM `dress_has_dress_sizes` INNER JOIN `dress_sizes` ON
                dress_sizes.id=dress_has_dress_sizes.dress_sizes_id WHERE `Dress_id`='" . $serchWichlist_data["id"] . "'");
                        $derssSize_num = $derssSize->num_rows;

                        ?>



                        <div class="col-12 mt-2 p-2">
                            <div class="row">






                                <?php

                                for ($y = 0; $y < $derssSize_num; $y++) {

                                    $derssSize_data = $derssSize->fetch_assoc();


                                    # code...
                                    if ($derssSize_data["sizes_name"] == "3XL") {
                                ?>
                                        <div class="col-2 p-1">3XL</div>
                                    <?php
                                    } else
                                
                                
                                if ($derssSize_data["sizes_name"] == "2XL") {
                                    ?>
                                        <div class="col-2 p-1"><?php echo ($derssSize_data["sizes_name"]) ?></div>
                                    <?php
                                    }

                                    if ($derssSize_data["sizes_name"] == "XL") {
                                    ?>
                                        <div class="col-2 p-1"><?php echo ($derssSize_data["sizes_name"]) ?></div>
                                    <?php
                                    }


                                    if ($derssSize_data["sizes_name"] == "L") {
                                    ?>
                                        <div class="col-2 p-1"><?php echo ($derssSize_data["sizes_name"]) ?></div>
                                    <?php
                                    }

                                    if ($derssSize_data["sizes_name"] == "M") {
                                    ?>
                                        <div class="col-2 p-1"><?php echo ($derssSize_data["sizes_name"]) ?></div>
                                    <?php
                                    }


                                    if ($derssSize_data["sizes_name"] == "S") {
                                    ?>
                                        <div class="col-2 p-1"><?php echo ($derssSize_data["sizes_name"]) ?></div>
                                <?php
                                    }
                                }
                                ?>








                            </div>
                        </div>
                        <div class="col-12  mt-2">
                            <label for="" class="fs-5" style="color: #FA948D;">RS:<?php echo ($serchWichlist_data["price"]) ?>.00</label>

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




?>
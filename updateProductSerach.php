<?php

require "connection.php";


// echo("kdhh");

$JsonText = $_POST["json"];

// echo($JsonText);

$JsonTophp = json_decode($JsonText);
$dSerchInput = $JsonTophp->DressSerchIput;
$page = $JsonTophp->page;

// echo($dSerchInput);
// echo($page);


$Dress_rs = Database::search("SELECT * FROM `dress` WHERE `Dress_code`   LIKE'%" . $dSerchInput . "%' ORDER BY `add_date_time` DESC"  );

$Dress_num = $Dress_rs->num_rows;

// echo ($Dress_num);

if ($Dress_num > 0) {
    for ($x = 0; $x < $Dress_num; $x++) {

        $Dress_data = $Dress_rs->fetch_assoc();



?>

        <div class="updateproduct p-0 me-lg-4 me-2 mt-5 mb-5 ms-lg-0  ms-2 " style="height: 18rem; width: 24rem;">
            <div class="row">

                <?php

                $DressImage_rs = Database::search("SELECT * FROM `drees_image` WHERE  `Dress_id`='" .  $Dress_data["id"] . "'");
                $DressImage_data = $DressImage_rs->fetch_assoc();
                ?>

                <?php

                if ($Dress_data["Stutus"] == 1) {
                ?>

                    <img src="<?php echo ($DressImage_data["image_path"]) ?>" style="height: 18rem; width: 15rem;" alt="">

                <?php
                } else if ($Dress_data["Stutus"] == 0) {

                ?>



                    <img src="<?php echo ($DressImage_data["image_path"]) ?>" class="opacity-50" style="height: 18rem; width: 15rem; " alt="">


                <?php
                }
                ?>
                <div class="col ">
                    <div class="col-12 ">
                        <div class="row justify-content-center">
                            <div class="mt-3">
                                <div class="row">
                                    <div class="col-8">
                                        <label for="" class="fs-5 fw-bold"><?php echo ($Dress_data["Dress_code"]) ?></label>

                                    </div>
                                    <div class="col-2 recycale" onclick="removeDress('<?php echo ($Dress_data['Dress_code']) ?>');">
                                        <i class="bi bi-trash3 fs-6 fw-bold "></i>

                                    </div>
                                    <div class="col-2"></div>

                                </div>
                            </div>
                            <div class="mt-5 mb-5">
                                <div class="row">
                                    <div class="form-check form-switch fs-5 opacity-75">
                                        <input class="form-check-input" type="checkbox" role="switch" id="fd<?php echo ($Dress_data['id']) ?>" <?php if ($Dress_data["Stutus"] == 1) { ?> checked<?php } ?> onclick="chngestatusProUp(<?php echo ($Dress_data['id']) ?>)" />



                                        <!-- <label for="" id="text">Active</label> -->


                                        <?php

                                        if ($Dress_data["Stutus"] == 1) {
                                        ?>



                                            <label for="fd<?php echo ($Dress_data['id']) ?>" id="text">Active</label>
                                        <?php
                                        } else if ($Dress_data["Stutus"] == 0) {

                                        ?>


                                            <label for="fd<?php echo ($Dress_data['id']) ?>" id="text" style="color: #FA948D;">Deactive</label>

                                        <?php
                                        }

                                        ?>



                                    </div>
                                </div>

                            </div>


                            <div class="col-8 mt-5 d-flex justify-content-center">
                                <label for="" class="fs-5 fw-bold a" onclick="window.location='<?php echo ('UpdateProductFile.php?json='.$Dress_data['id']) ?>'">Update</label>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>




    <?php






    }
} else {
    // echo ("err");
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
                                <img src="images/icon/usernot fond.png " class="opacity-50 " alt="" style="height: 6rem; width:6rem ">

                            </div>
                            <div class="col-12 d-flex justify-content-center">
                                <p class="mt-4 fs-2 opacity-75 fw-bold text-danger">Dress Not Found !</p>

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




?>
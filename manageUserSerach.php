<?php

// echo("jdbhv");


require "connection.php";


// echo("kdhh");

$JsonText = $_POST["json"];

// echo($JsonText);


$JsonTophp = json_decode($JsonText);
$USerchInput = $JsonTophp->userSerchIput;
$page = $JsonTophp->page;

// echo($dSerchInput);
// echo($page);


$user_rs = Database::search("SELECT * FROM `user` WHERE `email`   LIKE'%" . $USerchInput . "%' ORDER BY `joined_date` DESC");

$user_num = $user_rs->num_rows;

if ($user_num > 0) {
    for ($x = 0; $x < $user_num; $x++) {

        $user_data = $user_rs->fetch_assoc();
?>

        <div class="updateuser p-0 me-lg-4 me-2 mt-3 mb-3 ms-lg-0  ms-2 border border-1 col-11 ps-4 pt-2 pb-2" >
            <div class="row">

                <div class="col-12">
                    <div class="row">
                        <div class="col-lg-10 col-6">
                            <?php

                            if ($user_data["status"] == 1) {
                            ?>
                                <div class="row">
                                    <div class="col-lg-3 col-12 d-flex justify-content-center">

                                        <div class="col-lg-8 col-8  d-flex justify-content-center">


                                            <?php

                                            $userImage_rs = Database::search("SELECT * FROM `user_image` WHERE  `user_email`='" . $user_data["email"] . "'");
                                            $userImage_num = $userImage_rs->num_rows;
                                            $userImage_data = $userImage_rs->fetch_assoc();



                                            ?>


                                            <?php
                                            if ($userImage_num == 0) {
                                            ?>
                                                <img src="./images/icon/add_adminprofile.png" style="height: 18rem; width: 6rem; height: 6rem;" alt="" class="p-1 opacity-50">

                                            <?php
                                            } else if ($user_data["status"] == 1) {
                                            ?>

                                                <img src="<?php echo ($userImage_data["Image_path"]) ?>" style="height: 18rem; width: 6rem; height: 6rem;" alt="" class="p-1">

                                            <?php
                                            } else if ($user_data["status"] == 2) {

                                            ?>



                                                <img src="<?php echo ($userImage_data["Image_path"]) ?>" class="opacity-50" style="height: 6rem; width: 6rem; " alt="">


                                            <?php
                                            }
                                            ?>
                                        </div>


                                    </div>
                                    <div class="col-8 d-none d-lg-block ">
                                        <div class="col-12 ">
                                            <label for="" class="mt-3 fs-5 fw-bold"><?php echo ($user_data["fname"]) ?>&nbsp;<?php echo ($user_data["lname"]) ?></label>

                                        </div>

                                        <div class="col-12 mt-2">
                                            <label for="" class=" fs-6 fw-bold opacity-75">(<?php echo ($user_data["email"]) ?>)</label>

                                        </div>
                                    </div>
                                </div>

                            <?php
                            } else if ($user_data["status"] == 2) {
                            ?>
                                <div class="row opacity-75">
                                    <div class="col-lg-3 col-12 d-flex justify-content-center">

                                        <div class="col-lg-8 col-8  d-flex justify-content-center">


                                            <?php

                                            $userImage_rs = Database::search("SELECT * FROM `user_image` WHERE  `user_email`='" .  $user_data["email"] . "'");
                                            $userImage_num = $userImage_rs->num_rows;
                                            $userImage_data = $userImage_rs->fetch_assoc();



                                            ?>


                                            <?php
                                            if ($userImage_num == 0) {
                                            ?>
                                                <img src="./images/icon/add_adminprofile.png" style="height: 18rem; width: 6rem; height: 6rem;" alt="" class="p-1 opacity-50">

                                            <?php
                                            } else if ($user_data["status"] == 1) {
                                            ?>

                                                <img src="<?php echo ($userImage_data["Image_path"]) ?>" style="height: 18rem; width: 6rem; height: 6rem;" alt="" class="p-1">

                                            <?php
                                            } else if ($user_data["status"] == 2) {

                                            ?>



                                                <img src="<?php echo ($userImage_data["Image_path"]) ?>" class="opacity-50" style="height: 6rem; width: 6rem; " alt="">


                                            <?php
                                            }
                                            ?>
                                        </div>


                                    </div>
                                    <div class="col-8 d-none d-lg-block ">
                                        <div class="col-12 ">
                                            <label for="" class="mt-3 fs-5 fw-bold"><?php echo ($user_data["fname"]) ?>&nbsp;<?php echo ($user_data["lname"]) ?></label>

                                        </div>

                                        <div class="col-12 mt-2">
                                            <label for="" class=" fs-6 fw-bold opacity-75">(<?php echo ($user_data["email"]) ?>)</label>

                                        </div>
                                    </div>
                                </div>

                            <?php
                            }

                            ?>
                        </div>

                        <div class="col-lg-2  col-6 p-2">
                            <div class="row">
                                <div class="col-8">
                                    <div class="row ">
                                        <?php

                                        if ($user_data["status"] == 1) {
                                        ?>
                                            <button class=" btnprofi p-2  opacity-75 " style="border-radius: 5px;" onclick="blockuser('<?php echo ($user_data['email']) ?>');">Block</button>

                                        <?php
                                        } else if ($user_data["status"] == 2) {
                                        ?>

                                            <button class=" btn btn-danger  opacity-75" onclick="Unblockuser('<?php echo ($user_data['email']) ?>');">Unblock</button>


                                        <?php
                                        }
                                        ?>

                                        <button class=" btn btn-secondary mt-2 opacity-75">Profile</button>
                                    </div>

                                </div>

                                <div class="col-4 d-flex justify-content-center align-items-center">

                                    <div class="col-12 recycale  d-flex justify-content-center" onclick="removeUser('<?php echo ($user_data['email']) ?>')" );>
                                        <i class="bi bi-trash3 fs-5 fw-bold " id="<?php echo ($user_data['email']) ?>"></i>

                                    </div>

                                </div>
                            </div>

                        </div>

                        <div class="col-12 d-lg-none mt-2">
                            <div class="row justify-content-center">
                                <div class="col-12 d-flex justify-content-center">
                                    <label for="" class="mt-3 fs-5 fw-bold"><?php echo ($user_data["fname"]) ?>&nbsp;<?php echo ($user_data["lname"]) ?></label>

                                </div>

                                <div class="col-12 d-flex justify-content-center mt-2">
                                    <label for="" class=" fs-6 fw-bold opacity-75">(<?php echo ($user_data["email"]) ?>)</label>

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
                                <p class="mt-4 fs-2 opacity-75 fw-bold text-danger">User Not Found !</p>

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
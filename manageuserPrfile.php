<?php

require "connection.php";

// echo("jghhg");

$json = $_POST["json"];

$jsonToObj = json_decode($json);
$email = $jsonToObj->email;

// echo($email);

$user = Database::search("SELECT * FROM `user` INNER JOIN `gender` ON
 gender.id=user.gender_id WHERE `email`='" . $email . "'");
$user_data = $user->fetch_assoc();

$userimge = Database::search("SELECT * FROM `user_image` WHERE `user_email`='" . $email . "'");
$userimge_data = $userimge->fetch_assoc();

?>


<div class="row adminscorll2 " id="adminProfileViewArea">

    <div class="col-12   mb-4" style="border-radius: 4px;">

        <div class="col-12">
            <div class="row">
                <div class="col-lg-3 col-12 d-flex justify-content-center align-items-center p-3">
                    <div class="col-lg-12 col-10  d-flex justify-content-center align-items-center p-4 mt-3">
                        <?php
                        if (!empty($userimge_data["Image_path"])) {
                        ?>
                            <img src="<?php echo ($userimge_data["Image_path"]) ?>" style="height: 12rem; width: 10rem; " alt="">

                        <?php
                        } else {


                        ?>
                            <img src="./images/icon/uesr main.png" style="height: 12rem; width: 10rem; " alt="">


                        <?php
                        }
                        ?>

                    </div>

                </div>

                <div class="col-lg-9 col-12 d-flex justify-content-center align-items-center">
                    <div class="row justify-content-center">

                        <div class="col-12 ps-3 pe-3 mt-5 ">
                            <div class="row">
                                <div class="col-lg-6 col-12 mb-2 mb-lg-0 d-flex justify-content-center align-items-center ">
                                    <div class="col-lg-10 col-12">
                                        <div class="row justify-content-center">
                                            <div class="col-lg-12 col-12">
                                                <label for="" class="form-label ">First Name</label>
                                            </div>
                                            <div class="col-lg-12 col-11 pt-3 d-grid">
                                                <?php
                                                if (!empty($user_data["fname"])) {
                                                ?>
                                                    <input type="text" class=" bg-white fw-bold in ps-3 opacity-75" disabled value="<?php echo ($user_data["fname"]) ?>">


                                                <?php
                                                } else {


                                                ?>
                                                    <input type="text" class=" bg-white fw-bold in ps-3 opacity-75" disabled value="">



                                                <?php
                                                }
                                                ?>

                                            </div>

                                        </div>


                                    </div>
                                </div>
                                <div class="col-lg-6 col-12 mt-5 mt-lg-0 d-flex justify-content-center align-items-center">
                                    <div class="col-lg-10 col-12">
                                        <div class="row justify-content-center">
                                            <div class="col-lg-12 col-12">
                                                <label for="" class="form-label ">Last Name</label>
                                            </div>
                                            <div class="col-lg-12 col-11 pt-3 d-grid">
                                                <?php
                                                if (!empty($user_data["lname"])) {
                                                ?>
                                                    <input type="text" class=" bg-white fw-bold in ps-3 opacity-75" disabled value="<?php echo ($user_data["lname"]) ?>">


                                                <?php
                                                } else {


                                                ?>
                                                    <input type="text" class=" bg-white fw-bold in ps-3 opacity-75" disabled value="">



                                                <?php
                                                }
                                                ?>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>



                        <div class="col-12 ps-3 pe-3 mt-5 ">
                            <div class="row">
                                <div class="col-lg-6 col-12 mb-2 mb-lg-0 d-flex justify-content-center align-items-center ">
                                    <div class="col-lg-10 col-12">
                                        <div class="row justify-content-center">
                                            <div class="col-lg-12 col-12">
                                                <label for="" class="form-label ">Email</label>
                                            </div>
                                            <div class="col-lg-12 col-11 pt-3 d-grid">
                                                <?php
                                                if (!empty($user_data["email"])) {
                                                ?>
                                                    <input type="text" class=" bg-white fw-bold in ps-3 opacity-75" disabled value="<?php echo ($user_data["email"]) ?>">


                                                <?php
                                                } else {


                                                ?>
                                                    <input type="text" class=" bg-white fw-bold in ps-3 opacity-75" disabled value="">



                                                <?php
                                                }
                                                ?>
                                            </div>

                                        </div>


                                    </div>
                                </div>
                                <div class="col-lg-6 col-12 mt-5 mt-lg-0 d-flex justify-content-center align-items-center">
                                    <div class="col-lg-10 col-12">
                                        <div class="row justify-content-center">
                                            <div class="col-lg-12 col-12">
                                                <label for="" class="form-label ">Mobile</label>
                                            </div>
                                            <div class="col-lg-12 col-11 pt-3 d-grid">
                                                <?php
                                                if (!empty($user_data["mobile"])) {
                                                ?>
                                                    <input type="text" class=" bg-white fw-bold in ps-3 opacity-75" disabled value="<?php echo ($user_data["mobile"]) ?>">


                                                <?php
                                                } else {


                                                ?>
                                                    <input type="text" class=" bg-white fw-bold in ps-3 opacity-75" disabled value="">



                                                <?php
                                                }
                                                ?>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 ps-3 pe-3 mt-5 ">
                            <div class="row">
                                <div class="col-lg-6 col-12 mb-2 mb-lg-0 d-flex justify-content-center align-items-center ">
                                    <div class="col-lg-10 col-12">
                                        <div class="row justify-content-center">
                                            <div class="col-lg-12 col-12">
                                                <label for="" class="form-label ">Gender</label>
                                            </div>
                                            <div class="col-lg-12 col-11 pt-3 d-grid">
                                                <?php
                                                if (!empty($user_data["gender_id"])) {
                                                ?>
                                                    <input type="text" class=" bg-white fw-bold in ps-3 opacity-75" disabled value="<?php echo ($user_data["gender_name"]) ?>">


                                                <?php
                                                } else {


                                                ?>
                                                    <input type="text" class=" bg-white fw-bold in ps-3 opacity-75" disabled value="">



                                                <?php
                                                }
                                                ?>
                                            </div>

                                        </div>


                                    </div>
                                </div>
                                <div class="col-lg-6 col-12 mt-5 mt-lg-0 d-flex justify-content-center align-items-center">
                                    <div class="col-lg-10 col-12">
                                        <div class="row justify-content-center">
                                            <div class="col-lg-12 col-12">
                                                <label for="" class="form-label ">Join Date</label>
                                            </div>
                                            <div class="col-lg-12 col-11 pt-3 d-grid">
                                                <?php
                                                $date = strtotime($user_data["joined_date"]);
                                                $date_data=date('Y-m-d',$date);


                                                if (!empty($user_data["joined_date"])) {
                                                ?>
                                                    <input type="text" class=" bg-white fw-bold in ps-3 opacity-75" disabled value="<?php echo ($date_data) ?>">


                                                <?php
                                                } else {


                                                ?>
                                                    <input type="text" class=" bg-white fw-bold in ps-3 opacity-75" disabled value="">



                                                <?php
                                                }
                                                ?>
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




    </div>






</div>
</div>
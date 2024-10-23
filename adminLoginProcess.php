<?php
// echo("okk");

require "connection.php";
session_start();

if (isset($_POST["vcode"])) {
    $vc = $_POST["vcode"];
    $email = $_POST["email"];

    // echo ($email);



    $vcode_rs = Database::search("SELECT * FROM `admin` WHERE `verification_Code`='" . $vc . "' AND `email`='" . $email . "'");

    $vcode_num = $vcode_rs->num_rows;

    if ($vcode_num == 1) {
        // echo("pk");

        $vcode_data = $vcode_rs->fetch_assoc();
        $_SESSION["ad"] = $vcode_data;
        echo ("success");
    } else {
        echo ("Invalid  User Name Or Password");
    }
} else {
    echo ("Please Enter your  User Name");
}

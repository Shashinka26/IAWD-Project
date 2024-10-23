<?php

// echo("ok");


session_start();
require "connection.php";




require "Exception.php";
require "PHPMailer.php";
require "SMTP.php";


use PHPMailer\PHPMailer\PHPMailer;


if (isset($_SESSION["u"])) {

    $Uemail = $_SESSION["u"]["email"];





    if (isset($_POST["e"]) && ($_POST["p"])) {


        $email = $_POST["e"];
        $password = $_POST["p"];

        $useremail_rs = Database::search("SELECT * FROM `user` WHERE `email`='" . $Uemail . "' ");
        // $useremail_num=$useremail_rs->num_rows;
        // echo($useremail_num);
        $useremail_data = $useremail_rs->fetch_assoc();
        $userepw = $useremail_data["password"];



        if (empty($email)) {
            echo ("please Enter your Email !!!");
        } else if (strlen($email) >= 100) {
            echo ("Email must have less than 100 charatcers");
        } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo ("Invalide Email");
        } else {

            if ($Uemail == $email) {
                // echo("ok");
                if ($userepw == $password) {
                    echo "Success";
                }else{
                    echo("invalide Password");
                }
            } else {
                echo ("invalide Email");
            }
        }
    }else{
        echo ("please enter your Email and Password !!!");
    }
} else {
    echo ("plese sign IN");
}

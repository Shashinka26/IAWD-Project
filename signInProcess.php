<?php

session_start();
require "connection.php";

// echo("okkk");

$email = $_POST["em"];
$password = $_POST["pw"];
$remembe = $_POST["reme"];


// echo($email);
// echo($password);
// echo($remembe);

if (empty($email)) {
    echo ("please Enter your Email !!!");
} else if (strlen($email) >= 100) {
    echo ("Email must have less than 100 charatcers");
} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo ("Invalide Email");
} else if (empty($password)) {
    echo ("please Insert your password !!");
} else if (strlen($password) < 5 || strlen($password) > 20) {
    echo ("password must be between 5-20 charcters");
} else {


    $rs = Database::search("SELECT * FROM `user` WHERE `email`= '" . $email . "' AND `password`= '" . $password . "'");

    $n = $rs->num_rows;

    // echo($n);

    if ($n == 1) {

        $f = $rs->fetch_assoc();

        // echo($f[""])

        if ($f["status"] == '1') {


            //    session and cookie 

            $_SESSION["u"] = $f;

        echo ("success");


            if ($remembe == "true") {

                setcookie("email", $email, time() + (60 * 60 * 60 * 24 * 365 * 2));
                setcookie("password", $password, time() + (60 * 60 * 60 * 24 * 365 * 2));
            } else {
                setcookie("email", "", -1);
                setcookie("password", "", -1);
            }

        } else {
            echo ("We have Detected Suspicious Behavior And Blocked You !! Please contact Us");
        }
    } else {
        echo ("Ivalide Email or Password");
    }
}

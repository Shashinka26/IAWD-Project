<?php

require "connection.php";

// echo("Ok");

$fname = $_POST["fn"];
$lname = $_POST["ln"];
$email = $_POST["em"];
$password = $_POST["pw"];
$mobile = $_POST["mobi"];
$gender = $_POST["gen"];

// echo($fname);
// echo("<br>");
// echo($lname);
// echo("<br>");
// echo($email);
// echo("<br>");
// echo($password);
// echo("<br>");
// echo($mobile);
// echo("<br>");
// echo($gender);
// echo("<br>");

if (empty($fname)) {
    echo ("please Enter Your First Name !!!");
} else if (strlen($fname) > 50) {
    echo ("First Name must have less than 50 chatacters");
} else if (empty($lname)) {
    echo ("please Enter Your Last Name !!!");
} else if (strlen($lname) > 50) {
    echo ("Last Name must have less than 50 chatacters");
} else if (empty($email)) {
    echo ("please Enter Your Email !!!");
} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo ("Invalide Email !!!");
} else if (empty($password)) {
    echo ("please Enter Your Password !!!");
} else if (strlen($password) < 5 || strlen($password) > 20) {
    echo ("password must be between 5-20 charcters");
} else if (empty($mobile)) {
    echo ("please Enter Your Mobile Number !!!");
} else if (strlen($mobile) != 10) {
    echo ("Mobile Number must be 10 charcters");
} else if (!preg_match("/07[0,2,4,5,6,7,8][0-9]/", $mobile)) {
    echo ("Invalde Mobile Number !!!");
} else {
    //    echo("success") ;

    $rs = Database::search("SELECT * FROM `user` WHERE `email`='" . $email . "' OR `mobile`='" . $mobile . "'");
    $n = $rs->num_rows;

    // echo($n);

    if ($n > 0) {
        echo ("User with the same Email or Mobile already exists");
    } else {
        $d = new DateTime();
        $tz = new DateTimeZone("Asia/Colombo");
        $d->setTimezone($tz);
        $date = $d->format("Y-m-d H:i:s");

        Database::includ("INSERT INTO `user`(`fname`,`lname`,`email`,`password`,`mobile`,`gender_id`,`joined_date`,`status`) VALUES
        ('" . $fname . "','" . $lname . "','" . $email . "','" . $password . "','" . $mobile . "','" . $gender . "','" . $date . "','1')");

        echo ("success");
    }
}

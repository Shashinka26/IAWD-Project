<?php

require "connection.php";


// echo("ok");

$email = $_POST["em"];
$newpw = $_POST["npwinput"];
$repw = $_POST["repwinput"];
$verifcode = $_POST["vcode"];

// echo($email);
// echo($newpwinpu);
// echo($repwinpu);
// echo($verifcode);

if (empty($email)) {
    echo ("Missing Email Address");
} else if (empty($newpw)) {
    echo ("Please Insert your New password");
} else if (strlen($newpw) < 5 || strlen($newpw) > 20) {
    echo ("Invalide Password");
} else if (empty($repw)) {
    echo ("Please Re-type your New password");
} else if ($newpw != $repw) {
    echo ("Password does not matched");
} else if (empty($verifcode)) {
    echo ("please enter your verification Code");
} else {
    // echo("success");

    $rs = Database::search("SELECT * FROM `user` WHERE `email`='" . $email . "'
    AND `verification_code`='" . $verifcode . "'");
      $n = $rs->num_rows;

    //   echo($n);
    if($n=1){
        Database::includ("UPDATE `user` SET `password`='".$newpw."' WHERE `email`='".$email."'") ;
        echo("success");
    }else{
        echo("Inavlide Email or varification Code");
    }
}

<?php

// echo("ok");

require "connection.php";


// echo("ok");

$email = $_POST["em"];
$password = $_POST["pw"];
$newpw = $_POST["npwinput"];
$repw = $_POST["repwinput"];

// echo($email);
// echo($newpwinpu);
// echo($repwinpu);


if (empty($email)) {
    echo ("Missing Email Address");
}else if(empty($password)){
    echo ("Missing Password");
}else if (empty($newpw)) {
    echo ("Please Insert your New password");
}else if (strlen($newpw) < 5 || strlen($newpw) > 20) {
    echo ("Invalide Password");
}else if (empty($repw)) {
    echo ("Please Re-type your New password");
}else if ($newpw != $repw) {
    echo ("Password does not matched");
}else {
    // echo("success");

    $rs = Database::search("SELECT * FROM `user` WHERE `email`='" . $email . "'
     AND `password`='".$password."'");
      $n = $rs->num_rows;

    //   echo($n);
    if($n=1){
        Database::includ("UPDATE `user` SET `password`='".$newpw."' WHERE `email`='".$email."'") ;
        echo("success");
    }else{
        echo("Inavlide Email or varification Code");
    }
}

?>
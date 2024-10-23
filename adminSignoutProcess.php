<?php

// echo("okkk");

session_start();

if(isset($_SESSION["ad"])){



    $_SESSION["ad"] =null;
    session_destroy();

    echo("success");

}

?>
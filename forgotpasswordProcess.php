<?php
require "connection.php";

// echo("okkk");


require "Exception.php";
require "PHPMailer.php";
require "SMTP.php";


use PHPMailer\PHPMailer\PHPMailer;



if (isset($_GET["em"])) {
    $email = $_GET["em"];

    // echo ($email);

    $rs =  Database::search("SELECT * FROM `user` WHERE `email`='" . $email . "'");
    $n = $rs->num_rows;

    // echo ($n);

    if ($n == 1) {

        $code = uniqid();

        Database::includ("UPDATE `user` SET `verification_code`='" . $code . "' WHERE
        `email`='" . $email . "'");

        // email code
        $mail = new PHPMailer;
        $mail->IsSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'nevisfashion00@gmail.com';
        $mail->Password = 'keyarjtaxfpaswzo';
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;
        $mail->setFrom('nevisfashion00@gmail.com', 'Reset Password');
        $mail->addReplyTo('nevisfashion00@gmail.com', 'Reset Password');
        $mail->addAddress($email);
        $mail->isHTML(true);
        $mail->Subject = 'Nevisfashion Forgot Password Verification Code';
        $bodyContent = '<h1 style ="color:green">Your Verification code is '.$code.'</h1>';
        $mail->Body    = $bodyContent;


        if (!$mail->send()) {
            echo 'Verification code sending failed';
        } else {
            echo "Success";
        }
    } else {
        echo ("Invalide Email Address");
    }
}

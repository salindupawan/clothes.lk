<?php

require "connection.php";

require "SMTP.php";
require "PHPMailer.php";
require "Exception.php";

use PHPMailer\PHPMailer\PHPMailer;


    $txt = $_POST["t"];
    $email = $_POST["m"];
   
        
        $mail = new PHPMailer;
            $mail->IsSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'salindupa@gmail.com';
            $mail->Password = 'tbpkcanyrdrjvmyb';
            $mail->SMTPSecure = 'ssl';
            $mail->Port = 465;
            $mail->setFrom('salindupa@gmail.com', 'Clothes.lk | Admin');
            $mail->addReplyTo('salindupa@gmail.com', 'Clothes.lk | Admin');
            $mail->addAddress($email);
            $mail->isHTML(true);
            $mail->Subject = 'Clothes.lk';
            $bodyContent = ''.$txt.'';
            $mail->Body    = $bodyContent;

            if (!$mail->send()) {
                echo 'Message sending failed';
            } else {
                echo 'Message Sent';
            }




?>
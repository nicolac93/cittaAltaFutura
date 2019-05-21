<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

function sendMail($SMusername,$SMname,$SMsurname){
    //require 'PHPMailerAutoload.php';
    require 'phpmailer/src/Exception.php';
    require 'phpmailer/src/PHPMailer.php';
    require 'phpmailer/src/SMTP.php';

    $mail = new PHPMailer;

    $mail->isSMTP();                                      // Set mailer to use SMTP
    //$mail->Host = 'smtp1.example.com;smtp2.example.com';  // Specify main and backup SMTP servers
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->SMTPOptions = array(
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
        )
    );
    $mail->Username = 'calcolatore.co2@gmail.com';                 // SMTP username
    $mail->Password = 'co2calculator';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable encryption, 'ssl' also accepted

    $mail->From = 'calcolatore.co2@gmail.com';
    $mail->FromName = 'Co2 Calculator';
    $mail->addAddress($SMusername, $SMname . " " . $SMsurname);     // Add a recipient
    //$mail->addAddress('ellen@example.com');               // Name is optional
    $mail->addReplyTo('calcolatore.co2@gmail.com', 'Information');
//                    $mail->addCC('mail@studenti.unibg.it');
    //$mail->addBCC('bcc@example.com');

    $mail->WordWrap = 50;                                 // Set word wrap to 50 characters
    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
    $mail->isHTML(true);                                  // Set email format to HTML

    $mail->Subject = 'Co2 Calculator Account Registration';
    $code = hash("crc32b", $SMusername); // Creates a code from the mail
    $mail->Body    = "Welcome " . $SMname . ",<BR><BR> if you want to <b>partecipate to the contest and have a chance to win beautiful prizes</b>,<BR>"
            . "you will need to activate the google timeline feature, in order to certificate, in case of winning, the correctness of the data inserted manually. <BR>"
            . "You can find instructions on how activite the feature at the folllowing links:<BR>"
            . "<a href='https://support.google.com/maps/answer/6258979?co=GENIE.Platform%3DDesktop&hl=en&oco=0'>PC</a>, <a href='https://support.google.com/maps/answer/6258979?co=GENIE.Platform%3DAndroid&hl=en&oco=0'>Android</a>, <a href='https://support.google.com/maps/answer/6258979?co=GENIE.Platform%3DiOS&hl=en&oco=0'>iPhone</a>.<BR>"
            ."Alternatively, you may decide not to enter the competition and use the site only for your personal interest <BR>"
            . "in order to improve your impact on the environment which is ultimately our main purpose.<BR><BR>"
            ."To proceed with the registration you will need the following code: <BR>".$code
            ."<BR> Thank you for your efforts in this project!";
    $mail->AltBody = "Welcome " . $SMname . ",\n\n if you want to partecipate to the contest and have a chance to win beautiful prizes,\n"
            . "you will need to activate the google timeline feature, in order to certificate, in case of winning, the correctness of the data inserted manually. \n"
            . "You can find instructions on how activite the feature at the folllowing links:\n"
            . "https://support.google.com/maps/answer/6258979?co=GENIE.Platform%3DDesktop&hl=en&oco=0 PC\n "
            . "https://support.google.com/maps/answer/6258979?co=GENIE.Platform%3DAndroid&hl=en&oco=0 Android,\n "
            . "https://support.google.com/maps/answer/6258979?co=GENIE.Platform%3DiOS&hl=en&oco=0 iPhone.\n"
            ."Alternatively, you may decide not to enter the competition and use the site only for your personal interest \n"
            . "in order to improve your impact on the environment which is ultimately our main purpose.\n\n"
            ."To proceed with the registration you will need the following code: \n".$code
            ."\n Thank you for your efforts in this project!";

    if(!$mail->send()) {
//        echo 'Message could not be sent.';
        return 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
        return 'OK';
    }
}
?> 
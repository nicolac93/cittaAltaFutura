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
    $mail->Username = 'diathesis@unibg.it';                 // SMTP username
    $mail->Password = 'Geografi1';                           // SMTP password
    $mail->SMTPSecure = 'ssl';                            // Enable encryption, 'ssl' also accepted

    $mail->From = 'diathesis@unibg.it';
    $mail->FromName = 'Città Alta Plurale';
    $mail->addAddress($SMusername, $SMname . " " . $SMsurname);     // Add a recipient
    //$mail->addAddress('ellen@example.com');               // Name is optional
    $mail->addReplyTo('diathesis@unibg.it', 'Informazioni');
//                    $mail->addCC('mail@studenti.unibg.it');
    //$mail->addBCC('bcc@example.com');

    $mail->WordWrap = 50;                                 // Set word wrap to 50 characters
    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
    $mail->isHTML(true);                                  // Set email format to HTML

    $mail->Subject = 'Registrazione Città Alta Plurale';
    $code = hash("crc32b", $SMusername); // Creates a code from the mail
    $mail->Body    = "Benvenuto " . $SMname . ",<BR><BR>"
            ."Per procedere alla registrazione sul sistema partecipativo di Città Alta plurale, <BR>"
            . "ti servirà il seguente codice: <BR> <b>".$code."</b>"
            ."<BR> Grazie per la collaborazione!";
    $mail->AltBody = "Benvenuto " . $SMname . ",\n\n"
            ."Per procedere alla registrazione sul sistema partecipativo di Città Alta Futura, \n"
            . "ti servirà il seguente codice: \n".$code
            ."\n Grazie per la collaborazione!";

    if(!$mail->send()) {
//        echo 'Message could not be sent.';
        return 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
        return 'OK';
    }
}
?> 
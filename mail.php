<?php
require("vendor/autoload.php");

use PHPMailer\PHPMailer\PHPMailer;
//use PHPMailer\PHPMailer\SMTP;
//use PHPMailer\PHPMailer\Exception;

function sendMail($subject, $body, $email, $name, $html = false){

    //configuracion inicial de nuestro servidor
    $phpmailer = new PHPMailer();
    $phpmailer->isSMTP();
    $phpmailer->Host = 'smtp.mailtrap.io';
    $phpmailer->SMTPAuth = true;
    $phpmailer->Port = 2525;
    $phpmailer->Username = 'prueba';
    $phpmailer->Password = 'prueba';

    //añadiendo destinatarios
    $phpmailer->setFrom($email , $name);
    $phpmailer->addAddress('contacto@artroxxgaming.com', 'Formulario Contacto');


    //definiendo el contenido del email
    $phpmailer->isHTML($html);                                  //Set email format to HTML
    $phpmailer->Subject = $subject;
    $phpmailer->Body    = $body;

    $phpmailer->send();
}

?>
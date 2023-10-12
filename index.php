<?php
require 'mail.php';

function validate($name , $email , $subject , $message , $form) {
    return !empty($name) && !empty($email) && !empty($subject) && !empty($message);
}

$status = "";

if (isset($_POST["form"])){
    if (validate(... $_POST)){
        $name = $_POST["name"];
        $email = $_POST["email"];
        $subject = $_POST["subject"];
        $message = $_POST["message"];

        $body = "$name <$email> te envia el siguiente mensaje: $message <br><br>";

        //LOGICA PARA MANDAR CORREO
        sendMail($subject , $body, $email, $name, true);

        $status = "success";
    } else {
        $status = "danger";
    }

}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles.css">
    <title>Formulario de contacto</title>
</head>
<body>

    
    

    <form action="./" method="POST">
         <!--Alertas-->

         <?php if ( $status =="success"): ?>
            <div class="alert success" data-emoji="🎉">
                <span><i class="fa-regular fa-circle-check" style="color: #ffffff;"></i> Mensaje enviado con éxito</span>
            </div>
         <?php endif; ?>

         <?php if ( $status =="danger"): ?>
            <div class="alert danger" data-emoji="🥲">
                <span><i class="fa-solid fa-triangle-exclamation" style="color: #ffffff;"></i> Surgió un problema</span>
            </div>
         <?php endif; ?>

         
        

        <h1>Contactame</h1>
        <div class="input-group">
            <label for="name">Nombre:</label>
            <input type="text" name="name" id="name">
        </div>
        <div class="input-group">
            <label for="email">Correo:</label>
            <input type="text" name="email" id="email">
        </div>
        <div class="input-group">
            <label for="subject">Asunto:</label>
            <input type="text" name="subject" id="subject">
        </div>
        <div class="input-group">
            <label for="message">Mensaje:</label>
            <textarea name="message" id="message">

            </textarea>
        </div>
        <div class="button-container">
            <button name="form" type="submit">Enviar</button>
        </div>
        <div class="contact-info">
            <div class="info">
                <span><i class="fa-solid fa-house" style="color: #007BFF;"></i> Asuncion-Paraguay</span>
            </div>
            <div class="info">
                <span><i class="fa-solid fa-phone" style="color: #007BFF;"></i> +595 972 755 275</span>
            </div>
        </div>

       
    </form>

    <script src="https://kit.fontawesome.com/2a5e337322.js" crossorigin="anonymous"></script>
    
</body>
</html>
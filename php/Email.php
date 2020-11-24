<?php
    function email($email,$nomrbre,$apellidos,$passEmail,$dia,$fecha_expiracion,$nombrePDFcompleto){
        require("class.phpmailer.php");
        $mail = new PHPMailer();
        $mail->From = "proyecto.films.online@gmail.com";
        $mail->FromName = "Films-online";
        $mail->Subject = "Bienvenido a Films-online";
        $mail->AddAddress($email,$nomrbre);
        $body = 'Bienvenido, '.$nomrbre.' '.$apellidos. ' se ha dado de alta en Films-online, su password es: '.$passEmail.', a realizado una suscripcion de '.$dia.' dias y que expira en: '.$fecha_expiracion;
        $mail->Body = $body;
        //adjuntamos un archivo
        $mail->AddAttachment($nombrePDFcompleto,$nombrePDFcompleto);
        $mail->Send();
    }

    function emailContraseña($emailUsuario,$nombreUsuario,$apellidoUsuario,$password){
        $para = $emailUsuario;
        $titulo = 'Cambio de password Films-online';
        $mensaje = 'Hola, '.$nombreUsuario.' '.$apellidoUsuario. ' se ha realizado el cambio de password y su nueva password es: '.$password;
        $mensaje = wordwrap($mensaje, 70, "\r\n");
        $cabeceras = 'From: proyecto.films.online@gmail.com' . "\r\n" .
                'Reply-To: proyecto.films.online@gmail.com' . "\r\n" .
                'X-Mailer: PHP/' . phpversion();
        mail($para, $titulo, $mensaje, $cabeceras);
    }

    function emailRenovacion($email,$dia,$fecha_expiracion,$nombrePDFcompleto){
        require("class.phpmailer.php");
        $mail = new PHPMailer();
        $mail->From = "proyecto.films.online@gmail.com";
        $mail->FromName = "Films-online";
        $mail->Subject = "Renovacion a Films-online";
        $mail->AddAddress($email);
        $body = 'Se ha renovado su suscripcion en Films-online, a realizado una suscripcion de '.$dia.' dias y que expira en: '.$fecha_expiracion;
        $mail->Body = $body;
        //adjuntamos un archivo
        $mail->AddAttachment($nombrePDFcompleto,$nombrePDFcompleto);
        $mail->Send();
    }
?>    
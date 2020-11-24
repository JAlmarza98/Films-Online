<?php
    //Incluimos las funciones de mandar los correos pertinentes.
    include 'Email.php';

    $nomrbre = ucwords($_POST['Name']);
    $apellidos = ucwords($_POST['LastName']);
    $email = $_POST['Email'];

    $nombreUsuario = "";
    $apellidoUsuario = "";
    $emailUsuario = "";
    
    $conexion = mysqli_connect('localhost', 'root', '', 'films_online');
    mysqli_set_charset($conexion, 'UTF8');
    $consulta = "select nombreUsuario,apellidoUsuario,email from usuarios where nombreUsuario='".$nomrbre."' and apellidoUsuario='".$apellidos."' and email='".$email."'";
    $resultado = mysqli_query($conexion, $consulta);
    while($fila = mysqli_fetch_row($resultado)){
        $nombreUsuario = (string) $fila[0];
        $apellidoUsuario = (string) $fila[1];
        $emailUsuario = (string) $fila[2];
    } 
    
    //Comprobamos si existe el usuario de forma si hay valores existe sino no existe.
    if($nombreUsuario == "" && $apellidoUsuario == "" && $emailUsuario == ""){
        //sino existe redireccionamos con el error.
        header("Location: Recuperacion.php?error=si");
    }else{
        //existe el usuario.
        //carácteres para la contraseña.
        $str1 = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $str2 = "abcdefghijklmnopqrstuvwxyz";
        $str3 = "0123456789";
        $str4 = "$@$!%*?&";
        $password = "";

        for($i=0;$i<4;$i++) {
            //obtenemos un caracter aleatorio escogido de la cadena de caracteres que son mayusculas.
            $password .= substr($str1,rand(0,26),1);
        }

        for($i=0;$i<4;$i++) {
            //obtenemos un caracter aleatorio escogido de la cadena de caracteres que son minusculas.
            $password .= substr($str2,rand(0,26),1);
        }

        //caracter de tipo numerico.
        $password .= substr($str3,rand(0,9),1);
        //caracter de tipo especial.        
        $password .= substr($str4,rand(0,7),1); 
        //Mezclamos los caracteres.
        $password = str_shuffle($password);
        $hass=password_hash($password, PASSWORD_DEFAULT);

        $consulta2 = "update usuarios SET hashpass='".$hass."' WHERE email='".$email."'";
        
        if(!($resultado2 = mysqli_query ( $conexion, $consulta2))){
            //Si hay algun error se devuelve a la pagina anterior y se especifica al usuario que repita el procedimiento.
            header("Location: Recuperacion.php?errorProceso=si");

        }else{
            //Se crea el correo donde se informa al usuario.
            emailContraseña($emailUsuario,$nombreUsuario,$apellidoUsuario,$password);
            header("Location: ../html/CorreoRecuperacion.html");
        }
    }

    mysqli_close($conexion);
?>
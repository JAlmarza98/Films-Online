<?php
    // Patrón para usar en expresiones regulares nombre,apellido y drección (admite letras acentuadas y espacios):
    $patron_texto = "/^[a-zA-ZáéíóúÁÉÍÓÚäëïöüÄËÏÖÜàèìòùÀÈÌÒÙ\s]+$/";
    // Patrón para usar en expresiones regulares telefono:
    $patron_telefono = "/^[0-9]{9,9}$/";

    if(isset($_POST['AddName']) && isset($_POST['AddLastName']) && isset($_POST['AddDirection']) && isset($_POST['AddTelf']) && isset($_POST['AddPassword'])){
        if(empty($_POST['AddName'])){
            header('Location: EditarUsers.php?Name=si');
        }else{
            if( preg_match($patron_texto, $_POST['AddName'])){
                $nombre=$_POST['AddName'];
                $nombreValido=true;
            }else{
                header('Location: EditarUsers.php?NameError=si');
            }
        }

        if(empty($_POST['AddLastName'])){
            header('Location: EditarUsers.php?LastName=si');
        }else{
            if( preg_match($patron_texto, $_POST['AddLastName'])){
                $apellido=$_POST['AddLastName'];
                $apellidoValido=true;
            }else{
                header('Location: EditarUsers.php?LastNameError=si');
            }
        }

        if(empty($_POST['AddTelf'])){
            $tel=$_POST['AddTelf'];
            $telValido=true;
        }else{
            if(preg_match($patron_telefono, $_POST['AddTelf'])){
                $tel=$_POST['AddTelf'];
                $telValido=true;
            }else{
                header('Location: EditarUsers.php?TelfError=si');
            }
        }

        if(empty($_POST['AddPassword'])){
            $pass=$_POST['AddPassword'];
            $passValido=true;
        }else{
            if(!preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,15}$/', $_POST['AddPassword'])) {
                header('Location: EditarUsers.php?PasswordError=si');
            }else{
                $pass=$_POST['AddPassword'];
                $passValido=true;
            }
        }

        if($nombreValido && $apellidoValido && $telValido && $passValido){
            $conexion=mysqli_connect('localhost', 'root', '', 'films_online');
            mysqli_set_charset($conexion, 'UTF8');
            $hashpass="";
            if(empty($pass)){
                $consulta="SELECT hashpass FROM usuarios WHERE idUsuario='".$_COOKIE["Id"]."' and email='".$_COOKIE["Usuario"]."'";
                $resultado=mysqli_query($conexion,$consulta);
    
                while($fila=mysqli_fetch_row($resultado)){
                    $hashpass=$fila[0];        
                }
            }else{
                $hashpass=password_hash($pass, PASSWORD_DEFAULT);
            }

            $consulta2="UPDATE usuarios SET nombreUsuario='".$nombre."',apellidoUsuario='".$apellido."',hashpass='".$hashpass."',direccion='".$_POST['AddDirection']."',telefono='".$tel."' 
            WHERE idUsuario='".$_COOKIE["Id"]."' and email='".$_COOKIE["Usuario"]."'";
           
           if (mysqli_query($conexion, $consulta2)) {
                echo "Usuario modificado";
                header("Location: EditarUsers.php");
            } else {
                echo "Error: " . $consulta2 . "<br>" . mysqli_error($conexion);
            }

            mysqli_close($conexion);
        }
    }
?>
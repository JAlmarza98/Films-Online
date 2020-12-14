<?php
    $email=$_POST['LoginEmail'];
    $password=$_POST['LoginPassword'];
    $fecha_actual=date("Y-m-d");

    $conexion=mysqli_connect('localhost', 'root', '', 'films_online');
    mysqli_set_charset($conexion, 'UTF8');
    $consulta ="select u.idUsuario,u.email,u.hashpass,MAX(f.fechaExpiracion),u.nivel from usuarios u,facturacion f where u.idUsuario=f.idUsuario and email='".$email."'";
        if($resultado=mysqli_query($conexion,$consulta)){
            $fila=mysqli_fetch_row($resultado);
            if($fila!=NULL){
                if(password_verify($password,$fila[2])){
                    if($fecha_actual<=$fila[3] || $fila[4]==0){
                        setcookie("Usuario", $email, time() + 36000, "/");
                        setcookie("Id", $fila[0], time() + 36000, "/");
                        setcookie("Tiempo", $fila[3], time() + 36000, "/");
                        setcookie("Nivel", $fila[4], time() + 36000, "/");
                        header('Location: ./Catalogo.php');
                    }else{
                        setcookie("Usuario", $email, time() + 36000, "/");
                        setcookie("Id", $fila[0], time() + 36000, "/");
                        header('Location: ./Renovacion.php');
                    }
                }else{   
                    header('Location: ../index.php?error=si');  
                }
            }else{
                header('Location: ../index.php?error=si');
            }
        }
    mysqli_close($conexion);
?>
<?php
    $email=$_POST['LoginEmail'];
    $password=$_POST['LoginPassword'];
    $fecha_actual=date("Y-m-d");

    $conexion=mysqli_connect('localhost', 'root', '', 'films_online');
    mysqli_set_charset($conexion, 'UTF8');
    $consulta ="select u.email,u.hashpass,MAX(f.fechaExpiracion) from usuarios u,facturacion f where u.idUsuario=f.idUsuario and email='".$email."'";
        if($resultado=mysqli_query($conexion,$consulta)){
            $fila=mysqli_fetch_row($resultado);
            if($fila!=NULL){
                if(password_verify($password,$fila[1])){ 
                    if($fecha_actual<=$fila[2]){
                        header('Location: ./Catalogo.php');
                    }else{
                        setcookie("Usuario", $email, time() + 3600);
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
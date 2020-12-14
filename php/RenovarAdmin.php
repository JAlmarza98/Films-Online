<?php
    $id=$_GET['id'];
    if($id==""){
        header("Location: Users.php?errorProceso=si"); 
    }
    $dias=$_GET['dias'];
    $conexion=mysqli_connect('localhost', 'root', '', 'films_online');
    mysqli_set_charset($conexion, 'UTF8');
    $result = $conexion->query("SELECT COUNT(*) as total_products FROM usuarios WHERE idUsuario=$id");
    $row = $result->fetch_assoc();
    $num_total_rows = $row['total_products'];

    if ($num_total_rows > 0) {

        $fecha_actual=date("Y-m-d");
        //sumo dias
        if($dias==30){
            $fecha_expiracion=date("Y-m-d",strtotime($fecha_actual."+ 30 days"));
            $idPrecios=1;
        }elseif($dias==90){
            $fecha_expiracion=date("Y-m-d",strtotime($fecha_actual."+ 90 days"));
            $idPrecios=2;
        }else if($dias==360){
            $fecha_expiracion=date("Y-m-d",strtotime($fecha_actual."+ 360 days"));
            $idPrecios=3;
        }else{
            header("Location: Users.php?errorDias=si");
        }

        $consulta2="insert into facturacion (fechaFacturacion,fechaExpiracion,idusuario,idPrecios,nombreFacturacion,tipo) values ('".$fecha_actual."','".$fecha_expiracion."',$id,$idPrecios,'".$_COOKIE['Usuario']."','ADMIN')";
        if (mysqli_query($conexion, $consulta2)) {
            echo "Nueva factura añadida";
            header("Location: Users.php");
        } else {
            echo "Error: " . $consulta2 . "<br>" . mysqli_error($conexion);
        }

        
    }else{
        header("Location: Users.php?errorProceso=si");
    }

    mysqli_close($conexion);
?>
<?php
    //Incluimos las funciones de crear los pdf.
    include '../pdf/CrearPDF.php';
    
    $email=$_COOKIE["Usuario"];
    $tipo=$_POST['tipo'];
    
    $fecha_actual=date("Y-m-d");
    //sumo dias
    if($tipo==1){
        $fecha_expiracion=date("Y-m-d",strtotime($fecha_actual."+ 30 days"));
        $dia=30;
    }elseif($tipo==2){
        $fecha_expiracion=date("Y-m-d",strtotime($fecha_actual."+ 90 days"));
        $dia=90;
    }else if($tipo==3){
        $fecha_expiracion=date("Y-m-d",strtotime($fecha_actual."+ 360 days"));
        $dia=360;
    }else{
        header("Location: Registrar.php?errorProceso=si");
    }

    if($_POST['metodo']=='visa'){
        //Se crea el usuario y la factura
        $NombreyApellidos=strtoupper($_POST['NombreyApellidos']);
        $metedoPago="Visa";

        $conexion=mysqli_connect('localhost', 'root', '', 'films_online');
        mysqli_set_charset($conexion, 'UTF8');
            
        $consulta1="Select idUsuario from usuarios where email='".$email."'";
        $resultado=mysqli_query($conexion,$consulta1);
        while($fila=mysqli_fetch_row($resultado)){
            $idUsuario=$fila[0];
        }
    
        $consulta2="insert into facturacion (fechaFacturacion,fechaExpiracion,idusuario,idPrecios,nombreFacturacion,tipo) values ('".$fecha_actual."','".$fecha_expiracion."',$idUsuario,$tipo,'".$NombreyApellidos."','Visa')";
        if (mysqli_query($conexion, $consulta2)) {
            echo "Nueva factura añadida";
        } else {
            echo "Error: " . $consulta2 . "<br>" . mysqli_error($conexion);
        }
    
        mysqli_close($conexion);

        //Creamos el pdf y el correo, se lo adjuntmaos y s elo mandamos al usuario.
        renovarPDF($email,$dia,$fecha_expiracion,$metedoPago,$NombreyApellidos,$fecha_actual);
        //Redireccion
        header("Location: ../html/ConfirmacionRenovacion.html");
        exit; 
    }elseif($_POST['metodo']=='paypal'){
        //Se crea el usuario y la factura
        $EmailPaypal=ucwords($_POST['EmailPaypal']);
        $metedoPago="Paypal";

        $conexion=mysqli_connect('localhost', 'root', '', 'films_online');
            mysqli_set_charset($conexion, 'UTF8');
            
        $consulta1="Select idUsuario from usuarios where email='".$email."'";
        $resultado=mysqli_query($conexion,$consulta1);
        while($fila=mysqli_fetch_row($resultado)){
            $idUsuario=$fila[0];
        }
    
        $consulta2="insert into facturacion (fechaFacturacion,fechaExpiracion,idusuario,idPrecios,nombreFacturacion,tipo) values ('".$fecha_actual."','".$fecha_expiracion."',$idUsuario,$tipo,'".$EmailPaypal."','Paypal')";
        if (mysqli_query($conexion, $consulta2)) {
            echo "Nueva factura añadida";
        } else {
            echo "Error: " . $consulta2 . "<br>" . mysqli_error($conexion);
        }
    
        mysqli_close($conexion);

        //Creamos el pdf y el correo, se lo adjuntmaos y s elo mandamos al usuario.
        renovarPDF($email,$dia,$fecha_expiracion,$metedoPago,$NombreyApellidos,$fecha_actual);
        //Redireccion
        header("Location: ../html/ConfirmacionRenovacion.html");
        exit;
    }else{
        //Error3.php, no se ha seleccionado ni paypal ni visa.
        header("Location: Renovacion.php?errorProceso=si");
    }
    
?>
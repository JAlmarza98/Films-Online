<?php
    //Incluimos las funciones de crear los pdf.
    include '../pdf/CrearPDF.php';

    $email=$_POST['AddEmail'];
    $existe=false;

    //Comprobamos que no exista el usuario.
    $conexion=mysqli_connect('localhost', 'root', '', 'films_online');
    $consulta="select * from usuarios where email='".$email."'";
    $resultado=mysqli_query($conexion,$consulta);
    $cantidad=mysqli_num_rows($resultado);
    if($cantidad>0){
        $existe=false;
    }else{
        $existe=true;
    }
    mysqli_close($conexion);

    if(!$existe){
        //Si existe lo devolvemos con este error que es Error4.php.
        header("Location: Registrar.php?errorEmail=si");
    }else{
        //Sino existe.
        $nomrbre=ucwords($_POST['AddName']);
        $apellidos=ucwords($_POST['AddLastName']);
        $direccion=ucwords($_POST['AddDirection']);
        if($direccion==""){
            $direccion="Null";
        }
        $telefono=$_POST['AddTelf'];
        if($telefono==""){
            $telefono="Null";
        }
        $pass=$_POST['AddPassword'];
        $passEmail=$pass;
        $pass=password_hash($pass, PASSWORD_DEFAULT);
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
            
            $consulta="insert into usuarios (nombreUsuario,apellidoUsuario,email,hashpass,direccion,telefono,nivel) values ('".$nomrbre."','".$apellidos."','".$email."','".$pass."','".$direccion."',".$telefono.",1)";
            if (mysqli_query($conexion, $consulta)) {
                echo "Nuevo usuario creado";
            } else {
                echo "Error: " . $consulta . "<br>" . mysqli_error($conexion);
            }
    
            $consulta2="Select idUsuario from usuarios where email='".$email."'";
            $resultado=mysqli_query($conexion,$consulta2);
            while($fila=mysqli_fetch_row($resultado)){
                $idUsuario=$fila[0];
            }
    
            $consulta3="insert into facturacion (fechaFacturacion,fechaExpiracion,idusuario,idPrecios,nombreFacturacion,tipo) values ('".$fecha_actual."','".$fecha_expiracion."',$idUsuario,$tipo,'".$NombreyApellidos."','Visa')";
            if (mysqli_query($conexion, $consulta3)) {
                echo "Nueva factura creada";
            } else {
                echo "Error: " . $consulta3 . "<br>" . mysqli_error($conexion);
            }
    
            mysqli_close($conexion);

            //Creamos el pdf y el correo, se lo adjuntmaos y s elo mandamos al usuario.
            crearPDF($email,$nomrbre,$apellidos,$passEmail,$dia,$fecha_expiracion,$metedoPago,$NombreyApellidos,$fecha_actual);
            //Redireccion
            header("Location: ../html/ConfirmacionCuenta.html");
            exit; 
        }elseif($_POST['metodo']=='paypal'){
            //Se crea el usuario y la factura
            $EmailPaypal=ucwords($_POST['EmailPaypal']);
            $metedoPago="Paypal";

            $conexion=mysqli_connect('localhost', 'root', '', 'films_online');
            mysqli_set_charset($conexion, 'UTF8');
            
            $consulta="insert into usuarios (nombreUsuario,apellidoUsuario,email,hashpass,direccion,telefono,nivel) values ('".$nomrbre."','".$apellidos."','".$email."','".$pass."','".$direccion."',".$telefono.",1)";
            if (mysqli_query($conexion, $consulta)) {
                echo "Nuevo usuario creado";
            } else {
                echo "Error: " . $consulta . "<br>" . mysqli_error($conexion);
            }
    
            $consulta2="Select idUsuario from usuarios where email='".$email."'";
            $resultado=mysqli_query($conexion,$consulta2);
            while($fila=mysqli_fetch_row($resultado)){
                $idUsuario=$fila[0];
            }
    
            $consulta3="insert into facturacion (fechaFacturacion,fechaExpiracion,idusuario,idPrecios,nombreFacturacion,tipo) values ('".$fecha_actual."','".$fecha_expiracion."',$idUsuario,$tipo,'".$EmailPaypal."','Paypal')";
            if (mysqli_query($conexion, $consulta3)) {
                echo "Nueva factura creada";
            } else {
                echo "Error: " . $consulta3 . "<br>" . mysqli_error($conexion);
            }
    
            mysqli_close($conexion);

            //Creamos el pdf y el correo, se lo adjuntmaos y s elo mandamos al usuario.
            crearPDF($email,$nomrbre,$apellidos,$passEmail,$dia,$fecha_expiracion,$metedoPago,$EmailPaypal,$fecha_actual);
            //Redireccion
            header("Location: ../html/ConfirmacionCuenta.html");
            exit;
        }else{
            //Error3.php, no se ha seleccionado ni paypal ni visa.
            header("Location: Registrar.php?errorProceso=si");
        }
    }
?>
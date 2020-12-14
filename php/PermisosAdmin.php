<?php
$id=$_GET['id'];
if($id==""){
    header("Location: Users.php?errorProceso=si"); 
}
$conexion=mysqli_connect('localhost', 'root', '', 'films_online');
mysqli_set_charset($conexion, 'UTF8');
$result = $conexion->query("SELECT COUNT(*) as total_products FROM usuarios WHERE idUsuario=$id");
$row = $result->fetch_assoc();
$num_total_rows = $row['total_products'];

if ($num_total_rows > 0) {

    $consulta2="SELECT nivel FROM usuarios WHERE idUsuario=$id";
    $resultado=mysqli_query($conexion,$consulta2);
                    
    while($fila=mysqli_fetch_row($resultado)){
      $nivel=$fila[0];
    }

    if($nivel==0){
        $consulta3="UPDATE usuarios SET nivel='1' WHERE idUsuario=$id";
    }else{
        $consulta3="UPDATE usuarios SET nivel='0' WHERE idUsuario=$id";
    }
    if (mysqli_query($conexion, $consulta3)) {
        echo "Permisos de usuario cambiado";
        header("Location: Users.php");
    } else {
        echo "Error: " . $consulta3 . "<br>" . mysqli_error($conexion);
    }

}else{
    header("Location: Users.php?errorProceso=si");
}

mysqli_close($conexion);
?>
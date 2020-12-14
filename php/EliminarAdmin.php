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

    $consulta2="DELETE FROM usuarios WHERE idUsuario=$id";
    if (mysqli_query($conexion, $consulta2)) {
        echo "Usuario eliminado";
        header("Location: Users.php");
    } else {
        echo "Error: " . $consulta2 . "<br>" . mysqli_error($conexion);
    }

    
}else{
    header("Location: Users.php?errorProceso=si");
}

mysqli_close($conexion);
?>
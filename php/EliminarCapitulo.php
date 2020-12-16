<?php
$id=$_GET['id'];
if($id==""){
    header("Location: SeriesAdmin.php?errorProcesoEliminar=si"); 
}
$conexion=mysqli_connect('localhost', 'root', '', 'films_online');
mysqli_set_charset($conexion, 'UTF8');
$result = $conexion->query("SELECT COUNT(*) as total_products FROM temporadas WHERE idTemporadas=$id");
$row = $result->fetch_assoc();
$num_total_rows = $row['total_products'];

if ($num_total_rows > 0) {

    $consulta2="SELECT ruta FROM temporadas WHERE idTemporadas=$id";
    $resultado=mysqli_query($conexion,$consulta2);
                    
    while($fila=mysqli_fetch_row($resultado)){
      $ruta=$fila[0];
    }

    $filename = "..".$ruta;

    unlink($filename);

    $consulta3="DELETE FROM temporadas WHERE idTemporadas=$id";
    if (mysqli_query($conexion, $consulta3)) {
        echo "Capitulo eliminado";
        header("Location: SeriesAdmin.php");
    } else {
        echo "Error: " . $consulta3 . "<br>" . mysqli_error($conexion);
    }

}else{
    header("Location: SeriesAdmin.php?errorProcesoEliminar=si");
}

mysqli_close($conexion);
?>
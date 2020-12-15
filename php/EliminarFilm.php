<?php
$id=$_GET['id'];
if($id==""){
    header("Location: Users.php?errorProceso=si"); 
}
$conexion=mysqli_connect('localhost', 'root', '', 'films_online');
mysqli_set_charset($conexion, 'UTF8');
$result = $conexion->query("SELECT COUNT(*) as total_products FROM peliculasseries WHERE idPeliculasSeries=$id");
$row = $result->fetch_assoc();
$num_total_rows = $row['total_products'];

if ($num_total_rows > 0) {

    $consulta2="SELECT nombre FROM peliculasseries WHERE idPeliculasSeries=$id";
    $resultado=mysqli_query($conexion,$consulta2);
                    
    while($fila=mysqli_fetch_row($resultado)){
      $nombre=$fila[0];
      $nombreCambiado=str_replace(' ','-',$nombre);
    }

    $targetPath = $_SERVER['DOCUMENT_ROOT']."/Films-Online/img/peliculas/".$nombreCambiado;
    $targetFile =  str_replace('//','/',$targetPath);
    $targetPath2 = $_SERVER['DOCUMENT_ROOT']."/Films-Online/video/peliculas/".$nombreCambiado;
    $targetFile2 =  str_replace('//','/',$targetPath2);

    $files = glob($targetFile.'/*'); //obtenemos todos los nombres de los ficheros
    foreach($files as $file){
        if(is_file($file))
        unlink($file); //elimino el fichero
    }
    @rmdir($targetFile);

    $files = glob($targetFile2.'/*'); //obtenemos todos los nombres de los ficheros
    foreach($files as $file){
        if(is_file($file))
        unlink($file); //elimino el fichero
    }
    @rmdir($targetFile2);

    $consulta3="DELETE FROM peliculasseries WHERE idPeliculasSeries=$id";
    if (mysqli_query($conexion, $consulta3)) {
        echo "pelicula eliminada";
        header("Location: Films.php");
    } else {
        echo "Error: " . $consulta3 . "<br>" . mysqli_error($conexion);
    }

    
}else{
    header("Location: Films.php?errorProceso=si");
}

mysqli_close($conexion);
?>
<?php
    $id=$_POST['id'];
    if($id==""){
        header("SeriesAdmin.php"); 
    }

    $nombreSerie=$_POST['nombreSerie'];
    if($nombreSerie==""){
        header("SeriesAdmin.php?errorCapitulo=si"); 
    }

    if($_POST['capNombre']==""){
        header('Location: SeriesAdmin.php?errorCapitulo=si');
    }else{
        $nombre=$_POST['capNombre'];
        $nombreValido=true;
    }

    if($_POST['capNumero']==""){
        header('Location: SeriesAdmin.php?errorCapitulo=si');
    }else{
        $numero=$_POST['capNumero'];
        $numeroValido=true;
    }

    if($_FILES['capitulo']==""){
        header('Location: SeriesAdmin.php?errorCapitulo=si');
    }else{
        $capitulo=$_FILES['capitulo'];
        $capituloValido=validar($_FILES['capitulo']['name'],"video");
    }

    if($nombreValido && $numeroValido && $capituloValido){
        $fecha_actual=date("Y-m-d");
        $nombreCambiado=str_replace(' ','-',$nombreSerie);

        $targetPath = $_SERVER['DOCUMENT_ROOT']."/Films-Online/video/series/".$nombreCambiado;
        $targetFile =  str_replace('//','/',$targetPath);

        if(move_uploaded_file($_FILES['capitulo']['tmp_name'],$targetFile."/".$_FILES['capitulo']['name'])){
            echo "Subida completada. ";
        }else{
            echo "Subida incompleta. ";
        }

        $conexion=mysqli_connect('localhost', 'root', '', 'films_online');
        mysqli_set_charset($conexion, 'UTF8');
        
        $consulta="insert into temporadas (numero,nombre,ruta,idPeliculasSeries) 
        values ('".$numero."','".$nombre."','/video/series/$nombreCambiado/".$_FILES['capitulo']['name']."',$id)";
        
        if (mysqli_query($conexion, $consulta)) {
            echo "Nueva serie añadida";
        } else {
            echo "Error: " . $consulta . "<br>" . mysqli_error($conexion);
        }

        $consulta2="UPDATE peliculasseries 
        SET fechaActualizacion='".$fecha_actual."'
        WHERE idPeliculasSeries=$id";
        
        if (mysqli_query($conexion, $consulta2)) {
            echo "Pelicula modificada.";
            header("Location: SeriesAdmin.php");
        } else {
            echo "Error: " . $consulta2 . "<br>" . mysqli_error($conexion);
        }

        mysqli_close($conexion);
    }else{
        header("Location: SeriesAdmin.php?capituloVacio=si");
    }

function validar($contenido,$tipo){
    $fragmentos = explode(".", $contenido);
    $extension = end($fragmentos);

    if($tipo=="img"){
        $extensiones_validas = array("jpg", "png", "jpeg", "tiff", "tif", "svg");
    }else{
        $extensiones_validas = array("avi", "mp4", "mkv", "flv", "mov", "wmv");
    }

    foreach ($extensiones_validas as $valorValido){
        if(strcmp($extension, $valorValido) === 0){
            return true;
            break;
        }
    }
    return false;
}
?>
<?php

    if($_POST['peliculaName']==""){
        header('Location: Films.php');
    }else{
        $nombre=$_POST['peliculaName'];
        $nombreValido=true;
    }

    if($_POST['peliculaCategoria']==""){
        header('Location: Films.php');
    }else{
        $categoria=$_POST['peliculaCategoria'];
        $categoriaValido=true;
    }

    if($_POST['peliculaYear']==""){
        header('Location: Films.php');
    }else{
        $year=$_POST['peliculaYear'];
        $yearValido=true;
    }

    if($_POST['peliculaDirector']==""){
        header('Location: Films.php');
    }else{
        $director=$_POST['peliculaDirector'];
        $directorValido=true;
    }

    if($_POST['peliculaReparto']==""){
        header('Location: Films.php');
    }else{
        $reparto=$_POST['peliculaReparto'];
        $repartoValido=true;
    }

    if($_POST['peliculaDescipcion']==""){
        header('Location: Films.php');
    }else{
        $descripcion=$_POST['peliculaDescipcion'];
        $descripcionValido=true;
    }

    if($_FILES['cartel']==""){
        header('Location: Films.php');
    }else{
        $cartel=$_FILES['cartel'];
        $cartelValido=validar($_FILES['cartel']['name'],"img");
    }

    if($_FILES['imgPromo']==""){
        header('Location: Films.php');
    }else{
        $imgPromo=$_FILES['imgPromo'];
        $imgPromoValido=validar($_FILES['imgPromo']['name'],"img");
    }

    if($_FILES['trailer']==""){
        header('Location: Films.php');
    }else{
        $trailer=$_FILES['trailer'];
        $trailerValido=validar($_FILES['trailer']['name'],"video");
    }

    if($_FILES['pelicula']==""){
        header('Location: Films.php');
    }else{
        $pelicula=$_FILES['pelicula'];
        $peliculaPromoValido=validar($_FILES['pelicula']['name'],"video");
    }
        
        if($nombreValido && $categoriaValido && $yearValido && $directorValido && $repartoValido && $descripcionValido && $cartelValido && $imgPromoValido && $trailerValido && $peliculaPromoValido){
            $fecha_actual=date("Y-m-d");
            $nombreCambiado=str_replace(' ','-',$nombre);
            if (!is_dir('../img/peliculas/'.$nombreCambiado) && !is_dir('../video/peliculas/'.$nombreCambiado)) {
                mkdir('../img/peliculas/'.$nombreCambiado, 0777);
                mkdir('../video/peliculas/'.$nombreCambiado, 0777);

                $targetPath = $_SERVER['DOCUMENT_ROOT']."/Films-Online/img/peliculas/".$nombreCambiado;
                $targetFile =  str_replace('//','/',$targetPath);
                $targetPath2 = $_SERVER['DOCUMENT_ROOT']."/Films-Online/video/peliculas/".$nombreCambiado;
                $targetFile2 =  str_replace('//','/',$targetPath2);

                if(move_uploaded_file($_FILES['cartel']['tmp_name'],$targetFile."/".$_FILES['cartel']['name'])){
                    echo "Subida completada. ";
                }else{
                    echo "Subida incompleta. ";
                }

                if(move_uploaded_file($_FILES['imgPromo']['tmp_name'],$targetFile."/".$_FILES['imgPromo']['name'])){
                    echo "Subida completada. ";
                }else{
                    echo "Subida incompleta. ";
                }

                if(move_uploaded_file($_FILES['trailer']['tmp_name'],$targetFile2."/".$_FILES['trailer']['name'])){
                    echo "Subida completada. ";
                }else{
                    echo "Subida incompleta. ";
                }

                if(move_uploaded_file($_FILES['pelicula']['tmp_name'],$targetFile2."/".$_FILES['pelicula']['name'])){
                    echo "Subida completada. ";
                }else{
                    echo "Subida incompleta. ";
                }

                $conexion=mysqli_connect('localhost', 'root', '', 'films_online');
                mysqli_set_charset($conexion, 'UTF8');
            
                $consulta="insert into peliculasseries (nombre,descripcion,director,actores,categoria,rutaVideo,rutaTrailer,rutaImg,tipo,año,rutaImgPromo,fechaActualizacion) 
                values ('".$nombre."','".$descripcion."','".$director."','".$reparto."','".$categoria."','/video/peliculas/$nombreCambiado/".$_FILES['pelicula']['name']."','/video/peliculas/$nombreCambiado/".$_FILES['trailer']['name']."','/img/peliculas/$nombreCambiado/".$_FILES['cartel']['name']."','pelicula','$year','/img/peliculas/$nombreCambiado/".$_FILES['imgPromo']['name']."','".$fecha_actual."')";
                 if (mysqli_query($conexion, $consulta)) {
                    echo "Nueva pelicula añadida";
                    header("Location: Films.php");
                } else {
                    echo "Error: " . $consulta . "<br>" . mysqli_error($conexion);
                }

                mysqli_close($conexion);
            }else{
                header("Location: Films.php?duplicado=si");
            }
        }else{
            header("Location: Films.php?vacio=si");
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
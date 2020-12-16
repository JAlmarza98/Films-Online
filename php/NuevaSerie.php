<?php

    if($_POST['serieName']==""){
        header('Location: SeriesAdmin.php');
    }else{
        $nombre=$_POST['serieName'];
        $nombreValido=true;
    }

    if($_POST['serieCategoria']==""){
        header('Location: SeriesAdmin.php');
    }else{
        $categoria=$_POST['serieCategoria'];
        $categoriaValido=true;
    }

    if($_POST['serieYear']==""){
        header('Location: SeriesAdmin.php');
    }else{
        $year=$_POST['serieYear'];
        $yearValido=true;
    }

    if($_POST['serieDirector']==""){
        header('Location: SeriesAdmin.php');
    }else{
        $director=$_POST['serieDirector'];
        $directorValido=true;
    }

    if($_POST['serieReparto']==""){
        header('Location: SeriesAdmin.php');
    }else{
        $reparto=$_POST['serieReparto'];
        $repartoValido=true;
    }

    if($_POST['serieDescipcion']==""){
        header('Location: SeriesAdmin.php');
    }else{
        $descripcion=$_POST['serieDescipcion'];
        $descripcionValido=true;
    }

    if($_FILES['cartel']==""){
        header('Location: SeriesAdmin.php');
    }else{
        $cartel=$_FILES['cartel'];
        $cartelValido=validar($_FILES['cartel']['name'],"img");
    }

    if($_FILES['imgPromo']==""){
        header('Location: SeriesAdmin.php');
    }else{
        $imgPromo=$_FILES['imgPromo'];
        $imgPromoValido=validar($_FILES['imgPromo']['name'],"img");
    }

    if($_FILES['trailer']==""){
        header('Location: SeriesAdmin.php');
    }else{
        $trailer=$_FILES['trailer'];
        $trailerValido=validar($_FILES['trailer']['name'],"video");
    }
        
        if($nombreValido && $categoriaValido && $yearValido && $directorValido && $repartoValido && $descripcionValido && $cartelValido && $imgPromoValido && $trailerValido){
            $fecha_actual=date("Y-m-d");
            $nombreCambiado=str_replace(' ','-',$nombre);
            if (!is_dir('../img/series/'.$nombreCambiado) && !is_dir('../video/series/'.$nombreCambiado)) {
                mkdir('../img/series/'.$nombreCambiado, 0777);
                mkdir('../video/series/'.$nombreCambiado, 0777);

                $targetPath = $_SERVER['DOCUMENT_ROOT']."/Films-Online/img/series/".$nombreCambiado;
                $targetFile =  str_replace('//','/',$targetPath);
                $targetPath2 = $_SERVER['DOCUMENT_ROOT']."/Films-Online/video/series/".$nombreCambiado;
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

                $conexion=mysqli_connect('localhost', 'root', '', 'films_online');
                mysqli_set_charset($conexion, 'UTF8');
            
                $consulta="insert into peliculasseries (nombre,descripcion,director,actores,categoria,rutaTrailer,rutaImg,tipo,año,rutaImgPromo,fechaActualizacion) 
                values ('".$nombre."','".$descripcion."','".$director."','".$reparto."','".$categoria."','/video/series/$nombreCambiado/".$_FILES['trailer']['name']."','/img/series/$nombreCambiado/".$_FILES['cartel']['name']."','serie','$year','/img/series/$nombreCambiado/".$_FILES['imgPromo']['name']."','".$fecha_actual."')";
                 if (mysqli_query($conexion, $consulta)) {
                    echo "Nueva serie añadida";
                    header("Location: SeriesAdmin.php");
                } else {
                    echo "Error: " . $consulta . "<br>" . mysqli_error($conexion);
                }

                mysqli_close($conexion);
            }else{
                header("Location: SeriesAdmin.php?duplicado=si");
            }
        }else{
            header("Location: SeriesAdmin.php?vacio=si");
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
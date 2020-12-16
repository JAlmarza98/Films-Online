<?php
    if(isset($_POST['peliculaName']) && isset($_POST['peliculaCategoria']) && isset($_POST['peliculaDirector']) && isset($_POST['peliculaReparto']) 
    && isset($_POST['peliculaYear']) && isset($_POST['peliculaDescipcion']) && isset($_POST['id'])){
        
        if(empty($_POST['peliculaName'])){
            header("Location: Films.php?errorModificar=si");
        }else{
            $peliculaName=$_POST['peliculaName'];
            $peliculaValido=true;
        }
        
        if(empty($_POST['peliculaCategoria'])){
            header("Location: Films.php?errorModificar=si");
        }else{
            $peliculaCategoria=$_POST['peliculaCategoria'];
            $categoriaValido=true;
        }

        if(empty($_POST['peliculaDirector'])){
            header("Location: Films.php?errorModificar=si");
        }else{
            $peliculaDirector=$_POST['peliculaDirector'];
            $directorValido=true;
        }

        if(empty($_POST['peliculaReparto'])){
            header("Location: Films.php?errorModificar=si");
        }else{
            $peliculaReparto=$_POST['peliculaReparto'];
            $repartoValido=true;
        }

        if(empty($_POST['peliculaYear'])){
            header("Location: Films.php?errorModificar=si");
        }else{
            $peliculaYear=$_POST['peliculaYear'];
            $yearValido=true;
        }

        if(empty($_POST['peliculaDescipcion'])){
            header("Location: Films.php?errorModificar=si");
        }else{
            $peliculaDescipcion=$_POST['peliculaDescipcion'];
            $descripcionValido=true;
        }

        if(empty($_POST['id'])){
            header("Location: Films.php?errorModificar=si");
        }else{
            $id=$_POST['id'];
            $idValido=true;
        }

        if($peliculaValido && $categoriaValido && $directorValido && $repartoValido && $yearValido && $descripcionValido && $idValido){
            $conexion=mysqli_connect('localhost', 'root', '', 'films_online');
            mysqli_set_charset($conexion, 'UTF8');
            $result = $conexion->query("SELECT COUNT(*) as total_products FROM peliculasseries WHERE idPeliculasSeries=$id");
            $row = $result->fetch_assoc();
            $num_total_rows = $row['total_products'];

            if ($num_total_rows > 0) {

                $consulta2="SELECT nombre,rutaVideo,rutaTrailer,rutaImg,rutaImgPromo FROM peliculasseries WHERE idPeliculasSeries=$id";
                $resultado=mysqli_query($conexion,$consulta2);
                    
                while($fila=mysqli_fetch_row($resultado)){
                    $nombre=$fila[0];
                    $nombreCambiado=str_replace(' ','-',$nombre);
                    $rutaVideo=$fila[1];
                    $rutaTrailer=$fila[2];
                    $rutaImg=$fila[3];
                    $rutaImgPromo=$fila[4];
                }

                $porcionesRutaVideo = explode("/", $rutaVideo);
                $porcionesRutaTrailer = explode("/", $rutaTrailer);
                $porcionesRutaImg = explode("/", $rutaImg);
                $porcionesRutaImgPromo = explode("/", $rutaImgPromo);

                $finalRutaVideo = $porcionesRutaVideo[4];
                $finalRutaTrailer = $porcionesRutaTrailer[4];
                $finalRutaImg = $porcionesRutaImg[4];
                $finalRutaImgPromo = $porcionesRutaImgPromo[4];

                $nombreCambiadoNuevo=str_replace(' ','-',$peliculaName);
                
                $targetPath = $_SERVER['DOCUMENT_ROOT']."/Films-Online/img/peliculas/".$nombreCambiado;
                $targetFile =  str_replace('//','/',$targetPath);

                $targetPath2 = $_SERVER['DOCUMENT_ROOT']."/Films-Online/img/peliculas/".$nombreCambiadoNuevo;
                $targetFile2 =  str_replace('//','/',$targetPath2);

                $targetPath3 = $_SERVER['DOCUMENT_ROOT']."/Films-Online/video/peliculas/".$nombreCambiado;
                $targetFile3 =  str_replace('//','/',$targetPath3);

                $targetPath4 = $_SERVER['DOCUMENT_ROOT']."/Films-Online/video/peliculas/".$nombreCambiadoNuevo;
                $targetFile4 =  str_replace('//','/',$targetPath4);

                rename ($targetFile, $targetFile2);
                rename ($targetFile3, $targetFile4);

                $fecha_actual=date("Y-m-d");

                $consulta2="UPDATE peliculasseries 
                SET nombre='".$peliculaName."',descripcion='".$peliculaDescipcion."',director='".$peliculaDirector."',actores='".$peliculaReparto."',categoria='".$peliculaCategoria."',año='".$peliculaYear."'
                ,fechaActualizacion='".$fecha_actual."',rutaVideo='/video/peliculas/$nombreCambiadoNuevo/".$finalRutaVideo."',rutaTrailer='/video/peliculas/$nombreCambiadoNuevo/".$finalRutaTrailer."',
                rutaImg='/img/peliculas/$nombreCambiadoNuevo/".$finalRutaImg."',rutaImgPromo='/img/peliculas/$nombreCambiadoNuevo/".$finalRutaImgPromo."' 
                WHERE idPeliculasSeries=$id";
                
                if (mysqli_query($conexion, $consulta2)) {
                    echo "Pelicula modificada.";
                    header("Location: Films.php");
                } else {
                    echo "Error: " . $consulta2 . "<br>" . mysqli_error($conexion);
                }

            }else{
                header("Location: Films.php");
            }

            mysqli_close($conexion);
        }else{
            header("Location: Films.php?errorModificar=si");
        }

    }else{
        header("Location: Films.php");
    }
?>
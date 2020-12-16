<?php
    if(isset($_POST['serieName']) && isset($_POST['serieCategoria']) && isset($_POST['serieDirector']) && isset($_POST['serieReparto']) 
    && isset($_POST['serieYear']) && isset($_POST['serieDescipcion']) && isset($_POST['id'])){
        
        if(empty($_POST['serieName'])){
            header("Location: SeriesAdmin.php?errorModificar=si");
        }else{
            $serieName=$_POST['serieName'];
            $serieValido=true;
        }
        
        if(empty($_POST['serieCategoria'])){
            header("Location: SeriesAdmin.php?errorModificar=si");
        }else{
            $serieCategoria=$_POST['serieCategoria'];
            $categoriaValido=true;
        }

        if(empty($_POST['serieDirector'])){
            header("Location: SeriesAdmin.php?errorModificar=si");
        }else{
            $serieDirector=$_POST['serieDirector'];
            $directorValido=true;
        }

        if(empty($_POST['serieReparto'])){
            header("Location: SeriesAdmin.php?errorModificar=si");
        }else{
            $serieReparto=$_POST['serieReparto'];
            $repartoValido=true;
        }

        if(empty($_POST['serieYear'])){
            header("Location: SeriesAdmin.php?errorModificar=si");
        }else{
            $serieYear=$_POST['serieYear'];
            $yearValido=true;
        }

        if(empty($_POST['serieDescipcion'])){
            header("Location: SeriesAdmin.php?errorModificar=si");
        }else{
            $serieDescipcion=$_POST['serieDescipcion'];
            $descripcionValido=true;
        }

        if(empty($_POST['id'])){
            header("Location: SeriesAdmin.php?errorModificar=si");
        }else{
            $id=$_POST['id'];
            $idValido=true;
        }

        if($serieValido && $categoriaValido && $directorValido && $repartoValido && $yearValido && $descripcionValido && $idValido){
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

                $nombreCambiadoNuevo=str_replace(' ','-',$serieName);
                
                $targetPath = $_SERVER['DOCUMENT_ROOT']."/Films-Online/img/series/".$nombreCambiado;
                $targetFile =  str_replace('//','/',$targetPath);

                $targetPath2 = $_SERVER['DOCUMENT_ROOT']."/Films-Online/img/series/".$nombreCambiadoNuevo;
                $targetFile2 =  str_replace('//','/',$targetPath2);

                $targetPath3 = $_SERVER['DOCUMENT_ROOT']."/Films-Online/video/series/".$nombreCambiado;
                $targetFile3 =  str_replace('//','/',$targetPath3);

                $targetPath4 = $_SERVER['DOCUMENT_ROOT']."/Films-Online/video/series/".$nombreCambiadoNuevo;
                $targetFile4 =  str_replace('//','/',$targetPath4);

                rename ($targetFile, $targetFile2);
                rename ($targetFile3, $targetFile4);

                $fecha_actual=date("Y-m-d");

                $consulta2="UPDATE peliculasseries 
                SET nombre='".$serieName."',descripcion='".$serieDescipcion."',director='".$serieDirector."',actores='".$serieReparto."',categoria='".$serieCategoria."',año='".$serieYear."'
                ,fechaActualizacion='".$fecha_actual."',rutaTrailer='/video/series/$nombreCambiadoNuevo/".$finalRutaTrailer."',
                rutaImg='/img/series/$nombreCambiadoNuevo/".$finalRutaImg."',rutaImgPromo='/img/series/$nombreCambiadoNuevo/".$finalRutaImgPromo."' 
                WHERE idPeliculasSeries=$id";
                
                if (mysqli_query($conexion, $consulta2)) {
                    echo "Pelicula modificada.";
                    header("Location: SeriesAdmin.php");
                } else {
                    echo "Error: " . $consulta2 . "<br>" . mysqli_error($conexion);
                }

            }else{
                header("Location: SeriesAdmin.php");
            }

            mysqli_close($conexion);
        }else{
            header("Location: SeriesAdmin.php?errorModificar=si");
        }

    }else{
        header("Location: SeriesAdmin.php");
    }
?>
<?php
    include 'MostrarCatalogo.php';

    function mostrarBusqueda($tipoBusqueda,$buscar){
        $conexion=mysqli_connect('localhost', 'root', '', 'films_online');
        mysqli_set_charset($conexion, 'UTF8');
        if($tipoBusqueda=="director"){
            $result = $conexion->query("SELECT COUNT(*) as total_products FROM peliculasseries WHERE director LIKE '%$buscar%'");
        }else if($tipoBusqueda=="actor"){
            $result = $conexion->query("SELECT COUNT(*) as total_products FROM peliculasseries WHERE actores LIKE '%$buscar%'");
        }else{
            $result = $conexion->query("SELECT COUNT(*) as total_products FROM peliculasseries WHERE nombre LIKE '%$buscar%'");
        }
        $row = $result->fetch_assoc();
        $num_total_rows = $row['total_products'];
        $aux=0;

        if ($num_total_rows > 0) {

            if($tipoBusqueda=="director"){
                $consulta="SELECT idPeliculasSeries,rutaImg,nombre,categoria,año,rating,director,actores,descripcion,tipo,rutaImgPromo
                FROM peliculasseries 
                WHERE director LIKE '%$buscar%' order by fechaActualizacion";
            }else if($tipoBusqueda=="actor"){
                $consulta="SELECT idPeliculasSeries,rutaImg,nombre,categoria,año,rating,director,actores,descripcion,tipo,rutaImgPromo
                FROM peliculasseries 
                WHERE actores LIKE '%$buscar%' order by fechaActualizacion";
            }else{
                $consulta="SELECT idPeliculasSeries,rutaImg,nombre,categoria,año,rating,director,actores,descripcion,tipo,rutaImgPromo
                FROM peliculasseries 
                WHERE nombre LIKE '%$buscar%' order by fechaActualizacion";
            }

            $resultado=mysqli_query($conexion,$consulta);

            while($fila=mysqli_fetch_row($resultado)){
                $id=$fila[0];
                $ruta=$fila[1];
                $nombre=$fila[2];
                $nombreReemplazado=str_replace(' ','-',$nombre);
                $titulo=$fila[2];
                $categoria=$fila[3];
                $ano=$fila[4];
                $rating=$fila[5];
                $director=$fila[6];
                $actores=$fila[7];
                $descripcion=$fila[8];
                $tipo=$fila[9];
                $ruta2=$fila[10];
                
                tarjeta($ruta,$nombreReemplazado,$titulo,$categoria,$ano,$rating,$director,$actores,$descripcion,$tipo,$ruta2);
            }

            mysqli_close($conexion);
        }else{
            echo "No hay resultados.";
        }
    }
?>
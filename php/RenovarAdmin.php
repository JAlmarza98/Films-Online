<?php
    $id=$_GET['id'];
    $dias=$_GET['dias'];
    $conexion=mysqli_connect('localhost', 'root', '', 'films_online');
    mysqli_set_charset($conexion, 'UTF8');
    $result = $conexion->query("SELECT COUNT(*) as total_products FROM usuarios WHERE idUsuario=$id");
    $row = $result->fetch_assoc();
    $num_total_rows = $row['total_products'];

    if ($num_total_rows > 0) {

        $consulta="SELECT p.idPeliculasSeries,p.rutaImg,p.nombre,p.categoria,p.año,p.rating,p.director,p.actores,p.descripcion,p.tipo,p.rutaImgPromo
            FROM peliculasseries p,milista m
            WHERE p.idPeliculasSeries=m.idPeliculasSerie and m.idUsuario='".$idUsuario."'";

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
            
            tarjetaQuitar($ruta,$nombreReemplazado,$titulo,$categoria,$ano,$rating,$director,$actores,$descripcion,$tipo,$ruta2);
        }

        mysqli_close($conexion);
    }else{
        echo "<script>
                alert('No se ha actualizado ya que el id no se corresponde a ningun usuario.');
                window.location='Admin.php'
            </script>";
    }
?>
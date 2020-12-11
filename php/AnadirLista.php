<?php
    if(isset($_GET['anadir']) && $_GET['anadir']!=""){
        $nombre=$_GET['anadir'];
        $nombre=str_replace('-',' ',$nombre);
        $idUsuario=$_COOKIE["Id"];

        $conexion=mysqli_connect('localhost', 'root', '', 'films_online');
        mysqli_set_charset($conexion, 'UTF8');

        $consulta="SELECT idPeliculasSeries FROM peliculasseries WHERE nombre='$nombre'";
        $resultado=mysqli_query($conexion,$consulta);
        
        while($fila=mysqli_fetch_row($resultado)){
            $idPelicula=$fila[0];
        }

        $result = $conexion->query('SELECT COUNT(*) as total_products FROM milista WHERE idUsuario="'.$idUsuario.'" and idPeliculasSerie="'.$idPelicula.'"');
        $row = $result->fetch_assoc();
        $num_total_rows = $row['total_products'];
        if ($num_total_rows > 0) {
            header("Location: Lista.php");
        }else{
            $consulta3="insert into milista (idUsuario,idPeliculasSerie) values ('".$idUsuario."','".$idPelicula."')";

            if (mysqli_query($conexion, $consulta3)) {
                echo "Agregado a mi lista.";
                header("Location: Lista.php");
            } else {
                echo "Error: " . $consulta . "<br>" . mysqli_error($conexion);
            }
        }

        mysqli_close($conexion);
    }else{
        echo "<script>
                alert('No se ha podido añadir a la lista intentelo de nuevo, gracias.');
                window.location='Catalogo.php'
            </script>";
    }
?>
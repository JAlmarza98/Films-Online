<?php
    if(isset($_GET['quitar']) && $_GET['quitar']!=""){
        $nombre=$_GET['quitar'];
        $nombre=str_replace('-',' ',$nombre);
        $idUsuario=$_COOKIE["Id"];

        $conexion=mysqli_connect('localhost', 'root', '', 'films_online');
        mysqli_set_charset($conexion, 'UTF8');
        $consulta="SELECT idPeliculasSeries FROM peliculasseries WHERE nombre='$nombre'";
        $resultado=mysqli_query($conexion,$consulta);
        
        while($fila=mysqli_fetch_row($resultado)){
            $idPelicula=$fila[0];
        }

        $consulta2="DELETE FROM milista WHERE idUsuario='$idUsuario' and idPeliculasSerie='$idPelicula'";

        if (mysqli_query($conexion, $consulta2)) {
            echo "Borrado de mi lista.";
            header("Location: Lista.php");
        } else {
            echo "Error: " . $consulta . "<br>" . mysqli_error($conexion);
        }

        mysqli_close($conexion);
    }else{
        echo "<script>
                alert('No se ha podido borrar de la lista intentelo de nuevo, gracias.');
                window.location='Catalogo.php'
            </script>";
    }
?>
<?php
    if(isset($_GET['valor']) && isset($_GET['tipo']) && isset($_GET['nombre'])){
        if($_GET['valor']>=0 && $_GET['valor']<=5){
            $nombre=$_GET['nombre'];
            $conexion=mysqli_connect('localhost', 'root', '', 'films_online');
            mysqli_set_charset($conexion, 'UTF8');



            $consulta="SELECT idPeliculasSeries,votos,numeroVotos FROM peliculasseries WHERE nombre='$nombre'";
            $resultado=mysqli_query($conexion,$consulta);
            $cantidad=mysqli_num_rows($resultado);
            if($cantidad>0){
                while($fila=mysqli_fetch_row($resultado)){
                    $idPelicula=$fila[0];
                    $votos=$fila[1];
                    $numeroVotos=$fila[2];
                }
    
                $votos=$votos+$_GET['valor'];
                $numeroVotos++;
                $rating=$votos/$numeroVotos;
    
                $consulta2="UPDATE peliculasseries SET votos=$votos,numeroVotos=$numeroVotos,rating=$rating WHERE nombre='$nombre'";
    
                if (mysqli_query($conexion, $consulta2)) {
                    echo "Actualizado mi lista.";
                    $nombreReemplazado=str_replace(' ','-',$nombre);
                    if(isset($_GET['tipo'])=="pelicula"){
                        header("Location: Ficha.php?pelicula=$nombreReemplazado");
                    }else if(isset($_GET['tipo'])=="serie"){
                        header("Location: Ficha.php?serie=$nombreReemplazado");
                    }else{
                        echo "<script>
                            alert('No se ha podido añadir el rating intentelo de nuevo, gracias.');
                            window.location='Catalogo.php'
                        </script>";
                    }
                } else {
                    echo "Error: " . $consulta . "<br>" . mysqli_error($conexion);
                }
            }else{
                echo "<script>
                    alert('No se ha podido añadir el rating intentelo de nuevo, gracias.');
                    window.location='Catalogo.php'
                </script>";
            }

            mysqli_close($conexion);
        }else{
            echo "<script>
                    alert('No se ha podido añadir el rating intentelo de nuevo, gracias.');
                    window.location='Catalogo.php'
                </script>";
        }
    }else{
        echo "<script>
                alert('No se ha podido añadir el rating intentelo de nuevo, gracias.');
                window.location='Catalogo.php'
            </script>";
    }
?>
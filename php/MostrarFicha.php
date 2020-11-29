<?php
    function mostrarFichaPelicula($nombrePelicula){
        $nombrePelicula=str_replace('-',' ',$nombrePelicula);
        $conexion=mysqli_connect('localhost', 'root', '', 'films_online');
        mysqli_set_charset($conexion, 'UTF8');
        $consulta="SELECT rutaImg,nombre,categoria,año,rating,director,actores,descripcion,tipo,rutaVideo,rutaTrailer,rutaImgPromo FROM peliculasseries WHERE tipo='pelicula' AND nombre='".$nombrePelicula."'";
        $resultado=mysqli_query($conexion,$consulta);

        while($fila=mysqli_fetch_row($resultado)){
            $rutaImg=$fila[0];
            $titulo=$fila[1];
            $categoria=$fila[2];
            $ano=$fila[3];
            $rating=$fila[4];
            $director=$fila[5];
            $actores=$fila[6];
            $descripcion=$fila[7];
            $tipo=$fila[8];
            $rutaVideo=$fila[9];
            $rutaTrailer=$fila[10];
            $rutaPromo=$fila[11];
        }
        mysqli_close($conexion);

        echo "<div>$titulo</div>";
        echo "<div><img id='fondo' src=\"..$rutaImg\" alt='img' width='10%'></div>";
        echo "<div><p>Categorias:</p>";
        $array = explode(",", $categoria);
        foreach ($array as $valor) {
            $valor=trim($valor);
            echo "<a href='Peliculas.php?genero=$valor'>$valor </a>";
        }
        echo "</div><div><p>Año: <a href='Peliculas.php?ano=$ano'>$ano</a></p></div>";
        echo "<div><p>★$rating<span id='sub'>/5</span></p></div>";
        $array = explode(",", $director);
        echo "<div><p>Director:</p>";
        foreach ($array as $valor) {
            $valor=trim($valor);
            echo "<a href='Buscar.php?director=$valor'>$valor </a>";
        }
        echo "</div><div><p>Actores:</p>";
        $array = explode(",", $actores);
        foreach ($array as $valor) {
            $valor=trim($valor);
            echo "<a href='Buscar.php?actor=$valor'>$valor </a>";
        }
        echo "</div>";
        ?>
        <div type="button" class="item" data-toggle="modal" data-target='#exampleModalTrailer'; ?>
        <?php
            echo "<button type='button'>Ver Trailer</button>";
        ?>
        </div>
            <div class="modal fade" id="exampleModalTrailer" tabindex="-1" role="dialog" aria-labelledby="exampleModalTrailer" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-body">
                            <video width='320' height='240' poster='<?php echo "../".$rutaPromo?>' controls>
                                <source src='<?php echo "../".$rutaTrailer?>' type='video/mp4'>
                                Your browser does not support the video tag.
                            </video>
                        </div>
                    </div>
                </div>
            </div>
        <?php
        ?>
        <div type="button" class="item" data-toggle="modal" data-target='#exampleModalPelicula'; ?>
        <?php
            echo "<button type='button'>Ver Pelicula</button>";
        ?>
        </div>
            <div class="modal fade" id="exampleModalPelicula" tabindex="-1" role="dialog" aria-labelledby="exampleModalPelicula" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-body">
                            <video width='320' height='240' poster='<?php echo "../".$rutaPromo?>' controls>
                                <source src='<?php echo "../".$rutaVideo?>' type='video/mp4'>
                                Your browser does not support the video tag.
                            </video>
                        </div>
                    </div>
                </div>
            </div>
        <?php
    }
?>
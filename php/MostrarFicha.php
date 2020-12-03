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
        
        
        // echo "<div><p>Categorias:</p>";
        // $array = explode(",", $categoria);
        // foreach ($array as $valor) {
        //     $valor=trim($valor);
        //     echo "<a href='Peliculas.php?genero=$valor'>$valor </a>";
        // }

?>

        <div class="container mt-5">
            <div class="row animate__animated animate__fadeIn" *ngIf="movie">
                <div class="col-md-6">
                    <?php
                        echo "<img src='../$rutaImg' class='img-thumbnail'/>";
                    ?>
                </div>
                <div class="col-md-6 text-white font-size-40">
                    <h3>
                        <?php
                            echo $titulo;
                        ?>
                    </h3>
                <div class="row">
                    <div class="col-3 text-white">
                        <?php
                            echo "<p>★$rating<span id='sub'>/5</span></p>";
                        ?>
                    </div>
                    <div class="col-6 text-white">
                        <?php
                            echo "<span>Director: </span><a href='Buscar.php?director=$director'>$director</a>";
                        ?>
                    </div>
                        
                    <div class="col-3 text-white">
                        <?php
                            echo "<a href='Peliculas.php?ano=$ano'>$ano</a>";
                        ?>
                    </div>
                </div>
                <hr />
                <div class="row mt-5">
                    <div class="col text-white">
                        <?php
                            echo $descripcion;
                        ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <button class="btn btn-outline-info mt-5" data-toggle="modal" data-target='#ModalTrailer'>
                            Trailer
                        </button>
                    </div>
                    <div class="col-6">
                        <button class="btn btn-primary mt-5" data-toggle="modal" data-target='#ModalPelicula'>
                            Pelicula
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <?php
                            // echo "<span>Reparto:</span>"
                            // $array = explode(",", $actores);
                            // foreach ($array as $valor) {
                            //     $valor=trim($valor);
                            //     echo "<a href='Buscar.php?actor=$valor'>$valor </a>";
                            // };
                        ?>

<!-- Modal del trailer -->
            <div class="modal fade" id="ModalTrailer" tabindex="-1" role="dialog" aria-labelledby="ModalTrailer" aria-hidden="true">
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

<!-- Modal de la pelicula -->
            <div class="modal fade" id="ModalPelicula" tabindex="-1" role="dialog" aria-labelledby="ModalPelicula" aria-hidden="true">
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
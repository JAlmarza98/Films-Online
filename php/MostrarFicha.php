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
                                echo "<span>Director: </span>";
                                $array = explode(",", $director);
                                foreach ($array as $valor) {
                                    $valor=trim($valor);
                                    echo "<a href='Buscar.php?director=$valor'>$valor</a> ";
                                }
                            ?>
                        </div>
                        <div class="col-3 text-white">
                            <?php
                                echo "<a href='Peliculas.php?ano=$ano'>$ano</a>";
                            ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6 text-white">
                            <?php
                                echo "<span>Categorías: </span>";
                                $array = explode(",", $categoria);
                                foreach ($array as $valor) {
                                    $valor=trim($valor);
                                    echo "<a href='Buscar.php?director=$valor'>$valor</a> ";
                                }
                            ?>
                        </div>
                        <div class="col-6 text-white">
                            <?php
                                echo "<span>Reparto: </span>";
                                $array = explode(",", $actores);
                                foreach ($array as $valor) {
                                    $valor=trim($valor);
                                    echo "<a href='Buscar.php?director=$valor'>$valor</a> ";
                                }
                            ?>
                            ...
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
                    <div class="row text-center">
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

<!-- Modal del trailer -->
            <div class="modal fade" id="ModalTrailer" tabindex="-1" role="dialog" aria-labelledby="ModalTrailer" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content" style="background-color:black;">
                        <video id='trailer' width='100%' poster='<?php echo "../".$rutaPromo?>' controls>
                            <source src='<?php echo "../".$rutaTrailer?>' type='video/mp4'>
                            Your browser does not support the video tag.
                        </video>
                    </div>
                </div>
            </div>

<!-- Modal de la pelicula -->
            <div class="modal fade" id="ModalPelicula" tabindex="-1" role="dialog" aria-labelledby="ModalPelicula" aria-hidden="true">
                <div class="modal-dialog modal-xl" role="document">
                    <div class="modal-content" style="background-color:black;">
                        <video id='pelicula' width='fit-content' poster='<?php echo "../".$rutaPromo?>' controls>
                            <source src='<?php echo "../".$rutaVideo?>' type='video/mp4'>
                            Your browser does not support the video tag.
                        </video>
                    </div>
                </div>
            </div>
        <?php
    }
    
    function mostrarFichaSerie($nombreSerie){
        $nombreSerie=str_replace('-',' ',$nombreSerie);
        $conexion=mysqli_connect('localhost', 'root', '', 'films_online');
        mysqli_set_charset($conexion, 'UTF8');
        $consulta="SELECT rutaImg,nombre,categoria,año,rating,director,actores,descripcion,tipo,rutaTrailer,rutaImgPromo,idPeliculasSeries FROM peliculasseries WHERE tipo='serie' AND nombre='".$nombreSerie."'";
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
            $rutaTrailer=$fila[9];
            $rutaPromo=$fila[10];
            $id=$fila[11];
        }
        mysqli_close($conexion);
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
                            echo "<span>Director: </span>";
                            $array = explode(",", $director);
                            foreach ($array as $valor) {
                                $valor=trim($valor);
                                echo "<a href='Buscar.php?director=$valor'>$valor</a> ";
                            }
                        ?>
                    </div>    
                    <div class="col-3 text-white">
                        <?php
                            echo "<a href='Peliculas.php?ano=$ano'>$ano</a>";
                        ?>
                    </div>
                </div>
                <div class="row">
                        <div class="col-6 text-white">
                            <?php
                                echo "<span>Categorías: </span>";
                                $array = explode(",", $categoria);
                                foreach ($array as $valor) {
                                    $valor=trim($valor);
                                    echo "<a href='Buscar.php?director=$valor'>$valor</a> ";
                                }
                            ?>
                        </div>
                        <div class="col-6 text-white">
                            <?php
                                echo "<span>Reparto: </span>";
                                $array = explode(",", $actores);
                                foreach ($array as $valor) {
                                    $valor=trim($valor);
                                    echo "<a href='Buscar.php?director=$valor'>$valor</a> ";
                                }
                            ?>
                            ...
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
                <div class="row text-center">
                    <div class="col-6 offset-6">
                        <button class="btn btn-outline-info mt-5" data-toggle="modal" data-target='#ModalTrailer'>
                            Trailer
                        </button>
                    </div>
                    <!-- <div class="col-6">
                    <select class="temporada" id="temporada" name="temporada">
                        <option value="0">Eliga temporada</option>
                        <?php
                            //  $conexion=mysqli_connect('localhost', 'root', '', 'films_online');
                            //  mysqli_set_charset($conexion, 'UTF8');
                            //  $consulta="SELECT DISTINCT numero FROM temporadas WHERE idPeliculasSeries=$id";
                            //  $resultado=mysqli_query($conexion,$consulta);
                     
                            //  while($fila=mysqli_fetch_row($resultado)){
                            //     $numero=$fila[0];
                            //  }
                            //  mysqli_close($conexion);
                             
                            // for ($i=1;$i<=$numero;$i++){
                            //     echo "<option class='season' value='".$id." ".$i."'>Temporada ".$i."</option>";
                            // }
                        ?>
                    </select>
                    </div> -->
                </div>
                <!-- <div id="container-series"></div> -->
                <div class="row">
                    <div class="col-12 mt-5">
                        <div class="accordion" id="accordionExample">
                            <?php
                            $conexion=mysqli_connect('localhost', 'root', '', 'films_online');
                            mysqli_set_charset($conexion, 'UTF8');
                            $consulta="SELECT DISTINCT numero FROM temporadas WHERE idPeliculasSeries=$id";
                            $resultado=mysqli_query($conexion,$consulta);
                    
                            while($fila=mysqli_fetch_row($resultado)){
                                $numero=$fila[0];
                            }
                            mysqli_close($conexion);
                            if($numero == 0){
                                echo "No hay capitulos disponibles";
                            }else{
                                for ($i=1;$i<=$numero;$i++){
                                    echo "<div class='card'>";
                                    echo "<div class='card-header' id='heading".$i."'>";
                                    echo "<h2 class='mb-0'>";
                                    echo "<button class='btn btn-link btn-block text-left text-white' type='button' data-toggle='collapse' data-target='#collapse".$i."' aria-expanded='true' aria-controls='collapse".$i."'>";
                                    echo "Temporada $i";
                                    echo "</button>";
                                    echo "</h2>";
                                    echo "</div>";
                                    echo "<div id='collapse".$i."' class='collapse' aria-labelledby='headingOne' data-parent='#accordionExample'>";
                                    echo "<div class='card-body'>";
                                        $conexion=mysqli_connect('localhost', 'root', '', 'films_online');
                                        mysqli_set_charset($conexion, 'UTF8');
                                        $consulta="SELECT nombre,ruta FROM temporadas WHERE idPeliculasSeries=".$id." AND numero=".$i."";
                                        $resultado=mysqli_query($conexion,$consulta);

                                        while($fila=mysqli_fetch_row($resultado)){
                                            $nombre=$fila[0];
                                            $ruta=$fila[1];
                                            $nombreCambiado=str_replace(' ','',$nombre);
                                            ?>
                                                <div class="">
                                                    <button class="btn btn-outline-info" data-toggle="modal" data-target=<?php echo "#ModalCapitulo".$nombreCambiado.""?>>
                                                        <?php echo $nombre ?>
                                                    </button>
                                                </div>
                                            <?php
                                        }
                                        mysqli_close($conexion);
                                    echo "</div>";
                                    echo "</div>";
                                    echo "</div>";
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<!-- Modal del trailer -->
            <div class="modal fade" id="ModalTrailer" tabindex="-1" role="dialog" aria-labelledby="ModalTrailer" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content" style="background-color:black;">
                        <video id='trailer' width='100%' poster='<?php echo "../".$rutaPromo?>' controls>
                            <source src='<?php echo "../".$rutaTrailer?>' type='video/mp4'>
                            Your browser does not support the video tag.
                        </video>
                    </div>
                </div>
            </div>
            <?php
    }
?>
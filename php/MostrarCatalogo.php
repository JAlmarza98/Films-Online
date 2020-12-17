<?php
    function mostrarPromo(){
        $conexion=mysqli_connect('localhost', 'root', '', 'films_online');
        mysqli_set_charset($conexion, 'UTF8');
        $consulta="SELECT rutaImgPromo,nombre,rating,tipo FROM peliculasseries order by fechaActualizacion DESC limit 1";
        $resultado=mysqli_query($conexion,$consulta);
        
        while($fila=mysqli_fetch_row($resultado)){
            $ruta=$fila[0];
            $nombre=$fila[1];
            $rating=$fila[2];
            $tipo=$fila[3];
            $nombreCambiado=str_replace(' ','-',$nombre);
        }
        mysqli_close($conexion);


        ?>
        
        <div class="promo">
        <?php
        echo "<img id='fondo' src=\"..$ruta\"  width='100%'>";
        ?>
        </div>
        
        <div class="titulo" >
            <?php
                echo "<span id='nombre'>$nombre</span>";
                echo "<p><i class='fas fa-star ml-5'></i> $rating<span id='sub'>/5</span></p>";
            ?>
            <div class="container-fluid">
                <div class="row">
                    <?php
                    if($tipo=="pelicula"){
                        ?> 
                            <div class="col-6" id="accion"><i class="fas fa-play mr-3"></i><?php echo "<a href='Ficha.php?pelicula=$nombreCambiado'>Reproducir</a>"; ?></div>
                        <?php
                    }else{
                        ?> 
                            <div class="col-6" id="accion"><i class="fas fa-play mr-3"></i><?php echo "<a href='Ficha.php?serie=$nombreCambiado'>Reproducir</a>"; ?></div>
                        <?php
                    }
                    ?> 
                    <div class="col-6" id="accion"><i class="fas fa-plus mr-3"></i><?php echo "<a href='AnadirLista.php?anadir=$nombreCambiado'>Añadir a la lista </a>"; ?></div>
                </div>
            </div>    
        </div>
        <?php
    }

    function mostrarTopPeliculas(){
        $conexion=mysqli_connect('localhost', 'root', '', 'films_online');
        mysqli_set_charset($conexion, 'UTF8');
        $consulta="SELECT rutaImg,nombre,categoria,año,rating,director,actores,descripcion,tipo,rutaImgPromo FROM peliculasseries WHERE tipo='pelicula' order by rating DESC limit 10";
        $resultado=mysqli_query($conexion,$consulta);

        while($fila=mysqli_fetch_row($resultado)){
            $ruta=$fila[0];
            $nombre=$fila[1];
            $nombre=str_replace(' ','-',$nombre);
            $titulo=$fila[1];
            $categoria=$fila[2];
            $ano=$fila[3];
            $rating=$fila[4];
            $director=$fila[5];
            $actores=$fila[6];
            $descripcion=$fila[7];
            $tipo=$fila[8];
            $ruta2=$fila[9];

            tarjeta($ruta,$nombre,$titulo,$categoria,$ano,$rating,$director,$actores,$descripcion,$tipo,$ruta2);
            
        }
        mysqli_close($conexion);
    }

    function mostrarTopSeries(){
        $conexion=mysqli_connect('localhost', 'root', '', 'films_online');
        mysqli_set_charset($conexion, 'UTF8');
        $consulta="SELECT rutaImg,nombre,categoria,año,rating,director,actores,descripcion,tipo,rutaImgPromo FROM peliculasseries WHERE tipo='serie' order by rating DESC limit 10";
        $resultado=mysqli_query($conexion,$consulta);
        
        while($fila=mysqli_fetch_row($resultado)){
            $ruta=$fila[0];
            $nombre=$fila[1];
            $nombre=str_replace(' ','-',$nombre);
            $titulo=$fila[1];
            $categoria=$fila[2];
            $ano=$fila[3];
            $rating=$fila[4];
            $director=$fila[5];
            $actores=$fila[6];
            $descripcion=$fila[7];
            $tipo=$fila[8];
            $ruta2=$fila[9];

            tarjeta($ruta,$nombre,$titulo,$categoria,$ano,$rating,$director,$actores,$descripcion,$tipo,$ruta2);
        }
        mysqli_close($conexion);
    }

    function mostrarUltimas(){
        $conexion=mysqli_connect('localhost', 'root', '', 'films_online');
        mysqli_set_charset($conexion, 'UTF8');
        $consulta="SELECT rutaImg,nombre,categoria,año,rating,director,actores,descripcion,tipo,rutaImgPromo FROM peliculasseries order by fechaActualizacion DESC limit 10";
        $resultado=mysqli_query($conexion,$consulta);
        
        while($fila=mysqli_fetch_row($resultado)){
            $ruta=$fila[0];
            $nombre=$fila[1];
            $nombre=str_replace(' ','-',$nombre);
            $titulo=$fila[1];
            $categoria=$fila[2];
            $ano=$fila[3];
            $rating=$fila[4];
            $director=$fila[5];
            $actores=$fila[6];
            $descripcion=$fila[7];
            $tipo=$fila[8];
            $ruta2=$fila[9];

            tarjeta($ruta,$nombre,$titulo,$categoria,$ano,$rating,$director,$actores,$descripcion,$tipo,$ruta2);
        }
        mysqli_close($conexion);
    }

    function tarjeta($ruta,$nombre,$titulo,$categoria,$ano,$rating,$director,$actores,$descripcion,$tipo,$ruta2){
        $rutaPlay="../img/web/play.png";
        ?>
        <div type="button" class="item mb-3" data-toggle="modal" data-target="<?php echo "#exampleModal$nombre"; ?>">
        <?php
            echo "<img style='border-radius:8px' src=\"..$ruta\" width='160px' height='230px'>";
        ?>
        </div>
            <div class="modal fade" id="<?php echo "exampleModal$nombre"; ?>" tabindex="-1" role="dialog" aria-labelledby="<?php echo "exampleModal$nombre"; ?>" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content" style="background: #353746;">
                        <div class="modal-body">
                            <div>
                                <?php
                                    $conexion=mysqli_connect('localhost', 'root', '', 'films_online');
                                    mysqli_set_charset($conexion, 'UTF8');
                                    $consulta="SELECT rutaImgPromo FROM peliculasseries WHERE nombre ='".$titulo."'";
                                    $resultado=mysqli_query($conexion,$consulta);

                                    while($fila=mysqli_fetch_row($resultado)){
                                        $promo=$fila[0];
                                    }
                                    mysqli_close($conexion);
                                echo "<img id='reproducir' src=\"..$promo\" width='125%'>";
                                if($tipo=='pelicula'){
                                     echo "<a href='Ficha.php?pelicula=$nombre'><img id='play' src=\"$rutaPlay\"></a>";
                                }else{
                                    echo "<a href='Ficha.php?serie=$nombre'><img id='play' src=\"$rutaPlay\"></a>";
                                }
                                ?>
                            </div>
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-12 col-sm-12 col-lg-12 col-xl-12 mt-3 text-center"  id="articulo">
                                        <?php
                                        if($tipo=='pelicula'){
                                            echo "<a class='text-white' href='Ficha.php?pelicula=$nombre'><p>$titulo</p></a>";
                                        }else{
                                            echo "<a class='text-white' href='Ficha.php?serie=$nombre'><p>$titulo</p></a>";
                                        }
                                        ?>
                                    </div>
                                    <hr>
                                    <div class="col-xl-6">
                                        <p>
                                            <?php
                                                $array = explode(",", $categoria);
                                                foreach ($array as $valor) {
                                                    $valor=trim($valor);
                                                    if($tipo=='pelicula'){
                                                        echo "<a href='Peliculas.php?genero=$valor'>$valor </a>";
                                                    }else{
                                                        echo "<a href='Series.php?genero=$valor'>$valor </a>";
                                                    }
                                                }
                                            ?>
                                        </p>
                                    </div>
                                    <div class="col-xl-2">
                                        <p><?php 
                                            if($tipo=='pelicula'){
                                                echo "<a href='Peliculas.php?ano=$ano'>$ano </a>";
                                            }else{
                                                echo "<a href='Series.php?ano=$ano'>$ano </a>";
                                            }
                                        ?></p>
                                    </div>
                                    <div class="col-xl-4">
                                            <p>★<?php echo $rating;?><span id="sub">/5</span></p>
                                    </div>
                                    <div class="col-xl-1"></div>
                                    <div class="col-xl-10">
                                        <p class="datos"><span id="datos">Director:</span>
                                            <?php
                                                $array = explode(",", $director);
                                                foreach ($array as $valor) {
                                                    $valor=trim($valor);
                                                    echo "<a href='Buscar.php?director=$valor'>$valor </a>";
                                                }
                                            ?>
                                        </p>
                                    </div>
                                    <div class="col-xl-1"></div>
                                    <div class="col-xl-1"></div>
                                    <div class="col-xl-10">
                                        <p class="datos" ><span id="datos">Reparto:</span>
                                            <?php
                                                $array = explode(",", $actores);
                                                foreach ($array as $valor) {
                                                    $valor=trim($valor);
                                                    echo "<a href='Buscar.php?actor=$valor'>$valor </a>";
                                                }
                                            ?>
                                        </p>
                                    </div>
                                    <div class="col-xl-1"></div>
                                    <div class="col-xl-1"></div>
                                    <div class="col-xl-10" id="sinopsis">
                                        <p><?php echo $descripcion;?></p>
                                    </div>
                                    <div class="col-xl-1"></div>
                                    <div class="col-xl-12 text-center">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                        <?php echo "<a class='btn btn-primary ml-3' href='AnadirLista.php?anadir=$nombre'>Añadir a la lista </a>" ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php
    }
?>
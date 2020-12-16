<?php
    function mostrarMiLista(){
        $idUsuario=$_COOKIE["Id"];
        $conexion=mysqli_connect('localhost', 'root', '', 'films_online');
        mysqli_set_charset($conexion, 'UTF8');
        $result = $conexion->query("SELECT COUNT(*) as total_products FROM milista WHERE idUsuario=$idUsuario");
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
        }else{
            echo "No hay peliculas y/o series añadidas a tu lista.";
        }
        mysqli_close($conexion);
    }

    function mostrarMiListaGenero($genero){
        $idUsuario=$_COOKIE["Id"];
        $conexion=mysqli_connect('localhost', 'root', '', 'films_online');
        mysqli_set_charset($conexion, 'UTF8');
        $result = $conexion->query("SELECT COUNT(*) as total_products FROM peliculasseries p,milista m
            WHERE p.idPeliculasSeries=m.idPeliculasSerie and m.idUsuario='".$idUsuario."' and p.categoria LIKE '%$genero%'");
        $row = $result->fetch_assoc();
        $num_total_rows = $row['total_products'];

        if ($num_total_rows > 0) {

            $consulta="SELECT p.idPeliculasSeries,p.rutaImg,p.nombre,p.categoria,p.año,p.rating,p.director,p.actores,p.descripcion,p.tipo,p.rutaImgPromo
                FROM peliculasseries p,milista m
                WHERE p.idPeliculasSeries=m.idPeliculasSerie and m.idUsuario='".$idUsuario."' and p.categoria LIKE '%$genero%'";

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
        }else{
            echo "No hay peliculas y/o series añadidas a tu lista del genero $genero.";
        }
        mysqli_close($conexion);
    }

    function mostrarMiListaAno($ano){
        $idUsuario=$_COOKIE["Id"];
        $conexion=mysqli_connect('localhost', 'root', '', 'films_online');
        mysqli_set_charset($conexion, 'UTF8');
        $result = $conexion->query("SELECT COUNT(*) as total_products FROM peliculasseries p,milista m
            WHERE p.idPeliculasSeries=m.idPeliculasSerie and m.idUsuario='$idUsuario' and p.año='$ano'");
        $row = $result->fetch_assoc();
        $num_total_rows = $row['total_products'];

        if ($num_total_rows > 0) {

            $consulta="SELECT p.idPeliculasSeries,p.rutaImg,p.nombre,p.categoria,p.año,p.rating,p.director,p.actores,p.descripcion,p.tipo,p.rutaImgPromo
                FROM peliculasseries p,milista m
                WHERE p.idPeliculasSeries=m.idPeliculasSerie and m.idUsuario='".$idUsuario."' and p.año='$ano'";

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
        }else{
            echo "No hay peliculas y/o series añadidas a tu lista del año $ano.";
        }
        mysqli_close($conexion);
    }

    function mostrarAnos(){
        $idUsuario=$_COOKIE["Id"];
        $conexion=mysqli_connect('localhost', 'root', '', 'films_online');
        mysqli_set_charset($conexion, 'UTF8');
        $consulta="SELECT p.año FROM peliculasseries p,milista m
                    WHERE p.idPeliculasSeries=m.idPeliculasSerie and m.idUsuario='".$idUsuario."' GROUP BY p.año";
        $resultado=mysqli_query($conexion,$consulta);
        
        while($fila=mysqli_fetch_row($resultado)){
            echo "<input type='radio' value='$fila[0]' id='ano' name='ano'><label>&nbsp$fila[0]</label><br>";
        }
        mysqli_close($conexion);
    }

    function mostrarMiListaPuntuacion($puntuacion){
        $idUsuario=$_COOKIE["Id"];
        $puntuacion = (double) $puntuacion;
        $puntuacion2 = $puntuacion+0.99;
        $conexion=mysqli_connect('localhost', 'root', '', 'films_online');
        mysqli_set_charset($conexion, 'UTF8');
        $result = $conexion->query("SELECT COUNT(*) as total_products FROM peliculasseries p,milista m
            WHERE p.idPeliculasSeries=m.idPeliculasSerie and m.idUsuario='$idUsuario' AND rating BETWEEN $puntuacion AND $puntuacion2");
        $row = $result->fetch_assoc();
        $num_total_rows = $row['total_products'];

        if ($num_total_rows > 0) {

            $consulta="SELECT p.idPeliculasSeries,p.rutaImg,p.nombre,p.categoria,p.año,p.rating,p.director,p.actores,p.descripcion,p.tipo,p.rutaImgPromo
                FROM peliculasseries p,milista m
                WHERE p.idPeliculasSeries=m.idPeliculasSerie and m.idUsuario='".$idUsuario."' AND rating BETWEEN $puntuacion AND $puntuacion2";

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
        }else{
            echo "No hay peliculas y/o series añadidas a tu lista con puntuacion de $puntuacion.";
        }
        mysqli_close($conexion);
    }

    function tarjetaQuitar($ruta,$nombre,$titulo,$categoria,$ano,$rating,$director,$actores,$descripcion,$tipo,$ruta2){
        $rutaPlay="../img/web/play.png";
        ?>
        <div type="button" class="item" data-toggle="modal" data-target="<?php echo "#exampleModal$nombre"; ?>">
        <?php
            echo "<img src=\"..$ruta\" width='160px'>";
        ?>
        </div>
            <div class="modal fade" id="<?php echo "exampleModal$nombre"; ?>" tabindex="-1" role="dialog" aria-labelledby="<?php echo "exampleModal$nombre"; ?>" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content" style="background: #353746;">
                        <div class="modal-body">
                            <div>
                                <?php
                                echo "<img id='reproducir' src=\"..$ruta2\" width='125%'>";
                                if($tipo=='pelicula'){
                                     echo "<a href='Ficha.php?pelicula=$nombre'><img id='play' src=\"$rutaPlay\"></a>";
                                }else{
                                    echo "<a href='Ficha.php?serie=$nombre'><img id='play' src=\"$rutaPlay\"></a>";
                                }
                                ?>
                            </div>
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-12 col-sm-12 col-lg-12 col-xl-12" text-center id="articulo">
                                        <?php
                                        if($tipo=='pelicula'){
                                            echo "<a href='Ficha.php?pelicula=$nombre'><p>$titulo</p></a>";
                                        }else{
                                            echo "<a href='Ficha.php?serie=$nombre'><p>$titulo</p></a>";
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
                                        <?php echo "<a href='QuitarLista.php?quitar=$nombre'>Quitar de la lista </a>" ?>
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
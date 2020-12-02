<?php
    include 'MostrarCatalogo.php';


    function mostrarAnos($tipo){
        $conexion=mysqli_connect('localhost', 'root', '', 'films_online');
        mysqli_set_charset($conexion, 'UTF8');
        $consulta="SELECT año FROM peliculasseries WHERE tipo='$tipo' GROUP BY año";
        $resultado=mysqli_query($conexion,$consulta);
        
        while($fila=mysqli_fetch_row($resultado)){
            echo "<input type='radio' value='$fila[0]' id='ano' name='ano'><label>&nbsp$fila[0]</label><br>";
        }
        mysqli_close($conexion);
    }


    function mostrarPeliculas($tipo){
        $conexion=mysqli_connect('localhost', 'root', '', 'films_online');
        mysqli_set_charset($conexion, 'UTF8');
        $result = $conexion->query('SELECT COUNT(*) as total_products FROM peliculasseries WHERE tipo="'.$tipo.'"');
        $row = $result->fetch_assoc();
        $num_total_rows = $row['total_products'];
        $NUM_ITEMS_BY_PAGE=20;
        
        if ($num_total_rows > 0) {
            $page = false;
        
            //examino la pagina a mostrar y el inicio del registro a mostrar
            if (isset($_GET["page"])) {
                $page=$_GET["page"];
            }
        
            if (!$page){
                $start=0;
                $page=1;
            } else {
                $start=($page-1)* $NUM_ITEMS_BY_PAGE;
            }
            //calculo el total de paginas
            $total_pages = ceil($num_total_rows / $NUM_ITEMS_BY_PAGE);
            $aux=0;

            $result = $conexion->query(
                'SELECT idPeliculasSeries,rutaImg,nombre,categoria,año,rating,director,actores,descripcion,tipo,rutaImgPromo
                FROM peliculasseries 
                WHERE tipo="'.$tipo.'" order by fechaActualizacion LIMIT '.$start.', '.$NUM_ITEMS_BY_PAGE
            );
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()){
                    $ruta=$row['rutaImg'];
                    $nombre=$row['nombre'];
                    $nombreReemplazado=str_replace(' ','-',$nombre);
                    $titulo=$row['nombre'];
                    $categoria=$row['categoria'];
                    $ano=$row['año'];
                    $rating=$row['rating'];
                    $director=$row['director'];
                    $actores=$row['actores'];
                    $descripcion=$row['descripcion'];
                    $tipo=$row['tipo'];
                    $ruta2=$row['rutaImgPromo'];

                    if($aux==0){
                        tarjeta($ruta,$nombreReemplazado,$titulo,$categoria,$ano,$rating,$director,$actores,$descripcion,$tipo,$ruta2);
                        $aux++;
                    }else if($aux==4){
                        tarjeta($ruta,$nombreReemplazado,$titulo,$categoria,$ano,$rating,$director,$actores,$descripcion,$tipo,$ruta2);
                        $aux=0;
                    }else{
                        tarjeta($ruta,$nombreReemplazado,$titulo,$categoria,$ano,$rating,$director,$actores,$descripcion,$tipo,$ruta2);
                        $aux++;
                    }
                }
            }
            mysqli_close($conexion);
            echo '<div class="arrow">';
            echo '<ul class="pagination">';

            if($tipo=="pelicula"){
                if ($total_pages>1){
                    if ($page!=1){
                        echo '<li class="page-item"><a class="page-link" href="Peliculas.php?page='.($page-1).'" id="restar"><span aria-hidden="true">&laquo;</span></a></li>';
                    }
        
                    if ($page!=$total_pages){
                        echo '<li class="page-item"><a class="page-link" href="Peliculas.php?page='.($page+1).'" id="sumar"><span aria-hidden="true">&raquo;</span></a></li>';
                    }
                }
            }else{
                if ($total_pages>1){
                    if ($page!=1){
                        echo '<li class="page-item"><a class="page-link" href="Series.php?page='.($page-1).'" id="restar"><span aria-hidden="true">&laquo;</span></a></li>';
                    }
        
                    if ($page!=$total_pages){
                        echo '<li class="page-item"><a class="page-link" href="Series.php?page='.($page+1).'" id="sumar"><span aria-hidden="true">&raquo;</span></a></li>';
                    }
                }
            }

            echo '</ul>';
            echo '</div>';

        }else{
            echo "No hay resultados.";
        }
    }


    function mostrarGenero($tipo,$genero){
        $conexion=mysqli_connect('localhost', 'root', '', 'films_online');
        mysqli_set_charset($conexion, 'UTF8');
        $result = $conexion->query("SELECT COUNT(*) as total_products FROM peliculasseries WHERE tipo='$tipo' AND categoria LIKE '%$genero%'");
        $row = $result->fetch_assoc();
        $num_total_rows = $row['total_products'];
        $NUM_ITEMS_BY_PAGE=20;

        if ($num_total_rows > 0) {
        $page = false;
                    
        //examino la pagina a mostrar y el inicio del registro a mostrar
        if (isset($_GET["page"])) {
            $page=$_GET["page"];
        }
                
        if (!$page){
            $start=0;
            $page=1;
        } else {
            $start=($page-1)* $NUM_ITEMS_BY_PAGE;
        }

        //calculo el total de paginas
        $total_pages = ceil($num_total_rows / $NUM_ITEMS_BY_PAGE);
        $aux=0;
        $aux2=0;
        $result = $conexion->query(
            'SELECT rutaImg,nombre,categoria,año,rating,director,actores,descripcion,tipo,rutaImgPromo
            FROM peliculasseries 
            WHERE tipo="'.$tipo.'" AND categoria LIKE \'%'.$genero.'%\' order by fechaActualizacion LIMIT '.$start.', '.$NUM_ITEMS_BY_PAGE
        );

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()){
                $ruta=$row['rutaImg'];
                $nombre=$row['nombre'];
                $nombreReemplazado=str_replace(' ','-',$nombre);
                $titulo=$row['nombre'];
                $categoria=$row['categoria'];
                $ano=$row['año'];
                $rating=$row['rating'];
                $director=$row['director'];
                $actores=$row['actores'];
                $descripcion=$row['descripcion'];
                $tipo=$row['tipo'];
                $ruta2=$row['rutaImgPromo'];
                $aux2++;
                if($aux==0){
                    tarjeta($ruta,$nombreReemplazado,$titulo,$categoria,$ano,$rating,$director,$actores,$descripcion,$tipo,$aux2,$ruta2);
                    $aux++;
                }else if($aux==4){
                    tarjeta($ruta,$nombreReemplazado,$titulo,$categoria,$ano,$rating,$director,$actores,$descripcion,$tipo,$aux2,$ruta2);
                    $aux=0;
                }else{
                    tarjeta($ruta,$nombreReemplazado,$titulo,$categoria,$ano,$rating,$director,$actores,$descripcion,$tipo,$aux2,$ruta2);
                    $aux++;
                    }
                }
            }
            mysqli_close($conexion);
                    
            echo '<div class="arrow">';
            echo '<ul class="pagination">';
        
            if($tipo=="pelicula"){
                if ($total_pages>1){
                    if ($page!=1){
                        echo '<li class="page-item"><a class="page-link" href="Peliculas.php?page='.($page-1).'&genero='.$genero.'" id="restar"><span aria-hidden="true">&laquo;</span></a></li>';
                    }
                
                    if ($page!=$total_pages){
                        echo '<li class="page-item"><a class="page-link" href="Peliculas.php?page='.($page+1).'&genero='.$genero.'" id="sumar"><span aria-hidden="true">&raquo;</span></a></li>';
                    }
                }
            }else{
                if ($total_pages>1){
                    if ($page!=1){
                        echo '<li class="page-item"><a class="page-link" href="Series.php?page='.($page-1).'&genero='.$genero.'" id="restar"><span aria-hidden="true">&laquo;</span></a></li>';
                    }
                
                    if ($page!=$total_pages){
                        echo '<li class="page-item"><a class="page-link" href="Series.php?page='.($page+1).'&genero='.$genero.'" id="sumar"><span aria-hidden="true">&raquo;</span></a></li>';
                    }
                }
            }

            echo '</ul>';
            echo '</div>';
            
        }else{
            echo "No hay resultados.";
        }
    }


    function mostrarAno($tipo,$ano){
        $conexion=mysqli_connect('localhost', 'root', '', 'films_online');
        mysqli_set_charset($conexion, 'UTF8');
        $result = $conexion->query("SELECT COUNT(*) as total_products FROM peliculasseries WHERE tipo='$tipo' AND año='$ano'");
        $row = $result->fetch_assoc();
        $num_total_rows = $row['total_products'];
        $NUM_ITEMS_BY_PAGE=20;

        if ($num_total_rows > 0) {
        $page = false;
                    
        //examino la pagina a mostrar y el inicio del registro a mostrar
        if (isset($_GET["page"])) {
            $page=$_GET["page"];
        }
                
        if (!$page){
            $start=0;
            $page=1;
        } else {
            $start=($page-1)*$NUM_ITEMS_BY_PAGE;
        }

        //calculo el total de paginas
        $total_pages = ceil($num_total_rows / $NUM_ITEMS_BY_PAGE);
        $aux=0;
        $aux2=0;
        $result = $conexion->query(
            'SELECT rutaImg,nombre,categoria,año,rating,director,actores,descripcion,tipo,rutaImgPromo
            FROM peliculasseries 
            WHERE tipo="'.$tipo.'" AND año="'.$ano.'" order by fechaActualizacion LIMIT '.$start.', '.$NUM_ITEMS_BY_PAGE
        );

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()){
                $ruta=$row['rutaImg'];
                $nombre=$row['nombre'];
                $nombreReemplazado=str_replace(' ','-',$nombre);
                $titulo=$row['nombre'];
                $categoria=$row['categoria'];
                $ano=$row['año'];
                $rating=$row['rating'];
                $director=$row['director'];
                $actores=$row['actores'];
                $descripcion=$row['descripcion'];
                $tipo=$row['tipo'];
                $ruta2=$row['rutaImgPromo'];
                $aux2++;
                if($aux==0){
                    tarjeta($ruta,$nombreReemplazado,$titulo,$categoria,$ano,$rating,$director,$actores,$descripcion,$tipo,$aux2,$ruta2);
                    $aux++;
                }else if($aux==4){
                    tarjeta($ruta,$nombreReemplazado,$titulo,$categoria,$ano,$rating,$director,$actores,$descripcion,$tipo,$aux2,$ruta2);
                    $aux=0;
                }else{
                    tarjeta($ruta,$nombreReemplazado,$titulo,$categoria,$ano,$rating,$director,$actores,$descripcion,$tipo,$aux2,$ruta2);
                    $aux++;
                    }
                }
            }
            mysqli_close($conexion);
                    
            echo '<div class="arrow">';
            echo '<ul class="pagination">';
        
            if($tipo=="pelicula"){
                if ($total_pages>1){
                    if ($page!=1){
                        echo '<li class="page-item"><a class="page-link" href="Peliculas.php?page='.($page-1).'&ano='.$ano.'" id="restar"><span aria-hidden="true">&laquo;</span></a></li>';
                    }
                
                    if ($page!=$total_pages){
                        echo '<li class="page-item"><a class="page-link" href="Peliculas.php?page='.($page+1).'&ano='.$ano.'" id="sumar"><span aria-hidden="true">&raquo;</span></a></li>';
                    }
                }
            }else{
                if ($total_pages>1){
                    if ($page!=1){
                        echo '<li class="page-item"><a class="page-link" href="Series.php?page='.($page-1).'&ano='.$ano.'" id="restar"><span aria-hidden="true">&laquo;</span></a></li>';
                    }
                
                    if ($page!=$total_pages){
                        echo '<li class="page-item"><a class="page-link" href="Series.php?page='.($page+1).'&ano='.$ano.'" id="sumar"><span aria-hidden="true">&raquo;</span></a></li>';
                    }
                }
            }

            echo '</ul>';
            echo '</div>';
            
        }else{
            echo "No hay resultados.";
        }
    }


    function mostrarPuntuacion($tipo,$puntuacion){
        $puntuacion = (double) $puntuacion;
        $puntuacion2 = $puntuacion+0.99;
        $conexion=mysqli_connect('localhost', 'root', '', 'films_online');
        mysqli_set_charset($conexion, 'UTF8');
        $result = $conexion->query("SELECT COUNT(*) as total_products FROM peliculasseries WHERE tipo='$tipo' AND rating BETWEEN $puntuacion AND $puntuacion2");
        $row = $result->fetch_assoc();
        $num_total_rows = $row['total_products'];
        $NUM_ITEMS_BY_PAGE=20;

        if ($num_total_rows > 0) {
        $page = false;
                    
        //examino la pagina a mostrar y el inicio del registro a mostrar
        if (isset($_GET["page"])) {
            $page=$_GET["page"];
        }
                
        if (!$page){
            $start=0;
            $page=1;
        } else {
            $start=($page-1)*$NUM_ITEMS_BY_PAGE;
        }

        //calculo el total de paginas
        $total_pages = ceil($num_total_rows / $NUM_ITEMS_BY_PAGE);
        $aux=0;
        $aux2=0;
        $result = $conexion->query(
            'SELECT rutaImg,nombre,categoria,año,rating,director,actores,descripcion,tipo,rutaImgPromo
            FROM peliculasseries 
            WHERE tipo="'.$tipo.'" AND rating BETWEEN '.$puntuacion.' AND '.$puntuacion2.' order by fechaActualizacion LIMIT '.$start.', '.$NUM_ITEMS_BY_PAGE
        );

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()){
                $ruta=$row['rutaImg'];
                $nombre=$row['nombre'];
                $nombreReemplazado=str_replace(' ','-',$nombre);
                $titulo=$row['nombre'];
                $categoria=$row['categoria'];
                $ano=$row['año'];
                $rating=$row['rating'];
                $director=$row['director'];
                $actores=$row['actores'];
                $descripcion=$row['descripcion'];
                $tipo=$row['tipo'];
                $ruta2=$row['rutaImgPromo'];
                $aux2++;
                if($aux==0){
                    tarjeta($ruta,$nombreReemplazado,$titulo,$categoria,$ano,$rating,$director,$actores,$descripcion,$tipo,$aux2,$ruta2);
                    $aux++;
                }else if($aux==4){
                    tarjeta($ruta,$nombreReemplazado,$titulo,$categoria,$ano,$rating,$director,$actores,$descripcion,$tipo,$aux2,$ruta2);
                    $aux=0;
                }else{
                    tarjeta($ruta,$nombreReemplazado,$titulo,$categoria,$ano,$rating,$director,$actores,$descripcion,$tipo,$aux2,$ruta2);
                    $aux++;
                    }
                }
            }
            mysqli_close($conexion);
                    
            echo '<div class="arrow">';
            echo '<ul class="pagination">';
            
            if($tipo=="pelicula"){
                if ($total_pages>1){
                    if ($page!=1){
                        echo '<li class="page-item"><a class="page-link" href="Peliculas.php?page='.($page-1).'&puntuacion='.$puntuacion.'" id="restar"><span aria-hidden="true">&laquo;</span></a></li>';
                    }
                
                    if ($page!=$total_pages){
                        echo '<li class="page-item"><a class="page-link" href="Peliculas.php?page='.($page+1).'&puntuacion='.$puntuacion.'" id="sumar"><span aria-hidden="true">&raquo;</span></a></li>';
                    }
                }
            }else{
                if ($total_pages>1){
                    if ($page!=1){
                        echo '<li class="page-item"><a class="page-link" href="Series.php?page='.($page-1).'&puntuacion='.$puntuacion.'" id="restar"><span aria-hidden="true">&laquo;</span></a></li>';
                    }
                
                    if ($page!=$total_pages){
                        echo '<li class="page-item"><a class="page-link" href="Series.php?page='.($page+1).'&puntuacion='.$puntuacion.'" id="sumar"><span aria-hidden="true">&raquo;</span></a></li>';
                    }
                }
            }

            echo '</ul>';
            echo '</div>';
            
        }else{
            echo "No hay resultados.";
        }
    }
?>
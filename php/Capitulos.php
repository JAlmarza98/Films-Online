<?php
    if(isset($_POST['season'])){
        $season=$_POST['season'];
        list($id,$temporada) = explode(" ", $season);
        
        $conexion=mysqli_connect('localhost', 'root', '', 'films_online');
        mysqli_set_charset($conexion, 'UTF8');
        $consulta="SELECT nombre,ruta FROM temporadas WHERE idPeliculasSeries=".$id." AND numero=".$temporada."";
        $resultado=mysqli_query($conexion,$consulta);

        while($fila=mysqli_fetch_row($resultado)){
            $nombre=$fila[0];
            $ruta=$fila[1];
            $nombreCambiado=str_replace(' ','',$nombre);
            ?>
        <div class="">
            <button class="btn btn-outline-info mt-5" data-toggle="modal" data-target=<?php echo "#ModalCapitulo".$nombreCambiado.""?>>
                <?php echo $nombre ?>
            </button>
        </div>

        <div class="modal fade" id=<?php echo "ModalCapitulo".$nombreCambiado.""?> tabindex="-1" role="dialog" aria-labelledby="#ModalCapitulo"> aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content" style="background-color:black;">
                        <video id='trailer' width='100%' controls>
                            <source src='<?php echo "../".$ruta?>' type='video/mp4'>
                            Your browser does not support the video tag.
                        </video>
                    </div>
                </div>
            </div>
        <?php
        }
        mysqli_close($conexion);
    }
?>
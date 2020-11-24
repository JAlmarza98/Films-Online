<?php
    function comprobarEmail($email){
        $conexion=mysqli_connect('localhost', 'root', '', 'films_online');
        $consulta="select * from usuarios where email='".$email."'";
        $resultado=mysqli_query($conexion,$consulta);
        $cantidad=mysqli_num_rows($resultado);
        if($cantidad>0){
            return false;
        }else{
            return true;
        }
        mysqli_close($conexion);
    }
?>
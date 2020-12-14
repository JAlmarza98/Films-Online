<?php
    $id=$_POST['numberID'];
    $conexion=mysqli_connect('localhost', 'root', '', 'films_online');
    $consulta="select * from usuarios where idUsuario='".$id."'";
    $resultado=mysqli_query($conexion,$consulta);
    $cantidad=mysqli_num_rows($resultado);
    if($cantidad>0){
        return true;
    }else{
        return false;
    }
    mysqli_close($conexion);
?>
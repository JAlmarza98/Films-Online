<?php
    $conexion=mysqli_connect('localhost', 'root', '', 'films_online');
    mysqli_set_charset($conexion, 'UTF8');
    $cont=0;
    $consulta="select tipo,precio,idPrecios from precios";
    if ($resultado=mysqli_query($conexion, $consulta)){
        echo "<table>";
        while ($fila=mysqli_fetch_row($resultado)){
            if($cont==0){
                echo "<input class='checkbox-budget' type='radio' name='tipo' id='tipo".$fila[2]."' value='".$fila[2]."' checked>";
                echo "<label class='for-checkbox-budget' for='tipo".$fila[2]."'>";
                echo "<span data-hover='".$fila[0]." días'>".$fila[0]." días</span>";
                echo "<span data-hover='".$fila[1]." €'>".$fila[1]." €</span></label>";
                $cont++;
            }else{
                echo "<input class='checkbox-budget' type='radio' name='tipo' id='tipo".$fila[2]."' value='".$fila[2]."'>";
                echo "<label class='for-checkbox-budget' for='tipo".$fila[2]."'>";
                echo "<span data-hover='".$fila[0]." días'>".$fila[0]." días</span>";
                echo "<span data-hover='".$fila[1]." €'>".$fila[1]." €</span></label>";
            }
        }
        echo "</table>";
    }
    mysqli_close($conexion);
?>
<?php
    //Si existe error a la hora de hacer la recuperacion y la bbdd no encuentra al usuario nos mostrara este mensaje.
    if(isset($_GET['error'])){
        if($_GET['error']=="si"){
            echo "<span id='error'>No existe el usuario compruebe que todos los datos son correctos por favor.</span><br>";
        }
    }
?>
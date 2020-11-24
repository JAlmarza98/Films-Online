<?php
    //Si no esta marcado ni visa ni paypal nos mostrara este error.
    if(isset($_GET['errorProceso'])){
        if($_GET['errorProceso']=="si"){
            echo "<span id='error'>No se ha podido realizar la acción por favor seleccione el metodo de pago.</span><br>";
        }
    }
?>
<?php
    if(isset($_GET['error'])){
        if($_GET['error']=="si"){
            echo "<span id='error' style='color:whitesmoke;'>Usuario o contraseñas incorrectos.</span><br>";
        }
    }
?>
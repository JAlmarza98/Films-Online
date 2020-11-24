<?php
    //Si el email esta duplicado mostrara este mensaje.
    if(isset($_GET['errorEmail'])){
        if($_GET['errorEmail']=="si"){
            echo "El email ya esta registrado.";
        }
    }
?>
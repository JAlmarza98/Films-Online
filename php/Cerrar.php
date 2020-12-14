<?php
    unset($_COOKIE['Usuario']);
    unset($_COOKIE['Id']); 
    unset($_COOKIE['Tiempo']); 
    unset($_COOKIE['Nivel']);  
    header('Location: ../index.php');
?>
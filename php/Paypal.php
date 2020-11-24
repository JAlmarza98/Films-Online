<?php
    echo "<div class='container-fluid'>";
    echo "  <div class='row'>";
    echo "      <div class='col-12 col-sm-12 col-lg-6' >";
    include '../html/ppal.html';
    echo "      </div>";
    echo "      <div class='col-12 col-sm-12 col-lg-6' >";
    echo "      <div class='form-group col-12' >";
    echo "          <label for='EmailPaypal'>Correo de Paypal</label>";
    echo "          <input type='email' class='form-control' id='EmailPaypal' name='EmailPaypal' placeholder='Introduce tu correo de PayPal'>";
    echo "      </div>";
    echo "      <div class='form-group col-12' >";
    echo "          <label for='PassPaypal'>Contraseña de Paypal</label>";
    echo "          <input type='password' class='form-control' id='PassPaypal' name='PassPaypal'>";
    echo "      </div>";
    echo "  </div>";
    echo "</div>";
    echo "<script src=\"../js/validarPaypal.js\"></script>";
    echo "<script src=\"../js/mostrarPaypal.js\"></script>";
?>
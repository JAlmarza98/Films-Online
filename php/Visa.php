<?php
    echo "<div class='container-fluid'>";
    echo "  <div class='row'>";
    echo "      <div class='col-12 col-sm-12 col-lg-6'  >";
    include '../html/tarjeta.html';
    echo "      </div>";
    echo "      <div class='col-12 col-sm-12 col-lg-6' >";
    echo "      <div class='form-group col-12' >";
    echo "          <label for='NombreyApellidos'>Nombre y Apellidos</label>";
    echo "          <input type='text' class='form-control' id='NombreyApellidos' name='NombreyApellidos' placeholder='Introduce tu nombre y apellidos'>";
    echo "      </div>";
    echo "      <div class='form-group col-12' >";
    echo "          <label for='NumeroTarjeta'>Numero de Tarjeta</label>";
    echo "          <input type='text' class='form-control' id='NumeroTarjeta' name='NumeroTarjeta' placeholder='Introduce el numero e tu tarjeta' >";
    echo "      </div>";
    echo "      <div class='form-group ' >";
    echo "          <label for='mes'>Fecha de caducidad:</label>";
    echo "          <select id='mes' name='mes'class='form-control '>";
    for($i=1;$i<=12;$i++){
        echo "<option value='".$i."'>".$i."</option>";
    }
    echo "          </select>";
    $ano=date("Y");
    echo "          <select id='ano' name='ano' class='form-control '> ";
    for($i=$ano;$i<=$ano+10;$i++){
        echo "<option value='".$i."'>".$i."</option>";
    }
    echo "          </select>";
    echo "      </div>";
    echo "      <div class='form-group' >";
    echo "          <label for='CVV'>CVV:</label>";
    echo "          <input type='text' id='CVV' name='CVV' class='form-control'>";
    echo "      </div>";
    echo "      </div>";
    echo "  </div>";
    echo "</div>";
    echo "<script src=\"../js/validarVisa.js\"></script>";
    echo "<script src=\"../js/mostrarVisa.js\"></script>";
?>
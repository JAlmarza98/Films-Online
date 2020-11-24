<?php
        $visa=$_POST['visa'];
        $paypal=$_POST['paypal'];
        if($visa=="visa"){
            echo "<table><tr><td><label for='NombreyApellidos'>Nombre y apellidos:</label></td>";
            echo "<td><input type='text' id='NombreyApellidos' name='NombreyApellidos'></td></tr>";
            echo "<tr><td><label for='NumeroTarjeta'>Numero de tarjeta:</label></td>";
            echo "<td><input type='text' id='NumeroTarjeta' name='NumeroTarjeta'></td></tr>";
            echo "<tr><td><label for='mes'>Fecha de caducidad:</label></td>";
            echo "<td><select id='mes' name='mes'>";
            for($i=1;$i<=12;$i++){
                echo "<option value='".$i."'>".$i."</option>";
            }
            echo "</select>/";
            $ano=date("Y");
            echo "<select id='ano' name='ano'>";
            for($i=$ano;$i<=$ano+10;$i++){
                echo "<option value='".$i."'>".$i."</option>";
            }
            echo "</select></td></tr>";
            echo "<tr><td><label for='LoginEmail'>CVV:</label></td>";
            echo "<td><input type='text' id='CVV' name='CVV'></td></tr></table>";
            echo "<script src=\"../js/validarVisa.js\"></script>";
        }elseif($paypal=="paypal"){
            echo "<table><tr><td><label for='EmailPaypal'>Correo de PayPal:</label></td>";
            echo "<td><input type='email' id='EmailPaypal' name='EmailPaypal'></td></tr>";
            echo "<tr><td><label for='PassPaypal'>Contraseña de Paypal:</label></td>";
            echo "<td><input type='password' id='PassPaypal' name='PassPayPal'></td></tr></table>";
            echo "<script src=\"../js/validarPaypal.js\"></script>";
        }else{
            echo "ERROR....";
        }
?>
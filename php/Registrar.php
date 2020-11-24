<!DOCTYPE html>
<html>
    <head>
        <title>Films Online</title>
        <META http-equiv="Content-Type" content="text/html; ISO-8859-1">
        <META NAME="DC.Language" SCHEME="RFC1766" CONTENT="Spanish">
        <META NAME="DESCRIPTION" CONTENT="Films Online, la nueva forma de ver cine. Navega en nuestro catalogo u disfruta de tod el contenido que puedas imaginar de la forma que quieras.">
        <META NAME="KEYWORDS" CONTENT="Video, series, stream, peliculas, multimedia">
        <META NAME="Resource-type" CONTENT="Index">
        <META NAME="Revisit-after" CONTENT="1 days">
        <META NAME="robots" content="ALL">
        <META charset="utf-8">
        <META name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="../css/main.css"/>
        <link rel="stylesheet" href="../css/pago.css"/>
        <link rel="shortcut icon" type="image/png" href="#"/>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="../js/metodo.js"></script>
    </head>
    <body>
        <form method="POST" action="Anadir.php" onsubmit="return comprobarDatosFormulario()">   
        <div class="container-fluid">
            <div class="row">
                <div class="col-1 col-lg-3"></div>
                <div class="col-10 col-lg-6" id="datos" >
                    <p>Introduce tus datos personales</p>
                    <div class="form-group">
                        <label for="AddName">Nombre</label>
                        <input type="text" class="form-control" id="AddName" name="AddName" placeholder="Introduce tu nombre">
                        <span id="errorAddName"></span>
                    </div>
                    <div class="form-group">
                        <label for="AddLastName">Apellido</label>
                        <input type="text" class="form-control" id="AddLastName" name="AddLastName" placeholder="Introduce tu Apellido">
                        <span id="errorAddLastName"></span>
                    </div>
                    <div class="form-group">
                        <label for="AddDirection">Dirección</label>
                        <input type="text" class="form-control" id="AddDirection" name="AddDirection" placeholder="Introduce tu direccion (no es obligatorio)">
                        <span id="errorAddDirection"></span>
                    </div>
                    <div class="form-group">
                        <label for="AddTelf">Teléfono</label>
                        <input type="tel" class="form-control" id="AddTelf" name="AddTelf" placeholder="Introduce tu nº de telefono(no es obligatorio)">
                        <span id="errorAddTelf"></span>
                    </div>
                    <div class="form-group">
                        <label for="AddEmail">Email</label>
                        <input type="email" class="form-control" id="AddEmail" name="AddEmail" placeholder="Introduce tu email">
                        <span id="errorAddEmail">
                            <?php
                                include 'Error4.php';
                            ?>
                        </span>
                    </div>
                    <div class="form-group">
                        <label for="AddPassword">Contraseña</label>
                        <input type="password" class="form-control" id="AddPassword" name="AddPassword" placeholder="Introduce tu contraseña">
                        <span id="errorAddPassword"></span>
                    </div>
                </div>
                <div class="col-1 col-lg-3" ></div>
                <div class="col-sm-1 col-lg-1 "></div>
                <div class="col-sm-11 col-lg-11 col-12">
                    <p>Tipo de mensualidad:</p>
                    <?php
                        include 'Mostrarprecios.php';
                    ?>
                </div>
                <div class="col-2" ></div>
                <div class="col-8" >
                    <p>Selecciona el metodo de pago</p>
                </div>
                <div class="col-2"></div>
                <div class="col-lg-4 col-sm-2 col-2"></div>
                <div class="col-lg-5 col-10 col-sm-8" >
                    <input class="checkbox-budget" type="radio" value="visa" name="metodo" id="visa" checked>
                    <label  id="metodo" class="for-checkbox-budget" for="visa">
                        <span id="metodo" data-hover="Visa">Visa</span>
                    </label>
                    <input class="checkbox-budget" type="radio" value="paypal" name="metodo" id="paypal">
                    <label id="metodo"class="for-checkbox-budget" for="paypal">
                        <span id="metodo" data-hover="PayPal">PayPal</span>
                    </label>
                </div>
                <div class="col-lg-3 col-sm-2" ></div>
                <div class="col-1"></div>
                <div class="col-10" >
                    <div id="destino"></div>
                </div>
                <div class="col-1" ></div>
                <div class="col-12 col-sm-12 col-lg-12" id="space-big" ></div>
                <div class="col-1 col-sm-3 col-lg-5" ></div>
                <div class="col-11 col-sm-6 col-lg-3" >
                    <button type="submit" id="Registar" name="Registrar">Registrar</button>
                    <button type="button" id="Cancelar" name="Cancelar" onclick="location.href='../index.php'">Cancelar</button>
                </div>
                <div class="col-sm-3 col-lg-4" ></div>
                <div class="col-12 col-sm-12 col-lg-12" id="space-big" ></div>
            </div>
        </div>
        </form>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    </body>
</html>
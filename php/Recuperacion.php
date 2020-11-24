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
        <link rel="stylesheet" href="../css/main.css"/>
        <link rel="stylesheet" href="../css/recuperacion.css"/>
        <META name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="../js/validarRecuperacion.js"></script>
    </head>
    <body>
        <form method="POST" action="Password.php" onsubmit="return comprobarDatosFormulario()">
            <div class="container-fluid">
                <div class="row">
                <div class="col-12 col-sm-12 col-lg-12" id="space-big" ></div>
                    <?php
                        include 'Error2.php';
                    ?>
                    <div class="col-1 col-lg-3"></div>
                    <div class="col-10 col-lg-6" id="datos">
                        <p>Introduce tus datos personales</p>
                        <div class="form-group">
                            <label for="AddName">Nombre usuario:</label>
                            <input type="text" id="Name" class="form-control" name="Name" placeholder="Introduce tu nombre">
                            <span id="errorName"></span>
                        </div>
                        <div class="form-group">
                            <label for="AddName">Apellidos usuario:</label>
                            <input type="text" id="LastName" class="form-control" name="LastName" placeholder="Introduce tus apellidos">
                            <span id="errorLastName"></span>
                        </div>
                        <div class="form-group">
                            <label for="AddName">Email usuario:</label>
                            <input type="email" id="Email" class="form-control" name="Email" placeholder="Introduce tu email">
                            <span id="errorEmail"></span>
                        </div>
                    </div>
                    <div class="col-1 col-lg-3"></div>
                    <div class="col-12 col-sm-12 col-lg-12" id="space-big" ></div>
                    <div class="col-1 col-sm-3 col-lg-5" ></div>
                    <div class="col-11 col-sm-6 col-lg-3" >
                        <button type="submit" id="Recuperar" name="Recuperar">Recuperar</button>
                        <button type="button" id="Cancelar" name="Cancelar" onclick="location.href='../index.php'">Cancelar</button>
                        </div>
                    <div class="col-sm-3 col-lg-4" ></div>
                </div>
            </div>
        <form>
        <?php
            include 'Error3.php';
        ?>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    </body>
</html>
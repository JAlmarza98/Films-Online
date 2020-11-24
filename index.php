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
        <link rel="stylesheet" href="./css/main.css"/>
        <link rel="stylesheet" href="./css/index.css"/>
        <link rel="shortcut icon" type="image/png" href="#"/>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    </head>
    <body>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12 col-lg-12" id="space"></div>
                <div class="col-sm-1 col-lg-4"></div>
                <div class="col-sm-10 col-lg-4 col-12" id="name">
                    <p id="name">Films Online</p>
                </div>
                <div class="col-sm-5 col-lg-2 col-3"></div>
                <div class="col-lg-2 col-sm-3 col-5">
                    <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#sesion-start" id="inicio">Inicia Sesion</button>
                    <div id="sesion-start" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <form method="POST" action="php/Autentificacion.php">
                                        <div class="form-group">
                                          <label for="LoginEmail">Email</label>
                                          <input type="email" class="form-control" id="LoginEmail" name="LoginEmail" placeholder="Introduce tu email">
                                        </div>
                                        <div class="form-group">
                                          <label for="LoginPassword">Contraseña</label>
                                          <input type="password" class="form-control" id="LoginPassword" name="LoginPassword" placeholder="Introduce tu contraseña">
                                        </div>
                                        <div class="sub-text"><a href="php/Recuperacion.php">No recuerdo mi contraseña</a></div>
                                        <div id="space"></div><hr>
                                        <?php
                                            include 'php/Error.php';
                                        ?>
                                        <button type="submit" class="btn btn-primary" id="Entrar" name="Entrar">Entrar</button>
                                        <button type="button" class="btn btn-default" data-dismiss="modal" id="cancel">Cancelar</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-lg-12" id="space-big"></div>
                <div class="col-lg-7 col-sm-2 col-1"></div>
                <div class="col-lg-3 col-sm-8 col-10" style="text-shadow: 0px 0px 5px #000000;">
                    <p>Tu cine...</p>
                    <p id="indent">...tus normas</p><br>
                    <p> Con Films online disfruta de las mejores series y peliculas donde, cuando y como tu quieras. Sin interrumciones y siempre con la mejor calidad.</p>
                    <p>Olvidate por fin de buscar links, todo lo que quieres ver, en el mismo sitio y sin pagos extras.</p>
                </div>
                <div class="col-lg-2 col-sm-2 col-1"></div>
                <div class="col-sm-12 col-lg-12" id="space-big"></div>
                <div class="col-lg-5 col-sm-5 col-4 "></div>
                <div class="col-lg-2 col-sm-2 col-4">
                    <input type="button" onclick="location.href='php/Registrar.php'" value="Registrar" id="registro"/>
                </div>
                <div class="col-lg-5 col-sm-5 col-4"></div>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>

        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>

        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>
    </body>
</html>
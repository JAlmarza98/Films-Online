<head>
    <title>Films Online</title>
    <META http-equiv="Content-Type" content="text/html; ISO-8859-1">
    <META NAME="DC.Language" SCHEME="RFC1766" CONTENT="Spanish">
    <META charset="utf-8">
    <META name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../css/main.css" />
    <link rel="stylesheet" href="../css/catalogo.css" />
    <link rel="stylesheet" href="../css/pelisSeries.css" />
    <link rel="stylesheet" href="../css/navbar.css" />
    <link rel="stylesheet" href="../css/footer.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/5c4ea47aab.js" crossorigin="anonymous"></script>
    <script src="../js/lista.js"></script>
    <script src="../js/cookie.js"></script>
</head>
<body style="background-color:  #353746;">
    <?php
        include 'MostrarCatalogo.php';
        include 'MostrarLista.php';
        include 'header.php';
    ?>
    
    <div class="container-fluid mt-5" style="min-height: 1150px">
        <div class="row">  
            <div class="col-lg-2 offset-lg-1 filtro">
                </form>
                    <div class="col-12">
                        <span id="buscar">
                            <h1>Buscar:</h1>
                            <input type="radio" value="genero" id="buscar" name="buscar"><label>&nbspGenero</label><br> 
                            <input type="radio" value="ano" id="buscar" name="buscar"><label>&nbspAño</label><br> 
                            <input type="radio" value="puntuacion" id="buscar" name="buscar"><label>&nbspPuntuacion</label><br>  
                            <input type="radio" value="sin" id="buscar" name="buscar"><label>&nbspSin filtros</label><br> 
                        <span>    
                    </div>
                    <div class="col-12">
                        <span id="anadirGenero">
                            <hr>
                            <input type="radio" value="Acción" id="genero" name="genero"><label>&nbspAcción</label><br> 
                            <input type="radio" value="Animación" id="genero" name="genero"><label>&nbspAnimación</label><br>
                            <input type="radio" value="Aventura" id="genero" name="genero"><label>&nbspAventura</label><br>   
                            <input type="radio" value="Biográfico" id="genero" name="genero"><label>&nbspBiográfico</label><br> 
                            <input type="radio" value="Catástrofes" id="genero" name="genero"><label>&nbspCatástrofes</label><br>
                            <input type="radio" value="Comedia" id="genero" name="genero"><label>&nbspComedia</label><br>
                            <input type="radio" value="Crimen" id="genero" name="genero"><label>&nbspCrimen</label><br>  
                            <input type="radio" value="Drama" id="genero" name="genero"><label>&nbspDrama</label><br> 
                            <input type="radio" value="Documental" id="genero" name="genero"><label>&nbspDocumental</label><br>
                            <input type="radio" value="Guerra" id="genero" name="genero"><label>&nbspGuerra</label><br> 
                            <input type="radio" value="Fantasía" id="genero" name="genero"><label>&nbspFantasía</label><br> 
                            <input type="radio" value="Histórico" id="genero" name="genero"><label>&nbspHistórico</label><br>
                            <input type="radio" value="Musical " id="genero" name="genero"><label>&nbspMusical </label><br>   
                            <input type="radio" value="Policíaco" id="genero" name="genero"><label>&nbspPolicíaco</label><br>
                            <input type="radio" value="Romance" id="genero" name="genero"><label>&nbspRomance</label><br>
                            <input type="radio" value="Sci-Fi" id="genero" name="genero"><label>&nbspSci-Fi</label><br> 
                            <input type="radio" value="Suspense" id="genero" name="genero"><label>&nbspSuspense </label><br> 
                            <input type="radio" value="Terror" id="genero" name="genero"><label>&nbspTerror </label><br>
                            <input type="radio" value="Thriller" id="genero" name="genero"><label>&nbspThriller </label><br> 
                        <span> 
                        </div>
                    <div class="col-12">
                        <span id="anadirAno">
                                <hr>
                                <?php
                                    mostrarAnos();
                                ?>
                        <span> 
                    </div>
                    <div class="col-12">
                        <span id="anadirPuntuacion">
                                <hr>
                                <input type="radio" value="0.00" id="puntuacion" name="puntuacion"><label>&nbsp0</label><br> 
                                <input type="radio" value="1.00" id="puntuacion" name="puntuacion"><label>&nbsp1</label><br> 
                                <input type="radio" value="2.00" id="puntuacion" name="puntuacion"><label>&nbsp2</label><br>  
                                <input type="radio" value="3.00" id="puntuacion" name="puntuacion"><label>&nbsp3</label><br> 
                                <input type="radio" value="4.00" id="puntuacion" name="puntuacion"><label>&nbsp4</label><br> 
                                <input type="radio" value="5.00" id="puntuacion" name="puntuacion"><label>&nbsp5</label><br>   
                        <span>    
                    </div>
                </form>
            </div>
            <div class='col-lg-8' id="mostrar">
                <div class="grid text-white">
                    <?php
                        if(isset($_GET['genero'])){
                            mostrarMiListaGenero($_GET['genero']);
                        }else if(isset($_GET['ano'])){
                            mostrarMiListaAno($_GET['ano']);
                        }else if(isset($_GET['puntuacion'])){
                            mostrarMiListaPuntuacion($_GET['puntuacion']);
                        }else{
                            mostrarMiLista();
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <?php
        include '../html/footer.html';
    ?>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
    </script>
</body>

</html>
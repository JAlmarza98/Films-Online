<head>
    <title>Films Online</title>
    <META http-equiv="Content-Type" content="text/html; ISO-8859-1">
    <META NAME="DC.Language" SCHEME="RFC1766" CONTENT="Spanish">
    <META NAME="DESCRIPTION"
        CONTENT="Films Online, la nueva forma de ver cine. Navega en nuestro catalogo u disfruta de tod el contenido que puedas imaginar de la forma que quieras.">
    <META NAME="KEYWORDS" CONTENT="Video, series, stream, peliculas, multimedia">
    <META NAME="Resource-type" CONTENT="Index">
    <META NAME="Revisit-after" CONTENT="1 days">
    <META NAME="robots" content="ALL">
    <META charset="utf-8">
    <META name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../css/main.css" />
    <link rel="stylesheet" href="../css/catalogo.css" />
    <link rel="stylesheet" href="../css/navbar.css" />
    <link rel="stylesheet" href="../css/footer.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/5c4ea47aab.js" crossorigin="anonymous"></script>
</head>
<body>
    <?php
        include 'MostrarBusqueda.php';
        include '../html/header.html';
        mostrarPromo();
    ?>
    
    <div class="cuerpo">
        <div class="mt-5 mb-5">
            <p class="ml-5">Ultimas añadidas</p>
            <div class="carteles">
            <div class='margen item'></div>
                <?php
                   mostrarUltimas();
                ?>
            </div>
        </div>
        <?php
        if(isset($_POST['search'])){
            $buscar=$_POST['search'];
            $tipoBusqueda="pelicula/Serie";
            echo "Películas / Series que coincidan con: ".$buscar;
            mostrarBusqueda($tipoBusqueda,$buscar);
        }else if(isset($_GET['director'])){
            $buscar=$_GET['director'];
            $tipoBusqueda="director";
            echo "Películas / Series que haya dirigido: ".$buscar;
            mostrarBusqueda($tipoBusqueda,$buscar);
        }else if(isset($_GET['actor'])){
            $buscar=$_GET['actor'];
            $tipoBusqueda="actor";
            echo "Películas / Series en las que haya participado: ".$buscar;
            mostrarBusqueda($tipoBusqueda,$buscar);
        }else{
            echo "No se ha podido realizar la busqueda.";
        }
        include '../html/footer.html';
        ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
    </script>
</body>

</html>
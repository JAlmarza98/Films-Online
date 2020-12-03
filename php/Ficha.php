<head>
    <title>Films Online</title>
    <META http-equiv="Content-Type" content="text/html; ISO-8859-1">
    <META NAME="DC.Language" SCHEME="RFC1766" CONTENT="Spanish">
    <META NAME="Resource-type" CONTENT="Index">
    <META NAME="Revisit-after" CONTENT="1 days">
    <META NAME="robots" content="ALL">
    <META charset="utf-8">
    <META name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <META charset="utf-8">
    <link rel="stylesheet" href="../css/main.css" />
    <link rel="stylesheet" href="../css/catalogo.css" />
    <link rel="stylesheet" href="../css/navbar.css" />
    <link rel="stylesheet" href="../css/footer.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
    <script src="https://kit.fontawesome.com/5c4ea47aab.js" crossorigin="anonymous"></script>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
    />
    <script src="../js/ficha.js"></script>
    <style>
    </style>
</head>
<body style="background-color:  #353746;">
    <?php
        include 'MostrarCatalogo.php';
        include 'MostrarFicha.php';
        include '../html/header.html';
    ?>
    <div class="mt-5">
        <?php
            if(isset($_GET['pelicula'])){
                echo "<p class='ml-5 text-white'>TOP 10 Peliculas</p>";
            }else{
                echo "<p class='ml-5 text-white'>TOP 10 Series</p>";  
            }
        ?>
        <div class="carteles">
            <div class='margen item'></div>
            <?php
               if(isset($_GET['pelicula'])){
                    mostrarTopPeliculas();
                }else if(isset($_GET['serie'])){
                    mostrarTopSeries();
                }else{
                    header("Location: Catalogo.php");
                }
            ?>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
        <?php
               if(isset($_GET['pelicula'])){
                    $nombrePelicula=$_GET['pelicula'];
                    mostrarFichaPelicula($nombrePelicula);
                }else if(isset($_GET['serie'])){
                }else{
                    header("Location: Catalogo.php");
                }
            ?>
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
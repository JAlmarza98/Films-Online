<!DOCTYPE html>
<html>
  <head>
    <title>Films Online-Admin</title>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="../css/dash-board.css" />
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
      integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk"
      crossorigin="anonymous"
    />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script
      src="https://kit.fontawesome.com/5c4ea47aab.js"
      crossorigin="anonymous"
    ></script>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
    />
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
    <script src="../js/metodoAdmin.js"></script>
    <script src="../js/jquery.min.js"></script>
  </head>
  <body style="overflow: hidden">
    <div class="dash-menu">
      <div class="seccion" id="home">
        <div class="icon">
          <i class="fas fa-home"></i>
        </div>
        <div class="name">Home</div>
      </div>
      <div class="seccion" id="users">
        <div class="icon">
          <i class="fas fa-users"></i>
        </div>
        <div class="name">Usuarios</div>
      </div>
      <div class="seccion" id="movies">
        <div class="icon">
          <i class="fas fa-film"></i>
        </div>
        <div class="name">Peliculas</div>
      </div>
      <div class="seccion" id="series">
        <div class="icon">
          <i class="fas fa-store"></i>
        </div>
        <div class="name">Series</div>
      </div>
      <div class="seccion" id="capital">
        <div class="icon">
          <i class="fas fa-dollar-sign"></i>
        </div>
        <div class="name">Capital</div>
      </div>
      <div
        class="seccion bottom"
        onclick="window.location.href='../php/Catalogo.php'"
      >
        <div class="icon">
          <i class="fas fa-sign-out-alt"></i>
        </div>
        <div class="name">Salir</div>
      </div>
    </div>

    <div class="dash-body">
      <div class="contenido" id="contenido"></div>
    </div>

    <script
      src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
      integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
      integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI"
      crossorigin="anonymous"
    ></script>
  </body>
</html>

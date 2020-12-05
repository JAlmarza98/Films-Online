<!DOCTYPE html>
<html>
  <head>
    <title>Films Online-Admin</title>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="../css/navbar.css" />
    <link rel="stylesheet" href="../css/catalogo.css" />
    <META http-equiv="Content-Type" content="text/html; ISO-8859-1">
    <META name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
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
  </head>
  <body style="background-color: #353746;color: white;">
    <?php
      include '../html/header.html';
    ?>

    <div class="container" >
      <div class="row" >
        <div class="col-10 offset-1 mt-5 mb-5" >
          <div class="user-icon text-center" >
            <i class="far fa-user-circle fa-10x"></i>
          </div>
        </div>
        <div class="col-10 offset-1 mt-5">
          <form action="#">
            <div class="form-group">
              <label for="AddName">Nombre</label>
              <input type="text" class="form-control" id="AddName" name="AddName" placeholder="Introduce tu nombre">
            </div>
            <div class="form-group">
              <label for="AddLastName">Apellido</label>
              <input type="text" class="form-control" id="AddLastName" name="AddLastName" placeholder="Introduce tu Apellido">
            </div>
            <div class="form-group">
              <label for="AddDirection">Dirección</label>
              <input type="text" class="form-control" id="AddDirection" name="AddDirection" placeholder="Introduce tu direccion (no es obligatorio)">   
            </div>
            <div class="form-group">
              <label for="AddTelf">Teléfono</label>
              <input type="tel" class="form-control" id="AddTelf" name="AddTelf" placeholder="Introduce tu nº de telefono(no es obligatorio)">
            </div>
            <div class="form-group">
              <label for="AddEmail">Email</label>
              <input type="email" class="form-control" id="AddEmail" name="AddEmail" placeholder="Introduce tu email">
            </div>
            <div class="form-group">
              <label for="AddPassword">Contraseña</label>
              <input type="password" class="form-control" id="AddPassword" name="AddPassword" placeholder="Introduce tu contraseña">
            </div>
          </form>
        </div>
        <div class="col-10 offset-1 text-center mb-5">
          <div type="button" class="btn btn-outline-info mr-3" onclick="window.location.href='../php/Catalogo.php'">
            Cancelar
          </div >
          <button class="btn btn-primary ">
            Guardar Cambios
          </button>
        </div>
      </div>
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
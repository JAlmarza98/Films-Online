<!DOCTYPE html>
<html>
  <head>
    <title>Films Online-Admin</title>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="../css/navbar.css" />
    <link rel="stylesheet" href="../css/catalogo.css" />
    <link rel="stylesheet" href="../css/footer.css" />
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
      include 'header.php';
      $conexion=mysqli_connect('localhost', 'root', '', 'films_online');
        mysqli_set_charset($conexion, 'UTF8');
        $consulta="SELECT nombreUsuario,apellidoUsuario,direccion,telefono FROM usuarios WHERE idUsuario='".$_COOKIE["Id"]."' and email='".$_COOKIE["Usuario"]."'";
        $resultado=mysqli_query($conexion,$consulta);

        while($fila=mysqli_fetch_row($resultado)){
            $nombreUsuaurio=$fila[0];
            $apellidoUsuario=$fila[1];
            $direccion=$fila[2];
            if($direccion=="Null"){
              $direccion="";
            }
            $telefono=$fila[3];
            if($telefono=="Null" || $telefono==0){
              $telefono="";
            }
        }
        mysqli_close($conexion);
    ?>
    
    <div class="container" style="min-height: 1150px" >
      <div class="row" >
        <div class="col-md-7 col-12">
          <div class="col-10 offset-1 mt-5 mb-5" >
            <div class="user-icon text-center" >
              <i class="far fa-user-circle fa-10x"></i>
            </div>
          </div>
          <div class="col-10 offset-1 mt-5">
            <form action="ModificarUsuario.php" method="POST">
            <div class="form-group">
              <label for="AddName">Nombre</label>
              <input type="text" class="form-control" id="AddName" name="AddName" placeholder="Introduce tu nombre" value="<?php echo $nombreUsuaurio ?>">
              <span id="errorAddName">
                <?php if(isset($_GET['Name'])){
                  echo "El nombre no puede ser vacío.";
                }else if(isset($_GET['NameError'])){
                  echo "El nombre solo puede contener letras y espacios.";
                }else{}
                ?>
              </span>
            </div>
            <div class="form-group">
              <label for="AddLastName">Apellido</label>
              <input type="text" class="form-control" id="AddLastName" name="AddLastName" placeholder="Introduce tu Apellido" value="<?php echo $apellidoUsuario ?>">
              <span id="errorAddLastName">
                <?php if(isset($_GET['LastName'])){
                    echo "El apellido no puede ser vacío.";
                }else if(isset($_GET['LastNameError'])){
                  echo "El apellido solo puede contener letras y espacios.";
                }else{}
                ?>
              </span>
            </div>
            <div class="form-group">
              <label for="AddDirection">Dirección</label>
              <input type="text" class="form-control" id="AddDirection" name="AddDirection" placeholder="Introduce tu direccion (no es obligatorio)" value="<?php echo $direccion ?>">
            </div>
            <div class="form-group">
              <label for="AddTelf">Teléfono</label>
              <input type="tel" class="form-control" id="AddTelf" name="AddTelf" placeholder="Introduce tu nº de telefono(no es obligatorio)" value="<?php echo $telefono ?>">
              <span id="errorAddTelf">
                <?php if(isset($_GET['TelfError'])){
                    echo "El Teléfono no es valido.";
                }
                ?>
              </span>
            </div>
            <div class="form-group">
              <label for="AddPassword">Contraseña nueva</label>
              <input type="password" class="form-control" id="AddPassword" name="AddPassword" placeholder="Introduce tu nueva contraseña">
              <span id="errorAddPassword">
                <?php if(isset($_GET['PasswordError'])){
                    echo "La clave debe tener al menos 8 caracteres, no más de 15 caracteres, una letra minúscula, una letra mayúscula y un caracter numérico y un caracter especial.";
                }
                ?>
              </span>
            </div>
          </div>
          <div class="col-10 offset-1 text-center mb-5">
            <div type="button" class="btn btn-outline-info mr-3" onclick="window.location.href='../php/Catalogo.php'">
              Cancelar
            </div >
            <input type="submit" class="btn btn-info mr-3" name="submit" value="Guardar Cambios"/>
          </div>
          </form>
        </div>
        <div class="col-md-5 col-12 facturas mt-5" >
          <div class="scroll">
            <table style="width: 100%;">
              <thead class="font-weight-bold">
                <tr>
                  <th>Inicio</th>
                  <th>Expiración</th>
                  <th>Pago</th>
                  <th>Días</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $conexion=mysqli_connect('localhost', 'root', '', 'films_online');
                  mysqli_set_charset($conexion, 'UTF8');
                  $consulta="SELECT f.fechaFacturacion,f.fechaExpiracion,f.tipo,p.tipo FROM facturacion f,precios p WHERE f.idPrecios=p.idPrecios and idUsuario='".$_COOKIE["Id"]."'";
                  $resultado=mysqli_query($conexion,$consulta);
          
                  while($fila=mysqli_fetch_row($resultado)){
                      $fechaFacturacion=$fila[0];
                      $fechaExpiracion=$fila[1];
                      $tipo=$fila[2];
                      $duracion=$fila[3];
                      
                      echo "<tr class='text-white-50'>";
                      echo "<td>".$fechaFacturacion."</td>";
                      echo "<td>".$fechaExpiracion."</td>";
                      echo "<td>".$tipo."</td>";
                      echo "<td>".$duracion."</td>";
                      echo "<tr>";
                  }
                  mysqli_close($conexion);
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

    <?php
      include '../html/footer.html'
    ?>

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
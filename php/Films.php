<!DOCTYPE html>
<html>
  <head>
    <title>Films Online-Admin</title>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="../css/dash-board.css" />
    <link rel="stylesheet" href="../css/catalogo.css" />
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
    <script src="../js/jquery.min.js"></script>
    <script>
      function eliminar(id) {
        window.location.href = "EliminarFilm.php?id="+id;
      }
    </script>
  </head>
  <body style="overflow: hidden">
<?php
  include "Admin.php";
?>
<div class="dash-body">
  <div class="contenido" id="contenido">
    <div class="container animate__animated animate__fadeIn">
      <div class="row">
        <div class="col-10 offset-1 users mt-5 mb-5">
          <div class="table-top">
            <h4>Todas las peliculas</h4>
          </div>
          <div class="tabla-films">
            <table>
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Nombre</th>
                  <th>Categoría</th>
                  <th>Puntuación</th>
                  <th>Actualización</th>
                  <th>Editar</th>
                  <th>Eliminar</th>
                </tr>
              </thead>
              <tbody>
              <?php
                $cont=0;
                $conexion=mysqli_connect('localhost', 'root', '', 'films_online');
                mysqli_set_charset($conexion, 'UTF8');

                $consulta="SELECT idPeliculasSeries,nombre,categoria,rating,fechaActualizacion,director,actores,año,descripcion
                   FROM peliculasseries WHERE tipo='pelicula'";
                $resultado=mysqli_query($conexion,$consulta);
               
                while($fila=mysqli_fetch_row($resultado)){
                  $idPeliculasSeries=$fila[0];
                  $nombre=$fila[1];
                  $categoria=$fila[2];
                  $rating=$fila[3];
                  $fechaActualizacion=$fila[4];
                  $director=$fila[5];
                  $actores=$fila[6];
                  $year=$fila[7];
                  $descripcion=$fila[8];
                  
                    echo "<tr class=''>";
                    echo "<td>".$idPeliculasSeries."</td>";
                    echo "<td>".$nombre."</td>";
                    echo "<td>".$categoria."</td>";
                    echo "<td>".$rating."</td>";
                    echo "<td>".$fechaActualizacion."</td>";
                    echo "<td>";
                    echo "<button type='button' class='btn btn-info' data-toggle='modal' data-target='#editFilmModal$idPeliculasSeries'>";
                    echo "<i class='fas fa-edit'></i>";
                    echo "</button>";
                    echo "</td>";
                    echo "<td>";
                    echo "<button class='btn btn-danger' onclick='eliminar($idPeliculasSeries)'>";
                    echo "<i class='fas fa-trash-alt'></i>";
                    echo "</button>";
                    echo "</td>";
                    echo "</tr>";
                    $cont++;

                    //Modal para modificar una pelicula ya subida
                    echo "<div class='modal fade' id='editFilmModal$idPeliculasSeries' tabindex='-1' aria-labelledby='editFilmModal$idPeliculasSeries' aria-hidden='true'>";
                    echo "<div class='modal-dialog'>";
                    echo "<div class='modal-content' style='background-color: #212531'>";
                    echo "<div class='modal-header'>";
                    echo "<h5 class='modal-title' id='exampleModalLabel$nombre'>Editar pelicula</h5>";
                    echo "<button
                              type='button'
                              class='close'
                              data-dismiss='modal'
                              aria-label='Close'
                            >";
                    echo "<span aria-hidden='true'>&times;</span>";
                    echo "</button>";
                    echo "</div>";
                    echo "<div class='modal-body'>";
                    echo "<form action='ModificarPelicula.php' method='POST'>";
                    echo "<div class='form-group'>";
                    echo "<label>Nombre</label>";
                    echo "<input type='text' class='form-control' id='peliculaName' name='peliculaName' value='$nombre'/>";
                    echo "</div>";
                    echo "<div class='form-group'>";
                    echo "<label>Categoría</label>";
                    echo "<input type='text' class='form-control' id='peliculaCategoria' name='peliculaCategoria' value='$categoria'/>";
                    echo "</div>";
                    echo "<div class='form-group'>";
                    echo "<label>Director</label>";
                    echo "<input type='text' class='form-control' id='peliculaDirector' name='peliculaDirector' value='$director'/>";
                    echo "</div>";
                    echo "<div class='form-group'>";
                    echo "<label>Reparto</label>";
                    echo "<input type='text' class='form-control' id='peliculaReparto' name='peliculaReparto' value='$actores'/>";
                    echo "</div>";
                    echo "<div class='form-group'>";
                    echo "<label>Año</label>";
                    echo "<input type='text' class='form-control' id='peliculaYear' name='peliculaYear' value='$year'/>";
                    echo "</div>";
                    echo "<div class='form-group'>";
                    echo "<label for='exampleFormControlTextarea1'>Descripción</label>";
                    echo "<textarea
                                  class='form-control'
                                  id='peliculaDescipcion'
                                  name='peliculaDescipcion'
                                  rows='5'
                                >$descripcion</textarea>";
                    echo "</div>";
                    echo "<div class='form-group'>";
                    echo "<input type='hidden' class='form-control' id='id' name='id' value='$idPeliculasSeries'/>";
                    echo "</div>";
                    echo "</div>";
                    echo "<div class='modal-footer'>";
                    echo "<button type='button' class='btn btn-secondary' data-dismiss='modal'>
                              Cerrar
                            </button>";
                    echo " <input type='submit' class='btn btn-primary' name='submit' value='Guardar'/>
                    </form>";
                    echo "</div>";
                    echo "</div>";
                    echo "</div>";
                    echo "</div>";
                }
                mysqli_close($conexion);
              ?>
              </tbody>
            </table>
          </div>
          <div class="total">Total de peliculas: <span><?php echo $cont; ?></span></div>
        </div>
                <span id="error">
                  <?php
                    if(isset($_GET['duplicado'])){
                      echo "Pelicula duplicada.";
                    }else if(isset($_GET['vacio'])){
                      echo "Rellene correctamente el formulario de añadir.";
                    }else if(isset($_GET['errorProceso'])){
                      echo "Error al eliminar la pelicula.";
                    }else if(isset($_GET['errorModificar'])){
                      echo "Rellene correctamente el formulario de modificar, no puede estar vacío.";
                    }else{}
                  ?>
                </span>
        <div class="col-12 mt-5 mb-5">
          <button
            class="btn btn-success total"
            data-toggle="modal"
            data-target="#newFilm"
          >
            Añadir Pelicula
          </button>
        </div>
      </div>
    </div>
  
<!-- Modales -->
<!-- Modal para subir una nueva pelicula -->
<div
  class="modal fade"
  id="newFilm"
  tabindex="-1"
  aria-labelledby="exampleModalLabel"
  aria-hidden="true"
>
  <div class="modal-dialog modal-xl">
    <div class="modal-content" style="background-color: #212531">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Nueva Pelicula</h5>
        <button
          type="button"
          class="close"
          data-dismiss="modal"
          aria-label="Close"
        >
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="NuevaPelicula.php" method="POST" enctype="multipart/form-data">
          <div class="form-row">
            <div class="form-group col-md-6">
              <label>Nombre</label>
              <input type="text" class="form-control" id="peliculaName" name="peliculaName"/>
            </div>
            <div class="form-group col-md-4">
              <label>Categoría/s</label>
              <input type="text" class="form-control" id="peliculaCategoria" name="peliculaCategoria"/>
            </div>
            <div class="form-group col-md-2">
              <label>Año</label>
              <input type="number" class="form-control" id="peliculaYear" name="peliculaYear" min="1900" max="2099"/>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label>Director/es</label>
              <input type="text" class="form-control" id="peliculaDirector" name="peliculaDirector"/>
            </div>
            <div class="form-group col-md-6">
              <label>Reparto</label>
              <input type="text" class="form-control" id="peliculaReparto" name="peliculaReparto"/>
            </div>
          </div>
          <div class="form-group">
            <label for="exampleFormControlTextarea1">Descripción</label>
            <textarea
              class="form-control"
              id="peliculaDescipcion"
              name="peliculaDescipcion"
              rows="5"
            ></textarea>
          </div>
          <h4 class="mt-5">Archivos de imagen</h4>
          <div class="form-row">
            <div class="form-file col-md-6">
              <label>Cartel</label>
              <input type="file" id="cartel" name="cartel"/>
            </div>
            <div class="form-file col-md-6">
              <label>Imagen de Promoción</label>
              <input type="file" id="imgPromo" name="imgPromo"/>
            </div>
          </div>
          <h4 class="mt-5">Archivos de video</h4>
          <div class="form-row">
            <div class="form-file col-md-6">
              <label>Tráiler</label>
              <input type="file" id="trailer" name="trailer"/>
            </div>
            <div class="form-file col-md-6">
              <label>Pelicula</label>
              <input type="file" id="pelicula" name="pelicula"/>
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">
          Cerrar
        </button>
        <input type="submit" class="btn btn-primary" name="submit" value="Subir Pelicula"/>
        </form>
      </div>
    </div>
  </div>
</div>

</div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>
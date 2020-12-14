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
    <script src="../js/jquery.min.js"></script>
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
            <form class="form-inline">
              <input
                class="form-control"
                type="search"
                placeholder="Search"
                aria-label="Search"
              />
            </form>
          </div>
          <div class="tabla-films">
            <table>
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Nombre</th>
                  <th>Categoria</th>
                  <th>Puntuación</th>
                  <th>Actualizacion</th>
                  <th>Editar</th>
                  <th>Eliminar</th>
                </tr>
              </thead>
              <tbody>
                <tr class="">
                  <td>1</td>
                  <td>1917</td>
                  <td>Drama,Guerra</td>
                  <td>3</td>
                  <td>0/0/0000</td>
                  <td>
                    <button
                      class="btn btn-info"
                      data-toggle="modal"
                      data-target="#editFilmModal"
                    >
                      <i class="fas fa-edit"></i>
                    </button>
                  </td>
                  <td>
                    <button class="btn btn-danger">
                      <i class="fas fa-trash-alt"></i>
                    </button>
                  </td>
                </tr>
                <tr class="">
                  <td>4</td>
                  <td>Vengadores: End Game</td>
                  <td>Acción,Aventura,Drama</td>
                  <td>4.8</td>
                  <td>0/0/0000</td>
                  <td>
                    <button class="btn btn-info">
                      <i class="fas fa-edit"></i>
                    </button>
                  </td>
                  <td>
                    <button class="btn btn-danger">
                      <i class="fas fa-trash-alt"></i>
                    </button>
                  </td>
                </tr>
                <tr class="">
                  <td>1</td>
                  <td>1917</td>
                  <td>Drama,Guerra</td>
                  <td>3</td>
                  <td>0/0/0000</td>
                  <td>
                    <button class="btn btn-info">
                      <i class="fas fa-edit"></i>
                    </button>
                  </td>
                  <td>
                    <button class="btn btn-danger">
                      <i class="fas fa-trash-alt"></i>
                    </button>
                  </td>
                </tr>
                <tr class="">
                  <td>4</td>
                  <td>Vengadores: End Game</td>
                  <td>Acción,Aventura,Drama</td>
                  <td>4.8</td>
                  <td>0/0/0000</td>
                  <td>
                    <button class="btn btn-info">
                      <i class="fas fa-edit"></i>
                    </button>
                  </td>
                  <td>
                    <button class="btn btn-danger">
                      <i class="fas fa-trash-alt"></i>
                    </button>
                  </td>
                </tr>
                <tr class="">
                  <td>1</td>
                  <td>1917</td>
                  <td>Drama,Guerra</td>
                  <td>3</td>
                  <td>0/0/0000</td>
                  <td>
                    <button class="btn btn-info">
                      <i class="fas fa-edit"></i>
                    </button>
                  </td>
                  <td>
                    <button class="btn btn-danger">
                      <i class="fas fa-trash-alt"></i>
                    </button>
                  </td>
                </tr>
                <tr class="">
                  <td>4</td>
                  <td>Vengadores: End Game</td>
                  <td>Acción,Aventura,Drama</td>
                  <td>4.8</td>
                  <td>0/0/0000</td>
                  <td>
                    <button class="btn btn-info">
                      <i class="fas fa-edit"></i>
                    </button>
                  </td>
                  <td>
                    <button class="btn btn-danger">
                      <i class="fas fa-trash-alt"></i>
                    </button>
                  </td>
                </tr>
                <tr class="">
                  <td>1</td>
                  <td>1917</td>
                  <td>Drama,Guerra</td>
                  <td>3</td>
                  <td>0/0/0000</td>
                  <td>
                    <button class="btn btn-info">
                      <i class="fas fa-edit"></i>
                    </button>
                  </td>
                  <td>
                    <button class="btn btn-danger">
                      <i class="fas fa-trash-alt"></i>
                    </button>
                  </td>
                </tr>
                <tr class="">
                  <td>4</td>
                  <td>Vengadores: End Game</td>
                  <td>Acción,Aventura,Drama</td>
                  <td>4.8</td>
                  <td>0/0/0000</td>
                  <td>
                    <button class="btn btn-info">
                      <i class="fas fa-edit"></i>
                    </button>
                  </td>
                  <td>
                    <button class="btn btn-danger">
                      <i class="fas fa-trash-alt"></i>
                    </button>
                  </td>
                </tr>
                <tr class="">
                  <td>1</td>
                  <td>1917</td>
                  <td>Drama,Guerra</td>
                  <td>3</td>
                  <td>0/0/0000</td>
                  <td>
                    <button class="btn btn-info">
                      <i class="fas fa-edit"></i>
                    </button>
                  </td>
                  <td>
                    <button class="btn btn-danger">
                      <i class="fas fa-trash-alt"></i>
                    </button>
                  </td>
                </tr>
                <tr class="">
                  <td>4</td>
                  <td>Vengadores: End Game</td>
                  <td>Acción,Aventura,Drama</td>
                  <td>4.8</td>
                  <td>0/0/0000</td>
                  <td>
                    <button class="btn btn-info">
                      <i class="fas fa-edit"></i>
                    </button>
                  </td>
                  <td>
                    <button class="btn btn-danger">
                      <i class="fas fa-trash-alt"></i>
                    </button>
                  </td>
                </tr>
                <tr class="">
                  <td>1</td>
                  <td>1917</td>
                  <td>Drama,Guerra</td>
                  <td>3</td>
                  <td>0/0/0000</td>
                  <td>
                    <button class="btn btn-info">
                      <i class="fas fa-edit"></i>
                    </button>
                  </td>
                  <td>
                    <button class="btn btn-danger">
                      <i class="fas fa-trash-alt"></i>
                    </button>
                  </td>
                </tr>
                <tr class="">
                  <td>4</td>
                  <td>Vengadores: End Game</td>
                  <td>Acción,Aventura,Drama</td>
                  <td>4.8</td>
                  <td>0/0/0000</td>
                  <td>
                    <button class="btn btn-info">
                      <i class="fas fa-edit"></i>
                    </button>
                  </td>
                  <td>
                    <button class="btn btn-danger">
                      <i class="fas fa-trash-alt"></i>
                    </button>
                  </td>
                </tr>
                <tr class="">
                  <td>1</td>
                  <td>1917</td>
                  <td>Drama,Guerra</td>
                  <td>3</td>
                  <td>0/0/0000</td>
                  <td>
                    <button class="btn btn-info">
                      <i class="fas fa-edit"></i>
                    </button>
                  </td>
                  <td>
                    <button class="btn btn-danger">
                      <i class="fas fa-trash-alt"></i>
                    </button>
                  </td>
                </tr>
                <tr class="">
                  <td>4</td>
                  <td>Vengadores: End Game</td>
                  <td>Acción,Aventura,Drama</td>
                  <td>4.8</td>
                  <td>0/0/0000</td>
                  <td>
                    <button class="btn btn-info">
                      <i class="fas fa-edit"></i>
                    </button>
                  </td>
                  <td>
                    <button class="btn btn-danger">
                      <i class="fas fa-trash-alt"></i>
                    </button>
                  </td>
                </tr>
                <tr class="">
                  <td>1</td>
                  <td>1917</td>
                  <td>Drama,Guerra</td>
                  <td>3</td>
                  <td>0/0/0000</td>
                  <td>
                    <button class="btn btn-info">
                      <i class="fas fa-edit"></i>
                    </button>
                  </td>
                  <td>
                    <button class="btn btn-danger">
                      <i class="fas fa-trash-alt"></i>
                    </button>
                  </td>
                </tr>
                <tr class="">
                  <td>4</td>
                  <td>Vengadores: End Game</td>
                  <td>Acción,Aventura,Drama</td>
                  <td>4.8</td>
                  <td>0/0/0000</td>
                  <td>
                    <button class="btn btn-info">
                      <i class="fas fa-edit"></i>
                    </button>
                  </td>
                  <td>
                    <button class="btn btn-danger">
                      <i class="fas fa-trash-alt"></i>
                    </button>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="total">Total de peliculas: <span>65</span></div>
        </div>

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
  </div>
</div>
<!-- Modales -->
<!-- Modal para modificar una pelicula ya subida -->
<div
  class="modal fade"
  id="editFilmModal"
  tabindex="-1"
  aria-labelledby="exampleModalLabel"
  aria-hidden="true"
>
  <div class="modal-dialog">
    <div class="modal-content" style="background-color: #212531">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar pelicula</h5>
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
        <form>
          <div class="form-group">
            <label>Nombre</label>
            <input type="text" class="form-control" id="peliculaName" />
          </div>
          <div class="form-group">
            <label>Categoria</label>
            <input type="text" class="form-control" id="peliculaCategoria" />
          </div>
          <div class="form-group">
            <label>Director</label>
            <input type="text" class="form-control" id="peliculaDirector" />
          </div>
          <div class="form-group">
            <label>Reparto</label>
            <input type="text" class="form-control" id="peliculaReparto" />
          </div>
          <div class="form-group">
            <label>Año</label>
            <input type="text" class="form-control" id="peliculaYear" />
          </div>
          <div class="form-group">
            <label for="exampleFormControlTextarea1">Descripción</label>
            <textarea
              class="form-control"
              id="peliculaDescipcion"
              rows="5"
            ></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">
          Cerrar
        </button>
        <button type="button" class="btn btn-primary">Guardar</button>
      </div>
    </div>
  </div>
</div>

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
        <form>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label>Nombre</label>
              <input type="text" class="form-control" id="peliculaName" />
            </div>
            <div class="form-group col-md-4">
              <label>Categoria</label>
              <input type="text" class="form-control" id="peliculaCategoria" />
            </div>
            <div class="form-group col-md-2">
              <label>Año</label>
              <input type="text" class="form-control" id="peliculaYear" />
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label>Director</label>
              <input type="text" class="form-control" id="peliculaDirector" />
            </div>
            <div class="form-group col-md-6">
              <label>Reparto</label>
              <input type="text" class="form-control" id="peliculaReparto" />
            </div>
          </div>
          <div class="form-group">
            <label for="exampleFormControlTextarea1">Descripción</label>
            <textarea
              class="form-control"
              id="peliculaDescipcion"
              rows="5"
            ></textarea>
          </div>
          <h4 class="mt-5">Archivos de imagen</h4>
          <div class="form-row">
            <div class="form-file col-md-6">
              <label>Cartel</label>
              <input type="file" id="cartel" />
            </div>
            <div class="form-file col-md-6">
              <label>Imagen de Promoción</label>
              <input type="file" id="imgPromo" />
            </div>
          </div>
          <h4 class="mt-5">Archivos de video</h4>
          <div class="form-row">
            <div class="form-file col-md-6">
              <label>Trailer</label>
              <input type="file" id="trailer" />
            </div>
            <div class="form-file col-md-6">
              <label>Pelicula</label>
              <input type="file" id="pelicula" />
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">
          Cerrar
        </button>
        <button type="button" class="btn btn-primary">Subir Pelicula</button>
      </div>
    </div>
  </div>
</div>

</body>
</html>
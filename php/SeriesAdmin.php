<div class="container animate__animated animate__fadeIn">
  <div class="row">
    <div class="col-12 users mt-5 mb-5">
      <div class="table-top ml-5">
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
              <th>Eliminar Serie</th>
              <th>Añadir Capitulo</th>
              <th>Eliminar Capitulo</th>
            </tr>
          </thead>
          <tbody>
            <tr class="">
              <td>1</td>
              <td>Juego de Tronos</td>
              <td>Drama,Guerra</td>
              <td>4</td>
              <td>0/0/0000</td>
              <td>
                <button
                  class="btn btn-info"
                  data-toggle="modal"
                  data-target="#editSerieModal"
                >
                  <i class="fas fa-edit"></i>
                </button>
              </td>
              <td>
                <button class="btn btn-danger">
                  <i class="fas fa-trash-alt"></i>
                </button>
              </td>
              <td>
                <button
                  class="btn btn-success"
                  data-toggle="modal"
                  data-target="#uploadCapModal"
                >
                  <i class="fas fa-upload"></i>
                </button>
              </td>
              <td>
                <button
                  class="btn btn-danger"
                  data-toggle="modal"
                  data-target="#deleteCapModal"
                >
                  <i class="fas fa-times"></i>
                </button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="total">Total de series: <span>32</span></div>
    </div>

    <div class="col-12 mt-5 mb-5">
      <button
        class="btn btn-success total"
        data-toggle="modal"
        data-target="#newFilm"
      >
        Añadir Serie
      </button>
    </div>
  </div>
</div>
<!-- Modales -->
<!-- Modal para modificar una Serie ya subida -->
<div
  class="modal fade"
  id="editSerieModal"
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
        <h5 class="modal-title" id="exampleModalLabel">Nueva Serie</h5>
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
          <div class="form-file">
            <label>Trailer</label>
            <input type="file" id="trailer" />
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">
          Cerrar
        </button>
        <button type="button" class="btn btn-primary">Subir Serie</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal para añadir un capitulo a una serie -->
<div
  class="modal fade"
  id="uploadCapModal"
  tabindex="-1"
  aria-labelledby="exampleModalLabel"
  aria-hidden="true"
>
  <div class="modal-dialog">
    <div class="modal-content" style="background-color: #212531">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Añadir un capitulo</h5>
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
            <input type="text" class="form-control" id="capNombre" />
          </div>
          <div class="form-group">
            <label>Numero</label>
            <input type="text" class="form-control" id="capNumero" />
          </div>
          <div class="form-file">
            <label>Capitulo</label>
            <input type="file" id="capitulo" />
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

<!-- Modal para eliminar capitulos de una serie-->
<div
  class="modal fade"
  id="deleteCapModal"
  tabindex="-1"
  aria-labelledby="exampleModalLabel"
  aria-hidden="true"
>
  <div class="modal-dialog">
    <div class="modal-content" style="background-color: #212531">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Eliminar Capitulos</h5>
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
        <div class="scroll">
          <form>
            <table class="text-center">
              <thead>
                <tr>
                  <th></th>
                  <th>Temporada</th>
                  <th>Capitulo</th>
                  <th>Nombre</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>
                    <input type="checkbox" name="cap1_1" value="1_1" />
                  </td>
                  <td>1</td>
                  <td>1</td>
                  <td>{{Nombre del capitulo}}</td>
                </tr>
                <tr>
                  <td>
                    <input type="checkbox" name="cap1_2" value="1_2" />
                  </td>
                  <td>1</td>
                  <td>2</td>
                  <td>{{Nombre del capitulo}}</td>
                </tr>
                <tr>
                  <td>
                    <input type="checkbox" name="cap1_3" value="1_3" />
                  </td>
                  <td>1</td>
                  <td>3</td>
                  <td>{{Nombre del capitulo}}</td>
                </tr>
                <tr>
                  <td>
                    <input type="checkbox" name="cap1_4" value="1_4" />
                  </td>
                  <td>1</td>
                  <td>4</td>
                  <td>{{Nombre del capitulo}}</td>
                </tr>
                <tr>
                  <td>
                    <input type="checkbox" name="cap1_5" value="1_5" />
                  </td>
                  <td>1</td>
                  <td>5</td>
                  <td>{{Nombre del capitulo}}</td>
                </tr>
                <tr>
                  <td>
                    <input type="checkbox" name="cap1_6" value="1_6" />
                  </td>
                  <td>1</td>
                  <td>6</td>
                  <td>{{Nombre del capitulo}}</td>
                </tr>
                <tr>
                  <td>
                    <input type="checkbox" name="cap1_7" value="1_7" />
                  </td>
                  <td>1</td>
                  <td>7</td>
                  <td>{{Nombre del capitulo}}</td>
                </tr>
                <tr>
                  <td>
                    <input type="checkbox" name="cap1_8" value="1_8" />
                  </td>
                  <td>1</td>
                  <td>8</td>
                  <td>{{Nombre del capitulo}}</td>
                </tr>
                <tr>
                  <td>
                    <input type="checkbox" name="cap1_9" value="1_9" />
                  </td>
                  <td>1</td>
                  <td>9</td>
                  <td>{{Nombre del capitulo}}</td>
                </tr>
                <tr>
                  <td>
                    <input type="checkbox" name="cap1_10" value="1_10" />
                  </td>
                  <td>1</td>
                  <td>10</td>
                  <td>{{Nombre del capitulo}}</td>
                </tr>
                <tr>
                  <td>
                    <input type="checkbox" name="cap2_1" value="2_1" />
                  </td>
                  <td>2</td>
                  <td>1</td>
                  <td>{{Nombre del capitulo}}</td>
                </tr>
                <tr>
                  <td>
                    <input type="checkbox" name="cap2_2" value="2_2" />
                  </td>
                  <td>2</td>
                  <td>2</td>
                  <td>{{Nombre del capitulo}}</td>
                </tr>
                <tr>
                  <td>
                    <input type="checkbox" name="cap2_3" value="2_3" />
                  </td>
                  <td>2</td>
                  <td>3</td>
                  <td>{{Nombre del capitulo}}</td>
                </tr>
                <tr>
                  <td>
                    <input type="checkbox" name="cap2_4" value="2_4" />
                  </td>
                  <td>2</td>
                  <td>4</td>
                  <td>{{Nombre del capitulo}}</td>
                </tr>
                <tr>
                  <td>
                    <input type="checkbox" name="cap2_5" value="2_5" />
                  </td>
                  <td>2</td>
                  <td>5</td>
                  <td>{{Nombre del capitulo}}</td>
                </tr>
                <tr>
                  <td>
                    <input type="checkbox" name="cap2_6" value="2_6" />
                  </td>
                  <td>2</td>
                  <td>6</td>
                  <td>{{Nombre del capitulo}}</td>
                </tr>
                <tr>
                  <td>
                    <input type="checkbox" name="cap2_7" value="2_7" />
                  </td>
                  <td>2</td>
                  <td>7</td>
                  <td>{{Nombre del capitulo}}</td>
                </tr>
                <tr>
                  <td>
                    <input type="checkbox" name="cap2_8" value="2_8" />
                  </td>
                  <td>2</td>
                  <td>8</td>
                  <td>{{Nombre del capitulo}}</td>
                </tr>
                <tr>
                  <td>
                    <input type="checkbox" name="cap2_9" value="2_9" />
                  </td>
                  <td>2</td>
                  <td>9</td>
                  <td>{{Nombre del capitulo}}</td>
                </tr>
                <tr>
                  <td>
                    <input type="checkbox" name="cap2_10" value="2_10" />
                  </td>
                  <td>2</td>
                  <td>10</td>
                  <td>{{Nombre del capitulo}}</td>
                </tr>
              </tbody>
            </table>
          </form>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-dark" data-dismiss="modal">
          Cerrar
        </button>
        <button type="button" class="btn btn-danger">Eliminar</button>
      </div>
    </div>
  </div>
</div>

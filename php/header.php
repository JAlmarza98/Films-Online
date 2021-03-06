<nav class="navbar navbar-expand-lg">
  <a class="navbar-brand" href="Catalogo.php" style="color: white"
    >Films Online</a
  >
  <button
    class="navbar-toggler"
    type="button"
    data-toggle="collapse"
    data-target="#navbarSupportedContent"
    aria-controls="navbarSupportedContent"
    aria-expanded="false"
    aria-label="Toggle navigation"
  >
    <i class="fas fa-bars fa-xl text-white"></i>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="Peliculas.php" style="color: white"
          >Peliculas
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="Series.php" style="color: white">Series</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="Lista.php" style="color: white">Mi lista</a>
      </li>
    </ul>
    <form
      class="form-inline my-2 my-lg-0"
      action="Buscar.php"
      method="post"
      id="form-id"
    >
      <input
        class="form-control mr-sm-2"
        type="search"
        placeholder="Search"
        aria-label="Search"
        name="search"
      />
      <div class="ajuste">
        <div
          class="menu"
          type="submit"
          style="float: left"
          onclick="document.getElementById('form-id').submit();"
        >
          <i class="fas fa-search fa-2x text-white"></i>
        </div>

        <div class="btn-group dropdown" style="float: right">
          <div
            class="menu"
            data-toggle="dropdown"
            aria-haspopup="true"
            aria-expanded="false"
          >
            <i class="fas fa-ellipsis-v fa-2x text-white"></i>
          </div>
          <div class="dropdown-menu" style="left: -100">
            <a class="dropdown-item" href="../php/EditarUsers.php"
              >Editar perfil</a
            >
            <a class="dropdown-item" href="Cerrar.php">Cerrar sesión</a>
            <?php
              $nivel=$_COOKIE["Nivel"];
              if($nivel === "0"){
                echo "<a class='dropdown-item' href='Home.php'>Admin</a>";
              }
            ?>
          </div>
        </div>
      </div>
    </form>
  </div>
</nav>

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
      <div class="row mb-5">
        <div class="col-10 offset-1 users mt-5 mb-5">
          <div class="table-top">
            <h4>Todas las suscripciones:</h4>
          </div>

          <div class="tabla-users">
            <table>
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Nombre</th>
                  <th>eMail</th>
                  <th>Metodo de Pago</th>
                  <th>Tipo de Subscripcion</th>
                  <th>Admin</th>
                </tr>
              </thead>
              <tbody>
                <?php
                    $fecha_actual=date("Y-m-d");
                    $array = array();
                    $visa=0;
                    $paypal=0;
                    $admin=0;
                    $conexion=mysqli_connect('localhost', 'root', '', 'films_online');
                    mysqli_set_charset($conexion, 'UTF8');

                    $consulta="select u.idUsuario,u.nombreUsuario,u.email,f.fechaExpiracion,f.fechaFacturacion,u.nivel,f.tipo,p.tipo 
                        from usuarios u,facturacion f, precios p where u.idUsuario=f.idUsuario and f.idPrecios=p.idPrecios order by f.fechaFacturacion desc";
                    $resultado=mysqli_query($conexion,$consulta);
                    
                    while($fila=mysqli_fetch_row($resultado)){
                      $idUsuario=$fila[0];
                      $nombreUsuario=$fila[1];
                      $email=$fila[2];
                      $fechaExpiracion=$fila[3];
                      $fechaFacturacion=$fila[4];
                      $nivel=$fila[5];
                      $tipo=$fila[6];
                      $tipoPrecio=$fila[7];

                      if($fecha_actual<=$fechaExpiracion){
                        echo "<tr class=''>";
                        echo "<td>".$idUsuario."</td>";
                        echo "<td>".$nombreUsuario."</td>";
                        echo "<td>".$email."</td>";
                        echo "<td>".$tipo."</td>";
                        echo "<td>".$tipoPrecio." días</td>";
                        if($nivel==0){
                          echo "<th><i class='fas fa-check'></i></th>";
                        }else{
                          echo "<th><i class='fas fa-times'></i></th>";
                        }
                        echo "</tr>";
                      }else{
                        echo "<tr class='caducado'>";
                        echo "<td>".$idUsuario."</td>";
                        echo "<td>".$nombreUsuario."</td>";
                        echo "<td>".$email."</td>";
                        echo "<td>".$tipo."</td>";
                        echo "<td>".$tipoPrecio." días</td>";
                        if($nivel==0){
                          echo "<th><i class='fas fa-check'></i></th>";
                        }else{
                          echo "<th><i class='fas fa-times'></i></th>";
                        }
                        echo "</tr>";
                      }

                      if($tipo=="Visa"){
                        $visa++;
                      }else if($tipo=="Paypal"){
                        $paypal++;
                      }else{
                        $admin++;
                      }
                    }

                    $consulta="select count(*) from usuarios";
                    $resultado=mysqli_query($conexion,$consulta);
                    while($fila=mysqli_fetch_row($resultado)){
                      $totalUsurios=$fila[0];
                    }

                    mysqli_close($conexion);
                ?>
              </tbody>
            </table>
          </div>
          <div class="total">Total de usuarios: <span><?php echo $totalUsurios ?></span></div>
        </div>
        <div class="col-4 offset-1 users usersChart mt-5">
          <h4>Métodos de pago</h4>
          <div class="graf">
            <canvas class="mt-5" id="usersChart"></canvas>
          </div>
        </div>
        <div class="col-4 offset-2 users mt-5">
          <h4>Modificar usuarios</h4>
          <div>
              <input class="form-control" type="number" placeholder="ID" id="numberID"/>
              <span>
                <?php 
                  if(isset($_GET['errorProceso'])){
                    echo "ID incorrecto.";
                  }else if(isset($_GET['errorDias'])){
                    echo "Días incorrectos.";
                  }
               ?>
               </span><br>
            <button
              type="button"
              class="btn btn-info ml-2"
              data-toggle="modal"
              data-target="#exampleModal"
            >
              Renovar Subscripcion
            </button>
            <button class="btn btn-danger" onclick="eliminar()">Eliminar Usuario</button>
            <button class="btn btn-warning mt-3 ml-2" onclick="promocionarDegradar()">
              Promocionar/Degradar administrador
            </button>
          </div>
        </div>
      </div>
    </div>

    <div
      class="modal fade"
      id="exampleModal"
      tabindex="-1"
      aria-labelledby="exampleModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog">
        <div class="modal-content" style="background-color: #212531">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">
              Selecciona el tipo de subscripcion
            </h5>
            <button
              type="button"
              class="close"
              data-dismiss="modal"
              aria-label="Close"
            >
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body text-center">
              <button class="btn btn-primary" onclick="renovar(30)">30 Días</button>
              <button class="btn btn-primary" onclick="renovar(90)">90 Días</button>
              <button class="btn btn-primary" onclick="renovar(360)">360 Días</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
  var ctx = document.getElementById("usersChart").getContext("2d");
  var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: "doughnut",

    // The data for our dataset
    data: {
      labels: ["Visa", "Administración", "Paypal"],
      datasets: [
        {
          label: "My First dataset",
          backgroundColor: ["green", "orange", "red"],
          data: [<?php echo $visa ?>, <?php echo $admin ?>, <?php echo $paypal ?>],
        },
      ],
    },
  });

  function renovar(dias) {
    var numberID = document.getElementById("numberID").value;
    window.location.href = "RenovarAdmin.php?id="+numberID+"&dias="+dias;
  }

  function eliminar() {
    var numberID = document.getElementById("numberID").value;
    window.location.href = "EliminarAdmin.php?id="+numberID;
  }

  function promocionarDegradar(){
    var numberID = document.getElementById("numberID").value;
    window.location.href = "PermisosAdmin.php?id="+numberID;
  }
</script>
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
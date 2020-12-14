<div class="container animate__animated animate__fadeIn">
  <div class="row mb-5">
    <div class="col-10 offset-1 users mt-5 mb-5">
      <div class="table-top">
        <h4>Todos los usuarios</h4>
        <form class="form-inline">
          <input
            class="form-control"
            type="search"
            placeholder="Search"
            aria-label="Search"
          />
        </form>
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
                $activa=0;
                $caducada=0;
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
                    echo "<tr class=\"\">";
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
                    echo "<tr class=\"finalizado\">";
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
      <h4>Estado de las subscripciones</h4>
      <div class="graf">
        <canvas class="mt-5" id="usersChart"></canvas>
      </div>
    </div>
    <div class="col-4 offset-2 users mt-5">
      <h4>Modificar usuarios</h4>
      <div>
        <form class="user" action="#">
          <input class="form-control" type="number" placeholder="ID" id="numberID" onblur="validarID()"/>
        </form>
        <button
          type="button"
          class="btn btn-info ml-2"
          data-toggle="modal"
          data-target="#exampleModal"
        >
          Renovar Subscripcion
        </button>
        <button class="btn btn-danger">Eliminar Usuario</button>
        <button class="btn btn-warning mt-3 ml-2">
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

<script>
  var ctx = document.getElementById("usersChart").getContext("2d");
  var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: "doughnut",

    // The data for our dataset
    data: {
      labels: ["Correcta", "Finaliza", "Caducada"],
      datasets: [
        {
          label: "My First dataset",
          backgroundColor: ["green", "orange", "red"],
          data: [75, 15, 10],
        },
      ],
    },
  });

  function renovar(dias) {
    var numberID = document.getElementById("numberID").value;
    window.location.href = "RenovarAdmin.php?id="+numberID+"&dias="+dias;
  }
  
  function validarID(){
    var numberID = document.getElementById("numberID").value;
    alert(numberID);
    var peticion=$.ajax({
        url:"ComprobarUsuarioID.php",
        type:"POST",
        async:true,
        data:{
          numberID,numberID
        },
        success:function(data){
            var ok=peticion.responseText;
            alert(ok);
            if(ok){
              document.getElementById('numberID').style.color="red";
            }else{
              document.getElementById('numberID').style.color="green";
            }
        }
    })
}
</script>

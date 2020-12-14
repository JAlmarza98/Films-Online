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
          <h4>Historico de usuarios</h4>
          <div class="graf">
            <canvas id="retencionChart"></canvas>
          </div>
        </div>
        <div class="col-10 offset-1 users mt-5 mb-5">
          <h4>Facturacion</h4>
          <div class="graf">
            <canvas id="facturacionChart"></canvas>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
  new Chart(document.getElementById("retencionChart"), {
    type: "bar",
    data: {
      labels: ["Septiembre", "Octubre", "Noviembre", "Diciembre"],
      datasets: [
        {
          label: "Renueva",
          backgroundColor: "green",
          data: [127, 234, 350, 345],
        },
        {
          label: "Nuevo",
          backgroundColor: "blue",
          data: [37, 51, 73, 84],
        },
        {
          label: "No Renueva",
          backgroundColor: "red",
          data: [-15, -25, -47, -60],
        },
      ],
    },
    options: {
      scales: {
        xAxes: [{ stacked: true }],
        yAxes: [{ stacked: true }],
      },
    },
  });
</script>

<script>
  new Chart(document.getElementById("facturacionChart"), {
    type: "line",
    data: {
      labels: ["Septiembre", "Octubre", "Noviembre", "Diciembre"],
      datasets: [
        {
          data: [333, 521, 1783, 2478],
          label: "Facturacion",
          borderColor: "#3e95cd",
          fill: "start",
        },
      ],
    },
  });
</script>
</body>
</html>
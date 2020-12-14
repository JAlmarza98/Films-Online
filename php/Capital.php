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

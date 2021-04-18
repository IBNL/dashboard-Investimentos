@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>
<div class="container">
  <div class="row">
    <div class="col-md-10 offset-md-1">
      <div class="card">
        <div class="card-header">
          <h1 class="text-center">Dashboard Fundos</h1>
        </div>
        <div class="card-body">
          <canvas id="chartFunds" width="800" height="400"></canvas>
        </div>
        <a href="/home" class="btn btn-primary">Voltar</a>
      </div>
    </div>
  </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
<script>
  var ctx = document.getElementById("chartFunds").getContext("2d");

  const dataSet = <?php echo $dataSet; ?>;
  const rangeData = <?php echo $rangeData; ?>;

  const myChart = new Chart(ctx, {
    type: 'line',
    data: {
      labels: rangeData,
      datasets: dataSet
    },
    options: {
      responsive: false,
      scales: {
        xAxes: [{
          stacked: true,
        }]
      },
      animation: {
        duration: 750,
      },
    }
  });
</script>
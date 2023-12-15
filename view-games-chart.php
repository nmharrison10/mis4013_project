 <h1>Games</h1>
<div>
  <canvas id="myChart"></canvas>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
  const ctx = document.getElementById('myChart');

  new Chart(ctx, {
    type: 'bar',
    data: {
    datasets: [{
        data: [<?php
while ($game = $games->fetch_assoc()) {
  echo $game['goals'].", ";
}
?>]
    }],

    // These labels appear in the legend and in the tooltips when hovering different arcs
    labels: [
     <?php
$games = SelectGames();
while ($game = $games->fetch_assoc()) {
  echo "'".$game['club_name']."', ";
}
?>
]
},
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });
</script>
 

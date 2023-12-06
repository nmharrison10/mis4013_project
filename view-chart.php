

<script src="https://www.gstatic.com/charts/loader.js"></script>

<?php
$pageTitle = "Chart";
include "view-header.php";
?>

<h1>How many goals has each team scored in FIFA World Cup History?</h1>
<body>
<div id="myChart" style="width:100%; max-width:600px; height:500px;">
</div>

<script>
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

function drawChart() {

// Set Data
const data = google.visualization.arrayToDataTable([
  ['Contry', 'Mhl'],
  ['Spain',108],
  ['Germany',232],
  ['England',104]
]);

// Set Options
const options = {
  title:'FIFA WC Goal Percentage'
};

// Draw
const chart = new google.visualization.PieChart(document.getElementById('myChart'));
chart.draw(data, options);

}
</script>

</body>

<?php
include "view-footer.php";
?>

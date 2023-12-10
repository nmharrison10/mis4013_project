
<script src="https://www.gstatic.com/charts/loader.js"></script>
<script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>

<?php
$pageTitle = "Chart";
include "view-header.php";
?>

<h1>FIFA World Cup Stats</h1>
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

<body>

<div id="myPlot" style="width:100%;max-width:700px"></div>

<script>
const xArray = ["Spain", "Germany", "England"];
const yArray = [1, 4, 1,];

const data = [{
  x:xArray,
  y:yArray,
  type:"bar",
  orientation:"v",
  marker: {color:"rgba(0,0,255,0.6)"}
}];

const layout = {title:"FIFA WC Titles"};

Plotly.newPlot("myPlot", data, layout);
</script>

</body>

<body>
<canvas id="barChart" style="width:100%;max-width:600px"></canvas>

<script>
const xValues = [1962,1966,1970,1974,1978,1982,1986,1990,1994,1998,2002,2006,2010,2014,2018,2022];

new Chart("barChart", {
  type: "line",
  data: {
    labels: xValues,
    datasets: [{ 
      data: [0,0,0,0,0,0,0,0,0,0,0,1,2,0,1,0],
      label: "Spain",
      borderColor: "red",
      fill: false
    }, { 
      data: [0,1,1,1,0,0,0,0,0,0,2,2,2,1,0,0],
      label: "Germany",
      borderColor: "black",
      fill: false
   }, { 
      data: [0,0,0,0,0,0,0,1,0,2,0,0,0,0,1,1],
      label: "England",
      borderColor: "blue",
      fill: false
    }]
  },
  options: {
    legend: {display: true},
    title: {
                display: true,
                text: 'FIFA WC Awards per Year'
            }
  }
});
</script>
</body>

<?php
include "view-footer.php";
?>

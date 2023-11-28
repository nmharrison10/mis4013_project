<h1>Stadiums</h1>

<link href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.9.3/leaflet.min.css" rel="stylesheet"/>              
<script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.9.3/leaflet.min.js"></script>

<div id="mapdiv" style="height:200px;width:200px;"></div>

<script>
  "use strict";
  {
var map = L.map( "mapdiv", { attributionControl: false, } ).setView( [ 35.21145940282846, -97.44345712066671], 12 );

L.tileLayer('http://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}',{
    maxZoom: 20,
    subdomains:['mt0','mt1','mt2','mt3']
}).addTo( map );;
  
  }
</script>
<div class="table-responsive">
  <table class="table">
    <head>
      <tr>
      <th>ID</th>
      <th>Name</th>
      <th>Longitude</th>
      <th>Latitude</th>
      </tr>
    </head>
    <body>
<?php
while ($stadium = $stadiums->fetch_assoc()) {
  if($stadium['stadium_id']==1){
  echo $stadium['stadium_id'];
}
?>
<tr>
  <td><?php echo $stadium['stadium_id']?></td>
  <td><?php echo $stadium['stadium_name']?></td>
  <td><?php echo $stadium['stadium_lat']?></td>
  <td><?php echo $stadium['stadium_long']?></td>
</tr>
<?php
}
?>
    </body>
  </table>
</div>
<?php
while ($stadium = $stadiums->fetch_assoc()) {
  if($stadium['stadium_id']==1){
  echo $stadium['stadium_id'];
}}
?>

<h1>Stadiums</h1>

<div id="mapdiv" style="height:400px;400px;"></div>

<script>
  "use strict";
  {
var map = L.map( 'mapdiv', { attributionControl: false, } ).setView( [ 35.33443889141701, -97.07270547900498 ], 12 );

var tile = L.tileLayer( 'https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: ''
} ).addTo( map );
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
?>

<h1>Stadiums</h1>
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
while ($stadiums = $stadiums->fetch_assoc()) {
?>
<tr>
  <td><?php echo $stadium['stadium_id']?></td>
  <td><?php echo $stadium['stadium_name']?></td>
  <td><?php echo $stadium['stadium_long']?></td>
  <td><?php echo $stadium['stadium_lat']?></td>
</tr>
<?php
}
?>
    </body>
  </table>
</div>
<?php
?>

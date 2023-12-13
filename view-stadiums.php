<div class="row">
  <div class="col">
<h1>Stadiums</h1>
  </div>
  <div class="col-auto">
<?php
include "view-stadiums-newform.php";
?>
  </div>
</div>
<div class="table-responsive">
  <table class="table">
    <head>
      <tr>
      <th>ID</th>
      <th>Name</th>
      <th>Longitude</th>
      <th>Latitude</th>
      <th>Location</th>
      <th></th>
      <th></th>
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
  <td><?php echo $stadium['location']?></td>
  <td>
    <div id="mapdiv<?php echo $stadium['stadium_id']?>" style="height:200px;width:200px;"></div>
  </td>
<script>
  "use strict";
  {
var map<?php echo $stadium['stadium_id']?> = L.map( "mapdiv<?php echo $stadium['stadium_id']?>", { attributionControl: false, zoomControl:false, 
  } ).setView( [ <?php echo $stadium['stadium_lat']?>, <?php echo $stadium['stadium_long']?>], 15 );

L.tileLayer('http://{s}.google.com/vt/lyrs=s&x={x}&y={y}&z={z}',{
    maxZoom: 20,
    subdomains:['mt0','mt1','mt2','mt3']
}).addTo( map<?php echo $stadium['stadium_id']?> );
    
  }
</script>
  <td>
<?php
include "view-stadiums-editform.php";
?>
  </td>
  <td>
    <form method="post" action="">
      <input type="hidden" name="sid" value="<?php echo $stadium['stadium_id'];?>">
      <input type="hidden" name="actionType" value="Delete">
      <button type="submit" class="btn btn-primary" onclick="return confirm('Are you sure?');">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
              <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z"/>
              <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z"/>
            </svg>
      </button>
    </form>
  </td>
</tr>
<?php
}
?>
    </body>
  </table>
</div>


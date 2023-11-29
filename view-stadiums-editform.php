<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editStadiumModal<?php echo $stadium['stadium_id'];?>">
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
      <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
      <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
    </svg>
</button>

<!-- Modal -->
<div class="modal fade" id="editStadiumModal<?php echo $stadium['stadium_id'];?>" tabindex="-1" aria-labelledby="editStadiumModalLabel<?php echo $stadium['stadium_id'];?>" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="editStadiumModalLabel<?php echo $stadium['stadium_id'];?>">Edit Stadium</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div style="display:flex;flex-direction:row">
                  <form method="post" action="">
                  <div class="mb-3">
                    <label for="sName<?php echo $stadium['stadium_id'];?>" class="form-label">Stadium Name</label>
                    <input type="text" class="form-control" id="sName<?php echo $stadium['stadium_id'];?>" name="sName" value="<?php echo $stadium['stadium_name'];?>">
                  </div>
                  <div class="mb-3">
                    <label for="sLat<?php echo $stadium['stadium_id'];?>" class="form-label">Stadium Latitude</label>
                    <input type="text" class="form-control" id="sLat<?php echo $stadium['stadium_id'];?>" name="sLat" value="<?php echo $stadium['stadium_lat'];?>">
                  </div>
                  <div class="mb-3">
                    <label for="sLong<?php echo $stadium['stadium_id'];?>" class="form-label">Stadium Longitude</label>
                    <input type="text" class="form-control" id="sLong<?php echo $stadium['stadium_id'];?>" name="sLong" value="<?php echo $stadium['stadium_long'];?>">
                  </div>
                      <input type="hidden" name="sid" value="<?php echo $stadium['stadium_id'];?>">
                  <input type="hidden" name="actionType" value="Edit">
                  <button type="submit" class="btn btn-primary">Save</button>
                  </form>
          
        <div id="mapdiv" style="margin:30">
            Testing
        </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
"use strict";
var map = L.map( 'mapdiv', { attributionControl: false, } ).setView( [ 35.33443889141701, -97.07270547900498 ], 12 );

L.tileLayer( 'https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: ''
} ).addTo( map );

map.on("click",function(e){
    t=e;
    document.querySelector( "#lat" ).value =e.latlng.lat;
    document.querySelector( "#lon" ).value =e.latlng.lng;

    if(marker!=null)
    {
        map.removeLayer(marker);
        marker=null;
    }
    marker = L.marker( [ e.latlng.lat, e.latlng.lng ] );
    marker.addTo(map);

});

</script>
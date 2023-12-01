<!-- Bootstrap assets -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<!-- Leaflet assets -->
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.1/dist/leaflet.css" integrity="sha512-Rksm5RenBEKSKFjgI3a41vrjkw4EVPlJ3+OiI65vTjIdo9brlAacEuKOiQ5OFh7cOI1bkDwLqdLw3Zg0cRJAAQ==" crossorigin="" />
<script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet-src.js" integrity="sha512-IkGU/uDhB9u9F8k+2OsA6XXoowIhOuQL1NTgNZHY1nkURnqEGlDZq3GsfmdJdKFe1k1zOc6YU2K7qY+hF9AodA==" crossorigin=""></script>

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editStadiumModal<?php echo $stadium['stadium_id'];?>">
   <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
      <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
      <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
    </svg>
</button>

<!-- Modal -->
<div class="modal fade" id="editStadiumModal<?php echo $stadium['stadium_id'];?>" tabindex="-1" role="dialog" aria-labelledby="editStadiumModal<?php echo $stadium['stadium_id'];?>">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="editStadiumModalLabel<?php echo $stadium['stadium_id'];?>">Edit Stadium</h1>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <div class="container-fluid">
            <div class="row">
                <div class="col-6 col-sm" style="background-color:pink;">
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
                </div>
                <div class="col-6 col-sm" style="display:flex; flex-direction:row; align-items:center;justify-content:center">
                    <div id="map" style="height:180px">
                    </div>
                </div>
            </div>
        </div>

      </div>
    </div>
  </div>
</div>

<script>
  var map = L.map('map', { attributionControl: false, zoomControl:false, } ).setView( 
     [ document.getElementById('sLat<?php echo $stadium['stadium_id'];?>').value, document.getElementById('sLong<?php echo $stadium['stadium_id'];?>').value], 15 );

marker = L.marker([ document.getElementById('sLat<?php echo $stadium['stadium_id'];?>').value, document.getElementById('sLong<?php echo $stadium['stadium_id']);
marker.bindPopup( `<?php echo $stadium['stadium_name'];?>` );
marker.addTo(map);
marker.openPopup();

let tile = L.tileLayer('http://{s}.google.com/vt/lyrs=s&x={x}&y={y}&z={z}',{
    maxZoom: 20,
    subdomains:['mt0','mt1','mt2','mt3']
}).addTo(map);

$('#editStadiumModal<?php echo $stadium['stadium_id'];?>').on('shown.bs.modal', function() {
  map.invalidateSize();
});
</script>


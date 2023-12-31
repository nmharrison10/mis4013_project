<?php
require_once("util-db.php");
require_once("model-countries.php");

$pageTitle = "Countries";
include "view-header.php";
?>

  <div id="carouselExampleCaptions" class="carousel slide">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="spain2.png" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Spain</h5>
        <p>Home to 6 leagues.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="england2.jpeg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>England</h5>
        <p>Home to 57 leagues.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="germany.png" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Germany</h5>
        <p>Home to 31 leagues.</p>
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

<?php
if (isset($_POST['actionType'])){
switch($_POST['actionType']){
  case "Add":
    if(insertCountry($_POST['cName'], $_POST['capName'])) {
  echo '<div style="margin:15px" style="margin:15px" class="alert alert-success" role="alert">Country Added</div>';
    }
    else{
echo '<div style="margin:15px" class="alert alert-danger" role="alert">Error</div>"';
    }
  break;
  case "Delete":
    if(deleteCountry($_POST['cid'])) {
  echo '<div style="margin:15px" class="alert alert-success" role="alert">Country Deleted</div>';
    }
    else{
echo '<div style="margin:15px" class="alert alert-danger" role="alert">Error</div>"';
    }
  break;
  case "Edit":
    if(updateCountry($_POST['cName'], $_POST['capName'], $_POST['cid'])) {
  echo '<div style="margin:15px" class="alert alert-success" role="alert">Country Edited</div>';
    }
    else{
echo '<div style="margin:15px" class="alert alert-danger" role="alert">Error</div>"';
    }
  break;
}
}

$countries = selectCountries();
include "view-countries.php";
include "view-footer.php";
?>



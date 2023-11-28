<?php
require_once("util-db.php");
require_once("model-stadiums.php");

$pageTitle = "Stadiums";
include "view-header.php";

if (isset($_POST['actionType'])){
switch($_POST['actionType']){
  case "Delete":
    if(deleteStadium($_POST['sid'])) {
  echo '<div style="margin:15px" class="alert alert-success" role="alert">Stadium Deleted</div>';
    }
    else{
echo '<div class="alert alert-danger" role="alert">Error</div>"';
    }
  break;
  case "Edit":
    if(updateStadium($_POST['sid'],$_POST['sName'], $_POST['sLat'], $_POST['sLong'])) {
  echo '<div style="margin:15px" class="alert alert-success" role="alert">Stadium Edited</div>';
    }
    else{
echo '<div class="alert alert-danger" role="alert">Error</div>"';
    }
  break;
}
}

$stadiums = selectStadiums();
include "view-stadiums.php";
include "view-footer.php";
?>

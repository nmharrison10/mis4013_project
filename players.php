 <?php
require_once ("util-db.php");
require_once ("model-players.php");

$pageTitle = "Soccer Players";
include "view-header.php";

if (isset($_POST['actionType'])){
 switch ($_POST['actionType']){
  case 'Add':
   if (insertPlayers($_POST['player_name'],$_POST['player_age'])){
    echo '<div class="alert alert-success" role="alert"> Player Added!</div>';
   } else {
    echo '<div class="alert alert-danger" role="alert">Error</div>';
   }
   break;
  case 'Edit':
   if (updatePlayers($_POST['player_name'],$_POST['player_age'],$_POST['player_id'])){
    echo '<div class="alert alert-success" role="alert"> Player Updated!</div>';
   } else {
    echo '<div class="alert alert-danger" role="alert">Error</div>';
   }
   break;
  case 'Delete':
   if (deletePlayers($_POST['player_id'])){
    echo '<div class="alert alert-success" role="alert"> Player Deleted!</div>';
   } else {
    echo '<div class="alert alert-danger" role="alert">Error</div>';
   }
   break;
 }
}

$players = selectPlayers();
include "view-players.php";

include "view-footer.php";
?>

 <?php
require_once ("util-db.php");
require_once ("model-players.php");

$pageTitle = "Soccer Players";
include "view-header.php";

if (isset($_POST['actionType'])){
 switch ($_POST['actionType']){
  case 'Edit':
   if (updatePlayers($_POST['pName'],$_POST['pAge'],$_POST['pid'])){
    echo '<div class="alert alert-success" role="alert"> Player Updated!</div>';
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

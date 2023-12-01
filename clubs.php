 <?php
require_once ("util-db.php");
require_once ("model-clubs.php");

$pageTitle = "Clubs";
include "view-header.php";

if (isset($_POST['actionType'])){
 switch ($_POST['actionType']){
  case 'Add':
   if (insertClubs($_POST['cName'],$_POST['cCoach'],$_POST['cLocation'])){
    echo '<div class="alert alert-success" role="alert"> New Club Added!</div>';
   } else {
    echo '<div class="alert alert-danger" role="alert">Error</div>';
   }
   break;
  case 'Edit':
   if (updateClubs($_POST['cName'],$_POST['cCoach'],$_POST['cLocation'],$_POST['cid'])){
    echo '<div class="alert alert-success" role="alert"> Club Updated!</div>';
   } else {
    echo '<div class="alert alert-danger" role="alert">Error</div>';
   }
   break;
  case 'Delete':
   if (deleteClubs($_POST['cid'])){
    echo '<div class="alert alert-success" role="alert"> Club Deleted!</div>';
   } else {
    echo '<div class="alert alert-danger" role="alert">Error</div>';
   }
   break;
 }
}

$clubs = selectClubs();
include "view-clubs.php";

include "view-footer.php";
?>

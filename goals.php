<?php
require_once("util-db.php");
require_once("model-goals.php");

$pageTitle = "Goals";
include "view-header.php";

if (isset($_POST['actionType'])){
switch($_POST['actionType']){
  case "Add":
    if(insertGoal($_POST['gScorer'], $_POST['gAssister'], $_POST['gGame'])) {
  echo '<div style="margin:15px" class="alert alert-success" role="alert">Added Goal</div>';
    }
    else{
echo '<div class="alert alert-danger" role="alert">Error</div>"';
    }
  break;
  case "Delete":
    if(deleteGoal($_POST['gid'])) {
  echo '<div style="margin:15px" class="alert alert-success" role="alert">Deleted Goal</div>';
    }
    else{
echo '<div class="alert alert-danger" role="alert">Error</div>"';
    }
  break;
  case "Edit":
    if(updateGoal($_POST['gScorer'], $_POST['gAssister'], $_POST['gGame'], $_POST['gid'])) {
  echo '<div style="margin:15px" class="alert alert-success" role="alert">Edited Goal</div>';
    }
    else{
echo '<div class="alert alert-danger" role="alert">Error</div>"';
    }
  break;
}
}

$goals = selectGoals();
include "view-goals.php";
include "view-footer.php";
?>


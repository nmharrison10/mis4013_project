<?php
require_once("util-db.php");
require_once("model-games.php");

$pageTitle = "Games";
include "view-header.php";

if (isset($_POST['actionType'])){
switch($_POST['actionType']){
  case "Add":
    if(insertGame($_POST['t1id'], $_POST['t1s'],$_POST['t2id'],$_POST['t2s'],$_POST['sid'],$_POST['date'])) {
  echo '<div style="margin:15px" class="alert alert-success" role="alert">Game Added</div>';
    }
    else{
echo '<div class="alert alert-danger" role="alert">Error</div>"';
    }
  break;
  case "Delete":
    if(deleteGame($_POST['gid'])) {
  echo '<div style="margin:15px" class="alert alert-success" role="alert">Game Deleted</div>';
    }
    else{
echo '<div class="alert alert-danger" role="alert">Error</div>"';
    }
  break;
  case "Edit":
    if(updateGame($_POST['t1id'], $_POST['t1s'],$_POST['t2id'],$_POST['t2s'],$_POST['sid'],$_POST['date'],$_POST['gid'] )) {
  echo '<div style="margin:15px" class="alert alert-success" role="alert">Game Edited</div>';
    }
    else{
echo '<div class="alert alert-danger" role="alert">Error</div>"';
    }
  break;
}
}


$games = selectGames();
include "view-games.php";
include"games-chart.php";
include "view-footer.php";
?>

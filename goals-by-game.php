<?php
require_once("util-db.php");
require_once("model-goals-by-game.php");

$pageTitle = "Goals by Game";
include "view-header.php";


$goals = selectGoalsByGame($_POST['gameid']);
include "view-goals-by-game.php";
include "view-footer.php";
?>

<?php
require_once("util-db.php");
$pageTitle = "Games";
include "view-header.php";
require_once("model-games-chart.php");


$games = selectGames();
include "view-games-chart.php";
include "view-footer.php";
?>

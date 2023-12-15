<?php
require_once("util-db.php");
require_once("model-games-chart.php");

$pageTitle = "Games";
include "view-header.php";



$games = selectGames();
include "view-games-chart.php";
include "view-footer.php";
?>

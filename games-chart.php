<?php
require_once("util-db.php");
require_once("model-games-chart.php");


$games = selectGames();
include "view-games-chart.php";
?>

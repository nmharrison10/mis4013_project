<?php
require_once("util-db.php");
require_once("model-games-chart.php");
<script src="path/to/chartjs/dist/chart.umd.js"></script>
$pageTitle = "Goals per Club";
include "view-header.php";



$games = selectGames();
include "view-games-chart.php";
include "view-footer.php";
?>

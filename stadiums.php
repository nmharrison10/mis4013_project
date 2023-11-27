<?php
require_once("util-db.php");
require_once("model-stadiums.php");

$pageTitle = "Stadiums";
include "view-header.php";
$countries = selectStadiums();
include "view-stadiums.php";
include "view-footer.php";
?>

 <?php
require_once ("util-db.php");
require_once ("model-player-by-club.php");

$pageTitle = "Club Roster";
include "view-header.php";

$players = selectPlayersbyClub($_POST['clid']);
include "view-player-by-club.php";

include "view-footer.php";
?>

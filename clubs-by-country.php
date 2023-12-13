 <?php
require_once ("util-db.php");
require_once ("model-clubs-by-country.php");

$pageTitle = "Clubs By Country";
include "view-header.php";

$countries = selectClubsbyCountry($_POST['cid']);
include "view-club-by-country.php";

include "view-footer.php";
?>

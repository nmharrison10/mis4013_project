<?php
function selectClubsbyCountry($cid) {
    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("SELECT cl.club_id,club_name,coach,location,country_name FROM `club` cl JOIN country c ON cl.club_id = c.country_id WHERE c.country_id = ?");
        $stmt->bind_param("i",$cid); 
        $stmt->execute();
        $result = $stmt->get_result();
        $conn->close();
        return $result;
    } catch (Exception $e) {
        $conn->close();
        throw $e;
    }
}
?>

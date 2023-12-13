<?php
function selectPlayersbyClub($clid) {
    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("SELECT player_id,player_name,player_number,player_age,club_id, club_name FROM `player` p JOIN club c ON p.club_id = c.club_id WHERE p.club_id = ?");
        $stmt->bind_param("i",$clid); 
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

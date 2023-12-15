<?php
function selectPlayersbyClub($clid) {
    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("SELECT p.player_id, p.player_name, p.player_number, p.player_age, p.club_id, c.club_name FROM `player` p JOIN club c ON p.club_id = c.club_id WHERE p.club_id = ?");
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

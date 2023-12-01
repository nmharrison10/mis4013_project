<?php
function selectPlayers() {
    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("SELECT player_id,player_name,player_age FROM `player`");
        $stmt->execute();
        $result = $stmt->get_result();
        $conn->close();
        return $result;
    } catch (Exception $e) {
        $conn->close();
        throw $e;
    }
}
function updatePlayers($pName,$pAge,$pid) {
    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("update `player` set `player_name`=?, `player_age`= ? where player_id=?");
        $stmt->bind_param("sssi", $pName,$pAge,$pid);
        $success = $stmt->execute();
        $result = $stmt->get_result();
        $conn->close();
        return $success;
    } catch (Exception $e) {
        $conn->close();
        throw $e;
    }
}
?>

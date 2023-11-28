<?php
function selectStadiums() {
    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("SELECT stadium_id, stadium_name, stadium_long, stadium_lat FROM `stadium`");
        $stmt->execute();
        $result = $stmt->get_result();
        $conn->close();
        return $result;
    } catch (Exception $e) {
        $conn->close();
        throw $e;
    }
}

function insertStadium($sName, $sLong, $sLat) {
    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("INSERT INTO `stadium` ( `stadium_name`, `stadium_long`, `stadium_lat`) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $sName, $sLong, $sLat);
        $success=$stmt->execute();
        $conn->close();
        return $success;
    } catch (Exception $e) {
        $conn->close();
        throw $e;
    }
}

function updateStadium($sid, $sName, $sLat, $sLong) {
    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("UPDATE `stadium` set `stadium_name` = ?, `stadium_long` = ?, `stadium_lat` = ? where stadium_id = ?");
        $stmt->bind_param("sssi", $sName, $sLong, $sLat, $sid);
        $success=$stmt->execute();
        $conn->close();
        return $success;
    } catch (Exception $e) {
        $conn->close();
        throw $e;
    }
}

function deleteStadium($sid) {
    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("delete from `stadium` where stadium_id = ?");
        $stmt->bind_param("i", $sid);
        $success=$stmt->execute();
        $conn->close();
        return $success;
    } catch (Exception $e) {
        $conn->close();
        throw $e;
    }
}

?>

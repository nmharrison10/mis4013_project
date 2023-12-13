<?php
function selectClubs() {
    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("SELECT club_id,club_name,coach,location FROM `club`");
        $stmt->execute();
        $result = $stmt->get_result();
        $conn->close();
        return $result;
    } catch (Exception $e) {
        $conn->close();
        throw $e;
    }
}

function selectClubsForInput() {
    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("SELECT club_id, club_name FROM club order by club_name");
        $stmt->execute();
        $result = $stmt->get_result();
        $conn->close();
        return $result;
    } catch (Exception $e) {
        $conn->close();
        throw $e;
    }
}

function insertClubs($clName,$clCoach,$clLocation) {
    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("INSERT INTO `club` (`club_name`, `coach`, `location`) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $clName,$clCoach,$clLocation);
        $success = $stmt->execute();
        $result = $stmt->get_result();
        $conn->close();
        return $success;
    } catch (Exception $e) {
        $conn->close();
        throw $e;
    }
}
function updateClubs($clName,$clCoach,$clLocation,$clid) {
    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("update `club` set `club_name`= ?, `coach`= ?,`location`= ? where club_id=?");
        $stmt->bind_param("sssi",$clName,$clCoach,$clLocation,$clid);
        $success = $stmt->execute();
        $result = $stmt->get_result();
        $conn->close();
        return $success;
    } catch (Exception $e) {
        $conn->close();
        throw $e;
    }
}
function deleteClubs($clid) {
    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("delete from club where club_id = ?");
        $stmt->bind_param("i", $clid);
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

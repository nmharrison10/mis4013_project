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
function insertClubs($cName,$cCoach,$cLocation) {
    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("INSERT INTO `club` (`club_name`, `coach`, `location`) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $cName,$cCoach,$cLocation);
        $success = $stmt->execute();
        $result = $stmt->get_result();
        $conn->close();
        return $success;
    } catch (Exception $e) {
        $conn->close();
        throw $e;
    }
}
function updateClubs($cName,$cCoach,$cLocation,$cid) {
    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("update `club` set `club_name`= ?, `coach`= ?,`location`= ? where club_id=?");
        $stmt->bind_param("sssi",$cName,$cCoach,$cLocation,$cid);
        $success = $stmt->execute();
        $result = $stmt->get_result();
        $conn->close();
        return $success;
    } catch (Exception $e) {
        $conn->close();
        throw $e;
    }
}
function deleteClubs($cid) {
    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("delete from club where club_id = ?");
        $stmt->bind_param("i", $cid);
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

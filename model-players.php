<?php
function selectPlayers() {
    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("SELECT p.player_id, p.player_name, p.player_number, p.player_age, p.club_id, c.club_name, country.country_name FROM `player` p JOIN club c ON p.club_id = c.club_id
        JOIN country ON p.country_id=country.country_id");
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
$stmt = $conn->prepare("SELECT club_id, club_name, coach, location FROM club order by club_name");
$stmt->execute();
$result = $stmt->get_result();
$conn->close();
 return $result;
 } catch (Exception $e) {
$conn->close();
throw $e;
 }
}

function insertPlayers($pName,$pNumber,$pAge, $cid, $countryid) {
    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("INSERT INTO `player` (`player_name`, `player_number`, `player_age`, `club_id`, `country_id`) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("siiii",$pName,$pNumber,$pAge, $cid, $countryid);
        $success = $stmt->execute();
        $result = $stmt->get_result();
        $conn->close();
        return $success;
    } catch (Exception $e) {
        $conn->close();
        throw $e;
    }
}
function updatePlayers($pName,$pNumber,$pAge, $cid, $countryid, $pid) {
    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("update `player` set `player_name`=?, `player_number`= ?, `player_age`= ?, `club_id`= ?, `country_id`= ? where player_id=?");
        $stmt->bind_param("siiiii", $pName,$pNumber,$pAge,$cid,$countryid,$pid);
        $success = $stmt->execute();
        $result = $stmt->get_result();
        $conn->close();
        return $success;
    } catch (Exception $e) {
        $conn->close();
        throw $e;
    }
}
function deletePlayers($pid) {
    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("delete from player where player_id = ?");
        $stmt->bind_param("i", $pid);
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

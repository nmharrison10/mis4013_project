<?php
function selectGames() {
    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("SELECT game_id, team1_id, team1_score, team2_id, team2_score, stadium_id, date FROM `game`");
        $stmt->execute();
        $result = $stmt->get_result();
        $conn->close();
        return $result;
    } catch (Exception $e) {
        $conn->close();
        throw $e;
    }
}

function selectGamesForInput() {
    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("SELECT country_id, country_name FROM country order by country_name");
        $stmt->execute();
        $result = $stmt->get_result();
        $conn->close();
        return $result;
    } catch (Exception $e) {
        $conn->close();
        throw $e;
    }
}

function insertGame($t1id, $t1s, $t2id, $t2s, $sid, $date) {
    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("INSERT INTO `game` (`team1_id`, `team1_score`, `team2_id`, `team2_score`, `stadium_id`, `date`) VALUES (?, ?, ?, ?, ?, ?);");
        $stmt->bind_param("iiiiis", $t1id, $t1s, $t2id, $t2s, $sid, $date);
        $success=$stmt->execute();
        $conn->close();
        return $success;
    } catch (Exception $e) {
        $conn->close();
        throw $e;
    }
}

function updateGame($t1id, $t1s, $t2id, $t2s, $sid, $date, $gid) {
    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("UPDATE `game` SET `game_id` = ?, `team1_id` = ?, `team1_score` = ?, `team2_id` = ?, `team2_score` = ?, `stadium_id` = ?, `date` = ? WHERE `game`.`game_id` = ?");
        $stmt->bind_param("iiiiisi", $t1id, $t1s, $t2id, $t2s, $sid, $date, $gid);
        $success=$stmt->execute();
        $conn->close();
        return $success;
    } catch (Exception $e) {
        $conn->close();
        throw $e;
    }
}

function deleteGame($gid) {
    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("delete from `game` where game_id = ?");
        $stmt->bind_param("i", $gid);
        $success=$stmt->execute();
        $conn->close();
        return $success;
    } catch (Exception $e) {
        $conn->close();
        throw $e;
    }
}

?>

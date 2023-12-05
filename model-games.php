<?php
function selectGames() {
    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("SELECT game_id, team1_id, club1.club_name, team1_score, team2_id, club2.club_name, team2_score, stadium_id, date FROM `game` join `club` club1 on game.team1_id=club1.club_id join `club` club2 on game.team2_id=club2.club_id;");
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
        $stmt = $conn->prepare("UPDATE `game` SET `team1_id` = ?, `team1_score` = ?, `team2_id` = ?, `team2_score` = ?, `stadium_id` = ?, `date` = ? WHERE `game`.`game_id` = ?");
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

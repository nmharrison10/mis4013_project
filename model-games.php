<?php
function selectGames() {
    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("SELECT game_id, team1_id, club1.club_name as team1_name, team1_score, team2_id, club2.club_name as team2_name, team2_score, s.stadium_id, s.stadium_name, date FROM `game` join `club` club1 on game.team1_id=club1.club_id join `club` club2 on game.team2_id=club2.club_id
        JOIN `stadium` s ON game.stadium_id=s.stadium_id ORDER BY `game_id`;");
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
        $stmt = $conn->prepare("SELECT `club_id`, `club_name` from `club` order by `club_name`");
        $stmt->execute();
        $result = $stmt->get_result();
        $conn->close();
        return $result;
    } catch (Exception $e) {
        $conn->close();
        throw $e;
    }
}

function selectStadiumsForInput() {
    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("SELECT `stadium_id`, `stadium_name` FROM `stadium` ORDER BY `stadium_name`;");
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

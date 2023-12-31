<?php
function selectGoals() {
    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("select `goal_id`,`scorer_id`,`scorer`.`player_name` as scorer, `assister_id`, `assister`.`player_name` as assister, `game_id` from `goal` 
        join `player` scorer on goal.scorer_id=scorer.player_id left join `player` assister on goal.assister_id=assister.player_id");
        $stmt->execute();
        $result = $stmt->get_result();
        $conn->close();
        return $result;
    } catch (Exception $e) {
        $conn->close();
        throw $e;
    }
}

function selectPlayersForInput() {
    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("SELECT player_id, player_name, club.club_id, club_name from `player` join `club` on player.club_id=club.club_id ORDER BY `club_name`, `player_name`;");
        $stmt->execute();
        $result = $stmt->get_result();
        $conn->close();
        return $result;
    } catch (Exception $e) {
        $conn->close();
        throw $e;
    }
}

function insertGoal($gScorer, $gAssister, $gGame) {
    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("INSERT INTO `goal` (`scorer_id`, `assister_id`, `game_id`) VALUES (?,?,?)");
        $stmt->bind_param("iii", $gScorer, $gAssister, $gGame);
        $success=$stmt->execute();
        $conn->close();
        return $success;
    } catch (Exception $e) {
        $conn->close();
        throw $e;
    }
}

function updateGoal($gScorer, $gAssister, $gGame, $gid) {
    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("UPDATE `goal` set `scorer_id` = ?, `assister_id` = ?, `game_id` = ? where goal_id = ?");
        $stmt->bind_param("iiii", $gScorer, $gAssister, $gGame, $gid);
        $success=$stmt->execute();
        $conn->close();
        return $success;
    } catch (Exception $e) {
        $conn->close();
        throw $e;
    }
}

function deleteGoal($gid) {
    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("delete from `goal` where goal_id = ?");
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

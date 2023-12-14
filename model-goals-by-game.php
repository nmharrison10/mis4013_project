<?php
function selectGoalsByGame($gameid) {
    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("select `goal_id`,`scorer_id`,`scorer`.`player_name` as scorer, `assister_id`, `assister`.`player_name` as assister, `game_id` from `goal` 
        join `player` scorer on goal.scorer_id=scorer.player_id left join `player` assister on goal.assister_id=assister.player_id where `game_id` = ?");
        $stmt->bind_param("i", $gameid);
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

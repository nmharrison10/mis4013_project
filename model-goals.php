<?php
function selectGoals() {
    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("SELECT goal_id, scorer_id, assister_id, game_id FROM `goal`");
        $stmt->execute();
        $result = $stmt->get_result();
        $conn->close();
        return $result;
    } catch (Exception $e) {
        $conn->close();
        throw $e;
    }
}

//function selectGoalsForInput() {
//    try {
//        $conn = get_db_connection();
//        $stmt = $conn->prepare("SELECT country_id, country_name FROM country order by country_name");
//        $stmt->execute();
  //      $result = $stmt->get_result();
    //    $conn->close();
      //  return $result;
   // } catch (Exception $e) {
     //   $conn->close();
       // throw $e;
    //}
//}

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
        $stmt = $conn->prepare("UPDATE `goal` set `scorer_id` = ?, `assister_id` = ?, `game_id` = ? where game_id = ?");
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

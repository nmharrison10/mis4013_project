<?php
function selectPlayers() {
    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("SELECT p.player_id, p.player_name, p.player_number, p.player_age, p.club_id, c.club_name FROM `player` p JOIN club c ON p.club_id = c.club_id WHERE p.club_id = ?");
        $stmt->execute();
        $result = $stmt->get_result();
        $conn->close();
        return $result;
    } catch (Exception $e) {
        $conn->close();
        throw $e;
    }
}

//function selectPlayersForInput() {
   // try {
     //   $conn = get_db_connection();
       // $stmt = $conn->prepare("SELECT club_id, club_name, coach, location FROM club order by club_name");
        //$stmt->execute();
 //       $result = $stmt->get_result();
  //      $conn->close();
 //       return $result;
//    } catch (Exception $e) {
//        $conn->close();
  //      throw $e;
 //   }
//}

function insertPlayers($pName,$pNumber,$pAge) {
    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("INSERT INTO `player` (`player_name`, `player_number`, `player_age`) VALUES (?, ?, ?)");
        $stmt->bind_param("sss",$pName,$pNumber,$pAge);
        $success = $stmt->execute();
        $result = $stmt->get_result();
        $conn->close();
        return $success;
    } catch (Exception $e) {
        $conn->close();
        throw $e;
    }
}
function updatePlayers($pName,$pNumber,$pAge,$pid) {
    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("update `player` set `player_name`=?, `player_number`= ?, `player_age`= ? where player_id=?");
        $stmt->bind_param("sssi", $pName,$pNumber,$pAge,$pid);
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

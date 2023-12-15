<?php
function selectGames() {
    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("SELECT club2.club_name, SUM(score1) as goals
                                FROM ((SELECT club.club_id as club_id, COALESCE(SUM(CASE WHEN club.club_id=game.team1_id THEN game.team1_score END),0) score1
                                FROM `game` right join `club` on game.team1_id=club.club_id
                                GROUP BY club.club_id)
                                UNION
                                (SELECT club.club_id, COALESCE(SUM(CASE WHEN club.club_id=game.team2_id THEN game.team2_score END),0) score1
                                FROM `game` right join `club` on game.team2_id=club.club_id
                                GROUP BY club.club_id)) table1
                                right join club club2 on table1.club_id=club2.club_id
                                GROUP BY club2.club_name");
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

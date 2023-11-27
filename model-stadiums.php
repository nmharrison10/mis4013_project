<?php
function selectStadiums() {
    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("SELECT stadium_id, stadium_name, stadium_long, stadium_lat FROM `stadium`");
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

<?php
function selectCountries() {
    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("SELECT country_id, country_name, capital FROM `country`");
        $stmt->execute();
        $result = $stmt->get_result();
        $conn->close();
        return $result;
    } catch (Exception $e) {
        $conn->close();
        throw $e;
    }
}

function selectCountriesForInput() {
    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("SELECT country_id, country_name FROM 'country' order by country_name");
        $stmt->execute();
        $result = $stmt->get_result();
        $conn->close();
        return $result;
    } catch (Exception $e) {
        $conn->close();
        throw $e;
    }
}

function insertCountry($cName, $capName) {
    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("INSERT INTO `country` (`country_name`, `capital`) VALUES (?, ?)");
        $stmt->bind_param("ss", $cName, $capName);
        $success=$stmt->execute();
        $conn->close();
        return $success;
    } catch (Exception $e) {
        $conn->close();
        throw $e;
    }
}

function updateCountry($cName, $capName, $cid) {
    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("UPDATE `country` set `country_name` = ?, `capital` = ? where country_id = ?");
        $stmt->bind_param("ssi", $cName, $capName, $cid);
        $success=$stmt->execute();
        $conn->close();
        return $success;
    } catch (Exception $e) {
        $conn->close();
        throw $e;
    }
}

function deleteCountry($cid) {
    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("delete from `country` where country_id = ?");
        $stmt->bind_param("i", $cid);
        $success=$stmt->execute();
        $conn->close();
        return $success;
    } catch (Exception $e) {
        $conn->close();
        throw $e;
    }
}

?>

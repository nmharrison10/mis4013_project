<?php
function get_db_connection(){
    // Create connection
    $conn = new mysqli('159.89.47.44','nharriso_projectuser', 'hnC?b7-m2h%8', 'nharriso_project');
    
    // Check connection
    if ($conn->connect_error) {
      return false;
    }
    return $conn;
}
?>

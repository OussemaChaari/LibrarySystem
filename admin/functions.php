<?php 
require("../connect.php");

function get_row_count($table){
    global $connection;
    $count = 0;
    $query = "SELECT COUNT(*) as row_count FROM $table";
    $result = mysqli_query($connection, $query);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $count = $row['row_count'];
    }

    return $count;
}
function get_all_rows($table){
    global $connection;
    $rows = array();
    $query = "SELECT * FROM $table";
    $result = mysqli_query($connection, $query);

    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }
    }

    return $rows;
}


?>
<?php
include "dbConnection.inc";

$db = Database::getInstance();
$dbconn = $db->getConnection();
$query = "SELECT * FROM [person] WHERE id_person = 1;";
$msquery = sqlsrv_query($dbconn,$query);

while( $row = sqlsrv_fetch_array( $msquery, SQLSRV_FETCH_ASSOC) ) {
    echo $row['name'].", ".$row['password']."<br />";
}


?>
<?php

require 'assets/db_connection.php';

function getDrivers($db) {
    $sql = "SELECT * FROM mb_drivers";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    
    return $stmt;
}

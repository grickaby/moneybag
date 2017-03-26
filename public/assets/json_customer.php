<?php

header('Content-Type: application/json');
require 'class_dbconnection.php';
$sql = 'SELECT id,c_name,c_number,price_gas,price_distillate FROM mb_clients';

foreach ($Conn->query($sql) as $row) {
    $result = array('id' => $row['id'], 'name' => $row['c_name'], 'number' => $row['c_number'], 'gas' => $row['price_gas'], 'diesel' => $row['price_distillate']);
    print_r(json_encode($result));
}

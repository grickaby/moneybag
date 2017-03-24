<?php

header ("content-type: text/xml");
require 'class_dbconnection.php';

$sql = 'SELECT id,c_name,c_number,price_gas,price_distillate FROM mb_clients';

$xml='<?xml version="1.0" encoding="UTF-8"?>';
$xml.='<customerlist>';
foreach ($Conn->query($sql) as $row) {
    
    $xml.='<customer><id>'.$row['id'].'</id><name>'.$row['c_name'].'</name><number>'.$row['c_number'].'</number><gas_price>'.$row['price_gas'].'</gas_price><diesel_price>'.$row['price_distillate'].'</diesel_price></customer>';
}

$xml.='</customerlist>';

echo $xml; 
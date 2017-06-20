<?php

/*
 * This class handles all client functions (add, remove, modify)
 */

require 'class_dbconnection.php';

Class Customer {

    public function addCustomer($info) {
        $columns = implode(", ", array_keys($info));
        $escaped_values = array_map('mysql_real_escape_string', array_values($info));
        $values = implode(", ", $escaped_values);
        $sql = mysql_query("INSERT INTO 'mb_clients'($columns) VALUES ($values)");
        $Conn->$sql;
    }

}

$Cust = new Customer();


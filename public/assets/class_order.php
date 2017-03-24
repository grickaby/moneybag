<?php

/*
 * This class handles all orders. (add, modify, remove)
 */


require 'class_dbconnection.php';

Class Order {

    public function getExtras($Conn) {
        $sql = 'SELECT * FROM mb_extra';

        foreach ($Conn->query($sql) as $row) {
            echo "<input type='checkbox' title='" . $row['extra_description'] . "' name='" . $row['extra_name'] . "' value='" . $row['id'] . "'/><span title='" . $row['extra_description'] . "'>" . $row['extra_name'] . "\t</span>";
        }
    }

}

$Order = new Order();

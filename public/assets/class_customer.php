<?php

/*
 * This class handles all client functions (add, remove, modify)
 */

require 'class_dbconnection.php';

Class Customer {

    public function addCustomer($tableName, $info) {
        $sql = 'INSERT INTO $tableName (';
        $sql .= implode('', '', array_keys($info[0]));
        $sql .= ')VALUES';


        foreach ($info as $index => $row) {
            $sql .= '(';
            foreach ($row as $column => $value) {
                $sql .= ':' . $column . $index . ',';
                $params[':' . $column . $index] = $value;
            }
            $sql = rtrim($sql, ',');
            $sql .= '),';
        }
        $sql = rtrim($sql, ',');

        $stmt = $this->_conn->prepare($sql);
        $stmt->execute($params);
    }

}

$Cust = new Customer();

function stateDropdown($post = null, $type = 'mixed') {
    $states = array(
        array('AK', 'Alaska'),
        array('AL', 'Alabama'),
        array('AR', 'Arkansas'),
        array('AZ', 'Arizona'),
        array('CA', 'California'),
        array('CO', 'Colorado'),
        array('CT', 'Connecticut'),
        array('DC', 'District of Columbia'),
        array('DE', 'Delaware'),
        array('FL', 'Florida'),
        array('GA', 'Georgia'),
        array('HI', 'Hawaii'),
        array('IA', 'Iowa'),
        array('ID', 'Idaho'),
        array('IL', 'Illinois'),
        array('IN', 'Indiana'),
        array('KS', 'Kansas'),
        array('KY', 'Kentucky'),
        array('LA', 'Louisiana'),
        array('MA', 'Massachusetts'),
        array('MD', 'Maryland'),
        array('ME', 'Maine'),
        array('MI', 'Michigan'),
        array('MN', 'Minnesota'),
        array('MO', 'Missouri'),
        array('MS', 'Mississippi'),
        array('MT', 'Montana'),
        array('NC', 'North Carolina'),
        array('ND', 'North Dakota'),
        array('NE', 'Nebraska'),
        array('NH', 'New Hampshire'),
        array('NJ', 'New Jersey'),
        array('NM', 'New Mexico'),
        array('NV', 'Nevada'),
        array('NY', 'New York'),
        array('OH', 'Ohio'),
        array('OK', 'Oklahoma'),
        array('OR', 'Oregon'),
        array('PA', 'Pennsylvania'),
        array('PR', 'Puerto Rico'),
        array('RI', 'Rhode Island'),
        array('SC', 'South Carolina'),
        array('SD', 'South Dakota'),
        array('TN', 'Tennessee'),
        array('TX', 'Texas'),
        array('UT', 'Utah'),
        array('VA', 'Virginia'),
        array('VT', 'Vermont'),
        array('WA', 'Washington'),
        array('WI', 'Wisconsin'),
        array('WV', 'West Virginia'),
        array('WY', 'Wyoming')
    );

    $options = '<option value="">Select State</option>';

    foreach ($states as $state) {
        if ($type == 'abbrev') {
            $options .= '<option value="' . $state[0] . '" ' . checkSelect($post, $state[0], false) . ' >' . $state[0] . '</option>' . "\n";
        } elseif ($type == 'name') {
            $options .= '<option value="' . $state[1] . '" ' . checkSelect($post, $state[1], false) . ' >' . $state[1] . '</option>' . "\n";
        } elseif ($type == 'mixed') {
            $options .= '<option value="' . $state[0] . '" ' . checkSelect($post, $state[0], false) . ' >' . $state[1] . '</option>' . "\n";
        }
    }

    echo $options;
}

function checkSelect($i, $m, $e = true) {
    if ($i != null) {
        if ($i == $m) {
            $var = ' selected="selected" ';
        } else {
            $var = '';
        }
    } else {
        $var = '';
    }
    if (!$e) {
        return $var;
    } else {
        echo $var;
    }
}

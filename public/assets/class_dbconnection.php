<?php

class DBConnection extends PDO {

    public function __construct() {
        $db_host = 'localhost';
        $db_name = 'moneybag';
        $db_user = 'moneybag';
        $db_pass = 'moneyb@g!';

        parent::__construct("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
        $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    }

}

$Conn = new DBConnection();

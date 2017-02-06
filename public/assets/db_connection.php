<?php

class DBConnection extends PDO {

    public function __construct() {
        $dbhost = 'localhost';
        $dbname = 'moneybag';
        $dbuser = 'moneybag';
        $dbpass = 'moneyb@g!';

        parent::__construct("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
        $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    }

}

$db = new DBConnection();

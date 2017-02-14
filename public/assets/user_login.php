<?php

require 'assets/db_connection.php';

class userLogin {

    public function __construct() {

    }

    public function getDrivers($db) {
        $stmt = $db->prepare('SELECT * FROM mb_drivers');
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result;
    }

    public function login($db, $drvnumber, $username, $passwd) {
        if (isset($username)) {
            $stmt = $db->prepare("SELECT id, driver_number, username, passwd FROM mb_drivers WHERE driver_number = :drvnumber LIMIT 1");
            $stmt->execute(array('drvnumber' => $drvnumber));
            $stmt->store_result();
            $stmt->bind_result($id, $driverNumber, $driverUsername, $driverPasswrd);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);


            if ($result->num_rows == 1) {
                if (password_verify($formPassword, $driverPasswrd)) {
                    $user_browser = $_SERVER['HTTP_USER_AGENT'];
                    $user_id = preg_replace("/[^0-9]+/", "", $id);
                    $_SESSION['user_id'] = $user_id;

                    $username = preg_replace("/[^a-zA-Z0-9_\-]+/", "", $driverNumber);
                    $_SESSION['username'] = $driverNumber;
                    $_SESSION['login_string'] = hash('sha512', $driverPasswrd . $user_browser);
                }
            }
        } else {
            //No user exists
            $msg = "Not a valid login.";

            return false;
        }
    }

}

$userLogin = new userLogin();

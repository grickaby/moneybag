<?php

/* 
 * This class handles user actions. (login, logout)
 */


require 'assets/class_dbconnection.php';

class User {

    private $db;

    public function __construct($Conn = '') {
        $this->db = $Conn;
    }

    public function getDrivers($Conn) {
        $stmt = $Conn->prepare('SELECT * FROM mb_drivers');
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result;
    }

    public function login($drvnumber, $username, $passwd) {
        try {
            $stmt = $this->db->prepare("SELECT * FROM mb_drivers WHERE username=:username LIMIT 1");
            $stmt->execute(array(':username' => $username));
            $user_row = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($stmt->rowCount() > 0) {
                if (password_verify($passwd, $user_row['user_pass'])) {
                    $_SESSION['user_session'] = $user_row['user_id'];
                    return true;
                } else {
                    return false;
                }
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function isLoggedin() {
        if (isset($_SESSION['user_session'])) {
            return true;
        }
    }

    public function redirect($url) {
        header("Location: $url");
    }

    public function logout() {
        session_destroy();
        unset($_SESSION['user_session']);
        return true;
    }

}

$user = new user();

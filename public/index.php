<?php
require 'assets/class_dbconnection.php';

$msg = '';

if (isset($_REQUEST['username'])) {

    $username = $_POST['username'];
    $passwd = $_POST['password'];


    try {
        $stmt = $Conn->prepare("SELECT id,username,passwd,pass_hash FROM mb_drivers WHERE username=:username LIMIT 1");
        $stmt->execute(array(':username' => $username));
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($stmt->rowCount() > 0) {
            if (password_verify($passwd, $row['pass_hash'])) {
                session_start();
                $_SESSION['session_id'] = $row['id'];
                $_SESSION['session_name'] = $row['username'];
                header("Location: mb/index.php");
                exit();
            } else {
                $msg = '<p style="color:red;font-weight:bold;">Password Incorrect</p>';
            }
        } else {
            $msg = '<p style="color:red;font-weight:bold;">Invalid Driver ID</p>';
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Moneybag | A settlement statement tracker for truck drivers</title>
        <link href="css/ratchet.min.css" rel="stylesheet" type="text/css"/>
        <link href="css/styles.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <div id="login">
            <h1>Moneybag</h1>
            <br/>
            <?= $msg; ?>
            <form method="post" action="index.php">
                <input type="text" name="username" id="username" placeholder="Driver Number" required/><br/>
                <input type="password" name="password" id="password" placeholder="Password"  required/><br/>
                <input type="submit" name="submit" value="Login" class="btn" />
            </form>
        </div>

    </body>
</html>

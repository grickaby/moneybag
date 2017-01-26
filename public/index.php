<?php
define('INCLUDE_CHECK', true);
require 'assets/db-connection.php';

session_name('mbLogin');
// Starting the session

session_set_cookie_params(2 * 7 * 24 * 60 * 60);
// Making the cookie live for 2 weeks

session_start();

if ($_SESSION['id'] && !isset($_COOKIE['mbRemember']) && !$_SESSION['rememberMe']) {
    // If you are logged in, but you don't have the tzRemember cookie (browser restart)
    // and you have not checked the rememberMe checkbox:

    $_SESSION = array();
    session_destroy();

    // Destroy the session
}

if (isset($_GET['logoff'])) {
    $_SESSION = array();
    session_destroy();
    header("Location: index.php");
    exit;
}

if ($_POST['submit'] == 'Login') {
    // Checking whether the Login form has been submitted

    $err = array();
    // Will hold our errors

    if (!$_POST['username'] || !$_POST['password'])
        $err[] = 'All the fields must be filled in!';

    if (!count($err)) {
        $_POST['username'] = mysql_real_escape_string($_POST['username']);
        $_POST['password'] = mysql_real_escape_string($_POST['password']);
        $_POST['rememberMe'] = (int) $_POST['rememberMe'];

        // Escaping all input data

        $row = mysql_fetch_assoc(mysql_query("SELECT id,username FROM mb_drivers WHERE username='{$_POST['username']}' AND pass='" . md5($_POST['password']) . "'"));

        if ($row['username']) {
            // If everything is OK login

            $_SESSION['usr'] = $row['username'];
            $_SESSION['id'] = $row['id'];
            $_SESSION['rememberMe'] = $_POST['rememberMe'];

            // Store some data in the session

            setcookie('mbRemember', $_POST['rememberMe']);
            // We create the mbRemember cookie
        } else
            $err[] = 'Wrong username and/or password!';
    }

    if ($err)
        $_SESSION['msg']['login-err'] = implode('<br />', $err);
    // Save the error messages in the session

    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Moneybag | A settlement statement tracker.</title>
        <link href="css/styles.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <div id="login">
            <h1>Moneybag</h1>
            <br/>
            <form>
                <input type="text" name="username" id="username" value="" placeholder="Driver Number"/><br/>
                <input type="password" name="password" id="password" placeholder="Password" /><br/>
                <input type="submit" name="submit" value="Login" class="btn" />
                <input name="rememberMe" id="rememberMe" type="checkbox" checked="checked" value="1" />&nbsp;Remember me
                <?php
                if ($_SESSION['msg']['login-err']) {
                    echo '<div class="err">' . $_SESSION['msg']['login-err'] . '</div>';
                    unset($_SESSION['msg']['login-err']);
                    // This will output login errors, if any
                }
                ?>
            </form>
        </div>
    </body>
</html>

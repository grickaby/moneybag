<?php
require 'assets/user_login.php';

getDrivers($db);
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
                <input name="rememberMe" id="rememberMe" type="checkbox" value="1" />&nbsp;Remember me
            </form>
        </div>
    </body>
</html>

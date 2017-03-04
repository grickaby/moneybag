<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Moneybag | A settlement statement tracker.</title>
        <link href="css/styles.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <?php
        require 'assets/class_user.php';
        ?>
        <div id="login">
            <h1>Moneybag</h1>
            <br/>
            <form method="post">
                <input type="text" name="username" id="username" placeholder="Driver Number" required/><br/>
                <input type="password" name="password" id="password" placeholder="Password"  required/><br/>
                <input type="submit" name="submit" value="Login" class="btn" />
                <input name="rememberMe" id="rememberMe" type="checkbox" value="1" />&nbsp;Remember me
            </form>
        </div>
    </body>
</html>

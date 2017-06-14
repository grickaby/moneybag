<?php
session_start();
echo $_SESSION['session_id'];
echo $_SESSION['session_name'];
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="Content-Language" content="en">
        <title>Driver Panel</title>
        <link href="../css/styles.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <ul class="mb-links">
            <li><a href="orders.php" class="mb-link">Input Order</a></li>
            <li><a href="profile.php" class="mb-link">Profile</a></li>
            <li><a href="customer.php" class="mb-link">Add/Modify Customer</a></li>
        </ul>
    </body>
</html>

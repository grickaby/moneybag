<?php
session_start();

$session_id = $_SESSION['session_id'];
$session_name = $_SESSION['session_name'];

require '../assets/class_stocks.php';
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
            <li><a href="regulations.php" class="mb-link">Regulations</a></li>
        </ul>
    </body>
</html>

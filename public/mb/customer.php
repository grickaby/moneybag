<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Add Customer</title>
        <link href="../css/styles.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <?php require '../assets/class_customer.php'; ?>

        <form method="post" action="<?php $_PHP_SELF ?>">
            <label for="customer-name">Customer Name:</label><input type="textbox" id="customer-name" name="customer-name"><br/>
            <label for="customer-number">Customer Number:</label><input type="textbox" id="customer-number" name="customer-number"><br/>
            <label for="customer-address">Customer Address:</label><input type="textbox" id="customer-address" name="customer-address"><br/>
            <label for="customer-city">Customer City:</label><input type="textbox" id="customer-city" name="customer-city"><br/>
            <label for="customer-state">Customer State:</label><select id="customer-state" name="customer-state"><?php stateDropdown(); ?></select><br/>
            <label for="customer-zip">Customer Zip:</label><input type="textbox" id="customer-zip" name="customer-zip"><br/>
            <label for="customer-gas">Customer Gas Price:</label><input type="textbox" id="customer-gas" name="customer-gas"><br/>
            <label for="customer-diesel">Customer Diesel Price:</label><input type="textbox" id="customer-diesel" name="customer-diesel"><br/>
            <input type="submit" class="btn">


        </form>



    </body>
</html>

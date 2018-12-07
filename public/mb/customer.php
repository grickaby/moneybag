<?php
session_start();

$session_id = $_SESSION['session_id'];
$session_name = $_SESSION['session_name'];

require '../assets/class_dbconnection.php';

if (isset($_POST['submit'])) {
    unset($_POST['submit']);
    print_r($_POST);

    $columns = implode(', ', array_keys($_POST));
    $values = implode(', ', array_values($_POST));

    print_r($columns);
    print_r($values);

    $stmt = $Conn->prepare("INSERT INTO mb_clients($columns) VALUES ($values)");
    $stmt->execute();
}

function stateDropdown($post = null, $type = 'mixed') {
    $states = array(
        array('AK', 'Alaska'),
        array('AL', 'Alabama'),
        array('AR', 'Arkansas'),
        array('AZ', 'Arizona'),
        array('CA', 'California'),
        array('CO', 'Colorado'),
        array('CT', 'Connecticut'),
        array('DC', 'District of Columbia'),
        array('DE', 'Delaware'),
        array('FL', 'Florida'),
        array('GA', 'Georgia'),
        array('HI', 'Hawaii'),
        array('IA', 'Iowa'),
        array('ID', 'Idaho'),
        array('IL', 'Illinois'),
        array('IN', 'Indiana'),
        array('KS', 'Kansas'),
        array('KY', 'Kentucky'),
        array('LA', 'Louisiana'),
        array('MA', 'Massachusetts'),
        array('MD', 'Maryland'),
        array('ME', 'Maine'),
        array('MI', 'Michigan'),
        array('MN', 'Minnesota'),
        array('MO', 'Missouri'),
        array('MS', 'Mississippi'),
        array('MT', 'Montana'),
        array('NC', 'North Carolina'),
        array('ND', 'North Dakota'),
        array('NE', 'Nebraska'),
        array('NH', 'New Hampshire'),
        array('NJ', 'New Jersey'),
        array('NM', 'New Mexico'),
        array('NV', 'Nevada'),
        array('NY', 'New York'),
        array('OH', 'Ohio'),
        array('OK', 'Oklahoma'),
        array('OR', 'Oregon'),
        array('PA', 'Pennsylvania'),
        array('PR', 'Puerto Rico'),
        array('RI', 'Rhode Island'),
        array('SC', 'South Carolina'),
        array('SD', 'South Dakota'),
        array('TN', 'Tennessee'),
        array('TX', 'Texas'),
        array('UT', 'Utah'),
        array('VA', 'Virginia'),
        array('VT', 'Vermont'),
        array('WA', 'Washington'),
        array('WI', 'Wisconsin'),
        array('WV', 'West Virginia'),
        array('WY', 'Wyoming')
    );

    $options = '<option value="">Select State</option>';

    foreach ($states as $state) {
        if ($type == 'abbrev') {
            $options .= '<option value="' . $state[0] . '" ' . checkSelect($post, $state[0], false) . ' >' . $state[0] . '</option>' . "\n";
        } elseif ($type == 'name') {
            $options .= '<option value="' . $state[1] . '" ' . checkSelect($post, $state[1], false) . ' >' . $state[1] . '</option>' . "\n";
        } elseif ($type == 'mixed') {
            $options .= '<option value="' . $state[0] . '" ' . checkSelect($post, $state[0], false) . ' >' . $state[1] . '</option>' . "\n";
        }
    }

    echo $options;
}

function checkSelect($i, $m, $e = true) {
    //For State Selection
    if ($i != null) {
        if ($i == $m) {
            $var = ' selected="selected" ';
        } else {
            $var = '';
        }
    } else {
        $var = '';
    }
    if (!$e) {
        return $var;
    } else {
        echo $var;
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Add Customer</title>
        <link href="../css/styles.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <div class="navbar">
            <div class="left">
                <button onclick="window.history.back()"><<<</button>
            </div>
            <div class="right">
                <a href="index.php">Home</a>
            </div>
        </div>
        <div class="main">
            <form method="post">
                <label for="customer-name">Customer Name:</label><input type="textbox" id="customer-name" name="c_name"><br/>
                <label for="customer-number">Customer Number:</label><input type="textbox" id="customer-number" name="c_number"><br/>
                <label for="customer-address">Customer Address:</label><input type="textbox" id="customer-address" name="c_address"><br/>
                <label for="customer-city">Customer City:</label><input type="textbox" id="customer-city" name="c_city"><br/>
                <label for="customer-state">Customer State:</label><select id="customer-state" name="c_state"><?php stateDropdown(); ?></select><br/>
                <label for="customer-zip">Customer Zip:</label><input type="textbox" id="customer-zip" name="c_zip"><br/>
                <label for="customer-gas">Customer Gas Price:</label><input type="textbox" id="customer-gas" name="price_gas"><br/>
                <label for="customer-diesel">Customer Diesel Price:</label><input type="textbox" id="customer-diesel" name="price_distillate"><br/>
                <input type="submit" class="btn" name="submit">


            </form>

        </div>

    </body>
</html>

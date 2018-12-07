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
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Calculator</title>

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
            <form class="input-group">
                <div class="row">
                    <label>Enter Gallons:</label>
                    <input id="p1" type="text" placeholder="4500"><br/>
                    <select id="sp1">
                        <option>Select Product</option>
                        <option value="6.25">Gas</option>
                        <option value="7.2">Diesel</option>
                        <option value="7.7">Bean Oil</option>
                    </select>
                </div>
                <div class="row">
                    <label>Enter Gallons:</label>
                    <input id="p2" type="text" placeholder="3500"><br/>
                    <select id="sp2">
                        <option>Select Product</option>
                        <option value="6.25">Gas</option>
                        <option value="7.2">Diesel</option>
                        <option value="7.7">Bean Oil</option>
                    </select>
                </div>
                <div class="row">
                    <label>Enter Gallons:</label>
                    <input id="p3" type="text" placeholder="2500"><br/>
                    <select id="sp3">
                        <option>Select Product</option>
                        <option value="6.25">Gas</option>
                        <option value="7.2">Diesel</option>
                        <option value="7.7">Bean Oil</option>
                    </select>
                </div>
                <button onclick="doMath();">Click me</button>
                <div class="row">
                    <br/>
                    stuff
                    <div id="calvalue"></div>
                </div>

            </form>
            <script>
                var p1 = document.getElementById('p1').value;
                var p2 = document.getElementById('p2').value;
                var p3 = document.getElementById('p3').value;
                var sp1 = document.getElementById('sp1');
                var sp2 = document.getElementById('sp1');
                var sp3 = document.getElementById('sp1');
                var sp11 = sp1.options[sp1.selectedIndex].value;
                var sp22 = sp2.options[sp2.selectedIndex].value;
                var sp33 = sp3.options[sp3.selectedIndex].value;

                function doMath() {
                    if (p1) {
                        var p1v = p1 * sp11;

                        return document.getElementById('calvalue').innerHTML;


                    }
                }


            </script>
        </div>
    </body>
</html>

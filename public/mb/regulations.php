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
        <title>FMCSA and Wisconsin Trucking Regulations</title>
        <link href="../css/styles.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>        <div class="navbar">
            <div class="left">
                <button onclick="window.history.back()"><<<</button>
            </div>
            <div class="right">
                <a href="index.php">Home</a>
            </div>
        </div>
        <div class="main">
            <h1>MCSA and Wisconsin Trucking Regulations</h1>
            <ul>
                <li><a href="#classb">Class B and Class II Highway</a></li>
                <li><a href="#rail">Railroad Crossings</a></li>
                <li><a href="#weight">Weight Limits</a></li>
            </ul>

            <div class="regulations">
                <div id="classb">
                    <h2>Class B and Class II Highways</h2>
                    <p><a href="https://docs.legis.wisconsin.gov/document/statutes/348.16(1)" target="_blank">WIDOT 348.16(1)</a> - <cite>Class B Highway includes those county trunk highways, town highways and city and village streets, or portions thereof, which have been designated as class "B" highways by the local authorities.</cite></p><br/>
                    <p><a href="https://docs.legis.wisconsin.gov/document/statutes/348.16(2)" target="_blank">WIDOT 348.16(2)</a> - <cite>No person, without a permit therefor, shall operate on a class "B" highway any vehicle or combination of vehicles imposing wheel, axle, group of axles, or gross weight on the highway exceeding 60 percent of the weight. 48,000lbs for an 80,000lbs vehicle.</cite></p><br/>
                    <p><a href="https://docs.legis.wisconsin.gov/document/statutes/348.16(3)(a)" target="_blank">WIDOT 348.16(3)(a)</a> - <cite>Any motor vehicle whose operation is pickup or delivery, including operation for the purpose of moving or delivering supplies or commodities to or from any place of business or residence that has an entrance on a class "B" highway, may pick up or deliver on a class "B" highway without complying with the gross vehicle weight limitations.</cite></p>
                    <br/>
                    <hr/>
                    <br/>
                </div>
                <div id="rail">
                    <h2>Railroad Crossings</h2>
                    <p><a href="https://www.ecfr.gov/cgi-bin/retrieveECFR?gp=1&ty=HTML&h=L&mc=true&=PART&n=pt49.5.392#se49.5.392_110" target="_blank">FMCSA 392.10(a)</a> - <cite>the driver of a commercial motor vehicle shall not cross a railroad track or tracks at grade unless he/she first: Stops the commercial motor vehicle within 50 feet of, and not closer than 15 feet to, the tracks; thereafter listens and looks in each direction along the tracks for an approaching train; and ascertains that no train is approaching. When it is safe to do so, the driver may drive the commercial motor vehicle across the tracks in a gear that permits the commercial motor vehicle to complete the crossing without a change of gears. The driver must not shift gears while crossing the tracks.</cite></p><br/>
                    <p>A truck does not have to stop if the empty tanker, including residue and vapors have been removed from a tank by either cleaning or refilling with a non-hazardous material.</p>
                    <br/>
                    <p><strong>You do not need to stop if:</strong></p>
                    <ul>
                        <li><cite>A railroad grade crossing when a police officer or crossing flagman directs traffic to proceed. <a href="https://www.ecfr.gov/cgi-bin/retrieveECFR?gp=1&ty=HTML&h=L&mc=true&=PART&n=pt49.5.392#se49.5.392_110" target="_blank">FMCSA 392.10(b)(2)</a></cite></li>
                        <li><cite>An industrial or spur line railroad grade crossing marked with a sign reading "Exempt." <a href="https://www.ecfr.gov/cgi-bin/retrieveECFR?gp=1&ty=HTML&h=L&mc=true&=PART&n=pt49.5.392#se49.5.392_110" target="_blank">FMCSA 392.10(b)(5)</a></cite></li>
                    </ul>
                    <br/>
                    <hr/>
                    <br/>
                </div>
                <div id="weight">
                    <h2>Weight Limits</h2>
                    <strong>Maximum Weight</strong> <p>For a five axle vehicle combination tractor and trailer cannot exceed 80,000lbs. <a href="https://docs.legis.wisconsin.gov/document/statutes/348.15(3)(c)" target="_blank">WIDOT 348.15(3)(c)</a></p><br/>
                    <strong>Steer Axle</strong> - 12,000lbs<br/>
                    <strong>Drive Axles</strong> - 34,000lbs<br/>
                    <strong>Trailer Axles</strong> - 34,000lbs<br/>
                </div>
            </div>
            <br/>
            <div class="reg-disclaimer">Regulations data is current as of 7/22/2017</div>

        </div>
    </body>
</html>

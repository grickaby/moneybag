<?php
session_start();

$session_id = $_SESSION['session_id'];
$session_name = $_SESSION['session_name'];
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="Content-Language" content="en">
        <title>Enter Order</title>
        <link href="../css/styles.css" rel="stylesheet" type="text/css"/>
        <link href="../css/jquery-ui.min.css" rel="stylesheet" type="text/css"/>
        <link href="../css/jquery-ui.structure.min.css" rel="stylesheet" type="text/css"/>
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
            <script src="../js/jquery-3.2.0.min.js" type="text/javascript"></script>
            <script src="../js/jquery-ui.min.js" type="text/javascript"></script>
            <script>
                    $(function () {
                        var url = "../assets/json_customer.php";

                        $("#customers").autocomplete({
                            source: function (request, response)
                            {
                                var term = request.term;
                                if (term in cache) {
                                    response(cache[ term ]);
                                    return;
                                }
                                $.getJSON(url, request, function (data, status, xhr) {
                                    cache[ term ] = data;
                                    response(data);
                                });
                            },
                            dataType: 'json',
                            minLength: 2,
                            select: function (event, ui) {
                                $("#customer-id").val(ui.item.number);
                            }
                        });
                    });
            </script>

<?php
require '../assets/class_order.php';
?>
            <form id="order">
                <div class="customer-info">
                    <h3>Customer Information</h3>
                    <label for="customers">Customer:</label> <input type="textbox" id="customers"><br>
                    <input type="hidden" id="customer-id" name="customer-id" value="">
                    <label for="order-number">Order Number:</label> <input type="textbox" id="order-number" name="order-number"><br>
                </div>
                <div class="order-info">
                    <h3>Order Information</h3>
                    <label for="gas-total">Gasoline Total:</label> <input type="textbox" id="gas-total" name="gas-total"><br>
                    <input type="hidden" id="customer-gas" name="customer-gas" value="">
                    <label for="distillate-total">Distillate Total:</label> <input type="textbox" id="distillate-total" name="distillate-total"><br>
                    <input type="hidden" id="customer-diesel" name="customer-diesel" value="">
                    <br>
                    <strong><label for="order-extras">Order Services</label></strong><br>
<?php $Order->getExtras($Conn); ?>
                </div>
            </form>

        </div>
    </body>
</html>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Enter Order</title>
        <link href="../css/styles.css" rel="stylesheet" type="text/css"/>
        <link href="../css/jquery-ui.min.css" rel="stylesheet" type="text/css"/>
        <link href="../css/jquery-ui.structure.min.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <script src="../js/jquery-3.2.0.min.js" type="text/javascript"></script>
        <script src="../js/jquery-ui.min.js" type="text/javascript"></script>
        <script>
            $(function () {

                $("#customers").autocomplete({
                    source: "../assets/json_clients.php",
                    dataType: 'json',
                    minLength: 2,
                    select: function (event, ui) {
                        $("customer-id").val(ui.item.number);
                    }
                });
            });
        </script>

        <?php
        require '../assets/class_order.php';
        ?>
        <form>
            Customer:<br>
            <input type="textbox" id="customers"><br><br>
            <input type="hidden" id="customer-id" name="customer-id" value="">
            Order Number: <input type="textbox"><br>
            <hr>
            Gasoline Total: <input type="textbox"><br>
            <input type="hidden" id="customer-gas" name="customer-gas" value="">
            Diesel Total: <input type="textbox"><br>
            <input type="hidden" id="customer-diesel" name="customer-diesel" value="">
            <hr>
            <b>Order Services</b><br>
            <?php $Order->getExtras($Conn); ?>
        </form>


    </body>
</html>

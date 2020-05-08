<!DOCTYPE html>
<html lang="en">
<head>
   <?php include 'tools.php' ?>
</head>
<body>
    <?php
        php2js($pricesObject, 'pricesArrayJS');
    ?>
    <script>
        for(key in pricesArrayJS){
            value = pricesArrayJS[key];
            document.write(key + '<br>')
            for(key1 in value){
                value1 = key1[]
                document.write(key1 + ": " + value1 + '<br>')
            }
        }
    </script> 
</body>
<footer style = "position:fixed; bottom:0px">
<?php
        preShow($_GET);
        preShow($_POST);     // ie echo a string
        preShow($_SESSION);
    ?>
</footer>
</html>
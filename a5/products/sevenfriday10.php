<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link id='stylecss' type="text/css" rel="stylesheet" href="../css/style.php">
    <link id='stylecss' type="text/css" rel="stylesheet" href="../css/productpagestyle.php">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <title>Q3/05</title>
</head>
<body>
    <?php
        include('includes/header.php');
    ?>

    <div class="container">
        <div class="row">
            <?php
                $images = array();
                array_push($images, 
                "../img/watches/sevenfriday10.png", 
                "../img/watches/sevenfriday10-1.png", 
                "../img/watches/sevenfriday10-2.png", 
                "../img/watches/sevenfriday10-3.png");

                $name = "Q3/05";
                $price = "1220";
                $caseSize = "49mm";
                $caseThickness = "15mm";
                $glass = "Specially Hardened Domed Mineral Glass";
                $movement = "Automatic Movement - Customized Miyota 82S7";

                include('includes/productdetails.php')
            ?>
        </div>
    </div>

    <div id="blankspace"></div>

    <?php
        include('includes/footer.php');
    ?>
</body>
</html>
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

    <title>MOVADO BOLD CERAMIC</title>
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
                "../img/watches/movado8.png", 
                "../img/watches/movado8-1.png", 
                "../img/watches/movado8-2.png");

                $name = "MOVADO BOLD CERAMIC";
                $price = "550";
                $caseSize = "30.8mm";
                $caseThickness = "34mm";
                $glass = "Crystal K1";
                $movement = "SWISS QUARTZ MOVEMENT";

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
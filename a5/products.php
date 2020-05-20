<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link id='stylecss' type="text/css" rel="stylesheet" href="css/productdetailstyle.css">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <title>Product</title>
</head>
<body class="w3-content" style="max-width:1200px">
  <?php
      include('includes/header.php');
  ?>

    <div class="card">
        <img src="img/watches/sevenfriday1.png" style="width:40%" id="product-image">
        <div>
            <span>P - Model</span>
            <h1>P3B/06 RACING TEAM RED</h1>
            <p class="price"><b>$1,150.00</b></p>
            <p>SEVENFRIDAY hits the road with the P3B/06 Red Racing Team. Constructed from the iconic P-Series and industrial engine inspired, the P3B/06 Red, is a symbol of the bond between man and machine. From the late-night cannonball runs through Tokyo’s Shubiya Crossing to daylong rallies through the windy roads of southern California, the P3B/06 Red is speeding to the finish line with a black silicone animation ring, carbon fiber interface and silicone and leather color-coordinated strap</p>
            <br>
            <p><button>Add to Cart</button></p>
            <br>
            <br>
        </div>
    </div>

  <?php
      include('includes/footer.php');
      include('includes/javascript.php');
  ?>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link id='stylecss' type="text/css" rel="stylesheet" href="css/style.php" media="screen">
    <link id='stylecss' type="text/css" rel="stylesheet" href="css/productpagestyle.php" media="screen">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <title>Movado</title>
</head>
<body>
  <?php
    include('includes/header.php');
  ?>

  <br>
  <br>
  <br>

  <!-- Product grid -->
  <div class="w3-row watch-showcase-container">
    <div class="w3-col l3 s6">
      <div class="w3-container">
        <div class="w3-display-container">
          <img src="img/watches/mvmt1.jpg" style="width:100%">
          <div class="w3-display-middle w3-display-hover">
            <button class="w3-button w3-black" style="position: relative; top: 70px;">Add To Cart <i class="fa fa-shopping-cart"></i></button>
          </div>
        </div>
        <p style="text-align: center;"><a href="">CLASSIC BLACK LEATHER</a><br><b class="w3-text-red">$95.00</b></p>
      </div>
      <div class="w3-container">
        <div class="w3-display-container">
          <img src="img/watches/mvmt5.jpg" style="width:100%">
          <div class="w3-display-middle w3-display-hover">
            <button class="w3-button w3-black" style="position: relative; top: 70px;">Add To Cart <i class="fa fa-shopping-cart"></i></button>
          </div>
        </div>
        <p style="text-align: center;"><a href="">THE 40 - ROSE GOLD BROWN</a><br><b class="w3-text-red">$120.00</b></p>
      </div>
    </div>

    <div class="w3-col l3 s6">
      <div class="w3-container">
        <div class="w3-display-container">
          <img src="img/watches/mvmt2.jpg" style="width:100%">
          <span class="w3-tag w3-display-topleft">Sale</span>
          <div class="w3-display-middle w3-display-hover">
            <button class="w3-button w3-black" style="position: relative; top: 70px;">Add To Cart <i class="fa fa-shopping-cart"></i></button>
          </div>
        </div>
        <p style="text-align: center;"><a href="">CLASSIC BRONZE AGE</a><br><b class="w3-text-red">$82.50</b></p>
      </div>
     <div class="w3-container">
        <div class="w3-display-container">
          <img src="img/watches/mvmt6.jpg" style="width:100%">
          <div class="w3-display-middle w3-display-hover">
            <button class="w3-button w3-black" style="position: relative; top: 70px;">Add To Cart <i class="fa fa-shopping-cart"></i></button>
          </div>
        </div>
        <p style="text-align: center;"><a href="">THE 40 - ROSE GOLD NATURAL TAN</a><br><b class="w3-text-red">$120.00</b></p>
      </div>
    </div>

    <div class="w3-col l3 s6">
      <div class="w3-container">
        <div class="w3-display-container">
          <img src="img/watches/mvmt3.jpg" style="width:100%">
          <div class="w3-display-middle w3-display-hover">
            <button class="w3-button w3-black" style="position: relative; top: 70px;">Add To Cart <i class="fa fa-shopping-cart"></i></button>
          </div>
        </div>
        <p style="text-align: center;"><a href="">CLASSIC BLACK ROSE</a><br><b class="w3-text-red">$110.00</b></p>
      </div>
      <div class="w3-container">
        <div class="w3-display-container">
          <img src="img/watches/mvmt7.jpg" style="width:100%">
          <div class="w3-display-middle w3-display-hover">
            <button class="w3-button w3-black" style="position: relative; top: 70px;">Add To Cart <i class="fa fa-shopping-cart"></i></button>
          </div>
        </div>
        <p style="text-align: center;"><a href="">THE 40 - BLACK LINK</a><br><b class="w3-text-red">$130.00</b></p>
      </div>
    </div>

    <div class="w3-col l3 s6">
      <div class="w3-container">
        <div class="w3-display-container">
          <img src="img/watches/mvmt4.jpg" style="width:100%">
          <div class="w3-display-middle w3-display-hover">
            <button class="w3-button w3-black" style="position: relative; top: 70px;">Add To Cart <i class="fa fa-shopping-cart"></i></button>
          </div>
        </div>
        <p style="text-align: center;"><a href="">CLASSIC WHITE BLACK</a><br><b class="w3-text-red">$95.00</b></p>
      </div>
      <div class="w3-container">
        <div class="w3-display-container">
          <img src="img/watches/mvmt8.jpg" style="width:100%">
          <div class="w3-display-middle w3-display-hover">
            <button class="w3-button w3-black" style="position: relative; top: 70px;">Add To Cart <i class="fa fa-shopping-cart"></i></button>
          </div>
        </div>
        <p style="text-align: center;"><a href="">THE 40 - GUNMETAL MESH</a><br><b class="w3-text-red">$125.00</b></p>
      </div>
    </div>
  </div>

  <div id="blankspace"></div>

  <?php
    include('includes/footer.php');
    include('includes/javascript.php');
  ?>
</body>
</html>
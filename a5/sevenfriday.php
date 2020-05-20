<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link id='stylecss' type="text/css" rel="stylesheet" href="css/productpagestyle.css">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <title>SevenFriday</title>
</head>
<body class="w3-content" style="max-width:1200px">
  <?php
    include('includes/header.php');
  ?>

  <!-- Product grid -->
  <div class="w3-row">
    <div class="w3-col l3 s6">
      <div class="w3-container">
        <div class="w3-display-container">
          <img src="img/watches/sevenfriday1.png" style="width:100%">
          <div class="w3-display-middle w3-display-hover">
            <button class="w3-button w3-black" style="position: relative; top: 60px;">Add To Cart <i class="fa fa-shopping-cart"></i></button>
          </div>
        </div>
        <p style="text-align: center;">P3B/06 RACING TEAM RED<br><b class="w3-text-red">$1,150.00</b></p>
      </div>
      <div class="w3-container">
        <div class="w3-display-container">
          <img src="img/watches/sevenfriday2.png" style="width:100%">
          <div class="w3-display-middle w3-display-hover">
            <button class="w3-button w3-black" style="position: relative; top: 60px;">Add To Cart <i class="fa fa-shopping-cart"></i></button>
          </div>
        </div>
        <p style="text-align: center;">M1B/01M URBAN EXPLORER<br><b class="w3-text-red">$1,355.00</b></p>
      </div>
    </div>

    <div class="w3-col l3 s6">
      <div class="w3-container">
        <div class="w3-display-container">
          <img src="img/watches/sevenfriday8.png" style="width:100%">
          <div class="w3-display-middle w3-display-hover">
            <button class="w3-button w3-black" style="position: relative; top: 60px;">Add To Cart <i class="fa fa-shopping-cart"></i></button>
          </div>
        </div>
        <p style="text-align: center;">P1C/01<br><b class="w3-text-red">$1,150.00</b></p>
      </div>
     <div class="w3-container">
        <div class="w3-display-container">
          <img src="img/watches/sevenfriday4.png" style="width:100%">
          <div class="w3-display-middle w3-display-hover">
            <button class="w3-button w3-black" style="position: relative; top: 60px;">Add To Cart <i class="fa fa-shopping-cart"></i></button>
          </div>
        </div>
        <p style="text-align: center;">M1B/01 URBAN EXPLORER<br><b class="w3-text-red">$1,250.00</b></p>
      </div>
    </div>

    <div class="w3-col l3 s6">
      <div class="w3-container">
        <div class="w3-display-container">
          <img src="img/watches/sevenfriday5.png" style="width:100%">
          <span class="w3-tag w3-display-topleft">New</span>
          <div class="w3-display-middle w3-display-hover">
            <button class="w3-button w3-black" style="position: relative; top: 60px;">Add To Cart <i class="fa fa-shopping-cart"></i></button>
          </div>
        </div>
        <p style="text-align: center;">M3/05 – PIMP<br><b class="w3-text-red">$1,750.00</b></p>
      </div>
      <div class="w3-container">
        <div class="w3-display-container">
          <img src="img/watches/sevenfriday6.png" style="width:100%">
          <div class="w3-display-middle w3-display-hover">
            <button class="w3-button w3-black" style="position: relative; top: 60px;">Add To Cart <i class="fa fa-shopping-cart"></i></button>
          </div>
        </div>
        <p style="text-align: center;">M3/01 SPACESHIP<br><b class="w3-text-red">$1,100.00</b></p>
      </div>
    </div>

    <div class="w3-col l3 s6">
      <div class="w3-container">
        <div class="w3-display-container">
          <img src="img/watches/sevenfriday3.png" style="width:100%">
          <span class="w3-tag w3-display-topleft">New</span>
          <div class="w3-display-middle w3-display-hover">
            <button class="w3-button w3-black" style="position: relative; top: 60px;">Add To Cart <i class="fa fa-shopping-cart"></i></button>
          </div>
        </div>
        <p style="text-align: center;">M3/04 – PINKY<br><b class="w3-text-red">$1,750.00</b></p>
      </div>
      <div class="w3-container">
        <div class="w3-display-container">
          <img src="img/watches/sevenfriday7.png" style="width:100%">
          <div class="w3-display-middle w3-display-hover">
            <button class="w3-button w3-black" style="position: relative; top: 60px;">Add To Cart <i class="fa fa-shopping-cart"></i></button>
          </div>
        </div>
        <p style="text-align: center;">M2/02<br><b class="w3-text-red">$1,474.00</b></p>
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
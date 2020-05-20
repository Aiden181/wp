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

    <title>Movado</title>
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
          <img src="img/watches/movado1.png" style="width:100%">
          <span class="w3-tag w3-display-topleft">New</span>
          <div class="w3-display-middle w3-display-hover">
            <button class="w3-button w3-black" style="position: relative; top: 70px;">Add To Cart <i class="fa fa-shopping-cart"></i></button>
          </div>
        </div>
        <p style="text-align: center;">MOVADO BOLD EVOLUTION
          <br><b class="w3-text-red">$650.00</b></p>
      </div>
      <div class="w3-container">
        <div class="w3-display-container">
          <img src="img/watches/movado2.png" style="width:100%">
          <span class="w3-tag w3-display-topleft">New</span>
          <div class="w3-display-middle w3-display-hover">
            <button class="w3-button w3-black" style="position: relative; top: 70px;">Add To Cart <i class="fa fa-shopping-cart"></i></button>
          </div>
        </div>
        <p style="text-align: center;">MODERN 47<br><b class="w3-text-red">$695.00</b></p>
      </div>
    </div>

    <div class="w3-col l3 s6">
      <div class="w3-container">
        <div class="w3-display-container">
          <img src="img/watches/movado7.png" style="width:100%">
          <div class="w3-display-middle w3-display-hover">
            <button class="w3-button w3-black" style="position: relative; top: 70px;">Add To Cart <i class="fa fa-shopping-cart"></i></button>
          </div>
        </div>
        <p style="text-align: center;">MOVADO BOLD CERAMIC<br><b class="w3-text-red">$595.00</b></p>
      </div>
     <div class="w3-container">
        <div class="w3-display-container">
          <img src="img/watches/movado3.png" style="width:100%">
          <div class="w3-display-middle w3-display-hover">
            <button class="w3-button w3-black" style="position: relative; top: 70px;">Add To Cart <i class="fa fa-shopping-cart"></i></button>
          </div>
        </div>
        <p style="text-align: center;">MODERN 47<br><b class="w3-text-red">$695.00</b></p>
      </div>
    </div>

    <div class="w3-col l3 s6">
      <div class="w3-container">
        <div class="w3-display-container">
          <img src="img/watches/movado8.png" style="width:100%">
          <div class="w3-display-middle w3-display-hover">
            <button class="w3-button w3-black" style="position: relative; top: 70px;">Add To Cart <i class="fa fa-shopping-cart"></i></button>
          </div>
        </div>
        <p style="text-align: center;">MOVADO BOLD CERAMIC<br><b class="w3-text-red">$695.00</b></p>
      </div>
      <div class="w3-container">
        <div class="w3-display-container">
          <img src="img/watches/movado4.png" style="width:100%">
          <div class="w3-display-middle w3-display-hover">
            <button class="w3-button w3-black" style="position: relative; top: 70px;">Add To Cart <i class="fa fa-shopping-cart"></i></button>
          </div>
        </div>
        <p style="text-align: center;">MODERN 47<br><b class="w3-text-red">$695.00</b></p>
      </div>
    </div>

    <div class="w3-col l3 s6">
      <div class="w3-container">
        <div class="w3-display-container">
          <img src="img/watches/movado5.png" style="width:100%">
          <span class="w3-tag w3-display-topleft">New</span>
          <div class="w3-display-middle w3-display-hover">
            <button class="w3-button w3-black" style="position: relative; top: 70px;">Add To Cart <i class="fa fa-shopping-cart"></i></button>
          </div>
        </div>
        <p style="text-align: center;">MOVADO BOLD VERSO<br><b class="w3-text-red">$595.00</b></p>
      </div>
      <div class="w3-container">
        <div class="w3-display-container">
          <img src="img/watches/movado6.png" style="width:100%">
          <span class="w3-tag w3-display-topleft">New</span>
          <div class="w3-display-middle w3-display-hover">
            <button class="w3-button w3-black" style="position: relative; top: 70px;">Add To Cart <i class="fa fa-shopping-cart"></i></button>
          </div>
        </div>
        <p style="text-align: center;">MUSEUM SPORT<br><b class="w3-text-red">$995.00</b></p>
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
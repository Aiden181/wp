<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Zael</title>

  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <link id='stylecss' type="text/css" rel="stylesheet" href="css/style.php" media="screen">

  <!-- Bootstrap -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  <!-- Parallax.js -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/parallax.js/1.4.2/parallax.min.js"></script>
</head>

<body>
  <?php
    include('includes/header.php');
  ?>

  <div class="parallax" data-parallax="scroll" data-image-src="img/petite-banner-2800x850.jpg">
    <div class="parallax-text-container">
      <h1>PETITE COLLECTION</h1>
    </div>
  </div>

  <br>
  <br>
  <br>
  
  <div id="carouselContainer">
    <h1>NEW 2020 ARRIVALS</h1>
    <!-- Carousel -->
    <div id="newArrivalCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#newArrivalCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#newArrivalCarousel" data-slide-to="1"></li>
        <li data-target="#newArrivalCarousel" data-slide-to="2"></li>
      </ol>

      <!-- Wrapper for slides -->
      <div class="carousel-inner">
        <div class="item active">
          <img src="img/banner.jpg" alt="Banner">
          <div class="w3-display-topleft w3-text-white" style="padding: 24px 48px">
            <p><a href="sevenfriday.php" class="w3-button w3-black w3-padding-large w3-large shopnow-btn-left">SHOP NOW</a></p>
          </div>
        </div>

        <div class="item">
          <img src="img/banner1.png" alt="Banner1">
          <div class="w3-display-topleft w3-text-white" style="padding: 24px 48px">
            <a href="movado.php" class="w3-button w3-black w3-padding-large w3-large shopnow-btn-right">SHOP NOW</a>
          </div>
        </div>

        <div class="item">
          <img src="img/banner2.png" alt="Banner2">
          <div class="w3-display-topleft w3-text-white" style="padding: 24px 48px">
            <p><a href="mvmt.php" class="w3-button w3-black w3-padding-large w3-large shopnow-btn-left">SHOP NOW</a>
            </p>
          </div>
        </div>
      </div>

      <!-- Left and right controls -->
      <a class="left carousel-control" href="#newArrivalCarousel" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#newArrivalCarousel" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
  </div>

  <br>
  <br>
  <br>

  <h1 class="watch-showcase-container">FEATURED WATCHES</h1>
  <br>

  <div class="w3-row home-watch-showcase-container">
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
          <img src="img/watches/mvmt3.jpg" style="width:100%">
          <div class="w3-display-middle w3-display-hover">
            <button class="w3-button w3-black" style="position: relative; top: 70px;">Add To Cart <i class="fa fa-shopping-cart"></i></button>
          </div>
        </div>
        <p style="text-align: center;">CLASSIC BLACK ROSE<br><b class="w3-text-red">$110.00</b></p>
      </div>
    </div>

    <div class="w3-col l3 s6">
      <div class="w3-container">
        <div class="w3-display-container">
          <img src="img/watches/movado2.png" style="width:100%">
          <span class="w3-tag w3-display-topleft">New</span>
          <div class="w3-display-middle w3-display-hover">
            <button class="w3-button w3-black" style="position: relative; top: 60px;">Add To Cart <i class="fa fa-shopping-cart"></i></button>
          </div>
        </div>
        <p style="text-align: center;">MODERN 47<br><b class="w3-text-red">$695.00</b></p>
      </div>
     <div class="w3-container">
        <div class="w3-display-container">
          <img src="img/watches/dw7.jpg" style="width:100%">
          <div class="w3-display-middle w3-display-hover">
            <button class="w3-button w3-black" style="position: relative; top: 60px;">Add To Cart <i class="fa fa-shopping-cart"></i></button>
          </div>
        </div>
        <p style="text-align: center;">PETITE BRISTOL<br><b class="w3-text-red">$179.00</b></p>
      </div>
    </div>

    <div class="w3-col l3 s6">
      <div class="w3-container">
        <div class="w3-display-container">
          <img src="img/watches/dw6.jpg" style="width:100%">
          <div class="w3-display-middle w3-display-hover">
            <button class="w3-button w3-black" style="position: relative; top: 60px;">Add To Cart <i class="fa fa-shopping-cart"></i></button>
          </div>
        </div>
        <p style="text-align: center;">PETITE DURHAM<br><b class="w3-text-red">$179.00</b></p>
      </div>
      <div class="w3-container">
        <div class="w3-display-container">
          <img src="img/watches/movado4.png" style="width:100%">
          <div class="w3-display-middle w3-display-hover">
            <button class="w3-button w3-black" style="position: relative; top: 60px;">Add To Cart <i class="fa fa-shopping-cart"></i></button>
          </div>
        </div>
        <p style="text-align: center;">MODERN 47<br><b class="w3-text-red">$695.00</b></p>
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
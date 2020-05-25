<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Zael</title>

  <!-- website icon -->
  <link rel="icon" href="img/favicon.png">

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

  <?php
  include('includes/tools.php');
  if (!isset($_SESSION['User'])) {
    $loginIconLink = "login.php";
  } else {
    $loginIconLink = "admin/index.php";
  }
  ?>
  
  <!-- css code for parallax effect on this page only -->
  <style>
    .highlightNav {
      background-color: rgba(238, 238, 238, 0.7);
    }
    .navbar-text {
      color: #eeeeee;
    }
    .dark-text-color {
      color: #1e1e1e;
    }
    #zael-logo-home {
      display: block;
      margin-left: auto;
      margin-right: auto;
      z-index: 1;
    }
  </style>
</head>

<body>
  <div class="parallax" data-parallax="scroll" data-image-src="img/classic-collection-banner_2800x850px.jpg">
      <div class="parallax-text-container">
          <h1 style="position: relative; bottom: 55px">CLASSIC COLLECTION</h1>
      </div>
  </div>
  <img id="zael-logo-home" src="img/Bold_Black_and_Yellow_Logo.png" alt="Zael logo">

  <!-- Top header -->
  <div class="header w3-xlarge w3-top">
      <nav class="navbar navbar-expand-sm bg-light justify-content-center container-fluid navigation-bar" id="navigation_bar">
          <ul class="nav navbar-nav">
              <li class="active"><a href="index.php" class="navbar-text">Home</a></li>
              <li class="dropdown">
                  <a class="dropdown-toggle navbar-text" data-toggle="dropdown" href="#"
                  onclick="displayCategories()">Explore
                  <span class="caret"></span></a>
                  <ul class="menu-categories" id="categories" style="position: absolute; top: 65px; left: 0">
                      <li><a href="sevenfriday.php">SevenFriday</a></li>
                      <li><a href="movado.php">Movado</a></li>
                      <li><a href="dw.php">Daniel Wellington</a></li>
                      <li><a href="mvmt.php">MVMT</a></li>
                  </ul>
              </li>
              <li><a href="aboutus.php" class="navbar-text">About Us</a></li>
              <li><a href="contact.php" class="navbar-text">Contact</a></li>
          </ul>
      </nav>

      <div class="w3-display-container" id="icons-container" style="position: fixed; top: 20px;">
          <!-- Search icon and search bar-->
          <div>
              <i id="search-btn" class="fa fa-search icons navbar-text"></i>
              <input class="search-box" type="text" placeholder="Search">

              <!-- Login icon -->
              <a  href="<?php echo $loginIconLink ?>"><i class="fa fa-user icons navbar-text"></i></a>
              
              <!-- Shopping cart icon -->
              <a href="shoppingcart.php"><i class="fa fa-shopping-cart icons navbar-text"></i></a>
          </div>
      </div>
      <!-- Search box -->
  </div>

  <!-- Overlay effect when opening sidebar on small screens -->
  <div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu"
  id="myOverlay"></div>

  <!-- !START OF PAGE CONTENT! -->
  <div class="w3-main">

      <!-- Push down content on small screens -->
      <div class="w3-hide-large" style="margin-top:83px"></div>

        <br>
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

        <h1 class="watch-showcase-container" style="position: relative; left: 35px">FEATURED WATCHES</h1>
        
        <br>

        <div class="w3-row watch-showcase-container">
          <div class="w3-col l3 s6">
            <div class="w3-container">
              <div class="w3-display-container">
                <a href=products/movado2.php><img src="img/watches/movado2.png" style="width:100%"></a>
                <span class="w3-tag w3-display-topleft">New</span>
                <?php
                  echo "            <form action=\"$currentPage\" method=\"GET\" class=\"w3-display-hover\" style=\"position: absolute; top: 75%; left: 25%;\">\n";
                  echo "              <button class=\"w3-button w3-black add-to-cart\" name='item' onclick=\"this.form.submit()\" value=\"MODERN 47\">Add To Cart <i class=\"fa fa-shopping-cart\"></i></button>\n";
                  echo "            </form>\n";
                ?>
              </div>
              <p style="text-align: center;">MODERN 47<br><b class="w3-text-red">$695.00</b></p>
            </div>
          </div>

          <div class="w3-col l3 s6">
            <div class="w3-container">
              <div class="w3-display-container">
                <a href=products/sevenfriday3.php><img src="img/watches/sevenfriday3.png" style="width:100%"></a>
                <span class="w3-tag w3-display-topleft">New</span>
                <?php
                  echo "            <form action=\"$currentPage\" method=\"GET\" class=\"w3-display-hover\" style=\"position: absolute; top: 75%; left: 25%;\">\n";
                  echo "              <button class=\"w3-button w3-black add-to-cart\" name='item' onclick=\"this.form.submit()\" value=\"M3/04 - PINKY\">Add To Cart <i class=\"fa fa-shopping-cart\"></i></button>\n";
                  echo "            </form>\n";
                ?>
              </div>
              <p style="text-align: center;">M3/04 - PINKY<br><b class="w3-text-red">$1,750.00</b></p>
            </div>
          </div>

          <div class="w3-col l3 s6">
            <div class="w3-container">
              <div class="w3-display-container">
                <a href=products/sevenfriday1.php><img src="img/watches/sevenfriday1.png" style="width:100%"></a>
                <?php
                  echo "            <form action=\"$currentPage\" method=\"GET\" class=\"w3-display-hover\" style=\"position: absolute; top: 75%; left: 25%;\">\n";
                  echo "              <button class=\"w3-button w3-black add-to-cart\" name='item' onclick=\"this.form.submit()\" value=\"P3B/06 RACING TEAM RED\">Add To Cart <i class=\"fa fa-shopping-cart\"></i></button>\n";
                  echo "            </form>\n";
                ?>
              </div>
              <p style="text-align: center;">P3B/06 RACING TEAM RED<br><b class="w3-text-red">$1,150.00</b></p>
            </div>
          </div>

          <div class="w3-col l3 s6">
            <div class="w3-container">
              <div class="w3-display-container">
                <a href=products/mvmt3.php><img src="img/watches/mvmt3.png" style="width:100%"></a>
                <?php
                  echo "            <form action=\"$currentPage\" method=\"GET\" class=\"w3-display-hover\" style=\"position: absolute; top: 75%; left: 25%;\">\n";
                  echo "              <button class=\"w3-button w3-black add-to-cart\" name='item' onclick=\"this.form.submit()\" value=\"CLASSIC BLACK ROSE\">Add To Cart <i class=\"fa fa-shopping-cart\"></i></button>\n";
                  echo "            </form>\n";
                ?>
              </div>
              <p style="text-align: center;">CLASSIC BLACK ROSE<br><b class="w3-text-red">$110.00</b></p>
            </div>
          </div>
          
          <div class="w3-col l3 s6">
          <div class="w3-container">
              <div class="w3-display-container">
                <a href=products/dw7.php><img src="img/watches/dw7.png" style="width:100%"></a>
                <?php
                  echo "            <form action=\"$currentPage\" method=\"GET\" class=\"w3-display-hover\" style=\"position: absolute; top: 75%; left: 25%;\">\n";
                  echo "              <button class=\"w3-button w3-black add-to-cart\" name='item' onclick=\"this.form.submit()\" value=\"CLASSIC CAMBRIDGE\">Add To Cart <i class=\"fa fa-shopping-cart\"></i></button>\n";
                  echo "            </form>\n";
                ?>
              </div>
              <p style="text-align: center;">CLASSIC CAMBRIDGE<br><b class="w3-text-red">$199.00</b></p>
            </div>
          </div>

          <div class="w3-col l3 s6">
            <div class="w3-container">
              <div class="w3-display-container">
                <a href=products/dw6.php><img src="img/watches/dw6.png" style="width:100%"></a>
                <?php
                  echo "            <form action=\"$currentPage\" method=\"GET\" class=\"w3-display-hover\" style=\"position: absolute; top: 75%; left: 25%;\">\n";
                  echo "              <button class=\"w3-button w3-black add-to-cart\" name='item' onclick=\"this.form.submit()\" value=\"CLASSIC GLASGOW\">Add To Cart <i class=\"fa fa-shopping-cart\"></i></button>\n";
                  echo "            </form>\n";
                ?>
              </div>
              <p style="text-align: center;">CLASSIC GLASGOW<br><b class="w3-text-red">$199.00</b></p>
            </div>
          </div>

          <div class="w3-col l3 s6">
            <div class="w3-container">
              <div class="w3-display-container">
                <a href=products/movado4.php><img src="img/watches/movado4.png" style="width:100%"></a>
                <?php
                  echo "            <form action=\"$currentPage\" method=\"GET\" class=\"w3-display-hover\" style=\"position: absolute; top: 75%; left: 25%;\">\n";
                  echo "              <button class=\"w3-button w3-black add-to-cart\" name='item' onclick=\"this.form.submit()\" value=\"MOVADO ULTRA SLIM\">Add To Cart <i class=\"fa fa-shopping-cart\"></i></button>\n";
                  echo "            </form>\n";
                ?>
              </div>
              <p style="text-align: center;">MOVADO ULTRA SLIM<br><b class="w3-text-red">$895.00</b></p>
            </div>
          </div>
          
          <div class="w3-col l3 s6">
            <div class="w3-container">
              <div class="w3-display-container">
                <a href=products/sevenfriday7.php><img src="img/watches/sevenfriday7.png" style="width:100%"></a>
                <?php
                  echo "            <form action=\"$currentPage\" method=\"GET\" class=\"w3-display-hover\" style=\"position: absolute; top: 75%; left: 25%;\">\n";
                  echo "              <button class=\"w3-button w3-black add-to-cart\" name='item' onclick=\"this.form.submit()\" value=\"M2/02\">Add To Cart <i class=\"fa fa-shopping-cart\"></i></button>\n";
                  echo "            </form>\n";
                ?>
              </div>
              <p style="text-align: center;">M2/02<br><b class="w3-text-red">$1,474.00</b></p>
            </div>
          </div>
        </div>

        <div id="blankspace"></div>

  <?php
    include('includes/footer.php');
  ?>

  <!-- script for parallax effect on this page only -->
  <script>
    window.addEventListener('scroll', highlightNavBar);

    // Get the navbar and cinemax logo on top
    var navBar = document.getElementById("navigation_bar");

    // Get the offset position of the navbar
    var highlight = navBar.offsetTop;

    // Add the highlightNav class to the navbar when you reach its scroll position. Remove "highlightNav" when you leave the scroll position
    function highlightNavBar() {
      if (window.pageYOffset >= highlight + 600) {
        navBar.classList.add("highlightNav");

        var elements = document.getElementsByClassName("navbar-text");
        for (var i = 0; i < elements.length; i++) {
          elements[i].classList.add("dark-text-color");
        }
        elements = document.getElementsByClassName("icons");
        for (var i = 0; i < elements.length; i++) {
          elements[i].classList.remove("navbar-text");
        }
      } else {
        navBar.classList.remove("highlightNav");

        var elements = document.getElementsByClassName("navbar-text");
        for (var i = 0; i < elements.length; i++) {
          elements[i].classList.remove("dark-text-color");
        }
        elements = document.getElementsByClassName("icons");
        for (var i = 0; i < elements.length; i++) {
          elements[i].classList.add("navbar-text");
        }
      }
    }
  </script>
</body>
</html>
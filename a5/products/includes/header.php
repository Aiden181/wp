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

    <title><?php echo $name ?></title>

    <!-- website icon -->
    <link rel="icon" href="../img/favicon.png">
</head>
<body>
    <?php
        include('../includes/tools.php');

        if (!isset($_SESSION['User'])) {
            $loginIconLink = "../login.php";
        } else {
            $loginIconLink = "../admin/index.php";
        }
    ?>
    
    <div class="w3-display-topmiddle" style="z-index: 1;">
        <a href=../index.php><img id="zael-logo" src="../img/Bold_Black_and_Yellow_Logo.png" alt="Zael logo"></a>
    </div>

    <!-- Top header -->
    <div class="header w3-xlarge">
        <nav class="navbar navbar-expand-sm bg-light justify-content-center container-fluid navigation-bar">
            <ul class="nav navbar-nav">
                <li class="active"><a href="../index.php" style="color: #1e1e1e;">Home</a></li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" style="color: #1e1e1e;"
                    onclick="displayCategories()">Explore
                    <span class="caret"></span></a>
                    <ul class="menu-categories" id="categories">
                        <li><a href="../sevenfriday.php">SevenFriday</a></li>
                        <li><a href="../movado.php">Movado</a></li>
                        <li><a href="../dw.php">Daniel Wellington</a></li>
                        <li><a href="../mvmt.php">MVMT</a></li>
                    </ul>
                </li>
                <li><a href="../aboutus.php" style="color: #1e1e1e;">About Us</a></li>
                <li><a href="../contact.php" style="color: #1e1e1e;">Contact</a></li>
            </ul>
        </nav>

        <div class="w3-display-container" id="icons-container">
            <!-- Search icon and search bar-->
            <div>
                <i id="search-btn" class="fa fa-search"></i>
                <input class="search-box" type="text" placeholder="Search">

                <!-- Login icon -->
                <a href="<?php echo $loginIconLink ?>"><i class="fa fa-user"></i></a>
                
                <!-- Shopping cart icon -->
                <a href="../shoppingcart.php"><i class="fa fa-shopping-cart"></i></a>
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

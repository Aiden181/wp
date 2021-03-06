<?php include('tools.php'); ?>
    
    <div class="w3-display-topmiddle" style="z-index: 1;">
        <a href="index.php"><img id="zael-logo" src="img/Bold_Black_and_Yellow_Logo.png" alt="Zael logo"></a>
    </div>

    <!-- Top header -->
    <div class="header w3-xlarge">
        <nav class="navbar navbar-expand-sm bg-light justify-content-center container-fluid navigation-bar">
            <ul class="nav navbar-nav">
                <li class="active"><a href="index.php" style="color: #1e1e1e;">Home</a></li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" style="color: #1e1e1e;"
                    onclick="displayCategories()">Explore
                    <span class="caret"></span></a>
                    <ul class="menu-categories" id="categories">
                        <li><a href="sevenfriday.php">SevenFriday</a></li>
                        <li><a href="movado.php">Movado</a></li>
                        <li><a href="dw.php">Daniel Wellington</a></li>
                        <li><a href="mvmt.php">MVMT</a></li>
                    </ul>
                </li>
                <li><a href="aboutus.php" style="color: #1e1e1e;">About Us</a></li>
                <li><a href="contact.php" style="color: #1e1e1e;">Contact</a></li>
            </ul>
        </nav>

        <div class="w3-display-container" id="icons-container">
            <!-- Search icon and search bar-->
            <div>
                <form method="get" action="search.php">
                    <!-- Search box -->
                    <i id="search-btn" class="fa icons fa-search"></i>
                    <input class="search-box" type="text" name="search" placeholder="Search">

                    <!-- Login icon -->
                    <?php 
                        if (!isset($_SESSION['User'])) {
                            $loginIconLink = "login.php";
                            echo "<a href='login.php'><i class='fa fa-user'></i></a>";
                        } else {
                            $loginIconLink = "admin/index.php";
                            echo "<a href='admin/index.php'><i class='fa fa-user-circle-o'></i></a>";
                        }
                    ?>
                    
                    <!-- Shopping cart icon -->
                    <a href="shoppingcart.php"><i class="fa fa-shopping-cart"></i></a>
                </form>
            </div>
        </div>
    </div>

    <!-- Overlay effect when opening sidebar on small screens -->
    <div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu"
    id="myOverlay"></div>

    <!-- !START OF PAGE CONTENT! -->
    <div class="w3-main">

        <!-- Push down content on small screens -->
        <div class="w3-hide-large" style="margin-top:83px"></div>

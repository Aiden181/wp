<!DOCTYPE html>
<html lang="en">
    <!-- Sidebar/menu -->
    <nav class="w3-sidebar w3-bar-block w3-white w3-collapse w3-top" style="z-index:3;width:250px;" id="mySidebar">
    <div class="w3-container w3-display-container w3-padding-16">
        <i onclick="w3_close()" class="fa fa-remove w3-hide-large w3-button w3-display-topright"></i>
        <a href="index.php"><img id="zael-logo" src="img/Bold_Black_and_Yellow_Logo.png" alt="" style="width: 60%;"></a>
    </div>
    </nav>

    <!-- Overlay effect when opening sidebar on small screens -->
    <div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu"
    id="myOverlay"></div>

    <!-- !PAGE CONTENT! -->
    <div class="w3-main" style="margin-left:250px">

    <!-- Push down content on small screens -->
    <div class="w3-hide-large" style="margin-top:83px"></div>

    <!-- Top header -->
    <div class="header w3-container w3-xlarge">
        <nav class="navbar navbar-expand-sm bg-light justify-content-left container-fluid" id="navigation-bar">
        <div class="container-fluid" id="navigation-bar">
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
        </div>
        </nav>
        <div id="search-btn" onclick="displaySearchBar()">
        <i class="fa fa-search"></i>
        </div>
        <input class="search-box" type="text" placeholder="Search">
        
        <div id="login-btn">
        <a href="loginpage.php"><i class="fa fa-user w3-margin-right"></i></a>
        </div>
        <div id="cart">
        <a href="shoppingcart.php"><i class="fa fa-shopping-cart w3-margin-left"></i></a>
        </div>
    </div>
</html>
<?php
    session_start();

    // if $_SESSION (i.e. shopping cart is empty)
    if (empty($_SESSION)) {
        // redirect to index.php
        header("Location: index.php");
        die();
    }

    //////////////////////////////////
    // init arrays and their values //
    //////////////////////////////////
    // personal info var
    $customer = array( "name", "email", "mobile", "card", "expiry");
    // movie info var
    $movie = array( "id", "day", "hour");
    // seats info var
    $seats = array("STA", "STP", "STC", "FCA", "FCP", "FCC");


    /////////////////////////////////////////////
    // assign $_SESSION values to array values //
    /////////////////////////////////////////////
    // personal info var
    if(isset($_SESSION["cart"]["cust"]["name"])) {
        $customer["name"] = $_SESSION["cart"]["cust"]["name"];
    }
    if(isset($_SESSION["cart"]["cust"]["email"])) {
        $customer["email"] = $_SESSION["cart"]["cust"]["email"];
    }
    if(isset($_SESSION["cart"]["cust"]["mobile"])) {
        $customer["mobile"] = $_SESSION["cart"]["cust"]["mobile"];
    }

    // movie info var
    if(isset($_SESSION["cart"]["movie"]["id"])) {
        $movieID = $_SESSION["cart"]["movie"]["id"];
    }
    if(isset($_SESSION["cart"]["movie"]["day"])) {
        $movieDate = $_SESSION["cart"]["movie"]["day"];
    }
    if(isset($_SESSION["cart"]["movie"]["hour"])) {
        $movieHour = $_SESSION["cart"]["movie"]["hour"];
    }

    // seats info var
    if(isset($_SESSION["cart"]["seats"]["STA"])) {
        $seatSTA = $_SESSION["cart"]["seats"]["STA"];
    }
    if(isset($_SESSION["cart"]["seats"]["STP"])) {
        $seatSTP = $_SESSION["cart"]["seats"]["STP"];
    }
    if(isset($_SESSION["cart"]["seats"]["STC"])) {
        $seatSTC = $_SESSION["cart"]["seats"]["STC"];
    }
    if(isset($_SESSION["cart"]["seats"]["FCA"])) {
        $seatFCA = $_SESSION["cart"]["seats"]["FCA"];
    }
    if(isset($_SESSION["cart"]["seats"]["FCP"])) {
        $seatFCP = $_SESSION["cart"]["seats"]["FCP"];
    }
    if(isset($_SESSION["cart"]["seats"]["FCC"])) {
        $seatFCC = $_SESSION["cart"]["seats"]["FCC"];
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Receipt</title>

    <!-- add your styling css file link here -->
</head>
<body>
    <!-- format the page here -->

    
    <?php
    ///////////////////
    // DEBUG SECTION //
    ///////////////////
    echo "</br>";
    echo '$_SESSION array (for debug)';
    preShow($_SESSION);

    function preShow( $arr, $returnAsString=false ) {
        $ret  = '<pre>' . print_r($arr, true) . '</pre>';
        if ($returnAsString)
            return $ret;
        else
            echo $ret; 
    }
    ?>
</body>
</html>
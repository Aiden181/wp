<?php
    session_start();

    // if $_SESSION (i.e. shopping cart is empty)
    if (empty($_SESSION)) {
        // redirect to index.php
        header("Location: index.php");
        exit();
    }

    //////////////////////////////////
    // init arrays and their values //
    //////////////////////////////////
    // customer info var
    $customer = array( "name", "email", "mobile", "card", "expiry");
    // movie info var
    $movieInfo = array( "id", "day", "hour");
    // seats info var
    $seatCount = array("STA", "STP", "STC", "FCA", "FCP", "FCC");


    /////////////////////////////////////////////
    // assign $_SESSION values to array values //
    /////////////////////////////////////////////
    // set customer info value
    if(isset($_SESSION["cart"]["cust"]["name"])) {
        $customer["name"] = $_SESSION["cart"]["cust"]["name"];
    }
    if(isset($_SESSION["cart"]["cust"]["email"])) {
        $customer["email"] = $_SESSION["cart"]["cust"]["email"];
    }
    if(isset($_SESSION["cart"]["cust"]["mobile"])) {
        $customer["mobile"] = $_SESSION["cart"]["cust"]["mobile"];
    }

    // set movie info values
    if(isset($_SESSION["cart"]["movie"]["id"])) {
        $movieInfo["id"] = $_SESSION["cart"]["movie"]["id"];
    }
    if(isset($_SESSION["cart"]["movie"]["day"])) {
        $movieInfo["day"] = $_SESSION["cart"]["movie"]["day"];
    }
    if(isset($_SESSION["cart"]["movie"]["hour"])) {
        $movieInfo["hour"] = $_SESSION["cart"]["movie"]["hour"];
    }

    // set seat count values
    if(isset($_SESSION["cart"]["seats"]["STA"])) {
        $seatCount["STA"] = $_SESSION["cart"]["seats"]["STA"];
    }
    if(isset($_SESSION["cart"]["seats"]["STP"])) {
        $seatCount["STP"] = $_SESSION["cart"]["seats"]["STP"];
    }
    if(isset($_SESSION["cart"]["seats"]["STC"])) {
        $seatCount["STC"] = $_SESSION["cart"]["seats"]["STC"];
    }
    if(isset($_SESSION["cart"]["seats"]["FCA"])) {
        $seatCount["FCA"] = $_SESSION["cart"]["seats"]["FCA"];
    }
    if(isset($_SESSION["cart"]["seats"]["FCP"])) {
        $seatCount["FCP"] = $_SESSION["cart"]["seats"]["FCP"];
    }
    if(isset($_SESSION["cart"]["seats"]["FCC"])) {
        $seatCount["FCC"] = $_SESSION["cart"]["seats"]["FCC"];
    }

    ///////////////////////////////////////////////////////////////
    // This function calculates gst and total price of the order //
    ///////////////////////////////////////////////////////////////
    
    // make variable for GST and total price
    $GST = 0;
    $totalPriceBeforeGST = 0;
    $totalPriceAfterGST = 0;
    // calculate gst and total price function
    function countTotal() {
        // get access to global variables
        global $GST;
        global $totalPriceBeforeGST;
        global $totalPriceAfterGST;
        global $seatCount;
        
        // prices of each option
        $STA = 20;
        $STP = 15;
        $STC = 12;
        $FCA = 30;
        $FCP = 26;
        $FCC = 22;

        // init total selection price variable
        $STAprice = $STPtotal = $STCtotal = $FCAtotal = $FCPtotal = $FCCtotal = 0;
    
        // get the amount of each option and multiply by price
        if(isset($_SESSION["cart"]["seats"]["STA"]) && is_numeric($_SESSION["cart"]["seats"]["STA"]))
            $STAtotal = $seatCount["STA"] * $STA;
        if(isset($_SESSION["cart"]["seats"]["STP"]) && is_numeric($_SESSION["cart"]["seats"]["STP"]))
            $STPtotal = $seatCount["STP"] * $STP;
        if(isset($_SESSION["cart"]["seats"]["STC"]) && is_numeric($_SESSION["cart"]["seats"]["STC"]))
            $STCtotal = $seatCount["STC"] * $STC;
        if(isset($_SESSION["cart"]["seats"]["FCA"]) && is_numeric($_SESSION["cart"]["seats"]["FCA"]))
            $FCAtotal = $seatCount["FCA"] * $FCA;
        if(isset($_SESSION["cart"]["seats"]["FCP"]) && is_numeric($_SESSION["cart"]["seats"]["FCP"]))
            $FCPtotal = $seatCount["FCP"] * $FCP;
        if(isset($_SESSION["cart"]["seats"]["FCC"]) && is_numeric($_SESSION["cart"]["seats"]["FCC"]))
            $FCCtotal = $seatCount["FCC"] * $FCC;
    
        // add up the total price
        $totalPriceBeforeGST = $STAtotal + $STPtotal + $STCtotal + $FCAtotal + $FCPtotal + $FCCtotal;
    
        // Discount on Weekdays at 12:00
        // get current day of the week
        $currentDay = date("w");
        // get current hour
        $currentHour = date("H");
    
        // hour is 12 and not on saturday and sunday, give discount
        if ($currentHour == 12 && $currentDay != 0 && $currentDay != 6) {
            $totalPrice -= $totalPrice/11;
        }
        $GST = $totalPriceBeforeGST/11;
        $totalPriceAfterGST = $totalPriceBeforeGST + round($GST,2);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Receipt</title>

    <link id='stylecss' type="text/css" rel="stylesheet" href="receiptstyle.php">
    <!-- add your styling css file link here -->
</head>
<body>
    <!-- format the page here --> 
    <h1>Receipt</h1>
    <?php
    $abnNumber = '00 123 456 789';
    echo "ABN Number: " . $abnNumber;
    echo "</br>";
    ?>
    <!-- PRICE PRINT OUT EXAMPLE-->
    <?php
        countTotal();
        echo "Total price before GST: $totalPriceBeforeGST </br>";
        echo "GST: ". round($GST,2) . "</br>";
        echo "Total price after GST: $totalPriceAfterGST </br>";
    ?>
    
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
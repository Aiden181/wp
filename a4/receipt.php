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
    <link href="https://fonts.googleapis.com/css2?family=Petrona&display=swap" rel="stylesheet">
    <!-- add your styling css file link here -->
</head>
<body>
    <!-- format the page here --> 
    <!-- PRICE PRINT OUT EXAMPLE-->
    <div class="invoice-box">
        <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="2">
                    <table>
                        <tr>
                            <td class="title">
                            <img id="cinemax_logo" src="https://www.cinemax.com/images/logos/cinemax-logo-white_filled__02-10-17.svg"
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            
            <tr class="information">
                <td colspan="2">
                    <table>
                        <tr>
                            <td>
                                <div><?php echo "Name: " . $customer["name"] ?></div>
                                <div><?php echo "Email: " . $customer["email"] ?></div>
                                <div><?php echo "Mobile: " . $customer["mobile"] ?></div>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            
            <tr class="heading">
                <td>
                    Movie Information
                </td>
                
                <td>
                    Value
                </td>
            </tr>
            
            <tr class="details">
                <td>
                    Movie ID <br>
                    Movie Day <br>
                    Movie Hour <br>
                </td>
                
                <td>
                    <div><?php echo $movieInfo["id"] ?></div> 
                    <div><?php echo $movieInfo["day"] ?></div> 
                    <div><?php echo $movieInfo["hour"] ?></div>
                </td>
            </tr>
            
            <tr class="heading">
                <td>
                    Seats Selected
                </td>
                
                <td>
                    Quantity
                </td>
            </tr>
            
            <tr class="information">
                <td colspan="2">
                    <table>
                        <tr>
                            <td>
                                STA Seat <br>
                                STP Seat <br>
                                STC Seat <br>
                                FCA Seat <br>
                                FCP Seat <br>
                                FCC Seat <br>
                            </td>

                            <td>
                                <div><?php echo $seatCount["STA"] ?></div>
                                <div><?php echo $seatCount["STP"] ?></div>
                                <div><?php echo $seatCount["STC"] ?></div>
                                <div><?php echo $seatCount["FCA"] ?></div>
                                <div><?php echo $seatCount["FCP"] ?></div>
                                <div><?php echo $seatCount["FCC"] ?></div>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            
            <tr class="heading">
                <td>
                    Payment 
                </td>
                
                <td>
                    Value
                </td>
            </tr>

            <tr class="item">
                <td>
                    Sub Total
                </td>
                
                <td>
                    <?php countTotal() ?>
                    <div><?php echo " $" . $totalPriceBeforeGST ?></div>
                </td>
            </tr>
            
            <tr class="item last">
                <td>
                    GST
                </td>
                
                <td>
                    <div><?php echo " $" . round($GST,2)?></div>
                </td>
            </tr>
            
            <tr class="total">
                <td></td>
                
                <td>
                <div><?php echo "Final Price:" . " $" . $totalPriceAfterGST . "</br>" ?></div>
                </td>
            </tr>
        </table>
    </div>
</body>

    
    
    <?php
    ///////////////////
    // DEBUG SECTION //
    ///////////////////
    // echo "</br>";
    // echo '$_SESSION array (for debug)';
    // preShow($_SESSION);

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
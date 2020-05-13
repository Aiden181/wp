<?php
    session_start();

    // if $_SESSION is empty)
    if (empty($_SESSION)) {
        // redirect to receipt.php
        header("Location: receipt.php");
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
    $seatCount = array("STA" => 0, "STP" => 0, "STC" => 0, "FCA" => 0, "FCP" => 0, "FCC" => 0);


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
    if(isset($_SESSION["cart"]["seats"]["STA"]) && is_numeric($_SESSION["cart"]["seats"]["STA"])) {
        $seatCount["STA"] = $_SESSION["cart"]["seats"]["STA"];
    }
    if(isset($_SESSION["cart"]["seats"]["STP"]) && is_numeric($_SESSION["cart"]["seats"]["STP"])) {
        $seatCount["STP"] = $_SESSION["cart"]["seats"]["STP"];
    }
    if(isset($_SESSION["cart"]["seats"]["STC"]) && is_numeric($_SESSION["cart"]["seats"]["STC"])) {
        $seatCount["STC"] = $_SESSION["cart"]["seats"]["STC"];
    }
    if(isset($_SESSION["cart"]["seats"]["FCA"]) && is_numeric($_SESSION["cart"]["seats"]["FCA"])) {
        $seatCount["FCA"] = $_SESSION["cart"]["seats"]["FCA"];
    }
    if(isset($_SESSION["cart"]["seats"]["FCP"]) && is_numeric($_SESSION["cart"]["seats"]["FCP"])) {
        $seatCount["FCP"] = $_SESSION["cart"]["seats"]["FCP"];
    }
    if(isset($_SESSION["cart"]["seats"]["FCC"]) && is_numeric($_SESSION["cart"]["seats"]["FCC"])) {
        $seatCount["FCC"] = $_SESSION["cart"]["seats"]["FCC"];
    }

    // group ticket card height and bar code position
    $cardHeight = 140;
    $barcodeTopPos = 105;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticket</title>

    <link id='stylecss' type="text/css" rel="stylesheet" href="ticketstyle.php">
    <link href="https://fonts.googleapis.com/css2?family=Petrona&display=swap" rel="stylesheet">
</head>
<body>
    <?php
        // echo "<h2>Group ticket</h2>";
        generateGroupTickets();
        // echo "</br>";
        // echo "<h2>Individual ticket(s)</h2>";
        generateIndividualTickets();

        // this function generates a group/shared ticket (i.e. one for all 
        // seat holders in the booking that shows quantity of each seat)
        function generateGroupTickets() {
            // get access to arrays
            global $customer;
            global $movieInfo;
            global $seatCount;
            global $cardHeight;
            global $barcodeTopPos;
            
            echo "    <div class=\"cardWrapGroup\">\n";
            echo "        <div class=\"cardHeader\">\n";
            echo "            <h1><img id='cinemax_logo' src='cinemax-logo-white_filled__02-10-17.svg' alt='Cinemax logo'></h1>\n";
            echo "        </div>\n";
            echo "        <div class=\"cardBody\">\n";
            echo "            <div class=\"ticketInfo\">\n";
            echo "                <div class=\"title\">\n";
            echo "                    <span>movie</span>\n";
            echo "                    <h2>$movieInfo[id]</h2>\n";
            echo "                </div>\n";
            echo "                <div class=\"day\">\n";
            echo "                    <span>day</span>\n";
            echo "                    <h2>$movieInfo[day]</h2>\n";
            echo "                </div>\n";
            echo "                <div class=\"time\">\n";
            echo "                    <span>time</span>\n";
            echo "                    <h2>$movieInfo[hour]</h2>\n";
            echo "                </div>\n";
            echo "                <div class=\"name\">\n";
            echo "                    <span>name</span>\n";
            echo "                    <h2>$customer[name]</h2>\n";
            echo "                </div>\n";
            echo "                <div class=\"seatGroup\">\n";
            echo "                    <span>seat types</span>\n";
            foreach ($seatCount as $seatType => $seats) {
                if ($seats > 0) {
                    echo "                    <h2 id='seatGroupText'>" . getSeatType($seatType) . "($seats " . $word = ($seats > 1 ? 'seats' : 'seat') . ")</h2>\n";
                    // modify card height and bar code position
                    $cardHeight += 13;
                    $barcodeTopPos += 13;
                }
            }
            echo "                </div>\n";
            echo "            <div class=\"barcodeGroup\">\n";
            echo "            </div>\n";
            echo "        </div>\n";
            echo "    </div>\n";
        }

        // this function generates individual tickets for each seat holder (e.g. 3 first 
        // class adult tickets if 3 first class adult tickets have been purchased)
        function generateIndividualTickets() {
            // get access to arrays
            global $customer;
            global $movieInfo;
            global $seatCount;
            
            // get seat element by traversing through seats array
            foreach ($seatCount as $seatType => $seats) {
                // generate ticket for each seat
                for ($i = 0; $i < $seats; $i++) {
                    echo "    <div class=\"cardWrap\">\n";
                    echo "        <div class=\"card cardLeft\">\n";
                    echo "            <h1><img id='cinemax_logo' src='cinemax-logo-white_filled__02-10-17.svg' alt='Cinemax logo'></h1>\n";
                    echo "            <div class=\"ticketInfo\">\n";
                    echo "                <div class=\"title\">\n";
                    echo "                    <h2>$movieInfo[id]</h2>\n";
                    echo "                    <span>movie</span>\n";
                    echo "                </div>\n";
                    echo "                <div class=\"name\">\n";
                    echo "                    <h2>$customer[name]</h2>\n";
                    echo "                    <span>name</span>\n";
                    echo "                </div>\n";
                    echo "                <div class=\"day\">\n";
                    echo "                    <h2>$movieInfo[day]</h2>\n";
                    echo "                    <span>day</span>\n";
                    echo "                </div>\n";
                    echo "                <div class=\"time\">\n";
                    echo "                    <h2>$movieInfo[hour]</h2>\n";
                    echo "                    <span>time</span>\n";
                    echo "                </div>\n";
                    echo "            </div>\n";
                    echo "        </div>\n";
                    echo "        <div class=\"card cardRight\">\n";
                    echo "            <div class=\"popcorn\">\n";
                    echo "                <img src=\"popcorn.svg\" alt=\"Popcorn\">\n";
                    echo "            </div>\n";
                    echo "            <div class=\"seat ticketInfo\">\n";
                    echo "                <h3>$seatType</h3>\n";
                    echo "                <span>seat</span>\n";
                    echo "            </div>\n";
                    echo "            <div class=\"barcode\">\n";
                    echo "                <!-- <img src=\"https://loading.io/s/icon/hqqmq0.svg\" alt=\"\"> -->\n";
                    echo "            </div>\n";
                    echo "        </div>\n";
                    echo "    </div>\n";
                }
            }
        }

        // this function returns the full name of seat type from seat type ID
        function getSeatType($seatID) {
            if ($seatID === "STA") {
                return "Standard Seat Adult";
            } else if ($seatID === "STP") {
                return "Standard Seat Concession";
            } else if ($seatID === "STC") {
                return "Standard Seat Child";
            } else if ($seatID === "FCA") {
                return "First Class Adult";
            } else if ($seatID === "FCP") {
                return "First Class Concession";
            } else if ($seatID === "FCC") {
                return "First Class Child";
            }
        }
    ?>
</body>
</html>
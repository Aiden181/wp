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

</body>
</html>
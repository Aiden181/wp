<?php
  session_start();

  // Put your PHP functions and modules here

  //////////////////////////////////
  // init arrays and their values //
  //////////////////////////////////
  // personal info var
  $customer = array( "name", "email", "mobile", "card", "expiry");

  // error messages
  $nameErr = $emailErr = $mobileErr = $cardNumberErr = $cardExpiryErr = $movieErr = "";

  // valid or invalid personal info, movie details, and seats booleans
  $isNameValid = $isEmailValid = $isMobileValid = $isCardNumberValid = $isCardExpiryValid = $ismovieValid = $isSeatsSelected = false;


  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // validate customer name
    // if field is empty
    if (empty($_POST["cust"]["name"])) {
      $nameErr = "Name is required!";
    } else {
      // field not empty, check if data is not null 
      if (isset($_POST["cust"]["name"])) {
        $customer["name"] = test_input($_POST["cust"]["name"]);
        // not matching regex, format error message
        if (!preg_match("/^[a-zA-Z ]*$/", $customer["name"])) {
          $nameErr = "Please enter an appropriate name!";
        } else {  // name is valid, make boolean true
          $isNameValid = true;
        }
      }
    }

    // validate customer email
    // if field is empty
    if (empty($_POST["cust"]["email"])) {
      $emailErr = "Email is required!";
    } else {
      // field not empty, check if data is not null 
      if (isset($_POST["cust"]["email"])) {
        $customer["email"] = test_input($_POST["cust"]["email"]);
        // check if e-mail address is well-formed
        if (!filter_var($customer["email"], FILTER_VALIDATE_EMAIL)) {
          $emailErr = "Invalid email format!";
        } else {  // name is valid, make boolean true
          $isEmailValid = true;
        }
      }
    }

    // validate customer phone number
    // if field is empty
    if (empty($_POST["cust"]["mobile"])) {
      $mobileErr = "Phone number is required!";
    } else {
      // field not empty, check if data is not null 
      if (isset($_POST["cust"]["mobile"])) {
        $customer["mobile"] = test_input($_POST["cust"]["mobile"]);
        // not matching regex, format error message
        if (!preg_match("/^(?:\+?(61))? ?(?:\((?=.*\)))?(0?[2-57-8])\)? ?(\d\d(?:[- ](?=\d{3})|(?!\d\d[- ]?\d[- ]))\d\d[- ]?\d[- ]?\d{3})$/", $customer["mobile"])) {
          $mobileErr = "Please enter a valid phone number!";
        } else {  // name is valid, make boolean true
          $isMobileValid = true;
        }
      }
    }

    // validate customer credit card number
    // if field is empty
    if (empty($_POST["cust"]["card"])) {
      $cardNumberErr = "Credit card number is required!";
    } else {
      // field not empty, check if data is not null 
      if (isset($_POST["cust"]["card"])) {
        $customer["card"] = test_input($_POST["cust"]["card"]);
        // not matching regex, format error message
        if (!preg_match("/[0-9]{14,19}/", $customer["card"])) {
          $cardNumberErr = "Please enter a valid credit card number!";
        } else {  // name is valid, make boolean true
          $isCardNumberValid = true;
        }
      }
    }

    // validate customer credit card expiry date
    // if field is empty
    if (empty($_POST["cust"]["expiry"])) {
      $cardExpiryErr = "Credit card expiry date is required!";
    } else {
      // field not empty, check if data is not null 
      if (isset($_POST["cust"]["expiry"])) {
        $customer["expiry"] = test_input($_POST["cust"]["expiry"]);
        // if expiry date is less or equal than current month and year, format error message
        if ($customer["expiry"] <= date("Y-m")) {
          $cardExpiryErr = "Please enter a non-expired credit card!";
        } else {  // name is valid, make boolean true
          $isCardExpiryValid = true;
        }
      }
    }

    if (empty($_POST["movie"]["id"]) || empty($_POST["movie"]["day"]) || empty($_POST["movie"]["hour"])) {
      $movieErr = "STOP HACKING OUR WEBSITE!";
    } else {
      // field not empty, check if data is not null 
      if (isset($_POST["movie"]["id"])) {
          $ismovieValid = true;
      }
    }

    if (!isset($_POST['seats']['STA']) || !isset($_POST['seats']['STP']) || !isset($_POST['seats']['STC']) || !isset($_POST['seats']['FCA']) || !isset($_POST['seats']['FCP']) || !isset($_POST['seats']['FCC'])) {
      $movieErr = "STOP HACKING OUR WEBSITE!";  // set error message
    } else {
      $isSeatsSelected = true;
    }
    $isSeatsSelected = true;  // still testing and debugging so keep this

    // if all values are sanitised and validated
    if ($isNameValid && $isEmailValid && $isMobileValid && $isCardNumberValid && $isCardExpiryValid && $ismovieValid && $isSeatsSelected) {
      // add to session array (i.e. shopping cart)
      $_SESSION['cart'] = $_POST;


      // format array to log
      $info = array($_POST["movie"]["id"], $_POST["movie"]["day"] ,$_POST["movie"]["hour"], 
      $_POST["cust"]["name"], $_POST["cust"]["email"], $_POST["cust"]["mobile"], $_POST["cust"]["card"], 
      $_POST["cust"]["expiry"], $_POST["seats"]["STA"], $_POST["seats"]["STP"], $_POST["seats"]["STC"], 
      $_POST["seats"]["FCA"], $_POST["seats"]["FCP"], $_POST["seats"]["FCC"]);


      /////////////////////////////////////////////////////////////////////////
      // check for multiple of the same entries to prevent same booking data //
      /////////////////////////////////////////////////////////////////////////
      // open file
      $file = fopen("bookings.csv","r");

      // lock file for reading
      flock($file, LOCK_SH);

      // go through each line
      while ($line = fgetcsv($file)) {
        $records[] = $line;
      }
      
      $isDuplicate = false;
      foreach ($records as $line => $inside) {
        // same booking info
        if ($inside == $info)
        {
          $isDuplicate = true;
          break;
        }
        // reset array and continue checking
        unset($infoToCheck);
        $infoToCheck = array();
      }

      // unlock files
      flock($file, LOCK_UN);

      // close file handles to prevent memory leak
      fclose($file);

      //////////////////////////////////////////////////////////
      // log into bookings if booking isn't already available //
      //////////////////////////////////////////////////////////
      if (!$isDuplicate) {
        $file = fopen("bookings.csv","a");
        flock($file, LOCK_EX);
        // log booking to file
        fputcsv($file, $info);
        flock($file, LOCK_UN);
        fclose($file);
      }


      /////////////////////////////
      // redirect to receipt.php //
      /////////////////////////////
      header("Location: receipt.php");
      exit();
    }
  }

  // make input data clean by:
  // 1. stripping unnecessary characters (extra space, tab, newline) from the user input data (with the PHP trim() function)
  // 2. removing backslashes (\) from the user input data (with the PHP stripslashes() function)
  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

  // keep seats selections even after user submit form
  function keepSelectFieldAfterSubmit($str1, $str2) {
    // if value is not null and equal to $str
    // echo selected
    // otherwise, echo nothing
    echo (isset($_POST['seats'][$str1]) && $_POST['seats'][$str1] === $str2) ? 'selected' : '';
  }

  // Print data and shape/structure of data
  function preShow( $arr, $returnAsString=false ) {
    $ret  = '<pre>' . print_r($arr, true) . '</pre>';
    if ($returnAsString)
      return $ret;
    else
      echo $ret; 
  }
  function printMyCode() {
    $lines = file($_SERVER['SCRIPT_FILENAME']);
    echo "<pre class='mycode'><ol>";
    foreach ($lines as $line)
      echo '<li>'.rtrim(htmlentities($line)).'</li>';
    echo '</ol></pre>';

  }
    
  // Reset the session - Submit Button
  if (isset($_POST['session-reset'])) {
    foreach($_SESSION as $something => &$whatever) {
      unset($whatever);
    }
  }
?>

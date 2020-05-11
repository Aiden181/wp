<?php
  session_start();

// Put your PHP functions and modules here

// define variables and set to empty values
$name = $email = $mobile = $cardNumber = $cardExpiry = $movieID = "";

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
      $name = test_input($_POST["cust"]["name"]);
      // not matching regex, format error message
      if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
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
      $email = test_input($_POST["cust"]["email"]);
      // check if e-mail address is well-formed
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
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
      $mobile = test_input($_POST["cust"]["mobile"]);
      // not matching regex, format error message
      if (!preg_match("/^(?:\+?(61))? ?(?:\((?=.*\)))?(0?[2-57-8])\)? ?(\d\d(?:[- ](?=\d{3})|(?!\d\d[- ]?\d[- ]))\d\d[- ]?\d[- ]?\d{3})$/", $mobile)) {
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
      $cardNumber = test_input($_POST["cust"]["card"]);
      // not matching regex, format error message
      if (!preg_match("/[0-9]{14,19}/", $cardNumber)) {
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
      $cardExpiry = test_input($_POST["cust"]["expiry"]);
      // if expiry date is less or equal than current month and year, format error message
      if ($cardExpiry <= date("Y-m")) {
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

  // go through seats array elements
  if (isset($_POST['seats'])) {
    foreach($_POST['seats'] as $seatingValue) {
      // if value is empty (option is disabled) or 
      if (empty($seatingValue) || $seatingValue < 1 || $seatingValue > 10) {
        $movieErr = "STOP HACKING OUR WEBSITE!";  // set error message
        return; // stop the loop
      }
    }
    $isSeatsSelected = true;
  }

  // if all values are sanitised and validated
  if ($isNameValid && $isEmailValid && $isMobileValid && $isCardNumberValid && $isCardExpiryValid && $ismovieValid && $isSeatsSelected) {
    // add to session (i.e. shopping cart)
    $_SESSION['cart'] = $_POST;
    // redirect to receipt.php
    header("Location: receipt.php");

    /////////////////////////////////
    // create order in receipt.php //
    /////////////////////////////////

    // // assign variable to file name
    // $filename = "receipt.php";
    // // open file to write
    // $fp = fopen($filename, "w");
    // // lock file before writing
    // flock($fp, LOCK_EX);

    // // write file
    // fwrite($fp, "Here is the first line\n");
    // fwrite($fp, "Here is the second line\n");
    
    // // unlock file
    // flock($fp, LOCK_UN);
    // // close file handle to prevent memory leak
    // fclose($fp);
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

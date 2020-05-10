<?php
  session_start();

// Put your PHP functions and modules here

// define variables and set to empty values
$name = $email = $mobile = $cardNumber = $cardExpiry = "";
$nameErr = $emailErr = $mobileErr = $cardNumberErr = $cardExpiryErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
// validate customer name
// if field is empty
if (empty($_POST["cust_name"])) {
  $nameErr = "Name is required!";
  } else {
  // field not empty, check if data is not null 
  if (isset($_POST["cust_name"])) {
    $name = test_input($_POST["cust_name"]);
    // not matching regex, format error message
    if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
      $nameErr = "Please enter an appropriate name!";
    }
  }
}

// validate customer email
// if field is empty
if (empty($_POST["cust_email"])) {
  $emailErr = "Email is required!";
  } else {
    // field not empty, check if data is not null 
  if (isset($_POST["cust_email"])) {
    $email = test_input($_POST["cust_email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format!";
    }
  }
}

// validate customer phone number
// if field is empty
if (empty($_POST["cust_mobile"])) {
  $mobileErr = "Phone number is required!";
  } else {
    // field not empty, check if data is not null 
  if (isset($_POST["cust_mobile"])) {
    $mobile = test_input($_POST["cust_mobile"]);
    // not matching regex, format error message
    if (!preg_match("/^(?:\+?(61))? ?(?:\((?=.*\)))?(0?[2-57-8])\)? ?(\d\d(?:[- ](?=\d{3})|(?!\d\d[- ]?\d[- ]))\d\d[- ]?\d[- ]?\d{3})$/", $mobile)) {
      $mobileErr = "Please enter a valid phone number!";
    }
  }
}

// validate customer credit card number
// if field is empty
if (empty($_POST["cust_card"])) {
  $cardNumberErr = "Credit card number is required!";
  } else {
    // field not empty, check if data is not null 
  if (isset($_POST["cust_card"])) {
    $cardNumber = test_input($_POST["cust_card"]);
    // not matching regex, format error message
    if (!preg_match("/[0-9]{14,19}/", $cardNumber)) {
      $cardNumberErr = "Please enter a valid credit card number!";
    }
  }
}

// validate customer credit card expiry date
// if field is empty
if (empty($_POST["cust_expiry"])) {
  $cardExpiryErr = "Credit card expiry date is required!";
  } else {
    // field not empty, check if data is not null 
  if (isset($_POST["cust_expiry"])) {
    $cardExpiry = test_input($_POST["cust_expiry"]);
    // if expiry date is less or equal than current month and year, format error message
    if ($cardExpiry <= date("Y-m")) {
      $cardExpiryErr = "Please enter a non-expired credit card!";
    }
  }
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
// Reset the session - Submit Button
if (isset($_POST['session-reset'])) {
  foreach($_SESSION as $something => &$whatever) {
       unset($whatever);
  }
}
?>

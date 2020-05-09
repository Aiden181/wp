<?php
  session_start();

// Put your PHP functions and modules here

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

$name = test_input($_POST["cust_name"]);
if (!preg_match("/^[A-Za-z]+$/",$name)) {
  $nameErr = "Please enter a valid name";
}

$email = test_input($_POST["cust_email"]);
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  $emailErr = "Invalid email format";
}

$mobile = test_input($_POST["cust_mobile"]);
if (!preg_match("/^(?:\+?(61))? ?(?:\((?=.*\)))?(0?[2-57-8])\)? ?(\d\d(?:[- ](?=\d{3})|(?!\d\d[- ]?\d[- ]))\d\d[- ]?\d[- ]?\d{3})$/",$mobile)) {
  $mobileErr = "Please enter a valid mobile number";
}

?>
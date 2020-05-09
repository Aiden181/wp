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


?>
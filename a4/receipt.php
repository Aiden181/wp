<?php
    
      // Get Values Passed From 
    
    if(isset($_REQUEST["order"])){
        $custName = $_REQUEST["cust"]["name"];
        
        
        $ABNnumber = '00 123 456 789';
        echo $ABNnumber;
        echo "Name: " . " " . $custName;
        
    }

?>
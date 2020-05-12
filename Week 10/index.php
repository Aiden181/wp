<?php
    $filename = "..\Week 9\processing.php";
    $line = file($filename);
    foreach($line as $i => $line)
    echo "<li> $line </li>";  
    echo "<ol>";
    
?>
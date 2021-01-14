<?php 
    
    $localtime = localtime();
    $localtime_assoc = localtime(time(), true);
    echo "<pre>";
    print_r($localtime);
    print_r($localtime_assoc);
    echo "</pre>";
    
?>
<?php

    $conn=mysqli_connect("localhost","root","","helpdesk");
    if($conn->connect_error)
    {
        die("connection failed".$conn->connect_error);
    
    }
    
  
?>

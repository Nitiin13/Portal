<?php

include('authenticate.php');


$loggedin=false;
// error_reporting(0);
if(isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn']==true)
{
    
   $loggedin=true;
}

?>
<div class="navbar"> 
       <a href="#">TicketPortal</a>
      
      <?php if($loggedin)
      {
        ?>
            <a href="logout.php">Logout</a>
        <?php
    }
    else{
        ?>
            <a href="login.php">Login</a>           
       <?php
    }?>
    
    </div>
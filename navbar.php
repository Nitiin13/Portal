<?php
require('authenticate.php');
session_start();
$loggedin=false;
// error_reporting(0);
if(isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn']==true)
{
    echo $_SESSION['id'];
   $loggedin=true;
}
?>
<!DOCTYPE html>
  
<head>
    <title>Navbar</title>
    <link rel="stylesheet" href="nav.css">
</head>

<body>
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
    }
    ?>
    </div>
</body>
</html>
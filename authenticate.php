<?php
 include('connect.php');
 
   if(isset($_POST['submit-form']))
   {               
                $email=$_POST['email'];
                $pass=$_POST['pass'];
                
                $q="Select * from users where email='$email' AND pass='$pass'";
                $result=mysqli_query($conn,$q);
                $row=mysqli_fetch_array($result);

                if(is_array($row))
                {  
                    session_start();
                    $_SESSION['isLoggedIn']=true;
                    $_SESSION['email']=$row['email'];
                    $_SESSION['id']=$row['userid'];
                    
                        header('Location:index.php');
                        
                    }
        else{
            header('Location:login.php');
        }
    }

  
?>
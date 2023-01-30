<?php include_once('navbar.php');
 ?>
<!DOCTYPE html>
<head>
    <title>
        Login Page!
    </title>
    <link rel="stylesheet" href="login-page.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    
</head>
<body>
 <div class="container">
   
    <div class="login-box">
        <form method="Post"  action="authenticate.php" onsubmit="return myvalidation()">
        <label for="#email">Email</label>
        <input type="email" id="email" name="email" placeholder="Enter your Email Address" /><br>
        <label for="#pass">Password</label>
        <input type="password" id="pass" name="pass" placeholder="Enter your Password"/>
        <button id="lgn-button" name='submit-form' value='submit'>Login</button>
        <hr>
    </form>
        
        <h4>Create a New Account?</h4>
        <Button id="rg-button">Register</Button>
        
    </div>
    
 </div>
 <script>
    
    function myvalidation(){
        var email=document.getElementById("email").value;
    var pass=document.getElementById("pass").value;
        const pattern=/^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/;
        let op=pattern.test(email);
    if(email=="")
    {
       
        alert('email is required');
       
    }
    else if(!op){
       
         alert("Inavlid email format!");
        
    }
    else{
       return true;
    }
    var passw= /^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})/;//must have a small cap
    // must have a number[0=9]
    // must have a capital letter
    // must have a special character
    let ptest=passw.test(pass);
    if(pass==""){
        alert("Password required!");
      
    }
    else if(!ptest) 
    { 

        alert('Password is too weak! ');
        
    }
    else{
        return true;
    }
   
}
</script>
</body>

</html>
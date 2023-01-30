<?php include 'ticket_add.php';   
    include('navbar.php');
    
   
    // session_start();
    
    if(!isset($_SESSION['isLoggedIn']) || $_SESSION['isLoggedIn']!=true)
    {
        header('Location:login.php');
        exit;
    }
    ?>
<!DOCTYPE html>
<head>
    <title>Portal</title>
    <link rel="stylesheet" href="page1.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
</head>
<body>
    <div class="container">
        <div class="main-div">
            <h1>Add a Ticket</h1>
            <!--  -->
            <form name="ticket-form" onsubmit="return myfunction()" autocomplete="off"method="post" action="ticket_add.php">
            <span id='error_title' ><?php if(isset($title_err)){ echo $title_err;} ?></span>            
            <label for="#title">Title</label>
                        <input type="text" id="title" placeholder="Title "name="ticket-title"  /><br/>
                        <span id='error_desc' ><?php if(isset($title_desc)){ echo $desc_err; } ?></span>
                        <label for="#desc">Description</label>
                        <textarea id="desc"placeholder="Description"name="ticket-desc"rows="1"cols="30"maxlength="255" form="ticket-form" ></textarea>
                        <label for="#myfile">Attachment</label>
                        <input type="file" id="myfile" name=" attachment">
                        <button id="btn" name="form-submit">Submit</button>
            
           </form>
        </div>
        <div id="modal">
            <div class="modal-content">
                <h1>Here's What we Got!</h1>
            <p id="text"></p>
            <p id ="details"></p>
          
            
    
            <!-- <p id="json-details"></p> -->
            <!-- <p id="asawait-demo"></p> -->
            </div>
        </div>
    </div> 
    <script>
        var modal=document.getElementById("modal");
        var btn=document.getElementById("btn");
        var title=document.getElementById("title");
        var desc=document.getElementById("desc");
        
   
        function myfunction(){
            
            if(title.value=="" && desc.value=="")
            {
                alert("form cannot be empty");
            }
            else if(title.value=="" )
            {
                alert("title cannot be empty");
            }
            else if(desc.value=="")
            {
                alert("desc cannot be empty");
            }
            else{
               
            modal.style.display="flex";
            
          let out1= title.value;
          let out2=desc.value;
          
          document.getElementById('text').innerHTML=out1;
        document.getElementById('details').innerHTML=out2;
        
        window.onclick=function(event){
            if(event.target==modal){
                modal.style.display="none";
               
            }
        
           
            }
        }
    }
    
    </script> 

</body>
</html>
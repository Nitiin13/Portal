<?php
   
    session_start();
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
    <link rel="stylesheet" href="nav.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
</head>
<body>
<?php include('navbar.php');?>
    <div class="container">
      
        <div class="main-div">
            <h1>Add a Ticket</h1>
            <!--  -->
            <form id="ticketform" onsubmit="return myfunction()" autocomplete="off"method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                     
            <label for="#title">Title</label>
                        <input type="text" id="title" placeholder="Title "name="ticket-title"  /><br/>
                        
                        <label for="#desc">Description</label>
                        <textarea id="ticket-detail"   placeholder="Description" name="ticket-detail" form="ticketform"  rows="1"cols="30"maxlength="255"></textarea>
                        <label for="#myfile">Attachment</label>
                        <input type="file" id="myfile" name="attachment">
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
<?php
// include('authenticate.php');    
// session_start();

if(isset($_POST['form-submit']))   
 {
                if(isset($_POST['title']) AND isset($_POST['ticket-detail']) )
                {
                    $title_err="both the fields are requried";
                }
                else{
                    $title=input_validation($_POST['ticket-title']);
                    $desc=input_validation($_POST['ticket-detail']);
                    $attach=$_POST['attachment'];
                    $id=$_SESSION['id'];
                    
                    $q="insert into tickets(title,description,u_id)values('$title','$desc',$id)";
                    if(mysqli_query($conn,$q)){
                        echo '<script type ="text/JavaScript">';  
                        echo 'alert("inserted")';  
                        echo '</script>'; 
                     }
                
             
            // }
            }
        }
function input_validation($data){
    
    $data=trim($data);
    $data=stripslashes($data);
    $data=htmlspecialchars($data);
    return $data;
}?>
</body>
</html>
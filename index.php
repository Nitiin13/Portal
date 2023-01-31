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
            <form id="ticketform" onsubmit="return myfunction()" autocomplete="off"method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                     
            <label for="#title">Title</label>
                        <input type="text" id="title" placeholder="Title "name="ticket-title"  /><br/>
                        
                        <label for="#desc">Description</label>
                        <textarea id="ticket-detail"   placeholder="Description" name="ticket-detail" form="ticketform"  rows="1"cols="30"maxlength="255"></textarea>
                        <label for="#myfile">Attachment</label>
                        <input type="file" id="attachment" name="attachment">
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
        var desc=document.getElementById("ticket-detail");
        
   
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
                    $id=$_SESSION['id'];
                    $title=input_validation($_POST['ticket-title']);
                    $desc=input_validation($_POST['ticket-detail']);
                    if($_FILES['attachment']['error']==0)
                    {
                        $target_file=$_FILES["attachment"]["name"];
                        $temp_name=$_FILES["attachment"]["tmp_name"];
                        $imageFileType=strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                        checktype($imageFileType);
                        $folder="C:/xampp/htdocs/Internship/assets/".$target_file;
                        if(file_exists($folder))
                        {
                            $name=pathinfo($target_file,PATHINFO_FILENAME);
                            $ext=pathinfo($target_file,PATHINFO_EXTENSION);
                            $folder="C:/xampp/htdocs/Internship/assets/".$name.$id.'.'.$ext;
                        }
                        move_uploaded_file($temp_name,$folder);
                    } 
                    else{
                        $folder='';
                    }
                        $q="insert into tickets(title,description,attachment,u_id)values('$title','$desc','$folder','$id')";
                        if(mysqli_query($conn,$q)){
                            echo '<script type ="text/JavaScript">';  
                            echo 'alert("inserted")';  
                            echo '</script>'; 
                        }
                        else{
                            echo '<script type ="text/JavaScript">';   
                            echo 'alert("not inserted!")';  
                            echo '</script>';
                        }
                    
        }
         function checktype($imageFileType)
        {
            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) 
            {
            echo "<script>";
            echo "alert('only pdf,jpeg,png,jpg & gif format supported)";
            echo "</script>";
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
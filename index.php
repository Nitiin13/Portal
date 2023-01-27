<?php include 'demo.php'?>
<!DOCTYPE html>
<head>
    <title>Portal</title>
    <link rel="stylesheet" href="page1.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
</head>
<body>
    <div class="navbar"> 
        <a href="index.html">Home</a>
        <a href="index.html">About</a>
        <a href="index.html">Share</a>
    </div>
    <div class="container">
        <div class="main-div">
            <h1>Add a Ticket</h1>
            <!--  -->
            <form name="ticket-form"  autocomplete="off"method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
            <span id='error_title' ><?php if(isset($title_err)){ echo $title_err;} ?></span>            
            <label for="#title">Title</label>
                        <input type="text" id="title" placeholder="Title "name="ticket-title"  /><br/>
                        <span id='error_desc' ><?php if(isset($title_desc)){ echo $desc_err; } ?></span>
                        <label for="#desc">Description</label>
                        <textarea id="desc"placeholder="Description"name="ticket-desc"rows="1"cols="30"maxlength="255" form="ticket-form" ></textarea>
                        <label for="#myfile">Attachment</label>
                        <input type="file" id="myfile" name=" attachment">
                        <button id="btn" onclick="myfunction()" >Submit</button>
            
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
           
        // // async function anotherone(){
        // //     let data=await fetch('demo.txt');
        // //     let text=await data.text();
        // //     document.getElementById('asawait-demo').innerHTML=text;
        // // }
        //   const xhr=new XMLHttpRequest();
        //  xhr.open('GET','demo.txt',true);
       
        // xhr.onload=function(){
        //     let t2=this.responseText;
        //     document.getElementById('json-details').innerHTML=t2;
        // }
        // xhr.send();
        // anotherone();
        // }

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
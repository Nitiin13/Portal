
<?php

$title=$desc=$attachment="";
$title_err=$desc_err="";
if($_SERVER['REQUEST_METHOD']=='POST')   
 {
    if(empty($_POST['title']))
    {
        $title_err="title cannot be empty";
    }
    else{
        $title=input_validation($_POST['title']);
    }
    if(empty($_POST['ticket-desc']))
    {
        $desc_err="desc cannot be empty";
    }
    else{
        $desc=input_validation($_POST['ticket-desc']);
    
     } $attach=$_POST['attachment'];
     if($title_err==" " && $desc_err==" ")
    {
        header('Location: index.php');
        
        exit();
    }
  else{
    $title_err=$desc_err="";
  }
}

function input_validation($data){
    
    $data=trim($data);
    $data=stripslashes($data);
    $data=htmlspecialchars($data);
    return $data;
}

?>
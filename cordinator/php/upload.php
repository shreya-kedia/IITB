<?php

if(isset($_POST['upload_reports']))
{
$folder ="uploads/"; 

$uploads_dir = "../uploads/";

// echo $_FILES["report"]["name"]; 
// echo $_FILES["report"]["size"];
// echo $_FILES["report"]["type"];
$pname = $_FILES["report"]["name"]; 
$tname=$_FILES["report"]["tmp_name"];
$allowed=array('jpeg','png','pdf','jpg',NULL);
$name = pathinfo($_FILES['report']['name'], PATHINFO_FILENAME);
$extension = pathinfo($_FILES['report']['name'], PATHINFO_EXTENSION);

 $increment = 0; 
 $pname = $name . '.' . $extension;
 if(!in_array($extension,$allowed) ) 

 { 
    $_SESSION['invalidImage']=1;
    Header( 'Location: ../html/dashboard.php?uploadfailure=1');
//   echo "Sorry, only JPG, JPEG, PNG & GIF  files are allowed.";
 
 }
 else
 {
    //  move_uploaded_file( $_FILES['image'] ['tmp_name'], $path); 
    while(is_file($uploads_dir.'/'.$pname)) 
    {
        $increment++;
        $pname = $name . $increment . '.' . $extension;
    }
 move_uploaded_file($tname, $uploads_dir.'/'.$pname);
 Header( 'Location: ../html/dashboard.php?uploadsuccess=1');
}

}

?>
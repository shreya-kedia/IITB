<?php
include('..\database\dbConn.php');
if(isset($_POST['login']))
{
    $email=$_POST['email'];
    $password=$_POST['password'];
    $getPassword=$conn->prepare("SELECT * FROM workshop_coordinator  WHERE email= ? LIMIT 1");
    $getPassword->bindValue(1,$email);
    $getPassword->execute();

    if($getPassword->rowCount()>0)  //email found
    {

        
        while($row = $getPassword->fetch())
        {
            
            if(password_verify($password,$row['password']))
            {
                
                

                session_start();
                $_SESSION["email"] = $email;
                echo $_SESSION["email"];
                Header('Location: ../php/dashboard.php' );
                
            }
            else
            {
                // $_SESSION['loginsuccess']=0;
                Header('Location: login_index.php?loginsuccess=0' );
            }
        }
        
    }
    else
    {
        Header('Location: login.php?nouser=1');
    }
    
    
    

}
?>
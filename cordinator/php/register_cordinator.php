<?php
include('..\database\dbConn.php');
if(isset($_POST['register']))
{
    $email=$_POST['email'];
    $password1=$_POST['password1'];
    $password2=$_POST['password2'];
    $hashed_password = password_hash($password1, PASSWORD_DEFAULT);
    $sql=$conn->prepare("INSERT INTO `workshop_coordinator`(`id`, `email`, `password`) VALUES ( NULL,'$email', '$hashed_password')");
    $result=$sql->execute() or die($conn->error);
    if($result)
            {
                // $_SESSION['accountsuccess']=1;
                Header( 'Location: register.php?success=1');
            }
            else
            {
                // $_SESSION['accountsuccess']=0;
                Header( 'Location: register.php?success=0');
            }

}
?>
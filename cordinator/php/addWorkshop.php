<?php
    include('..\database\dbConn.php');
    //echo "hii again";
    if(isset($_POST['add_workshop']))
    {
       $date=$_POST['date'];
       $type=$_POST['type'];
       $participants=$_POST['participants'];
       $no=$_POST['expected_no'];
       if($no>=51 && $no<=100)
           $category='Mini-workshop';
       else
           $category='workshop';
       $expected=$no." | ".$category;
    //    echo $expected;
       $discipline = implode(',', $_POST['Discipline']);
       $sql=$conn->prepare("INSERT INTO `workshop_details`(`w_id`, `date`, `type`, `participants`, `expected_no`, `discipline`) VALUES (NULL,'$date','$type','$participants','$expected','$discipline')");
       $result=$sql->execute() or die($conn->error);
       if($result)
               {
                   // $_SESSION['accountsuccess']=1;
                   Header( 'Location: ../html/dashboard.php?success=1');
               }
               else
               {
                   // $_SESSION['accountsuccess']=0;
                   Header( 'Location: ../html/dashboard.php?success=0');
               }
    }
?>
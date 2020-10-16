<?php 
//include 'connection.php';
require_once("connection.php");
session_start();
if (isset($_POST['Login'])) 
{
   $username=$_POST['username'];
   $password=$_POST['password'];

        
         $pass=md5($password);
         $query = "SELECT * FROM login WHERE userName='$username' AND password='$pass'";
        $result=mysqli_query($conn,$query);
        $row= mysqli_fetch_assoc($result);
        
        if ($row) {
                $usercategory=$row['userCategory'];
                $_SESSION['username']=$username;
                $Activated=$row['Activated'];

                $_SESSION['usercategory']=$usercategory;
                
                if ($Activated=="N") {
                    header("location:changepassword.php");
                }else{
                 if($usercategory=='Admin'){
                     
                    header("Location:admindashboard.php"); 

                 }
                 else if($usercategory=='Manager'){
                     
                    header("Location:manager.php");
                 }
                 else if($usercategory=='Customer'){
                     
                    header("Location:customer.php");
                 }
                 else if($usercategory=='Officer'){
                     
                    header("Location:officer.php");
                 }
                 else if($usercategory=='Cash Collector')
                 {
                    header("Location:cashcollector.php");
                 }
             }
                 
            }

            else{
                header("Location:loginpage.php?invalid=Incorrect Username or Password");
            }
      
   
       
         mysqli_close($conn);
 
}

    
?>
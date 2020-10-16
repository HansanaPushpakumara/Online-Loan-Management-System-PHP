
<?php  
session_start();
//You have to remove this session username set
if (isset($_SESSION['username'])) {
  $username=$_SESSION['username'];
}
else{
  header("Location:loginpage.php");
}


//
$connect = mysqli_connect("localhost", "root", "", "dspdb");  
 if(isset($_POST["insert"]))  
 {  

      $sql = "SELECT * FROM tbl_images WHERE username='$username'";

      if ($connect->query($sql) === TRUE) {
        $file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));  
        $query1 = "UPDATE tbl_images  SET name='$file' WHERE username='$username'";  
        if(mysqli_query($connect, $query1))  
        {  
           echo '<script>alert("Changed Profile Successfully")</script>';  
        }
      }
      else{
      $file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));  
      $query2 = "INSERT INTO tbl_images(name,username) VALUES ('$file','$username')";  
      if(mysqli_query($connect, $query2))  
      {  
           echo '<script>alert("Changed Profile Successfully")</script>';  
      }
        }
 }  
 
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="device-width,initial-scale=1">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/button.css">
  <link rel="stylesheet" type="text/css" href="css/footer.css">
  <link rel="stylesheet" type="text/css" href="css/customer.css">
  <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style type="text/css">
form{
  display: none;
}
.container:hover form{
  display: block;
}
</style>

</head>
<body >
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>


<?php 
      require_once("connection.php");
      if (isset($_SESSION['username'])) {
        $username=$_SESSION['username'];
         $query = "SELECT * FROM customer WHERE nic='$username'";
        $result=mysqli_query($conn,$query);
        while($row = $result->fetch_assoc()) {
          $customerId=$row['customerId'];
          $_SESSION['customerId']=$customerId;
          $fullName=$row['fullName'];
          $nameWithInitials=$row['nameWithInitials'];
          $email=$row['email'];
          $dateOfBirth=$row['dateOfBirth'];
          $city=$row['city'];
          $mobileNo=$row['mobileNo'];
          $designation=$row['designation'];
          $permanentAddress=$row['permanentAddress'];
        
        }


      }

      if (isset($_SESSION['customerId'])==null) {
          //header("Location:loginpage.php");
      }

      if (isset($_SESSION['customerId'])) {
        
         $query = "SELECT * FROM customerloandetails WHERE customerId=$customerId";
        $result=mysqli_query($conn,$query);

       
        while($row = $result->fetch_assoc()) {

          $customerLoanId=$row['customerLoanId'];
          $loanAmount=$row['loanAmount'];
          $loanType=$row['loanType'];
          $totalLoanAmount=$row['totalLoanAmount'];
          $arrearsStatus=$row['arrearsStatus'];
          
          $interest=$row['interest'];
          $appliedLoanDuration=$row['appliedLoanDuration'];
          $appliedMethod=$row['appliedMethod'];
          $noOfInstallments=$row['noOfInstallments'];
          $remainingLoanBalance=$row['remainingLoanBalance'];
          $installmentDueDate=$row['installmentDueDate'];
          $remainingNoOfInstallments=$row['remainingNoOfInstallments'];
        }

      }
     if ($arrearsStatus=="YES") {
        
         $query = "SELECT * FROM customerareasedetails WHERE customerId=$customerId";
        $result=mysqli_query($conn,$query);
        while ($row=$result->fetch_assoc()) {
          $arrearsAmount=$row['arrearsAmount'];


        }
      }


     ?>
<body>
<!-- Header import---->
<?php require_once("header.php"); ?>
<!---------------------------------------profile----------------------------------------------------------------------------->
<div class="row">
  <div class="col-md-4" style="background-color:#e0ebeb;height:104vh;">
        <div class="profile">
           <div class="profile-sidebar">
        <!-- SIDEBAR USERPIC -->
        <div class="profile-userpic">
          <div class="container" style="width:300px;>  
                <table class="table table-bordered">  
                <?php  
                $query = "SELECT * FROM tbl_images WHERE username='$username' ORDER BY id DESC  LIMIT 1 "; 
                if ($result = mysqli_query($connect, $query)) {
                   while(($row = $result->fetch_assoc())==!null){  
              
                     echo '  
                          <tr>  
                               <td>  
                                    <img src="data:image/jpeg;base64,'.base64_encode($row['name'] ).'" height="200px" width="200px" class="img-thumnail" />  
                               </td>  
                          </tr>  
                     ';  
                }  
                 }
                 else{
                     echo '<img src="data:image/jpeg;base64,'.base64_encode($row['name'] ).'" height="200px" width="200px" class="img-thumnail" />';
                 } 
                

                
                ?>  
                </table>
                <form method="post" enctype="multipart/form-data">  
                     <input type="file" name="image" id="image" />  
                     <br />  
                     <input type="submit" name="insert" id="insert" value="Change Profile Picture" class="btn btn-info" />  
                </form>  
                
                  
           </div>  
 

        </div>
        <div class="profile-usertitle">
          <div class="profile-usertitle-name">
            <center>
            <h2>
          <?php  
          echo $nameWithInitials;  ?>
          </h2>
          </center>
          </div>
        </div>
        <div class="profile-usermenu">
          <ul class="nav">
            <li class="active">
              <i class="glyphicon glyphicon-user"></i>
              User Details

            </li>

    <table class="table table-dark table-hover">
    <tbody>
      
      <tr>
        <td>Full Name</td>
        <td><?php echo $fullName;
 ?></td>
      </tr>
      <tr>
      <tr>
        <td>Customer Id</td>
        <td><?php echo $customerId; ?></td>
      </tr>

        <td>Email
        </td>
        <td><?php echo $email; ?></td>
      </tr>
      <tr>
        <td>Date Of Birth</td>
        <td><?php echo $dateOfBirth; ?></td>
      </tr>
      <tr>
        <td>City
</td>
        <td><?php echo $city; ?></td>
      </tr>
      <tr>
        <td>Mobile No
</td>
        <td><?php echo $mobileNo; ?></td>
      </tr>
      <tr>
        <td>Designation</td>
        <td><?php echo $designation; ?></td>
      </tr>
      <tr>
        <td>Permanent Address</td>
        <td><?php echo $permanentAddress; ?></td>
      </tr>
    </tbody>
  </table>
            
          </ul>
        </div>
        <!-- END MENU -->
      </div>
    </div>
  </div>

<!-- ------------------------------Loan Details-------------------------------------------------------->
  <div class="col-md-8 class="container" style="background-color:#f2f2f2;min-height:104vh;">
    <li class="active ">
              <center><i class="glyphicon glyphicon-usd"></i>
              Loan Details</center>
    </li>
    <br>
    <?php
    if($arrearsStatus=="YES"){
    ?>
    <div class="text-dark text-center alert alert-danger"><?php echo "You Have An Arrears"?>
      <br>
      <?php echo "Arrears Amount:Rs.".$arrearsAmount?>
    </div>

    <?php 
      }
     ?>
      
    <table class="table table-hover">
      <thead>
       
        <td style="width:30%">Loan id</td>
        <td style="width:32%">Loan amount</td>
        <td>Loan Type</td>
    
      </thead>
      <tbody>
        <tr>
          <td><?php  
              echo $customerLoanId;
              ?></td>
          <td><?php  
              echo $loanAmount;
              ?></td>
          <td><?php  
              echo $loanType;
              ?></td>
        </tr>
      </tbody>
    </table>
    
      <table class="table table-hover">  
      <thead>
       
        <td>Interest Rate</td>
        <td>Loan Duraton</td>
        <td>Payment Method</td>
    
      </thead>
      <tbody>
        <tr>
          <td><?php  
              echo $interest."%";
              ?></td>
          <td><?php  
              //echo $appliedLoanDuration;
              if($appliedMethod=="Daily"){
                  echo $appliedLoanDuration." Days";
              }
              if($appliedMethod=="Monthly"){
                  echo $appliedLoanDuration." Months";
              }
              if($appliedMethod=="Weekly"){
                  echo $appliedLoanDuration." Weeks";
              }

              ?></td>
          <td><?php  
              echo $appliedMethod;
              ?></td>
        </tr>
      </tbody>
    </table>
    <br>
    <table class="table table-hover">
   
      <thead>
       
        <td>No of Installments</td>
        <td></td>
        <td></td>
    
      </thead>
      <tbody>
        <tr>
          <td><?php  
              echo $noOfInstallments;
              ?></td>
          <td><?php  
            
              ?></td>
          <td><?php  
            
              ?></td>
        </tr>
      </tbody>
      </table>
      <br>

     <li class="active ">
              <center><i class="glyphicon glyphicon-usd"></i>
              Loan Payment Details</center>
    </li>
    <br>
    <table class="table table-hover">
   
      <thead>
       
        <td>Totatl Loan Amount</td>
        <td>Remaining Loan Balance</td>
        <td>Remaining Installments</td>
    
      </thead>
      <tbody>
        <tr>
          <td><?php  
              echo $totalLoanAmount ;
              ?></td>
          <td><?php  
              echo $remainingLoanBalance;
              ?></td>
          <td><?php  
              echo $remainingNoOfInstallments;  
              ?></td>
        </tr>
      </tbody>
      </table>
      <table class="table table-hover">
   
      <thead>
       
        <td>installmentDueDate</td>
        <td></td>
        <td></td>
    
      </thead>
      <tbody>
        <tr>
          <td><?php  
              echo $installmentDueDate ;
              ?></td>
          <td><?php  
             
              ?></td>
          <td><?php  
            
              ?></td>
        </tr>
      </tbody>
      </table>
         
</div>


<!----------------- footer--------------------->
<footer class="footer-distributed" style="margin-top:0px;">
      <div class="footer-center">
          <div>
          <i class="fa fa-map-marker"></i>
          <p>DSP Group Micro Credit<br> Mahiyanganaya</p>
        </div>
        <div>
          <i class="fa fa-phone"></i>
          <p>+94 55 455 4555</p>
        </div>
        <div>
          <i class="fa fa-envelope"></i>
          <p><a href="mailto:support@company.com">dsp@company.com</a></p>
        </div>
        
      </div>

      <div class="footer-left">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.2283057070813!2d81.07561229554683!3d6.982363167274395!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae4618a1a9fec37%3A0x1dd900702229654b!2sUva+Wellassa+University!5e0!3m2!1sen!2slk!4v1511197231475"  width="90%" height="100%" frameborder="0" style="border:0" allowfullscreen></iframe>
      </div>
      <div class="footer-right">
        <div class="footer-icons">
          <a href="#"><i class="fa fa-google" aria-hidden="true"></i></a>
          <a href="#"><i class="fa fa-facebook"></i></a>
          <a href="#"><i class="fa fa-twitter"></i></a>
          <a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
          
      </div>

      </div>

    </footer>

</body>
</html>
 <script>  
 $(document).ready(function(){  
      $('#insert').click(function(){  
           var image_name = $('#image').val();  
           if(image_name == '')  
           {  
                alert("Please Select Image");  
                return false;  
           }  
           else  
           {  
                var extension = $('#image').val().split('.').pop().toLowerCase();  
                if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)  
                {  
                     alert('Invalid Image File');  
                     $('#image').val('');  
                     return false;  
                }  
           }
           function validate2() {

           var file_size = $('')[0].files[0].size;
          if(file_size>65535) {
          alert("image size too large");
          return false;
  } 
  
}  
      });  
 });  
 </script> 
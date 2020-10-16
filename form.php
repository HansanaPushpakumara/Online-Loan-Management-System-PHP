<?php session_start(); 
$customerId=$_SESSION['cId'];
	//if (!isset($_SESSION['customerId'])) {
	//	header("Location:home.php");
	//}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Form</title><link rel="stylesheet" type="text/css" href="form.css">
	<link rel="stylesheet" href="css/button.css">
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/form.css">
	<link rel="stylesheet" type="text/css" href="css/footer.css">
	
</head>
<body >
<?php require_once("header.php"); ?>
<div class="container-fluid" style="margin-top:8vh;">

<center><h3 style="color:blue;">Customer Loan Details </h3></center>
<div class="row">
<dir class="col-md-4"></dir>
<div class="col-md-4" style="margin-top:1vh;margin-bottom:8vh;">
<?php 
	require_once("connection.php");

	

	$query1="SELECT* FROM customerloandetails WHERE customerId='$customerId'";
	$result1 = $conn->query($query1);
          if ($result1->num_rows>0) {
          	$row = $result1->fetch_assoc();
          	$appliedLoanDuration=$row['appliedLoanDuration'];
          	$appliedMethod=$row['appliedMethod'];
          	$appliedLoanAmount=$row['appliedLoanAmount'];
          	$loanType=$row['loanType'];

          	//echo $appliedMethod;
          }
          else{
          	echo "No data";
          }

	          	$query2="SELECT interestrate FROM loan WHERE loanType='$loanType' AND paymentMethods='$appliedMethod'";
				$result2 = $conn->query($query2);
			         if ($result2->num_rows>0) {
			          	$row = $result2->fetch_assoc();
			          	$interestrate=$row['interestrate'];
			     

			          	if($appliedMethod=='Weekly'){
				          $weeks=$appliedLoanDuration*4; //no of weeks
				          $tempInstallment=$appliedLoanAmount/$weeks;
				          $interestForWeek=($tempInstallment*$interestrate)/400;
				          $units=($weeks/2)*($weeks+1); //week units
				          $totalInterest=$units*$interestForWeek;
				          $totalLoan=$totalInterest+$appliedLoanAmount;
				          $installment=$totalLoan/$weeks;
				         
				          //header("Location:customerForm.php?instalment=$installment");
				          
				        }
				        if($appliedMethod=='Daily'){
				          //echo $interestrate;
				          $days=$appliedLoanDuration*30; //no of weeks
				          $tempInstallment=$appliedLoanAmount/$days;
				          $interestForDay=($tempInstallment*$interestrate)/3000;
				          $units=($days/2)*($days+1); //week units
				          $totalInterest=$units*$interestForDay;
				          $totalLoan=$totalInterest+$appliedLoanAmount;
				          $installment=$totalLoan/$days;
				         
				          //header("Location:customerForm.php?instalment=$installment");
				          
				        }
				        if($appliedMethod=='Monthly'){
				          $units=($appliedLoanDuration/2)*($appliedLoanDuration+1);
				          $tempInstallment=$appliedLoanAmount/$appliedLoanDuration;
				          $interestForMonth=($tempInstallment*$interestrate)/100;
				          $totalInterest=$units*$interestForMonth;
				          $totalLoan=$totalInterest+$appliedLoanAmount;
				          $installment=$totalLoan/$appliedLoanDuration;
				       
				         // header("Location:customerForm.php?instalment=$installment");
				        }


	          		}


	          		$NEWLoanAmount=$appliedLoanAmount;
	          		$totalLoan=$totalLoan;



          if(isset($_GET['calculate'])){
          	$NEWLoanAmount=$_GET['NEWLoanAmount'];
	          	$query2="SELECT interestrate FROM loan WHERE loanType='$loanType' AND paymentMethods='$appliedMethod'";
				$result2 = $conn->query($query2);
			         if ($result2->num_rows>0) {
			          	$row = $result2->fetch_assoc();
			          	$interestrate=$row['interestrate'];
			     

			          	if($appliedMethod=='Weekly'){
				          $weeks=$appliedLoanDuration*4; //no of weeks
				          $tempInstallment=$NEWLoanAmount/$weeks;
				          $interestForWeek=($tempInstallment*$interestrate)/400;
				          $units=($weeks/2)*($weeks+1); //week units
				          $totalInterest=$units*$interestForWeek;
				          $totalLoan=$totalInterest+$NEWLoanAmount;
				          $installment=$totalLoan/$weeks;
				        
				          //header("Location:customerForm.php?instalment=$installment");
				          
				        }
				        if($appliedMethod=='Daily'){
				          //echo $interestrate;
				          $days=$appliedLoanDuration*30; //no of weeks
				          $tempInstallment=$NEWLoanAmount/$days;
				          $interestForDay=($tempInstallment*$interestrate)/3000;
				          $units=($days/2)*($days+1); //week units
				          $totalInterest=$units*$interestForDay;
				          $totalLoan=$totalInterest+$NEWLoanAmount;
				          $installment=$totalLoan/$days;
				      
				          //header("Location:customerForm.php?instalment=$installment");
				          
				        }
				        if($appliedMethod=='Monthly'){
				          $units=($appliedLoanDuration/2)*($appliedLoanDuration+1);
				          $tempInstallment=$NEWLoanAmount/$appliedLoanDuration;
				          $interestForMonth=($tempInstallment*$interestrate)/100;
				          $totalInterest=$units*$interestForMonth;
				          $totalLoan=$totalInterest+$NEWLoanAmount;
				          $installment=$totalLoan/$appliedLoanDuration;
				
				         // header("Location:customerForm.php?instalment=$installment");
				        }


	          		}
          }


 ?>
 <div>
 	<h4>Customer Id:</h4><?php echo "$customerId"; ?>
 </div>

 <form action="form.php?calculate" method="GET">

 	Applied Loan Amount:
 	<input type="text" name="appliedLoanAmount" value="<?php echo $appliedLoanAmount;?>">
 	<input type="button" id="showcal" onclick="ShowDiv()" value="Change" /><br>
 	
 	<span id="myDiv" style="display:none;">
 	
 	<h4>New Loan Amount:</h4>&nbsp&nbsp&nbsp&nbsp&nbsp
 <input type="text" name="NEWLoanAmount" value="<?php if(isset($_GET['NEWLoanAmount'])!=null){echo $NEWLoanAmount;}  ?>" required><br>
 	<input type="submit" name="calculate" value="Calculate">
 	
 	</span>

 	<script type="text/javascript">
 		function ShowDiv() {
    	document.getElementById("myDiv").style.display = "";
		}
 	</script>

 </form>

 <form action="form.php" method="GET"> 
 	
 	<h4>Installment:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
 	<input type="hidden" name="NEWTotalLoanAmountNew" value="<?php echo $totalLoan; ?>">
 	<input type="hidden" name="NEWLoanAmount" value="<?php echo $NEWLoanAmount; ?>">

 	<input type="hidden" name="customerId" value="<?php echo $customerId; ?>">
 	<input type="text" name="installment" value="<?php echo $installment;?>" readonly><br></h4>
 	<input type="submit" name="Approve" value="Approve" onclick="return confirm('Do you need to Approve?');">


 </form>

 <?php
 	if(isset($_GET['Approve'])){
 		$installment=$_GET['installment'];
 		$NEWLoanAmount=$_GET['NEWLoanAmount'];
          $totalLoan=$_GET['NEWTotalLoanAmountNew'];

        $query="UPDATE customerloandetails SET loanAmount='$NEWLoanAmount',totalLoanAmount='$totalLoan',installment='$installment' WHERE customerId='$customerId'"; 
              if ($conn->query($query) === TRUE) {
              	?>

             <p><h4 class="text-info">
             	<?php  
                
                $query2="UPDATE customer SET loanStatus='OAPR' WHERE customerId='$customerId'"; 
              if ($conn->query($query2) === TRUE) {
              	echo "Successfully Updated"; 
              }
              else{
              	echo "eror";
              }            	  
              	 ?>
              	 </h6>
              </p>
              <?php 
          		}
              else {
              	echo "Error updating record: " . $conn->error;
              }

              


 	}

   ?>




</div>
<dir class="col-md-4"></dir>
</div>
</div>
<!--------------------------------footer--------------------------------------------->
<footer class="footer-distributed" style="margin-top: 40px;">
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
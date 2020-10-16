
<?php
	require_once("connection.php");
	if(isset($_POST['searchcustomer'])){
		$customerNIC=$_POST['customerNIC'];

		$query1="SELECT* FROM customer WHERE nic='$customerNIC'";
		$result1=$conn->query($query1);
		$row=$result1->fetch_assoc();

		if($result1->num_rows > 0){
			       $customerId=$row['customerId'];
			       $NWI = $row['nameWithInitials'];
             $nic=$row['nic'];
             $email=$row['email'];
             $mobileNo=$row['mobileNo'];

    $query2 = "SELECT* FROM customerloandetails WHERE customerId='$customerId'";
             $result2=$conn->query($query2);
             $row=$result2->fetch_assoc();

            if ($result2->num_rows > 0) {
                $loanType=$row['loanType'];
                $paymentMethod=$row['appliedMethod'];
                $loanAmount=$row['loanAmount'];
                $totalLoanAmount=$row['totalLoanAmount'];
                $installment=$row['installment'];
          $remainingLoanBalance=$row['remainingLoanBalance'];
                $arrearsStatus=$row['arrearsStatus'];
                $noOfInstallments=$row['noOfInstallments'];
//$remainingNoOfInstallments=$row['remainingNoOfInstallments'];
              $installmentDueDate=$row['installmentDueDate'];

              
          }         
      }
		
    else{
        echo "<script>window.alert('User does not existed');window.location.assign('officer.php');</script>";
        //0header("location:manager.php");

      }

	}
  
?>


<!DOCTYPE html>
<html>
<head>
	<title>msearch</title>
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/button.css">
	<style type="text/css">
		h4{
			background-color:  #ccebff;
			padding: 8px;
      		}

   
	</style>
</head>
<body>

	<div class="col-sm-12">
   
		<div class="col-sm-6">
     
			<h4 style="text-align: center;">Customer Details</h4>

			<div class="table-responsive">  

                          <table class="table" >

                            <tbody>
                               <tr>
                                <td>Customer Id</td>
                                <td><?php echo $customerId; ?></td>
                              </tr>
                              
                              <tr>
                                <td>Name</td>
                                <td><?php echo $NWI; ?></td>
                              </tr>

                              <tr>
                                <td>NIC Number</td>
                                <td><?php echo $customerNIC; ?></td>
                              </tr>

                              <tr>
                                <td>Email Address</td>
                                <td><?php echo $email; ?></td>
                              </tr>

                              <tr>
                                <td>Mobile Number</td>
                                <td><?php echo $mobileNo; ?></td>
                              </tr>

    <tr><td colspan="2"><h4 style="text-align: center;">Loan Details</h4></td></tr>       
                        
                              <tr>
                                <td>Loan Type</td>
                                <td><?php echo $loanType; ?></td>
                              </tr>

                              <tr>
                                <td>Payment Method</td>
                                <td><?php echo $paymentMethod; ?></td>
                              </tr>

                              <tr>
                                <td>Loan Amount</td>
                                <td><?php echo "Rs. ".$totalLoanAmount.".00"; ?></td>
                              </tr>
 
                              <?php 
                              		$paidAmount=$totalLoanAmount-$remainingLoanBalance;
                               ?>

                              <tr>
                                <td>Paid Amount</td>
                                <td><?php echo "Rs. ".$paidAmount.".00"; ?></td>
                              </tr>

                              <tr>
                                <td>Installment</td>
                                <td><?php echo "Rs. ".$installment.".00"; ?></td>
                              </tr>

                              <tr>
                                <td>Total Installments</td>
                                <td><?php echo $noOfInstallments; ?></td>
                              </tr>

                              <tr>
                                <td>Arrears Status</td>
                                <td><?php echo $arrearsStatus; ?></td>
                              </tr>

                          </tbody>
                  </table>

                </div>
    </div>
  </div>

</body>
</html>
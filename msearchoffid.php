<?php 

require_once('connection.php');
if (isset($_GET["oid"])){
	$oid=$_GET["oid"];
	// sql to select a record
	$sql = "SELECT * FROM officer WHERE officerId='$oid'";
             $result=$conn->query($sql);
             $row=$result->fetch_assoc();

             session_start();
             if($result->num_rows > 0){
  		           $officerId=$row['officerId'];
                 $_SESSION['OFFIID'] =$officerId;
			           $userName = $row['userName'];
             	   $nameWithInitials=$row['nameWithInitials'];
             	   $email=$row['email'];
             
              }
      else{
        echo "<script>window.alert('User does not existed');window.location.assign('manager.php');</script>";
      }
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>msearch Officer ID</title>
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
			<h4>Officer Details</h4>

			<div class="table-responsive">          
                          <table class="table">

                            <tbody>
                              <tr>
                                <td>Officer ID</td>
                                <td><?php echo $officerId; ?></td>
                              </tr>

                              <tr>
                                <td>NIC</td>
                                <td><?php echo $userName; ?></td>
                              </tr>

                              <tr>
                                <td>Name with initials</td>
                                <td><?php echo $nameWithInitials; ?></td>
                              </tr>

                              <tr>
                                <td>Email Address</td>
                                <td><?php echo $email; ?></td>
                              </tr>

                              

                            </tbody>
                  </table>

                </div>

		</div>
	</div>

<form action="msearchoffid.php" method="GET">
   <input type="hidden" name="oid" value="<?php echo $oid; ?>">
  <input type="submit" name="officerloansearch" value="Search Loan">
</form>





<div class="col-sm-12">
   
      <h4>Loan Details</h4>
<?php 

require_once('connection.php');
if (isset($_GET["officerloansearch"])){
   // $ccid=$_POST["ccloan"];


$query = "SELECT* FROM customerloandetails WHERE officerId ='$oid'";
             $result=$conn->query($query);
             //$row=$result->fetch_assoc();

            if ($result->num_rows > 0) {

                ?>

        <br>
        <div class="table-responsive">          
            <table class="table">
            <tbody>
                <tr>
            <th>Loan Type</th>
            <th>Interest Rate</th>
            <th>Loan Amount</th>
            <th>Loan Duration</th>
            <th>Payment Method</th>
            <th>Installment</th>
           
            <th>Installment Due Date</th>
            <th>Installment Paid Amount</th>
            <th>Arrears Status</th>
            <th>Installment Paid Date</th>
         </tr>
        <?php
            while($row=$result->fetch_assoc()){
            ?>
        
                <tr>
                     <td><?php echo $row["loanType"] ?></td>
                     <td><?php echo $row["interest"] ?></td>
                    <td ><?php echo $row["loanAmount"] ?></a></td>
                   <td><?php echo $row["appliedLoanDuration"] ?></td>
                    <td><?php echo $row["appliedMethod"] ?></td>
                    <td><?php echo $row["installment"] ?></td>
                    <td><?php echo $row["installmentDueDate"] ?></td>
                   <?php 
                    $totalLoanAmount=$row['totalLoanAmount'];
                     $remainingLoanBalance=$row['remainingLoanBalance'];
                        $installmentPaidAmount=$totalLoanAmount-$remainingLoanBalance;
                    ?>
                    <td><?php echo "$installmentPaidAmount"?></td>

                     <td><?php echo $row["arrearsStatus"] ?></td>
                    <td><?php echo $row["installmentPaidDate"]?></td>
                                      
                    
                   

                </tr>
        

        <?php
            }
        ?>
                      </tbody>
            </table>
        </div>
            <?php

      } else {
            ?>

            
                <table>
                    <tr>
                        <td></td>
                        <td>0 Results</td>
                        <td></td>
                    </tr>
                </table>

            <?php
        }

    

}
    //search End -------------------------------------------------------
?>

               <!--;
                $installment=$row['installment'];
          $remainingLoanBalance=$row['remainingLoanBalance'];
                $arrearsStatus=$row['arrearsStatus'];
                $noOfInstallments=$row['noOfInstallments'];
//$remainingNoOfInstallments=$row['remainingNoOfInstallments'];
              $installmentDueDate=$row['installmentDueDate'];

            }
      
}

 ?>
-->
     
    </div>



	</body>
</html>
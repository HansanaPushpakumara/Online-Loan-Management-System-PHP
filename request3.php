<?php 

  require_once('connection.php');
if (isset($_POST["searchapp"])){
  $cid =$_POST["cid"];
//Query for Customer Deatails
  $sql = "SELECT * FROM customer WHERE customerId='$cid'";
             $result=$conn->query($sql);
             $row=$result->fetch_assoc();

             if($result->num_rows > 0){
             $cId=$row['customerId'];
             $nic = $row['nic'];
             $fname=$row['fullName'];
             $nameWithInitials=$row['nameWithInitials'];
             $address=$row['permanentAddress'];
             $email=$row['email'];
             $dob=$row['dateOfBirth'];
             $city=$row['city'];
             $civil=$row['civilStatus'];
             $gender=$row['gender'];
             $mobile=$row['mobileNo'];
             $mIncome =$row['monthlyIncome'];
             $bsalary=$row['bSalary'];

            $loanPurpose =$row['loanPurpose'];
            $loanStatus =$row['loanStatus'];
            }

//Query for Loan Deatails
            $query2 = "SELECT* FROM customerloandetails WHERE customerId='$cid'";
             $result2=$conn->query($query2);
             $row=$result2->fetch_assoc();
        
            if ($result2->num_rows > 0) {    
                $lType=$row['loanType'];
                $appMethod=$row['appliedMethod'];
                $interest=$row['interest'];
                $lAmount=$row['loanAmount'];
                $installment=$row['installment'];

                /*$tLAmount=$row['totalLoanAmount'];
              $aStatus=$row['arrearsStatus'];
              $noOfInstallments=$row['noOfInstallments'];
              $rLBalance=$row['remainingLoanBalance'];  
              $insDueDate=$row['installmentDueDate'];
              $insPaidDate=$row['installmentPaidDate'];
              $insPaidAmount=$row['installmentPaidAmount'];
              $appLoanAmount=$row['appliedLoanAmount'];*/
              
      }  
//Query for Guarantee Deatails
      $query3 = "SELECT* FROM guaranteedetails WHERE customerId='$cid'";
             $result3=$conn->query($query3);
             $row=$result3->fetch_assoc();
        
            if ($result3->num_rows > 0) {    
                $gname=$row['gName'];   
                $gnic=$row['gNic'];  
                $rel=$row['gRelationship'];  
                $occupation=$row['occupation'];  
                $phoneNo=$row['gMobileNumber'];                    
  }
  //Query for Attach Documents
/*
  $query3 = "SELECT* FROM attachdocuments WHERE customerId='$cid'";
             $result3=$conn->query($query3);
             $row=$result3->fetch_assoc();
        
            if ($result3->num_rows > 0) {    
                $gname=$row['gName'];   
                $gnic=$row['gNic'];  
                $rel=$row['gRelationship'];  
                $occupation=$row['occupation'];  
                $phoneNo=$row['gMobileNumber'];                    
  }
  */
}

  

  //-----------------Approve Application-----------------------
require_once("connection.php");
if (isset($_POST["approve"])){
    
    $nic2     = $_POST["cid"];

   $sql3 = "INSERT INTO login (userCategory, userName)
    VALUES ('Customer', '$nic2') /*WHERE nic='$cid'*/";

   if ($conn->query($sql3) === TRUE) {
        echo "<script>window.alert('Application Approve Sucessfully');</script>";
    } else {
        echo "<script>alert('Error Occured!');</script>";
    }
  }


//******************Reject Application*************************//
  require_once("connection.php");

if (isset($_POST["reject"])){
  
  $nic3     = $_POST["nic"];
  // sql to delete a record
  $sql = "SELECT *  FROM customer WHERE nic = '$nic3 ' ";
    $result=$conn->query($sql);
        $row=$result->fetch_assoc();

        if ($result->num_rows > 0) {
             delete($nic,$conn);
        } else {
            echo "<script>window.alert('User doesnt existed!');</script>";
        }
    }

function delete($nic,$conn){  

  $sql2 = "DELETE FROM  customer WHERE nic='$nic'";
  if ($conn->query($sql2) === TRUE) {
        echo "<script>window.alert('Application Removed Sucessfully');</script>";
    } else {
        echo "<script>alert('Error Occured!');</script>";
    }
               
  }
?>

<!DOCTYPE html>
<html>
<head>
	<title>REQUEST</title>
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
			<h4>Personal Details</h4>

			<div class="table-responsive">          
                          <table class="table">

                            <tbody>
                              <tr>
                                <td>Customer ID</td>
                                <td><?php echo $cId; ?></td>
                              </tr>

                              <tr>
                                <td>NIC</td>
                                <td><?php echo $nic; ?></td>
                              </tr>
                              <tr>
                                <td>Full Name</td>
                                <td><?php echo $fname; ?></td>
                              </tr>
                              <tr>
                                <td>Name with initials</td>
                                <td><?php echo $nameWithInitials; ?></td>
                              </tr>
                              <tr>
                                <td>Permanent Address</td>
                                <td><?php echo $address; ?></td>
                              </tr>
                              <tr>
                                <td>Email Address</td>
                                <td><?php echo $email; ?></td>
                              </tr>
                              <tr>
                                <td>Date Of Birth</td>
                                <td><?php echo $dob; ?></td>
                              </tr>
                              <tr>
                                <td>City</td>
                                <td><?php echo $city; ?></td>
                              </tr>
                              <tr>
                                <td>Civil Status</td>
                                <td><?php echo $civil; ?></td>
                              </tr>
                              <tr>
                                <td>Gender</td>
                                <td><?php echo $gender; ?></td>
                              </tr>
                              <tr>
                                <td>Phone Number</td>
                                <td><?php echo $mobile; ?></td>
                              </tr>
                              <tr>
                                <td>Monthly Income</td>
                                <td><?php echo $mIncome; ?></td>
                              </tr>
                              <tr>
                                <td>Basic Salary</td>
                                <td><?php echo $bsalary; ?></td>
                              </tr>
                              <tr>
                                <td>Loan Purpose</td>
                                <td><?php echo $loanPurpose; ?></td>
                              </tr>
                              <tr>
                                <td>Loan Status</td>
                                <td><?php echo $loanStatus; ?></td>
                              </tr>
                             
                            </tbody>
                  </table>

                </div>

		</div>
	
   <div class="col-sm-6">
      <h4>Loan Details</h4>
      
      <div class="table-responsive">          
                          <table class="table">

                            <tbody>
                              <tr>
                                <td>Loan Type</td>
                                <td><?php echo $lType; ?></td>
                              </tr>
                              <tr>
                                <td>Applied Method</td>
                                <td><?php echo $appMethod; ?></td>
                              </tr>
                              <tr>
                                <td>Interest</td>
                                <td><?php echo $interest."%"; ?></td>
                              </tr>

                              <tr>
                                <td>Requested Loan Amount</td>
                                <td><?php echo $lAmount; ?></td>
                              </tr>
                              
                               <tr>
                                <td>Installment</td>
                                <td><?php echo $installment; ?></td>
                              </tr>

                            

                            </tbody>
                  </table>
 <h4>Guarantee Details</h4>
      
      <div class="table-responsive">          
                          <table class="table">

                            <tbody>
                              <tr>
                                <td>Guarantee Name</td>
                                <td><?php echo $gname; ?></td>
                              </tr>
                              <tr>
                                <tr>
                                <td>Guarantee NIC</td>
                                <td><?php echo $gnic; ?></td>
                              </tr>
                              <tr>
                                <td>RelationShip</td>
                                <td><?php echo $rel; ?></td>
                              </tr>
                              <tr>
                                <td>Phone Number</td>
                                <td><?php echo $phoneNo; ?></td>
                              </tr>

                              <tr>
                                <td>Occupation</td>
                                <td><?php echo $occupation; ?></td>
                              </tr>
                      </tbody>
                    </table>
                </div>
    </div>
  </div>

    <div class="column col-12" >
      <center>
      <form action="request3.php"  method ="POST"> 
        <input type="submit"  name="approve" value="Approve"  formaction="request3.php" onclick="return confirm ('Are You sure to Approve this Application?');">
         
        <input type="submit" name="reject" value="Reject"  formaction="request3.php" onclick="return confirm ('Are You sure to Reject this Application?');">
        </center>
        <br>
        </form>
    </div>
	</body>
</html>
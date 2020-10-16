<?php 
	
	require_once('connection.php');
	$cid=$_GET['cid'];
	//echo $CustomerNic;
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

 ?>

<?php 
	//----------------------------***Approve applications**----------------------------
	if(isset($_POST['approve'])){
		approve($nic,$conn);		
	}

	//----------------------------**Reject applications*----------------------------
	if(isset($_POST['reject'])){

		
		$reason=$_POST['reason'];
		$to=$email;
		$subject="DSP GROUP MICRO CREDITS";
		$body="Dear ".$nameWithInitials.",<br><br>"."Sorry! your application is rejected because of following reasons<br><br>".$reason."<br><br>Apply again after fulfilling these reasons.<br><br>Thank You!<br>Manager<br>(DSP GROUP MICRO CREDITS)";
		//echo $body."<br>";
		sendmail($body,$subject,$to);
		delete($nic,$conn);
	}

	//---------------------------function for approve-----------------------------
	function approve($nic,$conn){  

	  $sql3 = "UPDATE customer SET loanStatus='P' WHERE nic='$nic'";
	  if ($conn->query($sql3) === TRUE) {
	        echo "<script>window.alert('System Updated');</script>";
	    } else {
	        echo "<script>alert('Error Occured!');</script>";
	    }             
  	}

//---------------------------function for delete-----------------------------
	function delete($nic,$conn){  

	  $sql2 = "DELETE FROM  customer WHERE nic='$nic'";
	  if ($conn->query($sql2) === TRUE) {
	        echo "<script>window.alert('Application Removed Sucessfully');</script>";
	    } else {
	        echo "<script>alert('Error Occured!');</script>";
	    }             
  	}

 ?>


 <?php 

 	function sendmail($body,$subject,$to){
 		$headers ="Mail";
 		include "classes/class.phpmailer.php";
		$mail=new PHPMailer();
		$mail->IsSMTP();
		$mail->SMTPDebug=1;
		$mail->SMTPAuth=true;
		$mail->SMTPSecure='ssl';
		$mail->Host="smtp.gmail.com";
		$mail->Port=465;
		$mail->IsHTML(true);
		$mail->Username=("nemodorylab2018@gmail.com");
		$mail->Password="computerlab";
		$mail->SetFrom("nemodorylab2018@gmail.com");

		$mail->Subject=$subject;
		$mail->Body=$body;
		$mail->AddAddress($to);

		if(!$mail->Send()){
				echo "Mailer Erro";
			}
		else{
				echo "Mail is sent successfully";
			}
 	}

  ?>

 <!DOCTYPE html>
<html>
<head>
	<title>loan requests</title>
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/button.css">
	<style type="text/css">
		h4{
			background-color:  #ccebff;
			padding: 8px;
		}
		.textarea{
			padding: 6px;
			width: auto;
			border-radius: 4px;
			border-width: 1px;
			width: 100%;
			margin-bottom: 1vh;
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
    <div class="col-sm-8">
    	<form action="mRequests.php?cid=<?php echo $cid; ?>"  method ="POST"> 
	        <input type="submit"  name="approve" value="Approve" onclick="return confirm ('Are You sure to Approve this Application?');"><br>
	        <label>
	        Reason to reject:</label><br>
	         <textarea name="reason" rows="3" cols="30" class="textarea"></textarea><br>
	        <input type="submit" name="reject" value="Reject" onclick="return confirm ('Are You sure to Reject this Application?');">
	       
	        <br>
        </form>
	</div>

  </div>

    
	</body>
</html>
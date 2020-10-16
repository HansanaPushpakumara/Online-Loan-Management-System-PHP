<?php
	$Date=date("Y.m.d");
 ?>
<?php 
require_once("connection.php");
	$NIC=$_GET['usernic'];
	$userCategory=$_GET['userCategory'];
	
	if($userCategory=="Customer"){
		$queryc="SELECT* FROM customer WHERE nic='$NIC'";
		$result=$conn->query($queryc);
		$row=$result->fetch_assoc();
		if($result->num_rows > 0){
			$UID=$row['customerId'];
			$NWI=$row['nameWithInitials'];
			$Email=$row['email'];
			$mobileNo=$row['mobileNo'];
		}
	}

	if($userCategory=="Admin"){
		$queryc="SELECT* FROM admin WHERE nic='$NIC'";
		$result=$conn->query($queryc);
		$row=$result->fetch_assoc();
		if($result->num_rows > 0){
			$UID=$row['adminId'];
			$NWI=$row['nameWithInitials'];
			$Email=$row['email'];
			$mobileNo=$row['phoneNo'];
		}
	}

	if($userCategory=="Manager"){
		$queryc="SELECT* FROM manager WHERE nic='$NIC'";
		$result=$conn->query($queryc);
		$row=$result->fetch_assoc();
		if($result->num_rows > 0){
			$UID=$row['managerId'];
			$NWI=$row['nameWithInitials'];
			$Email=$row['email'];
			$mobileNo=$row['phoneNo'];
		}
	}

	if($userCategory=="Officer"){
		$queryc="SELECT* FROM officer WHERE nic='$NIC'";
		$result=$conn->query($queryc);
		$row=$result->fetch_assoc();
		if($result->num_rows > 0){
			$UID=$row['officerId'];
			$NWI=$row['nameWithInitials'];
			$Email=$row['email'];
			$mobileNo=$row['phoneNo'];
		}
	}

	if($userCategory=="Cash Collector"){
		$queryc="SELECT* FROM cashcollector WHERE nic='$NIC'";
		$result=$conn->query($queryc);
		$row=$result->fetch_assoc();
		if($result->num_rows > 0){
			$UID=$row['cc_Id'];
			$NWI=$row['nameWithInitials'];
			$Email=$row['email'];
			$mobileNo=$row['phoneNo'];
		}
	}

 ?>




<?php 
	session_start();
	if(isset($_SESSION['username'])==null){
		header("location:loginpage.php");
	}
	require_once("connection.php");
	//$username="960292260v";
	$username=$_SESSION['username'];
	$sql = "SELECT* FROM admin WHERE nic='$username'";
    $result=$conn->query($sql);
    $row=$result->fetch_assoc();
    $nwi=$row['nameWithInitials'];
    $email=$row['email'];
 ?>

 <?php 
	require_once("countbar.php");
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>admincustomerreg</title>
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	<style type="text/css">
		.navbtns{
			background-color: white;
			width: 100%;
			padding: 15px 20px;
            border-color: #d6d6c2;
            border-width: 1px;
            border-left: none;
            border-right:none;
            border-top:  none;
            cursor: pointer;
            text-align: left;
		}
		.navbtns:hover{
			background-color: #f5f5f0;
		}
		.usercount{

			text-align: center;
			padding-top: 5px;
			font-size: 25px;
		}
		.userTitle{
			text-align: center;
		}
		.searchinput{
			padding: 6px;
			width: auto;
			border-radius: 4px;
			border-width: 1px;
			width: 100%;
			margin-bottom: 1vh;
		}
		.searchbtn{
			width: auto;
            background-color: #009999;
            color: white;
            padding: 7px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            float:  left;
            margin:auto;
		}
		.searchbtn:hover{
			background-color:#2eb8b8;
		}
		.formbtn{
			width: auto;
            background-color: #009999;
            color: white;
            padding: 10px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            float:  left;
		}
		.formbtn:hover{
			background-color:#2eb8b8;
		}
		.btnvuser{
			
			 padding: 5px 20px;
			margin:8px 0;
		}
	</style>
</head>
<body><?php// require_once("header.php"); ?>

	<div class="container-fluid"><!---main container start--->

		<div class="row"><!---search content start--->
			<div class="col-sm-3">
				<h4 style="background-color: #e6fff9;padding: 2vh;"><i class="glyphicon glyphicon-user"></i> Administrator</h4>
					
			</div>
			<div class="col-sm-9">
				<div class="row" style="margin-bottom: 2vh;background-color:  #006666;padding: 2vh;"><!--search content start--------->
					<div class="col-sm-9">
						<form action="adminviewuser.php?usernic=<?php echo $NIC; ?>&userCategory=<?php echo $userCategory; ?>" method="POST">
							<div class="col-sm-7">
							<input type="text" name="searchkey" class="searchinput" placeholder="Enter user NIC"></div>
							<div class="col-sm-3">
							<input type="submit" name="search" value="Search User" class="searchbtn">
							</div>
						</form>
						<span id="msg1" style="color: white;">
						
						</span>
					</div>
					<?php
					//=======================search script=================================================
					function searchUsers($conn,$searchkey){
						$searchquery="SELECT* FROM login WHERE username='$searchkey'";
						$result=$conn->query($searchquery);
						$row=$result->fetch_assoc();
						if($result->num_rows > 0){
							$NIC=$row["userName"];
							$userCategory=$row["userCategory"];
							echo $NIC;
							echo $userCategory;
							header("location:adminviewuser.php?usernic=$NIC&userCategory=$userCategory");
						}
						else{
							//echo "User not available";
							?>
								<script type="text/javascript">
					                document.getElementById("msg1").innerHTML = "User is not Available";
					            </script>
							<?php
						}
					    
					}
					if(isset($_POST["search"])){ 
						require_once("connection.php");
						$searchkey=$_POST['searchkey'];
						searchUsers($conn,$searchkey);
					}

					//=======================search script end ***=========================================


					 ?>

					<div class="col-sm-3" style="text-align: right;">
						
						<a href="home.php"><p style="color: white;margin-top: 1vh;"><i class="glyphicon glyphicon-home"></i> Home</p></a>
						
					</div>
				</div><!--search content end--------->	
			</div>
		</div>
		

		<div class="row"><!---main row start--->

			<div class="col-sm-3"> <!--left content start---------->
				<div class="row">
					<div class="col-sm-12">
					<label><?php echo $nwi; ?></label>
					<p><?php echo $username; ?></p>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12">
						<form action="." method="POST">
							<button class="navbtns" formaction="admindashboard.php"><i class="glyphicon glyphicon-dashboard"></i> Dashboard</button>
							<button class="navbtns" formaction="admincustomerreg.php"><i class="glyphicon glyphicon-thumbs-up"></i> Customer Registration</button>
							<button class="navbtns" formaction="adminstaffreg.php"><i class="glyphicon glyphicon-briefcase"></i> Staff Registration</button>
							<button class="navbtns" formaction="adminnewloan.php"><i class="glyphicon glyphicon-usd"></i> Add New Loan</button>
							<button class="navbtns" formaction="admintableview.php"><i class="glyphicon glyphicon-list-alt"></i> View Tables</button>
							<button class="navbtns" formaction="adminmail.php"><i class="glyphicon glyphicon-envelope"></i> Email Box</button>
						</form>
					</div>
				</div>

			</div><!--left content end-------#f2f2f2------>	


			<div class="col-sm-9"  style="background-color: ;padding-top: 0vh;"><!--right content start--------->
								

				



				<div class="row" style="background-color: #f0f5f5;padding-bottom:5vh;padding-top: 2vh;"><!---reg forms---------->
					<div class="col-sm-1"></div>
					<div class="col-sm-9">
						<h4>View Users</h4>
						<div class="table-responsive">
							<table class="table">
								<tbody>
								      <tr>
								        <td>User ID</td>
								        <td><?php echo $UID; ?></td>
								      </tr>
								      <tr>
								        <td>User Category</td>
								        <td><?php echo $userCategory; ?></td>
								      </tr>
								      <tr>
								        <td>Name</td>
								        <td><?php echo $NWI; ?></td>
								      </tr>
								      <tr>
								        <td>NIC Number</td>
								        <td><?php echo $NIC; ?></td>
								      </tr>
								      <tr>
								        <td>Mobile Number</td>
								        <td><?php echo $mobileNo; ?></td>
								      </tr>
								      <tr>
								        <td>Email Address</td>
								        <td><?php echo $Email; ?></td>
								      </tr>
							    </tbody>
							</table>
						</div>
						<form action="adminviewuser.php?usernic=<?php echo $NIC; ?>&userCategory=<?php echo $userCategory; ?>" method="POST">

							<input type="hidden" name="userName" value="<?php echo $NIC;?>">
							<input type="submit" name="newpw" value="Issue New Password" class="btnvuser" onclick="return confirm('Issue New Password?');">
							<input type="submit" name="removeAccess" value="Remove Access" class="btnvuser" onclick="return confirm('This user no longer be able to access the system.');">
							<input type="submit" name="removeUser" value="Remove" class="btnvuser" onclick="return confirm('All the records of this user will be removed.\nUser no longer be able to access the system.');">
							
						</form>
						<?php
				//+============================Issue new pw=======================
						if(isset($_POST["newpw"])){
							$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
						     $password=substr( str_shuffle( $chars ), 0, 8 );
						     $pwencrypted=md5($password);
						     
						     //echo $password;
						     //echo $loginuid;
						     require_once("connection.php");
						     $sql = "UPDATE login SET password='$pwencrypted' , Activated='N' WHERE userName='$NIC'"; //changed

							if ($conn->query($sql) === TRUE) {
								//echo "PW changed";
								//echo $password;
								?>
								<div class="row">
									<div class="col-sm-6">
									<h4>Password Changed succesfully</h4>
									<form action="adminviewuser.php?usernic=<?php echo $NIC; ?>&userCategory=<?php echo $userCategory; ?>" method="POST">
										New Password:<br>
										<input type="password" name="newpwd" value="<?php echo $password; ?>" class="searchinput" style="border-color: black;" id="pw" readonly><br>
										<input type="checkbox" onclick="myFunction()"> Show Password<br>
										<script>
										function myFunction() {
										  var x = document.getElementById("pw");
										  if (x.type === "password") {
										    x.type = "text";
										  } else {
										    x.type = "password";
										  }
										}
										</script>
										Send To:<br>
										<input type="text" name="uemail" value="<?php echo $Email; ?>" class="searchinput" style="border-color: black;" readonly ><br>
										<input type="submit" name="sendpw" value="Send Password" class="btnvuser">
										
									</form>
									</div>
									</div>
								<?php
							}
							else{
								echo "Password Not Changed!";
							}
						}
				//=====================isue pw end==============================
						//=======================sending pw====================================>
						if(isset($_POST['sendpw'])){
							$to = $_POST['uemail'];
					        $subject = 'DSP Group Micro Credits';
					        $message = "Dear ".$NWI.",\n\n"."Your Password has been changed as you requested\n"."Your Username : ".$NIC."\nYour New Login Password : ".$_POST['newpwd']."\n\nSystem Administrator\n(DSP GROUP MICRO CREDITS)";
					        $headers = 'From:nemodorylab2018@gmail.com';
					      
					       
					          if (mail($to,$subject,$message,$headers)){
					              echo "<p style='color:blue;'>Email Sent Successfully.</p>";
					             echo "<script>alert('Email Sent Successfully.');</script>";
					          }
					          else{
					            /*echo "<h5 style='color:red;'>";
					              echo "Sending Failed! Check Your Internet Connection";
					            echo "</h5>";*/
					            //echo "<script>alert('Sending Failed!');</script>";
					            echo $message;
					            echo "<p style='color:red;'>Sending Failed. Try again!</p>";

					          } 
						}
					//================sending pw end=========================.
						?>
					</div>
				</div>

			</div><!--right content end--------->



		</div><!---main row end--->

	</div> <!---main container end--->



</body>
</html>

<?php 

//======================removing Access=================================>
	if(isset($_POST["removeAccess"])){
		//============remove admin================>
	     if($userCategory=="Admin"){
	     	?>
	     	<script type="text/javascript">alert("Admin Can't Remove Admin");</script>
	     	<?php
	     }
		//============remove cc================>
	     if($userCategory=="Cash Collector"){

	     	$query1="SELECT* FROM customerloandetails WHERE ccId='$UID'";
			$result1=$conn->query($query1);
			if($result1->num_rows > 0){
				while($row=$result1->fetch_assoc()){
					$customerId=$row['customerId'];
					echo $customerId."<br>";

					$query2="SELECT* FROM customer WHERE customerId='$customerId'";
					$result2=$conn->query($query2);
					if($result2->num_rows > 0){
						while($row=$result2->fetch_assoc()){
							$customerEmail=$row['email'];
							echo $customerEmail."<br>";
							$to=$customerEmail;
							sendmail($to);
						}
						
					}
				}
				
			}
			else{

			}
			removelogin($NIC,$conn);
			//removecc($NIC,$conn);
		 }
		//============remove Manager================>
	     if($userCategory=="Manager"){
	     	?>
	     	<script type="text/javascript">alert("You Can't Remove Manager");</script>
	     	<?php
	     }
	     //============remove officer customer================>
	     if($userCategory=="Officer"||$userCategory=="Customer"){
	     	removelogin($NIC,$conn);
	     }


	}
	//===========================*** remove access end ***================================>

	//=========================== remove user ================================>
			if(isset($_POST["removeUser"])){
									//============remove admin================>
				     if($userCategory=="Admin"){
				     	?>
				     	<script type="text/javascript">alert("Admin Can't Remove Admin");</script>
				     	<?php
				     }
					//============remove cc================>
				     if($userCategory=="Cash Collector"){

				     	$query1="SELECT* FROM customerloandetails WHERE ccId='$UID'";
						$result1=$conn->query($query1);
						if($result1->num_rows > 0){
							while($row=$result1->fetch_assoc()){
								$customerId=$row['customerId'];
								//echo $customerId."<br>";

								$query2="SELECT* FROM customer WHERE customerId='$customerId'";
								$result2=$conn->query($query2);
								if($result2->num_rows > 0){
									while($row=$result2->fetch_assoc()){
										$customerEmail=$row['email'];
										echo $customerEmail."<br>";
										$to=$customerEmail;
										sendmail($to);

									}
									
								}
							}
							
						}
						else{

						}
						removecc($NIC,$conn);
						removelogin($NIC,$conn);
					 }
					//============remove Manager================>
				     if($userCategory=="Manager"){
				     	?>
				     	<script type="text/javascript">alert("You Can't Remove Manager");</script>
				     	<?php
				     }
				     //============remove officer ================>
				     if($userCategory=="Officer"){
				     	removelogin($NIC,$conn);
				     	removeofficer($NIC,$conn);
				     }
				     //============remove customer ================>
				     if($userCategory=="Customer"){
				     	removecustomer($NIC,$conn);
				     	removelogin($NIC,$conn);	
				     }
			}
 ?>

 <?php 

 //==================================remove functions===========================>
 		function removelogin($NIC,$conn){
 			$sql = "DELETE FROM login WHERE userName='$NIC'";

			if ($conn->query($sql) === TRUE) {
		         // echo "User Removed Succesfully";
		         echo "<script>window.alert('Removed Access');
			window.location.assign('admincustomerreg.php');</script>";      
		          
		    } else {
		       echo "Error occured";         
		       //echo "Error deleting record: " . $conn->error;
		     }
 		}

//======================remove officer========================>
 		function removeofficer($NIC,$conn){
			$sql = "DELETE FROM officer WHERE nic='$NIC'";

			if ($conn->query($sql) === TRUE) {
		         // echo "User Removed Succesfully";
		         echo "<script>window.alert('User Removed Succesfully');
			window.location.assign('admincustomerreg.php');</script>";      
		          
		    } else {
		       echo "Error occured";         
		       //echo "Error deleting record: " . $conn->error;
		     }
 		}

//======================remove customer========================>
 		function removecustomer($NIC,$conn){
			$sql = "DELETE FROM customer WHERE nic='$NIC'";

			if ($conn->query($sql) === TRUE) {
		         // echo "User Removed Succesfully";
		         echo "<script>window.alert('User Removed Succesfully');
			window.location.assign('admincustomerreg.php');</script>";      
		          
		    } else {
		       echo "Error occured";         
		       //echo "Error deleting record: " . $conn->error;
		     }
 		}

//======================remove cashcollector========================>
 		function removecc($NIC,$conn){
			$sql = "DELETE FROM cashcollector WHERE nic='$NIC'";

			if ($conn->query($sql) === TRUE) {
		         // echo "User Removed Succesfully";
		         echo "<script>window.alert('User Removed Succesfully');
			window.location.assign('admincustomerreg.php');</script>";      
		          
		    } else {
		       echo "Error occured";         
		       //echo "Error deleting record: " . $conn->error;
		     }
 		}

//======================remove admin========================>
 		function removeadmin($NIC,$conn){
			$sql = "DELETE FROM admin WHERE nic='$NIC'";

			if ($conn->query($sql) === TRUE) {
		         // echo "User Removed Succesfully";
		         echo "<script>window.alert('User Removed Succesfully');
			window.location.assign('admincustomerreg.php');</script>";      
		          
		    } else {
		       echo "Error occured";         
		       //echo "Error deleting record: " . $conn->error;
		     }
 		}


//=======================sending mail=====================================>
 		function sendmail($to){
			$subject = 'DSP Group Micro Credits';
			$message = "Dear Customer, Your Cash Collector has been changed.You will assigned a new cash collector within few days. You will informed about new cash collector later";
			$headers = 'From:nemodorylab2018@gmail.com';
					      
					       
			if (mail($to,$subject,$message,$headers)){
				echo "<p style='color:blue;'>Email Sent Successfully.</p>";
				echo "<script>alert('Email Sent Successfully.');</script>";
			}
			else{
				echo "<p style='color:red;'>Sending Failed. Try again!</p>";
			} 			
 		}
?>

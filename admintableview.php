

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
    $NWI=$row['nameWithInitials'];
    $email=$row['email'];
 ?>

 <?php 
	require_once("countbar.php");
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>admintableview</title>
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/admin.css">
	<style type="text/css">
		ul {
		    list-style-type: none;
		    margin: 0;
		    padding: 0;
		    overflow: hidden;
		    background-color: white;
		}

		li {
		    float: left;
		}

		li a {
		    display: block;
		    color: black;
		    text-align: center;
		    padding: 14px 16px;
		    text-decoration: none;
		}

		li a:hover{
		    background-color:#e6ecff;
		}
	</style>
</head>
<body>

	<div class="container-fluid"><!---main container start--->

		<div class="row"><!---top content start--->
			<div class="col-sm-3">
				<h4 style="background-color: #e6fff9;padding: 2vh;"><i class="glyphicon glyphicon-user"></i> Administrator</h4>
					
			</div>
			<div class="col-sm-9">
				<!--================================search content start=================================--------->
				<div class="row" style="margin-bottom: 2vh;background-color:  #006666;padding: 2vh;">
					<div class="col-sm-9">
						<form action="admintableview.php" method="POST">
							<div class="col-sm-7">
							<input type="text" name="searchkey" class="searchinput" placeholder="Enter user NIC"></div>
							<div class="col-sm-3">
							<input type="submit" name="search" value="Search User" class="searchbtn">
							</div>
						</form>
						<span id="msg1" style="color: white;">
						
						</span>
					</div>
					

					<div class="col-sm-3" style="text-align: right;">
						
						<a href="home.php"><p style="color: white;margin-top: 1vh;"><i class="glyphicon glyphicon-home"></i> Home</p></a>
						
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
				</div>
				<!--=====================================search content end==================================--------->	
			</div>
		</div>
		

		<div class="row"><!---main row start--->

			<div class="col-sm-3"> <!--left content start---------->
				<div class="row">
					<div class="col-sm-12">
					<label><?php echo $NWI; ?></label>
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
				<div class="row">
					<ul>
						<li><a href="admintableview.php">Admins & Manager</a></li>
						<li><a href="admintableview.php?officer=true">Officers</a></li>
						<li><a href="admintableview.php?cc=true">Cash Collectors</a></li>
						<li><a href="admintableview.php?customer=true">Customers</a></li>
						<li><a href="admintableview.php?loan=true">Loans</a></li>
					</ul>
				</div>

				<div class="row" style="background-color: #f0f5f5;padding-bottom:3vh;padding-top: 2vh;">

					<div class="col-sm-12">
						<?php 
							if(isset($_GET['officer'])==null&&isset($_GET['cc'])==null&&isset($_GET['customer'])==null&&isset($_GET['loan'])==null&&isset($_GET['loanId'])==null){
								?>
								<h4 style="margin-left: 5px;">Adminstrators</h4>
								<div class="table-responsive">          
									  <table class="table">

									    <thead>
									      <tr>
									        <th>#</th>
									        <th>User ID</th>
									        <th>Name</th>
									        <th>NIC No</th>
									        <th>Email</th>
									        <th>Mobile</th>
									        <th><i class="glyphicon glyphicon-option-horizontal" style="color: black;"></i></th>
									      </tr>
									    </thead>

									    <tbody>
									    

										  <?php
										  	$query1="SELECT* FROM admin";
										  	$result1=$conn->query($query1);
										  	if ($result1->num_rows > 0) {
										  		$no=0;
					        					while($row=$result1->fetch_assoc()){
					        						$no++;
					        						?>
						        						<tr>
													        <td><?php echo $no; ?></td>
													        <td><?php echo $row['adminId']; ?></td>
													        <td><?php echo $row['nameWithInitials']; ?></td>
													        <td><?php echo $row['nic']; ?></td>
													        <td><?php echo $row['email']; ?></td>
													        <td><?php echo $row['phoneNo']; ?></td>
													        <td><a href="adminviewuser.php?usernic=<?php echo $row['nic']; ?>&userCategory=Admin"><i class="glyphicon glyphicon-folder-open" style="color: black;"></i></a></td>
												      	</tr>
											      	<?php
					        					}
					        				}
					        				else{
					        					echo "No data";
					        				}	

										   ?>

									  </tbody>
									</table>
								</div>


								<h4 style="margin-left: 5px;">Manager</h4>
								<div class="table-responsive">          
									  <table class="table">
									  	
									    <thead>
									      <tr>
									        <th>#</th>
									        <th>User ID</th>
									        <th>Name</th>
									        <th>NIC No</th>
									        <th>Email</th>
									        <th>Mobile</th>
									        <th><i class="glyphicon glyphicon-option-horizontal" style="color: black;"></i></th>

									      </tr>
									    </thead>

									    <tbody>
									    

										  <?php
										  	$query1="SELECT* FROM manager";
										  	$result1=$conn->query($query1);
										  	if ($result1->num_rows > 0) {
										  		$no=0;
					        					while($row=$result1->fetch_assoc()){
					        						$no++;
					        						?>
						        						<tr>
													        <td><?php echo $no; ?></td>
													        <td><?php echo $row['managerId']; ?></td>
													        <td><?php echo $row['nameWithInitials']; ?></td>
													        <td><?php echo $row['nic']; ?></td>
													        <td><?php echo $row['email']; ?></td>
													        <td><?php echo $row['phoneNo']; ?></td>
													        <td><a href="adminviewuser.php?usernic=<?php echo $row['nic']; ?>&userCategory=Manager"><i class="glyphicon glyphicon-folder-open" style="color: black;"></i></a></td>
												      	</tr>
											      	<?php
					        					}
					        				}
					        				else{
					        					echo "No data";
					        				}	

										   ?>

									  </tbody>
									</table>
								</div>

								<?php
							}
						 ?>
						 <?php 
							if(isset($_GET['officer'])!=null){
								?>
								<h4 style="margin-left: 5px;">Officers</h4>
								<div class="table-responsive">          
									  <table class="table">
									  	
									    <thead>
									      <tr>
									        <th>#</th>
									        <th>User ID</th>
									        <th>Name</th>
									        <th>NIC No</th>
									        <th>Email</th>
									        <th>Mobile</th>
									        <th><i class="glyphicon glyphicon-option-horizontal" style="color: black;"></i></th>
									      </tr>
									    </thead>

									    <tbody>
									    

										  <?php
										  	$query1="SELECT* FROM officer";
										  	$result1=$conn->query($query1);
										  	if ($result1->num_rows > 0) {
										  		$no=0;
					        					while($row=$result1->fetch_assoc()){
					        						$no++;
					        						?>
						        						<tr>
													        <td><?php echo $no; ?></td>
													        <td><?php echo $row['officerId']; ?></td>
													        <td><?php echo $row['nameWithInitials']; ?></td>
													        <td><?php echo $row['nic']; ?></td>
													        <td><?php echo $row['email']; ?></td>
													        <td><?php echo $row['phoneNo']; ?></td>
													        <td><a href="adminviewuser.php?usernic=<?php echo $row['nic']; ?>&userCategory=Officer"><i class="glyphicon glyphicon-folder-open" style="color: black;"></i></a></td>
												      	</tr>
											      	<?php
					        					}
					        				}
					        				else{
					        					echo "No data";
					        				}	

										   ?>

									  </tbody>
									</table>
								</div>
								<?php
							}
						 ?>
						 <?php 
							if(isset($_GET['cc'])!=null){
								?>
								<h4 style="margin-left: 5px;">Cash Collectors</h4>
								
								<div class="table-responsive">          
									  <table class="table">
									  	
									    <thead>
									      <tr>
									        <th>#</th>
									        <th>User ID</th>
									        <th>Name</th>
									        <th>NIC No</th>
									        <th>Email</th>
									        <th>Mobile</th>
									        <th><i class="glyphicon glyphicon-option-horizontal" style="color: black;"></i></th>
									      </tr>
									    </thead>

									    <tbody>
									    

										  <?php
										  	$query1="SELECT* FROM cashcollector";
										  	$result1=$conn->query($query1);
										  	if ($result1->num_rows > 0) {
										  		$no=0;
					        					while($row=$result1->fetch_assoc()){
					        						$no++;
					        						?>
						        						<tr>
													        <td><?php echo $no; ?></td>
													        <td><?php echo $row['cc_Id']; ?></td>
													        <td><?php echo $row['nameWithInitials']; ?></td>
													        <td><?php echo $row['nic']; ?></td>
													        <td><?php echo $row['email']; ?></td>
													        <td><?php echo $row['phoneNo']; ?></td>
													        <td><a href="adminviewuser.php?usernic=<?php echo $row['nic']; ?>&userCategory=Cash Collector"><i class="glyphicon glyphicon-folder-open" style="color: black;"></i></a></td>
												      	</tr>
											      	<?php
					        					}
					        				}
					        				else{
					        					echo "No data";
					        				}	

										   ?>

									  </tbody>
									</table>
								</div>

								<?php
							}
						 ?>
						 <?php 
							if(isset($_GET['customer'])!=null){
								?>
								<h4 style="margin-left: 5px;">Customers</h4>
								<div class="table-responsive">          
									  <table class="table">
									  	
									    <thead>
									      <tr>
									        <th>#</th>
									        <th>User ID</th>
									        <th>Name</th>
									        <th>NIC No</th>
									        <th>Email</th>
									        <th>Mobile</th>
									        <th><i class="glyphicon glyphicon-option-horizontal" style="color: black;"></i></th>
									      </tr>
									    </thead>

									    <tbody>
									    

										  <?php
										  	$query1="SELECT* FROM customer";
										  	$result1=$conn->query($query1);
										  	if ($result1->num_rows > 0) {
										  		$no=0;
					        					while($row=$result1->fetch_assoc()){
					        						$no++;
					        						?>
						        						<tr>
													        <td><?php echo $no; ?></td>
													        <td><?php echo $row['customerId']; ?></td>
													        <td><?php echo $row['nameWithInitials']; ?></td>
													        <td><?php echo $row['nic']; ?></td>
													        <td><?php echo $row['email']; ?></td>
													        <td><?php echo $row['mobileNo']; ?></td>
													        <td><a href="adminviewuser.php?usernic=<?php echo $row['nic']; ?>&userCategory=Customer"><i class="glyphicon glyphicon-folder-open" style="color: black;"></i></a></td>
												      	</tr>
											      	<?php
					        					}
					        				}
					        				else{
					        					echo "No data";
					        				}	

										   ?>

									  </tbody>
									</table>
								</div>
								<?php
							}
						 ?>

						 <?php
						 	if(isset($_GET['loan'])!=null){
						 		?>
						 		<h4 style="margin-left: 5px;">Loans <a href="adminnewloan.php"><span class="addloan" style="float:right;font-size: 15px;margin-right: 20px;">+Add New</span></a></h4>
								<div class="table-responsive">          
									  <table class="table">
									  	
									    <thead>
									      <tr>
									        <th>#</th>
									        <th>Loan ID</th>
									        <th>Loan Type</th>
									        <th>Payment Method</th>
									        <th>Loan Duration</th>
									        <th>Interest Rate</th>
									        <th><i class="glyphicon glyphicon-option-horizontal" style="color: black;"></i></th>
									      </tr>
									    </thead>

									    <tbody>
									    

										  <?php
										  	$query1="SELECT* FROM loan";
										  	$result1=$conn->query($query1);
										  	if ($result1->num_rows > 0) {
										  		$no=0;
					        					while($row=$result1->fetch_assoc()){
					        						$no++;
					        						?>
						        						<tr>
													        <td><?php echo $no; ?></td>
													        <td><?php echo $row['loanId']; ?></td>
													        <td><?php echo $row['loantype']; ?></td>
													        <td><?php echo $row['paymentMethods']; ?></td>
													        <td><?php echo $row['loanDuration']; ?></td>
													        <td><?php echo $row['interestrate']; ?> %</td>
													        <td><a href="admintableview.php?editloan=true&loanId=<?php echo $row['loanId']; ?>"><i class="glyphicon glyphicon-edit" style="color: black;"></i></a> <a href="admintableview.php?removeloan=true&loanId=<?php echo $row['loanId']; ?>" onclick="return confirm('Do you need remove this loan?');"><i class="glyphicon glyphicon-trash" style="color: black;margin-left: 10px;"></i></a></td>
												      	</tr>
											      	<?php
					        					}
					        				}
					        				else{
					        					echo "No data";
					        				}	

										   ?>

									  </tbody>
									</table>
								</div>
						 		<?php
						 	}
						 ?>

						 <?php
						 			if(isset($_GET['removeloan'])!=null&&$_GET['loanId']!=null){
						 				$loanId=$_GET['loanId'];
						 				$sql = "DELETE FROM loan WHERE loanId='$loanId'";

										if ($conn->query($sql) === TRUE) {
									         // echo "User Removed Succesfully";
									         echo "<script>window.alert('Loan Removed Succesfully');
										window.location.assign('admintableview.php?loan=true');</script>";      
									          
									    } else {
									       echo "Error occured";         
									       //echo "Error deleting record: " . $conn->error;
									     }
						 			}


						 			if(isset($_GET['editloan'])!=null&&$_GET['loanId']!=null){
						 						$loanId=$_GET['loanId'];
						 						$sql = "SELECT* FROM loan WHERE loanId=$loanId";
									    $result=$conn->query($sql);
									    $row=$result->fetch_assoc();
									    
									    $loantype=$row['loantype'];
									    $paymentMethods=$row['paymentMethods'];
									    $loanDuration=$row['loanDuration'];
									    $interestrate=$row['interestrate'];

									    ?>
									    <div class="row">
									    	<div class="col-sm-1"></div>
									    	<div class="col-sm-6">
											    	<p class="cls" style="float: right;"><a href="admintableview.php?loan=true"><i class="glyphicon glyphicon-remove"></i></a></p>
											    	<h4>Update Loan</h4><br>
											 		<form action="admintableview.php?editloan=true&loanId=<?php echo $row['loanId']; ?>" method="POST">
											 			<input type="hidden" name="loanId" value="<?php echo $loanId; ?>" class="form-control">
											 			Loan Type:<br>
											 			<input type="text" name="loantype" value="<?php echo $loantype; ?>" class="form-control"><br>
											 			Payment Method:<br>
											 			<input type="text" name="paymentMethods" value="<?php echo $paymentMethods; ?>" class="form-control"><br>
											 			Loan Duration:<br>
											 			<input type="text" name="loanDuration" value="<?php echo $loanDuration; ?>" class="form-control"><br>
											 			Interest Rate:<br>
											 			<input type="number" name="interestrate" title=" Numbers Only" min="1" max="25" value="<?php echo $interestrate; ?>" class="form-control"><br>
											 			<input type="submit" name="updateLoan" value="Update" class="formbtn">
											 		</form>   		
									 		</div>
									 		</div>
									    <?php

									    if(isset($_POST['updateLoan'])){
									    	$loanId=$_POST['loanId'];
									    	$loantype=$_POST['loantype'];
										    $paymentMethods=$_POST['paymentMethods'];
										    $loanDuration=$_POST['loanDuration'];
										    $interestrate=$_POST['interestrate'];

									    	$sql = "UPDATE loan SET loantype='$loantype',paymentMethods='$paymentMethods',loanDuration='$loanDuration',interestrate='$interestrate' WHERE loanId=$loanId";

											if ($conn->query($sql) === TRUE) {
											    //echo "Loan updated successfully";
											    echo "<script>window.alert('Loan updated successfully');
			window.location.assign('admintableview.php?editloan=true&loanId=$loanId');</script>";
											} else {
											    echo "Error updating Loan: ";
											}

									    }

						 			}


						 ?>

					</div>

				</div>

		</div><!--right content end--------->
			</div><!-----main row  end------>



		

	</div> <!---main container end--->



</body>
</html>


<?php 
	

 ?>
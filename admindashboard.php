

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
	<title>admindashboard</title>
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/admin.css">
	<style type="text/css">
		#myProgress {
		  position: relative;
		  width: 100%;
		  height: 30px;
		  background-color: #ddd;
		  margin-bottom: 15px;
		}

		#myBar {
		  position: absolute;
		  
		  height: 100%;
		  background-color: #4CAF50;
		}

		#label {
		  text-align: center;
		  line-height: 30px;
		  color: white;
		}
		.countTitle{
			font-size: 18px;
			margin-left: 15px;
			font-weight: lighter;
		}
		h4{
text-decoration: underline;
		}
	</style>
</head>
<body>

	<div class="container-fluid"><!---main container start--->

		<div class="row"><!---top content start--->
			<div class="col-sm-3">
				<h4 style="background-color: #e6fff9;padding: 2vh;text-decoration: none;"><i class="glyphicon glyphicon-user"></i> Administrator</h4>
					
			</div>
			<div class="col-sm-9">
				<!--================================search content start=================================--------->
				<div class="row" style="margin-bottom: 2vh;background-color:  #006666;padding: 2vh;">
					<div class="col-sm-9">
						<form action="admindashboard.php" method="POST">
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
								

				<div class="row"><!----countbar start----->
					<div class="col-sm-3" style="background-color: #d6f5f5;">
						<p class="usercount"><?php echo $TotalUsers; ?></p>
						<p class="userTitle">Total Registered Users</p>
					</div>
					<div class="col-sm-3" style="background-color: #d6f5f5;">
						<p class="usercount"><?php echo $Customers; ?></p>
						<p class="userTitle">Total Customers</p>
					</div>
					<div class="col-sm-3" style="background-color: #d6f5f5;">
						<p class="usercount"><?php echo $Officers; ?></p>
						<p class="userTitle">Total Officers</p>
					</div>
					<div class="col-sm-3" style="background-color: #d6f5f5;margin-bottom: 2vh;">
						<p class="usercount"><?php echo $CC; ?></p>
						<p class="userTitle">Total Cash Collectors</p>
					</div>
				</div><!----countbar end----->

				

				<div class="row"><!---percentage progress bar----->
				
				</div>


				<?php 
					require_once("connection.php");
					//total customers=============
					$query1 = "SELECT* FROM customer";
				    $result1 = $conn->query($query1);
				    $TCustomers=$result1->num_rows;

				    //Registered customers=====
				    $regCustomers=$Customers;

				    $regCustomersP=$Customers/$TCustomers;
				    $regCustomersPV=round($regCustomersP*100,1);
				    $regCustomersPrecent=$regCustomersPV."%";
				    //echo $regCustomersPrecent;

				    //Active customers=======
				    $query2 = "SELECT* FROM login WHERE userCategory='Customer' AND Activated='Y'";
				    $result2 = $conn->query($query2);
				    $ACustomers=$result2->num_rows;

				    $ACustomersP=$ACustomers/$TCustomers;
				    $ACustomersPV=round($ACustomersP*100,1);
				    $ACustomersPrecent=$ACustomersPV."%";
				    //echo $ACustomersPrecent;
				   
				  	//applied loans===========
				    $query3 = "SELECT* FROM customerloandetails";
				    $result3 = $conn->query($query3);
				    $appliedLoans=$result3->num_rows;

				    //approved loans===========
				    $query4 = "SELECT* FROM customer WHERE loanStatus='APP'";
				    $result4 = $conn->query($query4);
				    $approvedLoans=$result4->num_rows;

				    $ALoansP=$approvedLoans/$appliedLoans;
				    $ALoansPV=round($ALoansP*100,1);
				    $ALoansPrecent=$ALoansPV."%";
				    //echo $ALoansPrecent;

				    

				 ?>

				 <div class="row" style="background-color: #f0f5f5;padding-bottom:2vh;padding-top: 2vh;margin-bottom: 2vh;">
				 	<div class="col-sm-1"></div>
				 	<div class="col-sm-9">
				 		<h4>Users Activity</h4>
						<span> Active Users</span><label style="font-size: 20px;margin-left: 20px;"><?php echo $Active; ?></label><br>
						<div id="myProgress">
						  <div id="myBar" style="width: <?php echo $ActPercentage; ?>%;">
						    <div id="label"><?php echo $ActPercentage; ?>%</div>
						  </div>
						</div>
				 	</div>
				 </div>

				<div class="row" style="background-color: #f0f5f5;padding-bottom:5vh;padding-top: 2vh;"><!---reg forms---------->
					<div class="col-sm-1"></div>
					<div class="col-sm-9">
						

						<h4>Customers Activity</h4>
						<span> Total Customers</span><label class="countTitle"><?php echo $TCustomers; ?></label><br>
						<span> Registered Customers</span><label class="countTitle""><?php echo $regCustomers; ?></label>

						<div id="myProgress">
						  <div id="myBar" style="width: <?php echo $regCustomersPrecent; ?>;">
						    <div id="label"><?php echo $regCustomersPrecent; ?></div>
						  </div>
						</div>

						<span> Active Customers</span><label class="countTitle" ><?php echo $ACustomers; ?></label>
						<div id="myProgress">
						  <div id="myBar" style="width: <?php echo $ACustomersPrecent;  ?>;">
						    <div id="label"><?php echo $ACustomersPrecent;  ?></div>
						  </div>
						</div>

						<h4>Loan Giving Progress</h4>
						<span> Applied Loans</span><label class="countTitle"><?php echo $appliedLoans; ?></label><br>
						<span> Approved Loans</span><label class="countTitle"><?php echo $approvedLoans; ?></label>
						<div id="myProgress">
						  <div id="myBar" style="width: <?php echo $ALoansPrecent; ?>;">
						    <div id="label"><?php echo $ALoansPrecent; ?></div>
						  </div>
						</div>

					</div>
				</div>

			</div><!--right content end--------->



		</div><!---main row end--->

	</div> <!---main container end--->



</body>
</html>

<?php 


 ?>
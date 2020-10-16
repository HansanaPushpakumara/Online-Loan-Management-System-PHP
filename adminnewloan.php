
<?php 



function addloan($loantype,$paymentMethods,$interestRate,$conn,$loanDuration){

        
        $sql = "INSERT INTO loan (loantype,paymentMethods,interestRate,loanDuration) VALUES ('$loantype','$paymentMethods','$interestRate','$loanDuration')";
       
        if ($conn->query($sql) === TRUE) {
        //echo "New Loan was added Sucessfully";
        	echo "<script>alert('New Loan added Sucessfully');</script>";
        } 
        else{
            echo "Something Went wrong!!!";
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    if(isset($_POST["AddLoan"])){ 

        $loantype=$_POST['loantype'];
        $paymentMethods=$_POST['paymentMethods'];
        $interestRate=$_POST['interestRate'];
        $loanDuration=$_POST['loanDuration'];
        require_once("connection.php");
        addloan($loantype,$paymentMethods,$interestRate,$conn,$loanDuration);
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
    $NWI=$row['nameWithInitials'];
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
	<link rel="stylesheet" href="css/admin.css">
	<style type="text/css">
		
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
						<form action="adminnewloan.php" method="POST">
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

				<div class="row" style="background-color: #f0f5f5;padding-bottom:5vh;padding-top: 2vh;"><!---reg forms---------->
					<div class="col-sm-1"></div>
					<div class="col-sm-9">
						<p class="chead" style="font-size: 25px;margin-top: 10px;"><i class="glyphicon glyphicon-usd"></i> Add New Loan<p>
			        	<!------------ form------------------->
			            <form action="adminnewloan.php" method="POST" autocomplete="on" >
			                Loan Type:<br> <input type="text" name="loantype" class="form-control" placeholder="Enter Loan Type Ex:Personal" required><br/>
			                Payment Method:<br> 
			                <!--
			                <input type="text" name="paymentMethods" class="form-control" placeholder="Enter Payment Method Ex:Monthly" required><br/>-->

			                <select name="paymentMethods" class="form-control">
			                			<option value="">- Select Payement Method -</option>
				                        <option value="Monthly">Monthly</option>
				                        <option value="Weekly">Weekly</option>
				                        <option value="Daily">Daily</option>           
				            </select><br>
			                Loan Duration:<br> <input type="text" name="loanDuration" class="form-control" placeholder="Enter Loan Duration as a number Ex:12 " required><br/>
			                Interest Rate:<br> <input type="number" name="interestRate" autocomplete="off"  maxlength="2" min="1" max="25"  class="form-control" placeholder="Enter Numbers Only" required><br/>
			                <input type="submit" value="Add Loan" class="formbtn" name="AddLoan" onclick="return confirm('Do you need add this Loan?');">
			                <input type="reset" name="clr" value="Clear" class="formbtn" style="margin-left: 1vh;">
			            </form>
			        	<!------------form end------------------->
					</div>
				</div>

			</div><!--right content end--------->



		</div><!---main row end--->

	</div> <!---main container end--->



</body>
</html>

<?php 


 ?>
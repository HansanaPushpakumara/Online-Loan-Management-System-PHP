<?php
	$Date=date("Y.m.d");
 ?>

<?php
//**********session***************
    session_start();
    $uName=$_SESSION['uName'];
    $uCategory=$_SESSION['uCategory'];
    $uEmail=$_SESSION['uEmail'];
    $uPassword=$_SESSION['uPassword'];
    
    if($uName==null){
    	header("location:admindashboard.php");
    }
 ?>

<?php 
	//session_start();
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
						<form action="registrationsuccess.php" method="POST">
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
						<p class="userTitle">Total Users</p>
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






				<div class="row" style="background-color: #f0f5f5;padding-bottom:5vh;padding-top: 2vh;"><!---reg forms---------->
					<div class="col-sm-1"></div>
					<div class="col-sm-6">
						<p class="chead" style="font-size: 20px;margin-top: 10px;"><i class="glyphicon glyphicon-"></i>User has been added successfully<p>
							<form action="registrationsuccess.php" method="POST">
								User Category:<br>
								<input type="text" name="uCat" value="<?php echo $uCategory; ?>" class="searchinput" readonly><br>
								Username:<br>
								<input type="text" name="uName" value="<?php echo $uName; ?>" class="searchinput" readonly><br>
								Password:<br>
								<input type="password" name="pwd" value="<?php echo $uPassword; ?>" class="searchinput" id="pw" readonly><br>
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
								Email:<br>
								<input type="text" name="uemail" value="<?php echo $uEmail; ?>" class="searchinput" readonly><br>
								<input type="submit" name="sendpw" class="formbtn" value="Send Password"><br>
							</form>
			        	
<!--=====================Email sending========================-->
					<?php 
						if(isset($_POST['sendpw'])){
								$to = $_POST['uemail'];
								$subject = 'DSP Group Micro Credits';
								$message = "Dear ".$uName.","."\n\n"."You have successfully registered in our system"."\n\n"."Your Username : ".$uName."\n"."Your Login Password : ".$_POST['pwd']."\n"."System Administrator\n".$Date;
								$headers = 'From:nemodorylab2018@gmail.com';
									      
									       
								if (mail($to,$subject,$message,$headers)){
									echo "<p style='color:blue;'>Email Sent Successfully.</p>";
									echo "<script>alert('Email Sent Successfully.');</script>";
								}
								
								else{
									//echo $message;
									echo "<p style='color:red;text-align:center;'>Sending Failed. Try again!</p>";

									} 
							}

 					?>
<!--=====================Email sending end========================-->


					</div>
				</div>

			</div><!--right content end--------->



		</div><!---main row end--->

	</div> <!---main container end--->



</body>
</html>


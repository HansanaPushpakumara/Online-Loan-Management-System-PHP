<?php
if(isset($_POST["Addcustomer"])){ 


function addcustomer($userName,$conn){
    //require_once("connection.php");
    $sql = "INSERT INTO customer (userName)
    VALUES ('$userName')";

    if ($conn->query($sql) === TRUE) {
        //echo "New record created successfully in customer<br>";
        //header("location:addsucceed.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} 


function addlogin($category,$userName,$conn,$encpassword){
    //require_once("connection.php");
    $sql = "INSERT INTO login (userCategory, userName, password)
    VALUES ('$category', '$userName', '$encpassword')";

    if ($conn->query($sql) === TRUE) {
        header("location:registrationsuccess.php");
        //echo "New record created successfully in login<br>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}


//** */checking for existed users*********--------------------------------------------

    $userName=$_POST['userName'];
    require_once("connection.php");
    $sql = "SELECT* FROM login where userName='$userName'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
       //echo "<h3>User Name is already used</h3>";
       echo "<script>window.alert('User Name is already used');</script>";
    } 
    
    else {//************if user is not existed**** */

        //echo "OK";
        require_once("connection.php");
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        $password=substr( str_shuffle( $chars ), 0, 8 );
        $encpassword=md5($password);
        $userName=$_POST['userName'];
        $category=$_POST['category'];
        $email=$_POST['email'];
        session_start();
        $_SESSION['uName']=$_POST['userName'];
        $_SESSION['uCategory']=$_POST['category'];
        $_SESSION['uEmail']=$_POST['email'];
        $_SESSION['uPassword']=$password;
        

//***********functions calling********* */          
        addlogin($category,$userName,$conn,$encpassword);

    }

}//end of isset

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
<body><?php// require_once("header.php"); ?>

	<div class="container-fluid"><!---main container start--->
		<div class="row"><!---top content start--->
			<div class="col-sm-3">
				<h4 style="background-color: #e6fff9;padding: 2vh;"><i class="glyphicon glyphicon-user"></i> Administrator</h4>
					
			</div>
			<div class="col-sm-9">
				<!--================================search content start=================================--------->
				<div class="row" style="margin-bottom: 2vh;background-color:  #006666;padding: 2vh;">
					<div class="col-sm-9">
						<form action="admincustomerreg.php" method="POST">
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
								

				
				


				<div class="row" style="background-color: #f0f5f5;padding-bottom:40vh;padding-top: 2vh;"><!---reg forms---------->
					<div class="col-sm-1"></div>
					<div class="col-sm-9">
						<p class="chead" style="font-size: 25px;margin-top: 10px;"><i class="glyphicon glyphicon-thumbs-up"></i> Customer Registration<p>
			        	<!------------ form------------------->
			        <form action="admincustomerreg.php" method="POST">
			            <input type="hidden" name="category" value="Customer">
			            NIC Number:<br>
			            <input type="text" name="userName" class="form-control" placeholder="Enter Customer NIC Number" pattern='^[0-9]{9}[vVxX]$' title="xxxxxxxxxV" required><br>
			            Email:<br>
			            <input type="email" name="email" class="form-control" placeholder="Enter Customer Email Address"  required><br>
			            <input type="submit" name="Addcustomer" Value="Add Customer" class="formbtn" onclick="return confirm('Do you need add this User?');"><br>
			        </form>
			        	<!------------form end------------------->
					</div>
				</div>

			</div><!--right content end--------->



		</div><!---main row end--->

	</div> <!---main container end--->



</body>
</html>


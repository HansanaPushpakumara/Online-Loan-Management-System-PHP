<?php
	session_start();
	if(isset($_SESSION['username'])){
				$usercategory=$_SESSION['usercategory'];
				if($usercategory=='admin'){
                     
                    header("Location:admin.php"); 

                 }
                 else if($usercategory=='manager'){
                     
                    header("Location:manager.php");
                 }
                 else if($usercategory=='customer'){
                     
                    header("Location:customer.php");
                 }
                 else if($usercategory=='officer'){
                     
                    header("Location:officer.php");
                 }
                 else if($usercategory=='cashcollector')
                 {
                    header("Location:cashcollector.php");
                 }
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>login form</title>
		<meta name="viewport" content="device-width,initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	
	<link rel="stylesheet" type="text/css" href="css/loginpage.css">
	<link rel="stylesheet" type="text/css" href="css/button.css">
	<link rel="stylesheet" type="text/css" href="css/footer.css">
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body style="background-color:#f2f2f2;">

		<link rel="stylesheet" type="text/css" href="headermain.html">
		<?php require_once("header.php"); ?>
	<div class="log-in container ">
		<?php 
		if(@$_GET['invalid']==true){
		?>
		<div class="alert-light text-danger text-center"><?php echo $_GET['invalid']?></div>
		<?php 
			}
		 ?>
	<form action="login.php" method="POST" >
		<label for="username">Username</label>
		<input type="text" name="username" placeholder="Username" class="form-control" required>
		<label for="password">Password</label>
		<input name="password" class="form-control" type="password" placeholder="Password" required>
		<br>
		<!--<button class="btn btn-success" type="submit" name="Login">Login</button>-->
		<input type="submit" name="Login" value="Login" style="width:100%;">
		<br>
		<label>Forgot Password?</label><br>
		<!--<button class="btn btn-success" type="submit" onclick="myFunction()" name="Reset">Reset</button>-->
		<input type="submit" name="Reset" onclick="myFunction()" value="Reset" style="width:100%;">

	</form>
	</div>
	<script>
		function myFunction() {
  		alert("Meet Admin to change Password during official time!");
		}
	</script>
	
	

</body>

<footer class="footer-distributed" style="margin-top: 40px;">
      <div class="footer-center">
          <div>
          <i class="fa fa-map-marker"></i>
          <p>DSP Group Micro Credit<br> Mahiyanganaya</p>
        </div>
        <div>
          <i class="fa fa-phone"></i>
          <p>+94 55 455 4555</p>
        </div>
        <div>
          <i class="fa fa-envelope"></i>
          <p><a href="mailto:support@company.com">dsp@company.com</a></p>
        </div>
        
      </div>

      <div class="footer-left">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.2283057070813!2d81.07561229554683!3d6.982363167274395!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae4618a1a9fec37%3A0x1dd900702229654b!2sUva+Wellassa+University!5e0!3m2!1sen!2slk!4v1511197231475"  width="90%" height="100%" frameborder="0" style="border:0" allowfullscreen></iframe>
      </div>
      <div class="footer-right">
        <div class="footer-icons">
          <a href="#"><i class="fa fa-google" aria-hidden="true"></i></a>
          <a href="#"><i class="fa fa-facebook"></i></a>
          <a href="#"><i class="fa fa-twitter"></i></a>
          <a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
          
      </div>

      </div>

    </footer>

</html>

<!DOCTYPE html>
<html>
<head>
	<title>contact us</title>
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/button.css">
	<style type="text/css">
		.cont{
			margin-left:25px;
		}
		.textcont{
			padding: 10px;
			width: auto;
			border-radius: 4px;
			border-width: 1px;
			width: 100%;
			margin-bottom: 2vh;
		}
	</style>
	<link rel="stylesheet" type="text/css" href="./css/header.css">
</head>
<body>

<!-----------------------header-start------------------------->

<div class="topnav" id="myTopnav">

  <img src="./images/logo.png" alt="Nature" class="responsive" style="width:130px;height: auto;padding-left: 2vh;">
  <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>

  <a href="#news">
  	<?php 
  		session_start();
  		if(isset($_SESSION['username'])): ?>
	  	<a href="#" style="color: white;font-style: italic;background-color: #005959;text-decoration: none;"><?php echo $_SESSION['username']; ?></a>
		<?php else: ?>
	  	<?php endif; ?>

        <?php 
        if(isset($_SESSION['username'])): 
          ?>
        <a class="link" href="logout.php" style="text-decoration:none;background-color: #009999">logout</a>
        <?php else: ?>
          <a class="link" href="loginpage.php" style="text-decoration:none">login</a>
        <?php endif; ?>
  		</a>



  <a href="AboutUs.php">About Us</a>
  <a href="contact.php">Contact</a>
 <a href="ApplicationPageFinal.php">Apply Loan</a> 
  <a href="home.php">Home</a>
  


</div>



<script>
function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}
</script>

<!-----------------------header-end------------------------->

	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-12">
				<img src="./images/contact.jpg" class="img-responsive" alt="Cinque Terre" width="100%">
				<h1 style="text-align: center;">Contact Us</h1>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12">
				<!--<h4 style="text-align: center;">We are always ready to help you out regarding all your queries. Send us a message via the form below or you can email or call us.</h4><br><br>-->
			</div>
		</div>
	</div>

	<div class="container" style="background-color: #e6ffee; margin-bottom: 10vh;padding-bottom: 5vh;">
		

		<div class="row" style="margin-top: 8vh;">
			<div class="col-sm-2"></div>
			<div class="col-sm-5" >
				<h3><i class="fa fa-phone" style="font-size: 35px; margin-right: 10px;"></i> Call us on:</h3>
				<p class="cont">055 0923762</p>
				<h3><i class="fa fa-envelope" style="font-size: 35px; margin-right: 10px;"></i> Email us at:</h3>
				<p class="cont">dspgroupmicrocredits@gmail.com</p>
			</div>

			<div class="col-sm-5">
				<h3><i class="fa fa-fax" style="font-size: 35px; margin-right: 10px;"></i> Fax:</h3>
				<p class="cont">055 0923442</p>
				<h3><i class="fa fa-send" style="font-size: 35px; margin-right: 10px;"></i> Write to:</h3>
				<P class="cont">DSP Group Micro Credits,<br>Mahiyanganaya</P>
			</div>

		</div>

		<!--div class="row" style="margin-top: 8vh;">
			<div class="col-sm-2"></div>
			<div class="col-sm-5" >
				<h3><i class="glyphicon glyphicon-earphone" style="font-size: 35px; margin-right: 10px;"></i> Call us on:</h3>
				<p class="cont">055 0923762</p>
				<h3><i class="glyphicon glyphicon-envelope" style="font-size: 35px; margin-right: 10px;"></i> Email us at:</h3>
				<p class="cont">055 0923762</p>
			</div>

			<div class="col-sm-5">
				<h3><i class="glyphicon glyphicon-phone-alt" style="font-size: 35px; margin-right: 10px;"></i> Fax:</h3>
				<p class="cont">055 0923442</p>
				<h3><i class="glyphicon glyphicon-send" style="font-size: 35px; margin-right: 10px;"></i> Write to:</h3>
				<P class="cont">DSP Group Micro Credits,<br>Mahiyanganaya</P>
			</div>

		</div>-->

		<div class="row" style="margin-top: 5vh;">
			<div class="col-sm-2"></div>

			<div class="col-sm-8">
				<form action="contact.php" method="POST">
					<input type="text" class="textcont" name="name"  placeholder="Name" required><br>
					<input type="text" class="textcont" name="mobile" pattern="[0-9]{10}" title="Phone Number" placeholder="mobile No" required><br>
					<input type="email" class="textcont" name="email"  placeholder="Your Email Address" required><br>
					<input type="text" class="textcont" name="subject"  placeholder="Subject" required><br>
					<textarea name="message" rows="3" cols="30" class="textcont" placeholder="Message"></textarea><br>
					<input type="submit" name="send" value="Submit" style="float: right;">
					
				</form>
			</div>
		</div>

	</div>


</body>

<?php require_once("footer.php"); ?>

</html>

<?php
	if(isset($_POST['send'])){



			$name=$_POST['name'];
			$mobile=$_POST['mobile'];
			$email=$_POST['email'];

			$to = 'jrhpushpakumara2017@gmail.com';
			$subject = $_POST['subject'];
			$msgbody = $_POST['message'];
			$message= "From: ".$name."\n".$mobile."\n".$email."\n\n".$msgbody;
			$headers = 'From:nemodorylab2018@gmail.com';
									      
									       
			if (mail($to,$subject,$message,$headers)){
					
					echo "<script>alert('Your Message Sent Successfully.');</script>";
			}
								
			else{
									//echo $message;
					echo "<script>alert('Message Sending Failed');</script>";

			} 
	}
?>
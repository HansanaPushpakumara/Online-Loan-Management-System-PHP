<?php 

require_once("connection.php");
//-----------------remove Admin-----------------------
if (isset($_POST["delete"])){
	$uname=$_POST["uname"];
	
	$sql = "SELECT* FROM login WHERE userName='$uname' AND userCategory='Admin'";
        $result=$conn->query($sql);
        $row=$result->fetch_assoc();

        if ($result->num_rows > 0) {
            //echo "ok";
            delete($uname,$conn);
        } else {
           // echo "User doesnt existed: ";
            echo "<script>window.alert('User does not existed!');</script>";
        }
}
//--------------fuction for remove admin----------------
function delete($uname,$conn){
	$sql = "DELETE FROM login WHERE userName='$uname'";

	if ($conn->query($sql) === TRUE) {
	    echo "<script>window.alert('Admin Removed Sucessfully');</script>";
	} else {
	    //echo "User is Not Available";
	    echo "<script>alert('Eror Occured!');</script>";
	}
}

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
				 echo "<script>window.alert('Mailer Error!');</script>";
			}
		else{
				 echo "<script>window.alert('Mail is sent successfully');</script>";
				
			}
		

   } 


// Function for Add Button
if (isset($_POST["add"])){
		
		$nameWithInitials  = $_POST["nwi"];
		$nic     = $_POST["nic"];
		$email      = $_POST["email"];
		$address = $_POST["address"];
		$phoneNumber  = $_POST["phone"];
		//$uname   = $_POST["nic"];
		require_once('connection.php');

	$query = "INSERT INTO admin (nameWithInitials,nic,email,address,phoneNo) VALUES ('$nameWithInitials','$nic','$email','$address','$phoneNumber')";

	if ($conn->query($query) === TRUE) {
	    
	   	    echo "<script>alert('Admin Registered Successfully');</script>";
	

        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        $password=substr( str_shuffle( $chars ), 0, 8 );
        $encpassword=md5($password);
  
	    $sql ="INSERT INTO login(userCategory,userName,password)VALUES ('Admin','$nic','$encpassword')";
	 
	    if ($conn->query($sql) === TRUE) {
	       
	      	echo "<script>window.alert('New password is issued');</script>";
	     	  		 
	                $subject="DSP GROUP MICRO CREDITS";
	                 $body="You have registered as new admin.<br><br>Your Username is: ".$nic."<br> Your new password is".$password."<br><br> Thank You!<br>Manager<br>(DSP GROUP MICRO CREDITS)";
	    			$to=$email;
	                    sendmail($body,$subject,$to);
	            

	   	}
	   	else{
	   		echo "Eror in login";
	   	}

   }
 }
 /*
   else {
	    echo "<script>alert('Error: Invalid data entry');</script>" ;
	}*/

//$con->close();	
?>


<!DOCTYPE html>
<html>
<head>
	<title>Admin Add and Remove </title>
	<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		

	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="keywords" content="footer, address, phone, icons" />

	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

	<link rel="stylesheet" href="css/button.css">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
  <link href="http://fonts.googleapis.com/css?family=Cookie" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">

	<link rel="stylesheet" href="css/footer.css">
	
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">

	<link href="http://fonts.googleapis.com/css?family=Cookie" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="./css/header.css">
	<link rel="stylesheet" type="text/css" href="css/add&remove.css">

		<style type="text/css">
			.clear{
					background-color: #FA8072;
		    		color: white;
		    		padding: 10px 14px;
		    		margin: 6px 0;
		    		border: none;
		    		border-radius: 4px;
		    		cursor: pointer;
			}
			.clear:hover{
				background-color: #ff9999;
			}
		</style>


</head>
<body >
	
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



  <a href="#news">About Us</a>
  <a href="#contact">Contact</a>
 <a href="LoanApplication.php">Apply Loan</a> 
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

	<!--*************************************************Remove Admin******************************************************-->
		 <div class="col-12 column">
			 <div class="col-6 colom1">
				<div>

					<h2> <i class=
						"glyphicon glyphicon-remove-sign"></i> Remove Admin</h2>
					<form action="Add_and_Remove.php" method=POST>
						<label for="uid">Admin ID</label>
							<input type="text" name="uname" required class ="form-control" placeholder="Enter NIC Number" pattern='^[0-9]{9}[vVxX]$' title=" as 000000000V or 000000000X">
					<br>
					<input type="submit" name="delete" value="Delete" class="clear"  onclick="return confirm ('Are You sure to delete this user?');"><br>
				</form>

				</div>
			</div>

<!--*********************************************  Add Admin**************************************************-->
				<div class="col-6 colom3">
				<div>
					
					<h2> <i class="glyphicon glyphicon-plus-sign"></i> Add Admin</h2>
					<form action="Add_and_Remove.php" method ="POST">
				<label for="nwi">Name with Initials</label>
							<input type="text" name="nwi" required class ="form-control"  title ='Person Name' placeholder="Enter Name With Initials">

						<label for="nic">NIC</label>
							<input type="text" name="nic" required class ="form-control" pattern='^[0-9]{9}[vVxX]$' title='NIC number(Format:000000000V or 000000000X )' placeholder="Enter NIC Number">

						<label for="email">Email</label>
							<input type="email" name="email" required class ="form-control" placeholder="Enter Email Address" title='(format: xxx@xxx.xxx)'>

						<label for="Address">Address</label>
							<input type="text" name="address" required class ="form-control" placeholder="Enter Address">

						<label for="Phone">Phone No</label>
							<input type='tel' name="phone" required class ="form-control" pattern="[0-9]{10}" title='Phone Number (Format: 000 000 0000)' placeholder="Enter Phone Number">
						 	<br>
						<input type="submit" name="add" value="Add" class="submit"  onclick="return confirm ('Are You sure to add this user?');">
						<input type="reset" name="clear" value="Clear" class="clear"><br>
					</form>

				</div>
			</div>
		</div>
 
<footer class="footer-distributed">
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
</body>
</html>

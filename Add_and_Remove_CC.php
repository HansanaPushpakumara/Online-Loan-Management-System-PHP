
<?php

//-----------------remove Admin-----------------------
if (isset($_POST["delete"])){
	$uname=$_POST['uname'];
	
	$sql = "SELECT* FROM login WHERE userName='$uname' ";
        $result=$conn->query($sql);
        $row=$result->fetch_assoc();

        if ($result->num_rows > 0) {
            //echo "ok";
            delete($uname,$conn);
        } else {
           // echo "User doesnt existed: ";
            echo "<script>window.alert('User doesnt existed!');</script>";
        }
}
//--------------fuction for remove admin----------------
function delete($uname,$conn){
	$sql2 = "DELETE FROM login WHERE userName='$uname'";

	if ($conn->query($sql2) === TRUE) {
	    echo "<script>window.alert('Cash Collector Removed Sucessfully');</script>";
	} else {
	    //echo "User is Not Available";
	    echo "<script>alert('Error Occured!');</script>";
	}
}

require_once('connection.php'); 	

if (isset($_POST["add"])){

	function add($userName,$conn){ 

		$userName     = $_POST["uname"];
		$nameWithInitials  = $_POST["nwi"];
		$email      = $_POST["email"];
		$address = $_POST["address"];
		$area = $_POST["areaCode"];
	
		
	$query = "INSERT INTO cashcollector (userName,nameWithInitials,email,address,areaCode) VALUES ('$userName','$nameWithInitials','$email','$address','$area')";

	if (mysqli_query($conn, $query)) {
	    
	   	    echo "<script>alert('Cash Collector Registered Successfully');</script>";
	} else {
	    echo "<script>alert('Error: Invalid data entry');</script>" ;
	}
}
?>
<?php
	$to=$email;
    $subject="DSP GROUP MICRO CREDITS";
    $body="Dear ".$nameWithInitials.",<br><br>"."YourCash Collector is updated.New member details <br><br>Thank You!<br>Manager<br>(DSP GROUP MICRO CREDITS)";
    //echo $body."<br>";
    sendmail($body,$subject,$to);
    add($userName,$conn);

    }
?>

  <?php  	

//$con->close();	

//Query for select customers foe that area code

require_once('connection.php');
  	//$areaCode=$_GET[''];
  
		if (isset($_POST["add"])){

		 $query2 = "SELECT * FROM customer WHERE permanentAddress ='Badulla'";
		     $row=$result->fetch_assoc();
        if($result->num_rows > 0){

        		//$address=$row['permanentAddress'];


        	$email=$row['email'];
            $nameWithInitials=$row['nameWithInitials'];
            $address=$row['permanentAddress'];

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
	<title>Cash Collector Add and Remove </title>
	<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="css/add&remove.css">

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


	<!--*************************************************Remove Cash Collecter******************************************************-->
		 <div class="col-12 column">
			 <div class="col-6 colom1">
				<div>

					<h2> <i class=
						"glyphicon glyphicon-remove-sign"></i> Remove Cash Collector</h2>
					<form action="Add_and_Remove_CC.php" method=POST>
						<label for="uid">Cash Collecter ID</label>
							<input type="text" name="uname" required class ="form-control" placeholder="Enter cashcollector NIC Number">
					<br>
					<input type="submit" name="delete" value="Delete" class="clear" onclick="return confirm ('Are You sure to delete this user?');">
					<br>
				</form>
				</div>
			</div>

<!--*********************************************  Add Cash Collecter**************************************************-->
				<div class="col-6 colom3">
				<div>
					
					<h2> <i class="glyphicon glyphicon-plus-sign"></i> Add Cash Collector</h2>
					<form action="Add_and_Remove_CC.php" method ="POST">
										
							<label for="uname">User Name</label>
							<input type="text" name="uname" required class ="form-control" pattern='^[0-9]{9}[vVxX]$' placeholder="Enter cash collector NIC Number"">
							<label for="nwi">Name with Initials</label>
							<input type="text" name="nwi" required class ="form-control"   title ='Person Name' placeholder="Enter Name With Initials">
						
						<label for="email">Email</label>
							<input type="email" name="email" required class ="form-control" placeholder="Enter Email Address" title='(format: xxx@xxx.xxx)'>
						<label for="Address">Address</label>
							<input type="text" name="address" required class ="form-control" placeholder="Enter Permenent Address">

						<label for="area">Area Code</label>
							<select class ="form-control" name="areaCode">
					<option value="" disabled selected>Select the Area </option>
					<option>Badulla</option>
					<option>Mahiyanganaya</option>
					<option>Passara</option>
					</select>
						<br>

						<input type="submit" name="add" value="Add" class="submit">
										
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

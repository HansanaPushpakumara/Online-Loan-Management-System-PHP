<?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dspdb";
	
	// Create connection
$con = new mysqli($servername, $username, $password, $dbname);

	
	// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}


if (!empty($_POST["view"])){
	$fullName  = $_POST["fname"];
    $nameWithInitials  = $_POST["name"];
    $nic     = $_POST["nic"];
    $dob      = $_POST["dob"];
    $email= $_POST["email"];
    $phoneNumber  = $_POST["pnumber"];
    $address  = $_POST["permanentAddress"];
    $city=$_POST["city"];

   }

if (!empty($_POST["save"])){
	
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "dspdb";
	
	// Create connection
		$con = new mysqli($servername, $username, $password, $dbname);
// Check connection
		$con = mysqli_connect("localhost","root","","dspdb");
		if (!$con) {
    	die("Connection failed: " . mysqli_connect_error());
		}
		else{
	

   	   $query = "SELECT * FROM customer ";
    
     $result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "Full Name: " . $row["fname"]. " nameWithInitials : " . $row["name"]. " " . $row["lastname"]. "<br>";
    }
} else {
    echo "0 results";
}
}

$con->close();	
?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>Request</title>
 	
 		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="css/request.css">
		<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="keywords" content="footer, address, phone, icons" />

	
	<link rel="stylesheet" href="css/footer-distributed-with-address-and-phones.css">
	
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">

	<link href="http://fonts.googleapis.com/css?family=Cookie" rel="stylesheet" type="text/css">

 </head>
 <body>
		 <div class="column col-12">
			 <div class="col-4 colom1">
		<!-- newly requested loan as email -->
		<h2>Inbox</h2>

		<form action="request.php" method="POST">
		<table>
					
		<td><input type="hidden" name="fname" class ="form-control"> </tr>
        <tr><td>Name with Initials:
        <td><input type="hidden" name="name" class ="form-control"> </tr>
        <tr><td>NIC:
        <td><input type="hidden"  name="nic" class ="form-control"> </tr>
        <tr><td>Date of Birth:
        <td><input type="hidden"  name="dob" class ="form-control"> </tr>
        <tr><td>Email Address:
        <td><input  type="hidden"  name="email" class ="form-control"> </tr>
        <tr><td>Contact No:
       <td><input type="hidden"  name="pnumber" class ="form-control"> </tr>
        <tr><td>City:</td>
        <td> 
            <select name="city" class ="form-control">
                <option value="Mahiyanganaya">Mahiyanganaya</option>
                <option value="Badulla">Badulla</option>
              </select>
        </td></tr>
        <tr><td>Address:</td>
        <td><input  type="text"  name="address" class ="form-control"> </td></tr>
     
         <tr><td> Name of Employer:</td>
         <td><input  type="text"  name="empName" class ="form-control">  </td></tr>
        <tr><td>Designation:</td>
         <td><input  type="text"  name="desig" class ="form-control">  </td><br></tr>
         
        <tr><td>Basic Salary:</td>
        <td><input  type="text"  name="bSalary" class ="form-control">  </td></tr>
        <tr><td>Total income:</td>
        <td><input  type="text"  name="income" class ="form-control">  </td></tr>
		
        <tr>
          <td>Relationship:</td>
          <td> <input  type="text"  name="grelationship" class ="form-control">  </td></tr>

        <tr><td>Name with Initials:</td>
        <td> <input  type="text"  name="gname" class ="form-control">  </td></tr>
        <tr><td>NIC:</td>
        <td> <input  type="text"  name="gnic" class ="form-control">  </td></tr>
       <tr><td> Occupation:</td>
        <td> <input  type="text"  name="goccupation" class ="form-control">  </td></tr>
        <tr><td>Mobile Number:</td>
        <td> <input  type="text"  name="gmobile" class ="form-control">  </td></tr>
       
        <tr><td>Loan Purpose:</td>
        <td> <input  type="text"  name="lpurpose" class ="form-control">  </td></tr>
        <tr><td>Loan Amount:</td>
        <td> <input  type="text"  name="lamount" class ="form-control">  </td></tr>
        <tr><td>Payment Method:</td>
        <td> <!--<input  type="text"  name="pmethod">-->
            <select name="pmethod" class ="form-control"y>
                <option value="Weekly">Weekly</option>
                <option value="Monthly">Monthly</option>
              </select>
        </td></tr>
        
		</table>				
			<input type="submit" name="view" value="View PDF"><br> 
		<input type="submit" name="save" value="Save" > 										
		</form>
			</div>
			
					<!-- Loan Application -->
			 <div class="col-4 colom2">
				
				<h2>Form Fill In</h2>
				<form >
					<label for= "nic">NIC</label>
						<input type="text" name="NIC">
					<label for= "nwi">Name With Initials</label>
						<input type="text" name="nwi">
					<label for="email"> Email </label> 
						<input type="text" name="email">
					
					<input type="submit"  value="Recommend" formaction ="recommond.html">
					<input type="submit"  value="Wait" formaction ="wait.html" form action ="delete.html">
					<input type="submit"  value="Delete" formaction ="delete.html">
				</form>
				</div>
			<div class="col-4 colom3">
				<h2>Attached Documents</h2>
				<form>
				<table>
					<tr> <td>
						<input type="submit" name="img01" value="ID Copy" formaction="Images/1.jpg">
						</td>
						<td><input type="submit" name="img02" value="Copy2" formaction="Images/2.jpg"></td>
					</tr>
					<tr> <td>
						<input type="submit" name="img03"  value="Copy3" formaction="Images/3.jpg">
						
						<td><input type="submit" name="img03" value="Copy4" formaction="Images/4.jpg"></td>
					</tr>
				</table>
			</form>
			</div>
		
		 </div>

<footer class="footer-distributed">

			<div class="footer-left">
				
				 <img src="images/logo.png" alt="LOGO" style="width:140px;height:90px;"> 
				<br>
				<p class="footer-company-about">
					<span>About the company</span>
					Sample text.Sample textSample textSample textSample textSample textSample textSample textSample 
				</p>
			</div>

			<div class="footer-center">

				<div>
					<i class="fa fa-map-marker"></i>
					<p><span>No 00, abcd</span> Mahiyanganaya</p>
				</div>

				<div>
					<i class="fa fa-phone"></i>
					<p>055 1234567</p>
				</div>

				<div>
					<i class="fa fa-envelope"></i>
					<p><a href="mailto:support@company.com">dsp@company.com</a></p>
				</div>

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
 
 
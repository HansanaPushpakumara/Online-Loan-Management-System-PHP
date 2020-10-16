
<?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dspdb";
	
	// Create connection
$con = new mysqli($servername, $username, $password, $dbname);
// Check connection


	if(isset($_POST["add"])){
		$con = mysqli_connect("localhost","root","","dspdb");
		if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
		
	
	$adminName  = $_POST["name"];
	$nameWithInitials  = $_POST["nwi"];
	$nic     = $_POST["nic"];
	$email      = $_POST["email"];
	$address = $_POST["address"];
	$phoneNumber  = $_POST["phone"];

	$query = "INSERT INTO admin (adminName,nameWithInitials,nic,email,address,phoneNumber) VALUES ('$adminName','$nameWithInitials','$nic','$email','$address','$phoneNumber')";
if (!$query) {
    
    echo "New record created successfully";
} else {
   echo "Error while inserting " ;
}
}
$con->close();	
?>

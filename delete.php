<?php require_once('connection.php');?>
		

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

	//$adminId  = $_POST["uid"];

	// sql to delete a record
$sql = "DELETE FROM admin WHERE adminId= 12";
	
	if (mysqli_query($con, $sql)) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . mysqli_error($con);
}

mysqli_close($con);
?>
<?php
session_start();
$user=$_SESSION['username'];
if (isset($_POST['confirmPassword'])) {
		$confirmPassword=md5($_POST['confirmPassword']);
		$currentPassword=md5($_POST["currentPassword"]); 
}
$conn = mysqli_connect("localhost", "root", "", "dspdb") or die("Connection Error: " . mysqli_error($conn));

if (count($_POST) > 0) {
    $result = mysqli_query($conn, "SELECT *from login WHERE username='$user'");
    $row = mysqli_fetch_array($result);
    if ($currentPassword== $row["password"]) {
        mysqli_query($conn, "UPDATE login SET password='$confirmPassword',Activated='Y' WHERE Username='$user'");
        $message = "Password Changed";
        echo "<script>window.alert('Password has been changed!\nEnter your new password and login to the system.');window.location.assign('loginpage.php');</script>"; 
        header("Location:loginpage.php");
    } else
        $message = "<p style='color:red;margin-top:10px;margin-bottom:-10px;'>Current Password is not correct</p>";
}
?>
<html>
<head>
<title>Change Password</title>
<script>
function validatePassword() {
var currentPassword,newPassword,confirmPassword,output = true;

currentPassword = document.frmChange.currentPassword;
newPassword = document.frmChange.newPassword;
confirmPassword = document.frmChange.confirmPassword;

if(!currentPassword.value) {
	currentPassword.focus();
	document.getElementById("currentPassword").innerHTML = "required";
	output = false;
}
else if(!newPassword.value) {
	newPassword.focus();
	document.getElementById("newPassword").innerHTML = "required";
	output = false;
}
else if(!confirmPassword.value) {
	confirmPassword.focus();0
	document.getElementById("confirmPassword").innerHTML = "required";
	output = false;
}
if(newPassword.value != confirmPassword.value) {
	newPassword.value="";
	confirmPassword.value="";
	newPassword.focus();
	document.getElementById("confirmPassword").innerHTML = "not same";
	output = false;
} 	
return output;
}
</script>

	<link rel="stylesheet" type="text/css" href="common.css">
    <link rel="stylesheet" type="text/css" href="css/button.css">
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<meta name="viewport" content="device-width,initial-scale=1">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="common.css">
    






</head>
<body style="background-color:#f2f2f2">
	<?php require_once("header.php"); ?>


	<div class="col-md-12" id="main">
    <form name="frmChange" method="post" action=""
        onSubmit="return validatePassword()">
        
            <div class="message"><?php if(isset($message)) { echo $message; } ?></div>
            <table border="0" cellpadding="10" cellspacing="0"
                width="50%" align="center" class="tblSaveForm">
                <tr class="tableheader">
                    <td colspan="2"><h1>Change Password</h1></td>
                </tr>
                <tr><td width="40%"><label>Current Password</label></td></tr>
                <tr>
                    
                    <td width="60%"><input type="password"
                        name="currentPassword" class="form-control txtField" placeholder="Current Password "/><span
                        id="currentPassword" class="required"></span></td>
                </tr>
                <tr><td><label>New Password</label></td></tr>
                <tr>
                    
                    <td><input type="password" name="newPassword"
                        class="form-control txtField" placeholder="New Password " /><span id="newPassword"
                        class=" required"></span></td>
                </tr>
                <tr><td><label>Confirm Password</label></td></tr>
                
                <td><input type="password" name="confirmPassword"
                    class="form-control txtField"  placeholder="Confirm Password "/><span id="confirmPassword"
                    class="required"></span></td>
                </tr>
                <tr>
                    <td><input type="submit" name="submit" id="btn2"
                        value="Submit"></td>
                </tr>
            </table>
    </form>
	</div>
</body>
</html>
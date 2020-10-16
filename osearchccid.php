<?php 

require_once('connection.php');
if (isset($_POST["searchccid"])){
	$ccid=$_POST["ccid"];
	// sql to select a record
	$sql = "SELECT * FROM cashcollector WHERE cc_Id='$ccid'";
             $result=$conn->query($sql);
             $row=$result->fetch_assoc();

             session_start();
             if($result->num_rows > 0){
			           $cc_Id=$row['cc_Id'];
                 $_SESSION['CCID'] =$cc_Id;
			           $userName = $row['userName'];
             	   $nameWithInitials=$row['nameWithInitials'];
             	   $email=$row['email'];
                 $phoneNo=$row['phoneNo'];
                 $areaCode=$row['areaCode'];
         }           
          
      else{
        echo "<script>window.alert('User does not existed');window.location.assign('officer.php');</script>";
      }
  }
?>

<!DOCTYPE html>
<html>
<head>
	<title>msearch CC ID</title>
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/button.css">
	<style type="text/css">
		h4{
			background-color:  #ccebff;
			padding: 8px;
		}
	</style>
</head>
<body>


     
    </div>
  </div>
	<div class="col-sm-12">

		<div class="col-sm-6">
			<h4>Cash Collector Details</h4>

			<div class="table-responsive">          
                          <table class="table">

                            <tbody>
                              <tr>
                                <td>CC ID</td>
                                <td><?php echo $cc_Id; ?></td>
                              </tr>

                              <tr>
                                <td>NIC</td>
                                <td><?php echo $userName; ?></td>
                              </tr>

                              <tr>
                                <td>Name with initials</td>
                                <td><?php echo $nameWithInitials; ?></td>
                              </tr>

                              <tr>
                                <td>Email Address</td>
                                <td><?php echo $email; ?></td>
                              </tr>
                              <tr>
                                <td>Phone No</td>
                                <td><?php echo $phoneNo; ?></td>
                              </tr>
                              <tr>
                                <td>Area Code</td>
                                <td><?php echo $areaCode; ?></td>
                              </tr>
                                                 
                            </tbody>
                  </table>

                </div>

		</div>
	</div>
<form action="ccLoan.php" method="POST">
   
  <input type="submit" name="ccloansearch" value="Search Loan">
</form>


	</body>
</html>
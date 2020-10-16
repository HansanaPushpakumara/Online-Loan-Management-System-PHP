<?php
session_start();
if(isset($_SESSION['username'])==null){
	header("location:loginpage.php");
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>cashcollector</title>
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/button.css">
	<style type="text/css">
		.ccform{
			
			padding: 8px 20px;
            margin: 8px 0;
            border-radius: 4px;
            width: 80%;
		}

		

		.shortcuts{
			height: 100%;
		}
		.buttons{
			background-color:#f5f5f5;
		}

		h3{
			text-align: center;
			padding: 4px;
			background-color: #ecf9f2;
		}

	</style>
</head>
<body>
	<?php
	require_once("header.php");
	?>

<div class="bodycont" style="margin-top: 5vh">
<!------------short cuts--------------------------------->
	<div class="col-sm-3">
		<div class="buttons">
				<form action="cashcollector.php" method="POST">
					<input type="submit" name="Tapp" value="Todays Appoinments" style="width: 100%;"><br>
					<!--<input type="submit" name="mycustomers" value="My Customers" style="width: 100%;"><br>-->
					<input type="submit" name="viewloans" value="View Loans" style="width: 100%;"><br>


				</form>
		</div>
	</div>

<!-- =================================Middle--------------------------------------------->
	<div class="col-sm-6" style="background-color: white">
		
		<form action="cashcollector.php" method="POST">
				<input type="text" name="searchkey" class="ccform" placeholder="Search by NIC Number / Area">
				<input type="submit" name="search" value="Search">
		</form>

		<?php
//echo "Today is " . date("d") . "<br>";
//----------------------- search customers-------------------------------------------------------------
	require_once("connection.php");
	if(isset($_POST["search"])){
		$searchkey=$_POST["searchkey"];

		if($searchkey!=null){

		$sql = "SELECT* FROM customer WHERE nic LIKE '%$searchkey%' OR city LIKE '%$searchkey%' ";
		
        $result=$conn->query($sql);
      
        if ($result->num_rows > 0) {
        ?>
        <br>
        <div class="table-responsive">          
            <table class="table">
            <tbody>
        <?php
        	while($row=$result->fetch_assoc()){
        	?>
        
            	<tr>
            		<td ><a href="ccviewcustomer.php?customerid=<?php echo $row["customerId"] ?>"><?php echo $row["nameWithInitials"] ?></a></td>
				    <td><?php echo $row["nic"] ?></td>
				    <td><?php echo $row["city"] ?></td>
			  	</tr>
		

		<?php
        	}
        ?>
        			  </tbody>
            </table>
        </div>
        	<?php

      } else {
        	?>

        	
	            <table>
	            	<tr>
	            		<td></td>
	            		<td>0 Results</td>
	            		<td></td>
	            	</tr>
	            </table>

            <?php
        }

    }

	} //search End -------------------------------------------------------
?>


<?php

	if(isset($_POST['viewloans'])){

		$sql="SELECT* FROM loan ORDER BY loantype ";
		$result=$conn->query($sql);
		if($result->num_rows>0){

			?>

	<div class="table-responsive">
	<table class="table">
		<h3 style="text-align: center; padding: 4px; background-color: #ecf9f2;">Our Loan Methods</h3>
		<tr>
		    <th>Loan Type</th>
		    <th>Loan Duration</th>
		    <th>Payment Method</th>
		    <th>Interest Rate</th>
		 </tr>
			<?php

			while($row=$result->fetch_assoc()){
	?>

		


		 <tr>
		    <td><?php echo $row['loantype']; ?></td>
		    <td><?php echo $row['loanDuration']; ?></td>
		    <td><?php echo $row['paymentMethods']; ?></td>
		    <td><?php echo $row['interestrate'].' %'; ?></td>
		 </tr>

		

	<?php

			}

	?>
		</table>
		</div>


	<?php

		}
	}

?>



	<?php

	if(isset($_POST['Tapp'])){
		?>
			<h3>Today's Appoinments</h3>
		<?php

		$day=date("d");
		$sql="SELECT* FROM customerloandetails WHERE installmentDueDate='$day'";
		$result=$conn->query($sql);

        if ($result->num_rows > 0) {
        	while($row=$result->fetch_assoc()){
        		//echo $row['nic']."<br>";
        		$customerId=$row['customerId'];
        		$query="SELECT* FROM customer WHERE customerId='$customerId'";
		 		$result2=$conn->query($query);
		 		if ($result2->num_rows > 0) {
?>
<div class="table-responsive">          
  		<table class="table">
  			<tbody>
<?php

	        		while($row=$result2->fetch_assoc()){
	        			//echo $row['fullName']."<br>";
	        		?>

	    
            	<tr>
            		<td ><a href="ccviewcustomer.php?customerid=<?php echo $row["customerId"] ?>"><?php echo $row["nameWithInitials"] ?></a></td>
				    
				    <td><?php echo $row["city"] ?></td>
			  	</tr>
            
      
	        		<?php
	        		}
	        		?>
	        	</tbody>
	        			</table>
            </div>
	        		<?php
        		}
        	}

        }
        else{
        	echo "No Appointments Today";
        }


	}
	

?>




</div><!-----------------middle end-------------->


<!-- right--------------------------------------------->
	<div class="col-sm-3">
		<?php 
			require_once('calender.php');
		 ?>
	</div>

</div> <!-------------body cont end---------------------------->

</body>
</html>
<div class="ftr" style="margin-top: 20vh">
	<?php
	require_once("footer.php");
	?>
</div>

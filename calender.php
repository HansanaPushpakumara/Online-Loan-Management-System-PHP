<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		a{
			padding: 10px;
			
			margin:auto;
			color: black;
			text-align: right;
		}
		a:hover{
			background-color: #ecf9f2;
		}

		.co{
			background-color: #ccebff;
		}
		h5{
			text-align: center;
		}
	</style>
	
	
</head>
<body>

<div class="co" style="padding-left: ;margin-top: 10vh;">
	<h3>Calender</h3><br>
		<?php
			$w1 = 1;

			while($w1 <= 7) {
				?>
				<a href="cashcollector.php?day=<?php echo $w1; ?>" style="margin-right: 9px;font-size: 18px;"><?php echo $w1; ?></a>
				<?php
			    $w1++;
			}

			
echo "<br><br>";
			$w1=8;
			while($w1 <= 14) {
				?>
				<a href="cashcollector.php?day=<?php echo $w1; ?>" style="margin-right: 2px;font-size: 18px;"><?php echo $w1; ?></a>
				<?php
			    $w1++;
			}
echo "<br><br>";

			$w1=15;
			while($w1 <= 21) {
				?>
				<a href="cashcollector.php?day=<?php echo $w1; ?>" style="font-size: 18px;"><?php echo $w1; ?></a>
				<?php
			    $w1++;
			}
echo "<br><br>";

			$w1=22;
			while($w1 <= 28) {
				?>
				<a href="cashcollector.php?day=<?php echo $w1; ?>" style="font-size: 18px;"><?php echo $w1; ?></a>
				<?php
			    $w1++;
			}
echo "<br><br>";

			$w1=29;
			while($w1 <= 31) {
				?>
				<a href="cashcollector.php?day=<?php echo $w1; ?>" style="font-size: 18px;"><?php echo $w1; ?></a>
				<?php
			    $w1++;
			}
echo "<br><br>";

		?>
</div>

</body>
</html>


  <?php
if(isset($_GET['day'])){
		$searchkey=$_GET['day'];

		if($searchkey!=null){
			$sql3="SELECT* FROM customerloandetails WHERE installmentDueDate='$searchkey'";
			$result3=$conn->query($sql3);
			if ($result3->num_rows > 0) {
				echo "<h3>"."$searchkey  "."</h3>";
        	while($row=$result3->fetch_assoc()){
        		//echo $row['installmentDueDate'];
        		$instDate=$row['installmentDueDate'];
        		//echo $row['nic'];
        		$customerId=$row['customerId'];
        		$sql4="SELECT* FROM customer WHERE customerId='$customerId'";
        		$result4=$conn->query($sql4);
        		if ($result4->num_rows > 0) {
	        			?>
	        			<div class="table-responsive">          
                        <table class="table">

                        <tbody>

	        			<?php
	        			while($row=$result4->fetch_assoc()){
		        				//echo $row['nameWithInitials'];
					?>
		            	<tr>
		            		
		            		<td ><a href="ccviewcustomer.php?customerid=<?php echo $row["customerId"] ?>"><?php echo $row["nameWithInitials"] ?></a></td>
						 
						    <td><?php echo $row["city"]; ?></td>
						    
					  	</tr>
		           
					<?php

	        			}
        		}

        		?>
        				</tbody>
        			 </table>
        			</div>
        		<?php
        	}
        }
else{
	echo "<h3>"."$searchkey  "."</h3>";
	echo "<h5>No Customers</h5>";
}

		}
	}
  ?>
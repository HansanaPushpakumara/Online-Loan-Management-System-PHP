
<!DOCTYPE <!DOCTYPE html>
<html>
<head>
	<title>Search1</title>

		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="./css/header.css">

	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="keywords" content="footer, address, phone, icons" />
	<link rel="stylesheet" href="./css/search.css">
	<link rel="stylesheet" href="css/button.css">
	 
</head>
<body>


    <form action="manager.php" method="POST">
            <input type="submit" value="Back" >
   
<!--*******************table****************-->
<table class="masterlist">
    <tr>
        <th>Customer ID</th>
        <th>Customer Loan ID</th>
        <th>Arrears Status</th>
        <th>Loan Amount</th>
        <th>Remaining Loan Amount</th>

    </tr>

    <?php




if (isset($_POST["search"])){
	
    require_once("connection.php");

    $nic=$_POST["NIC"];
    	// sql to select a record
    $sql="SELECT* FROM customerloandetails WHERE nic ='$nic '";
    $result=$conn->query($sql);

    if($result->num_rows>0){
        while($row=$result->fetch_assoc()){
            echo 
            "<tr><td>".$row["customerId"]."</td>
            <td>".$row["customerLoanId"] ."</td>
            <td>".$row["arrearsStatus"] ."</td>
            <td>".$row["loanAmount"] ."</td>
            <td>".$row["remainingLoanBalance"]."</td></tr>"
            ;
        }
        echo "</table>";
    }
        else{
            echo "0 result";
    }
   }
    $conn-> close();
    ?>
 </form>


</table>

<!--**************footer**************-->
<!-- The content of your page would go here. -->


</body>
</html>







<!DOCTYPE html>
<html>
<head>
    <title>msearch  Loan</title>
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

 <div class="col-sm-12">
   
      <h4>Loan Details</h4>
<?php 

require_once('connection.php');
if (isset($_POST["arealoansearch"])){
   // $ccid=$_POST["ccloan"];
session_start();
    if($_SESSION['CCID']!=null){

$query = "SELECT* FROM customerloandetails WHERE ccId ='{$_SESSION['CCID']}'";
             $result=$conn->query($query);
             //$row=$result->fetch_assoc();

            if ($result->num_rows > 0) {

                ?>

        <br>
        <div class="table-responsive">          
            <table class="table">
            <tbody>
                <tr>
            <th>Loan Type</th>
            <th>Interest Rate</th>
            <th>Loan Amount</th>
            <th>Loan Duration</th>
            <th>Payment Method</th>
            <th>Installment</th>
            <th>Installment Due Date</th>
             <th>Installment Paid Amount</th>
            <th>Arrears Status</th>
            <th>Installment Paid Date</th>
           
         </tr>
        <?php
            while($row=$result->fetch_assoc()){
            ?>
        
                <tr>
                     <td><?php echo $row["loanType"] ?></td>
                     <td><?php echo $row["interest"] ?></td>
                    <td ><?php echo $row["loanAmount"] ?></a></td>
                   <td><?php echo $row["appliedLoanDuration"] ?></td>
                    <td><?php echo $row["appliedMethod"] ?></td>
                    <td><?php echo $row["installment"] ?></td>
                    <td><?php echo $row["installmentDueDate"] ?></td>
                    <?php 
                    $totalLoanAmount=$row['totalLoanAmount'];
                     $remainingLoanBalance=$row['remainingLoanBalance'];
                        $installmentPaidAmount=$totalLoanAmount-$remainingLoanBalance;
                    ?>
                    <td><?php echo "$installmentPaidAmount"?></td>

                     <td><?php echo $row["arrearsStatus"] ?></td>
                    <td><?php echo $row["installmentPaidDate"]?></td>
                    
                   

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
}
   
?>

     
    </div>



    </body>
</html>
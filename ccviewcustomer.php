
<?php
$Date=date("Y-m-d");
require_once("connection.php");
session_start();
$_SESSION['customerid']=$_GET['customerid'];

if(isset($_SESSION['username'])==null){
    header("location:loginpage.php");
}

 //------------------==============customer details==============-------------------------------------//       
        if(isset($_GET['customerid'])){

                $customerid=$_GET['customerid'];
                $query1="SELECT* FROM customer WHERE customerId='$customerid'";
                $result1=$conn->query($query1);
                $row=$result1->fetch_assoc();

                        if ($result1->num_rows > 0) {

                               
                        $NWI = $row['nameWithInitials'];
                        $NIC = $row['nic'];
                        $Address=$row['permanentAddress'];
                        $mobileNo=$row['mobileNo'];
                        $customerEmail=$row['email'];       

                        }


                }

//------------------===============customer loan details=================-------------------------------------//
        if(isset($_GET['customerid'])){

                $customerid=$_GET['customerid'];
                $sql = "SELECT* FROM customerloandetails WHERE customerId='$customerid'";
                $result2=$conn->query($sql);

                $row=$result2->fetch_assoc();

                if ($result2->num_rows > 0) {
                        $loanType=$row['loanType'];
                        $paymentMethod=$row['appliedMethod'];
                        $loanAmount=$row['loanAmount'];
                        $installment=$row['installment'];
                        $lastPaymentDate=$row['installmentPaidDate'];
                        $arrearsStatus=$row['arrearsStatus'];
                        $noOfInstallments=$row['noOfInstallments'];
                        $remainingNoOfInstallments=$row['remainingNoOfInstallments'];
                        $remainingLoanBalance=$row['remainingLoanBalance'];
                        $installmentDueDate=$row['installmentDueDate'];
                        $insDue=$row['nextInstallmentDueDate']; 

                }
//------------------=================customer arrears details==============------------------------//
                //if($arrearsStatus=='YES'){
                $arrearsAmount=0;
                        $query2="SELECT* FROM customerareasedetails WHERE customerId='$customerid'";
                    
                        $result3=$conn->query($query2);
                        $row=$result3->fetch_assoc();
                        if ($result3->num_rows > 0) {

                                $arrearsAmount=$row['arrearsAmount'];
                                
                        }

               // }
                $date = strtotime("+1 month", strtotime($insDue));
                $a=date("Y-m-d", $date);

        }



?>


<?php 

 ?>


<!DOCTYPE html>
<html>
<head>
	<title>viewcustomer</title>
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/button.css">
        <style type="text/css">
                input[type="text"] {
                    border: none;
                    border-bottom: 1px solid black;
                    width: 100%;
                }
                .cusdet{
                        text-align: center;
                        background-color: 
                        padding-bottom: 
                }

                .custitle{
                        background-color: #e6fff9;
                        font-size: 18px;
                        padding: 3px;
                        text-align: center;
                }
        </style>
</head>
<body>


<?php 

require_once("header.php");

 ?>
 <div class="col-sm-12" style="background-color: #f2f2f2;margin-bottom: 10px;">
         <h4 style="text-align: ;"><i class="glyphicon glyphicon-user"></i> <?php echo $NWI; ?> </h4>
 </div>

<!-----------left content-------------->
<div class="col-sm-4"> 
    
        <div class="cusdet">
                <p class="custitle">
                      Customer Details
                </p>
                
                <p class="custdet2" style="padding: 10px;">
                        <label><?php echo $NWI; ?></label><br>   
                        <?php echo $NIC; ?><br>  
                        <?php echo $Address; ?><br> 
                        <?php echo $mobileNo; ?><br>   
                </p>
        </div>

        <div class="loandet">
                <p class="custitle">
                      Loan Details   
                </p>

                <div class="table-responsive">          
                          <table class="table">

                            <tbody>
                              <tr>
                                <td>Loan Type</td>
                                <td><?php echo $loanType; ?></td>
                              </tr>

                              <tr>
                                <td>Payment Method</td>
                                <td><?php echo $paymentMethod; ?></td>
                              </tr>

                              <tr>
                                <td>Installment Day</td>
                                <td><?php echo $installmentDueDate; ?></td>
                              </tr>

                              <tr>
                                <td>Loan Amount</td>
                                <td><?php echo "Rs. ".$loanAmount.".00"; ?></td>
                              </tr>

                              <tr>
                                <td>Remaining Loan Amount</td>
                                <td><?php echo "Rs. ".$remainingLoanBalance.".00"; ?></td>
                              </tr>

                              <tr>
                                <td>Total Installments</td>
                                <td><?php echo $noOfInstallments; ?></td>
                              </tr>

                              <tr>
                                <td>Remaining Installments</td>
                                <td><?php echo $remainingNoOfInstallments; ?></td>
                              </tr>

                              

                            </tbody>
                  </table>

                </div>
        

        </div>



</div>  <!------left end----------->


<!-----------right content------------------------------------------------------------------------------------------->
<div class="col-sm-6"> 
        
        <h4>Make a Payment</h4>
        <!--<p class="custitle">Make a Payment</p>-->


        <?php  
                if($arrearsStatus=='YES'){
                        ?>
                                <p class="lastpayment" style="text-align: center; color: red; background-color: #ffcccc;padding: 10px;width: 100%;">
                                This Customer has an Arrears of (Rs) <label><?php echo $arrearsAmount; ?>.00</label><br>
                                Last Installment Paid on <label><?php echo $lastPaymentDate; ?>.</label> <br>
                                </p>  
                        <?php
                }

                else{
                        ?>
                                <p class="lastpayment" style="color: blue; background-color: #d9e6f2;padding: 10px;width: 100%;">
                                Last Installment Paid on <label><?php echo $lastPaymentDate; ?>.</label> No Arrearses. <br>
                                </p>                 
                        <?php
                }
        ?>

        <form action="ccviewcustomer.php?customerid=<?php echo $customerid; ?>" method="POST">

                Installment (Rs) <br>
                <input type="text" name="installment" value="<?php echo $installment.".00"; ?>"  readonly><br><br>
                Payment (Rs) <p id="paymentvald" style="color: red;margin-bottom: -2px;"></p>
                <input type="text" name="tpayment" placeholder="0.00"><br><br>
                Payment Date <br>
                <input type="text" name="PaidDate" value="<?php echo $Date;  ?>" readonly><br><br>
                <input type="submit" name="Receive" value="Receive" onclick="return confirm('Receive Money?');">
                <input type="submit" name="arrears" value="Mark As Arrears" style="background-color: #ff8080;" onclick="return confirm('Mark as an arrears?');">

        </form>

</div>  <!------right end----------->

<div class="col-sm-2">  <!------right coner start----------->

                                <h4>Today's Customers</h4>
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
                                while($row=$result2->fetch_assoc()){
                                        //echo $row['fullName']."<br>";
                                ?>

            
                <div class="table-responsive">          
                        <table class="table">
                                <tr>
                                        <td style="">
                                        <a href="ccviewcustomer.php?customerid=<?php echo $row["customerId"] ?>"><?php echo $row["nameWithInitials"] ?></a><br>
                                        <?php echo $row["city"] ?> 
                                        </td>
                                           
                                </tr>
                        </table>
                </div>
                                <?php
                                }
                        }
                }

        }
        else{
                echo "No Customers Today";
        }?> 
        
</div> <!------right coner end----------->


</body>
</html>


<?php 
//----------------============================receiving payment=================================-------------------

        if(isset($_POST['Receive'])){
                $tpayment=$_POST['tpayment'];
                if($tpayment==null){
                        //echo "<script>alert('Payment is Empty');</script>";
                        ?>
                                <script type="text/javascript">
                                        document.getElementById("paymentvald").innerHTML = "* Please fill out the Payment";
                                </script>
                        <?php
                }
                else{
                   


        //-------------------------------------------------------------------------------------------------------------------

                //----------------calculations-----------------------------------
                $newremainingLoanBalance=$remainingLoanBalance-$tpayment;
                
                $newarrearsAmount=$arrearsAmount+$installment-$tpayment;
                $newremainingNoOfInstallments=$remainingNoOfInstallments;

                //----------------------msg defining-------------------------------
                        $msg="Dear ".$NWI.",<br><br>"."Your Loan Payment Record is as follows,<br><br>"."Total Loan Amount (Rs) : ".$loanAmount."<br>Remaining Loan Amount (Rs) : ".$newremainingLoanBalance."<br>Remaining Installments : ".$newremainingNoOfInstallments."<br>Last Payment (Rs) : ".$tpayment."<br>Paid Date : ".$Date."<br>Arrears Amount (Rs) : ".$newarrearsAmount."<br><br>Thank you for join with us...";

                        //echo $msg;
                        mailsend($customerEmail,$msg);//sending mail to customer...

                //---------------- define arrears status--------------------------
               
                        if($newarrearsAmount>0){
                                $arrStatus="YES";
                                //echo "Marked as an Arrears"."<br>";
                                $query5="UPDATE customerareasedetails SET arrearsAmount='$newarrearsAmount' WHERE customerId='$customerid'";
                                if ($conn->query($query5) === TRUE) {
                                        echo "Arrears Updated";
                                }
                                else{
                                        echo "eror";
                                } 
                                     
                        }
                        else{
                            $arrStatus="NO"; 
                            $newremainingNoOfInstallments=$remainingNoOfInstallments-1;
                            $query6="UPDATE customerareasedetails SET arrearsAmount='0', arrearsPaidDate='$Date' WHERE customerId='$customerid'"; 
                            if ($conn->query($query6) === TRUE) {
                                        echo "Arrears Completed";
                                }
                                else{
                                        echo "eror";
                                } 
                        }
        

                //----------------------customer table update--------------- 

                $query3 = "UPDATE customerloandetails SET installmentPaidDate='$Date', arrearsStatus='$arrStatus', remainingLoanBalance='$newremainingLoanBalance',remainingNoOfInstallments='$newremainingNoOfInstallments',nextInstallmentDueDate='$a' WHERE customerId='$customerid'";

                if ($conn->query($query3) === TRUE) {
                    echo "Payment Updated";
                    ?>
                        <script>window.alert('Payment Updated');
                        window.location.assign('ccviewcustomer.php?customerid=<?php echo $customerid; ?>');</script>
                    <?php
                } else {
                    echo "System Failure";
                }


        }

        }

//---------------==============================-marking as an arrears============================---------------

        
        if(isset($_POST['arrears'])){
                $newarrearsAmount=$arrearsAmount+$installment;

                //----------------------msg defining-------------------------------
                        $msg="Dear ".$NWI.",<br><br>"."Your Loan Payment Record is as follows,<br><br>"."Total Loan Amount (Rs) : ".$loanAmount."<br>Remaining Loan Amount (Rs) : ".$remainingLoanBalance."<br>Remaining Installments : ".$remainingNoOfInstallments."<br>Last Payment (Rs) : "."0"."<br>Paid Date : ".$lastPaymentDate."<br>Arrears Amount (Rs) : ".$newarrearsAmount."<br><br>Make your payment on time for avoiding inconvieniences.";

                        //echo $msg;
                        mailsend($customerEmail,$msg);//sending mail to customer...


                //--------------------updating customer loan details--------------------------
                $query4 = "UPDATE customerloandetails SET arrearsStatus='YES' WHERE customerId='$customerid'";

                if ($conn->query($query4) === TRUE) {
                    echo "Marked as an Arrears";//---------------arrears status msg------------
                    ?>
                        <script>window.alert('Marked as an Arrears');
                        window.location.assign('ccviewcustomer.php?customerid=<?php echo $customerid; ?>');</script>
                    <?php
                } else {
                    echo "System Failure";
                }

        //----------------arrears table update---------------------------------------
                $query7="UPDATE customerareasedetails SET arrearsAmount='$newarrearsAmount' WHERE customerId='$customerid'"; 
                if ($conn->query($query7) === TRUE) {
                        echo "New Arrears Created";
                }
                else{
                        echo "eror";
                }


        }
        
 ?>

<?php 
$tpayment=0;

        function mailsend($customerEmail,$msg){
                $to = $customerEmail;
                $subject = 'DSP Group Micro Credits';
                $message = $msg;
                $headers = 'From:nemodorylab2018@gmail.com';
      
       
          if (mail($to,$subject,$message,$headers)){
              echo "<h5 style='color:blue;'>Email Sent</h5>";
             echo "<script>alert('Email sent to Customer.');</script>";
          }
          else{
                echo "<h5 style='color:red;'>Email Sending Failed!</h5>";
            echo "<script>alert('Email Sending Failed!');</script>";
          } 
        }
        
 ?>



 <?php 
       // require_once("footer.php");
  ?>
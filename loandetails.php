<!DOCTYPE <!DOCTYPE html>
<html>
<head>

<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<style>
    table {
        border-collopase:collapse;
        
        color:#588c7e;
        font-family:"Times New Roman", Times, serif;
        font-size:18px;
        text-align:center;
    }

     th {
        background-color:#588c7e;
        color:white;
        text-align:center;
    }
    .removeloan{
        text-align:center; 
    }
    .masterlist{margin: auto;
        width: 60%;
        border: 1px solid #588c7e;
        padding: 10px;
        margin-bottom:30px;
        margin-top:30px;
}
    tr:nth-child(odd){background-color:#b3ffe0}

    input[type=submit]{
            
            background-color: #009999;
            color: white;
            padding: 10px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        } 
        input[type=submit]:hover {
        background-color:#2eb8b8;
        }
        input[type=text]{
            width:200px;
            text-align:center;
            border-radius:2px;
            
        }

</style>

</head>
<body>
<table class="masterlist">
    <tr>
        <th>Loan ID</th>
        <th>Loan Type</th>
        <th>Payment Method</th>
        <th>Interest Rate</th>
       <!-- <th>Edit Loan</th>-->
    </tr>

    <?php
   // require("connection.php");

    $conn = mysqli_connect("localhost","root","","dspdb");
    if($conn->connect_error){
        die("Connection failed".$conn->connect_error);
    }

    $sql="SELECT* FROM loan";
    $result=$conn->query($sql);

    if($result->num_rows>0){
        while($row=$result->fetch_assoc()){
            echo "<tr><td>".$row["loanId"]."</td><td>".$row["loantype"]."</td><td>".$row["paymentMethods"]."</td><td>".$row["interestrate"]."%"."</td><td>"."</td><td>";//removed .'<a href="EditLoan.php">Edit</a>'
        }
        echo "</table>";
    }
        else{
            echo "0 result";
    }
    $conn-> close();
    ?>



</table>


    <?php
         if(isset($_POST["removeLoan"])){ 

            $loanId=$_POST["loanId"];
            require_once("connection.php");
            $sql = "DELETE FROM loan WHERE loanId= $loanId";
       
            if ($conn->query($sql) === TRUE) {
                
                header("location:loandetails.php");
            } 
            else{
                echo "Couldnt Remove";
            }

         }

    ?>

<div class="removeloan" style="font-size:16px;">
    <form action="loandetails.php" method="POST">
        Loan Id:<br>
        <input type="text" name="loanId" ><br>
        <input type="submit" name="removeLoan" value="Remove Loan" onclick="return confirm('Do you need to remove this Loan?');">
    </form>
</div>


</body>
</html>
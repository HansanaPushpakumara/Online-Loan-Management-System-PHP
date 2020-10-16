<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="css/header.css">
  <link rel="stylesheet" href="css/button.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <link rel="stylesheet" href="css/footer.css">
  
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
  <link href="http://fonts.googleapis.com/css?family=Cookie" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
  
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">

 
  <script src="http://code.jquery.com/jquery-2.1.1.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>

	<title>Loan Application</title>
	<style type="text/css">

		* { box-sizing: border-box; }
    button{
            width: auto;
            background-color: #009999;
            color: white;
            padding: 10px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            float: right;
        } 

button :hover {
            background-color:#2eb8b8;
        }

body{
  background-color:#CDE1E8;
}

/* STRUCTURE */
  
		.wrapper {
			padding: 5px;
			max-width: 960px;
			width: 95%;
			margin: 20px auto;
       box-shadow: 10px 10px 5px grey;
       background-color:#f0f5f5;
       border-radius: 10px;
      }
      
		

		.columns {
			display: flex;
			flex-flow: row wrap;
			
			margin: 5px 0;
		}

		.column {
			flex: 1;
		
			margin: 2px;
			padding: 10px;
			
			
		}
		#stepDiv{
			
			margin: 10px;
			text-align: center;
			color: green;
		}
		#contentDiv{
		
			margin: 10px;
			padding: 5px;
      font-size: 15px;
			
		}
		
		#cycleDiv{
			text-align: center;
			margin: 10px;
			padding-top: 3px;
      font-size: 15px;
		}
		.dot {
			  height: 50px;
			  width: 50px;
			  background-color: #bbb;
			  border-radius: 50%;
			  display: inline-block;
			  text-align: center;
			  padding: 3px;
			  font-size: 30px;
		}


		@media screen and (max-width: 980px) {
		  .columns .column {
				margin-bottom: 5px;
		    flex-basis: 40%;
				&:nth-last-child(2) {
					margin-right: 0;
				}
				&:last-child {
					flex-basis: 100%;
					margin: 0;
				}
			}
		}

		@media screen and (max-width: 680px) {
			.columns .column {
				flex-basis: 100%;
				margin: 0 0 5px 0;
			}
		}

	</style>
</head>
<body>
<!-----------------------header-start------------------------->


<div class="topnav" id="myTopnav">

  <img src="./images/logo.png" alt="Nature" class="responsive" style="width:130px;height: auto;padding-left: 2vh;">
  <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>

  <a href="#news">
    <?php 
        session_start();
        if(isset($_SESSION['username'])): ?>
        <a href="#" style="color: white;font-style: italic;background-color: #005959;text-decoration: none;"><?php echo $_SESSION['username']; ?></a>
        <?php else: ?>
        <?php endif; ?>

        <?php 
        if(isset($_SESSION['username'])): 
          ?>
        <a class="link" href="logout.php" style="text-decoration:none;background-color: #009999">logout</a>
        <?php else: ?>
          <a class="link" href="loginpage.php" style="text-decoration:none">login</a>
        <?php endif; ?>
        </a>



  <a href="#news">About Us</a>
  <a href="#contact">Contact</a>
  <a href="ApplicationPageFinal.php">Apply Loan</a> 
  <a href="home.php">Home</a>
  


</div>



<script>
function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}
</script>

<!-----------------------header-end------------------------->
<div>
  <img src="images/loanimageap1.jpg" style="width: 100%; height:20%; border-radius: 8px;">
</div>
<?php 

if(isset($_POST['sign_up'])){
	 if($_POST['sign_up'] == 'Start'){
        if (isset($_POST['Selection'])) {
            $_SESSION['Selection'] = $_POST['Selection'];
        } 
    }
    if($_POST['sign_up'] == 'Ex Step 1'){
        $_SESSION['nicNo'] = $_POST['nicNo']; 
    }

    if($_POST['sign_up'] == 'Ex Step 2'){
         $_SESSION['name'] = $_POST['name'];
         $_SESSION['address'] = $_POST['address'];
         $_SESSION['mNo'] = $_POST['mNo'];
         $_SESSION['email'] = $_POST['email'];
          $_SESSION['loanTime'] = $_POST['lTime'];
    }
    if($_POST['sign_up'] == 'Ex Step 3'){
        $_SESSION['loanType'] = $_POST['loanType']; 
    }

    if($_POST['sign_up'] == 'Ex Step 4' && $_SESSION['loanType']=="Business Loan"){
        $_SESSION['business'] = $_POST['business'];
        $_SESSION['bAddress'] = $_POST['bAddress'];
        $_SESSION['bIncome'] = $_POST['bIncome'];
        $_SESSION['otherIncome'] = $_POST['otherIncome'];
    }
     elseif($_POST['sign_up'] == "Ex Step 4"){
        
        $_SESSION['empName'] = $_POST['empName'];
        $_SESSION['desig'] = $_POST['desig'];
        $_SESSION['bSalary'] = $_POST['bSalary'];
        $_SESSION['income'] = $_POST['income'];
        $_SESSION['grelationship'] = $_POST['grelationship'];
        $_SESSION['gname'] = $_POST['gname'];
        $_SESSION['gnic'] = $_POST['gnic'];
        $_SESSION['goccupation'] = $_POST['goccupation'];
        $_SESSION['gmobile'] = $_POST['gmobile'];
        
    }

    if($_POST['sign_up'] == 'Ex Step 5' && $_SESSION['loanType']=="Business Loan"){
         
        $_SESSION['lpurpose'] = $_POST['lpurpose'];
        $_SESSION['lamount'] = $_POST['lamount'];
        $_SESSION['pMethod'] = $_POST['pMethod'];
       
        $string= $_POST['pDuration'];
        $firstCharacter = $string[0];
        $_SESSION['pDuration'] =$firstCharacter;


    }
      
    if($_POST['sign_up'] == "Ex Step 6" ){
        
        $_SESSION['lpurpose'] = $_POST['lpurpose'];
        $_SESSION['lamount'] = $_POST['lamount'];
        $_SESSION['pMethod'] = $_POST['pMethod'];
        
        $string= $_POST['pDuration'];
        $firstCharacter = $string[0];
        $_SESSION['pDuration'] =$firstCharacter;
       
        
    } 

    if($_POST['sign_up'] == 'Insert' && $_SESSION['loanType']=="Business Loan"){
      require_once('connection.php');

      $query10="select customerId from customer where nic='{$_SESSION['nicNo']}'";

        if ($res1 =mysqli_query($conn, $query10)) {
            if (mysqli_num_rows($res1) > 0) { 
              while ($row = mysqli_fetch_array($res1)) {                  
                      $_SESSION['cusId']=$row['customerId'];

              }
            }else{  echo $conn->connect_error; }
      } else{ echo $conn->connect_error; }
      $date=date("Y-m-d");
      $query11="update customer set nameWithInitials='{$_SESSION['name']}' , permanentAddress='{$_SESSION['address']}',email='{$_SESSION['email']}',mobileNo='{$_SESSION['mNo']}',business='{$_SESSION['business']}',businessAddress='{$_SESSION['bAddress']}',bIncome='{$_SESSION['bIncome']}',otherIncome='{$_SESSION['otherIncome']}',loanPurpose='{$_SESSION['lpurpose']}',loanStatus='AP',loanTime='{$_SESSION['loanTime']}',loanType='{$_SESSION['loanType']}',appliedDate='$date' where nic='{$_SESSION['nicNo']}'";
    if (mysqli_query($conn, $query11)) {
            
            $query12 = "INSERT INTO customerloandetails (loanType,appliedLoanAmount,appliedMethod,appliedLoanDuration,customerId,appliedDate) VALUES ( '{$_SESSION['Selection']}' ,'{$_SESSION['lamount']}', '{$_SESSION['pMethod']}','{$_SESSION['pDuration']}', '{$_SESSION['cusId'] }','$date')";
            if (mysqli_query($conn, $query12)) {
           
                $file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));  
                $query = "INSERT INTO attachdocuments(NIC,customerId,appliedDate) VALUES ('$file','{$_SESSION['cusId']}','$date')";  
                 if(mysqli_query($conn, $query))  
                 {  
                  echo "<script>alert('Your application placed in successfully. We will inform you as soon as possible.');window.location.assign('home.php');</script>";
                 } else{echo "Error customer ". $conn->error ; }

            }else{echo $conn->error;}
  }else{echo $conn->error;}
      
  $conn->close();
  }



//start inser data to database from personal loan



  if($_POST['sign_up'] == 'Insert2'){
      require_once('connection.php');

      $query10="select customerId from customer where nic='{$_SESSION['nicNo']}'";

        if ($res1 =mysqli_query($conn, $query10)) {
            if (mysqli_num_rows($res1) > 0) { 
              while ($row = mysqli_fetch_array($res1)) {               
                      $_SESSION['cusId']=$row['customerId']; }
            }
            else{ echo $conn->connect_error;}
      }else{echo $conn->connect_error;}
      $date=date("Y-m-d");
      $query11="update customer set nameWithInitials='{$_SESSION['name']}' , permanentAddress='{$_SESSION['address']}',email='{$_SESSION['email']}',mobileNo='{$_SESSION['mNo']}',empName='{$_SESSION['empName']}',designation='{$_SESSION['desig']}',bSalary='{$_SESSION['bSalary']}', monthlyIncome='{$_SESSION['income']}', loanPurpose='{$_SESSION['lpurpose']}',loanStatus='AP' , loanTime='{$_SESSION['loanTime']}',loanType='{$_SESSION['loanType']}',appliedDate='$date' where nic='{$_SESSION['nicNo']}'";
      if (mysqli_query($conn, $query11)) {
            $query12 = "INSERT INTO customerloandetails (loanType,appliedLoanAmount,appliedMethod,appliedLoanDuration,customerId,appliedDate) VALUES ( '{$_SESSION['Selection']}' ,'{$_SESSION['lamount']}', '{$_SESSION['pMethod']}','{$_SESSION['pDuration']}', '{$_SESSION['cusId'] }','$date')";

            if (mysqli_query($conn, $query12)) {
              $query13 = "INSERT INTO guaranteedetails (gName,gRelationship,gMobileNumber,occupation,customerId,gNic,appliedDate) VALUES ( '{$_SESSION['gname']}' ,'{$_SESSION['grelationship']}', '{$_SESSION['gmobile']}','{$_SESSION['goccupation']}', '{$_SESSION['cusId'] }','{$_SESSION['gnic'] }','$date')";
                    if (mysqli_query($conn, $query13)) {
                        $file = addslashes(file_get_contents($_FILES["image1"]["tmp_name"])); 
                        $file2 = addslashes(file_get_contents($_FILES["image2"]["tmp_name"])); 
                        $file3 = addslashes(file_get_contents($_FILES["image3"]["tmp_name"]));

                       $query14 = "INSERT INTO attachdocuments(NIC,paysheet,gNIC,customerId,appliedDate) VALUES ('$file','$file2','$file3','{$_SESSION['cusId']}','$date')";  
                       if(mysqli_query($conn, $query14))  
                       {  
                        echo "<script>alert('Your application placed in successfully. We will inform you as soon as possible.');window.location.assign('home.php');</script>";   
                       }
                         else{echo "Error customer ". $conn->error ; }
                  }else{echo $conn->error; }
            }else{echo $conn->error;}
      }else{ echo $conn->error;}
      
  $conn->close();
}

   
    










    

    if($_POST['sign_up'] == 'Step 1'){
        if (isset($_POST['number'])) {
            $_SESSION['number'] = $_POST['number'];
        }
        
    }
 
    if($_POST['sign_up'] == "Step 2"){
        $_SESSION['fname'] = $_POST['fname'];
        $_SESSION['name'] = $_POST['name'];
        $_SESSION['nic'] = $_POST['nic'];
        $_SESSION['dob'] = $_POST['dob'];
        $_SESSION['email'] = $_POST['email'];
        $_SESSION['pnumber'] = $_POST['pnumber'];
        $_SESSION['city'] = $_POST['city'];
        $_SESSION['address'] = $_POST['address'];
        $_SESSION['gender'] = $_POST['gender'];
        $_SESSION['mstatus'] = $_POST['mstatus'];




                   require_once('connection.php');
                   $sql = "SELECT loanStatus FROM customer where nic='{$_SESSION['nic']}'";
                   if ($res =mysqli_query($conn, $sql)) {
                            if (mysqli_num_rows($res) > 0) { 
                                 while ($row = mysqli_fetch_array($res)) { 
 
                                      if($row['loanStatus']=='AP'||$row['loanStatus']=='W'||$row['loanStatus']=='OAPR'||$row['loanStatus']=='MAPR'){
                                        echo '<script>alert("Your application is in approvel process. If need any assistance please contact +94 55 4561234");</script>';
                                        echo " 


                                                  <div class='wrapper'>
                                                    
                                                    <section class='columns'>
                                                      
                                                      <div class='column'>
                                                        
                                                        <div id='stepDiv'>
                                                          <h2>Step 1&nbsp;&nbsp;<image src='images/round_send_black_18dp.png' height='50px' width='50px'></h2><hr  style='height:2px; background-color:gray; '>
                                                        </div>

                                                        <div id='contentDiv' style='font-size:16px;'>
                                                          <form action='ApplicationPageFinal.php' method='post' id='form8'>
                                                            <p>Do you have taken loan before ?</p><br>
                                                            Yes<input type='radio' name='Selection' value='Y' id='a'>
                                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                            No<input type='radio' name='Selection' value='N' id='b'>
                                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                            <button type='submit' form='form8' value='Start' name='sign_up' id='abc'>Next</button>
                                                          </form>
                                                        </div>
                                                        
                                                        <div id='cycleDiv'>
                                                          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                          <span class='dot' style='background-color:green'>1</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                          <span class='dot'>2</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                          <span class='dot'>3</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                          <span class='dot'>4</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                          <span class='dot'>5</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                          <span class='dot'>6</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                          <span class='dot'>7</span>
                                                          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                        </div>
                                                      </div>

                                                    </section>  
                                                      
                                                  </div>
                                          ";
                                          return false;

                                        
                                      }
                                      elseif($row['loanStatus']=='LAPR'){
                                        echo '<script>alert("You have not finish your last loan. If need any assistance please contact +94 55 4561234");</script>';
                                        echo " 


                                                  <div class='wrapper'>
                                                    
                                                    <section class='columns'>
                                                      
                                                      <div class='column'>
                                                        
                                                        <div id='stepDiv'>
                                                          <h2>Step 1&nbsp;&nbsp;<image src='images/round_send_black_18dp.png' height='50px' width='50px'></h2><hr  style='height:2px; background-color:gray; '>
                                                        </div>

                                                        <div id='contentDiv'>
                                                          <form action='ApplicationPageFinal.php' method='post' id='form8'>
                                                            <p>Do you have taken loan before ?</p><br>
                                                            Yes<input type='radio' name='Selection' value='Y' id='a'>
                                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                            No<input type='radio' name='Selection' value='N' id='b'>
                                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                            <button type='submit' form='form8' value='Start' name='sign_up' id='abc'>Next</button>
                                                          </form>
                                                        </div>
                                                        
                                                        <div id='cycleDiv'>
                                                          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                          <span class='dot' style='background-color:green'>1</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                          <span class='dot'>2</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                          <span class='dot'>3</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                          <span class='dot'>4</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                          <span class='dot'>5</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                          <span class='dot'>6</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                          <span class='dot'>7</span>
                                                          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                        </div>
                                                      </div>

                                                    </section>  
                                                      
                                                  </div>
                                          ";
                                          return false;
                                      }
                                      elseif($row['loanStatus']=='C'){
                                          echo '<script>alert("You are our excisting customer. Please apply as exsisting customer.");</script>';
                        
                                          echo " 


                                                  <div class='wrapper'>
                                                    
                                                    <section class='columns'>
                                                      
                                                      <div class='column'>
                                                        
                                                        <div id='stepDiv'>
                                                          <h2>Step 1&nbsp;&nbsp;<image src='images/round_send_black_18dp.png' height='50px' width='50px'></h2><hr style='height:2px; background-color:gray;'>
                                                        </div>

                                                        <div id='contentDiv'>
                                                          <form action='ApplicationPageFinal.php' method='post' id='form8'>
                                                            <p>Do you have taken loan before ?</p><br>
                                                            Yes<input type='radio' name='Selection' value='Y' id='a'>
                                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                            No<input type='radio' name='Selection' value='N' id='b'>
                                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                            <button type='submit' form='form8' value='Start' name='sign_up' id='abc'>Next</button>
                                                          </form>
                                                        </div>
                                                        
                                                        <div id='cycleDiv'>
                                                          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                          <span class='dot' style='background-color:green'>1</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                          <span class='dot'>2</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                          <span class='dot'>3</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                          <span class='dot'>4</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                          <span class='dot'>5</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                          <span class='dot'>6</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                          <span class='dot'>7</span>
                                                          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                        </div>
                                                      </div>

                                                    </section>  
                                                      
                                                  </div>
                                          ";
                                          return false;
                                      }
                 
                            }
              
                          }
        
                  }
                   $conn->close();
  }


    if($_POST['sign_up'] === 'Step 3' && $_SESSION['number']=="Business Loan"){
    	$_SESSION['business'] = $_POST['business'];
        $_SESSION['bAddress'] = $_POST['bAddress'];
        $_SESSION['bIncome'] = $_POST['bIncome'];
        $_SESSION['otherIncome'] = $_POST['otherIncome'];
        
    }

    elseif($_POST['sign_up'] == "Step 3"){
        
        $_SESSION['empName'] = $_POST['empName'];
        $_SESSION['desig'] = $_POST['desig'];
        $_SESSION['bSalary'] = $_POST['bSalary'];
        $_SESSION['income'] = $_POST['income'];
        
    }
    
    if($_POST['sign_up'] == "Step 4" && $_SESSION['number']=="Business Loan"){
        
        $_SESSION['lpurpose'] = $_POST['lpurpose'];
        $_SESSION['lamount'] = $_POST['lamount'];
        $_SESSION['pMethod'] = $_POST['pMethod'];

        
        $string= $_POST['pDuration'];
        $firstCharacter = $string[0];
        $_SESSION['pDuration'] =$firstCharacter;

       
        
    }
     elseif($_POST['sign_up'] == "Step 4"){
        
        $_SESSION['grelationship'] = $_POST['grelationship'];
        $_SESSION['gname'] = $_POST['gname'];
        $_SESSION['gnic'] = $_POST['gnic'];
        $_SESSION['goccupation'] = $_POST['goccupation'];
        $_SESSION['gmobile'] = $_POST['gmobile'];
    }
    elseif($_POST['sign_up'] == "Step 5" && $_SESSION['number']=="Housing Loan"){

      
        $_SESSION['lpurpose'] = $_POST['lpurpose'];
        $_SESSION['lamount'] = $_POST['lamount'];
        $_SESSION['pMethod'] = $_POST['pMethod'];
        
        $string= $_POST['pDuration'];
        $firstCharacter = $string[0];
        $_SESSION['pDuration'] =$firstCharacter;
    }
    elseif($_POST['sign_up'] == "Step 5"){

      
        $_SESSION['lpurpose'] = $_POST['lpurpose'];
        $_SESSION['lamount'] = $_POST['lamount'];
        $_SESSION['pMethod'] = $_POST['pMethod'];
        
        $string= $_POST['pDuration'];
        $firstCharacter = $string[0];
        $_SESSION['pDuration'] =$firstCharacter;
    }

   
 
    if($_POST['sign_up'] === 'Submit' && $_SESSION['number']=="Business Loan"){
    	$date=date("Y-m-d");
	  require_once('connection.php');
      $query = "INSERT INTO customer (fullName,nameWithInitials,nic,dateOfBirth,email,permanentAddress,mobileNo,business,businessAddress,bIncome,otherIncome,city,gender,civilStatus,loanType,appliedDate,loanPurpose) VALUES ('{$_SESSION['fname']}' ,'{$_SESSION['name']}','{$_SESSION['nic']}','{$_SESSION['dob']}','{$_SESSION['email'] }',' {$_SESSION['address']}',' {$_SESSION['pnumber'] }',' {$_SESSION['business'] }','{$_SESSION['bAddress'] }', '{$_SESSION['bIncome']}','{$_SESSION['otherIncome']}', '{$_SESSION['city']}','{$_SESSION['gender']}','{$_SESSION['mstatus']}','{$_SESSION['number']}','$date' ,'{$_SESSION['lpurpose']}')";


    if (mysqli_query($conn, $query)) {
       $last_id = $conn->insert_id;
       
       $query2 = "INSERT INTO customerloandetails (appliedLoanDuration ,appliedLoanAmount,customerId ,appliedMethod,loanType,appliedDate) VALUES (
        '{$_SESSION['pDuration']}','{$_SESSION['lamount']}','$last_id', '{$_SESSION['pMethod']}','{$_SESSION['number']}','$date')";
       if (mysqli_query($conn, $query2)){


            $file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));  
                $query15 = "INSERT INTO attachdocuments(NIC,customerId,appliedDate) VALUES ('$file','$last_id','$date')";  
                 if(mysqli_query($conn, $query15))  
                 {  
                 echo "<script>alert('Your application placed in successfully. We will inform you as soon as possible.');window.location.assign('home.php');</script>";  
                 } else{echo "Error customer ". $conn->error ; }
      
       }else{
          echo "Error loan details". $conn->error ;
       		//echo '<script>alert("An error occure while creating record");</script>';
          // echo "<br>";
       }     
    } else {
        echo "Error customer". $conn->error ;
        //echo '<script>alert("An error occure while creating record");</script>';
        //echo "<br>";
    }
    $conn->close();
    }




    elseif($_POST['sign_up'] == "Submit"){

      $date=date("Y-m-d");
      require_once('connection.php');

      $query4 = "INSERT INTO customer (fullName,nameWithInitials,nic,dateOfBirth,email,permanentAddress,mobileNo,empName,designation,bSalary,monthlyIncome,loanPurpose,city,gender,civilStatus,loanType,appliedDate) 
      VALUES ('{$_SESSION['fname']}' ,'{$_SESSION['name']}', '{$_SESSION['nic']}','{$_SESSION['dob']}','{$_SESSION['email'] }',' {$_SESSION['address']}',' {$_SESSION['pnumber'] }',' {$_SESSION['empName'] }','{$_SESSION['desig'] }',' {$_SESSION['bSalary']}', '{$_SESSION['income'] }','{$_SESSION['lpurpose']}','{$_SESSION['city']}','{$_SESSION['gender']}','{$_SESSION['mstatus']}','{$_SESSION['number']}','$date' )";

    if (mysqli_query($conn, $query4)) {
       $last_id = $conn->insert_id;
       
       //echo ;
       $query5 = "INSERT INTO customerloandetails (appliedLoanDuration ,appliedLoanAmount,customerId ,appliedMethod,loanType,appliedDate) VALUES ('{$_SESSION['pDuration']}','{$_SESSION['lamount']}','$last_id','{$_SESSION['pMethod']}','{$_SESSION['number']}','$date')";
       
      if (mysqli_query($conn, $query5)){
       	$query6 = "INSERT INTO guaranteedetails (gNic ,gName,gRelationship ,gMobileNumber, occupation, customerID,appliedDate) VALUES ('{$_SESSION['gnic']}','{$_SESSION['gname']}','{$_SESSION['grelationship']}', '{$_SESSION['gmobile']}','{$_SESSION['goccupation']}','$last_id','$date' )";

          if (mysqli_query($conn, $query6)){

              $file = addslashes(file_get_contents($_FILES["image1"]["tmp_name"])); 
              $file2 = addslashes(file_get_contents($_FILES["image2"]["tmp_name"])); 
              $file3 = addslashes(file_get_contents($_FILES["image3"]["tmp_name"]));

              $query7 = "INSERT INTO attachdocuments(NIC,paysheet,gNIC,customerId,appliedDate) VALUES ('$file','$file2','$file3','$last_id','$date')";  
                
                if(mysqli_query($conn, $query7)) {  
                         echo "<script>alert('Your application placed in successfully. We will inform you as soon as possible.');window.location.assign('home.php');</script>"; 
                         //header("location:home.php"); 
                }else{echo "Error customer ". $conn->error; }
         }else{echo "Error customerA ". $conn->error ; 
              echo '<script>alert("An error occure while creating record");</script>';}

      }else{ echo "Error customerB ". $conn->error ; 
           echo '<script>alert("An error occure while creating record");</script>';}
    }else {
      echo "Error customerC ". $conn->error ; 
       echo '<script>alert("An error occure while creating record");</script>';}
  
  $conn->close();

 }
}

?>


<body>
 

<?php if (empty($_POST)){ ?>





<!-- Application body start -->


<!-----------First step for any loan type-------------->

<div class="wrapper">
	
	<section class="columns">
		
		<div class="column">
			
			<div id="stepDiv">
				<h2>Step 1&nbsp;&nbsp;<image src='images/round_send_black_18dp.png' height='50px' width='50px'></h2><hr  style="height:2px; background-color:gray; ">
       
			</div>

			<div id="contentDiv" style="text-align: center; font-size: 18px;">
				<form action="ApplicationPageFinal.php" method="post" id="form8">
					<p>Do you have taken loan before ?</p><br>
					Yes<input type="radio" name="Selection" value="Y" id="a">
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					No<input type="radio" name="Selection" value="N" id="b" checked>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<button type="submit" form="form8" value="Start" name="sign_up" id="abc">Next</button>
				</form>
			</div>
			
			<div id="cycleDiv">
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<span class="dot" style="background-color: green">1</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
 				<span class="dot">2</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<span class="dot">3</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<span class="dot">4</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<span class="dot">5</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<span class="dot">6</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<span class="dot">7</span>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			</div>
		</div>

	</section>	
		
</div>



<!-----------Second step for Exsisting customer-------------->
<?php }elseif ($_POST['sign_up'] === 'Start' && $_SESSION['Selection']=='Y'){ ?>



<div class="wrapper">
	
	<section class="columns">
		
		<div class="column">
			
			<div id="stepDiv">
				<h2>Step 2&nbsp;&nbsp;<image src='images/round_send_black_18dp.png' height='50px' width='50px'></h2><hr  style="height:2px; background-color:gray; ">
			</div>

			<div id="contentDiv">
				<form action="ApplicationPageFinal.php" method="post" id="form10">

					<label>Please enter your NIC number</label>
					<input placeholder="Plese enter your NIC" type="text" required name="nicNo" pattern='^[0-9]{9}[VvXx]$' title="XXXXXXXXXV" class="form-control">
					<button type="submit" form="form10" value="Ex Step 1" name="sign_up" >Next</button>
				</form>
		
			</div>
			
			<div id="cycleDiv">
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<span class="dot" >1</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
 				<span class="dot" style="background-color: green">2</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<span class="dot">3</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<span class="dot">4</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<span class="dot">5</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<span class="dot">6</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<span class="dot">7</span>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			</div>
		

	</section>	
		
</div>




<!-----------Third step for Exsisting customer-------------->
<?php }elseif ($_POST['sign_up'] === 'Ex Step 1'){ ?>
<div class="wrapper">
	
	<section class="columns">
		
		<div class="column">
			
			<div id="stepDiv">
				<h2>Step 3&nbsp;&nbsp;<image src='images/round_send_black_18dp.png' height='50px' width='50px'></h2><hr  style="height:2px; background-color:gray; ">
			</div>

			<div id="contentDiv">
				
		<div>
			<?php
			require_once('connection.php');
			$sql = "SELECT* FROM customer where nic='{$_SESSION['nicNo']}'";
			if ($res =mysqli_query($conn, $sql)) {
				if (mysqli_num_rows($res) > 0) { 
					while ($row = mysqli_fetch_array($res)) { 
			             
			            //echo $row['loanStatus']; 
			            if($row['loanStatus']=='AP'||$row['loanStatus']=='W'||$row['loanStatus']=='OAPR'||$row['loanStatus']=='MAPR'){
			            	echo'<script type="text/javascript">alert("Your application is checking. If need any assistance please contact us on +94 55 4561239");</script>';
                    echo " 
                                                    <div id='contentDiv' style='text-align: center; font-size: 18px;'>
                                                      
                                                          <form action='ApplicationPageFinal.php' method='post' id='form10'>
                                                            
                                                          <label>Please enter your NIC number</label>
                                                          <input placeholder='Plese enter your NIC' type='text' required name='nicNo' pattern='^[0-9]{9}[VvXx]$' title='XXXXXXXXXV' class='form-control'>

                                                            <button type='submit' form='form10' value='Ex Step 1' name='sign_up' >Next</button>
                                                          </form>
                                                        </div>
                                          ";
                                         
			            }
			            elseif($row['loanStatus']=='LAPR'){
			            	echo'<script type="text/javascript">alert("You are not settle your last loan");</script>';
                    echo " 


                                                 <div id='contentDiv'>
                                                      
                                                          <form action='ApplicationPageFinal.php' method='post' id='form10'>
                                                            
                                                          <label>Please enter your NIC number</label>
                                                          <input placeholder='Plese enter your NIC' type='text' required name='nicNo' pattern='^[0-9]{9}[VvXx]$' title='XXXXXXXXXV' class='form-control'>

                                                            <button type='submit' form='form10' value='Ex Step 1' name='sign_up' >Next</button>
                                                          </form>
                                                        </div>
                                          ";
                                          
			            }
			            elseif($row['loanStatus']=='C'){
			            	
			            
			            	echo '<form action="ApplicationPageFinal.php" method="post" id="form7">';	
			            	echo '<h3><image src="images/baseline_assignment_ind_black_18dp.png" height="35px" width="35px">&nbsp;&nbsp;Personal Details</h3>';
			            	echo '<label>Name with initials :</label> <input type="text" name="name" value="'.$row['nameWithInitials'].'" class="form-control">';
			            	echo '<label>permanent Address :</label><input type="text" name="address" value="'.$row['permanentAddress'].'" class="form-control">';
			            	echo '<label>Mobile number :</label><input type="text" name="mNo" value="'.$row['mobileNo'].'" class="form-control">';
			            	echo '<label>Email  :</label><input type="text" name="email" value="'.$row['email'].'" class="form-control">';
                    $number=$row['loanTime']+1;
			            	echo '<input type="hidden" name="lTime" value="'.$number.'">';

			            	echo '<p style="color:red;">*If any data has to be change, please made changes</p><br>';

			            	echo '<button type="submit" form="form7" value="Ex Step 2" name="sign_up">Next</button>';


			            	echo '</form>';



			            }
			           
			        }
			        
				}
				else{
					echo'<script type="text/javascript">alert("Plese check the NIC number and retry");</script>';
          echo " 


                                                        <div id='contentDiv'>
                                                      
                                                          <form action='ApplicationPageFinal.php' method='post' id='form10'>
                                                            
                                                          <label>Please enter your NIC number</label>
                                                          <input placeholder='Plese enter your NIC' type='text' required name='nicNo' pattern='^[0-9]{9}[VvXx]$' title='XXXXXXXXXV' class='form-control'>

                                                            <button type='submit' form='form10' value='Ex Step 1' name='sign_up' >Next</button>
                                                          </form>
                                                        </div>
                                                    
           ";
          
				}
			}
			else{
				echo'<script type="text/javascript">alert("Plese check the NIC number and retry");</script>';
        echo " 


                                                 <div id='contentDiv'>
                                                      
                                                          <form action='ApplicationPageFinal.php' method='post' id='form10'>
                                                            
                                                          <label>Please enter your NIC number</label>
                                                          <input placeholder='Plese enter your NIC' type='text' required name='nicNo' pattern='^[0-9]{9}[VvXx]$' title='XXXXXXXXXV' class='form-control'>

                                                            <button type='submit' form='form10' value='Ex Step 1' name='sign_up' >Next</button>
                                                          </form>
                                                        </div>
                                                    
                                          ";
                                          
			}

			?>

		</div>
			</div>
			
			<div id="cycleDiv">
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<span class="dot" >1</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
 				<span class="dot" >2</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<span class="dot" style="background-color: green">3</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<span class="dot">4</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<span class="dot">5</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<span class="dot">6</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<span class="dot">7</span>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			</div>
		</div>

	</section>	
		
</div>

<!-----------Fourth step for Exsisting customer-------------->
<?php }elseif ($_POST['sign_up'] === 'Ex Step 2'){ ?>
<div class="wrapper">
	
	<section class="columns">
		
		<div class="column">
			
			<div id="stepDiv">
				<h2>Step 4&nbsp;&nbsp;<image src='images/round_send_black_18dp.png' height='50px' width='50px'></h2><hr  style="height:2px; background-color:gray; ">
			</div>

			<div id="contentDiv" style='text-align: center; '>
				<form action="ApplicationPageFinal.php" method="post" id="form11" onsubmit="return ddlValidate4()">
				<label>Select Loan Type</label><br>
				<select name="loanType" id="loanType">
					<option value='0'>Please Select Loan Type</option> 
				  <option value='Personal Loan'>Personal Loan</option> 
				  <option value='Business Loan'>Bussiness Loan</option>  
				  <option value='Housing Loan'>Housing Loan</option> 
				</select> <p id="t4"></p>
           <script type="text/javascript">
                function ddlValidate4() {
                var e = document.getElementById("loanType");
                var optionSelIndex = e.options[e.selectedIndex].value;
               var optionSelectedText = e.options[e.selectedIndex].text;
            if (optionSelIndex == 0) {
                //alert("Please select a Course");
                document.getElementById("t4").innerHTML="*Please select the loan type";
                document.getElementById("t4").style.color = "red";
                return false;
            }
        }
    </script> 
				<button type="submit" form="form11" value="Ex Step 3" name="sign_up">Next</button >
         
			</form>
			</div>
			
			<div id="cycleDiv">
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<span class="dot" >1</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
 				<span class="dot" >2</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<span class="dot" >3</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<span class="dot" style="background-color: green">4</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<span class="dot">5</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<span class="dot">6</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<span class="dot">7</span>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			</div>
		</div>

	</section>	
		
</div>


<!-----------Fifth step for Exsisting customer-------------->








<!-----------first special step for bussiness loan ex customer--------------------->
<?php }elseif ($_POST['sign_up'] === 'Ex Step 3' && $_SESSION['loanType']=="Business Loan"){ ?>
	<div class="wrapper">
	
	<section class="columns">
		
		<div class="column">
			
			<div id="stepDiv">
				<h2>Step 5&nbsp;&nbsp;<image src='images/round_send_black_18dp.png' height='50px' width='50px'></h2><hr  style="height:2px; background-color:gray; ">
			</div>

			<div id="contentDiv">
				<form action="ApplicationPageFinal.php" method="post" id="form13" onsubmit="return ddlValidate4()">
		      
		      
		        
		       <h3><image src="images/baseline_work_black_18dp.png" height="35px" width="35px">&nbsp;&nbsp;Business Details</h3>
		              
		       <label>Business type:</label><br>
		        
		            <select name="business" id="btype">
                    <option value="0">Please select business type</option>
		                <option value="Business">Business</option>
		                <option value="Self employee">Self employee</option>
		                <option value="Other">Other</option>
		              </select>
		       
		      	<br>
            <p id="t4"></p>
           <script type="text/javascript">
                function ddlValidate4() {
                var e = document.getElementById("btype");
                var optionSelIndex = e.options[e.selectedIndex].value;
               var optionSelectedText = e.options[e.selectedIndex].text;
            if (optionSelIndex == 0) {
                //alert("Please select a Course");
                document.getElementById("t4").innerHTML="*Please select the bussiness type";
                document.getElementById("t4").style.color = "red";
                return false;
            }
        }
    </script>
		        <label>Business Address:</label>
		        <input  type="text"  name="bAddress" class="form-control" ><br>
		        
		        <h3><image src="images/dollar-currency-sign.png" height="35px" width="35px">&nbsp;&nbsp;Income Details:</h3>  
		        <label>Business income:</label>
		        <input  type="number"  name="bIncome" class="form-control" >
		        <label>Other income:</label>
		        <input  type="number"  name="otherIncome" class="form-control">
		        
		        <button type="submit" form="form13" value="Ex Step 4" name="sign_up">Next</button> 
			</form>
			</div>
			
			<div id="cycleDiv">
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<span class="dot" >1</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
 				<span class="dot">2</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<span class="dot">3</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<span class="dot" >4</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<span class="dot" style="background-color: green" >5</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<span class="dot">6</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<span class="dot">7</span>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			</div>
		</div>

	</section>	
		
</div>

<!-----------second special step for bussiness loan ex customer--------------------->
<?php }elseif ($_POST['sign_up'] === 'Ex Step 4' && $_SESSION['loanType']=='Business Loan'){ ?>
	<div class="wrapper">
	
	<section class="columns">
		
		<div class="column">
			
			<div id="stepDiv">
				<h2>Step 6&nbsp;&nbsp;<image src='images/round_send_black_18dp.png' height='50px' width='50px'></h2><hr  style="height:2px; background-color:gray; ">
			</div>

			<div id="contentDiv">
				<form action="ApplicationPageFinal.php" method="post" id="form14" onsubmit="return ddlValidate4()">
			<h3><image src="images/dollar-currency-sign.png" height="35px" width="35px">&nbsp;&nbsp;Loan Details :</h3>
		        <label>Loan Purpose:</label>       
            <textarea required name="lpurpose" class="form-control"  ></textarea>
		        <label>Loan Amount:</label>
		        <input  type="number" required name="lamount" class="form-control">
            
		        <br>
		        <label>Payment Method:</label>
		         <br>      
		         <?php
		            require_once('connection.php');
		              $sql="SELECT paymentMethods from loan where loantype='Business Loan'";
		          $result=mysqli_query($conn,$sql);
		          echo "<select id='paymentMethod' onchange='durationChange2(this);' name='pMethod'>";
		          echo "<option value='0'>Select the loan type</option>";
		          while($row=mysqli_fetch_array($result)){
		            echo "<option value='".$row['paymentMethods'] ."'>". $row['paymentMethods']. "</option>";
		              
		          } 
		         echo "</select>";
		        ?>
		        <br>
             <p id="t4"></p>
           <script type="text/javascript">
                function ddlValidate4() {
                var e = document.getElementById("paymentMethod");
                var optionSelIndex = e.options[e.selectedIndex].value;
               var optionSelectedText = e.options[e.selectedIndex].text;
            if (optionSelIndex == 0) {
                //alert("Please select a Course");
                document.getElementById("t4").innerHTML="*Please select the bussiness type";
                document.getElementById("t4").style.color = "red";
                return false;
            }
        }
    </script>
		        
		        <label>Loan Duration:</label>
		         <br>
		          <select id="duration2" name="pDuration">
		                <option value="0">Loan Duration</option>
		          </select>
		        <br>
		          <button type="submit" form="form14" value="Ex Step 5" name="sign_up">Next</button>
		 </form>
			</div>
			
			<div id="cycleDiv">
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<span class="dot" >1</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
 				<span class="dot" >2</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<span class="dot">3</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<span class="dot">4</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<span class="dot" >5</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<span class="dot" style="background-color: green" >6</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<span class="dot" >7</span>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;;
			</div>
		</div>

	</section>	
		
</div>

<!-----------third special step for bussiness loan ex customer--------------------->
<?php }elseif ($_POST['sign_up'] === 'Ex Step 5' && $_SESSION['loanType']=='Business Loan'){ ?>

<div class="wrapper">
	
	<section class="columns">
		
		<div class="column">
			
			<div id="stepDiv">
				<h2>Step 7&nbsp;&nbsp;<image src='images/round_send_black_18dp.png' height='50px' width='50px'></h2><hr  style="height:2px; background-color:gray; ">
			</div>
            
			<div id="contentDiv">
          <form action="ApplicationPageFinal.php" method="post" enctype="multipart/form-data" id="form28" onSubmit="return validate();">  
                <h3><image src="images/baseline_perm_media_black_18dp.png" height="35px" width="35px">&nbsp;&nbsp;Attach documents:</h3>
                <label>NIC copy :</label>
                     <input type="file" name="image" id="image" />  
                     <p style="color: blue;">*Please attach scaned copy of above document (File format: jpg,jpeg,png,gif)</p>
                     <button type="submit" form="form28" value="Insert" name="sign_up" id="insert">Next</button>
          </form> 
			</div>
			
			<div id="cycleDiv">
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<span class="dot" >1</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
 				<span class="dot" >2</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<span class="dot">3</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<span class="dot">4</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<span class="dot">5</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<span class="dot">6</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<span class="dot" style="background-color: green">7</span>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;;
			</div>
		</div>

	</section>	
		
</div>











<!--.....................Start of the Personal Loans and Housing loans.....................-->
<?php }elseif ($_POST['sign_up'] === 'Ex Step 3'){ ?>
<div class="wrapper">
	
	<section class="columns">
		
		<div class="column">
			
			<div id="stepDiv">
				<h2>Step 5&nbsp;&nbsp;<image src='images/round_send_black_18dp.png' height='50px' width='50px'></h2><hr  style="height:2px; background-color:gray; ">
			</div>

			<div id="contentDiv">
				<form action="ApplicationPageFinal.php" method="post" id="form16">
		      
		     	
		       	<h3>Employment Details:</h3>
		       	<label> Name of Employer:</label>
		        <input  type="text" required name="empName"  class="form-control">
		        <label>Designation:</label>
		        <input  type="text" required name="desig" class="form-control">
		        <br>
		        <h3>Salary Details:</h3>  
		        <label>Basic Salary:</label>
		        <input  type="number" required name="bSalary" class="form-control">
		        <label>Total income:</label>
		        <input  type="number" required name="income" class="form-control">
		        <br>
		        <h3>Guarantee Details</h3>
		        
		        <label>Relationship:</label>
		        <input  type="text"  name="grelationship" class="form-control">

		        <label>Name with Initials:</label>
		        <input  type="text"  required name="gname" class="form-control" pattern="^[a-zA-Z. ]*$">
		        <label>NIC:</label>
		        <input  type="text" required name="gnic" class="form-control" pattern='^[0-9]{9}[VvXx]$'>
		       <label> Occupation:</label>
		        <input  type="text" required name="goccupation" class="form-control">
		        <label>Mobile Number:</label>
		        <input  type="text" required name="gmobile" class="form-control" pattern='[0-9]{10}' title="(Format : 070 0000000)" placeholder="07X XXXXXXX">
		          
		        <button type="submit" form="form16" value="Ex Step 4" name="sign_up">Next</button>
		        
		       
		</form>
			</div>
			
			<div id="cycleDiv">
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<span class="dot" >1</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
 				<span class="dot" >2</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<span class="dot">3</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<span class="dot">4</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<span class="dot" style="background-color: green">5</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<span class="dot">6</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<span class="dot" >7</span>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;;
			</div>
		</div>

	</section>	
		
</div>
<!--.....................second step of the Personal Loans and Housing loans.....................-->
<?php }elseif ($_POST['sign_up'] === 'Ex Step 4'){ ?>
	<div class="wrapper">
	
	<section class="columns">
		
		<div class="column">
			
			<div id="stepDiv">
				<h2>Step 6&nbsp;&nbsp;<image src='images/round_send_black_18dp.png' height='50px' width='50px'></h2><hr  style="height:2px; background-color:gray; ">
			</div>

			<div id="contentDiv">
				<form action="ApplicationPageFinal.php" method="post" id="form17" onsubmit="return ddlValidate4()">
		        <h3>Loan Details :</h3>
		        <label>Loan Purpose:</label>
		        <input  type="text" required name="lpurpose" class="form-control">
		        <label>Loan Amount:</label>
		        <input  type="number" required name="lamount" class="form-control">
		        <label>Payment Method:</label>
		        <br>        
		              <?php
		            require_once('connection.php');
		              $sql="SELECT paymentMethods from loan where loantype='Personal Loan'";
		          $result=mysqli_query($conn,$sql);
		          echo "<select id='paymentMethod' onchange='durationChange2(this);' name='pMethod'>";
		          echo "<option value='0'>Select the loan type</option>";
		          while($row=mysqli_fetch_array($result)){
		            //echo "<option value='".$row['paymentMethods'] ."'>". $row['paymentMethods']. "</option>";
		            echo "<option value='".$row['paymentMethods'] ."'>". $row['paymentMethods']; echo "</option>";
		              
		          }
		         echo "</select>";
		        ?>
		        <br>
             <p id="t4"></p>
           <script type="text/javascript">
                function ddlValidate4() {
                var e = document.getElementById("paymentMethod");
                var optionSelIndex = e.options[e.selectedIndex].value;
               var optionSelectedText = e.options[e.selectedIndex].text;
            if (optionSelIndex == 0) {
                //alert("Please select a Course");
                document.getElementById("t4").innerHTML="*Please select the bussiness type";
                document.getElementById("t4").style.color = "red";
                return false;
            }
        }
    </script>
		        <label>Loan Duration:</label>
		        <br>
		          <select id="duration2" name="pDuration">
		                <option value="0">Loan Duration</option>
		          </select>
		        <br>
		        <button type="submit" form="form17" value="Ex Step 6" name="sign_up">Next</button>
		        
		        
		</form>
			</div>
			
			<div id="cycleDiv">
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<span class="dot" >1</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
 				<span class="dot" >2</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<span class="dot">3</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<span class="dot">4</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<span class="dot">5</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<span class="dot" style="background-color: green">6</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<span class="dot" >7</span>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;;
			</div>
		</div>

	</section>	
		
</div>
<!--.....................last step of the Personal Loans and Housing loans.....................-->
<?php }elseif ($_POST['sign_up'] === 'Ex Step 6' ){ ?>
<div class="wrapper">
	
	<section class="columns">
		
		<div class="column">
			
			<div id="stepDiv">
				<h2>Step 7&nbsp;&nbsp;<image src='images/round_send_black_18dp.png' height='50px' width='50px'></h2><hr  style="height:2px; background-color:gray; ">
			</div>

			<div id="contentDiv">
				<form action="ApplicationPageFinal.php" method="post" id="form19" enctype="multipart/form-data" onSubmit="return validate2();">
				
			      <h3>Attach documents:</h3>
			      
			      <label>NIC copy :</label><input type="file" name="image1" id="image1" />
            <label>Pay sheet :</label><input type="file" name="image2" id="image2" />
            <label>Gurantee NIC copy :</label><input type="file" name="image3" id="image3" />
			      <p style="color: red;">*Please attach scaned copy of above document (File format: jpg,jpeg,png,gif)</p>
			      <button type="submit" form="form19" value="Insert2" name="sign_up" id="insert2">Next</button>
			</form>
			</div>
			
			<div id="cycleDiv">
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<span class="dot" >1</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
 				<span class="dot" >2</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<span class="dot">3</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<span class="dot">4</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<span class="dot">5</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<span class="dot">6</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<span class="dot" style="background-color: green">7</span>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;;
			</div>
		</div>

	</section>	
		
</div>

<!---------------------End of the ex customer application-------------------------->

















<!---------------------Start of non- ex customer application-------------------------->

<!---------------------First step of non- ex customer application-------------------------->
<?php }elseif ($_POST['sign_up'] === 'Start' && $_SESSION['Selection']=='N'){ ?>
	<div class="wrapper">
	
	<section class="columns">
		
		<div class="column">
			
			<div id="stepDiv">
				<h2>Step 2&nbsp;&nbsp;<image src='images/round_send_black_18dp.png' height='50px' width='50px'></h2><hr  style="height:2px; background-color:gray; ">
			</div>

			<div id="contentDiv" style='text-align: center;'>
				<form action="ApplicationPageFinal.php" method="post" id="form1" onsubmit="return ddlValidate2()">
				<label>Select Loan Type</label><br>
				<select name="number" id="number">
					<option value=''>Please Select Loan Type</option> 
				  <option value='Personal Loan'>Personal Loan</option> 
				  <option value='Business Loan'>Bussiness Loan</option>  
				  <option value='Housing Loan'>Housing Loan</option> 
				</select>
        <p id="t2"></p>
				<button type="submit" form="form1" value="Step 1" name="sign_up">Next</button>
			</form>
       <script type="text/javascript">
                function ddlValidate2() {
                var e = document.getElementById("number");
                var optionSelIndex = e.options[e.selectedIndex].value;
               var optionSelectedText = e.options[e.selectedIndex].text;
            if (optionSelIndex == 0) {
                //alert("Please select a Course");
                document.getElementById("t2").innerHTML="*Please select the loan type";
                document.getElementById("t2").style.color = "red";
                return false;
            }
        }
    </script> 
			</div>
			
			<div id="cycleDiv">
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<span class="dot" >1</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
 				<span class="dot"style="background-color: green" >2</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<span class="dot" >3</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<span class="dot" >4</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<span class="dot">5</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<span class="dot">6</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<span class="dot">7</span>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			</div>
		</div>

	</section>	
		
</div>


<!---------------------Second step of non- ex customer application-------------------------->
<?php }elseif ($_POST['sign_up'] === 'Step 1' ){ ?>
<div class="wrapper">
	
	<section class="columns">
		
		<div class="column">
			
			<div id="stepDiv">
				<h2>Step 3&nbsp;&nbsp;<image src='images/round_send_black_18dp.png' height='50px' width='50px'></h2><hr  style="height:2px; background-color:gray; ">
			</div>

			<div id="contentDiv">
				<form action="ApplicationPageFinal.php" method="post" id="form3" onsubmit="return ddlValidate()" >
				<h3>Personal Details :</h3>
		        
		        
		        <label>Name in Full:</label><br>
		       
		        <input type="text" name="fname" required pattern="^[a-zA-Z ]+$"   class="form-control"> 
		        <label>Name with Initials:</label>
		        <input type="text" name="name" required pattern="^[a-zA-Z. ]*$" class="form-control"> 
		        <label>NIC:</label>
		        <input  type="text" required name="nic" pattern='^[0-9]{9}[VvXx]$' title="XXXXXXXXXV" placeholder="Plese enter the NIC" class="form-control"> 
            <label>Gender:</label><br>
            Male<input type="radio" name="gender" checked value="male">
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            Female<input type="radio" name="gender"  value="female"><br>
		        <label>Date of Birth:</label>
		        <input type="date" name="dob" class="form-control"><br>
            <label>Marital status:</label><br>
            Yes<input type="radio" name="mstatus" checked value="yes">
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            No<input type="radio" name="mstatus"  value="no"><br>
		        <label>Email Address:</label>
		        <input  type="email"  name="email" class="form-control">
		        <label>Contact No:</label>
		       <input type="tel" required name="pnumber" pattern='[0-9]{10}' title="(Format : 070 0000000)" placeholder="07X XXXXXXX"  class="form-control">
		        <label>Nearest town:</label>
		        <br>
		            <select name="city" class="form-control" id="town">
                    <option value="0">Please select nearest town</option>
		                <option value="Mahiyanganaya">Mahiyanganaya</option>
		                <option value="Badulla">Badulla</option>
		                <option value="Meegahakiula">Meegahakiula</option>
		                <option value="Kandekatiya">Kandekatiya</option>
                    <option value="Passara">Passara</option>
		              </select>
                  <p id="town2"></p>
		       <br>
            <script type="text/javascript">
                function ddlValidate() {
                var e = document.getElementById("town");
                var optionSelIndex = e.options[e.selectedIndex].value;
               var optionSelectedText = e.options[e.selectedIndex].text;
            if (optionSelIndex == 0) {
                //alert("Please select a Course");
                document.getElementById("town2").innerHTML="Please select your nearest town";
                document.getElementById("town2").style.color = "red";
                return false;
            }
        }
    </script> 
		        <label>Address:</label>
		        
            <textarea rows="4" cols="50" required  name="address" class="form-control">

            </textarea> 
		        <button type="submit" form="form3" value="Step 2" name="sign_up">Next</button>
		</form>
			</div>
			
			<div id="cycleDiv">
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<span class="dot" >1</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
 				<span class="dot" >2</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<span class="dot" style="background-color: green">3</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<span class="dot">4</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<span class="dot">5</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<span class="dot">6</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<span class="dot">7</span>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;;
			</div>
		</div>

	</section>	
		
</div>
<!--.....................Business loans application.....................-->

<!---------------------4th step of non- ex customer application-------------------------->
<?php }elseif ($_POST['sign_up'] === 'Step 2' && $_SESSION['number']=='Business Loan'){ ?>
	<div class="wrapper">
	
	<section class="columns">
		
		<div class="column">
			
			<div id="stepDiv">
				<h2>Step 4&nbsp;&nbsp;<image src='images/round_send_black_18dp.png' height='50px' width='50px'>s</h2>
			</div>

			<div id="contentDiv">
				<form action="ApplicationPageFinal.php" method="post" id="form4" onsubmit="return ddlValidate3()">
		     
		       <h3>Business Details</h3>
		              
		       <label>Business type:</label>
		       <br> 
		            <select name="business" id="btype" class='form-control'>
                    <option value="0">Select the bussiness type </option>
		                <option value="Business">Business</option>
		                <option value="Self employee">Self employee</option>
		                <option value="Other">Other</option>
		              </select>
		       
		      <br>
          <p id="t3"></p>
           <script type="text/javascript">
                function ddlValidate3() {
                var e = document.getElementById("btype");
                var optionSelIndex = e.options[e.selectedIndex].value;
               var optionSelectedText = e.options[e.selectedIndex].text;
            if (optionSelIndex == 0) {
                //alert("Please select a Course");
                document.getElementById("t3").innerHTML="*Please select the type of bussiness ";
                document.getElementById("t3").style.color = "red";
                return false;
            }
        }
    </script> 
		        <label>Business Address:</label>
		         <input  type="text"  name="bAddress" class="form-control" required><br>
		        
		        <h3>Income Details:</h3>  
		        <label>Business income:</label>
		          <input  type="text"  name="bIncome" class="form-control" required>
		        <label>Other income:</label>
		        <input  type="text"  name="otherIncome" class="form-control" required>
		        
		        <button type="submit" form="form4" value="Step 3" name="sign_up">Next</button>

		        
		       
		</form>
			</div>
			
			<div id="cycleDiv">
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<span class="dot" >1</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
 				<span class="dot" >2</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<span class="dot">3</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<span class="dot" style="background-color: green">4</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<span class="dot">5</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<span class="dot">6</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				
			</div>
		</div>

	</section>	
		
</div>

<!---------------------5th step of non- ex customer application-------------------------->
<?php }elseif ($_POST['sign_up'] === 'Step 3' && $_SESSION['number']=="Business Loan"){ ?>
<div class="wrapper">
	
	<section class="columns">
		
		<div class="column">
			
			<div id="stepDiv">
				<h2>Step 5&nbsp;&nbsp;<image src='images/round_send_black_18dp.png' height='50px' width='50px'></h2><hr  style="height:2px; background-color:gray; ">
			</div>

			<div id="contentDiv">
				<form action="ApplicationPageFinal.php" method="post" id="form5" onsubmit="return myFunction(); return ddlValidate4();">  
		         
		        <h3>Loan Details :</h3>
		        <label>Loan Purpose:</label>
		        
            <textarea rows="4" cols="50" required  name="lpurpose" class="form-control">

            </textarea> 
		        <label>Loan Amount:</label>
		        <input  type="text" required name="lamount" class="form-control" id="aaa">
            <p style="color: blue;" id="para">*Can not exceed Rs.20000.00</p>
            <script>
                    function myFunction() {
                      var ab=document.getElementById("aaa").value;
                      var a = parseInt(ab);

                      if(a>20000){
                        document.getElementById("aaa").style.borderColor = "red";
                        document.getElementById("para").style.color="red";
                        return false;
                        
                        }
                    }
           </script>



		        <label>Payment Method:</label>
		        <br>          
		              <?php
		            require_once('connection.php');
		              $sql="SELECT paymentMethods from loan where loantype='Business Loan'";
		          $result=mysqli_query($conn,$sql);
		          echo "<select id='paymentMethod' onchange='durationChange(this);' name='pMethod' class='form-control'>";
		          echo "<option value=''>Select the loan type</option>";
		          while($row=mysqli_fetch_array($result)){
		            echo "<option value='".$row['paymentMethods'] ."'>". $row['paymentMethods']."</option>";
		              
		          }
		         echo "</select>";
		        ?>
		       <br>
           <p id="t4"></p>
           <script type="text/javascript">
                function ddlValidate4() {
                var e = document.getElementById("paymentMethod");
                var optionSelIndex = e.options[e.selectedIndex].value;
               var optionSelectedText = e.options[e.selectedIndex].text;
            if (optionSelIndex == '') {
                //alert("Please select a Course");
                document.getElementById("t4").innerHTML="*Please select the payment method";
                document.getElementById("t4").style.color = "red";
                return false;
            }
        }
    </script> 

		        <label>Loan Duration:</label>
		        <br>
		          <select id="duration" name="pDuration" class='form-control'>
		                <option value="0">Loan Duration</option>
		              </select><br>
        
		       
		       <button type="submit" form="form5" value="Step 4" name="sign_up">Next</button>
		       

		     
		</form>  
			</div>
			
			<div id="cycleDiv">
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<span class="dot" >1</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
 				<span class="dot" >2</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<span class="dot">3</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<span class="dot">4</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<span class="dot" style="background-color: green">5</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<span class="dot">6</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				
			</div>
		</div>

	</section>	
		
</div>

<!---------------------6th step of non- ex customer application-------------------------->
<?php }elseif ($_POST['sign_up'] === 'Step 4' && $_SESSION['number']=="Business Loan"){ ?>

<div class="wrapper">
	
	<section class="columns">
		
		<div class="column">
			
			<div id="stepDiv">
				<h2>Step 6&nbsp;&nbsp;<image src='images/round_send_black_18dp.png' height='50px' width='50px'></h2><hr  style="height:2px; background-color:gray; ">
			</div>

			<div id="contentDiv">
				<form action="ApplicationPageFinal.php" method="post" id="form6" enctype="multipart/form-data" onSubmit="return validate();">  
		         
			     <h3>Attach documents:</h3>
			      
			      <label>NIC copy :</label><input type="file" name="image" id="image" />
			      <p style="color: red;">*Please attach scaned copy of above document (File format: jpg,jpeg,png,gif)</p>
			       
			       <button type="submit" form="form6" value="Submit" name="sign_up" id="insert">Submit</button>
		       

		     
			</form>  
			</div>
			
			<div id="cycleDiv">
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<span class="dot" >1</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
 				<span class="dot" >2</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<span class="dot">3</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<span class="dot">4</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<span class="dot" style="background-color: green">5</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<span class="dot">6</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				
			</div>
		</div>

	</section>	
		
</div>
<!--.....................End of the Business loans application.....................-->
















<!--.....................Start of the personal loans application.....................-->

<?php }elseif ($_POST['sign_up'] === 'Step 2'){ ?>
  <div class="wrapper">
  
  <section class="columns">
    
    <div class="column">
      
      <div id="stepDiv">
        <h2>Step 4&nbsp;&nbsp;<image src='images/round_send_black_18dp.png' height='50px' width='50px'></h2><hr  style="height:2px; background-color:gray; ">
      </div>

      <div id="contentDiv">
        <form action="ApplicationPageFinal.php" method="post" id="form20">
           <h3>Employment Details:</h3>
           <label> Name of Employer:</label>
            <input  type="text" required name="empName"  class="form-control">
            <label>Designation:</label>
             <input  type="text" required name="desig" class="form-control"><br>
            
            <h3>Salary Details:</h3>  
            <label>Basic Salary:</label>
              <input  type="number" required name="bSalary" class="form-control">
            <label>Other income:</label>
              <input  type="number" required name="income" class="form-control">
              <br>
                      
            <button type="submit" form="form20" value="Step 3" name="sign_up">Next</button>

            
           
    </form>
      </div>
      
      <div id="cycleDiv">
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <span class="dot" >1</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <span class="dot" >2</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <span class="dot">3</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <span class="dot" style="background-color: green">4</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <span class="dot" >5</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <span class="dot"  >6</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <span class="dot" >7</span>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;;
        
      </div>
    </div>

  </section>  
    
</div>



<?php }elseif ($_POST['sign_up'] === 'Step 3'){ ?>
  <div class="wrapper">
  
  <section class="columns">
    
    <div class="column">
      
      <div id="stepDiv">
        <h2>Step 5&nbsp;&nbsp;<image src='images/round_send_black_18dp.png' height='50px' width='50px'></h2><hr  style="height:2px; background-color:gray; ">
      </div>

      <div id="contentDiv">
        <form action="ApplicationPageFinal.php" method="post" id="form21">
           
              
              <h3>Guarantee Details</h3>
            
            <label>Relationship:</label>
            <input  type="text"  name="grelationship" class="form-control" required >

            <label>Name with Initials:</label>
            <input  type="text"  name="gname" class="form-control" required pattern="^[a-zA-Z. ]*$">
            <label>NIC:</label>
            <input  type="text"  name="gnic" class="form-control" required pattern='^[0-9]{9}[VvXx]$' title="XXXXXXXXXV" placeholder="Plese enter the NIC">
           <label> Occupation:</label>
            <input  type="text"  name="goccupation" class="form-control" required >
            <label>Mobile Number:</label>
            <input  type="text"  name="gmobile" class="form-control" required pattern='[0-9]{10}' title="(Format : 070 0000000)" placeholder="07X XXXXXXX">
                      


            <button type="submit" form="form21" value="Step 4" name="sign_up">Next</button>

            
           
    </form>
      </div>
      
      <div id="cycleDiv">
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <span class="dot" >1</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <span class="dot" >2</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <span class="dot">3</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <span class="dot" >4</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <span class="dot" style="background-color: green">5</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <span class="dot"  >6</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <span class="dot" >7</span>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;;
        
      </div>
    </div>

  </section>  
    
</div>





<?php }elseif ($_POST['sign_up'] === 'Step 4' && $_SESSION['number']=="Housing Loan" ){ ?>
  <div class="wrapper">
  
  <section class="columns">
    
    <div class="column">
      
      <div id="stepDiv">
        <h2>Step 6&nbsp;&nbsp;<image src='images/round_send_black_18dp.png' height='50px' width='50px'></h2><hr  style="height:2px; background-color:gray; ">
      </div>

      <div id="contentDiv">
        <form action="ApplicationPageFinal.php" method="post" id="form22" onsubmit="return myFunction(); return ddlValidate6();">
            <h3>Loan Details :</h3>
            <label>Loan Purpose:</label>
            
            <textarea rows="4" cols="50" required  name="lpurpose" class="form-control">

            </textarea> 
            <label>Loan Amount:</label>
            <input  type="number" required name="lamount" class="form-control" id="aaa">
            <p style="color: red;">*Can not exceed Rs.200 000.00</p>
            <script>
                    function myFunction() {
                      var ab=document.getElementById("aaa").value;
                      var a = parseInt(ab);

                      if(a>200000){
                        document.getElementById("aaa").style.borderColor = "red";
                        return false;
                        
                        }
                    }
           </script>
            <label>Payment Method:</label>
               <br>     
                  <?php
                require_once('connection.php');
                  $sql="SELECT paymentMethods from loan where loantype='Personal Loan'";
              $result=mysqli_query($conn,$sql);
              echo "<select id='paymentMethod' onchange='durationChange(this);' name='pMethod' class='form-control'>";
              echo "<option value=''>Select the loan type</option>";
              while($row=mysqli_fetch_array($result)){
                echo "<option value='".$row['paymentMethods'] ."'>". $row['paymentMethods']. "</option>";
                  
              }
             echo "</select>";
            ?>
            <br>
              <p id="t6"></p>
           <script type="text/javascript">
                function ddlValidate6() {
                var e = document.getElementById("paymentMethod");
                var optionSelIndex = e.options[e.selectedIndex].value;
               var optionSelectedText = e.options[e.selectedIndex].text;
            if (optionSelIndex == '') {
                //alert("Please select a Course");
                document.getElementById("t6").innerHTML="*Please select the payment method";
                document.getElementById("t6").style.color = "red";
                return false;
            }
        }
    </script> 
            <label>Loan Duration:</label>
             <br>
              <select id="duration" name="pDuration" class='form-control'>
                    <option value="0">Loan Duration</option>
                  </select>
             <br>
       
                      
          <button type="submit" form="form22" value="Step 5" name="sign_up">Next</button>

            
           
    </form>
      </div>
      
      <div id="cycleDiv">
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <span class="dot" >1</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <span class="dot" >2</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <span class="dot">3</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <span class="dot" >4</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <span class="dot" >5</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <span class="dot" style="background-color: green" >6</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <span class="dot" >7</span>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;;
        
      </div>
    </div>

  </section>  
    
</div>






<?php }elseif ($_POST['sign_up'] === 'Step 4'){ ?>
  <div class="wrapper">
  
  <section class="columns">
    
    <div class="column">
      
      <div id="stepDiv">
        <h2>Step 6&nbsp;&nbsp;<image src='images/round_send_black_18dp.png' height='50px' width='50px'></h2><hr  style="height:2px; background-color:gray; ">
      </div>

      <div id="contentDiv">
        <form action="ApplicationPageFinal.php" method="post" id="form22" onsubmit="return myFunction(); return ddlValidate6();">
            <h3>Loan Details :</h3>
            <label>Loan Purpose:</label>
            <textarea rows="4" cols="50" required  name="lpurpose" class="form-control">

            </textarea> 
            <label>Loan Amount:</label>
            <input  type="number" required name="lamount" class="form-control" id="aaa">
            <p style="color: blue;" id="para">*Can not exceed Rs.20 000.00</p>
            <script>
                    function myFunction() {
                      var ab=document.getElementById("aaa").value;
                      document.getElementById("para").style.color="red";
                      var a = parseInt(ab);

                      if(a>20000){
                        document.getElementById("aaa").style.borderColor = "red";
                        return false;
                        
                        }
                    }
           </script>
            <label>Payment Method:</label>
               <br>     
                  <?php
                require_once('connection.php');
                  $sql="SELECT paymentMethods from loan where loantype='Personal Loan'";
              $result=mysqli_query($conn,$sql);
              echo "<select id='paymentMethod' onchange='durationChange(this);' name='pMethod' class='form-control'>";
              echo "<option value=''>Select the loan type</option>";
              while($row=mysqli_fetch_array($result)){
                echo "<option value='".$row['paymentMethods'] ."'>". $row['paymentMethods']."</option>";
                  
              }
             echo "</select>";
            ?>
            <br>
                <p id="t6"></p>
           <script type="text/javascript">
                function ddlValidate6() {
                var e = document.getElementById("paymentMethod");
                var optionSelIndex = e.options[e.selectedIndex].value;
               var optionSelectedText = e.options[e.selectedIndex].text;
            if (optionSelIndex == '') {
                //alert("Please select a Course");
                document.getElementById("t6").innerHTML="*Please select the payment method";
                document.getElementById("t6").style.color = "red";
                return false;
            }
        }
    </script> 

            <label>Loan Duration:</label>
             <br>
              <select id="duration" name="pDuration" class='form-control'>
                    <option value="0">Loan Duration</option>
                  </select>
             <br>
       
                      
          <button type="submit" form="form22" value="Step 5" name="sign_up">Next</button>

            
           
    </form>
      </div>
      
      <div id="cycleDiv">
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <span class="dot" >1</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <span class="dot" >2</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <span class="dot">3</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <span class="dot" >4</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <span class="dot" >5</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <span class="dot" style="background-color: green" >6</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <span class="dot" >7</span>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;;
        
      </div>
    </div>

  </section>  
    
</div>






<?php }elseif ($_POST['sign_up'] === 'Step 5'){ ?>
  <div class="wrapper">
  
  <section class="columns">
    
    <div class="column">
      
      <div id="stepDiv">
        <h2>Step 7&nbsp;&nbsp;<image src='images/round_send_black_18dp.png' height='50px' width='50px'></h2><hr  style="height:2px; background-color:gray; ">
      </div>

      <div id="contentDiv">
        <form action="ApplicationPageFinal.php" method="post" id="form23" enctype="multipart/form-data" onSubmit="return validate2();">
        
            <h3>Attach documents:</h3>
            
            <label>NIC copy :</label><input type="file" name="image1" id="image1" />
            <label>Pay sheet :</label><input type="file" name="image2" id="image2" />
            <label>Gurantee NIC copy :</label><input type="file" name="image3" id="image3" />
            <p style="color: red;">*Please attach scaned copy of above document (File format: jpg,jpeg,png,gif)</p>
            <button type="submit" form="form23" value="Submit" name="sign_up" id="insert2">Next</button>

          </form>

      </div>
      
      <div id="cycleDiv">
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <span class="dot" >1</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <span class="dot" >2</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <span class="dot">3</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <span class="dot" >4</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <span class="dot" >5</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <span class="dot" >6</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <span class="dot" style="background-color: green" >7</span>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;;
        
      </div>
    </div>

  </section>  
    
</div>




<?php }?>

 <script>  
 $(document).ready(function(){  
      $('#insert').click(function(){  
           var image_name = $('#image').val();  
           if(image_name == '')  
           {  
                alert("Please Select Image");  
                return false;  
           }  
           else  
           {  
                var extension = $('#image').val().split('.').pop().toLowerCase();  
                if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)  
                {  
                     alert('Invalid Image File');  
                     $('#image').val('');  
                     return false;  
                }  
           }  
      });  
 });  
 </script>  

 <script>
function validate() {
  
  var file_size = $('#image')[0].files[0].size;
  if(file_size>65535) {
    alert("image size too large");
    return false;
  }
  
}
</script>

<script>
     var durationLists = new Array(2)  
     durationLists["Daily"] = ["1 months", "2 months", "3 months"]; 
     durationLists["Weekly"] = ["3 months", "6 months", "9 months"]; 
     durationLists["Monthly"] = ["6 months", "12 months", "18 months", "24 months"]; 
     
     function durationChange(selectObj) { 
     var idx = selectObj.selectedIndex; 
     var which = selectObj.options[idx].value; 
     cList = durationLists[which]; 
     var cSelect = document.getElementById("duration");  
     var len=cSelect.options.length; 
     while (cSelect.options.length > 0) { 
     cSelect.remove(0); 
     } 
     var newOption; 
     for (var i=0; i<cList.length; i++) { 
     newOption = document.createElement("option"); 
     newOption.value = cList[i];  
     newOption.text=cList[i]; 
     try { 
     cSelect.add(newOption);   
     } 
     catch (e) { 
     cSelect.appendChild(newOption); 
     } 
     } 
     } 

</script>



<script>
     var durationLists = new Array(2)  
     durationLists["Daily"] = ["2 months", "4 months", "6 months"]; 
     durationLists["Weekly"] = ["6 months", "12 months", "18 months"]; 
     durationLists["Monthly"] = ["12 months", "24 months", "30 months", "36 months"]; 
     
     function durationChange2(selectObj) { 
     var idx = selectObj.selectedIndex; 
     var which = selectObj.options[idx].value; 
     cList = durationLists[which]; 
     var cSelect = document.getElementById("duration2");  
     var len=cSelect.options.length; 
     while (cSelect.options.length > 0) { 
     cSelect.remove(0); 
     } 
     var newOption; 
     for (var i=0; i<cList.length; i++) { 
     newOption = document.createElement("option"); 
     newOption.value = cList[i];  
     newOption.text=cList[i]; 
     try { 
     cSelect.add(newOption);   
     } 
     catch (e) { 
     cSelect.appendChild(newOption); 
     } 
     } 
     } 

</script>






<!--Image validation personal loan-->
<script>  
 $(document).ready(function(){  
      $('#insert2').click(function(){  
           var image_name = $('#image1').val();  
           var image_name2 = $('#image2').val(); 
           var image_name3 = $('#image3').val();  
           if(image_name == ''|| image_name2 == ''||image_name3== '')  
           {  
                alert("Please Select Image");  
                return false;  
           }  
           else  
           {  
                var extension = $('#image1').val().split('.').pop().toLowerCase();  
                var extension2 = $('#image2').val().split('.').pop().toLowerCase(); 
                var extension3 = $('#image3').val().split('.').pop().toLowerCase(); 

                if((jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1) &&(jQuery.inArray(extension2, ['gif','png','jpg','jpeg']) == -1) &&(jQuery.inArray(extension3, ['gif','png','jpg','jpeg']) == -1))
                {  
                           alert('Please insert image files only');  
                           $('#image1').val(''); 
                           $('#image2').val('');
                           $('#image3').val('');
                           return false;
                           
                } else{
                      if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1){
                           alert('Please insert image files only');  
                           $('#image1').val(''); 
                           return false;

                      }
                      else if(jQuery.inArray(extension2, ['gif','png','jpg','jpeg']) == -1){
                           alert('Please insert image files only');  
                           $('#image2').val(''); 
                           return false;
                      }
                      else if(jQuery.inArray(extension3, ['gif','png','jpg','jpeg']) == -1){
                           alert('Please insert image files only');  
                           $('#image3').val(''); 
                           return false;
                      }
                      else if((jQuery.inArray(extension1, ['gif','png','jpg','jpeg']) == -1)||(jQuery.inArray(extension2, ['gif','png','jpg','jpeg']) == -1)){
                           alert('Please insert image files only');  
                           $('#image1').val(''); 
                           $('#image2').val(''); 
                           return false;
                      }
                      else if((jQuery.inArray(extension1, ['gif','png','jpg','jpeg']) == -1)||(jQuery.inArray(extension3, ['gif','png','jpg','jpeg']) == -1)){
                           alert('Please insert image files only');  
                           $('#image1').val(''); 
                           $('#image3').val(''); 
                           return false;
                      }
                      else if((jQuery.inArray(extension2, ['gif','png','jpg','jpeg']) == -1)||(jQuery.inArray(extension3, ['gif','png','jpg','jpeg']) == -1)){
                           alert('Please insert image files only');  
                           $('#image3').val(''); 
                           $('#image2').val(''); 
                           return false;
                      }

                }  
           }  
      });  
 });  
 </script>  
 <script>
function validate2() {
  
  var file_size = $('#image1')[0].files[0].size;
  var file_size2 = $('#image2')[0].files[0].size;
  var file_size3 = $('#image3')[0].files[0].size;
  if(file_size>65535||file_size2>65535||file_size3>65535) {
    alert("image size too large");
    return false;
  } 
  
}
</script>
<br><br>
	<footer class="footer-distributed">
	
      <div class="footer-center">
          <div>
          <i class="fa fa-map-marker"></i>
          <p>DSP Group Micro Credit<br> Mahiyanganaya</p>
        </div>
        <div>
          <i class="fa fa-phone"></i>
          <p>+94 55 455 4555</p>
        </div>
        <div>
          <i class="fa fa-envelope"></i>
          <p><a href="mailto:support@company.com">dsp@company.com</a></p>
        </div>
        
      </div>

      <div class="footer-left">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.2283057070813!2d81.07561229554683!3d6.982363167274395!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae4618a1a9fec37%3A0x1dd900702229654b!2sUva+Wellassa+University!5e0!3m2!1sen!2slk!4v1511197231475"  width="90%" height="100%" frameborder="0" style="border:0" allowfullscreen></iframe>
      </div>
      <div class="footer-right">
        <div class="footer-icons">
          <a href="#"><i class="fa fa-google" aria-hidden="true"></i></a>
          <a href="#"><i class="fa fa-facebook"></i></a>
          <a href="#"><i class="fa fa-twitter"></i></a>
          <a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
          
      </div>

      </div>

    </footer>



</body>
</html>

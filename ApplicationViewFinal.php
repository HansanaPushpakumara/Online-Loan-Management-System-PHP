<!DOCTYPE html>
<html>
<title>Application View Page</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
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

  <style type="text/css">
  * {box-sizing: border-box; overflow: auto;}


/* Style the tab */
.tab {
  float: left;
  width: 25%;
}
.tablinks{
      background-color: white;
      width: 100%;
      padding: 15px 20px;
      border-color: #d6d6c2;
      border-width: 1px;
      border-left: none;
      border-right:none;
      border-top:  none;
      cursor: pointer;
      text-align: left;
      }
#btnAppl{
	background-color: white;
      width: 100%;
      padding: 15px 20px;
      border-color: #d6d6c2;
      border-width: 1px;
      border-left: none;
      border-right:none;
      border-top:  none;
      cursor: pointer;
      text-align: left;
      background-color: ;
}


/* Change background color of buttons on hover */
.tab button:hover {
  background-color: #f5f5f0;
}

/* Create an active/current "tab button" class */
.tab button.active {
  background-color: #f5f5f0;
  color: black;
}

/* Style the tab content */
.tabcontent {
  float: left;
  padding: 0px 0px 0px 12px;
  margin: 0px;
  width: 75%;
  border-left: none;
  background-color: #ccccc5;
 
}

@media screen and (max-width: 450px) {
  .tab {float:none; width:100%;padding:5px;}
  .tabcontent{float:none; width:100%;}
  .tempDiv{float:none; width:100%;}
  body{overflow: auto;}
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
        $_SESSION['username']="kamal";
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


		
<?php if (empty($_POST)){ ?>

<div class="tab">
  
 			 <form action="ApplicationView.php" method="post" id="form1">

              <button type="submit" class="tablinks" value="NRA" form="form1" name="btnMenu"> New Loan Requests&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
              	<?php
				 require_once('connection.php');
				 
			      $query10="select loanType from officer where userName='{$_SESSION['username']}'";
			      
			      $num=0;
			        if ($res10 =mysqli_query($conn, $query10)) {
			            if (mysqli_num_rows($res10) > 0) { 
			              while ($row = mysqli_fetch_array($res10)) {   
			              	$type=$row['loanType'];
			              	$_SESSION['loanType']=$type;
			                $query11="select* from customer where loanType='$type' && loanStatus='AP' ";
			                    if ($result2 =mysqli_query($conn, $query11)) {	
			            			if (mysqli_num_rows($result2) > 0) {
			            				//echo '<div id="NLR" class="tabcontent">';
			            				while ($row2 = mysqli_fetch_array($result2)) {
			            					$num=$num+1;


			            					
			            			}
			            			//echo '</div>';
        								echo  $num;
        								$_SESSION['NRcount']=$num;
			            			}else{
			            				echo "There are no any loan requests";
			            			}
			            		}
			              }
			            }else{  echo $conn->error; }
			      } else{ echo $conn->error;}		
 				 
 				//echo $_SESSION['NRcount'];

			echo '</button>';
             echo' 	<button type="submit" class="tablinks" value="NCA" form="form1" name="btnMenu"> Not Complete Applications</button>
             		<button type="submit" class="tablinks" value="WMAPR" form="form1" name="btnMenu"> Wait for Manager Approval</button>
         		    <button type="submit" class="tablinks" value="AA" form="form1" name="btnMenu"> Approved Applications </button>
         	   		<button type="submit" class="tablinks" value="A" form="form1" name="btnMenu"> Arriase</button>
          		    <button type="submit" class="tablinks" value="EB" form="form1" name="btnMenu"> Email Box</button>';
          	echo '</form>';
 			echo '</div>';
 			mysqli_data_seek( $result2, 0 );
							echo '<div  class="tabcontent">';
			            				while ($row3 = mysqli_fetch_array($result2)) {
			            					


			            					
			            					echo '<form action="ApplicationView.php" method="post" id="form2">';
			            					echo '<button type="submit"  form="form2" value="'.$row3['customerId'];
			            					echo '" name="newReuest" id="btnAppl">';
			            					echo '<table><tr><td width="50%">'.$row3['nameWithInitials'];
			            					echo'</td>';
			            					echo '<td>'.$row3['appliedDate'];
			            					echo '</td></tr></table>';
			            					echo '</button><br>';
			            					echo '</form>';
			            					
			            			}
			            			echo '</div>';

			 

?>



	
	

<?php }elseif ($_SESSION['loanType']=='bLoan'){ ?>
	<div class="tab">
			<form action="ApplicationView.php" method="post" id="form1">
                <button class="tablinks" value="NLR" name="btnMenu" form="form1" type="submit"> New Loan Requests&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo  $_SESSION['NRcount'];?> </button>
                <button class="tablinks" value="NCA" name="btnMenu" form="form1" type="submit" > Not Complete Applications</button>
             	<button class="tablinks" value="WMAPR" name="btnMenu" form="form1" type="submit"> Wait for Manager Approval</button>
         		<button class="tablinks" value="AA" name="btnMenu" form="form1" type="submit"> Approved Applications </button>
         	  	<button class="tablinks" value="A" name="btnMenu" form="form1" type="submit"> Arriase</button>
          		<button class="tablinks" value="EB" name="btnMenu" form="form1" type="submit"> Email Box</button>
          	</form>
    </div>
	<div  class="tabcontent">
		<?php
		 
		require_once('connection.php');
			if($_POST['newReuest'] != NULL){
				$value=$_POST['newReuest'];
				echo $value;
				$query3="select* from customer where customerId='$value'";
				echo '<table>';
				            if ($result2 =mysqli_query($conn, $query3)) {
			                    	
			            			if (mysqli_num_rows($result2) > 0) {
			            				
			            				while ($row3 = mysqli_fetch_array($result2)) {

			            					echo '<tr><td><h4>Personal Details :</h4></td><td></td></tr>';
			            					echo '<tr><td>: </td><td>';echo $row3['loanTime'];'</td></tr>';
			            					echo '<tr><td>Applied date: </td><td>';echo $row3['appliedDate'];'</td></tr>';
			            					echo '<tr><td>Customer id: </td><td>';echo $row3['customerId'];'</td></tr>';
			            					echo '<tr><td>Name in Full: </td><td>';echo $row3['fullName'];'</td></tr>';
			            					echo '<tr><td>Name with initials: </td><td>';echo $row3['nameWithInitials'];'</td></tr>';
			            					echo '<tr><td>NIC: </td><td>';echo $row3['nic'];'</td></tr>';
			            					echo '<tr><td>gender </td><td>';echo $row3['gender'];'</td></tr>';
			            					echo '<tr><td>Date of Birth:  </td><td>';echo $row3['dateOfBirth'];'</td></tr>';
			            					echo '<tr><td>Email Address:  </td><td>';echo $row3['email'];'</td></tr>';
			            					echo '<tr><td>Contact No: </td><td>';echo $row3['mobileNo'];'</td></tr>';
			            					echo '<tr><td>Nearest town </td><td>';echo $row3['city'];'</td></tr>';
			            					echo '<tr><td>Address: </td><td>';echo $row3['permanentAddress'];'</td></tr>';
			            					echo '<tr><td><h4>Bussines Details</h4> </td><td></td></tr>';
			            					echo '<tr><td>Business type: </td><td>';echo $row3['business'];'</td></tr>';
			            					echo '<tr><td>Business address: </td><td>';echo $row3['businessAddress'];'</td></tr>';
			            					echo '<tr><td>Bussines income: </td><td>';echo $row3['bIncome'];echo '</td></tr>';
			            					echo '<tr><td>Other income: </td><td>';echo $row3['otherIncome'];'</td></tr>';

			            					$query4="select* from customerloandetails where customerId='$value' && appliedDate='{$row3['appliedDate']}' ";
						            			if ($result3 =mysqli_query($conn, $query4)) {
							            			if (mysqli_num_rows($result3) > 0) {
							            				
							            				while ($row4 = mysqli_fetch_array($result3)) {

							            					echo '<tr><td><h4>Loan Details :</h4></td><td></td></tr>';
							            					echo '<tr><td>Loan purpose: </td><td>';echo $row3['fullName'];'</td></tr>';
							            					echo '<tr><td>Loan amount: </td><td>';echo $row3['nameWithInitials'];'</td></tr>';
							            					echo '<tr><td>Payment method: </td><td>';echo $row3['nic'];'</td></tr>';

							            				$query4="select* from attachdocuments where customerId='$value'";
							            				$result5 = mysqli_query($conn, $query4); 
							            				while($row5 = mysqli_fetch_array($result5))  
										                {  
										                     echo '  
										                          <tr> 
										                          	<td>NIC copy</td> 
										                               <td>  
										                                    <img src="data:image/jpeg;base64,'.base64_encode($row['NIC'] ).'" height="200" width="200" class="img-thumnail" />  
										                               </td>  
										                          </tr>  
										                     ';  
										                }  




							            					
							            				}
							            			}else{echo $conn->error; echo "No";}
						            		}
			            					
			            				}
			            			}else{echo $conn->error;}
			            	}else{  echo $conn->error; }
			    echo '</table>';


     
      			
 				 $conn->close();
 		}
 		







		?>
	  
	</div>



<?php }elseif ($_SESSION['loanType']!='bLoan'){ ?>
	<div class="tab">
			<form action="ApplicationView.php" method="post" id="form1">
                <button class="tablinks" value="NCA" form="form1"> New Loan Requests&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo  $_SESSION['NRcount'];?> </button>
                <button class="tablinks" value="NCA" form="form1"> Not Complete Applications</button>
             	<button class="tablinks" value="WMAPR" form="form1"> Wait for Manager Approval</button>
         		<button class="tablinks" value="AA" form="form1"> Approved Applications </button>
         	  	<button class="tablinks" value="A" form="form1"> Arriase</button>
          		<button class="tablinks" value="EB" form="form1"> Email Box</button>
          	</form>
    </div>

	<div id="NLR" class="tabcontent">


		<?php
		if($_POST['newReuest'] != NULL){
			require_once('connection.php');
			
				$value=$_POST['newReuest'];
				echo $value;
				$query3="select* from customer where customerId='$value'";
				echo '<table>';
				            if ($result2 =mysqli_query($conn, $query3)) {
			                    	
			            			if (mysqli_num_rows($result2) > 0) {
			            				
			            				while ($row3 = mysqli_fetch_array($result2)) {

			            					echo '<tr><td><h4>Personal Details:</h4></td><td></td></tr>';
			            					echo '<tr><td>: </td><td>';echo $row3['loanTime'];'</td></tr>';
			            					echo '<tr><td>Applied date: </td><td>';echo $row3['appliedDate'];'</td></tr>';
			            					echo '<tr><td>Customer id: </td><td>';echo $row3['customerId'];'</td></tr>';
			            					echo '<tr><td>Name in Full: </td><td>';echo $row3['fullName'];'</td></tr>';
			            					echo '<tr><td>Name with initials: </td><td>';echo $row3['nameWithInitials'];'</td></tr>';
			            					echo '<tr><td>NIC: </td><td>';echo $row3['nic'];'</td></tr>';
			            					echo '<tr><td>gender </td><td>';echo $row3['gender'];'</td></tr>';
			            					echo '<tr><td>Date of Birth:  </td><td>';echo $row3['dateOfBirth'];'</td></tr>';
			            					echo '<tr><td>Email Address:  </td><td>';echo $row3['email'];'</td></tr>';
			            					echo '<tr><td>Contact No: </td><td>';echo $row3['mobileNo'];'</td></tr>';
			            					echo '<tr><td>Nearest town </td><td>';echo $row3['city'];'</td></tr>';
			            					echo '<tr><td>Address: </td><td>';echo $row3['permanentAddress'];'</td></tr>';
			            					echo '<tr><td><h4>Employement details</h4> </td><td></td></tr>';
			            					echo '<tr><td>Name of employer: </td><td>';echo $row3['empName'];'</td></tr>';
			            					echo '<tr><td>Designation: </td><td>';echo $row3['designation'];'</td></tr>';
			            					echo '<tr><td><h4>Salary Details</h4> </td><td></td></tr>';

			            					echo '<tr><td>Basic salary: </td><td>';echo $row3['bSalary'];echo '</td></tr>';
			            					echo '<tr><td>Other income: </td><td>';echo $row3['otherIncome'];'</td></tr>';

			            					$query4="select* from customerloandetails where customerId='$value' && appliedDate='{$row3['appliedDate']}' ";
						            			if ($result3 =mysqli_query($conn, $query4)) {
							            			if (mysqli_num_rows($result3) > 0) {
							            				
							            				while ($row4 = mysqli_fetch_array($result3)) {

							            					echo '<tr><td><h4>Loan Details :</h4></td><td></td></tr>';
							            					echo '<tr><td>Loan purpose: </td><td>';echo $row3['fullName'];'</td></tr>';
							            					echo '<tr><td>Loan amount: </td><td>';echo $row3['nameWithInitials'];'</td></tr>';
							            					echo '<tr><td>Payment method: </td><td>';echo $row3['nic'];'</td></tr>';

							            					$query4="select* from attachdocuments where customerId='$value'";
							            				if($result5 = mysqli_query($conn, $query4)){
									            				while($row5 = mysqli_fetch_array($result5))  
												                {  
												                     echo '  
												                          <tr> 
												                          	<td>NIC copy</td> 
												                               <td>  
												                                    <button><img src="data:image/jpeg;base64,'.base64_encode($row5['NIC'] ).'" height="200" width="200" class="img-thumnail" />  </button>
												                               </td>  
												                          </tr>  
												                     ';  
												                     echo '  
												                          <tr> 
												                          	<td>Paysheet copy</td> 
												                               <td>  
												                                    <button><img src="data:image/jpeg;base64,'.base64_encode($row5['paysheet'] ).'" height="200" width="200" class="img-thumnail" />  </button>
												                               </td>  
												                          </tr>  
												                     ';  
												                     echo '  
												                          <tr> 
												                          	<td>NIC copy</td> 
												                               <td>  
												                                   <button> <img src="data:image/jpeg;base64,'.base64_encode($row5['gNIC'] ).'" height="200" width="200" class="img-thumnail" />  </button>
												                               </td>  
												                          </tr>  
												                     ';  
												                }  



							            					
							            				}else{echo $conn->error; }
							            			}
						            		}else{echo $conn->error;}
			            					
			            				}
			            			}
			            			
			            			}else{  echo $conn->error; }
			            	}else{  echo $conn->error; }
			    echo '</table>';


     
      			
 				 $conn->close();
 		}else{  echo $conn->error; }
 		
 	?>
	  
	</div>





<?php }?>

















     
</body>
</html>

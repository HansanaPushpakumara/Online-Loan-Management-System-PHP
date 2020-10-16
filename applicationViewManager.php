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
table {
  border-collapse: collapse;
  width: 100%;
}
button{
            width: auto;
            background-color: #009999;
            color: white;
            padding: 10px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        } 


th, td {
  padding: 8px;
  text-align: left;
  border-bottom: 1px solid #ddd;
}

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
  background-color: #009999;
}

/* Create an active/current "tab button" class */
.tab button.active {
  background-color: #009999;
  color: black;
}

#link3{
        width: auto;
            background-color: #009999;
            color: white;
            padding: 10px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;

}

#link3, a:hover{
        	width: auto;
            background-color: #009999;
            color: white;
            padding: 10px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;

}
#linkMenu{
		padding: 10px 20px;
        background-color: #93D3D3;
        border-top-right-radius: 25px;
  		border-bottom-right-radius: 25px;
  		cursor: pointer;
  		color: black;
  		width: 100%;

}

/* Style the tab content */
.tabcontent {
  float: left;
  padding: 0px 0px 0px 12px;
  margin: 0px;
  width: 75%;
  border-left: none;
  background-color:#f0f5f5;
 
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
        //$_SESSION['username']="965644875v";
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
<?php


function myFunction2(){
			echo '<div class="tab">';
  						
		 			 echo '<form action="ApplicationView.php" method="post" id="form1">';

		            echo '<br><a href="ApplicationView.php?f=true" id="linkMenu"> Accepted apllications&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ';echo	$_SESSION['acceptC'];
		            echo' 	
		             		</a><br><br><a href="ApplicationView.php?b=true" id="linkMenu"> Wait for Manager Approval</a><br><br>
		         		    
		         	   		<a href="ApplicationView.php?d=true" id="linkMenu">Arrears</a><br><br>';
		          		    
		          	echo '</form>';
 			echo '</div>';
 			
			echo '<div  class="tabcontent">';
					require_once('connection.php');
				 
			     	
			      
			      $num=0;
			        
			              
			                $query11="select* from customer where loanStatus='OAPR' ";
			                    if ($result2 =mysqli_query($conn, $query11)) {	
			            			if (mysqli_num_rows($result2) > 0) {
			            				//echo '<div id="NLR" class="tabcontent">';
			            				while ($row3 = mysqli_fetch_array($result2)) {
			            					
			            					$_SESSION['loanType']=$row3['loanType'];

			            					
			            					echo '<form action="applicationViewManager.php" method="post" id="form2">';
			            					echo '<button type="submit"  form="form2" value="'.$row3['customerId'];
			            					echo '" name="newReuest" id="btnAppl">';
			            					echo '<table style="color:black"><tr><td width="50%">'; echo $row3['nameWithInitials'];
			            					echo'</td>';
			            					echo '<td>'.$row3['appliedDate'];
			            					echo '</td></tr></table>';
			            					echo '</button><br>';
			            					echo '</form>';
			            					
			            			}
			            			//echo '</div>';
        								//echo  $num;
        							
			            			}else{
			            				echo "There are no any accepted applications";
			            			}
			            		}
			          
 				//echo $_SESSION['NRcount'];
			            				
			            			
			 }
			 echo '</div>';
			 if (isset($_GET['hello'])||isset($_GET['f'])) {
    				myFunction2();
    				$_GET['hello']="hello";
    				$_GET['f']="f";
    				$_SESSION['hello']= $_GET['hello'];
    				$_SESSION['f']=  $_GET['f'];
    				//echo $_SESSION['h'];
 			 }
 			
 			 elseif (isset($_GET['b'])) {
    				
    				$_GET['b']="b";
    				$_SESSION['b']= $_GET['b'];

    				//echo $_SESSION['h'];
 			 }
 			
 			 elseif (isset($_GET['d'])) {
    				
    				$_GET['d']="d";
    				$_SESSION['d']= $_GET['d'];

    				//echo $_SESSION['h'];
 			 }
 			
			 

?>

	
	

<?php }elseif ($_SESSION['loanType']=='bLoan'){ ?>

	<?php 
			echo '<div class="tab">';
  						
		 			 echo '<form action="ApplicationView.php" method="post" id="form1">';

		            echo '<br><a href="ApplicationView.php?f=true" id="linkMenu"> Accepted apllications&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ';echo	$_SESSION['acceptC'];
		            echo' 	
		             		</a><br><br><a href="ApplicationView.php?b=true" id="linkMenu"> Wait for Manager Approval</a><br><br>
		         		    
		         	   		<a href="ApplicationView.php?d=true" id="linkMenu">Arrears</a><br><br>';
		          		    
		          	echo '</form>';
 			echo '</div>';
 			
 			
			?>
	<div  class="tabcontent">
		<table class="table-responsive">
		<?php
		 
		require_once('connection.php');
			if($_POST['newReuest'] != NULL){
				$value=$_POST['newReuest'];
				//echo $value;
				$query3="select* from customer where customerId='$value'";
				
				            if ($result2 =mysqli_query($conn, $query3)) {
			                    	
			            			if (mysqli_num_rows($result2) > 0) {
			            				
			            				while ($row3 = mysqli_fetch_array($result2)) {
			            					//$_SESSION['cId']=$row3['customerId'];
			            					echo '<tr><td>Loan term: </td><td>';echo $row3['loanTime'];'</td></tr>';
			            					echo '<tr><td>Loan type: </td><td>';echo $_SESSION['loanType'];'</td></tr>';
			            					echo '<tr><td><h4>Personal Details :</h4></td><td></td></tr>';
			            					
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
 		

 	function new2(){
 		
 	echo '<br><br><form action="approve.php" id="f1" method="post"><button type="submit" form="f1" value="mapr" name="workbtn2" onclick="return confirm ("Are You sure to accept this application?");">Approve</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="work3.php" id="link3" style="background-color:red;">Reject</a></form><br><br>';
 		
 	}
 	

 	if ($_SESSION['hello']=='hello'||$_SESSION['f']=='f') {
		    	new2();
		    	$_SESSION['hello']= '1';
    			$_SESSION['f']=  '2';
	}
	
	
	



		?>
	  
	</div>



<?php }elseif ($_SESSION['loanType']!='bLoan'){ ?>
	
			<?php 
			echo '<div class="tab">';
  						
		 			 echo '<form action="ApplicationView.php" method="post" id="form1">';

		            echo '<br><a href="ApplicationView.php?f=true" id="linkMenu"> Accepted apllications&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ';echo	$_SESSION['acceptC'];
		            echo' 	
		             		</a><br><br><a href="ApplicationView.php?b=true" id="linkMenu"> Wait for Manager Approval</a><br><br>
		         		    
		         	   		<a href="ApplicationView.php?d=true" id="linkMenu" >Arrears</a><br><br>';
		          		    
		          	echo '</form>';
 			echo '</div>';
 			
			?>
    

	<div class="tabcontent">
			<table>

		<?php
		if($_POST['newReuest'] != NULL){
			require_once('connection.php');
			
				$value=$_POST['newReuest'];
				//echo $value;

				$query3="select* from customer where customerId='$value'";
				
				            if ($result2 =mysqli_query($conn, $query3)) {
			                    	
			            			if (mysqli_num_rows($result2) > 0) {
			            				
			            				while ($row3 = mysqli_fetch_array($result2)) {
			            					$_SESSION['cId']=$row3['customerId'];
			            					echo '<tr><td>Loan term: </td><td>';echo $row3['loanTime'];'</td></tr>';
			            					echo '<tr><td>Loan type: </td><td>';echo $_SESSION['loanType'];'</td></tr>';
			            					echo '<tr><td><h4>Personal Details:</h4></td><td></td></tr>';
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
												                                    <button style="background-color:white;"><img src="data:image/jpeg;base64,'.base64_encode($row5['NIC'] ).'" height="300" width="300" class="img-thumnail" />  </button>
												                               </td>  
												                          </tr>  
												                     ';  
												                     echo '  
												                          <tr> 
												                          	<td>Paysheet copy</td> 
												                               <td>  
												                                    <button style="background-color:white;"><img src="data:image/jpeg;base64,'.base64_encode($row5['paysheet'] ).'" height="300" width="300" class="img-thumnail" />  </button>
												                               </td>  
												                          </tr>  
												                     ';  
												                     echo '  
												                          <tr> 
												                          	<td>Guranteer NIC copy</td> 
												                               <td>  
												                                   <button style="background-color:white;"> <img src="data:image/jpeg;base64,'.base64_encode($row5['gNIC'] ).'" height="300" width="300" class="img-thumnail" />  </button>
												                               </td>  
												                          </tr>  
												                     ';
												                
												                  
												                }  
	
							            				}else{echo $conn->error; }
							            			}
						            		}else{echo $conn->error;}
			            					
			            				}else{echo $conn->error;}
			            			}
			            			
			            	}else{  echo $conn->error; }
			            
			    echo '</table>';

						}else{echo $conn->error;}
     
      			
 				 $conn->close();
 		
 		
 	
 	function new2(){
 		
 	echo '<br><br><form action="approve.php" id="f1" method="post"><button type="submit" form="f1" value="mapr" name="workbtn2" onclick="return confirm ("Are You sure to accept this application?");">Approve</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="work3.php" id="link3" style="background-color:red;">Reject</a></form><br><br>';
 		
 	}
 	

 		
 	}
 	if ($_SESSION['hello']=='hello'||$_SESSION['f']=='f') {
		    	new2();
		    	$_SESSION['hello']= '1';
    			$_SESSION['f']=  '2';
	}
	

	}else{  echo $conn->error; }
	  
	echo '</div>';

?>



<?php 
	function myFunction5(){
		echo '<div class="tab">';
  						
		 			 echo '<form action="ApplicationView.php" method="post" id="form1">';

		            echo '<br><a href="ApplicationView.php?f=true" id="linkMenu"> Accepted apllications&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ';echo	$_SESSION['acceptC'];
		            echo' 	
		             		</a><br><br><a href="ApplicationView.php?b=true" id="linkMenu"> Wait for Manager Approval</a><br><br>
		         		    
		         	   		<a href="ApplicationView.php?d=true" id="linkMenu">Arrears</a><br><br>';
		          		    
		          	echo '</form>';
 			echo '</div>';
 			
		
 			
		echo '<div  class="tabcontent">';
			echo "Arrears";
		echo '</div>';
			            	



	}
	if (isset($_GET['d'])) {
    	myFunction5();
    	$_GET['d']='d';
    	$_SESSION['d']=$_GET['d'];
 	 }
?>

	




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

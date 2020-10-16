<html>
<head>
	<style type="text/css">
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
#spanTag{
	color: red;
	font-size: 20px;
}
	</style>

</head>
<h2>This one in officer's page</h2>
<?php
	session_start();
	$_SESSION['username']='kamal';
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
        								//echo  $num;
        								$_SESSION['NRcount']=$num;
			            			}else{
			            				$_SESSION['NRcount']='0';
			            				//echo "There are no any loan requests";
			            			}
			            		}
			              }
			            }else{  echo $conn->error; }
			      } else{ echo $conn->error;}		
  echo '<a href="ApplicationView.php?hello=true" target="_blanck" id="link3">New Loan Requests&nbsp;&nbsp;&nbsp;&nbsp;'; echo '<span id="spanTag"><b>'; echo $_SESSION['NRcount']; echo '</b></span></a>';
?>

<?php
	//session_start();
	require_once('connection.php');
				 
			      $query10="select loanType from officer where userName='{$_SESSION['username']}'";
			      
			      $num2=0;
			        if ($res10 =mysqli_query($conn, $query10)) {
			            if (mysqli_num_rows($res10) > 0) { 
			              while ($row = mysqli_fetch_array($res10)) {   
			              	$type=$row['loanType'];
			              	$_SESSION['loanType']=$type;
			                $query11="select* from customer where loanType='$type' && loanStatus='MAPR' ";
			                    if ($result2 =mysqli_query($conn, $query11)) {	
			            			if (mysqli_num_rows($result2) > 0) {
			            				//echo '<div id="NLR" class="tabcontent">';
			            				while ($row2 = mysqli_fetch_array($result2)) {
			            					$num2=$num2+1;


			            					
			            			}
			            			//echo '</div>';
        								//echo  $num;
        								$_SESSION['NRcount2']=$num2;
			            			}else{
			            				$_SESSION['NRcount2']='0';
			            			}
			            		}
			              }
			            }else{  echo $conn->error; }
			      } else{ echo $conn->error;}		
  echo '<a href="ApplicationView.php?hello2=true" target="_blanck" id="link3">Approved Applications&nbsp;&nbsp;&nbsp;&nbsp;';echo '<span id="spanTag"><b>'; echo $_SESSION['NRcount2']; echo '</b></span></a>';
?>

</html>
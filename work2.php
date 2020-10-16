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



<?php

	
				require_once('connection.php');
				$id= $_SESSION['cId'];
					 
					 	$query1="update customer SET loanStatus ='OAPR' where customerId='$id'";
					 	if ($conn->query($query1) === TRUE) {
                      echo "<script>alert('Application accepted');</script>";
                      
                  } else {
                      echo "<script>alert('Error');</script>";
                  }

        $conn->close();

					 
				
		?>
		





</body>
</html>

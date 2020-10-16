<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>

</style>
<link rel="stylesheet" type="text/css" href="./css/header.css">
</head>


<body>

<div class="topnav" id="myTopnav">

  <img src="./images/logo.png" alt="Nature" class="responsive" style="width:130px;height: auto;padding-left: 2vh;">
  <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
  <a href="#news">
        <?php 
       // session_start();
        //$user=$_SESSION['username'];
        if(isset($_SESSION['username'])): 

          ?>
        <a class="link" href="logout.php" style="text-decoration:none">logout</a>
        <?php else: ?>
          <a class="link" href="loginpage.php" style="text-decoration:none">login</a>
        <?php endif; ?>
  </a>
  <a href="AboutUs.php">About Us</a>
  <a href="contact.php">Contact</a>
 <a href="ApplicationPageFinal.php">Apply Loan</a>
  <a href="home.php">Home</a>
  
<?php if(isset($_SESSION['username'])): ?>
  <a href="."><?php echo $_SESSION['username']; ?></a>
<?php else: ?>
  <?php endif; ?>

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

<div class="headimg">
  
</div>


</body>
</html>

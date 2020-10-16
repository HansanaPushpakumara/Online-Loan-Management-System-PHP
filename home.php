<!DOCTYPE html>
<html>
<head>
	<title>DSP home</title>
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/header.css">
<link rel="stylesheet" href="css/button.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="css/footer.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	<style type="text/css">
		h2{
			text-align: center;
		}
		.applybtn{
			width: auto;
            background-color: #009999;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            float:  left;
            width: 100%;
            font-size: 20px;
		}
		.applybtn:hover{
			background-color:#2eb8b8;
			color: white;
		}
		h4{
			text-align: center;
		}
	</style>
</head>
<body>

<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12">
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



			  <a href="AboutUs.php">About Us</a>
			  <a href="contact.php">Contact</a>
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
		</div>
	</div>
</div>




<div class="container-fluid">
   
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
      <div class="item active">
        <img src="images/slide2.png" alt="Los Angeles" style="width:100%;">
      </div>

      <div class="item">
        <img src="images/slide1.jpg" alt="Chicago" style="width:100%;">
      </div>
    
      <div class="item">
        <img src="images/slide3.jpg" alt="New york" style="width:100%;">
      </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>


	<div class="container-fluid">
		<div class="row">
			
		</div>

		<div class="row" style="margin-bottom: 3vh;">
			<div class="col-sm-12">
				<h2>DSP GROUP MICRO CREDITS</h2>
				<h4>Three easy loan services and apply methods.</h4>
			</div>
		</div>

		<div class="row" style="margin-bottom: 15vh;">
			<div class="col-sm-4">
				<img src="images/personal.jpg" alt="Denim Jeans" style="width:100%">
				<h2>Personal Loans</h2>
				<p>Personal Loans have made it as easy as it can be to transcend from dreaming to sharing. And what is more exciting and fulfilling than sharing a dream with someone you love. It could be a trip abroad with your mother, or sending your child to university, or maybe to finance your perfect wedding. Whatever it may be, always remember, the best things in life were meant to be shared.</p>
				<form>
				<button class="applybtn" formaction="ApplicationPageFinal.php">Apply Now</button></form>
			</div>
			<div class="col-sm-4">
				<img src="images/business.jpg" alt="Denim Jeans" style="width:100%">
				<h2>Buisness Loans</h2>
				<p>We understand that every business is unique. That’s why we have carefully designed our business loans and related services with distinctive features that can provide you with the financing to match your needs. We offer the expertise & individualized solutions for the products you need, and the results you want with DSP Group Business Loans.</p>
				<form><button class="applybtn" formaction="ApplicationPageFinal">Apply Now</button></form>
			</div>
			<div class="col-sm-4">
				<img src="images/housing.jpg" alt="Denim Jeans" style="width:100%">
				<h2>Housing Loans</h2>
				<p>You can apply for a Housing Loan from DSP Group Micro Credits even if you are 55 years old and settle on a repayment scheme which suits your income.You can apply a loan for Purchase a house
				Construct a house
				Purchase a bare land & construct a house for residential purposes
				Complete construction of a partially-built house
				Renovate, modify or extend an existing house</p>
				<form><button class="applybtn" formaction="ApplicationPageFinal">Apply Now</button></form>
			</div>
		</div>



		<div class="row">
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




		</div>


	</div>
</body>
</html>
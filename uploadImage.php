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

<?php 
 global $conn;
      //require_once('connection.php');
      $servername = "localhost";
      $username = "root";
      $password = "";
      $conn = new mysqli($servername, $username, $password);

      // Check connection
      if ($conn->connect_error) {
           die("Connection failed: " . $conn->connect_error);
      }
     //if connected then Select Database.
      $db=mysqli_select_db($conn,"dspdb");
//$_SESSION['cId']
if(isset($_POST['sign_up'])){
	 $date=date("Y-m-d");
    //require_once('connection.php');
    if($_POST['sign_up'] == 'upload'){         
                $file = addslashes(file_get_contents($_FILES["image1"]["tmp_name"])); 
                $file2 = addslashes(file_get_contents($_FILES["image2"]["tmp_name"])); 
                $file3= addslashes(file_get_contents($_FILES["image3"]["tmp_name"]));  
                $query = "INSERT INTO attachdocuments(NIC,paysheet,gNIC,customerId,appliedDate) VALUES ('$file','$file2','$file3','{$_SESSION['cId']}','$date')";  
                 if(mysqli_query($conn, $query))  
                 {  
                  $sql="update customer SET loanStatus='AP' where customerId='{$_SESSION['cId']}'";
                  if(mysqli_query($conn, $sql)){
                    echo "<script>alert('Image upload successfuly');window.location.assign('officer.php');</script>";
                  }

                  
                 } else{echo "Error customer ". $conn->error ; }

            }else{echo $conn->error;}
            
  }else{echo $conn->error;}
  $conn->close();
?>

<body>
 






<div class="wrapper">
	
	<section class="columns">
		
		<div class="column">
			
			

			<div id="contentDiv">
				<form action="uploadImage.php" method="post" id="form19" enctype="multipart/form-data" onSubmit="return validate2();">
				
			      <h3>Attach documents:</h3>
			      
			      <label>NIC copy :</label><input type="file" name="image1" id="image1" />
            <label>Pay sheet :</label><input type="file" name="image2" id="image2" />
            <label>Gurantee NIC copy :</label><input type="file" name="image3" id="image3" />
			      <p style="color: red;">*Please attach scaned copy of above document (File format: jpg,jpeg,png,gif)</p>
			      <button type="submit" form="form19" value="upload" name="sign_up" id="insert2">Upload image</button>
			</form>
			</div>
			
			
		</div>

	</section>	
		
</div>





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

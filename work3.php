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

      echo '<div class="tab">';
  
           echo '<form action="ApplicationView.php" method="post" id="form1">';

                echo '<a href="ApplicationView.php?f=true"> New Loan Requests&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ';echo  $_SESSION['NRcount'];
                echo'   <br><a href="ApplicationView.php?a=true">Not Complete Applications</a><br>
                    <a href="ApplicationView.php?b=true"> Wait for Manager Approval</a><br>
                    <a href="ApplicationView.php?c=true">Approved Applications</a> <br>
                    <a href="ApplicationView.php?d=true">Arriase</a><br>
                      <a href="ApplicationView.php?e=true"> Email Box</a><br>';
                echo '</form>';
      echo '</div>';
      
    
      echo '<div  class="tabcontent">';
          //require_once('connection.php');
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

        $id= $_SESSION['cId'];
           
            $query1="select* from customer where customerId='{$_SESSION['cId']}'";
            if ($result =mysqli_query($conn, $query1)) {
                          if (mysqli_num_rows($result) > 0) {
                          while ($row3 = mysqli_fetch_array($result)) {
                            $nameWithInitials=$row3['nameWithInitials'];
                            $email=$row3['email'];
                          }

                        }
                  }else{echo "error";}

           
     
            //----------------------------**Reject applications*----------------------------
             if(isset($_POST['reject'])){

              
              $reason=$_POST['reason'];
              $to=$email;
              $subject="DSP GROUP MICRO CREDITS";
              $body="Dear ".$nameWithInitials.",<br><br>Sorry. We cannot approve your loan application because of this ".$reason."<br><br><br>Thank You!<br>Manager<br>(DSP GROUP MICRO CREDITS)";
              //echo $body."<br>";
              sendmail($body,$subject,$to);
              
            }
            
    ?>
     <?php 

  function sendmail($body,$subject,$to){
    $headers ="Mail";
    include "classes/class.phpmailer.php";
    $mail=new PHPMailer();
    $mail->IsSMTP();
    $mail->SMTPDebug=1;
    $mail->SMTPAuth=true;
    $mail->SMTPSecure='ssl';
    $mail->Host="smtp.gmail.com";
    $mail->Port=465;
    $mail->IsHTML(true);
    $mail->Username=("nemodorylab2018@gmail.com");
    $mail->Password="computerlab";
    $mail->SetFrom("nemodorylab2018@gmail.com");

    $mail->Subject=$subject;
    $mail->Body=$body;
    $mail->AddAddress($to);

    if(!$mail->Send()){
        echo "Mailer Erro";
      }
    else{
        //echo "Mail is sent successfully";
      require_once("connection.php");
     myUpdateFunction2($conn);
      }
  }

  function myUpdateFunction2($conn){
                  
                  $sql2="delete from customer where customerId='{$_SESSION['cId']}'";
                  if ($conn->query($sql2) === TRUE) {
                      $sql3="delete from customerloandetails where customerId='{$_SESSION['cId']}'";
                      if ($conn->query($sql3) === TRUE){
                          $sql4="delete from guaranteedetails where customerId='{$_SESSION['cId']}'";
                          if ($conn->query($sql4) === TRUE){
                            $sql5="delete from attachdocuments where customerId='{$_SESSION['cId']}'";
                            if ($conn->query($sql5) === TRUE){
                                    echo "<script>alert('Mail send successfully');</script>";
                          } {echo "Error updating record: " . $conn->error;}

                      }else {echo "Error updating record: " . $conn->error;}
                      
                  } else {echo "Error updating record: " . $conn->error;}

                 // $conn->close();
            }
      } 

  ?>
  <form action="work3.php"  method ="POST"> 
          
              <label>
              Reason to reject:</label><br>
               <textarea name="reason" rows="3" cols="30" class="textarea form-control" required ></textarea><br>
              <input type="submit" name="reject" value="Reject" onclick="return confirm ('Are You sure to send the Email?');">
             
          
          </form>

         
      </div>





</body>
</html>

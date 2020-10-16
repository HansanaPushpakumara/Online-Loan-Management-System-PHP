 <?php 
 

  if(empty($_POST)){
  require_once('connection.php');


   $query2 = "SELECT* FROM customerloandetails ";
             $result2=$conn->query($query2);
             $row=$result2->fetch_assoc();
         
            if ($result2->num_rows > 0) {    
               while($row=mysqli_fetch_array($result2)){
               	$insDue=$row['installmentDueDate']; 
               	$cid=$row['customerId']; 
                $insDue1=strtotime($insDue);

                 $date=time();  
                 
                 

                $datediff = $date - $insDue1 ;
                $days= round($datediff / (60 * 60 * 24));
                   if($days>3){
                   	 //echo "days";echo round($datediff / (60 * 60 * 24));
                

		        require_once('connection.php');
		        $sql3 = "UPDATE customerloandetails SET arrearsStatus='YES' WHERE  customerId='cid'";
		        	
    					if(!isset($_SESSION)) 
   				 { 
		        session_start();
		          $_SESSION['CiD']=$cid;
		          }
		      		        
		        if ($conn->query($sql3) === TRUE) {
		           $sql = "SELECT * FROM customer where customerId='{$_SESSION['CiD']}'";
		           $result=$conn->query($sql);
		             $row=$result->fetch_assoc();

		             if($result->num_rows > 0){
		                $cid=$row['customerId'];
		                $email=$row['email'];
		                $nameWithInitials =$row['$nameWithInitials'];
		                //send($cid,$conn);


		                $sql = "SELECT * FROM customerloandetails where customerId='{$_SESSION['CiD']}'";
		           $result=$conn->query($sql);
		             $row=$result->fetch_assoc();

		             if($result->num_rows > 0){
		                $lType=$row['loanType'];
		                $installmentDueDate=$row['installmentDueDate'];

		                 $to=$email;
		                 echo $to;
		                 $subject="DSP GROUP MICRO CREDITS";
		                 $body="Dear ".$nameWithInitials.",<br><br>"."Your ".$lType."is now in arrearse Status because of you did not paid installment on ".$installmentDueDate.".<br><br><br><br>Keep pay your installmentand and avoid inconvenience occured may be happened.<br><br>Thank You!<br>Manager<br>(DSP GROUP MICRO CREDITS)";
		    
		                    sendmail2($body,$subject,$to);
		            }
		        }

		      } else {
		          echo "<script>alert('Error Occured!');</script>";
		      }   




			}



                }

               }
               			  function sendmail2($body,$subject,$to){
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
			        require_once("connection.php");
			        $date=date("Y-m-d");
			        ano($conn,$date);
			 
			      }
			    else{
			        echo "Mail is sent successfully";
			        //
			        require_once("connection.php");
			        $date=date("Y-m-d");
			        ayes($conn,$date);
			        

			      }
			  }
                
	}

			  function ayes($conn,$date){
			        
			        
			        $sql40= "INSERT INTO customerareasedetails (customerId,mailStatus ,arrearseDate) VALUES('{$_SESSION['CiD']}','YES','$date')";
			         if(mysqli_query($conn,$sql40)){
			                echo "update arreas";
			            }


			  }


			  				  function ano($conn,$date){
			        
			        
			        $sql15 = "insert into customerareasedetails (customerId,mailStatus ,arrearseDate) values('{$_SESSION['CiD']}','NO','$date')";
			            if(mysqli_query($conn,$sql15)){
			                echo "update arreas";
			            }
			            else{
			                echo "not update arreas";
			            }

			  }


  ?>
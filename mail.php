<?php
$to = 'piyumikumari1995@gmail.com';
$subject = 'SUBJECT';
$message = "msg";
$headers = 'From:piyumikumari1995@gmail.com';
//$body='hi';
if(mail($to,$subject,$message,$headers)){
    echo "Email sent";
}
else{
    echo "Email failed";
}
?>
<?php
$to = "rexalphonso@gmail.com";
$subject = "Test email";
$txt = "hello lloyd nice to be back";
$headers = "From: superadmin001@ccsiebc.ml" ;

if(mail($to,$subject,$txt,$headers)) {
  echo ('email sent to  '.$to);
 
}else {
  echo "email not sent";
}


?>
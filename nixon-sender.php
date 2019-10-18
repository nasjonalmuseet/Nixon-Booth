<?php 
error_reporting(E_ALL);
?>
<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Nixon-sender</title>
</head>
<body>
<?php
ini_set('display_errors', 1);
require 'epost/class.phpmailer.php';
if(preg_match('/[0-9]+/', $_REQUEST['nxnID'])) {
	$nxnID = $_REQUEST['nxnID'];
}
$nxnTo = $_REQUEST['nxnAddress'];
$nxnImg = 'nixons/NMK-NXN-'.$nxnID.'.jpg';
//Create a new PHPMailer instance
$mail = new PHPMailer();
$mail->CharSet = 'UTF-8';
//Set who the message is to be sent from
$mail->SetFrom('dag.hensten@nasjonalmuseet.no', 'Nasjonalmuseet');
//Set an alternative reply-to address
$mail->AddReplyTo('Nasjonalmuseet','dag.hensten@nasjonalmuseet.no');
//Set BCC
//$mail->AddBCC('dag.hensten@nasjonalmuseet.no', 'Nasjonalmuseet');
//Set who the message is to be sent to
$mail->AddAddress($nxnTo, $nxnTo);
//Set the subject line
$mail->Subject = 'Din NIXON VISIONS fra KjARTan Slettemark - &laquo;Kunsten &aring; v&aelig;re kunst&raquo;';
//Read an HTML message body from an external file, convert referenced images to embedded, convert HTML into a basic plain-text alternative body
$mail->MsgHTML(file_get_contents('msg.html'), dirname(__FILE__));
//Replace the plain text body with one created manually
$mail->AltBody = 'This is a plain-text message body';
//Attach an image file
$mail->AddAttachment($nxnImg);

//Send the message, check for errors
if(!$mail->Send()) {
  echo "Mailer Error: " . $mail->ErrorInfo;
} else {
  echo "Message sent!";
}
?>
</body>
</html>
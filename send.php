<?php
$YourEmailAddress = ""; //enter your e-mail address here, ex. $YourEmailAddress = "info@pehaa.com"; 

//  SEND
//
// ----------------------------------------------------------------
// Do not edit beyond this point if you are not familiar with php
// ----------------------------------------------------------------

error_reporting(0);

$post = (!empty($_POST)) ? true : false;

if($post) {
	
	$ceremony =  (isset($_POST['check-ceremony'])) ? "I (we) will" : "I (we) will not";
	$reception =  (isset($_POST['check-reception'])) ? "I (we) will " : "I (we) will not";
	$email = trim($_POST['email']);
	$name = trim($_POST['name']);
	$adults = (!empty($_POST['adults'])) ? trim($_POST['adults'])  : "0" ;
	$children = (!empty($_POST['children'])) ? trim($_POST['children'])  : "0";
	$message = stripslashes($_POST['message']);
	$message_text = "From: $email";
	$message_text.= " - ".$name."<br/>";	
	$message_text.= $ceremony. " be attending the ceremony.<br/>";
	$message_text.= $reception. " be attending the reception.<br/>";
	if (isset($_POST['check-reception'])) {
	$message_text.= "Number of guests (adults) : $adults <br/>";
	$message_text.= "Number of guests (children) : $children <br/><br/>";
	}
	$message_text.= $message;
  $mail = mail($YourEmailAddress,"RSVP ", $message_text, "from: $from <$YourEmailAddress>\nReply-To: $YourEmailAddress \nContent-type: text/html");			
				if ($mail)
				echo 'success';
				else
				echo 'error';					
}
?>
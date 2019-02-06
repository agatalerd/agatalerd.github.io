<?php

	define("CONTACT_FORM", 'senseless.v.7@gmail.com');

	$subject = 'Заявка';

	$name  = stripslashes($_POST['name']);
	$phone = stripslashes($_POST['phone']);
	$agree = stripslashes($_POST['agree']);
	// $email = stripslashes($_POST['email']);
	// $msg   = stripslashes($_POST['msg']);	
		

	$message = '
		<html>
				<head>
						<title>Заявка на звонок</title>
						<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
				</head>
				<body>
						<p>Имя     : '.$name.'</p>	
						<p>Phone   : '.$phone .'</p>
						<p>I agree  : '.$agree .'</p>
				</body>
		</html>';


	$mail = mail(CONTACT_FORM, $subject, $message,
		"MIME-Version: 1.0\r\n"
	    ."From: ".$name." <".CONTACT_FORM.">\r\n"
	    ."Reply-To: ".$email."\r\n"
	    ."Content-type: text/html; charset=UTF-8\r\n");

	if($mail){
		echo "OK";
	}
?>
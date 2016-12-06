<?php
function sendMail($from, $to, $subject, $message){
	
	
	// To send HTML mail, the Content-type header must be set
	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

	// Additional headers
	$headers .= 'To: ' . $to . "\r\n";
	$headers .= 'From: ' . $from . "\r\n";
	

	// Mail it
	mail($to, $subject, $message, $headers);
}
function constructContactEmail($name, $email, $phone, $addlInfo){
	$message = "
	<html>
	<head>
	  <title>Village Car Service - Contact</title>
	</head>
	<body>
	  <p>Thank you for submitting your mail to Village Car Service. We will get back to you shortly.</p>
	  <table>
		<tr>
		  <td><strong>Name:</strong></td><td>" . $name . "</td>
		</tr>
		<tr>
		  <td><strong>E-Mail:</strong></td><td>" . $email . "</td>
		</tr>
		<tr>
		  <td><strong>Phone:</strong></td><td>" . $phone . "</td>
		</tr>
		<tr>
		  <td><strong>Additional Info:</strong></td><td>" . $addlInfo . "</td>
		</tr>
	  </table>
	</body>
	</html>
	";

}
?>
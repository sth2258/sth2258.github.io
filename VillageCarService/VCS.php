<?php
require __DIR__ . '/twilio-php-master/Twilio/autoload.php';
use Twilio\Rest\Client;

function sendMail($to, $subject, $message){

	$headers = "From: info@villagecarserviceliny.com\r\n";
	$headers .= "Reply-To: info@villagecarserviceliny.com\r\n";
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html; charset=UTF-8\r\n";

	$ret = mail($to, $subject, $message, $headers);
	return $ret;
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
	return $message;
}

function constructAccountEmail($name, $email, $phone, $accountType, $addlInfo){
	$message = "
	<html>
	<head>
	  <title>Village Car Service - Contact</title>
	</head>
	<body>
	  <p>Thank you for submitting your account creation request to Village Car Service. A member of our team will be in touch shortly to discuss your account creation request.</p>
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
		  <td><strong>Account Type:</strong></td><td>" . $accountType . "</td>
		</tr>
		<tr>
		  <td><strong>Additional Info:</strong></td><td>" . $addlInfo . "</td>
		</tr>
	  </table>
	</body>
	</html>
	";
	return $message;
}

function constructReservationEmail($name, $email, $phone, $pickupDate, $pickupTime, $passangers, $pickupAddress, $pickupCity, $destinationAddress, $destinationCity, $addlInfo, $carSeat, $boosterSeat, $luggage){
	$message = "
	<html>
	<head>
	  <title>Village Car Service - Reservation</title>
	</head>
	<body>
	  <p>Thank you for submitting your reservation request. <strong>Should you need to alter any of your reservation information, please contact our dispatch office directly at (516) 764-8888</strong></p>
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
		  <td><strong>Pickup Date:</strong></td><td>" . $pickupDate . "</td>
		</tr>
		<tr>
		  <td><strong>Pickup Time:</strong></td><td>" . $pickupTime . "</td>
		</tr>
		<tr>
		  <td><strong>No of Passengers:</strong></td><td>" . $passangers . "</td>
		</tr>
		<tr>
		  <td><strong>Pickup Address:</strong></td><td>" . $pickupAddress . "</td>
		</tr>
		<tr>
		  <td><strong>Pickup City:</strong></td><td>" . $pickupCity . "</td>
		</tr>
		<tr>
		  <td><strong>Destination Address:</strong></td><td>" . $destinationAddress . "</td>
		</tr>
		<tr>
		  <td><strong>Destination City:</strong></td><td>" . $destinationCity . "</td>
		</tr>
		<tr>
		  <td><strong>Additional Information:</strong></td><td>" . $addlInfo . "</td>
		</tr>
		<tr>
		  <td><strong>Car Seat(s):</strong></td><td>" . $carSeat . "</td>
		</tr>
		<tr>
		  <td><strong>Booster Seat(s):</strong></td><td>" . $boosterSeat . "</td>
		</tr>
		<tr>
		  <td><strong>Luggage?:</strong></td><td>" . $luggage . "</td>
		</tr>
	  </table>
	</body>
	</html>
	";
	return $message;
}

function callSomebody(){
	// Require the bundled autoload file - the path may need to change
	// based on where you downloaded and unzipped the SDK
	
	include 'config.php';
	
	// Use the REST API Client to make requests to the Twilio REST API
	

	// Your Account SID and Auth Token from twilio.com/console
	$sid = $voiceAccountSid;
	$token = $voiceAccountSecret;
	$client = new Client($sid, $token);

	try {
        // Initiate a new outbound call
        $call = $client->account->calls->create(
            // Step 4: Change the 'To' number below to whatever number you'd like 
            // to call.
            $voiceTo,

            // Step 5: Change the 'From' number below to be a valid Twilio number 
            // that you've purchased or verified with Twilio.
            $voiceFrom,

            // Step 6: Set the URL Twilio will request when the call is answered.
            array("url" => $voiceUrl)
        );
        //echo "Started call: " . $call->sid;
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }

}
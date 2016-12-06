<?php

include 'config.php';
include 'VCS.php';
//print_r($_POST);

if(!empty($_POST) && $_POST['g-recaptcha-response'] == ''){
	$error = "Please respond to the captcha image";
}else if (!empty($_POST)){
	
	if(empty($_POST['luggage'])){
		$luggage = "No";
	}else {
		$luggage = "Yes";
	}
	$emailBody = constructReservationEmail($_POST['name'], $_POST['email'], $_POST['phone'], $_POST['pickupDate'], $_POST['pickupTime'], $_POST['passangers'], $_POST['pickupAddress'], $_POST['pickupCity'], $_POST['destinationAddress'], $_POST['destinationCity'], $_POST['addlInfo'], $_POST['carSeat'], $_POST['boosterSeat'], $luggage);
	sendMail($sender, $_POST['email'], "Village Car Service - Reservation Request", $emailBody);
	sendMail($sender, $adminRecip, "Village Car Service - Reservation Request", $emailBody);
	callSomebody();
	//also send robocall
	$good=true;
}
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Reservations - Village Car Service</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		<script src='https://www.google.com/recaptcha/api.js'></script>
		<link href="assets/css/jquery-ui.min.css" rel="stylesheet">
		<script src="assets/js/jquery.min.js"></script>
		<script src="assets/js/jquery-ui.min.js"></script>
		<script type="text/javascript" src="assets/js/jquery.timepicker.min.js"></script>
		<link rel="stylesheet" type="text/css" href="assets/css/jquery.timepicker.css" />
		<script>
		  $( function() {
			$('#pickupDate').datepicker();
			$('#pickupTime').timepicker({ lang: { am: ' am', pm: ' pm', AM: ' AM', PM: ' PM', decimal: '.', mins: 'mins', hr: 'hr', hrs: 'hrs' }});
			$( "#dialog" ).dialog({autoOpen: false});
		  } );
		$(document).ready(function(){
			$('#form1').on('submit', function(e){
				e.preventDefault();
				var today = new Date();
				var pickup = new Date($('#pickupDate').val() + ' ' + $('#pickupTime').val())
				if(pickup - today < 7200000){
					$('#dialog').dialog('open');
				}else{
					this.submit();
				}
			});
		});
		</script>
		
	</head>
	<body class="no-sidebar">
		<div id="page-wrapper">

			<!-- Header -->
				<div id="header-wrapper">
					<header id="header" class="container">

						<!-- Logo -->
							<div id="logo">
								<h1><a href="index.html">Village Car Service</a></h1>
								
							</div>

						<!-- Nav -->
							<nav id="nav">
								<ul>
									<li class="current"><a href="index.html">Home</a></li>
									<li>
										<a href="about.html">About Us</a>
										<ul>
											<li><a href="about.html#ourbackground">Our Mission</a></li>
											<li><a href="about.html#employment">Employment Oppurtunities</a></li>
											<li><a href="about.html#testimonials">Testimonials</a></li>
										</ul>
									</li>
									<li>
										<a href="services.html">Services Provided</a>
									</li>
									
									<li><a href="reservations.php">Reservations</a></li>
									<li>
										<a href="accounts.php">Accounts</a>
										<ul>
											<li><a href="accounts.php#personal">Personal Accounts</a></li>
											<li><a href="accounts.php#corporate">Corporate Accounts</a></li>
										</ul>
									</li>
									<li><a href="contact.php">Contact</a></li>
								</ul>
							</nav>

					</header>
				</div>

			<!-- Main -->
				<div id="main-wrapper">
					<div class="container">
						<div id="content">
								<div style="text-align:right;float:right;">
									<a href="tel:+15167648888" class="button small alt icon fa-phone">Call Now!</a><br />
								</div>
							<!-- Content -->
								

									<h2>Reservations</h2>

									<h3>Book your next ride with us now!</h3>
									<p>Submit your request online using our simple form below, <strong>at least 2 hours in advance</strong> of your desired pick-up time.  You'll receive an email confirmation, and our driver will be in contact you with any further questions.</p>
								<section style="width:50%">	
									
									<?php
										if(isset($error)){
											echo "<div style='color:red'>" . $error . "</div>";
										}
									?>
									<br >
									<?php
									if($good==true){
										echo "<div style='color:green'>Thank you for submitting your reservation request. You should recievce an email confirmation with the information you submitted. <br /><br >Should you need to alter any of your reservation information, please contact our dispatch office directly at (516) 764-8888</div>";
									}
									else {
									?>
									<form action="reservations.php" method="post" id="form1">
									  Name: <input type="text" name="name" required>
									  E-Mail: <input type="email" name="email" required>
									  Phone Number: <input type="text" name="phone" required>
									  Pickup Date: <input type="text" name="pickupDate" id="pickupDate" required>
									  Pickup Time: <input type="text" name="pickupTime" id="pickupTime" required>
									  Numbner of Passangers: <select name="passangers">
										  <option value="1">1</option>
										  <option value="2">2</option>
										  <option value="3">3</option>
										  <option value="4">4</option>
										  <option value="5">5</option>
										  <option value="6">6</option>
										</select>
									  Pickup Address: <input type="text" name="pickupAddress" required>
									  Pickup City: <input type="text" name="pickupCity" required>
									  Destination Address: <input type="text" name="destinationAddress" required>
									  Destination City: <input type="text" name="destinationCity" required>
									  Additional Information: 
									  <textarea rows="4" cols="50" placeholder="Enter any additional information or requirements for your ride." name="addlInfo"></textarea>
									  Car Seats Required: <select name="carSeat">
										  <option value="none">No Car Seat Required</option>
										  <option value="1">1</option>
										  <option value="2">2</option>
										</select>
									  Booster Seats Required: <select name="boosterSeat">
										  <option value="none">No Booster Seat Required</option>
										  <option value="1">1</option>
										  <option value="2">2</option>
										</select>
									  Luggage? <input type="checkbox" name="luggage" value="Yes"><br>
									  <br />
									  <div class="g-recaptcha" data-sitekey="6LfG7w0UAAAAAPSJ1GovrsQOU6q_glxmDIkJoKES"></div>
									  <input type="submit">
									</form>
									<?php
									}
									?>
								</section>

						</div>
					</div>
				</div>

			<!-- Footer -->
				<div id="footer-wrapper">
					<footer id="footer" class="container">
						<div class="row">
							<div class="3u 6u$(medium) 12u$(small)">

								<!-- Contact -->
									<section class="widget contact last">
										<h3>Contact Us</h3>
										<ul>
											<li><a href="#" class="icon fa-envelope-o"><span class="label">Mail</span></a></li>
											<li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
											<li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
											<li><a href="#" class="icon fa-google-plus"><span class="label">Google Plus</span></a></li>
										</ul>
										<p>416 Sunrise Highway<br />
										Lynbrook, NY 11563<br />
										(516) 764-8888</p>
									</section>

							</div>
						</div>
						<div class="row">
							<div class="12u">
								<div id="copyright">
									<ul class="menu">
										<li>&copy; 2016 VillageCarService. All rights reserved</li>
									</ul>
								</div>
							</div>
						</div>
					</footer>
				</div>

			</div>

		<!-- Scripts -->

			
			<script src="assets/js/jquery.dropotron.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>
			<div id="dialog" title="Error">
				<p><span class="ui-icon ui-icon-alert" style="float:left; margin:12px 12px 20px 0;"></span>Sorry, you must book a car at least 2 hours in advance</p>
			</div>
	</body>
</html>
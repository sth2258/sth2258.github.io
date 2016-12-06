<?php

include 'config.php';
include 'VCS.php';
//print_r($_POST);

if(!empty($_POST) && $_POST['g-recaptcha-response'] == ''){
	$error = "Please respond to the captcha image";
}else if (!empty($_POST)){
	
	$emailBody = constructContactEmail($_POST['name'], $_POST['email'], $_POST['phone'], $_POST['addionalInfo']);
	sendMail($sender, $_POST['email'], "Village Car Service - Website Contact", $emailBody);
	sendMail($sender, $adminRecip, "Village Car Service - Website Contact", $emailBody);
	$good=true;
}
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>About us - Village Car Service</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		<script src='https://www.google.com/recaptcha/api.js'></script>
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
								<article>
									
									<h2>Contact Us</h2>
									<a href="#" class="button big icon fa-arrow-circle-right">Make a Reservation Now!</a>
									<br />
									<br />
									<p>For all other inquiries, use the form below and someone will get back to you shortly. <br />Or for your convenience, we can also be reached via email, phone, or in-person, whatever is easiest for you.  We look forward to speaking with you!</p>
									<iframe width="600" height="450" frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/place?key=AIzaSyBXDR7p9IAlarg-RpuIz2zId00l01JG_DY&q=416 Sunrise Highway Lynbrook, NY" allowfullscreen></iframe>
									
									<?php
										if(isset($error)){
											echo "<div style='color:red'>" . $error . "</div>";
										}
									?>
									<br >
									<?php
									if($good==true){
										echo "<div style='color:green'>Thank you for submitting your information request. A member of our team will be in contact shortly.</div>";
									}
									else {
									?>
									<form action="contact.php" method="post" id="form1">
									  Name: <input type="text" name="name" required>
									  E-Mail: <input type="email" name="email" required>
									  Phone Number: <input type="text" name="phone" required>
									  Additional Information: 
									  <textarea rows="4" cols="50" placeholder="How can we help you?" name="addionalInfo" required></textarea>
									  <br />
									  <div class="g-recaptcha" data-sitekey="6LfG7w0UAAAAAPSJ1GovrsQOU6q_glxmDIkJoKES"></div>
									  <input type="submit">
									</form>
									<?php
									}
									?>
								</article>

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

			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.dropotron.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>

	</body>
</html>
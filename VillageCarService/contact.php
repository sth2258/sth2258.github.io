<?php

include 'config.php';
include 'VCS.php';

if(!empty($_POST) && $_POST['g-recaptcha-response'] == ''){
	$error = "Please respond to the captcha image";
}else if (!empty($_POST)){
	
	$emailBody = constructContactEmail($_POST['name'], $_POST['email'], $_POST['phone'], $_POST['addionalInfo']);
	$ret = sendMail($_POST['email'], "Website contact - Village Car Service", $emailBody);
	$ret = sendMail($adminRecip, "Website contact - Village Car Service", $emailBody);
	//echo $ret;
	$good=true;
}
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Contact - Village Car Service</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		<script src='https://www.google.com/recaptcha/api.js'></script>
	</head>
	<body class="no-sidebar">
		<div id="page-wrapper">

			<?php
				include('header.php')
			?>

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

			<?php
				include('footer.php');
			?>

		<!-- Scripts -->

			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.dropotron.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>

	</body>
</html>
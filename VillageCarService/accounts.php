<?php

include 'config.php';
include 'VCS.php';
//print_r($_POST);

if(!empty($_POST) && $_POST['g-recaptcha-response'] == ''){
	$error = "Please respond to the captcha image";
}else if (!empty($_POST)){
	
	$emailBody = constructAccountEmail($_POST['name'], $_POST['email'], $_POST['phone'], $_POST['acctType'], $_POST['addionalInfo']);
	$ret = sendMail($_POST['email'], "Account creation request - Village Car Service", $emailBody);
	$ret = sendMail($adminRecip, "Account creation request - Village Car Service", $emailBody);

	$good=true;
}
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Contacts - Village Car Service</title>
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
								<article id="ourbackground">

									<h2>Accounts with Village Car Service</h2>

									<p>No matter large or small, Village Car Service is here to support all of your transportation needs. By opening an account with us, payment and booking becomes a breeze.</p>
									
									<p>To open a personal or corporate account with us, fill out the below information, and someone from our dispatch office will be in touch to set it up!</p>
									<?php
										if(isset($error)){
											echo "<div style='color:red'>" . $error . "</div>";
										}
									?>
									<br >
									<?php
									if($good==true){
										echo "<div style='color:green'>Thank you for submitting your information request. A member of our team will be in contact shortly to discuss your account creation request.</div>";
									}
									else {
									?>
									<form action="accounts.php" method="post" id="form1">
									  Name: <input type="text" name="name" required>
									  E-Mail: <input type="email" name="email" required>
									  Phone Number: <input type="text" name="phone" required>
									  <input type="radio" name="acctType" value="Corporate Account" checked> Corporate Account<br />
									  <input type="radio" name="acctType" value="Personal Account"> Personal Account<br />
									  Additional Information: 
									  <textarea rows="4" cols="50" placeholder="Enter any additional information about the account you'd like to open."></textarea>
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
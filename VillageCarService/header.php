<?php
	$home='';
	$about='';
	$services="";
	$reservations="";
	$accounts="";
	$contact="";
	switch (basename($_SERVER['PHP_SELF'])) {
		case "index.php":
			$home=' class="current"';
			break;
		case "about.php":
			$about=' class="current"';
			break;
		case "services.php":
			$services=' class="current"';
			break;
		case "reservations.php":
			$reservations=' class="current"';
			break;
		case "accounts.php":
			$accounts=' class="current"';
			break;
		case "contact.php":
			$contact=' class="current"';
			break;
	}
?>
<!-- Header -->
				<div id="header-wrapper">
					<header id="header" class="container">

						<!-- Logo -->
							<div id="logo">
								<h1><a href="index.php">Village Car Service</a></h1>
								
							</div>

						<!-- Nav -->
							<nav id="nav">
								<ul>
									<li<?php echo $home;?>><a href="index.php">Home</a></li>
									<li<?php echo $about;?>>
										<a href="about.php">About Us</a>
										<ul>
											<li><a href="about.php#ourbackground">Our Mission</a></li>
											<li><a href="about.php#employment">Employment Oppurtunities</a></li>
											<li><a href="about.php#testimonials">Testimonials</a></li>
										</ul>
									</li>
									<li<?php echo $services;?>>
										<a href="services.php">Services Provided</a>
									</li>
									
									<li<?php echo $reservations;?>><a href="reservations.php">Reservations</a></li>
									<li<?php echo $accounts;?>>
										<a href="accounts.php">Accounts</a>
										<ul>
											<li><a href="accounts.php#personal">Personal Accounts</a></li>
											<li><a href="accounts.php#corporate">Corporate Accounts</a></li>
										</ul>
									</li>
									<li<?php echo $contact;?>><a href="contact.php">Contact</a></li>
								</ul>
							</nav>

					</header>
				</div>
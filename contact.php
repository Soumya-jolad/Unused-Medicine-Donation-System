<?php 
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Contact Us</title>
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/superfish.css">
	<link rel="stylesheet" href="css/contact.css">
	<link rel="stylesheet" href="css/style.css">
	<script src="js/modernizr-2.6.2.min.js"></script>
	<style>
		h4{
			color: blue;
			text-align: center;
		}
	</style>
</head>
<body>
	<?php
	include("navbar.php");
	include("engine.php");
	 ?>

		<!-- <div class="fh5co-hero">
			<div class="fh5co-overlay"></div>
			<div class="fh5co-cover text-center" data-stellar-background-ratio="0.5" style="background-image: url(image/2.jpg);">

		</div> -->
	<section id="contact" class="bg-light">
		<div class="container">
			<div class="form-container">
				<div class="form-box">
					<h3>Contact<span class="text-primary"> Us</span></h3>
					<form method="POST">
						<div class="form-group">
							<label for="first-name">First Name</label>
							<input type="text" name="first_name" placeholder="Enter Your First Name">
						</div>
						<div class="form-group">
							<label for="last-name">Last Name</label>
							<input type="text" name="last_name" placeholder="Enter Your Last Name">
						</div>
						<div class="form-group">
							<label for="email">Email</label>
							<input type="email" name="email" placeholder="Enter Your Last Email">
						</div>
						<div class="form-group">
							<label for="message">Message</label>
							<textarea rows="7" name="message" placeholder="Enter Your Message"></textarea>
						</div>
						<div><h4>Contact me: 8553220497</h4></div>
						<input type="submit" value="Send Message" name="contact" class="contact-btn">
					</form>
				</div>
			</div>
		</div>
	</section>
</body>
</html>

<!-- <script type="text/javascript">
    function Validate() {
        var password = document.getElementById("password").value;
        var confirmPassword = document.getElementById("password2").value;
        if (password != confirmPassword) {
            alert("Passwords do not match.");
            return false;
        }
        return true;
    }
</script> -->
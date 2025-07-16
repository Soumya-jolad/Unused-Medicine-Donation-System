<?php 
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Project &mdash; Medicine Donation</title>
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/superfish.css">
	<link rel="stylesheet" href="css/style.css">
	<script src="js/modernizr-2.6.2.min.js"></script>
</head>
<body>
	<?php 
	include("navbar.php");
	 ?>

		<div class="fh5co-hero">
			<div class="fh5co-overlay"></div>
			<div class="fh5co-cover text-center" data-stellar-background-ratio="0.5" style="background-image: url(image/2.jpg);">
				<div class="desc animate-box">
					<h2><strong>STOP </strong> medication waste. <strong>Save lives.</strong></h2>
					 <?php 
					if(isset($_SESSION["email"]) && !empty($_SESSION['email'])){
  

								echo '<span><a class="btn btn-primary btn-lg" href="donate.php">Donate</a></span>';
								}
								else{
							
							echo '<span><a class="btn btn-primary btn-lg" href="login.php">Login</a> <a class="btn btn-primary btn-lg" href="signup.php">Signup</a></span>';
							}?>
				</div>
			</div>

		</div>	

</body>
</html>
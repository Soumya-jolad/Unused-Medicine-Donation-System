<?php 
session_start();
if(!isset($_SESSION["email"])){
  header("location:index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Profile &mdash; Update</title>
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/superfish.css">
	<link rel="stylesheet" href="css/contact.css">
	<link rel="stylesheet" href="css/style.css">
	<script src="js/modernizr-2.6.2.min.js"></script>
</head>
<body>
	<?php 
	include("navbar.php");
	include("engine.php");
	include("update_profile_engine.php");
	$u_email=$_SESSION['email'];
	$sql1="SELECT * from donor where email='$u_email'";
	$query1=mysqli_query($db,$sql1);
		if(mysqli_num_rows($query1)>0)
		      {
		          while($row=mysqli_fetch_assoc($query1)){
?>


		<section id="contact" class="bg-light">
		<div class="container">
			<div class="form-container">
				<div class="form-box">
					<h3>Profile<span class="text-primary"> Update</span></h3>
					<form method="POST">
						<div class="form-group">
							<label for="first-name">First Name</label>
							<input type="text" name="first_name" value="<?php echo $row['first_name'] ?>" required>
							<input type="hidden" name="donor_id" value="<?php echo $row['donor_id'] ?>">
						</div>
						<div class="form-group">
							<label for="last-name">Last Name</label>
							<input type="text" name="last_name" value="<?php echo $row['last_name'] ?>" required>
						</div>
						<div class="form-group">
							<label>Address</label>
							<input type="text" name="address" value="<?php echo $row['address'] ?>" required>
						</div>
						<div class="form-group">
							<label for="email">Email</label>
							<input type="email" name="email" value="<?php echo $row['email'] ?>" required disabled>
						</div>
						<div class="form-group">
							<label>Phone</label>
							<input type="number" name="phone" value="<?php echo $row['phone'] ?>" required>
						</div>
						<input type="submit" value="Update" name="update_profile" class="contact-btn">
						<?php
		    	}}

				?>
					</form>
				</div>
			</div>
		</div>
	</section>

</body>
</html>

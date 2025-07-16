<?php 
session_start();
if(!isset($_SESSION["email"])){
  header("location:index.php");
}
include("engine.php");
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Project &mdash; Medicine Donation</title>
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/superfish.css">
	<link rel="stylesheet" href="css/contact.css">
	<link rel="stylesheet" href="css/style.css">
	<script src="js/modernizr-2.6.2.min.js"></script>
	<style type="text/css">
		.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 300px;
  margin: auto;
  text-align: center;
  font-family: arial;
}
	</style>
</head>
<body>
	<?php 
	include("navbar.php");
	$u_email=$_SESSION['email'];
	$sql1="SELECT * from donor where email='$u_email'";
	$query1=mysqli_query($db,$sql1);
		if(mysqli_num_rows($query1)>0)
		      {
		          while($row=mysqli_fetch_assoc($query1)){?>
		          	<br>
		          	<center><h2>Profile</h2></center>
		          	<div class="card">
			  <img src="image/avatar.png" style="height:200px; width: 100%">
			  <h1><?php echo $row['first_name']; ?> <?php echo $row['last_name']; ?></h1>			  
			  <p><b>Phone No.: </b><?php echo $row['phone']; ?></p>
			  <p><b>Address: </b><?php echo $row['address']; ?></p>
			  <p><b>Email: </b><?php echo $row['email']; ?></p>
			  <p><a href="update_profile.php" class="btb btn-lg">Update</a></p>
			      <br>
			  </div>
			  <?php
					          }}
			?>


		

</body>
</html>
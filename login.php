<?php $a='login';?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Login Form</title>

	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/superfish.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/contact.css">
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<script src="js/modernizr-2.6.2.min.js"></script>
</head>
<body>
	<?php 
	include("navbar.php");
	include("engine.php");
	 ?>
	 <br>
	 
	 <div class="container-fluid">
	 	<h1><center>Login</center></h1>
<div class="row">
	<!-- Donor Login -->
<div class="col-lg-4">
  <section id="contact">    
    <div class="form-box">
      <h3>Donor<span class="text-primary"> Login</span></h3>
      <form method="POST" onsubmit="return validatePassword(this);">
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" name="email" placeholder="Enter Your Email" required>
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" name="password" placeholder="Enter Your Password" required
          pattern="(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*]).{8,}"
          title="Minimum 8 characters with uppercase, lowercase, number & special character">
        </div>
        <input type="submit" value="Login" name="donor_login" class="contact-btn">
        <center><a href="#">Forgot Password?</a></center>
      </form>        
    </div>
  </section>
</div>

<!-- Receiver Login -->
<div class="col-lg-4">
  <section id="contact">    
    <div class="form-box">
      <h3>Receiver<span class="text-primary"> Login</span></h3>
      <form method="POST" onsubmit="return validatePassword(this);">
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" name="email" placeholder="Enter Your Email" required>
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" name="password" placeholder="Enter Your Password" required
          pattern="(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*]).{8,}"
          title="Minimum 8 characters with uppercase, lowercase, number & special character">
        </div>
        <input type="submit" name="receiver_login" value="Login" class="contact-btn">
        <center><a href="#">Forgot Password?</a></center>
      </form>        
    </div>
  </section>
</div>

<!-- Admin Login -->
<div class="col-lg-4">
  <section id="contact">    
    <div class="form-box">
      <h3>Admin<span class="text-primary"> Login</span></h3>
      <form method="POST" onsubmit="return validatePassword(this);">
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" name="email" placeholder="Enter Your Email" required>
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" name="password" placeholder="Enter Your Password" required>
        </div>
        <input type="submit" name="admin_login" value="Login" class="contact-btn">
      </form>        
    </div>
  </section>
</div>

<?php
if (isset($_POST['email']) && isset($_POST['password'])) {
  email();
}
function email() {
  $email = $_POST['email'];
  $password = $_POST['password'];

  // Server-side password pattern
  if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*]).{8,}$/', $password)) {
    echo "<script>alert('Password must include uppercase, lowercase, number & special character and be at least 8 characters long.');</script>";
    return;
  }

  $msg = "Email: " . $email . "\n You are logged in successfully.";
  $recipient = $email;
  $subject = "Login successful";
  $mailheaders = "From: My website <mahima.dangol56@gmail.com>\n";
  $mailheaders .= "Reply-To: " . $email;

  mail($recipient, $subject, $msg, $mailheaders);
}
?>

	</div>
</body>
</html>
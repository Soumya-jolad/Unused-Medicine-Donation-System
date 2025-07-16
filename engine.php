<?php 

$donor_id='';
$receiver_id='';
$first_name='';
$last_name='';
$email='';
$password='';
$phone='';
$address='';
$ngo_name='';
$ngo_regd_no='';

$errors=array();

include("config/config.php");


if(isset($_POST['donor_sign_up'])){
	donor_sign_up();
}

if(isset($_POST['receiver_sign_up'])){
	receiver_sign_up();
}

if(isset($_POST['donor_login'])){
	donor_login();
}

if(isset($_POST['receiver_login'])){
	receiver_login();
}

if(isset($_POST['admin_login'])){
	admin_login();
}

if(isset($_POST['donation'])){
	donation();
}

if(isset($_POST['contact'])){
	contact();
}


function donor_sign_up(){
	global $first_name,$last_name,$email,$password,$phone,$address,$errors,$db;
	$first_name=validate($_POST['first_name']);
	$last_name=validate($_POST['last_name']);
	$email=validate($_POST['email']);
	$password=validate($_POST['password']);
	$phone=validate($_POST['phone']);
	$address=validate($_POST['address']);
	$password = md5($password); // Encrypt password
		$sql = "INSERT INTO donor(first_name,last_name,email,password,phone,address) VALUES('$first_name','$last_name','$email','$password','$phone','$address')";
		if($db->query($sql)===TRUE){
			header("location:login.php");
	}
}

function receiver_sign_up(){
	global $ngo_name,$ngo_regd_no,$email,$password,$phone,$address,$errors,$db;
	$ngo_name=validate($_POST['ngo_name']);
	$ngo_regd_no=validate($_POST['ngo_regd_no']);
	$email=validate($_POST['email']);
	$password=validate($_POST['password']);
	$phone=validate($_POST['phone']);
	$address=validate($_POST['address']);
	$password = md5($password); // Encrypt password
		$sql = "INSERT INTO receiver(ngo_name,ngo_regd_no,email,password,phone,address) VALUES('$ngo_name','$ngo_regd_no','$email','$password','$phone','$address')";
		if($db->query($sql)===TRUE){
			header("location:login.php");
	}
}

function receiver_login(){
	global $ngo_name,$ngo_regd_no,$email,$password,$phone,$address,$errors,$db;
	$email=validate($_POST['email']);
	$password=validate($_POST['password']);
	$password = md5($password); 
		$sql = "SELECT * FROM receiver where email='$email' AND password='$password' LIMIT 1";
		$result = $db->query($sql);
		if($result->num_rows==1){
			$data = $result-> fetch_assoc();
			$logged_user = $data['email'];
			session_start();
			$_SESSION['email']=$email;
			header('location:receiver/receiver-index.php');
    

		}
		else{
			
?>

<style>
.alert {
  padding: 20px;
  background-color: #DC143C;
  color: white;
}

.closebtn {
  margin-left: 15px;
  color: white;
  font-weight: bold;
  float: right;
  font-size: 22px;
  line-height: 20px;
  cursor: pointer;
  transition: 0.3s;
}

.closebtn:hover {
  color: black;
}
</style>
<script>
	window.setTimeout(function() {
    $(".alert").fadeTo(1000, 0).slideUp(500, function(){
        $(this).remove(); 
    });
}, 2000);
</script>
<div class="container">
<div class="alert">
  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
  <strong>Incorrect Email/Password or not registered.</strong> Click here to <a href="signup.php" style="color: lightblue;"><b>Register</b></a>.
</div></div>


<?php
		}
}



function donor_login(){
	global $email,$password,$db;
	$email=validate($_POST['email']);
	$password=validate($_POST['password']);
	$password = md5($password); 
		$sql = "SELECT * FROM donor where email='$email' AND password='$password' LIMIT 1";
		$result = $db->query($sql);
		if($result->num_rows==1){
			$data = $result-> fetch_assoc();
			$logged_user = $data['email'];
			session_start();
			$_SESSION['email']=$email;
			header('location:donate.php');
    

		}
		else{
			
?>

<style>
.alert {
  padding: 20px;
  background-color: #DC143C;
  color: white;
}

.closebtn {
  margin-left: 15px;
  color: white;
  font-weight: bold;
  float: right;
  font-size: 22px;
  line-height: 20px;
  cursor: pointer;
  transition: 0.3s;
}

.closebtn:hover {
  color: black;
}
</style>
<script>
	window.setTimeout(function() {
    $(".alert").fadeTo(1000, 0).slideUp(500, function(){
        $(this).remove(); 
    });
}, 2000);
</script>
<div class="container">
<div class="alert">
  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
  <strong>Incorrect Email/Password or not registered.</strong> Click here to <a href="signup.php" style="color: lightblue;"><b>Register</b></a>.
</div></div>


<?php
		}
}


function admin_login(){
	global $email,$password,$db;
	$email=validate($_POST['email']);
	$password=validate($_POST['password']);
		$sql = "SELECT * FROM admin where email='$email' AND password='$password' LIMIT 1";
		$result = $db->query($sql);
		if($result->num_rows==1){
			$data = $result-> fetch_assoc();
			$logged_user = $data['email'];
			session_start();
			$_SESSION['email']=$email;
			header('location:admin/admin-index.php');
    

		}
		else{
			
?>

<style>
.alert {
  padding: 20px;
  background-color: #DC143C;
  color: white;
}

.closebtn {
  margin-left: 15px;
  color: white;
  font-weight: bold;
  float: right;
  font-size: 22px;
  line-height: 20px;
  cursor: pointer;
  transition: 0.3s;
}

.closebtn:hover {
  color: black;
}
</style>
<script>
	window.setTimeout(function() {
    $(".alert").fadeTo(1000, 0).slideUp(500, function(){
        $(this).remove(); 
    });
}, 2000);
</script>
<div class="container">
<div class="alert">
  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
  <strong>Incorrect Email/Password or not registered.</strong> Click here to <a href="C:\xampp\htdocs\soumya\medicineproj\medicine\signup.php" style="color: lightblue;"><b>Register</b></a>.
</div></div>


<?php
		}
}


function donation(){
	global $medicine_name,$manufactured_by,$donate_to,$mfg_date,$exp_date,$donor_id,$errors,$db;
	$medicine_name=validate($_POST['medicine_name']);
	$manufactured_by=validate($_POST['manufactured_by']);
	$donate_to=validate($_POST['donate_to']);
	$mfg_date=validate($_POST['mfg_date']);
	$exp_date=validate($_POST['exp_date']);
	$donor_id=$_POST['donor_id'];
		$sql = "INSERT INTO donation(medicine_name,manufactured_by,donate_to,mfg_date,exp_date,donor_id) VALUES('$medicine_name','$manufactured_by','$donate_to','$mfg_date','$exp_date','$donor_id')";
		if($db->query($sql)===TRUE){
			?>

<style>
.alert {
  padding: 20px;
  background-color: #DC143C;
  color: white;
}

.closebtn {
  margin-left: 15px;
  color: white;
  font-weight: bold;
  float: right;
  font-size: 22px;
  line-height: 20px;
  cursor: pointer;
  transition: 0.3s;
}

.closebtn:hover {
  color: black;
}
</style>
<script>
	window.setTimeout(function() {
    $(".alert").fadeTo(1000, 0).slideUp(500, function(){
        $(this).remove(); 
    });
}, 2000);
</script>
<div class="container">
<div class="alert">
  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
  <strong>Thankyou for donating medicine.</strong>
</div></div>


<?php
	}
}

function contact(){
	global $first_name,$last_name,$email,$message,$errors,$db;
	$first_name=validate($_POST['first_name']);
	$last_name=validate($_POST['last_name']);
	$email=validate($_POST['email']);
	$message=validate($_POST['message']);
		$sql = "INSERT INTO contact(first_name,last_name,email,message) VALUES('$first_name','$last_name','$email','$message')";
		if($db->query($sql)===TRUE){
			?>

<style>
.alert {
  padding: 20px;
  background-color: #DC143C;
  color: white;
}

.closebtn {
  margin-left: 15px;
  color: white;
  font-weight: bold;
  float: right;
  font-size: 22px;
  line-height: 20px;
  cursor: pointer;
  transition: 0.3s;
}

.closebtn:hover {
  color: black;
}
</style>
<script>
	window.setTimeout(function() {
    $(".alert").fadeTo(1000, 0).slideUp(500, function(){
        $(this).remove(); 
    });
}, 2000);
</script>
<div class="container">
<div class="alert">
  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
  <strong>Thankyou for Messaging. We will contact you soon.</strong>
</div></div>


<?php

 	/*$msg="Email:".$_POST['email']."\n Thankyou for contacting us. We will reach to you very soon.";
 	$recipient=$email;
 	$subject="Message Sent";
 	$mailheaders="From: Medicine Donation\n";

 	//mail send
 	mail($recipient,$subject,$msg,$mailheaders);*/
	}
}

function validate($data){
	$data = trim($data);
	$data = stripcslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}



 ?>
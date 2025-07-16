<?php 
session_start();
if(!isset($_SESSION["email"])){
  header("location:../index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="style.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Project &mdash; Medicine Donation</title>
	<link rel="stylesheet" href="../css/bootstrap.css">
	<link rel="stylesheet" href="../css/superfish.css">
  <link rel="stylesheet" href="../css/contact.css">
	<link rel="stylesheet" href="../css/style.css">
	<script src="js/modernizr-2.6.2.min.js"></script>
</head>
<body>
	<?php 
	include("navbar.php");
	 ?>

	 <div class="container">
  <ul class="nav nav-pills nav-justified">
    <li class="active" style="background-color: #FFF8DC"><a data-toggle="pill" href="#home">Profile</a></li>
    <li style="background-color: #FAF0E6"><a data-toggle="pill" href="#menu1">Received Medicines</a></li>
  </ul>
  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
    	<br>
      <center><h3>Profile</h3></center>
      <div class="container">
      <?php 
        include("../config/config.php");
        include("update_profile_engine.php");
        $u_email= $_SESSION["email"];

        $sql="SELECT * from receiver where email='$u_email'";
        $result=mysqli_query($db,$sql);

        if(mysqli_num_rows($result)>0)
      {
          while($rows=mysqli_fetch_assoc($result)){
          
       ?>
        <div class="card">
  <img src="../image/avatar.png" style="height:200px; width: 100%">
  <h1><?php echo $rows['ngo_name']; ?></h1>
  <p class="title"><b>Regd No.: </b><?php echo $rows['ngo_regd_no']; ?></p>
  <p><b>Phone No.: </b><?php echo $rows['phone']; ?></p>
  <p><b>Address: </b><?php echo $rows['address']; ?></p>
  <p><b>Id Type: </b><?php echo $rows['email']; ?></p>
  <p><a data-toggle="pill" class="btn btn-lg" href="#menu2">Update</a></p>
      <br>
  </div></div></div><?php }} ?>





    <div id="menu1" class="tab-pane fade">
    	<br>
      <center><h3>Received Medicines</h3></center>
      <div class="container">
      <input type="text" id="myInput2" onkeyup="myFunction2()" placeholder="Search..." title="Type in a name">

              <table id="myTable2">
                <tr class="header">
                  <th>Medicine Name</th>
                  <th>Manufactured By</th>
                  <th>Mfg Date</th>
                  <th>Exp Date</th>
                </tr>
                <?php 
        include("../config/config.php");
        $u_email=$_SESSION['email'];
        $sql1="SELECT * from receiver where email='$u_email'";
        $result1=mysqli_query($db,$sql1);

        if(mysqli_num_rows($result1)>0)
      {
          while($row=mysqli_fetch_assoc($result1)){
          	$ngo_name=$row['ngo_name'];

        $sql="SELECT * from donation where donate_to='$ngo_name'";
        $result=mysqli_query($db,$sql);

        if(mysqli_num_rows($result)>0)
      {
          while($rows=mysqli_fetch_assoc($result)){
          
       ?>
                <tr>
                  <td><?php echo $rows['medicine_name'] ?></td>
                  <td><?php echo $rows['manufactured_by'] ?></td>
                  <td><?php echo $rows['mfg_date'] ?></td>
                  <td><?php echo $rows['exp_date'] ?></td>
                </tr>
              <?php }}}} ?>
              </table>   
    </div>

  </div>

  <div id="menu2" class="tab-pane fade">
      <br>
      <center><h3>Update Profile</h3></center>
      <div class="container">
         <?php 
        $u_email=$_SESSION['email'];
  $sql1="SELECT * from receiver where email='$u_email'";
  $query1=mysqli_query($db,$sql1);
    if(mysqli_num_rows($query1)>0)
          {
              while($row=mysqli_fetch_assoc($query1)){
?>


    <section id="contact">
    
      <div class="form-container">
        <div class="form-box">
          <form method="POST">
            <div class="form-group">
              <label for="first-name">NGO Name</label>
              <input type="text" name="ngo_name" value="<?php echo $row['ngo_name'] ?>" required>
              <input type="hidden" name="receiver_id" value="<?php echo $row['receiver_id'] ?>">
            </div>
            <div class="form-group">
              <label for="last-name">Registration No.</label>
              <input type="text" name="ngo_regd_no" value="<?php echo $row['ngo_regd_no'] ?>" required>
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
  </section>

    </div>

  </div>


</div>
</div></body>

  <script>
function myFunction2() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput2");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable2");
  tr = table.getElementsByTagName("tr");
  th = table.getElementsByTagName("th");
  for (i = 1; i < tr.length; i++) {
    tr[i].style.display = "none";
      for(var j=0; j<th.length; j++){
        td = tr[i].getElementsByTagName("td")[j];      
        if (td) {
          if (td.innerHTML.toUpperCase().indexOf(filter.toUpperCase()) > -1)
          {
            tr[i].style.display = "";
            break;
           }
        }
      }
  }
}
</script>
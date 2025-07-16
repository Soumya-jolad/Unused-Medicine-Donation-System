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
	<link rel="stylesheet" href="../css/style.css">
	<script src="js/modernizr-2.6.2.min.js"></script>
</head>
<body>
	<?php 
	include("navbar.php");
	 ?>

	 <div class="container">
  <ul class="nav nav-pills nav-justified">
    <li class="active" style="background-color: #FFF8DC"><a data-toggle="pill" href="#home">Donors</a></li>
    <li style="background-color: #FAF0E6"><a data-toggle="pill" href="#menu1">Received Medicines</a></li>
    <li style="background-color: #FFF0E6"><a data-toggle="pill" href="#menu2">Receivers</a></li>
    <li style="background-color: #FFC0E8"><a data-toggle="pill" href="#menu3">Contact Messages</a></li>
  </ul>
  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
    	<br>
      <center><h3>Donors</h3></center>
      <div class="container">
        <input type="text" id="myInput3" onkeyup="myFunction3()" placeholder="Search..." title="Type in a name">

              <table id="myTable3">
                <tr class="header">
                  <th>Donor Id</th>
                  <th>First Name</th>
                  <th>Last name</th>
                  <th>Address</th>
                  <th>Email</th>
                  <th>Phone</th>
                </tr>
                <?php 
        include("../config/config.php");
        $sql="SELECT * from donor";
        $result=mysqli_query($db,$sql);

        if(mysqli_num_rows($result)>0)
      {
          while($rows=mysqli_fetch_assoc($result)){
          
       ?>
                <tr>
                  <td><?php echo $rows['donor_id'] ?></td>
                  <td><?php echo $rows['first_name'] ?></td>
                  <td><?php echo $rows['last_name'] ?></td>
                  <td><?php echo $rows['address'] ?></td>
                  <td><?php echo $rows['email'] ?></td>
                  <td><?php echo $rows['phone'] ?></td>
                </tr>
              <?php }} ?>
              </table>  

      </div></div>

      
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
        $sql="SELECT * from donation";
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
              <?php }} ?>
              </table>   
    </div>

  </div>

<div id="menu2" class="tab-pane">
      <br>
      <center><h3>Receivers</h3></center>
      <div class="container">
        <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search..." title="Type in a name">

              <table id="myTable">
                <tr class="header">
                  <th>Receiver Id</th>
                  <th>NGO Name</th>
                  <th>NGO Regd No</th>
                  <th>Address</th>
                  <th>Email</th>
                  <th>Phone</th>
                </tr>
                <?php 
        include("../config/config.php");
        $sql="SELECT * from receiver";
        $result=mysqli_query($db,$sql);

        if(mysqli_num_rows($result)>0)
      {
          while($rows=mysqli_fetch_assoc($result)){
          
       ?>
                <tr>
                  <td><?php echo $rows['receiver_id'] ?></td>
                  <td><?php echo $rows['ngo_name'] ?></td>
                  <td><?php echo $rows['ngo_regd_no'] ?></td>
                  <td><?php echo $rows['address'] ?></td>
                  <td><?php echo $rows['email'] ?></td>
                  <td><?php echo $rows['phone'] ?></td>
                </tr>
              <?php }} ?>
              </table>  

      </div></div>

<div id="menu3" class="tab-pane">
      <br>
      <center><h3>Contact Messages</h3></center>
      <div class="container">
        <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search..." title="Type in a name">

              <table id="myTable">
                <tr class="header">
                  <th>Contact Id</th>
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>Email</th>
                  <th>Message</th>
                </tr>
                <?php 
        include("../config/config.php");
        $sql="SELECT * from contact";
        $result=mysqli_query($db,$sql);

        if(mysqli_num_rows($result)>0)
      {
          while($rows=mysqli_fetch_assoc($result)){
          
       ?>
                <tr>
                  <td><?php echo $rows['contact_id'] ?></td>
                  <td><?php echo $rows['first_name'] ?></td>
                  <td><?php echo $rows['last_name'] ?></td>
                  <td><?php echo $rows['email'] ?></td>
                  <td><?php echo $rows['message'] ?></td>
                </tr>
              <?php }} ?>
              </table>  

      </div></div>

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
<script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
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
<script>
function myFunction3() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput3");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable3");
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

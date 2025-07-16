<?php 
include("../config/config.php");
if(isset($_POST['update_profile'])){
	global $receiver_id,$ngo_name,$ngo_regd_no,$phone,$address,$db;
	$receiver_id=validate($_POST['receiver_id']);
	$ngo_name=validate($_POST['ngo_name']);
	$ngo_regd_no=validate($_POST['ngo_regd_no']);
	$address=validate($_POST['address']);
	$phone=validate($_POST['phone']);
		$sql = "UPDATE receiver SET ngo_name='$ngo_name',ngo_regd_no='$ngo_regd_no',phone='$phone',address='$address' WHERE receiver_id='$receiver_id'";
		$query=mysqli_query($db,$sql);
		if(!empty($query)){
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
<div class="alert" role='alert'>
  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
  <center><strong>Your Information has been updated.</strong></center>
</div></div>


<?php
	}
}
function validate($data){
	$data = trim($data);
	$data = stripcslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

 ?>
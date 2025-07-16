<?php 

$db = new mysqli('localhost','root','','medicine');

if($db->connect_error){
	echo "Error connecting database";
}

 ?>
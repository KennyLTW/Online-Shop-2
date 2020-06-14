<?php
include("db_config.php");

	$deluser = $_GET['deluser'];

	$sql = "DELETE FROM userdata WHERE username='$deluser'";
	$result = mysqli_query($conn, $sql);
	if($result === FALSE){
		echo("Unsuccessful");
	}else{
		header("location: /pj2/user.php");
	}
?>
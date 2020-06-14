<?php
include("../db_config.php");
session_start();

	$postToRm = $_GET['postToRm'];
	
	
	$sql = "DELETE FROM favourList WHERE userID='{$_SESSION['username']}' AND imageID='$postToRm'";

	$result = mysqli_query($conn, $sql);
	
	header("Location: ".$_SERVER['HTTP_REFERER']);
		

	
?>
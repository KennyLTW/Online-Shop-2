<?php
include("../db_config.php");
session_start();

	if(loggedin()){
		$postToAdd = $_GET['postToAdd'];
		$sql = "INSERT INTO favourList (userID, imageID) VALUES ('{$_SESSION['username']}','$postToAdd')";
		$result = mysqli_query($conn, $sql);
		header("Location: ".$_SERVER['HTTP_REFERER']);

	}else{
        echo 'You may login to add to your favourite list';
        echo '<meta http-equiv=REFRESH CONTENT=0;url=../display.php>';
	}

	
?>
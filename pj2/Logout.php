<?php
// $_SESSION['username'] = null ;
session_start();
header("Location:Home.php");
session_destroy(); 
exit;
?>

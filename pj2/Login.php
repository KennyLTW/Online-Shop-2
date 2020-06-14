<?php session_start(); ?>
<?php
include("db_config.php");
$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM userdata WHERE username = '$username'";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($result);

if($username != null && $password != null && $row[0] == $username && $row[1] == $password)
{

 
        $_SESSION['username'] = $username;
        echo '<meta http-equiv=REFRESH CONTENT=1;url=Home.php>';
	header("Location: Home.php");
}
else
{
        echo 'Login Failed';
        echo '<meta http-equiv=REFRESH CONTENT=1;url=Loginpage.php>';
}
?>

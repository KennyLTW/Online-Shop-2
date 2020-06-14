  <html>
<head>
<link rel="stylesheet" type="text/css" href="style123.css" />
</head>
<?php
  include("db_config.php");
  session_start();
  include("header.php");
  if($_SESSION['username'] =="")
     {
     header("Location: Loginpage.php");
     }
     
  $sd=$_SESSION['username'];
?>
<div class="container text-center">
Change your password
<form action="?" method="POST">
    <!--old password : <input type="password" name="old_pw"/></br>-->
    *new password : <input type="password" name="new_pw1" required/></br>
    *new password again : <input type="password" name="new_pw2" required/></br>
    <input type="submit" name="submit" value="submit" />
</form>
</div>
<?php


//$old_pw = $_POST['old_pw'];
$new_pw1 = $_POST['new_pw1'];
$new_pw2 = $_POST['new_pw2'];

if(isset($_POST['submit'])) {
    if($new_pw1 != $new_pw2) {
        echo "two passwords are not same";
    } else {
        if(strlen($new_pw1) < 8) {
            echo "new password length must be >= 8";
        } else {
            //echo "ALL OK";
            include_once"db_config.php";
            $sql = "UPDATE userdata SET password = '" . $new_pw1 . "' WHERE username = '". $_SESSION['username'] . "'";
            //echo $sql;
            if(mysqli_query($conn,$sql)) {
                echo "OK, your password changed";
            } else {
                echo "ERROR";
            }
            
        }
    }
}
?>
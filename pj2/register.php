<?php
include("db_config.php");
$id = $_POST['id'];
$pw = $_POST['pw'];
$pw2 = $_POST['pw2'];
$email = $_POST['email'];
$sql = "SELECT username FROM userdata ";
$result = mysqli_query($conn,$sql);
$storeArray = Array();
while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $storeArray[] =  $row['username'];  
    }
if($id != null && $pw != null && $pw2 != null && $pw == $pw2 && !in_array($id,$storeArray))
{
        $sql = "INSERT INTO userdata (username, password, email) values ('$id', '$pw', '$email')";
        if(mysqli_query($conn,$sql))
        {
                echo 'Register success!';
                echo '<meta http-equiv=REFRESH CONTENT=2;url=Loginpage.php>';
        }
        
} else
        {
                echo 'Register failed!';
                echo '<meta http-equiv=REFRESH CONTENT=2;url=Loginpage.php>';
        }
?>
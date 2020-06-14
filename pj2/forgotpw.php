<?php
include("db_config.php");

    function randomPassword() {
    $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
        for ($i = 0; $i < 8; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
    return implode($pass); //turn the array into a string
    }

$name = $_POST['name'];
$email = $_POST['email'];
$sql = "SELECT * FROM userdata where username='".$name."'and email ='".$email."'";
if(!(empty($_POST['name'])||empty($_POST['email']))){
$result = mysqli_query($conn,$sql);
if ($result->num_rows > 0) {
   
    while($row = $result->fetch_assoc()) {
      $pw= randompassword();

     $sql = "UPDATE userdata SET password = '" .$pw. "' WHERE username = '".$name. "'";
            //echo $sql;
            if(mysqli_query($conn,$sql)) {
                echo '<html>
<head>
  <title>Forgot Password</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="header">
  	<h2>Forgot Password</h2>
  </div>
   <form method="post" action="forgotpw.php">
   <p>Your Password has been change to : '. $pw.'</p>
   <p>Please change your Password as soon as possible</p>
   <p>
  	<a style="margin-left:10.5em" href="Home.php">Back</a>
  	</p>';
            } else {
                echo "ERROR";
            }
    }
}else {
   
     echo 'No such user!';
}
    
}else echo 'Please Enter your name and email!!';
    

?>
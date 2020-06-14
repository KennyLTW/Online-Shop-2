<?php
include("db_config.php");
session_start();
if(isset($_SESSION['username'])){
$uname = $_SESSION['username'];
}else{
      $uname='Guest'  ;
}
$prodid = $_POST['prodid'];
$comment =$_POST['comment'];
$sql = "INSERT INTO comment (uname, prodid, comment) values ('$uname', '$prodid','$comment')";
if(mysqli_query($conn,$sql)){
        {
                echo 'Comment success!';
                header('Location: ' . $_SERVER['HTTP_REFERER']);
        }
        
} else
        {
                echo 'Comment failed!';
                header('Location: ' . $_SERVER['HTTP_REFERER']);
        }
?>
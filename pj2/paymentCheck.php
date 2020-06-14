<?php
$number = $_POST['number'];
$name = $_POST['name'];
$expiry = $_POST['expiry'];
$cvc = $_POST['cvc'];
//if(!(isset($_POST['number'])&&isset($_POST['name'])&&isset($_POST['expiry'])&&isset($_POST['cvc']))){
if(empty($number)||empty($name)||empty($expiry)||empty($cvc)){
    echo '<script>alert("Please input all the information of your cards.");window.location.replace("payment.php");</script>';
    
}else{
    echo '<script>alert("Pay Success!!");window.location.replace("Home.php");</script>';
    
}
?>
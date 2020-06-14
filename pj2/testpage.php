<html>
<head>
  
<link rel="stylesheet" type="text/css" href="style123.css">
<link rel="stylesheet" href="shareButton.css">
<link rel="stylesheet" type="text/css" href="plugin/bootstrap/bootstrap.min.css">
</head>

 

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<body onload="window.parent.parent.scrollTo(0,0)">
<?php
include("db_config.php");
date_default_timezone_set("Asia/Hong_Kong");
$sql = "SELECT udate FROM `products_info` where ID='2'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $dayplus = abs(strtotime(date('Y-m-d H:i:s')) - strtotime($row['udate']));
        $day = 3*86400 - ($dayplus);
        $dayString=date('Y-m-d H:i:s', strtotime(date('Y-m-d H:i:s').'+'.$day.' second'));
        echo $dayString;
        
        
        echo date('Y-m-d H:i:s');
    }
}

?>

<?php
include('db_config.php');
$id = $_POST['id'];

foreach ($id as $value){

$sql = "DELETE FROM `products_info` WHERE `ID` = '$value'";


if ($conn->query($sql) === TRUE) {
	$string="delete success";
} else {
    $string= "Error delete record: " . $conn->error;
    
}
}
echo $string;
?>
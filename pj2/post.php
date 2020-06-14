<?php
include('db_config.php');
$name = $_POST['name'];
$price = $_POST['price'];
$id = $_POST['id'];


$sql = "UPDATE `products_info` SET `Price`='$price',`customer`='$name' WHERE `ID` = '$id'";


if ($conn->query($sql) === TRUE) {
    echo "Bid successfully";
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();

?>
<?php
include('db_config.php');
$id = $_POST['id'];


$sql = "UPDATE `products_info` SET `status`='A' WHERE `ID` = '$id'";


if ($conn->query($sql) === TRUE) {
    echo "Bid Accepted";
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();

?>
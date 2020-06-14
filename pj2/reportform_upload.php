<?php
include("db_config.php");

$rusername = $_POST['rusername'];
$reportedusername = $_POST['rreportedname'];
$reportedwebsite = $_POST['rwebsite'];
$reportreason = $_POST['rreason'];
$rmessage = $_POST['rmessage'];

if($rusername != null && $reportedusername !=null && $reportreason !=null && $rmessage !=null){
    $sql = "INSERT INTO reportdata (rusername, rreportedname, rwebsite, rreason, rmessage) values ('$rusername', '$reportedusername', '$reportedwebsite', '$reportreason', '$rmessage')";
    if (mysqli_query($conn, $sql)) {
        echo 'New report created successfully!';
        echo '<meta http-equiv=REFRESH CONTENT=1;url=Home.php>';
    }}
    else {
        echo 'All field are required. Please entry all the data!';
        echo '<meta http-equiv=REFRESH CONTENT=1;url=reportform.php>';
    }
?>
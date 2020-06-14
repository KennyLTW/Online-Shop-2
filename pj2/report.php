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

<div class="container"><h5 class='text-center'>User Report</h5>
<div class="row">
    <div class="divTableCell col-2"><h5>User name</h5></div>
    <div class="divTableCell col-2"><h5>Report Title</h5></div>
    <div class="divTableCell col-2"><h5>Report Webside</h5></div>
    <div class="divTableCell col-2"><h5>Report Reason</h5></div>
    <div class="divTableCell col-4"><h5> Message</h5></div>
 
    <?php 
          $sql2 = "SELECT * FROM reportdata ";
$result2 = mysqli_query($conn, $sql2);
if ($result2->num_rows > 0) {
    while($row = mysqli_fetch_assoc($result2)) {
      
       
           echo "
              <div class='divTableCell col-2'>".
              $row['rusername'].
              "</div>
              <div class='divTableCell col-2'>".
              $row['rreportedname']."</div>
              <div class='divTableCell col-2'>".
                $row['rwebsite']."</div>
              <div class='divTableCell col-2'>".
              $row['rreason']."</div>
              <div class='divTableCell col-4'>".
              $row['rmessage']."
              </div>";
    }
}
?>
    

</div>
</div>

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


<body>
  <div class="container">
  <div>
    <form action="change_pw.php">
      <input class="cpwd" type="submit" value="Change my password" />
    </form>
    <?php
    if($_SESSION['username'] != null && $_SESSION['username'] === 'admin'){ ?>
     <form action="report.php">
      <input type="submit" value="User Report" />
    </form>
    <?php }?>
  </div>
  </div>
  <?php
    if($_SESSION['username'] != null && $_SESSION['username'] === 'admin'){ ?>
            
            <h3 align="center">Member Information</h3>
              <div style="padding-left:950px;">
            		<input type="button" value="Delete" onclick="location.href='/pj2/Admin_delete.php'">
            	</div></br>
            	<div>
              <table border="1" align="center" width= 90% style="margin:auto">
                <tr>
                    <th>Name(UserName)</th>
                    <th>Password</th>
                </tr>';
            <?php
            $sql = "SELECT * FROM userdata";
            $result = mysqli_query( $conn, $sql);
            while($row = mysqli_fetch_row($result))
            {
                    echo "<tr>
                          <td align='center'>$row[0]</td>
                          <td align='center'>$row[1]</td>
                        </tr>\n";
            }
    }
  ?>
  </table>
  </div>
  <h3 align="center">My Product Information</h3>
          <div class=divTable>
            <div class=divTableBody>
              <div class=divTableRow>
                <div class=divTableCell></div>
                <div class=divTableCell>product</div>
                <div class=divTableCell>price</div>
                <div class=divTableCell>bidder</div>
                <div class=divTableCell>status</div>
                <div class=divTableCell></div>
              </div>
              
<?php
$sql = "SELECT * FROM `products_info` WHERE `uploader`='$sd'";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
   
   
    while($row = $result->fetch_assoc()) {
		
		if($row['status']=="P"){
			$status="Progressing";
			echo"<div class=divTableRow>
                  <div class=divTableCell>
                    <input type=checkbox class=checkbox id=".$row['ID'].">
                  </div>";
		}else {
			$status="Bid accepted";
			echo"<div class=divTableRow>
                  <div class=divTableCell>
                  </div>";
		}
		
		if($row['customer']==""){
			$customer="-";
		}else{
		$customer=$row['customer'];
		}
	
     echo " <div class=divTableCell>".
                    $row['Name']."
                  </div>
                  <div class=divTableCell>".
                    $row['Price']."
                  </div>
                  <div class=divTableCell>".
                    $customer."
                  </div>
                  <div class=divTableCell>".
                    $status."</div>";
                    
            if($row['customer']!==""&&$row['status']=="P"){
            	echo "<div class=divTableCell><button id=acceptbtn onclick=status555('$row[ID]')>Accept Price</button></div>";
			}else if($row['customer']==""||$row['status']=="A"){
				echo "<div class=divTableCell></div>";
			}
		
                    
            echo"</div>";

    }
    
} else {
    echo "<div class=divTableRow>
                  <div class=divTableCell>-</div>
                  <div class=divTableCell>-</div>
                  <div class=divTableCell>-</div>
                  <div class=divTableCell>-</div>
                  <div class=divTableCell>-</div></div>";
}
echo "</div></table><br><button id=deletebtn onclick=select()>Delete product</button>";

?>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
function status555(x) {
var r = confirm("Are you sure to accept price?");
if(r==true){
 $.ajax({
        url: "status.php",
        type: "POST",
        data: { "id": x},
        success: function (response) {
				alert(response);
				location.reload();
		}
    });
    }
}
</script>

<script>
function select() {
	    var SelectedID = $(".checkbox:checked").map(function(){
      return $(this).attr('id');
    }).get();
    
    if(SelectedID=='') {

   alert("Please select items to delete.");
   
}else {
	var r = confirm("Are you sure to delete items?");
if(r==true){
 $.ajax({
        url: "delete.php",
        type: "POST",
        data: { "id": SelectedID},
        success: function (response) {
				alert(response);
				location.reload();
		}
    });
    }
}
}
</script>
</div>
</div>
<form id='payment' action='/pj2/payment.php' method='POST'>
<hr>
  <h3 align="center">My Bidding Product</h3>
  <div class=divTable>
    <div class=divTableBody>
      <div class=divTableRow>
        <div class=divTableCell></div>
        <div class=divTableCell>product owner</div>
        <div class=divTableCell>product</div>
        <div class=divTableCell>status</div>
        <div class=divTableCell>final price</div>
        <div class=divTableCell></div>
      </div>
      
<?php

$sql2 = "SELECT * FROM products_info WHERE status = 'A' and customer = '".$sd."'";
$result2 = mysqli_query($conn, $sql2);

if ($result2->num_rows > 0) {
    while($row = mysqli_fetch_assoc($result2)) {
      
        $st = 'Bid accepted';
           echo " <div class=divTableRow><div class=divTableCell>
           
            <input type=checkbox class=checkbox name='cb[]' value=".$row['ID']." />
            
            
          </div>
              <div class=divTableCell>".
              $row['uploader'].
              "</div>
              <div class=divTableCell>".
              $row['Name']."</div>
              <div class=divTableCell>".
                $st."</div>
              <div class=divTableCell>".
                $row['Price']."
              </div><div class=divTableCell>
              </div></div>";
      
     
      
    }
}
echo "</table><br><input type='submit' id=paymentB value='Payment'></form>";
$conn->close();
?>
</div>
</div>
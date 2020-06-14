<?php session_start();
include("db_config.php");
include("header.php");
?>

<html>
<head>
<link rel="stylesheet" type="text/css" href="style123.css" />
<link rel="stylesheet" type="text/css" href="plugin/bootstrap/bootstrap.min.css">
</head>
        
  
  <?php
  if($_SESSION['username'] =="")
     {
     header("Location: Loginpage.php");
     }
     
  $sd=$_SESSION['username'];
	
  

?>

        <body>
                 <div>
                    <form action="change_pw.php">
                      <input type="submit" value="Change my password" />
                    </form>
                  </div>
                
                	<h3 align="center">Member Information</h3>
		        <div style="padding-left:950px;">
		                <input type="button" value="Return" onclick="location.href='/pj2/user.php'">
		        </div></br>
		<div>
                <table border="1" align="center" width= 90% style="margin:auto">
                    <tr>
                        <th>Name(UserName)</th>
                        <th>Password</th>
                    </tr>
                        <?php
                        
                        if($_SESSION['username'] != null && $_SESSION['username'] === 'admin') {
                                
                                $sql = "SELECT * FROM userdata";
                                $result = mysqli_query($conn, $sql);
                                while($row = mysqli_fetch_row($result))
                                {
                                        echo "<tr>
                                        <td align='center'>$row[0]</td>
                                        <td align='center'>$row[1]</td>
                                        <td align='center'><a href='delete_user.php?deluser=".$row[0]."'>Delete</a></td>
                                        </tr>\n";
                                }
                        }
                        ?>
        </table></div>
        
        <h3 align="center">Product Information</h3>
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
$conn->close();
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
</body>
</html>
<?php
include("db_config.php");
session_start();
$currentID=$_SESSION['username'];
?>
<body class="displayBody" onload="window.parent.parent.scrollTo(0,0)">
<link rel="stylesheet" type="text/css" href="plugin/bootstrap/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="styleKeith.css">

<link rel="stylesheet" type="text/css" href="style123.css">
<script type="text/javascript" src="plugin/jquery-2.2.4.min.js"></script>

<script>
var filted = '';
    function filter(f){
    if (filted != f){
         window.location.replace('./display.php?search='+"<?php Print($_GET['search']); ?>" + '&filter='+f);
         document.cookie = "filterBtn="+f;
    }else{
        document.cookie = "filterBtn="+'';
        window.location.replace('./display.php?search='+"<?php Print($_GET['search']); ?>");
    }
    }
    
function getCookie(name){
    var re = new RegExp(name + "=([^;]+)");
    var value = re.exec(document.cookie);
    return (value != null) ? unescape(value[1]) : null;
  }
  
  
$( document ).ready(function() {
    var filterBtn = getCookie('filterBtn');
    filted = filterBtn;
    $('#'+filterBtn).addClass('onSelect');
    document.cookie = "filterBtn="+'';
});
</script>
<div class="container">
    <div class="filter">
        Filter:
    <a href="#" onclick="filter('Food')" id="Food">Food</a>
    <a href="#" onclick="filter('Drink')" id="Drink">Drink</a>
    <a href="#" onclick="filter('Other')" id="Other">Other</a>
    </div>
<table class=divTable>
            <div class=divTableBody>
              <div class=divTableRow>
 
<?php

if(!isset($_GET['search'])) {
    $sql = "SELECT * FROM products_info";
} else {
    $sql = "SELECT * FROM products_info where Name like '%".$_GET['search']."%'";
}
if(isset($_GET['filter'])){
    $sql=$sql."and Type like '%".$_GET['filter']."%'";
}
$result = $conn->query($sql);
$count='1';

$favList = [];
$sql2 = "SELECT * FROM favourList WHERE userID='".$currentID."'";
$result2 = mysqli_query($conn, $sql2);
while(($resultSet = mysqli_fetch_assoc($result2))){
	$favList[] = $resultSet['imageID'];
}

$fav = false;
if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
        if(!empty($favList)){
            if(in_array($row['ID'], $favList)){
        		$fav = true;
        	}else{
        		$fav = false;
        	}
        }
      echo "<div class=divTableCell>
                  <a href=details.php?pic=".$row["ID"]."><img src=".$row["Path"]." width=200 height=200></a> <br> Product Name: ".$row["Name"]."<br> Price: ".$row["Price"].
                  "<div class='favourite'>
						<div class='favourite-button-box'>
							<div class='favourite-button'>
								<input type=\"image\" ";if($fav){
									echo " src='img/fav.png' onclick=\"location.href='action/removefavourite.php?postToRm=";
								}else{
									echo " src='img/nfav.png' onclick=\"location.href='action/addfavourite.php?postToAdd=";
								}
								echo $row["ID"]."'\" style=\"width:30px\">
							</div>
						</div>
					</div>
				</div>";
            "</div>";

				if($count % 3=='0'){
				
				echo "</div><div class=divTableRow>";
      }
      
      $count++;		
    }
    
} else {
    echo "0 results";
}
$conn->close();

?>

</div>
</div>
</table>
</div>
</body>

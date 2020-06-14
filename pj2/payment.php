<?php
include("db_config.php");
session_start();
include("header.php");
?>
<html>
    <link rel="stylesheet" type="text/css" href="style123.css">
<body>

<!-- CSS is included via this JavaScript file -->
<script src="card.js"></script>
<div class=divTable>
    <div class=divTableBody>
      <div class=divTableRow>
        <div class=divTableCell>product owner</div>
        <div class=divTableCell>product</div>
        <div class=divTableCell>final price</div>
      </div>
      
<?php

$totalp=0;
$cb=$_POST['cb'];
  if(empty($cb)) 
  {
    echo("You didn't select any buildings.");
  } 
  else
  {
    
    $N = count($cb);
    for($i=0; $i < $N; $i++)
    {
      $sql2 = "SELECT * FROM products_info WHERE ID='".$cb[$i]."'";
$result2 = mysqli_query($conn, $sql2);
if ($result2->num_rows > 0) {
    while($row = mysqli_fetch_assoc($result2)) {
      
        $st = 'Bid accepted';
           echo " <div class=divTableRow>
              <div class=divTableCell>".
              $row['uploader'].
              "</div>
              <div class=divTableCell>".
              $row['Name']."</div>
              <div class=divTableCell>".
                $row['Price']."
              </div></div>";
        $totalp += $row['Price'];
    }
}
    }
  }
$sd=$_SESSION['username'];



echo "</div>
</div>
<h3 align='center'>Total Price: $$totalp</h3>";
?>


<div class="container">
<div class="row">
    <div class="col-5">
        <div class='card-wrapper'></div>
            <form class='cardPayment' method="POST" action='paymentCheck.php'>
               <div class="row">
                <input class="col-6" type="text" name="number" placeholder="Card Number">
                <input class="col-6" type="text" name="name" placeholder="Full Name"/>
                <input class="col-4" type="text" name="expiry" placeholder="MM/YY"/>
                <input class="col-4" type="text" name="cvc" placeholder="CVC"/>
                <input class="col-4" type="submit"/>
                </div>
            
            </form>
    </div>
</div>
</div>

<script>

var card = new Card({
    form: '.cardPayment',
    container: '.card-wrapper',

    messages: {
        validDate: 'expire\ndate',
        monthYear: 'mm/yy'
    }
});
</script>
</body>
</html>
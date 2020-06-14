<html>
<head>
  
<link rel="stylesheet" type="text/css" href="style123.css">
<link rel="stylesheet" href="shareButton.css">
<link rel="stylesheet" type="text/css" href="plugin/bootstrap/bootstrap.min.css">
</head>

  
  <?php 
  session_start();
  if($_GET["pic"]==""){
  header("Location: Home.php");
  }
  $sd=$_SESSION['username'];



?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
function post123(seller,id,x){
 var username='<?php echo $sd;?>';
 var data = document.getElementById('price').value;


 if(username==''){
 	alert("please login");
 }else if(username==seller){
	alert("Cannot bid your own product!");
 }else if(data==''){
	 alert('please enter price!');
 }else if (data<=x){
	 alert("bid price must larger than reserve price!");
 }else {
     $.ajax({
        url: "post.php",
        type: "POST",
        data: { "id": id,
				"name": username,
        		"price": data},
        success: function (response) {
				alert(response);
				location.reload();
		}
    });
 }
}
$( document ).ready(function() {
    
    
        if( window.self == window.top){
          var path =window.location;
          window.location.replace('Home.php?sharepath='+path);
        }
    

});
</script>
<body onload="window.parent.parent.scrollTo(0,0)">
<?php
include("db_config.php");

$sql = "SELECT * FROM `products_info` WHERE `ID`=".$_GET["pic"];
$result = $conn->query($sql);


if ($result->num_rows > 0) {
   
   
    while($row = $result->fetch_assoc()) {
		
	$customer=$row["customer"];
	if($customer==''){
		$customer =" - ";
	}
	
	if($row['status']=="P"){
	 	$status = "Progessing";
	}else {
		$status = "Bid accepted";
	}
	
	
     echo "<div class=divTable>
              <div class=divTableBody>
                <div class=divTableRow>
                  <div class=divTableCell1>
                    <img src=".$row["Path"]." width=200 height=200>
                  </div>
                  </div>
                  <div class=divTableRow>
                  <div class=divTableCell1>
                    Product Name: ".$row["Name"]."
                  </div>
                  </div>
                  <div class=divTableRow>
                  <div class=divTableCell1>
                    Seller : ".$row["uploader"]."
                  </div>
                  </div>
                  <div class=divTableRow>
                  <div class=divTableCell1>
                    Reserve Price: ".$row["Price"]." (".$status.")
                  </div>
                  </div>
				  <div class=divTableRow>
                  <div class=divTableCell1>
                    Last bidder: ".$customer."
                  </div>
                  </div>
                  <div class=divTableRow>
                  <div class=divTableCell1>
					Bid Price: <input type=number id=price size=2 min=".$row["Price"].">";
					
					
          date_default_timezone_set("Asia/Hong_Kong");
          $sql2 = "SELECT udate FROM `products_info` where ID='".$_GET["pic"]."'";
          $result2 = $conn->query($sql);
          if ($result2->num_rows > 0) {
              while($row2 = $result2->fetch_assoc()) {
                  $dayplus = abs(strtotime(date('Y-m-d H:i:s')) - strtotime($row2['udate']));
                  $day = 10*86400 - ($dayplus);
                  $dayString=date('Y-m-d H:i:s', strtotime(date('Y-m-d H:i:s').'+'.$day.' second'));
                  echo '<div>End time: '.$dayString.'</div>';
              }
          }				
          echo '<div>Time Remaining : <p id="timeleft"></p></div>

<script>

var countDownDate = new Date("'. $dayString. '").getTime();


var x = setInterval(function() {


  var now = new Date().getTime();
    

  var distance = countDownDate - now;
    

  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    

  document.getElementById("timeleft").innerHTML = days + "d " + hours + "h "
  + minutes + "m " + seconds + "s ";
    

  if (distance < 0) {
    clearInterval(x);
    document.getElementById("timeleft").innerHTML = "EXPIRED";
    document.getElementById("bidBtn").style.display = "none";
  }
}, 1000);
</script>';


					if($status == "Progessing"){
					echo "<button id='bidBtn' onclick=post123('$row[uploader]','$row[ID]',$row[Price])> Bid </button>";
					}else {
					echo "<button id='bidBtn' type=button disabled> Bid </button>";
					}
                echo"  </div>
                  </div>
                  <div class=divTableRow>
                    <div class=divTableCell1>
                   <hr>".
                    $row["information"].
                  "</div>
                  </div>
              </div>
           </div>
        </table>";

    }
    
} else {
    echo "0 results";
}



?>
<div align="center">
  <!-- Sharingbutton Facebook -->
  <a class="resp-sharing-button__link" href="https://facebook.com/sharer/sharer.php?u=<?php echo 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'].'?pic='.$_GET["pic"] ;?>" target="_blank" rel="noopener" aria-label="Facebook">
    <div class="resp-sharing-button resp-sharing-button--facebook resp-sharing-button--medium"><div aria-hidden="true" class="resp-sharing-button__icon resp-sharing-button__icon--normal">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M18.77 7.5H14.5V5.6c0-.9.6-1.1 1-1.1h3V.54L14.17.53C10.24.54 9.5 3.48 9.5 5.37V7.5h-3v4h3v12h5v-12h3.85l.42-4z"/></svg></div>Facebook</div>
  </a>
  
  <!-- Sharingbutton Twitter -->
  <a class="resp-sharing-button__link" href="https://twitter.com/intent/tweet/?text=Super%20fast%20and%20easy%20Social%20Media%20Sharing%20Buttons.%20No%20JavaScript.%20No%20tracking.&amp;url=<?php echo 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'].'?pic='.$_GET["pic"] ;?>" target="_blank" rel="noopener" aria-label="Twitter">
    <div class="resp-sharing-button resp-sharing-button--twitter resp-sharing-button--medium"><div aria-hidden="true" class="resp-sharing-button__icon resp-sharing-button__icon--normal">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M23.4 4.83c-.8.37-1.5.38-2.22.02.94-.56.98-.96 1.32-2.02-.88.52-1.85.9-2.9 1.1-.8-.88-2-1.43-3.3-1.43-2.5 0-4.55 2.04-4.55 4.54 0 .36.04.7.12 1.04-3.78-.2-7.12-2-9.37-4.75-.4.67-.6 1.45-.6 2.3 0 1.56.8 2.95 2 3.77-.73-.03-1.43-.23-2.05-.57v.06c0 2.2 1.57 4.03 3.65 4.44-.67.18-1.37.2-2.05.08.57 1.8 2.25 3.12 4.24 3.16-1.95 1.52-4.36 2.16-6.74 1.88 2 1.3 4.4 2.04 6.97 2.04 8.36 0 12.93-6.92 12.93-12.93l-.02-.6c.9-.63 1.96-1.22 2.57-2.14z"/></svg></div>Twitter</div>
  </a>
  
  <!-- Sharingbutton WhatsApp -->
  <a class="resp-sharing-button__link" href="whatsapp://send?text=Super%20fast%20and%20easy%20Social%20Media%20Sharing%20Buttons.%20No%20JavaScript.%20No%20tracking.%20http%3A%2F%2Fsharingbuttons.io" target="_blank" rel="noopener" aria-label="WhatsApp">
    <div class="resp-sharing-button resp-sharing-button--whatsapp resp-sharing-button--medium"><div aria-hidden="true" class="resp-sharing-button__icon resp-sharing-button__icon--normal">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path stroke-width="1px" d="M20.1 3.9C17.9 1.7 15 .5 12 .5 5.8.5.7 5.6.7 11.9c0 2 .5 3.9 1.5 5.6L.6 23.4l6-1.6c1.6.9 3.5 1.3 5.4 1.3 6.3 0 11.4-5.1 11.4-11.4-.1-2.8-1.2-5.7-3.3-7.8zM12 21.4c-1.7 0-3.3-.5-4.8-1.3l-.4-.2-3.5 1 1-3.4L4 17c-1-1.5-1.4-3.2-1.4-5.1 0-5.2 4.2-9.4 9.4-9.4 2.5 0 4.9 1 6.7 2.8 1.8 1.8 2.8 4.2 2.8 6.7-.1 5.2-4.3 9.4-9.5 9.4zm5.1-7.1c-.3-.1-1.7-.9-1.9-1-.3-.1-.5-.1-.7.1-.2.3-.8 1-.9 1.1-.2.2-.3.2-.6.1s-1.2-.5-2.3-1.4c-.9-.8-1.4-1.7-1.6-2-.2-.3 0-.5.1-.6s.3-.3.4-.5c.2-.1.3-.3.4-.5.1-.2 0-.4 0-.5C10 9 9.3 7.6 9 7c-.1-.4-.4-.3-.5-.3h-.6s-.4.1-.7.3c-.3.3-1 1-1 2.4s1 2.8 1.1 3c.1.2 2 3.1 4.9 4.3.7.3 1.2.5 1.6.6.7.2 1.3.2 1.8.1.6-.1 1.7-.7 1.9-1.3.2-.7.2-1.2.2-1.3-.1-.3-.3-.4-.6-.5z"/></svg></div>WhatsApp</div>
  </a>
  
  <!-- Sharingbutton Google+ -->
  <a class="resp-sharing-button__link" href="https://plus.google.com/share?url=<?php echo 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'].'?pic='.$_GET["pic"] ;?>" target="_blank" rel="noopener" aria-label="Google+">
    <div class="resp-sharing-button resp-sharing-button--google resp-sharing-button--medium"><div aria-hidden="true" class="resp-sharing-button__icon resp-sharing-button__icon--normal">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M11.37 12.93c-.73-.52-1.4-1.27-1.4-1.5 0-.43.03-.63.98-1.37 1.23-.97 1.9-2.23 1.9-3.57 0-1.22-.36-2.3-1-3.05h.5c.1 0 .2-.04.28-.1l1.36-.98c.16-.12.23-.34.17-.54-.07-.2-.25-.33-.46-.33H7.6c-.66 0-1.34.12-2 .35-2.23.76-3.78 2.66-3.78 4.6 0 2.76 2.13 4.85 5 4.9-.07.23-.1.45-.1.66 0 .43.1.83.33 1.22h-.08c-2.72 0-5.17 1.34-6.1 3.32-.25.52-.37 1.04-.37 1.56 0 .5.13.98.38 1.44.6 1.04 1.85 1.86 3.55 2.28.87.23 1.82.34 2.8.34.88 0 1.7-.1 2.5-.34 2.4-.7 3.97-2.48 3.97-4.54 0-1.97-.63-3.15-2.33-4.35zm-7.7 4.5c0-1.42 1.8-2.68 3.9-2.68h.05c.45 0 .9.07 1.3.2l.42.28c.96.66 1.6 1.1 1.77 1.8.05.16.07.33.07.5 0 1.8-1.33 2.7-3.96 2.7-1.98 0-3.54-1.23-3.54-2.8zM5.54 3.9c.32-.38.75-.58 1.23-.58h.05c1.35.05 2.64 1.55 2.88 3.35.14 1.02-.08 1.97-.6 2.55-.32.37-.74.56-1.23.56h-.03c-1.32-.04-2.63-1.6-2.87-3.4-.13-1 .08-1.92.58-2.5zM23.5 9.5h-3v-3h-2v3h-3v2h3v3h2v-3h3z"/></svg></div>Google+</div>
  </a>
  
  <!-- Sharingbutton Tumblr -->
  <a class="resp-sharing-button__link" href="https://www.tumblr.com/widgets/share/tool?posttype=link&amp;title=Super%20fast%20and%20easy%20Social%20Media%20Sharing%20Buttons.%20No%20JavaScript.%20No%20tracking.&amp;caption=Super%20fast%20and%20easy%20Social%20Media%20Sharing%20Buttons.%20No%20JavaScript.%20No%20tracking.&amp;content=<?php echo 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'].'?pic='.$_GET["pic"] ;?>&amp;canonicalUrl=<?php echo 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'].'?pic='.$_GET["pic"] ;?>&amp;shareSource=tumblr_share_button" target="_blank" rel="noopener" aria-label="Tumblr">
    <div class="resp-sharing-button resp-sharing-button--tumblr resp-sharing-button--medium"><div aria-hidden="true" class="resp-sharing-button__icon resp-sharing-button__icon--normal">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M13.5.5v5h5v4h-5V15c0 5 3.5 4.4 6 2.8v4.4c-6.7 3.2-12 0-12-4.2V9.5h-3V6.7c1-.3 2.2-.7 3-1.3.5-.5 1-1.2 1.4-2 .3-.7.6-1.7.7-3h3.8z"/></svg></div>Tumblr</div>
  </a>
  
  <!-- Sharingbutton E-Mail -->
  <a class="resp-sharing-button__link" href="mailto:?subject=Super%20fast%20and%20easy%20Social%20Media%20Sharing%20Buttons.%20No%20JavaScript.%20No%20tracking.&amp;body=<?php echo 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'].'?pic='.$_GET["pic"] ;?>" target="_self" rel="noopener" aria-label="E-Mail">
    <div class="resp-sharing-button resp-sharing-button--email resp-sharing-button--medium"><div aria-hidden="true" class="resp-sharing-button__icon resp-sharing-button__icon--normal">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M23.5 18c0 .8-.7 1.5-1.5 1.5H2c-.8 0-1.5-.7-1.5-1.5V6c0-.8.7-1.5 1.5-1.5h20c.8 0 1.5.7 1.5 1.5v12zm-3-9.5L12 14 3.5 8.5m0 7.5L7 14m13.5 2L17 14"/></svg></div>E-Mail</div>
  </a>
</div>
<hr>
<div class='container'>
<h3 align="center">Comment</h3>
  <div class=divTable>
    <div class=divTableBody>
      <div class='divTableRow row'>
        <div class='divTableCell  col-2 '><b>User Name</b></div>
        <div class='divTableCell  col-10'><b>Comment</b></div>
      </div>
      
<?php
$sql = "SELECT * FROM comment WHERE prodid = '".$_GET["pic"]."'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = mysqli_fetch_assoc($result)) {
      echo " 
              
              <div class='divTableRow row'><div class='divTableCell col-2'>". $row['uname']."</div><div class='divTableCell col-10'>". $row['comment']."</div></div>
              
            ";
       
     
      
    }
}
$conn->close();
?>
</div>
</div>

<div class="container">

  <br>
  <form method="post" action="comment.php">
    <div class="row">
  <div class="col-10 text-center"><input name="comment" style="width: 100%" placeholder="Write your comment here! (Maximum words: 150)" maxlength="150" size="150" required/></div>
  <input type="hidden" name="prodid" value='<?php echo $_GET["pic"];?>' />
  <div class="col-2">
  <input type="submit" style="    background-color: dodgerblue;
    color: white ;
    text-align: center;
    padding: 12px;
    text-decoration: none;
    font-size: 18px;
    line-height: 25px;
    border-radius: 4px;
    border:0 none;
    cursor:pointer;
    -webkit-border-radius: 5px;
    border-radius: 5px;" />
    </div>
  </div>
  </form>
  <br><br>
</div>
</body>
<html>
<link rel="stylesheet" type="text/css" href="plugin/bootstrap/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="styleKeith.css">
<script src="plugin/jquery-2.2.4.min.js"></script>
<script src="plugin/bootstrap/bootstrap.min.js"></script>
<script>

//document.getElementById("iframeContainer").contentWindow.location.href

</script>

<div class="header">
  <div class="container">
    <a class="logo" href="Home.php"><img src="img/logo.png"></a>
    <div class="search-container">
		    <form action="display.php" method="get" target="iframeContainer">
		      <input type="text" placeholder="Search.." name="search">
		      <button type="submit">Go</button>
		    </form>
		</div>
    <div class="header-right">
      <?php
        session_start();
        $currentID=$_SESSION['username'];
        if(!loggedin()){
          echo "<a class=active href=registerpage.php>Register</a>
                <a href=Loginpage.php>Login</a>
                <a href=reportform.php>Report</a>";
        }else if ($currentID == 'admin'){
          echo "<a href=user.php>$currentID</a>
			          <a href=Logout.php>Logout</a>";
        }else {
          echo "<a href=user.php>$currentID</a>
			          <a class=active href=uploadpage.php>Upload</a>
			          <a href=reportform.php>Report</a>
			          <a href=Logout.php>Logout</a>";
        }
        
      ?>
    </div>
  </div>
  
  <div id="timer"></div>
  <script src="/pj2/timer.js"></script>

</div>
</html>
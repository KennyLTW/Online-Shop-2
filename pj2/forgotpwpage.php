<html>
<head>
  <title>Forgot Password</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="header">
  	<h2>Forgot Password</h2>
  </div>
	
  <form method="post" action="forgotpw.php">
  	<div class="input-group">
  	  <label>Please Enter Your User Name:</label>
  	  <input type="text" name="name" />
  	</div>
  	<div class="input-group">
  	  <label>Please Enter Your Email Address:</label>
  	  <input type="text" name="email" />
  	</div>
  	<div class="input-group">
  	  <button type="submit" class="btn" name="find_user">Reset your password</button>
  	</div>
  	<p>
  	<a style="margin-left:10.5em" href="Home.php">Back</a>
  	</p>
  </form>
</body>
</html>
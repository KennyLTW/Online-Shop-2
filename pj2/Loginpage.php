
<html>
<head>
  <title>Login</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="header">
   <h2>Login</h2>
  </div>
    
  <form method="post" action="Login.php">

   <div class="input-group">
      <label>Username</label>
      <input type="text" name="username" >
   </div>
   <div class="input-group">
      <label>Password</label>
      <input type="password" name="password">
   </div>
   <div class="input-group">
      <button type="submit" class="btn" name="login_user">Login</button>
   </div>
   <p>
      Not yet a member? <a href="registerpage.php">Sign up</a><p></p><a href="forgotpwpage.php">Forgot Password?</a></p><a style="margin-left:10.5em" href="Home.php">Back</a>
   </p>
  </form>
</body>
</html>
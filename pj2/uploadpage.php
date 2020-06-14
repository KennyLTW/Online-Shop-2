<!DOCTYPE html>

<?php
session_start();

if($_SESSION['username'] =="")
     {
     header("Location: Loginpage.php");
     } 
?>
<html>
    <head>
        <h2 class="header">Upload</h2>
        <link rel="stylesheet" href="style.css">
        <title>uplaod items</title>
    </head>
    <body>
        <form action="upload1.php" method="POST" enctype="multipart/form-data">
                Product name: <br>
                <input type="text" name="name" width="48" height="48" required><br>
                Price: <br>
                <input type="number" min="0" name="price" width="48" height="48" required><br>
                Type: <br>
                <select name="type">
                  <option value="Food">Food</option>
                  <option value="Drink">Drink</option>
                  <option value="Other">Other</option>
                </select><br>
                Description: <br>
                <textarea name="information" rows="4" cols="50" autofocus required></textarea><br>
                <br>
                <br>
                <br>
                <input type="file" name="upload_pic" id="upload_pic" required>
                <br>
                <br>
                <br>
                <input class="button1"type="submit" value="Submit" name="submit">
                <br>
                <br>
                <br>
                <br>
                <button class="button1 button2" onclick="window.history.back()">Back</button>
          </form>
    </body>
</html>
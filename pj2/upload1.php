<?php
session_start();
include 'db_config.php';

$sd=$_SESSION['username'];

$name = $_POST['name'];
$info = $_POST['information'];
$price = $_POST['price'];
$type = $_POST['type'];
$path = '/pj2/food_picture/'. basename( $_FILES["upload_pic"]["name"]);
$target_dir = "food_picture/";
$target_file = $target_dir . basename($_FILES["upload_pic"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

//create connection
$connection = new mysqli($servername, $username, $password, $dbname);

//check connection
if ($connection->connect_error) {
    die ("Connection failed: " .$connection->connect_error);
}

$sql = "INSERT INTO `products_info`(`uploader`, `Name`, `information`, `Price`, `Path`, `status` , `Type`, `udate`) VALUES ('$sd', '$name', '$info', '$price', '$path', 'P' , '$type','".date('Y-m-d H:i:s')."')";

if ($connection->query($sql) === TRUE) {
    //echo "updated to database!";
    //echo "$name";
} else {
    //echo "error: " .$connection->error;
}

if(isset($_POST["submit"])) {
    //check the upload file type correct or not
    $check = getimagesize($_FILES["upload_pic"]["tmp_name"]);
    if($check !== false) {
        //echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        //echo "File is not an image.";
        $uploadOk = 0;
    }
}

if ($uploadOk == 0) {
    //echo "Sorry, your file was not uploaded.";
//move uploaded file to directory
} else {
    if (move_uploaded_file($_FILES["upload_pic"]["tmp_name"], $target_file)) {
        //echo "The file ". basename( $_FILES["upload_pic"]["name"]). " has been uploaded.<br>";
        //echo $path;
        echo "<script>alert('Uploaded');document.location='Home.php'</script>";
    } else {
        //echo "Sorry, there was an error uploading your file.";
    }
}

//header("refresh:1; url=upload.html");
//header('Location: upload.html');

//back to home page
if(isset($_POST["back"])) {
    echo "<script>document.location='Home.php'</script>";
}

$connection->close();
?>
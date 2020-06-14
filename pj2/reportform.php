<?php
include("db_config.php");
include("header.php");
session_start();
?>

<html>
    <head>
        <link rel="stylesheet" type="text/css" href="style123.css">
    </head>
    <body>
        <?php
            if($_SESSION['username'] =="") {
                header("Location: Loginpage.php");
            }
            $sd=$_SESSION['username'];
        ?>
        
        <div>
            <form method="post" action="reportform_upload.php" id="report">
                <h1 align="center">Report Form</h1>
                <p align="center">If you find any content inappropriate and think it should be removed from the Marketplace, let us know by filling the form below.</p>
                <div align="center">
                    <h4><span>Your information:</span></h4>
                    <ul>
                        <li>
                            <div>
                                <h6>Username:</h6>
                                <input type="text" name="rusername">
                            </div>
                        </li>
                    </ul>
                    <hr>
                    <h4><span>Reported user information:</span></h4>
                    <ul>
                        <li>
                            <div>
                                <h6>Reported Username:</h6>
                                <input type="text" name="rreportedname">
                            </div>
                        </li>
                        <li>
                            <div>
                                <h6>Reported Website(if known)</h6>
                                <input type="url" name="rwebsite">
                            </div>
                        </li>
                    </ul>
                    <hr>
                    <h4>Report Reason:</h4>
                    <div>
                        <div>
                            <label for="Vidlence">Violence</label>
                            <input id="Violence" input type="radio" name="rreason" value="Violence" checked="" required="">
                        </div>
                        <div>
                            <label for="Advertisement Spam/ Phishing">Advertisement Spam/ Phishing</label>
                            <input id="Advertisement Spam/ Phishing" input type="radio" name="rreason" value="Advertisement Spam/ Phishing" required="">
                        </div>
                        <div>
                            <label for="Unauthorised Sales">Unauthorised Sales</label>
                            <input id="Unauthorised Sales" input type="radio" name="rreason" value="Unauthorised Sales" required="">
                        </div>
                        <div>
                            <label for="Prohibited item">Prohibited item</label>
                            <input id="Prohibited item" input type="radio" name="rreason" value="Prohibited item" required="">
                        </div>
                        <div>
                            <label for="Offensive Content">Offensive Content</label>
                            <input id="Offensive Content" input type="radio" name="rreason" value="Offensive Content" required="">
                        </div>
                        <div>
                            <label for="Irrelevant Keywords">Irrelevant Keywords</label>
                            <input id="Irrelevant Keywords" input type="radio" name="rreason" value="Irrelevant Keywords" required="">
                        </div>
                    </div>
                    <hr>
                    <div>
                        <label for="comment">Description:</label>
                        <textarea id ="comment" name="rmessage" rows="5"></textarea>
                    </div>
                    <p>Note: Submitting an accurate report helps us settle this issue faster.</p>
                    <button type="submit">Submit Report</button>
                    <hr>
                    <button type="reset">Reset</button>
                </div>
        </div>
    </body>
</html>
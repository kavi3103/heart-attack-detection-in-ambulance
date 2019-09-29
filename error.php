<?php

session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: doctorlogin.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>patient details</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
</head>
<body>
    <div class="container">
    <center><h1>DETECTOR IN AMBULANCE</h1><br>
        <h2> welcome <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b></h2>
        <a href="logout.php" class="btn btn-danger">Sign Out</a><br><br>
                        <h3>PATIENT DETAILS</h3>
                    </div>
                    <center><h5>no details</h5></center>
                </center>
            </div>
        </body>
        </html>
<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: doctorlogin.php");
    exit;
}

require_once "config.php";

$availability = "";
$username = $_SESSION["username"];

if($_SERVER["REQUEST_METHOD"] == "POST"){

    if (isset($_POST['submit'])) {
        if(isset($_POST['availability'])){
            $availability = $_POST["availability"];
        }
    }

    if (!empty($availability)){

        $sql = "UPDATE doctor SET availablity = ? WHERE username = ?";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ss",$param_availability ,$param_username);
            
            $param_availability = $availability;
            $param_username = $username;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: doctorpage2.php");
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($link);

}



?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>doctor</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
</head>
<body>
    <div class="container">
    <center><h1>DETECTOR IN AMBULANCE</h1><br>
        <h2> welcome <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b></h2>
        <a href="logout.php" class="btn btn-danger">Sign Out</a><br><br>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            Availability:<br>
            <input type="radio" name="availability" value="Yes"> Yes<br>
            <input type="radio" name="availability" value="No"> No<br><br>
            <input type="submit" class="btn btn-primary" name ="submit" value="Submit">
        </form><br><br>
        <a href="doctorpage2.php" class=" btn btn-primary">see patients details</a>
    
</body>
</html>
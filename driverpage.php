<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
require_once "config.php";

		
$vechicleno = $_SESSION["username"];


$doctor = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){

            $doctor= $_POST["doctor"];
   // echo $doctor;
       // echo $vechicleno;

    if (!empty($doctor)){

        $sql = "UPDATE doctor SET availablity = ?, vechile = ? WHERE name = ?";
       // echo $doctor;
      //  echo $vechicleno;

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sss",$param_availablity, $param_vechile ,$param_doctor);
            $param_availablity="No";
            $param_vechile = $vechicleno;
            $param_doctor = $doctor;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                echo"<script>alert('selected doctor')</script>";
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
<html>
<head>
	<title>driver page</title>
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
</head>
<body>
	 <div class="container">
    <center><h1>DETECTOR IN AMBULANCE</h1><br>
    	<h2> welcome driver <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b></h2>
     <a href="logout.php" class="btn btn-danger">Sign Out</a><br><br>
     <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
     	<label>select the nearest doctor</label><br><br>
     	<select name="doctor">
        <?php

           define('DB_SERVER', 'localhost');
           define('DB_USERNAME', 'root');
           define('DB_PASSWORD', '');
           define('DB_NAME', 'bouyonci');
 
/* Attempt to connect to MySQL database */
            $link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// Check connection
			if($link === false){
    			die("ERROR: Could not connect. " . mysqli_connect_error());
			}

            $sql = "SELECT * FROM  doctor where availablity = 'Yes'"; 
    

            $result = mysqli_query($link,$sql);
    
            if(mysqli_num_rows($result)>0){
                /* Fetch result row as an associative array. Since the result set 
                contains only one row, we don't need to use while loop */
                while($row = mysqli_fetch_assoc($result)){
                $name = $row["name"];
                $hospital = $row["hospital"];
                $area = $row["area"];
                $username= $row["username"];

               echo '<option value = "'.$name.'">'.$name.'('.$hospital.') - '.$area.'</option>';
                
            }

            } else{
                // URL doesn't contain valid id parameter. Redirect to error page
                 echo "no values";
            }// Close connection
            mysqli_close($link);
        ?>
    </select><br><br>
        <input type="submit" value="Submit" class="btn btn-primary">
</form></center></div>

</body>
</html>
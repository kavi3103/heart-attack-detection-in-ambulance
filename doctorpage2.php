<?php

session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: doctorlogin.php");
    exit;
}
// Check existence of id parameter before processing further
    // Include config file
    require_once "config.php";
    $username = $_SESSION["username"];
    // Prepare a select statement
    $sql = "SELECT * FROM patientdetails WHERE vechicleno = (SELECT vechile FROM doctor WHERE username = ? ) ";
    
    if($stmt = mysqli_prepare($link, $sql)){
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "s", $param_username);
        
        // Set parameters
        $param_username = $username;
        
        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);
    
            if(mysqli_num_rows($result) == 1){
                /* Fetch result row as an associative array. Since the result set
                contains only one row, we don't need to use while loop */
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                
                // Retrieve individual field value
                $patientname = $row["patientname"];
                $age = $row["age"];
                $sex = $row["sex"];
                $cp = $row["cp"];
                $trestbps = $row["trestbps"];
                $chol = $row["chol"];
                $fbs = $row["fbs"];
                $restecg = $row["restecg"];
                $thalach = $row["thalach"];
                $exang = $row["exang"];
                $oldpeak = $row["oldpeak"];
                $slope = $row["slope"];
                $ca = $row["ca"];
                $thal = $row["thal"];
                $target = $row["predict"];



            } else{
                // URL doesn't contain valid id parameter. Redirect to error page
                 header("location: error.php");
            }
            
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }
    }
     
    // Close statement
    mysqli_stmt_close($stmt);
    
    // Close connection
    mysqli_close($link);


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
                    <h3><center>
                    <div class="form-group">
                        <label>Patient Name</label>
                        <p class="form-control-static"><?php echo  $row["patientname"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Age</label>
                        <p class="form-control-static"><?php echo $row["age"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Sex</label>
                        <p class="form-control-static"><?php echo $row["sex"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Chest Pain type</label>
                        <p class="form-control-static"><?php echo $row["cp"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Resting bloodpressure</label>
                        <p class="form-control-static"><?php echo $row["trestbps"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Serum Cholestrol</label>
                        <p class="form-control-static"><?php echo $row["chol"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Fasting blood pressure > 120</label>
                        <p class="form-control-static"><?php echo $row["fbs"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Resting Electrocardiographic results</label>
                        <p class="form-control-static"><?php echo $row["restecg"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Maximum Heart rate achieved</label>
                        <p class="form-control-static"><?php echo $row["thalach"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Exercise induced agina</label>
                        <p class="form-control-static"><?php echo $row["exang"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>ST depression induced by exercise relative to rest</label>
                        <p class="form-control-static"><?php echo $row["oldpeak"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>The slope of peak exercise ST segment</label>
                        <p class="form-control-static"><?php echo $row["slope"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>number of major vessels colored by flouroscopy</label>
                        <p class="form-control-static"><?php echo $row["ca"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Defect</label>
                        <p class="form-control-static"><?php echo $row["thal"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Prediction of Heart Attack</label>
                        <p class="form-control-static"><?php echo $row["predict"]; ?></p>
                    </div>
                </center></h3>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>
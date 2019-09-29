<?php
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
// Include config file
require_once "config.php";
 
$vechicleno = $patientname = $age = $sex = $cp = $trestbps = $chol = $fasting = $restecg = $thalach = $exang = $oldpeak = $slope = $ca = $thal = $target = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate Name`q43
    $vechicleno = trim($_POST["vechicleno"]);
    $patientname = trim($_POST["patientname"]);
    $age = (int)trim($_POST["age"]);
    $sex =(int)trim($_POST["sex"]);
    $cp = (int)trim($_POST["cp"]);
    $trestbps= (int)trim($_POST["trestbps"]);
    $chol = (int)trim($_POST["chol"]);
    if (isset($_POST['fasting']))
    {
       $fasting =(int)trim($_POST["fasting"]);
    }
    //$fasting = trim($_POST["fasting"]);
    $restecg = (int)trim($_POST["restecg"]);
    $thalach= (int)trim($_POST["thalach"]);
    $exang = (int)trim($_POST["exang"]);
    $oldpeak = (int)trim($_POST["oldpeak"]);
    $slope = (int)trim($_POST["slope"]);
    $ca = (int)trim($_POST["ca"]);
    $thal = (int)trim($_POST["thal"]);
    //$target= trim($_POST["target"]);
    $command = escapeshellcmd('python sample2.py '.$age.' '.$sex.' '.$cp.' '.$trestbps.' '.$chol.' '.$fasting.' '.$restecg.' '.$thalach.' '.$exang.' '.$oldpeak.' '.$slope.' '.$ca.' '.$thal);
//$command = escapeshellcmd('python b.py');
    $target = shell_exec($command);
    
   //echo $vechicleno; 
    //echo  $patientname;
   /* echo $age;
    echo $sex;
    echo $cp;
    echo $trestbps;
    echo $chol;
    echo $fbs;
    echo $restecg;
    echo $thalach;
    echo $exang;
    echo $oldpeak;
    echo $slope;
    echo $ca;
    echo $thal;*/
   // echo $target;

    

    // Check input errors before inserting in database
    //if( !empty($vechicleno) && !empty($age) && !empty($sex) && !empty($cp) && !empty($trestbps) && !empty($chol) && !empty($fbs) && !empty($restecg) && !empty($thalach) && !empty($exang) && !empty($oldpeak) && !empty($slope) !empty($ca) && !empty($thal) && !empty($target) &&  !empty($patientname))
    //if( !empty($vechicleno) && !empty($age)  && !empty($sex) && !empty($cp) && !empty($trestbps)&& !empty($chol)  && !empty($fasting)   && !empty($restecg) && !empty($thalach) && !empty($exang) && !empty($oldpeak) && !empty($slope) &&  !empty($ca) && !empty($thal) && !empty($target) &&  !empty($patientname))
    
    //{
    /*  echo $vechicleno; 
    echo  $patientname;
    echo $age;
    echo $sex;    
    echo $cp;
    echo $trestbps;
    echo $chol;
    echo $fasting;
    echo $restecg;
    echo $thalach;
    echo $exang;
    echo $oldpeak;
    echo $slope;
    echo $ca;
    echo $thal;
    echo $target;*/
        // Prepare an insert statement
        $sql = "INSERT INTO patientdetails (vechicleno, patientname, age, sex, cp, trestbps, chol, fbs, restecg, thalach, exang, oldpeak, slope, ca, thal, predict) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssssssssssssssss", $param_vechicleno , $param_patientname , $param_age , $param_sex , $param_cp , $param_trestbps , $param_chol , $param_fasting , $param_restecg , $param_thalach , $param_exang , $param_oldpeak , $param_slope , $param_ca , $param_thal , $param_target );
           
            // Set parameters
             $param_vechicleno = $vechicleno;
             $param_patientname = $patientname;
             $param_age = $age;
             $param_sex = $sex;
             $param_cp = $cp;
             $param_trestbps = $trestbps;
             $param_chol = $chol;
             $param_fasting = $fasting;
             $param_restecg = $restecg;
             $param_thalach = $thalach;
             $param_exang = $exang;
             $param_oldpeak = $oldpeak;
             $param_slope = $slope;
             $param_ca = $ca;
             $param_thal = $thal;
             $param_target = $target;
           
            //  ttempt to execute the prepared statement
           if(mysqli_stmt_execute($stmt))
                echo "<script> alert ('PREDICTION OF HEART ATTACK ".$target." INFORMATION IS SENT TO DOCTOR');</script>";
               
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    //}
   
    // Close connection
    mysqli_close($link);
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>patient details</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<body>
    <center>
    <div class="container">
    <h1>DETECTOR IN AMBULANCE</h1><br>
        <h2> welcome <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b></h2>
        <a href="logout.php" class="btn btn-danger">Sign Out</a><br><br>
                        <h3>PATIENT DETAILS</h3>
                    </div>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <h5>
                        <div class="form-group">
                        <label>Vechicle number</label>
                        <input type="text" name="vechicleno"><br>
                    </div>
                    <div class="form-group">
                        <label>Patient Name</label>
                        <input type="text" name="patientname"><br>
                    </div>
                    <div class="form-group">
                        <label>Age</label>
                        <input type="text" name="age"><br>
                    </div>
                    <div class="form-group">
                        <label>Sex</label>
                         <input type="text" name="sex"><br>
                    </div>
                    <div class="form-group">
                        <label>Chest Pain type</label>
                         <input type="text" name="cp"><br>
                    </div>
                    <div class="form-group">
                        <label>Resting bloodpressure</label>
                         <input type="text" name="trestbps"><br>
                    </div>
                    <div class="form-group">
                        <label>Serum Cholestrol</label>
                         <input type="text" name="chol"><br>
                    </div>
                    <div class="form-group">
                        <label>Fasting blood pressure > 120</label>
                         <input type="text" name="fasting"><br>
                    </div>
                    <div class="form-group">
                        <label>Resting Electrocardiographic results</label>
                         <input type="text" name="restecg"><br>
                    </div>
                    <div class="form-group">
                        <label>Maximum Heart rate achieved</label>
                         <input type="text" name="thalach"><br>
                    </div>
                    <div class="form-group">
                        <label>Exercise induced agina</label>
                         <input type="text" name="exang"><br>
                    </div>
                    <div class="form-group">
                        <label>ST depression induced by exercise relative to rest</label>
                         <input type="text" name="oldpeak"><br>
                    </div>
                    <div class="form-group">
                        <label>The slope of peak exercise ST segment</label>
                         <input type="text" name="slope"><br>
                    </div>
                    <div class="form-group">
                        <label>number of major vessels colored by flouroscopy</label>
                         <input type="text" name="ca"><br>
                    </div>
                    <div class="form-group">
                        <label>Defect</label>
                         <input type="text" name="thal"><br>
                    </div>
                     <input type="submit" class="btn btn-primary" value="Submit"><br>
                </form>
                 <label>Prediction of Heart Attack</label>
                         <p class="form-control-static"><b><?php echo $target; ?></b></p>
               </h5><
                </div>
            </div>        
        </div>
    </div>
</center>
</body>
</html>
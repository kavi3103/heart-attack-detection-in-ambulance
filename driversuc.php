<? php
session_start();

 require_once "config.php";

$vechicleno = $_SESSION["username"];

$doctor = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){

    if (isset($_POST['submit'])) {
        if(isset($_POST['doctor'])){
            $doctor= $_POST["doctor"];
        }
    }

    if (!empty($doctor)){

        $sql = "UPDATE doctor SET vechile = ? WHERE username = ?";

        if($stmt = mysqli_prepare($link1, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ss",$param_vechile ,$param_doctor);
            
            $param_vechile = $vechicleno;
            $param_doctor = $doctor;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                echo "<script>alert('selected doctor')</script>";
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($link1);

}
?>
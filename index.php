<?php


// Include config file
require_once "my_connect.php";
 
// Define variables and initialize with empty values
$name = $pin_number = "";
$name_err = $pin_number_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["name"]))){
        $name = "Please enter username.";
    } else{
        $name = trim($_POST["name"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["pin_number"]))){
        $pin_number_err = "Please enter your PIN.";
    } else{
        $pin_number = trim($_POST["pin_number"]);
    }
    
    // Validate credentials
    if(empty($name_err) && empty($pin_number_err)){
        // Prepare a select statement
        $sql = "SELECT name, pin_number FROM Member WHERE name = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_name);
            
            // Set parameters
            $param_name = $name;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $name, $hashed_pinnumber);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($pin_number, $hashed_pinnumber)){
                            // Password is correct, so start a new session
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["name"] = $name;                            
                            
                            // Redirect user to welcome page
                            header("location: Welcome.php");
                        } else{
                            // Display an error message if password is not valid
                            $password_err = "The password is incorrect.";
                        }
                    }
                } 
            } 

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Close connection
    mysqli_close($link);
}
?>



<!DOCTYPE html>
<html>
<head>
	   <title>Fitness Center</title>
	   <link rel="stylesheet" type="text/css" href="main.css">
</head>
<body>
   
    <div>
		<h1>My Fitness Center Pal</h1>
            <video autoplay muted loop id="background_video">
            <source src="background_video.mp4" type="video/mp4">
            </video>
		
		
		<p><b>Please Log-In using your Name & PIN Below:</b></p>
        <form action='#' method="POST" >
		  <div class="form_input">
    			<label for="username"><b>Username</b></label>
    			<input type="text" placeholder="Enter Username" name="username">
            </div>

            <div class="form_input">
    				<label for="password"><b>Password</b></label>
    				<input type="password" placeholder="Enter Password" name="password">
                    
            </div>
    		<br>
             <button><a href="Welcome.html" class="btn btn-info" role="button">Login</a></button>


    		<label><input type="checkbox" checked="checked" name="remember"> Remember me</label>
        </form>	
    </div>
</body>
</html>
<?php
session_start();
error_reporting(0);
// Connect to database
require_once"config.php";
if($_SERVER["REQUEST_METHOD"]=="POST"){
// Validate user login credentials
$username="";
$password="";
$username = $_POST["username"];
$password = $_POST["password"];

// Check if user is in users table
$query = "SELECT * FROM staff_tbl WHERE email='$username' AND mobile='$password'";
$result = mysqli_query($conn, $query);
$count=mysqli_num_rows($result); 
if ( mysqli_num_rows($result)== 1) {
    // User is valid
    $_SESSION['username']=$username;
    $_SESSION['password']=$password;
    $error="User login successful!";
   $_SESSION['message']=$error;
    header("Location: employee/empdash.php"); 
} 
else {
    // Check if user is in admins table
    $query = "SELECT * FROM admin WHERE email='$username' AND password='$password'";
    $result1 = mysqli_query($conn, $query);

    if (mysqli_num_rows($result1)==1) {
        // Admin is valid
        $_SESSION['username']=$username;
        $error="Admin login successful!";
        $_SESSION['message']=$error;
        header("Location:./admin/side.php");
    } else {
        // Invalid credentials
        
        $error="Invalid login credentials!";
    $_SESSION['message']=$error;
    header("location:login.php");
    }
}

}
// Close database connection
mysqli_close($conn)
?>
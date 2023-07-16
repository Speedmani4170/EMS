<?php
session_start();
if(!isset($_SESSION['username']))
{
  header("location:index.php");
}
?><?php
// Set up database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sm";
$conn = new mysqli($servername, $username, $password, $dbname);

// Check database connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Get updated employee data from form
$id = $_POST['id'];
$name = $_POST['depart_name'];
$sql = "UPDATE department_tbl SET department_name='$name' WHERE id='$id'";
if ($conn->query($sql) === TRUE) {
  echo "Employee details updated successfully.";
} else {
  echo "Error updating employee details: " . $conn->error;
}

// Close database connection
$conn->close();
?>
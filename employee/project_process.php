<?php
// Enable error reporting
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Include the database configuration file
include "config.php";

// Verify the database connection
if (!$conn) {
  die("Database connection failed: " . mysqli_connect_error());
}

// Check if the form was submitted
if (isset($_POST['action'])) {
  // Get the form data
  $action = $_POST['action'];
  $id = $_POST['id'];

  // Construct the SQL query
  if ($action == 'submitted') {
    $sql = "UPDATE project_tbl SET status = 'submitted' WHERE id = '$id'";
  } elseif ($action == 'reject') {
    $sql = "UPDATE project_tbl SET status = 'rejected' WHERE id = '$id'";
  }

  // Debug: print the SQL query
  var_dump($sql);

  // Execute the SQL query
  if (mysqli_query($conn, $sql)) {
    // Debug: print the success message
    echo "Record updated successfully";
  } else {
    // Debug: print the error message
    echo "Error updating record: " . mysqli_error($conn);
  }

  // Debug: print the form data
  var_dump($_POST);

  // Redirect back to the project_assign page
  header('Location: project_assign.php');
  exit();
}
?>

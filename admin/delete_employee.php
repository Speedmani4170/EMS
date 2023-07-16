<?php
session_start();
if(!isset($_SESSION['username']))
{
  header("location:index.php");
}
?>
<?php
// Connect to the database
$conn = mysqli_connect("localhost", "root", "", "sm");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if the ID parameter is passed
if (isset($_GET["id"])) {
    $id = $_GET["id"];
    
    // Query to delete the employee record
    $sql = "DELETE FROM staff_tbl WHERE id='$id'";
    
    // Execute the query
    if (mysqli_query($conn, $sql)) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
} else {
    echo "No ID parameter found";
}

// Close the database connection
mysqli_close($conn);
?>
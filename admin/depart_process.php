<?php
session_start();
if(!isset($_SESSION['username']))
{
  header("location:index.php");
}
?>
<?php
include"config.php";



// Retrieve the form data
$name = $_POST['depart_name'];
$sql = "INSERT INTO department_tbl(department_name)values('$name')";
if($conn->query($sql) === TRUE) {
    echo "Department Added successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>
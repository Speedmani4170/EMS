
<?php
session_start();
if(!isset($_SESSION['username']))
{
  header("location:index.php");
}
?>
<?php
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
$name = $_POST['name'];
$gender = $_POST['gender'];
$email = $_POST['email'];
$mobile = $_POST['mobile'];
$country = $_POST['country'];
$state = $_POST['state'];
$address = $_POST['address'];
$dob = $_POST['dob'];
$doj = $_POST['doj'];
$department = $_POST['department'];
$picture_path=$_POST['picture'];
if (isset($_FILES['picture'])) {
    $picture_name = $_FILES['picture']['name'];
    $picture_tmp_name = $_FILES['picture']['tmp_name'];
    $picture_type = $_FILES['picture']['type'];
    $picture_size = $_FILES['picture']['size'];

    // Check if the file is a valid image
    $valid_types = array('jpg', 'jpeg', 'png', 'gif');
    $file_extension = pathinfo($picture_name, PATHINFO_EXTENSION);
    if (!in_array($file_extension, $valid_types)) {
        echo "Error: Invalid file type. Only JPG, JPEG, PNG, and GIF images are allowed.";
        exit;
    }

    // Check if the file size is within the limit
    $max_size = 5000000; // 500 KB
    if ($picture_size > $max_size) {
        echo "Error: File size is too large. Maximum allowed size is 500 KB.";
        exit;
    }

    // Move the file to the uploads directory
    $uploads_dir = "../uploads/";
    $picture_path = $uploads_dir . $picture_name;
    move_uploaded_file($picture_tmp_name, $picture_path);
} else {
    $picture_path = "";
}


// Update employee data in database
$sql = "UPDATE staff_tbl SET name='$name', gender='$gender', email='$email', mobile='$mobile', country='$country', state='$state', address='$address', dob='$dob', doj='$doj', department='$department', picture='$picture_path' WHERE id='$id'";
if ($conn->query($sql) == TRUE) {
  echo "Employee details updated successfully.";
} else {
  echo "Error updating employee details: " . $conn->error;
}

// Close database connection
$conn->close();
?>
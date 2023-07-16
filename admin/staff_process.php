
<?php
session_start();
if(!isset($_SESSION['username']))
{
  header("location:index.php");
}
?><?php

// Retrieve the form data
$name = $_POST['name'];
$gender = $_POST['gender'];
$email = $_POST['email'];
$mobile = $_POST['mobile'];
$dob = $_POST['dob'];
$doj = $_POST['doj'];
$address = $_POST['address'];
$city = $_POST['city'];
$state = $_POST['state'];
$country = $_POST['country'];
$department = $_POST['department'];

// Process the picture file if it was uploaded
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

// Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sm";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Insert the data into the database
$sql = "INSERT INTO staff_tbl (name, gender, email, mobile, dob, doj, address, city, state, country, department, picture) 
        VALUES ('$name', '$gender', '$email', '$mobile', '$dob', '$doj', '$address', '$city', '$state', '$country', '$department', '$picture_path')";

if ($conn->query($sql) === TRUE) {
    echo "Data inserted successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>
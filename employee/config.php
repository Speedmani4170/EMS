<?php
$conn = mysqli_connect("localhost", "root", "", "sm");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
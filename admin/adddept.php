<?php
session_start();
if(!isset($_SESSION['username']))
{
  header("location:index.php");
}
?><!DOCTYPE html>
<html>
<head>
    <title>ADD DEPARTMENT</title>
    <link rel="stylesheet" type="text/css" href="formstyle.css">
</head>
<body>

    <center><h1>ADD DEPARTMENT</h1></center>

    <form method="post" action="depart_process.php" enctype="multipart/form-data">
        <label for="name">Name Of Department:</label>
        <input type="text" id="name" name="depart_name" required><br><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>
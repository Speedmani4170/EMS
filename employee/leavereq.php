<?php
session_start();
if(!isset($_SESSION['username']))
{
  header("location:index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Employee Leave Request</title>
    <style>body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
        }
        form {
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.3);
            padding: 20px;
            width: 400px;
            margin: 50px auto;
        }
        h2 {
            text-align: center;
            margin-top: 0;
        }
        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }
        input[type="text"],[type="email"],[type="tel"],textarea, select {
            padding: 8px;
            border-radius: 5px;
            width: 100%;
            margin-bottom: 10px;
            box-sizing: border-box;
            
        }
        input[type="email"]
        {
            padding: 8px;
            border-radius: 5px;
            width: 100%;
            margin-bottom: 10px;
            box-sizing: border-box;

        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            align-content: center;
        }
        input[type="submit"]:hover {
            background-color: #3e8e41;
        }
        table{
            
        }
        td,th{
            padding:10px;
            margin: 10px;
        }
    </style>
</head>
<body>
    <h1 align="center">Employee Leave Request</h1>
    <?php if (isset($message)) { ?>
        <p><?php echo $message; ?></p>
    <?php } ?>
    <?php if (isset($error)) { ?>
        <p><?php echo $error; ?></p>
    <?php } ?>
    <form method="POST">
        <label>Reason:</label><br>
        <input type="text" name="reason"><br>
        <label>Start Date:</label><br>
        <input type="date" name="start_date"><br>
        <label>End Date:</label><br>
        <input type="date" name="end_date"><br>
        <br>
        <input type="submit" name="submit" value="Submit">
    </form>
</body>
</html>
<?php

// Check if user is logged in
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}
include"../config.php";

$username=$_SESSION['username'];
    $password=$_SESSION['password'];

// Get employee details
$sql = "SELECT * FROM staff_tbl WHERE email='$username' AND mobile='$password'";
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result)>0){
$row = mysqli_fetch_assoc($result);


// Handle form submission
if (isset($_POST['submit'])) {
    $reason = mysqli_real_escape_string($conn, $_POST['reason']);
    $start_date = mysqli_real_escape_string($conn, $_POST['start_date']);
    $end_date = mysqli_real_escape_string($conn, $_POST['end_date']);
    $request_date=date('Y-m-d');
    $status = "Pending";
    
    // Insert leave request into database
    $sql = "INSERT INTO leave_tbl (staff_id, reason, start_date, end_date, status,request_date) 
            VALUES ('".$row['id']."', '".$reason."', '".$start_date."', '".$end_date."', '".$status."','".$request_date."')";
    if (mysqli_query($conn, $sql)) {
        $message = "Leave request submitted successfully.";
    } else {
        $error = "Error submitting leave request: " . mysqli_error($conn);
    }
}
}else{
    echo"Nothing fetch";
}

// Close database connection
mysqli_close($conn);
?>


<?php
// Connect to the database
$conn = mysqli_connect("localhost", "root", "", "sm");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Retrieve user input
$username = $_POST['username'];
$password = $_POST['password'];


// Query the database
$sql = "SELECT * FROM users WHERE email='$username'";
$result = mysqli_query($conn, $sql);

// Check if username exists
if (mysqli_num_rows($result) == 0) {
    echo "Invalid username or password";
} else {
    // Retrieve hashed password from database
    $row = mysqli_fetch_assoc($result);
    $hashed_password = $row['password'];

    // Verify password
    if (password_verify($password, $hashed_password)) {
        // Start session and store user information
        session_start();
        $_SESSION['username'] = $username;
        $_SESSION['user_id'] = $row['id'];

        // Redirect to desired page
        header("Location: home.php");
    } else {
        echo "Invalid username or password";
    }
}

// Close database connection
mysqli_close($conn);
?>
<!DOCTYPE html>
<html>
<head>
  <title>Login Page</title>
  <link rel="stylesheet" type="text/css" href="main.css">
</head>
<body>
  <h1>Login Page</h1>

  <?php if (isset($error)): ?>
    <p><?php echo $error; ?></p>
  <?php endif; ?>

  
        <form method="post" >
            <table cellspadding="10" cellspacing="1" width="500" align="center" class="tblogin">
<tr><th colspan="2" align ="center">LOGIN</th></tr>
<tr><td>Username</td><td><input type="text" name="username"></td></tr>

<tr><td>Password</td><td><input type="password" name="password"></td></tr>
<tr><td  colspan="2"class="message">
    
    
</td></tr>
<tr><td colspan=2><input type="submit" value="submit" name="submit"></td></tr>

            </table></form>
</body>
    </html>

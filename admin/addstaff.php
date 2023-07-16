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
    <title>Data Entry Page</title>
    <link rel="stylesheet" type="text/css" href="formstyle.css">
</head>
<body>

    <center><h1>ADD EMPLOYEE</h1></center>

    <form method="post" action="staff_process.php" enctype="multipart/form-data">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br><br>

        <label for="gender">Gender:</label>
        <input type="radio" id="male" name="gender" value="male" required>
        <label for="male">Male</label>
        <input type="radio" id="female" name="gender" value="female" required>
        <label for="female">Female</label><br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>

        <label for="mobile">Mobile Number:</label>
        <input type="tel" id="mobile" name="mobile" required><br><br>

        <label for="dob">Date of Birth:</label>
        <input type="date" id="dob" name="dob" required><br><br>

        <label for="doj">Date of Join:</label>
        <input type="date" id="doj" name="doj" required><br><br>

        <label for="address">Address:</label>
        <textarea id="address" name="address" required></textarea><br><br>

        <label for="city">City:</label>
        <input type="text" id="city" name="city" required><br><br>

        <label for="state">State:</label>
        <input type="text" id="state" name="state" required><br><br>

        <label for="country">Country:</label>
        <?php
include"config.php";
$sql = "SELECT * FROM country_tbl";
$result = $conn->query($sql);
echo"<select name='country'>";
       
            
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    echo "<option value='" . $row["id"] . "'>" . $row["country_name"] . "</option>";
  }
}

            
        echo"</select>";


        ?><br><br>

        
        <label for="department">Department:</label>
        <?php
include"config.php";
$sql = "SELECT * FROM department_tbl";
$result = $conn->query($sql);
echo"<select name='department'>";
       
            
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    echo "<option value='" . $row["id"] . "'>" . $row["department_name"] . "</option>";
  }
}

            
        echo"</select>";


        ?>
        <br><br>

        <label for="picture">Picture:</label>
        <input type="file" id="picture" name="picture"/><br><br>

        <input type="submit" value="Submit">
    </form>

</body>
</html>
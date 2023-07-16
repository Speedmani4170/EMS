<?php
session_start();
if(!isset($_SESSION['username']))
{
  header("location:index.php");
}
?>
<html>
<head>
  <title>Add Salary for Employees</title>
  <link rel="stylesheet" type="text/css" href="formstyle.css">
<link rel="stylesheet" type="text/css" href="table.css">

</head>
<body>
  <form method="post">
    <label for="department">Select Department:</label>
    <select name="department" id="department">
      <option value="">--Select Department--</option>
      <?php
      error_reporting(0);
       include'config.php';

      // Retrieve list of departments from the database
      $sql = "SELECT * FROM department_tbl";
      $result = mysqli_query($conn, $sql);

      // Loop through the result set and display each department as an option in the select dropdown
      while($row = mysqli_fetch_assoc($result)) {
        echo "<option value='" . $row['id'] . "'>" . $row['department_name'] . "</option>";
      }

      // Close database connection
      mysqli_close($conn);
      ?>
    </select><br><br>

    <input type="submit" name="submit" value="Show Employees">
  </form>
<?php

// Connect to the database
if(isset($_POST['submit'])){
$conn = mysqli_connect("localhost", "root", "", "sm");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$department_id = $_POST['department'];


// Query to retrieve all data from the employee_detail table
 $sql = "SELECT s.id, s.name,sal.salary_amount,sal.update_by,d.department_name
            FROM staff_tbl s
            JOIN department_tbl d ON s.department= d.id
            JOIN salary_tbl  sal ON s.id = sal.staff_id
            WHERE d.id=$department_id ";

// Execute the query
$result = mysqli_query($conn, $sql);

// Check if any data exists in the table
if (mysqli_num_rows($result) > 0) {
    // Display the data in a table
    echo"<div class='tab_container'>";
    echo "<table>";
    echo "<tr>
    <th>ID</th>
    <th>Name</th>
    <th>Name Of Department</th>
    <th>Amount </th>
    <th>Date</th>
    </tr>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
        <td>".$row["id"]."</td>
        <td>".$row["name"]."</td>
        <td>".$row["department_name"]."</td>
        <td>".$row["salary_amount"]."</td>
        <td>".$row["update_by"]."</td>
</tr>";
}
echo "</table>";
echo"</div>";

}else {
    echo "No data found";
    }
}
mysqli_close($conn);
?>
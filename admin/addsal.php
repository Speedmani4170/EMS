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
</head>
<body>
  <form method="post">
    <label for="department">Select Department:</label>
    <select name="department" id="department">
      <option value="">--Select Department--</option>
      <?php
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
    
  if(isset($_POST['submit'])){
      include'config.php';

    // Retrieve the selected department from the form
    $department_id = $_POST['department'];

    // Retrieve the list of employees under the selected department from the database
    $sql = "SELECT * FROM staff_tbl WHERE department = $department_id";
    $result = mysqli_query($conn, $sql);

    // Display a form to add salary for each employee in the list
    echo "<form method='post'>";
      echo"<table border='1'>";
        echo"<tr>";
          echo"<th colspan='2'>ADD SALARY</th>";
        echo"</tr>";
        
        echo"<tr>";
          echo"<th>Name of the employee</th>";
          echo"<th>Salary</th>";
        echo"</tr>";
    while($row = mysqli_fetch_assoc($result)) {
      echo"<tr>";

      echo "<td><label for='employee_" . $row['id'] . "'>" . $row['name'] . ":</label></td>";
      echo "<td><input type='text' name='salary[" . $row['id'] . "]' id='employee_" . $row['id'] . "'></td><br>";
    echo"</tr>";
    }
    echo"<tr>";
    echo "<td colspan='2'><input type='submit' name='submit_salary' value='Add Salary'></td>";
   echo"</tr>";
 echo"</table>";
    echo "</form>";

    // Close database connection
    mysqli_close($conn);
  }
?>
  <?php

  if(isset($_POST['submit_salary'])){
    //   Connect to the database
    include'config.php';
    // Retrieve the salary data for each employee from the form
    $salary_data = $_POST['salary'];
  $date=date('Y-m-d');
    // Loop through the salary data and insert it into the salary table
    foreach($salary_data as $employee_id => $salary){
      $sql = "INSERT INTO salary_tbl (staff_id, salary_amount,update_by) VALUES ('$employee_id',' $salary','$date')";
      mysqli_query($conn, $sql);
    }

    // Close database connection
    mysqli_close($conn);

    echo "Salary added successfully!";
  }
  ?>
</body>
</html>
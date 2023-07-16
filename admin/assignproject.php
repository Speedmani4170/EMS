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


      ?>
    </select><br><br>

    <input type="submit" name="submit" value="Show Employees">
  </form>

  <?php
   
  if(isset($_POST['submit'])){
      

    // Retrieve the selected department from the form
    $department_id = $_POST['department'];
// Retrieve list of departments from the database
      $sql = "SELECT s.*,s.id as s_id ,d.* FROM staff_tbl s join department_tbl d on d.id=s.department
      where s.department='$department_id'";
      $result = mysqli_query($conn, $sql);

    // Retrieve the list of employees under the selected department from the database
    
    // Display a form to add salary for each employee in the list
    echo "<form method='post'>";
      echo"<table border='3'>";
        echo"<tr>";
          echo"<th colspan='3'>ASSIGN A PROJECT</th>";
        echo"</tr>";
        
        echo"<tr>";
          echo"<th>Name of the employee</th>";
          echo"<th>PROJECT NAME</th>";
          echo"<th>Dead line of a project</th>";
        echo"</tr>";
    
      echo"<tr>";

      echo "<td>";
      echo"<label for='staff_id'>Select Employee:</label>";
    echo"<select name='staff_id' required/>";
      echo"<option>--Select employee--</option>";


      while($row = mysqli_fetch_assoc($result)) {
        echo "<option value='" . $row['s_id'] . "'>" . $row['name'] . "</option>";
      }
    echo"</select><br><br>
</td>";
      echo "<td><input type='text' name='project_name' required/></td><br>
    <td><input type='date' name='lastdate' required/></td></tr>";
    echo"<tr>";
    echo "<td colspan='2'><input type='submit' name='submit_project' value='Assign project'></td>";
   echo"</tr>";
 echo"</table>";
    echo "</form>";
  }
?>
  <?php

  if(isset($_POST['submit_project'])){
    include'config.php';
    $staff_id=$_POST['staff_id'];
    $project = $_POST['project_name'];
    $lastdate=$_POST['lastdate'];
    $status="pending";
  $date=date('Y-m-d');
      $sql = "INSERT INTO project_tbl(staff_id, project_name,last_date,added_on ,status) VALUES ('$staff_id',' $project','$lastdate','$date','$status')";
     $result1= mysqli_query($conn,$sql);
    

  if($result1){

    echo "Project Assigned Successfully!";
  }
  else{
    echo"error occured:".$conn->error;
  }
}
?>
</html>  
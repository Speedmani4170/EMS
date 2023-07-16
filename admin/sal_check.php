<?php
session_start();
if(!isset($_SESSION['username']))
{
  header("location:index.php");
}
?>
<head>
    <style type="text/css">
        body{
             background:#fff;

        }
        table {
  border-collapse: collapse;
  border-spacing: 0;
  width: 120%;
  border: 2px solid;
}

th, td {
  text-align: center;
  padding: 5px;
}

th {
    align-content: center;
  background-color: #f2f2f2;
}

tr:nth-child(even) {
  background-color: #f2f2f2;
  border: 2px solid;
}
a{
font-size: 20px;
text-decoration: none;

color: white;
}
.edit{
background-color: blue;
color: white;
padding: 5px;
margin: 5px;
border-radius: 15px;
text-align: center;
}
.delete{
    background-color: red;
color:white;
border-radius: 15px;
padding: 5px;
}
h1{
  text-align: center;
  align-content: center;
}

    </style>


</head>
<?php
include'config.php';
// Retrieve department ID from POST request
$department_id = $_POST['department'];

// Query employee table to get employees in selected department
$query = "SELECT * FROM staff_tbl WHERE department = $department_id";
$result = mysqli_query($conn, $query);
$count=mysqli_num_rows($result);
// Display list of employees with current salary, allowance, and input fields for new allowance and total
echo'<h1>Number of employees in the selected department</h1>';
echo '<table>';
echo'<tr>';
echo'<th>Name of employee</th>';
echo'<th>salary</th>';
echo'<th>allowance</th>';
echo'<th>Total</th>';
echo'</tr>';
while ($row = mysqli_fetch_assoc($result)) {
  if($count>0){
  echo '<tr>';
  echo '<td>' . $row['name'] . '</td>';
  echo '<td><input type="number" name="salary"</td>';
  echo '<td><input type="number" name="allowance"></td>';
  echo '<td><input type="number" name="total" value="<?php echo isset($_POST["submit"]) ? $_POST["salary"]+$_POST["allowance"];?>"</td>';
  echo'</tr>';
}
else{
  echo'<tr>';
  echo'<td colspan=4>Employee not founded</td>';
echo'</tr>';  
}
}
echo'<tr><td><input type="submit" name="submit" value="submit"</td></tr>';
echo '</table>';

// Update salary in salary table when admin submits form
if (isset($_POST['allowance']) && isset($_POST['total'])) {
  $salary=$_POST['salary'];
  $allowance = $_POST['allowance'];
  $total = $_POST['total'];
  // Loop through each employee and update their salary in the salary table
  while ($row = mysqli_fetch_assoc($result)) {
    $employee_id = $row['id'];
    $query = "INSERT INTO salary_tbl (employee_id, amount, allowance, total) VALUES ($employee_id, $salary, $allowance, $total)";
    mysqli_query($conn, $query);
  }
}
?>
<script type="text/javascript">
  function

</script>
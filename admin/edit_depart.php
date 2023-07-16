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
            background-color: white;
            align-content: center;
        }
        table { 
          border-radius: 30px;
          font-size: 20px;
          font-family: "arial",sans-serif;
          margin-left: 100px;
          border-spacing: 0;
          width: 80%;
          border: 2px solid;
}

th, td {
  text-align: center;
  padding: 18px;
}

th {
  background-color: #f2f2f2;
}

tr:nth-child() {
  background-color: #f2f2f2;
  border: 2px solid;
}  
input[type='submit']{
  font-size: 15px;
  width:50%;
  border-radius: 30px;
}  
</style>
</head>
<?php
error_reporting(0);
// Set up database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sm";
$conn = new mysqli($servername, $username, $password, $dbname);

// Check database connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Retrieve employee data from database based on ID
$id = $_GET['id'];
$sql = "SELECT * FROM department_tbl WHERE id='$id'";
$result = mysqli_query($conn, $sql);
 $count=mysqli_num_rows($result);
// Display form to edit employee data
if ($result>0) {
  $row = $result->fetch_assoc();
  echo "<h2 align='center'>Edit Department Details</h2>";
  echo "<form action='edit_depart_check.php' method='POST'><table>";
  echo "<input type='hidden' name='id' value='" . $row["id"] . "'>";
  echo "<tr><td>Name of Department: </td><td><input type='text' name='depart_name' value='" . $row["department_name"] . "'></td></tr><br>";
  echo "<tr><td colspan='2' class='savebutton'><input type='submit' value='Save'></td></tr>";
  echo "</form></table>";
} else {
  echo "Employee not found.";
}

// Close database connection
$conn->close();
?>
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
            width: 100%;
            margin: 20px 0;
            font-size: 1em;
            min-width: 300px;
            border-radius: 5px 5px 0 0;
            overflow: hidden;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
        }
        table thead tr {
            background-color: #009879;
            color: #ffffff;
            text-align: left;
            font-weight: bold;
        }
        table th,
        table td {
            padding: 12px 15px;
        }
        table tbody tr {
            border-bottom: 1px solid #dddddd;
        }
        table tbody tr:last-of-type {
            border-bottom: 2px solid #009879;
        }
        table tbody tr:nth-of-type(even) {
            background-color: #f3f3f3;
        }
        table tbody tr:last-of-type {
            border-bottom: 2px solid #009879;
        }
        a{
    text-decoration: none;
    color: white;
    padding: 5px;
    border-radius: 20px;
}
    .edit{
        background-color:blue ;
        padding: 5px;
        border-radius: 20px;
        margin: 10px;
    
    }
    .delete{
        background-color: red;
        padding: 5px;
        border-radius: 20px;
        margin-left:10px ;
    }
    </style>
    <link rel="stylesheet" type="text/css" href="formstyle.css">

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
if(isset($_POST['submit'])){
// Connect to the database
include"config.php";
$department_id=$_POST['department'];

// Query to retrieve all data from the employee_detail table
$sql = "SELECT s.* ,d.*,c.* ,S.id as s_id FROM staff_tbl s JOIN
department_tbl d ON d.id=s.department
JOIN country_tbl c ON c.id=s.country
where s.department='$department_id'";

// Execute the query
$result = mysqli_query($conn, $sql);

// Check if any data exists in the table
if (mysqli_num_rows($result) > 0) {
    // Display the data in a table
    echo "<table>";
    echo "<tr>
    <th>ID</th>
    <th>Name</th>
    <th>gender</th>
    <th>Email</th>
    <th>Mobile</th>
    <th>Date Of Birth</th>
    <th>Date Of Join</th>
    <th>Address</th>
    <th>City</th>
    <th>State</th>
    <th>Country</th>
    <th>Department</th>
    <th>Picture</th>
    <th colspan='3'>Action</th>
    </tr>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
        <td>".$row["s_id"]."</td>
        <td>".$row["name"]."</td>
        <td>".$row["gender"]."</td>
        <td>".$row["email"]."</td>
        <td>".$row["mobile"]."</td>
        <td>".$row["dob"]."</td>
        <td>".$row["doj"]."</td>
        <td>".$row["address"]."</td>
        
        <td>".$row["city"]."</td>
        <td>".$row["state"]."</td>
        <td>".$row["country_name"]."</td>
        <td>".$row["department_name"]."</td>
        <td><img src='".$row["picture"]."'width='50' height='50'</td>
        ";
        echo "<td colspan='3'><span class='edit'><a href='edit_employee.php?id=".$row["s_id"]."'>Edit</a> </span><br>|<br> <span class='delete'><a href='delete_employee.php?id=".$row["s_id"]."'>Delete</a></span></td></tr>";
    }
    echo "</table>";
} else {
    echo "No data found";
}
}
   
// Close the database connection
mysqli_close($conn);
?>
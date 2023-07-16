<?php
session_start();
if(!isset($_SESSION['username']))
{
  header("location:index.php");
}
?>
<head>
    <style type="text/css">
        h1{
            text-align: CENTER;
            align-content: center;
        }
        body{
            background-color: white;
        }
        table {
  border-collapse: collapse;
  border-spacing: 0;
  width: 80%;
  border: 2px solid;
  margin-left: 100px;
}

th, td {
  text-align: left;
  padding: 8px;
}

th {
  background-color: #f2f2f2;
}

tr:nth-child(even) {
  background-color: #f2f2f2;
  border: 2px solid;
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
    }
    .delete{
        background-color: red;
        padding: 5px;
        border-radius: 20px;
    }
    </style>

</head>
<?php
include"config.php";
$sql = "SELECT * FROM department_tbl";

// Execute the query
$result = mysqli_query($conn, $sql);

// Check if any data exists in the table
if (mysqli_num_rows($result) > 0) {
    // Display the data in a table
    echo"<h1>MANAGE DEPARTMENT</h1>";
    echo "<table>";
    echo "<tr>
    <th>ID</th>
    <th>Name of Department</th>
    <th> Action</th>
    </tr>";
       while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
        <td>".$row["id"]."</td>
        <td>".$row["department_name"]."</td>";
        echo "<td><span class='edit'><a href='edit_depart.php?id=".$row["id"]."'>Edit</a></span> |<span class='delete'> <a href='delete_depart.php?id=".$row["id"]."'>Delete</a></span></td>
        </tr>";
    }
    echo "</table>";
} else {
    echo "No data found";
}

// Close the database connection
mysqli_close($conn);
?>
    
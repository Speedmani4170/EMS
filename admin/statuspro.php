<head>
    <link rel="stylesheet" type="text/css" href="table.css">
</head>
<?php
// Connect to the database
include"config.php";

// Query to retrieve all data from the employee_detail table
$sql = "SELECT s.* ,p.* FROM staff_tbl s JOIN  
project_tbl p on p.staff_id=s.id";
// Execute the query
$result = mysqli_query($conn, $sql);

// Check if any data exists in the table
if (mysqli_num_rows($result) > 0) {
    // Display the data in a table
    echo"<h1 align='center'>PROJECT DETAILS</h1>";
    echo "<table>";
    echo "<tr>
    <th>ID</th>
    <th>Name</th>
    <th>ProjectName</th>
    <th>Assigned date</th>
    <th>Deadline of the project</th>
    <th>Status</th>
    </tr>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
        <td>".$row["id"]."</td>
        <td>".$row["name"]."</td>
        <td>".$row["project_name"]."</td>
        <td>".$row["added_on"]."</td>
        <td>".$row["last_date"]."</td>
        <td>".$row["status"]."</td>
        </tr>";
    }
    echo "</table>";
} else {
    echo "No data found";
}

   
// Close the database connection
mysqli_close($conn);
?>
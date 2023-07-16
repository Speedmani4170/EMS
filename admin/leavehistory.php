<?php
session_start();
if(!isset($_SESSION['username']))
{
  header("location:index.php");
}
?>
<head>
    <link rel="stylesheet" type="text/css" href="table.css">
</head>


<?php
// Connect to the database
$conn = mysqli_connect("localhost", "root", "", "sm");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Query to retrieve all data from the employee_detail table
$sql = "SELECT l.*,s.* FROM leave_tbl l
JOIN staff_tbl s ON s.id=l.staff_id;";

// Execute the query
$result = mysqli_query($conn, $sql);


// Check if any data exists in the table
if (mysqli_num_rows($result) > 0) {
    // Display the data in a table
    echo"<h1 align='center'>Leave History</h1>";
    echo "<table>";
    echo "<tr>
    <th>Name</th>
    <th>Reason</th>
    <th>StartDate</th>
    <th>EndDate</th>
    <th>totalleave</th>
    <th>request</th>
    <th>Status</th>
    </tr>";
    $totalleave=0;
while($row=mysqli_fetch_assoc($result)){
$s=strtotime($row['start_date']);
$e=strtotime($row['end_date']);
$totalleave+=ceil(abs($e-$s)/86400)+1;


echo"<tr>";
echo"<td>".$row['name']."</td>";
echo"<td>".$row['reason']."</td>";
echo"<td>".$row['start_date']."</td>";
echo"<td>".$row['end_date']."</td>";
echo"<td>".$totalleave."</td>";
echo"<td>".$row['request_date']."</td>";
echo"<td>".$row['status']."</td>";
echo"</tr>";

}
echo"</table>";
}
else{
    echo"<h4>NO DATA FOUND</h4>";
}
mysqli_close($conn);
?>
<?php
session_start();
if(!isset($_SESSION['username']))
{
  header("location:index.php");
}
?><!DOCTYPE html>
<html>
<head>
	<title>Leave Requests</title>
	<style>
		table {
			font-size: 21px;
  border-collapse: collapse;
  width: 100%;
}

th, td {
  text-align: left;
  padding: 8px;
  border: 1px solid #ddd;
}

th {
  background-color: #f2f2f2;
  color: #444;
}

tr:nth-child(even) {
  background-color: #f2f2f2;
}

tr:hover {
  background-color: #ddd;
}

.approve-btn, .reject-btn {
  padding: 5px 10px;
  border: none;
  border-radius: 5px;
  cursor: pointer;
}
input[type='submit']{
	padding: 10px;
	margin: 10px;
	font-size: 15px;
}

.approve-btn {
  background-color: green;
  color: white;
}

.reject-btn {
  background-color: red;
  color: white;
}

h4{
	color:blue;
	font-size:20px;
	font-family: cursive;
}

	</style>
</head>
<body>
	<h1 align="center">Leave Requests</h1>
	<?php
	include"config.php";
$sqlpend="SELECT l.*,s.*,l.id as lid FROM leave_tbl l
	 JOIN staff_tbl s ON s.id=l.staff_id
	 WHERE l.status='Pending'";
$resultpend=mysqli_query($conn, $sqlpend);
$count=mysqli_num_rows($resultpend);
if($count>0){
	echo "<table>";
	echo "<tr><th>ID</th><th>Employee Name</th><th>Start Date</th><th>End Date</th><th>Totalleave</th><th>Reason</th><th>Status</th><th>Action</th></tr>";
	$totalleave=0;
	while ($row = mysqli_fetch_assoc($resultpend)) {
		$s=strtotime($row['start_date']);
$e=strtotime($row['end_date']);
$totalleave+=ceil(abs($e-$s)/86400)+1;

	  echo "<tr>";
	  echo "<td>" . $row['id'] . "</td>";
	  echo "<td>" . $row['name'] . "</td>";
	  echo "<td>" . $row['start_date'] . "</td>";
	  echo "<td>" . $row['end_date'] . "</td>";
	  echo"<td>".$totalleave."</td>";
	  echo "<td>" . $row['reason'] . "</td>";
	  echo "<td>" . $row['status'] . "</td>";
	  echo "<td>";
	  if ($row['status'] == 'Pending') {
	    echo "<form method='post' action='leave_process.php'>";
	    echo "<input type='hidden' name='id' value='" . $row['lid'] . "'>";
	    echo "<input type='submit' name='action' value='approve' class='approve-btn'>";
	    echo "<input type='submit' name='action' value='reject' class='reject-btn'>";
	    echo "</form>";
	  }
	  echo "</td>";
	  echo "</tr>";
	}
	echo "</table>";
}
else{
	echo"<h4 align='center' >NO LEAVE REQUEST</h4>";
	}

	?>

</body>
</html>
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
	<h1 align="center">ASSIGNED A PROJECT FOR YOU</h1>
	<?php
	include"../config.php";
$username=$_SESSION['username'];
    $password=$_SESSION['password'];	
$sqlpend="SELECT s.*,p.*,p.id as pro_id,s.id as s_id FROM project_tbl p
	 JOIN staff_tbl s ON s.id=p.staff_id
	 WHERE p.status='pending' and s.email='$username' and s.mobile='$password'";
$resultpend=mysqli_query($conn, $sqlpend);
$count=mysqli_num_rows($resultpend);
if($count>0){
	echo "<table>";
	echo "<tr><th>ID</th><th>Employee Name</th><th>Reason</th><th>Assigned Date</th><th>End Date</th><th>Status</th><th>Action</th></tr>";
	while ($row = mysqli_fetch_assoc($resultpend)) {
	  echo "<tr>";
	  echo "<td>" . $row['s_id'] . "</td>";
	  echo "<td>" . $row['name'] . "</td>";
	  echo "<td>" . $row['project_name'] . "</td>";
	  echo "<td>" . $row['added_on'] . "</td>";
	  echo"<td>".$row['last_date']."</td>";
	  echo "<td>" . $row['status'] . "</td>";
	  echo "<td>";
	  if ($row['status'] == 'pending') {
	    echo "<form method='POST' action='project_process.php'>";
	    echo "<input type='hidden' name='id' value='" . $row['pro_id'] . "'>";
	    echo "<input type='submit' name='action' value='submitted' class='approve-btn'>";
	    echo "<input type='submit' name='action' value='reject' class='reject-btn'>";
	    echo "</form>";
	  }
	  echo "</td>";
	  echo "</tr>";
	}
	
	echo "</table>";
}
else{
	echo"<h4 align='center' >NO project Assigned</h4>";
	}

	?>

</body>
</html>
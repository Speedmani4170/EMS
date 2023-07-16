<?php
session_start();
if(!isset($_SESSION['username']))
{
  header("location:index.php");
}
?>
<?php
// Connect to database
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'sm';
$conn = mysqli_connect($host, $username, $password, $dbname);

// Check connection
if (!$conn) {
  die('Connection failed: ' . mysqli_connect_error());
}

// Execute queries to retrieve data
$sqlEmployees = "SELECT COUNT(*) as totalEmployees FROM staff_tbl";
$resultEmployees = mysqli_query($conn, $sqlEmployees);

$sqlDepartments = "SELECT COUNT(*) as totalDepartments FROM department_tbl";
$resultDepartments = mysqli_query($conn, $sqlDepartments);

$sqlSalary = "SELECT SUM(salary_amount) as totalSalary FROM salary_tbl";
$resultSalary = mysqli_query($conn, $sqlSalary);

$sqlLeave = "SELECT COUNT(*) as totalLeave FROM leave_tbl WHERE status='Pending'";
$resultLeave = mysqli_query($conn, $sqlLeave);
 
 $sqlproject="SELECT COUNT(*) as totalproject FROM project_tbl";
 $resultproject=mysqli_query($conn,$sqlproject);

// Get data from results and assign to variables
if ($resultEmployees) {
  $rowEmployees = mysqli_fetch_assoc($resultEmployees);
  $totalEmployees = $rowEmployees['totalEmployees'];
} else {
  $totalEmployees = 0;
}

if ($resultDepartments) {
  $rowDepartments = mysqli_fetch_assoc($resultDepartments);
  $totalDepartments = $rowDepartments['totalDepartments'];
} else {
  $totalDepartments = 0;
}

if ($resultSalary) {
  $rowSalary = mysqli_fetch_assoc($resultSalary);
  $totalSalary = '$' . number_format($rowSalary['totalSalary'], 2);
} else {
  $totalSalary = '$0.00';
}

if ($resultLeave) {
  $rowLeave = mysqli_fetch_assoc($resultLeave);
  $totalLeave = $rowLeave['totalLeave'];
} else {
  $totalLeave = 0;
}
if($resultproject){
	$rowproject=mysqli_fetch_assoc($resultproject);
	$totalproject=$rowproject['totalproject'];
}
else{
	$totalproject=0;
}
// Close connection
mysqli_close($conn);
?><!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link rel="stylesheet" type="text/css" href="style1.css">
	<script src="https://kit.fontawesome.com/acfc948f76.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="../some/all.css">
	<link rel="stylesheet" type="text/css" href="../some/solid.css">
</head>
<body>
	<div class="container">

<div class="box">
	<h2>Leave status</h2>
<span><i class="fa-solid fa-pen-to-square"></i></span>
	<p class="data"><?php echo $totalLeave; ?></p>
	<div class="more"><a href="viewleavereq.php" target="mainframe">MORE INFO</a></div>
</div>
<div class="box">
	<h2>Finished project</h2>
<span><i class="fa-solid fa-pen-to-square"></i></span>
	<p class="data"><?php echo $totalproject; ?></p>
	<div class="more"><a href="projectstatus.php" target="mainframe">MORE INFO</a></div>
</div>
<div class="box">
	<h2>Assign project</h2>
<span><i class="fa-solid fa-pen-to-square"></i></span>
	<p class="data">1</p>
	<div class="more"><a href="projectstatus.php" target="mainframe">MORE INFO</a></div>
</div>
	</div>
</body>
</html>
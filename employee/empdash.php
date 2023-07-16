
<?php
session_start();
if(!isset($_SESSION['username']))
{
  header("location:login.php");
}
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>EMPLOYEE DASHBOARD</title>
<link type="text/css" rel="stylesheet" href="style1.css">
<script src="https://kit.fontawesome.com/acfc948f76.js" crossorigin="anonymous"></script>

</head>
<body>
	<?php
	include'navside.php';
	?>
	<div class="main">
 <iframe src="main.php" height="100%" width="60%" align="right"title="main" name="mainframe" id="imain"></iframe>
</div>

</body>
</html>
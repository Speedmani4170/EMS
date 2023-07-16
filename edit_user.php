<?php
$conn=mysqli_connect("localhost","root","","mani");
if(count($_POST)>0)
{
	$sql="UPDATE users SET employeename='".$_POST['employeename']."',designation='".$_POST['designation']."',mobileno='".$_POST['mobileno']."',sal='".$_POST['sal']."' WHERE userid='".$_POST['userid']."'";
	mysqli_query($conn,$sql);
	$message="Employee details Sucessfully Updated";
}
$select_query="SELECT * FROM users WHERE userid='".$_GET["userid"]."'";
$result=mysqli_query($conn,$select_query);
$row=mysqli_fetch_array($result);
?>
<html>
<head>
<title>
	
</title>
<style type="text/css">
	



body{
		background: linear-gradient(to top right,#000066 0%,#ff0066 100%);
		font-family: timesnewroman;
 		color: white;
		}

		input[type=submit]
		{
			padding: 10px 20px;
			background: 302005d;
			border:#dle8ff 1px solid;
			border-radius: 50px;
			cursor: pointer;
		}






</style>
</head>
<body>

<form method="post">
	<br><br><br>
	<table border="10" cellpadding="10" width="500" align="center" bordercolor="#660033">
		<td colspan="5",align="center" style="font-size:20px;background-color: #665b95";color="white";
		font-weight="bold">
	EDIT EMPLOYEE DETAILS</td>
	<tr>
		<td>USERID</td>
		<td><input type="text"name="userid" value="<?php echo $row['userid'];?>"></td>
		<td>EMPLOYEE NAME</td>
		<td><input type="text" name="employeename" value="<?php echo $row['employeename'];?>"></td>
</tr>	

<tr>
		<td>DESIGNATION</td>
		<td><input type="text"name="designation" value="<?php echo $row['designation'];?>"></td>
		<td>MOBILE NUMBER</td>
		<td><input type="text" name="mobileno" value="<?php echo $row['mobileno'];?>"></td>
</tr>	
<tr>
		<td>SALARY</td>
		<td><input type="text"name="sal" value="<?php echo $row['sal'];?>"></td>
		
</tr>	
<tr align="center"><td colspan="2">
	<input type="submit" value="Update"></td></tr>
</table>
<br>
<center>
	<div class="message"><?php if(isset($message))
	{
		echo $message;
	}
?>
</div>
<br>
<input type="submit" value="Show updated values" formaction="indexm.php">
</center>
</form>




</body>



</html>



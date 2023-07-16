<?php
session_start();
if(!isset($_SESSION['username']))
{
  header("location:index.php");
}
?><head>
  <title>Add Salary for Employees</title>
  <link rel="stylesheet" type="text/css" href="formstyle.css">
<link rel="stylesheet" type="text/css" href="table.css">

</head>



<?php
    include"../config.php";
    $username=$_SESSION['username'];
    $password=$_SESSION['password'];
$sql = "SELECT s.*,sal.* FROM staff_tbl s
    JOIN salary_tbl sal ON sal.staff_id=s.id
    WHERE s.email = '$username' AND s.mobile='$password'";
    $result = mysqli_query($conn, $sql);



if (mysqli_num_rows($result) > 0) {
      // Display employee details
      echo"<H1 	align='center'>SALARY DETAILS</H1>";
     echo"<table>
     <tr>
<thead>
<th>Name</th>
<th>Salary Amount</th>
<th>Paid On</th>
</thead>
</tr>";

while($row=mysqli_fetch_assoc($result)){
echo"<tr>
<td>".$row['name']."</td>
<td>".$row['salary_amount']."</td>
<td>".$row['update_by']."</td>
</tr>";
}

echo"</table>";



}

else{
	echo"NO DATA FOUND";
}
mysqli_close($conn);
?>
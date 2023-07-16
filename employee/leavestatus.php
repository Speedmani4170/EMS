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
    include"../config.php";
    $username=$_SESSION['username'];
    $password=$_SESSION['password'];
$sql = "SELECT s.*,l.* FROM staff_tbl s
    JOIN leave_tbl l ON l.staff_id=s.id
    WHERE s.email = '$username' AND s.mobile='$password'";
    $result = mysqli_query($conn, $sql);



if (mysqli_num_rows($result) > 0) {
      // Display employee details
      echo"<H1 	align='center'>Leave Status</H1>";
     echo"<table>
     <tr>
<thead>
<th>Name</th>
<th>Reason</th>
<th>Applied On</th>
<th>Leave status</th>
</thead>
</tr>";

while($row=mysqli_fetch_assoc($result)){
echo"<tr>
<td>".$row['name']."</td>
<td>".$row['reason']."</td>
<td>".$row['request_date']."</td>
<td>".$row['status']."</td>
</tr>";
}

echo"</table>";



}

else{
	echo"NO DATA FOUND";
}
mysqli_close($conn);
?>
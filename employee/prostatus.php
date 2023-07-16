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
$sql = "SELECT s.*,p.* FROM staff_tbl s
    JOIN project_tbl p ON p.staff_id=s.id
    WHERE s.email = '$username' AND s.mobile='$password'";
    $result = mysqli_query($conn, $sql);



if (mysqli_num_rows($result) > 0) {
      // Display employee details
      echo"<H1 	align='center'>Project Status</H1>";
     echo"<table>
     <tr>
<thead>
<th>Name</th>
<th>ProjectName</th>
<th>Assigned on</th>
<th> status</th>
</thead>
</tr>";

while($row=mysqli_fetch_assoc($result)){
echo"<tr>
<td>".$row['name']."</td>
<td>".$row['project_name']."</td>
<td>".$row['added_on']."</td>
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
<?php
session_start();
if(!isset($_SESSION['username']))
{
  header("location:index.php");
}
?>
<head>
    <link rel="stylesheet" type="text/css" href="formstyle.css">
</head>
<?php
$conn=mysqli_connect("localhost","root","","sm");
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$select_query="SELECT s.*,d.*,s.id as s_id FROM staff_tbl s join
department_tbl d ON s.department=d.id
 WHERE s.id='".$_GET["id"]."'";
$result=mysqli_query($conn,$select_query);
$count=mysqli_num_rows($result);



//select department


          

if($count>0){
$row=mysqli_fetch_array($result);
 echo "<h2>Edit Employee Details</h2>";
  echo "<form action='editemployee_check.php' method='POST'>";
  echo "<input type='hidden' name='id' value='" . $row["s_id"] . "'>";
  echo "Name: <input type='text' name='name' value='" . $row["name"] . "'><br>";
  echo "Gender: <input type='text' name='gender' value='" . $row["gender"] . "'><br>";
  echo "Email: <input type='text' name='email' value='" . $row["email"] . "'><br>";
  echo "Mobile: <input type='text' name='mobile' value='" . $row["mobile"] . "'><br>";
  echo "Country: <input type='text' name='country' value='" . $row["country"] . "'><br>";
  echo "State: <input type='text' name='state' value='" . $row["state"] . "'><br>";
  echo "Address: <textarea name='address'>" . $row["address"] . "</textarea><br>";
  echo "Date of Birth: <input type='date' name='dob' value='" . $row["dob"] . "'><br><br>";
  echo "Date of Join: <input type='date' name='doj' value='" . $row["doj"] . "'><br><br>";
 

  echo "Department:<input type='text' name='department' value='" . $row["department"] . "'>" ;
       
            

  echo "Picture:<img src='".$row['picture']."' width=100 height=100> </img><input type='file' name='picture' value='" . $row["picture"] . "'><br>";
  
  echo "<input type='submit' value='Save'>";
  echo "</form>";
} else {
  echo "Employee not found.";
}

// Close database connection
$conn->close();












?>
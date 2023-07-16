<?php
session_start();
if(!isset($_SESSION['username']))
{
  header("location:index.php");
}
?>
<?php
$conn=mysqli_connect("localhost","root","","mani");
$sql="DELETE FROM users WHERE userid='".$_GET['userid']."'";
mysqli_query($conn,$sql);

header("location:indexm.php");
?>
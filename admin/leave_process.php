
<?php
session_start();
if(!isset($_SESSION['username']))
{
  header("location:index.php");
}
?>
<?php
include"config.php";
// Check if an action was submitted (approve or reject)
if (isset($_POST['action'])) {
  $action = $_POST['action'];
  $id = $_POST['id'];
  // Update the status of the leave request based on the action
  if ($action == 'approve') {
    $sql="UPDATE leave_tbl SET status = 'approved' WHERE id ='$id' ";
  mysqli_query($conn,$sql);
  } elseif ($action == 'reject') {
    $sql="UPDATE leave_tbl SET status = 'rejected' WHERE id = '$id'";
     mysqli_query($conn,$sql);
     }
}

// Redirect back to the admin page
header('Location:viewleavereq.php');
exit();
?>
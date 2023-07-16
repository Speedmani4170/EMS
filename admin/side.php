<?php
session_start();
if(!isset($_SESSION['username']))
{
  header("location:index.php");
}
?>

<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="./style1.css">
  <script src="https://kit.fontawesome.com/acfc948f76.js" crossorigin="anonymous"></script>
  
</head>
<body>

  <nav class="headnav"><h1>SM CORP<span class="corp"><i class="fa-solid fa-people-group"></i><a href="logout.php"> <span class="out"><i class="fa-brands fa-dyalog"></i></span></a></span></h1></nav>
  <nav class="headnav1">
   
  <span class="person"><i class="fa-sharp fa-solid fa-circle-user "></i>
  </span> 
  <h1>Admin</h1>
  <b> 
<span class="online"><i class="fa-solid fa-circle"></i></span> online</b> </nav>

 <nav class="sidenav">
  <ul>
    <li><a href="main.php" target="mainframe">Dashboard</a></li>
    <li class="dropdown"><a href="">Department<span>&rsaquo;</span></a>
      <ul>
      <li ><a href="adddept.php" target="mainframe">Add Department</a></li>
      
      <li><a href="managedepart.php" target="mainframe">Manage Department</a></li>
    </ul></li>
    <li class="dropdown"><a href="">Staff<span>&rsaquo;</span></a>
      
    <ul>
      <li><a href="addstaff.php" target="mainframe">Add staff</a></li>
      <li><a href="managestaff.php" target="mainframe">Manage staff</a></li>
    </ul></li>
    <li class="dropdown"><a href="">Salary<span>&rsaquo;</span></a>
      <ul>
        <li><a href="addsal.php" target="mainframe">Add Salary</a></li>
        <li><a href="salhistory.php" target="mainframe">Salary History</a></li>
      </ul>
    </li>
    <li class="dropdown"><a href="">Leave<span>&rsaquo;</span></a>
      <ul>
        <li><a href="viewleavereq.php" target="mainframe">Leave request</a></li>
        <li><a href="leavehistory.php" target="mainframe">Leave History</a></li>
      </ul>
    </li>
    <li class="dropdown"><a href="">Project<span>&rsaquo;</span></a>
      <ul>
        <li><a href="assignproject.php" target="mainframe">Assign Project</a></li>
        <li><a href="Statuspro.php" target="mainframe">Project Status</a></li>
      </ul></li>
  </ul>
 </nav> <div class="main">
 <iframe src="main.php" height="100%" width="60%" align="right"title="main" name="mainframe" id="imain"></iframe>
</div>
</body>
</html>
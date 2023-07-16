
<?php
if(!isset($_SESSION['username']))
{
  header("location:../login.php");
}
?>
<nav class="headnav"><h1>SM CORP<span class="corp"><i class="fa-solid fa-people-group"></i></span></h1><a href="logout.php"><span class="out">Logout <i class="fa-sharp fa-solid fa-right-from-bracket"></i></span></a></nav>
  <nav class="headnav1">
   
  <span class="person"><i class="fa-sharp fa-solid fa-circle-user "></i>
  </span> 
  <h1>Employee</h1>
  <b> 
<span class="online"><i class="fa-solid fa-circle"></i></span> online</b> </nav>

 <nav class="sidenav">
  <ul>
    <li><a href="">Dashboard</a></li>
    <li class="dropdown"><a href="">Profile<span>&rsaquo;</span></a>
      <ul>
        <li><a href="viewprofile.php" target="mainframe"> View</a></li>
         
      </ul>


    <li class="dropdown"><a href="">Salary<span>&rsaquo;</span></a>
      <ul>
        <li><a href="viewsalary.php" target="mainframe">Salary details</a></li>
      </ul>
    </li>
    <li class="dropdown"><a href="">Leave<span>&rsaquo;</span></a>
      <ul>
        <li><a href="leavereq.php" target="mainframe">Leave request</a></li> 
        <li><a href="leavestatus.php" target="mainframe">Leave status</a></li>
      </ul>
    </li>
    <li class="dropdown"><a href="">Project<span>&rsaquo;</span></a>
      <ul>
        <li><a href="project_assign.php" target="mainframe"> Projects</a></li>
        <li><a href="prostatus.php" target="mainframe">Project Status</a></li>
      </ul></li>
  </ul>
 </nav> 
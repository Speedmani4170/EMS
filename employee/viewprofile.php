<?php
session_start();
if(!isset($_SESSION['username']))
{
  header("location:index.php");
}
?><!DOCTYPE html>
<html>
<head>
  <title>Profile Page</title>
  <style type="text/css">
    body{
      width: 100%;
      height:100%;
    }
    .container {
      max-height: 1000px;
  max-width: 800px;
  margin: 0 auto;
  padding: 20px;
}

.profile {
  display: flex;
  flex-wrap: wrap;
  align-items: center;
  background-color: #f2f2f2;
  border-radius: 10px;
  padding: 20px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
}

.profile-image {
  
  flex-basis: 30%;
  max-width: 200px;
  margin-right: 20px;
}

.profile-image img {
  display: block;
  width: 100%;
  height: auto;
  border-radius: 20%;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);

}

.profile-info {
  flex-basis: 70%;
}

.profile-info h1 {
  font-size: 36px;
  margin-top: 0;
}

.profile-info p {
  font-size: 20px;
  margin: 0;
  margin-bottom: 10px;
}
.detail{
color:blue;
padding: 10px;
margin-left: 20px;
font-family: cursive;
}
  </style>

</head>
<body>
  <?php
    include"../config.php";
    $username=$_SESSION['username'];
    $password=$_SESSION['password'];

    // Retrieve employee details from the database
    $sql = "SELECT s.*,d.*,c.* FROM staff_tbl s
    JOIN department_tbl d ON d.id=s.department
    JOIN country_tbl c ON c.id=s.country
    WHERE s.email = '$username' AND s.mobile='$password'";
    $result = mysqli_query($conn, $sql);


    if (mysqli_num_rows($result) > 0) {
      // Display employee details
      $row = mysqli_fetch_assoc($result);
  echo"
  <div class='container'>
    <div class='profile'>
      <div class='profile-image'>
        <img src='".$row['picture']."' alt='Profile Image'>
      </div><br>
      <div class='profile-info'>
        <h1>Name: <span class='detail'>{$row['name']}</span></h1>
        <p>Gender:  <span class='detail'>{$row['gender']}</span></p>
        <p>Email: <span class='detail'> {$row['email']}</span></p>
        <p>Mobile:  <span class='detail'>{$row['mobile']}</span></p>
        <p>Date of Birth:  <span class='detail'>{$row['dob']}</span></p>
        <p>Date of Joining:  <span class='detail'>{$row['doj']}</span></p>
        <p>Address:  <span class='detail'>{$row['address']}</span></p>
        <p>Department:  <span class='detail'>{$row['department_name']}</span></p>
        <p>State:  <span class='detail'>{$row['state']}</span></p>
        <p>Country:  <span class='detail'>{$row['country_name']}</span></p>
        
      </div>
    </div>
  </div>
";
}
else{
  echo"NO DATA FOUND";
}
 mysqli_close($conn);
?>
</body>
</html>
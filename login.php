<?php
	session_start();
	?>


<html>
<head>
  <title>Login Page</title>
  <link rel="stylesheet" type="text/css" href="main.css">
</head>
<body>
  <h1 align="center">Employee Management System</h1>

  

  
		<form  action="login_check.php" method="post" >
			<table cellspadding="10" cellspacing="1" width="500" align="center" class="tblogin">
<tr><th colspan="2" align ="center">LOGIN</th></tr>
<tr><td><label>Username</label></td><td><input type="text" name="username"></td></tr>

<tr><td><label>Password</label></td><td><input type="password" name="password"></td></tr>
<tr><td  colspan="2">
	
<?php
error_reporting(0);

session_destroy();
echo'<div class="message">'. $_SESSION['message'].'</div>';
unset($_SESSION['message']); ?>
	
</td></tr>
<tr><td colspan=2><input type="submit" value="submit" name="submit"></td></tr>

		







	</table></form>
</body>
	</html>
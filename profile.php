<?php
require 'core.inc.php';
require 'connect.inc.php';
if (loggedin()) {
	
	//header("Location:  profile.php");
	$firstname = getuserfield('firstname');
	$surname = getuserfield('sirname');
	
	echo '<h1>Youre logged in</h1>'.'<a href="logout.php"><input type="button" value="Log out"></a><br><br>';
   ?>
    <img src="cons.gif" width="300px" height="250px">
  <?php
	echo '<h1>This is your profile</h1>'; echo '<h2>Name : </h2> '.'<h3>'.$firstname.'</h3>'.'<h3>'.$surname.'</h3>';
} 
else 
{
    include 'loginform.inc.php';
    include ('Register_account.php');
}
?>
<html>
<head>

</head>
<body>
   <?php  echo '<h1>Youre logged in</h1>'.'<a href="logout.php"><input type="button" value="Log out"></a><br><br>'; ?>
</body>
</html>
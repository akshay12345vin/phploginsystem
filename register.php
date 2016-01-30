<?php
require 'core.inc.php';
require 'connect.inc.php';

if (!loggedin()) {

if (isset($_POST['username'])&&isset($_POST['password'])&&isset($_POST['password_again'])&&isset($_POST['firstname'])&&isset($_POST['surname'])) {
   
   $username = $_POST['username'];
   $password = $_POST['password'];
   $password_again = $_POST['password_again'];
   $password_hash = md5($password);
   $firstname = $_POST['firstname'];
   $surname = $_POST['surname'];

   if (!empty($username)&&!empty($password)&&!empty($password_again)&&!empty($firstname)&&!empty($surname)) {
      if ($password!=$password_again) {
         echo "password do not match";	
      }else {
         
         $query = "SELECT `username` FROM `users` WHERE `username`='$username'";
         $query_run = mysql_query($query);

         if (mysql_num_rows($query_run)==1) {
         	echo 'the username '.$username.' aldredy exists.';
         } else {
         	$query = "INSERT INTO users VALUES ('','".mysql_real_escape_string($username)."','".mysql_real_escape_string($password_hash)."','".mysql_real_escape_string($firstname)."','".mysql_real_escape_string($surname)."')";
         	if ($query_run = mysql_query($query)) {
         		header('Location: register_success.php');
         	} else {
         		echo 'sorry,  we could not register you at this time try agin later';
         	}

         }

      }
   } else {
      ?>
	  <html>
	    <head>
		    <link rel="stylesheet" type="text/css" href="style.css">
		</head>
	  <body>
	     <div id="Error">
		     <h2>All fields are required</h2>
		 </div>
	  </body>
	  </html>
	  <?php
   	 // echo "All fields are required"; 
   }

}
	
?>    

<html>
<head>
   <link rel="stylesheet" type="text/css" href="style.css">
   <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
   <link rel="stylesheet" type="text/css" href="css/bootstrap-responsive">
   
  <link rel="stylesheet" href="jquery-ui-1.9.2/themes/base/jquery.ui.all.css">

  <script src="jquery-ui-1.9.2/jquery-1.8.3.js"></script>
  <script src="jquery-ui-1.9.2/ui/jquery.ui.core.js"></script>
  <script src="jquery-ui-1.9.2/ui/jquery.ui.widget.js"></script>
  <script src="jquery-ui-1.9.2/ui/jquery.ui.button.js"></script>
</head>
<body>
<div id="bheja">
	<h1>Welcome to the Family</h1>
</div>
<div id="img1">
   <img src="new.jpg" height="300px" width="400px">
</div>
<div id="img2">
   <img src="new.jpg" height="300px" width="400px">
</div>
<div id="formdiv">
   <form action="register.php" method="POST">
         <input autofocus class="all" placeholder="Username" type="text" name="username" value="<?php if (isset($username)) { echo $username; } ?>"><br><br>
         <input class="all" placeholder="Password" type="password" name="password"><br><br>
         <input class="all" placeholder="Password_again" type="password" name="password_again"><br><br>
         <input class="all" placeholder="Fristname" type="text" name="firstname" value="<?php if (isset($firstname)) { echo $firstname; } ?>"><br><br>
		 <input class="all" placeholder="Sirname" type="text" name="surname" value="<?php if (isset($surname)) { echo $surname; } ?>"><br><br> 
         <div id="control-group">
		   <input id="but" class="but ui-button ui-widget ui-state-default ui-corner-all ui-state-hover" type="submit" value="Register" role="button" aria-disabled="false">
         </div>
   </form>
</div>
</body>
</html>

<?php
} else if(loggedin()) {
	echo 'Your Aldredy logged in.';
}

?>
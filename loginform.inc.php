<?php

if (isset($_POST['username']) && isset($_POST['password'])) {
	$username = $_POST['username'];
	$password = $_POST['password'];
    
  $password_hash = md5($password);

	if (!empty($username)&&!empty($password)) {
		
       $query = "SELECT `id` FROM `users` WHERE `username`='".mysql_real_escape_string($username)."' AND `password`='".mysql_real_escape_string($password_hash)."'"; 
       
       if ($query_run = mysql_query($query)) {
       	  $query_num_rows = mysql_num_rows($query_run);
          if ($query_num_rows==0) {
          ?>       
             <script type="text/javascript">
                alert("invalid username and password");
             </script>
          
          <?php
          } else if ($query_num_rows==1){
             
             $user_id = mysql_result($query_run, 0, 'id');
             $_SESSION['user_id']=$user_id;
             
             header('Location: index.php');
          }
       }


	} else {
		echo "You must supply Username and Password";
	}
}

?>
<html>
<head>
  
  <link rel="stylesheet" type="text/css" href="style.css">
  <link rel="stylesheet" href="jquery-ui-1.9.2/themes/base/jquery.ui.all.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap-responsive">

  <script src="jquery-ui-1.9.2/jquery-1.8.3.js"></script>
  <script src="jquery-ui-1.9.2/ui/jquery.ui.core.js"></script>
  <script src="jquery-ui-1.9.2/ui/jquery.ui.widget.js"></script>
  <script src="jquery-ui-1.9.2/ui/jquery.ui.button.js"></script>

<script type="text/javascript">

  $(document).ready(function(){
  
    $("#but").button(); 
  
  });

</script>

</head>
<body>

<div id="loginform">
	<form action="<?php echo $current_file; ?>" method="POST">
	<fieldset>
	<h2>Log In</h2>
	<div id="control-group">
		<br><input autofocus placeholder="Username" id="user" type="text" name="username">
	</div>
	<div id="control-group">
		<input id="pass" placeholder="Password" type="password" name="password"><br>
	</div>
	<div id="control-group">
        <input id="but" class="but" type="submit" value="Log In">
	</div>
	</fieldset>
	</form>
	</div>
	<div id="timepass">
		<img src="a.jpg" height="800px" width="900px">
	</div>
	<div id="reg">
	<h2>Register your Account</h2>
		<a href="register.php"><input id="regbut" type="button" value="Register"></a>
	</div>
</body>
</html>
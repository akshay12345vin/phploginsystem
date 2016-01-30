<?php
require 'core.inc.php';
require 'connect.inc.php';

if (loggedin()) {
	
	$firstname = getuserfield('firstname');
	$surname = getuserfield('sirname');
	
	$query = "SELECT `Friends` FROM `users`";
	
	if($query_run = mysql_query($query)) {
	
		while($query_row = mysql_fetch_assoc($query_run)) {
			$friends = $query_row['Friends'];
		 
		?>
		   <div id="friends">
			 <h2><?php echo $friends ?></h2>
		   </div>
		<?php
		 
			//echo $friends; 
		}
	}
	else 
	{
	   echo 'query dosnt make sense';
	}
?>
   <html>
	<head>
	   <link rel="stylesheet" type="text/css" href="profile_style.css" />
	   <link rel="stylesheet" type="text/css" href="other.css"/>
	</head>
	<body>
	<div id="uparwala">
	    <ul> 
		    <a href="index.php"><li>Home</li></a>
			<a href="#"><li>Find Friends</li></a>
			<a href="index.php"><li>Profile</li></a>
		    <a href="#"><li>Settings</li></a>
			<a href="logout.php"><li>Sign out</li></a>
		</ul>
	</div>
	<div id="ghar">
		<div id="pehchaan">
		    <img src="userpics/user1.jpg" width="150"/>  
			<hr>
			Your Name : <?php echo $firstname.' '.$surname;  ?>
			<hr>
			<div id="navigation">
			  <ul>
			     <a href="Friends.html"><li>Friend's</li></a>
				 <li>Messages</li>
				 <li>App's</li>
				 <li>Notification's</li>
			  </ul>
			</div>
		</div>
		<div id="apki_muskaan">    
			<h2><img src="cons.gif" width="300px" height="250px"></h2>
			
			
		</div>
		<div id="bichadna">
            
		</div>
	</div>
	</body>
	</html>
<?php
} else {
    include 'loginform.inc.php';
    include ('Register_account.php');
}
?>
<html>
<head>
  <title>Welcome To The Core</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap-responsive">
  
  <link rel="stylesheet" href="jquery-ui-1.9.2/themes/base/jquery.ui.all.css">

  <script src="jquery-ui-1.9.2/jquery-1.8.3.js"></script>
  <script src="jquery-ui-1.9.2/ui/jquery.ui.core.js"></script>
  <script src="jquery-ui-1.9.2/ui/jquery.ui.widget.js"></script>
  <script src="jquery-ui-1.9.2/ui/jquery.ui.button.js"></script>
<script type="text/javascript">

  $(document).ready(function(){
  
    $("#regbut").button(); 
  
  });

</script>
</head>
<body>
</body>
</html>
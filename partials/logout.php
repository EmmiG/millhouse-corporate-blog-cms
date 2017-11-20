<?php	
	session_start();
	$_SESSION["loggedIn"] = false;
	session_destroy();
	header("Location: ../landing.php?Message=logged_out");
	
?>

<?php	
	session_start();
	$_SESSION["loggedIn"] = false;
	session_destroy();
	header("Location: ../list_all.php?Message=logged_out");
	
?>
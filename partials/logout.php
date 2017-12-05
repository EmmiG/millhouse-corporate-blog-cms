<?php	
	require_once 'session_start.php';
	$_SESSION["loggedIn"] = false;
	session_destroy();
	header("Location: ../landing.php?Message=logged_out");
	
?>

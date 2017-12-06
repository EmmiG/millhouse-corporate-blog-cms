<?php
    /*
    The session is initiated, and then DESTROYED. User is re-directed to the login-page.
    */
	require_once 'session_start.php';
	session_destroy();
	header("Location: ../landing.php?Message=logged_out");	
?>

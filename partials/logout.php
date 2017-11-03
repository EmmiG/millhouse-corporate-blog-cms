<?php	
	session_start();
	session_destroy();
	header("Location: ../list_all.php?Message=logged_out");
	
?>
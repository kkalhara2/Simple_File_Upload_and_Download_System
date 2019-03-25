<?php 
	
	session_start();

	$_SESSION = array();

	if (isset($_COOKIE[session_name])) {
		setcookie(session_name(),'',time()-84600,'/');
	}

	session_destroy();

	header('Location:../upload/index.php?logout=yes');
 ?>